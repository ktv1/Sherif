<?php

namespace App\Http\Controllers\Voyager;

use App\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProductReviewsController
{
    public $statuses = [
            'new' => 'Новый',
            'approved' => 'Одобрен',
            'blocked'  => 'Заблокирован'
        ];

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $model = ProductReview::with('product', 'reviewer', 'manager')->get()->toArray();

        return view('voyager::product-reviews.index', ['model' => $model, 'statuses' => $this->statuses]);
    }

    public function moderate($id)
    {
        $model = ProductReview::with('product', 'reviewer', 'manager')->find($id)->toArray();

        return view('voyager::product-reviews.moderate', ['model' => $model, 'statuses' => $this->statuses]);
    }

    public function update(Request $request, $id)
    {
        $data  = $request->all();
        $model = ProductReview::find($id);

        if($model->status != $data['status']) $model->status = $data['status'];

        if(isset($data['response'])) $model->response = $data['response'];

        if(isset($data['sent'])) {
            $model->sent = true;

            Mail::send('emails.ReviewResponse', $model->toArray(), function($message) use($model){
                $message->to($model['email']);
                $message->subject('Ответ на отзыв');
            });
        }

        $model->save();

        return response()->json(['message'=>'Отзыв обновлен'], 200);
    }
}