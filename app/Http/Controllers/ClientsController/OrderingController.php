<?php

namespace App\Http\Controllers\ClientsController;


use App\Manager;
use App\OrderProduct;
use App\Product;
use App\Session;
use App\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use LisDev\Delivery\NovaPoshtaApi2;


class OrderingController extends Controller
{
    public function getOrdering(Request $request){

		$np = new NovaPoshtaApi2('4eb7454f3709369224efc62cee2e6b9b');
		$array_cities = $np->getCities()['data'];
		$array_regions = $np->getAreas()['data'];
		$cities = array();
		$regions = array();
		foreach ($array_cities as $row)
		{
			//$arr = (array)[$row['Ref'] => $row['Description']];
			array_push($cities, $row['Description']);
		}

		foreach ($array_regions as $row)
		{
			//$arr = (array)[$row['Ref'] => $row['Description']];
			array_push($regions, $row['Description']);
		}

    	$array = $this->getSession();

    	return $this->viewMaker('Clients-page.ordering')->with([
            'left_side_bar' => $this->left_sidebar("None"),
			'cities' =>	$cities,
			'regions' => $regions,
			'departments' => array(),
            'header' => $this->header(),
            'data' => $this->returnData(['data' => $array['data'], 'type' => $array['type']]),
        ]);
    }

	public function getCities(Request $request){

		$np = new NovaPoshtaApi2('4eb7454f3709369224efc62cee2e6b9b');
		$array_cities = $np->getCities()['data'];
		$cities = array();

		foreach ($array_cities as $row)
		{
			$arr = [$row['Ref'] => $row['Description']];
			array_push($cities, $arr);
		}

		return response()->json(array('cities'=> $cities), 200);

	}

	public function getDepartments(Request $request){

		$np = new NovaPoshtaApi2('4eb7454f3709369224efc62cee2e6b9b');
		$array_cities = $np->getCities()['data'];
		$array_ref_city = array();
		foreach ($array_cities as $row)
			array_push($array_ref_city, $row['Ref']);
		$array_departments = $np->getWarehouses($array_ref_city[(int)$request['id']])['data'];


		/*if ($request['id'])
		{
			foreach ($array_departments as $row)
			{
				//$arr = [$row['Ref'] => $row['Description']];
				array_push($departments, $row['Description']);
			}
		}*/

		return response()->json(array('departments'=> $array_departments, 200));

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
    	$order->mail_place = $request->mail_place;
    	$order->comment = $request->comment;
		$order->save();

		foreach (Cart::content() as $product)
		{
			$order_product = new OrderProduct();
			$order_product->order_id = $order->id;
			$order_product->product_id = $product->id;
			$order_product->quantity = $product->qty;
			$order_product->save();
		}

		Mail::send('email', ['text' => 'email'], function($message) {

			$message->to(env('MAIL_USERNAME'), 'Сообщение')->subject('Сообщение');
			$message->from(env('ADMIN_EMAIL'), 'Имя');
		});

		Mail::send('manager_email', ['data' => $order], function($message) {

			$message->to(env('MAIL_USERNAME'), 'Сообщение')->subject('Сообщение');
			$message->from(env('MAIL_USERNAME'), 'Имя');
		});


		Cart::destroy();

    	return Response::json(Manager::where('categories', 1)->first());
    }

	public function quickOrder(Request $request){
		$this->validate($request, [
			'name' => 'required',
			'email' => 'required|email',
		]);
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
