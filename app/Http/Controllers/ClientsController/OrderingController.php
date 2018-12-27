<?php

namespace App\Http\Controllers\ClientsController;


use App\Product;
use App\Session;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class OrderingController extends Controller
{
    public function getOrdering(Request $request){

    	$array = $this->getSession();

    	return $this->viewMaker('Clients-page.ordering')->with([
            'left_side_bar' => $this->left_sidebar("None"),
            'header' => $this->header(),
            'data' => $this->returnData(['data' => $array['data'], 'type' => $array['type']]),
        ]);
    }
    public function orderBuy(Request $request){
    	$order = new Order;
    	$order->tel = $request->tel;
    	$order->name = $request->name;
    	$order->email = $request->email;
    	$order->method_mail = $request->method_mail;
    	$order->method_pay = $request->method_pay;
    	$order->region = $request->region;
    	$order->town = $request->town;
    	$order->method_pay = $request->method_pay;
    	$order->region = $request->region;
    	$order->mail_place = $request->mail_place;
    	$order->comment = $request->comment;

    	
    	return Response::json($this->getSession());
    }

	public function quickOrder(Request $request){
		$data = $request->all();
		Mail::send('email', ['data' => $data], function ($message) use ($data)  {
			$message->to(env('MAIL_ADMIN'), 'Сообщение')->subject('Заявка с шапки');
			$message->from(env('MAIL_USERNAME'), 'Имя');
		});
		return redirect()->back()->with('status', 'Ваше сообщение успешно отправлено.');
	}

	public $s = /** @lang text */
        '<html>
    <head>
        <title>Тестовое письмо с HTML</title>
        <meta charset="utf8">
    </head>
    <body>
        <p>Пример таблицы</p>
        <table>
            <tr>
                <th>Колонка 1</th><th>Колонка 2</th><th>Колонка 3</th><th>Колонка 4</th>
            </tr>
            <tr>
                <td>Ячейка 1</td><td>Ячейка 2</td><td>Ячейка 3</td><td>Ячейка 4</td>
            </tr>
            <tr>
                <td>Ячейка 5</td><td>Ячейка 6</td><td>Ячейка 7</td><td>Ячейка 8</td>
            </tr>
        </table>
    </body>
</html>';

	public function quickCall(Request $request){
		$data = $request->all();
		Mail::send('email', ['data' => $data], function($message) {

			$message->to(env('ADMIN_EMAIL'), 'Сообщение')->subject('Сообщение');
			$message->from(env('MAIL_USERNAME'), 'Имя');
		});

		return redirect()->back()->with('status', 'Ваше сообщение успешно отправлено.');
	}


}
