<?php

namespace App\Http\Controllers\Account;

use App\Models\UserPersonal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index()
    {
        $user = Auth::user();
        if (!$user->userpersonal) {
            $userpersonal = UserPersonal::findOrNew($user->id);
            $userpersonal->user_id = $user->id;
            $userpersonal->sex = 'М';
            $userpersonal->save();
        }

        $sexvalues = ['M', 'F'];
        return view('frontend.account.account')->with([
            'user' => $user,
            'sexvalues' => $sexvalues,
            'is_admin' => true,
            'uah_to_eur'=>32,
            'uah_to_usd'=>27,
            'left_side_bar' => $this->left_sidebar("None"),
            'header' => $this->header()
        ]);
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function store(Request $request)
    {
        $json = array();

        $user = Auth::user();

        $user->name     = $request->get('name');
        $user->lastname = $request->get('lastname');
        $user->phone    = $request->get('phone');

        $json['name']       = $user->name;
        $json['lastname']   = $user->lastname;
        $json['phone']      = $user->phone;

        if ($request->hasFile('avatar')) {
            $filename = $this->_uploadMiniature($request->file('avatar'));

            $user->avatar = $filename;

            $json['avatar'] =  $user->avatar;
            $json['avatar_th'] = get_image_cache($user->avatar, 250, 250);
        }

        if ($user->save()){

            $user_personal = UserPersonal::findOrNew(Auth::user()->id);

            $user_personal->sex         = $request->get('sex');
            $user_personal->datebirth   = Carbon::parse($request->get('datebirth'))->format('Y-m-d');
            $user_personal->obl         = $request->get('obl');
            $user_personal->city        = $request->get('city');
            $user_personal->street      = $request->get('street');
            $user_personal->house       = $request->get('house');
            $user_personal->apartment   = $request->get('apartment');

            if($user_personal->save()) {
                foreach($user_personal->attributesToArray() as $k => $v) {
                    $json[$k] = $v;
                }
                $json['status']     = 'ok';
            } else {
                $json['status'] = 'error';
            }


            return json_encode($json);

        } else {
            $json['status'] = 'error';
            return json_encode($json);
        }
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storePassword(Request $request)
    {
        $user = Auth::user();

//        dd(
//            Hash::check($request->get('old_password'), Auth::User()->getAuthPassword()),
//            Auth::User()->getAuthPassword(),
//            $request->get('old_password'),
//            password_hash($request->get('old_password'), PASSWORD_BCRYPT)
//        );

        if (Hash::check($request->get('old_password'), Auth::User()->getAuthPassword())) {

            if($request->get('new_password') != $request->get('new_password_2')) {

                $message = ['error' => 'Пароли не совпадают'];

            }
            elseif (strlen($request->get('new_password_2') ) <=3 ) {

                $message = ['error' => 'Длинна пароля должна быть более 3 символов'];

            } else {

                $user->password = password_hash($request->get('new_password_2'), PASSWORD_BCRYPT);

                try {
                    $user->save();
                    $message = ['success' => 'Новый пароль сохранен'];
                } catch (\Exception $e) {
                    $message = ['error' => 'Ошибка: ' . $e->getMessage()];
                };

            }
        } else {

            $message = ['error' => 'Пароль указан неверено'];

        }

        return response()->json($message, 200);
    }

    /**
     * @param $file
     * @return mixed
     */
    private function _uploadMiniature($file)
    {
        $path = public_path('/storage');
        $filename = generate_filename($path, $file->getClientOriginalExtension());

        $thumb =Image::make($file->getRealPath())
            ->resize(175,175)
            ->save($path .'/cache/175x175_'. platformSlashes($filename));

        $file->move($path, platformSlashes($filename));

        return platformSlashes($filename);
    }
}
