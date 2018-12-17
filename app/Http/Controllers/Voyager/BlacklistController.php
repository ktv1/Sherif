<?php

namespace App\Http\Controllers\Voyager;

use App\Blacklist;
use Illuminate\Http\Request;

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
            $data = json_decode($request->getContent(), true);
            $blacklist = new Blacklist();

            $blacklist->type    = $data['type'];
            $blacklist->value   = $data['value'];
            $blacklist->comment = $data['comment'];
            $blacklist->author  = auth()->user()->id;

            if($blacklist->type == 'ip') {
                $blacklist->blocked = isset($data['blocked']);
            }

            try{
                list($message, $code) = $blacklist->save() ? ['Запись добавлена', 200] : ['Ошибка добавления', 409];
            } catch (\Illuminate\Database\QueryException $e) {
                if($e->errorInfo[1] == 1062) { // Duplicate entry error code
                    $duplicate = Blacklist::withTrashed()
                        ->where('value', '=', $blacklist->value)
                        ->pluck('id')
                        ->toArray();

                    return response()->json(['original'=>$duplicate[0]], 200);
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
            $data = json_decode($request->getContent(), true);
            $blacklist = Blacklist::find($id);

            if($data['value'])   $blacklist->value   = $data['value'];
            if($data['comment']) $blacklist->comment = $data['comment'];
            $blacklist->blocked = isset($data['blocked']);
            $blacklist->author  = auth()->user()->id;

            list($message, $code) = $blacklist->save() ? ['Запись обновлена', 200] : ['Ошибка обновления', 409];

            return response()->json(['message' => $message], $code);
        }

        if($request->method() == "GET") {
            $item = Blacklist::find($id);

            return view('voyager::blacklist.edit', compact('item'));
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

    public function restoreItem(Request $request)
    {
        $record = Blacklist::withTrashed()->find($request->get('id'));

        list($message, $code) = $record->restore() ? ['Запись восстановлена', 200] : ['Ошибка восстановления', 409];

        return response()->json(['message' => $message], $code);
    }
}
