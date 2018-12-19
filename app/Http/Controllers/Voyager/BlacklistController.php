<?php

namespace App\Http\Controllers\Voyager;

use App\Blacklist;
use Illuminate\Http\Request;
use Jabran\CSV_Parser as Parser;

use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class BlacklistController extends VoyagerBaseController
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $blacklist = Blacklist::withTrashed()->get();

        return view('voyager::blacklist.index', compact('blacklist'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function addItem(Request $request)
    {
        if($request->method() == "POST") {
            $model = new Blacklist();

            $data = json_decode($request->getContent(), true);

            unset($data['_token']); // remove token from data scope

            foreach($model->getFillable() as $k => $v) {
                $model->$v = !empty($data[$v]) ? $data[$v] : null;
            }

            if(!empty($model->ip)) {
                $model->blocked = isset($item['blocked']);
            }

            $model->blocked = !empty($model->ip) ? isset($data['blocked']) : false;
            $model->author  = auth()->user()->id;

            try{
                list($message, $code) = $model->save() ? ['Запись добавлена', 200] : ['Ошибка добавления', 409];
            } catch (\Illuminate\Database\QueryException $e) {
                if($e->errorInfo[1] == 1062) { // Duplicate entry error code

                    if(!empty($model->phone)) $find['phone'] = $model->phone;
                    if(!empty($model->ip))    $find['ip']    = $model->ip;
                    if(!empty($model->email)) $find['email'] = $model->email;

                    $duplicate = Blacklist::getDuplicate($find);

                    return response()->json(compact('duplicate'), 200);
                }
            }

            return response()->json(['message' => $message], $code);
        }

        if($request->method() == "GET") {
            return view('voyager::blacklist.add');
        }

        return response()->json(['message'=>'tre to add row'], 200);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function editItem(Request $request, $id)
    {
        if($request->method() == "POST") {
            $model = Blacklist::find($id);

            $data = json_decode($request->getContent(), true);

            unset($data['_token']); // remove token from data scope

            foreach($model->getFillable() as $k => $v) {
                $model->$v = !empty($data[$v]) ? $data[$v] : null;
            }

            $model->blocked = !empty($model->ip) ? isset($data['blocked']) : false;
            $model->author  = auth()->user()->id;

            try{
                list($message, $code) = $model->save() ? ['Запись обновлена', 200] : ['Ошибка обновления', 409];
            }catch (\Illuminate\Database\QueryException $e) {
                if($e->errorInfo[1] == 1062) { // Duplicate entry error code

                    $find['exclude'] = $id;
                    if(!empty($model->phone)) $find['phone'] = $model->phone;
                    if(!empty($model->ip))    $find['ip']    = $model->ip;
                    if(!empty($model->email)) $find['email'] = $model->email;

                    $duplicate = Blacklist::getDuplicate($find);

                    return response()->json(compact('duplicate'), 200);
                }
            }

            return response()->json(['message' => $message], $code);
        }

        if($request->method() == "GET") {
            $record = Blacklist::find($id);

            return view('voyager::blacklist.edit', compact('record'));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function deleteItem(Request $request)
    {
        $record = Blacklist::find($request->get('id'));

        list($message, $code) = $record->delete() ? ['Запись удалена', 200] : ['Ошибка удаления', 409];

        return response()->json(['message' => $message], $code);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function restoreItem(Request $request)
    {
        $model = Blacklist::withTrashed()->find($request->get('id'));

        list($message, $code) = $model->restore() ? ['Запись восстановлена', 200] : ['Ошибка восстановления', 409];

        return response()->json(['message' => $message], $code);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function importItems()
    {
        $data       = explode(PHP_EOL,trim(file_get_contents('https://docs.google.com/spreadsheets/d/1dFG7DXE2ON5g_1ACkdHU7YPKlw5FaoYXbzUMosl7nlQ/export?format=csv&id=1dFG7DXE2ON5g_1ACkdHU7YPKlw5FaoYXbzUMosl7nlQ&gid=0')));
        $columns    = [
            'manager',
            'id',
            'phone',
            'ip',
            'email',
            'fullname',
            'city',
            'buyed_at',
            'order_num',
            'comment'
        ];

        foreach(array_slice($data,3) as $row) {
            foreach(explode(',',$row) as $i => $column) {
                if($i < count($columns)) {
                    if($columns[$i] == 'phone') {
                        $column = substr(preg_replace("/[^0-9]/", "", $column), -10);
                    }
                    $item[$columns[$i]] = $column;
                } else {
                    $item[last($columns)] .= $column;
                }
            }

            if(!empty($item['phone']) || !empty($item['ip']) || !empty($item['email'])) {
                $model = new Blacklist();

                foreach (array_slice($item, 2) as $k => $v) {
                    $model->$k = !empty($v) ? $v : null;
                }

                $model->comment = preg_replace('/[^[:alnum:][:space:]]/u', '', $model->comment);
                $model->author = auth()->user()->id;

                try{
                    $model->save();
                } catch(\Illuminate\Database\QueryException $e) {
                    if($e->errorInfo[1] == 1062) { // Duplicate entry error code
                        continue;
                    }
//                    $duplicate = Blacklist::getDuplicate([
//                        'phone' => $model->phone,
//                        'ip'    => $model->ip,
//                        'email' => $model->email,
//                    ]);
//
//                    return response()->json([$duplicate], 200);
                }
            }
        }

        return response()->json(['Imported successful'], 200);

    }
}
