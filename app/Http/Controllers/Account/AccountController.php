<?php

namespace App\Http\Controllers\Account;

use App\Models\UserPersonal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
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

        $sexvalues = ['М', 'Ж'];
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

    public function store(Request $request) {


        $json = array();
        $user = Auth::user();
        $user->name = $request->get('name');
        $user->lastname = $request->get('lastname');
        $user->phone = $request->get('phone');
        $json['name'] =  $user->name;
        $json['lastname'] =  $user->lastname;
        $json['phone'] =  $user->phone;
        if ($request->hasFile('avatar')) {
            $filename = $this->_uploadMiniature($request->file('avatar'));
            $user->avatar = $filename;
            $json['avatar'] =  $user->avatar;
            $json['avatar_th'] = get_image_cache($user->avatar, 250, 250);
        }
        if ($user->save()){
            $user_personal = UserPersonal::findOrNew(Auth::user()->id);
            $datebirth = str_replace('/','.', $request->get('datebirth'));
            $user_personal->sex = $request->get('sex');
            $user_personal->datebirth = Carbon::parse($datebirth)->format('Y-m-d');
            //dd($user_personal->datebirth);
            $user_personal->obl = $request->get('obl');
            $user_personal->city = $request->get('city');
            $user_personal->street = $request->get('street');
            $user_personal->house = $request->get('house');
            $user_personal->apartment = $request->get('apartment');

            $json['sex'] =  $user_personal->sex;
            $json['datebirth'] =  $user_personal->datebirth;
            $json['obl'] =  $user_personal->obl;
            $json['city'] =  $user_personal->city;
            $json['street'] =  $user_personal->street;
            $json['house'] =  $user_personal->house;
            $json['apartment'] =  $user_personal->apartment;
            $json['status'] = 'ok';
            return json_encode($json);
        } else {
            $json['status'] = 'error';
            return json_encode($json);
        }
    }


    public function storePassword(Request $request)
    {
        $json = array();

        $user = Auth::user();
        $json['request'] = $request->all();

        if($request->get('old_password') != $request->get('new_password')) {
            $json['error'] = 'Пароли не совпадают!';
            return json_encode($json);
        } elseif (strlen($request->get('new_password_2') ) <=3 ) {
            if($request->get('new_password') != $request->get('new_password_2')) {
                $json['error'] = 'Длинна пароля должна быть более 3 символов!';
                return json_encode($json);
            }
        }

        if (bcrypt($request->get('old_password') == Auth::user()->password)) {
            $user->password = bcrypt($request->get('new_password_2'));

            if($user->save() == true) {
                $json['success'] = 'Пароль сохранен!';
                return json_encode($json);
            };
        } else {
            $json['error'] = 'Пароль неверен!';
            return json_encode($json);
        }
    }
    private function _uploadMiniature($file)
    {
        $path = public_path('/storage');
        $filename = generate_filename($path, $file->getClientOriginalExtension());

        $thumb =Image::make($file->getRealPath())->resize(250,250)
            ->save($path .'/cache/250x250_'. platformSlashes($filename));
        $file->move($path, platformSlashes($filename));
        return platformSlashes($filename);
    }
}
