<style>
    .data_print {
        display: none;
    }
</style>

<div class="sherif_row">
    <div class="modal fade" id="Basket" role="dialog">
        <div class="modal-dialog sherif-basket">
            <!-- Modal content-->
            <div class="modal-content sherif-basket_content">
                <div class="modal-header sherif-basket_content_header">
                    <h4 class="sherif-basket_content_header_title">Корзина</h4>
                </div>
                <div class="modal-body sherif-basket_content_body" id="basket_order">
                    @if(count(Gloudemans\Shoppingcart\Facades\Cart::content()) == 0)
                        <h3 class="basket_status">Корзина Пуста</h3>
                    @else
                        @foreach(Gloudemans\Shoppingcart\Facades\Cart::content() as $product)
                            <div class="sherif-basket_content_body_itm bsk_itm_{{$product->id}}">
                                <div class="sherif-basket_product">
                                    <img src="/storage/app/public/{{$product->options->image}}"
                                         class="sherif-basket_product_img" alt="" width="50" height="50">
                                    <div class="sherif-basket_product_description" id="desc_id">
                                                        <span class="sherif-basket_product_description_title">
                                                            <a href="" class="sherif-basket_product_description_link">
                                                                {{$product->name}}
                                                            </a>
                                                            <br/>
                                                            <span class="sherif-basket_product_description_code">Артикул: <span>{{$product->vendor_code}}</span> </span>
                                                            <span class="sherif-basket_product_description_code">Код товара: <span>{{$product->code}}</span></span>
                                                        </span>
                                                        <span class="sherif-basket_product_description_sc">
                                                            <span>Размер: <span
                                                                        class="sherif-basket_product_description_sc_size">L</span></span>
                                                            <span>Цвет: <span
                                                                        class="sherif-basket_product_description_sc_color">олива</span></span>
                                                        </span>
                                                        <span class="sherif-basket_product_description_price">
                                                            <span class="sherif-basket_product_description_price_prev">Цена: <span>970</span> грн</span>
                                                            <span class="sherif-basket_product_description_price_current">Цена: <span> {{$product->price}}</span> грн</span>
                                                        </span>
                                        <a href="{{route('cart.remove', ['rowId'=>$product->rowId])}}"
                                           class="sherif-basket_product_description_link" id="delete_id"><i
                                                    class="fas fa-times"></i> Убрать из корзины</a>
                                    </div>
                                </div>
                                <div class="sherif-basket_price">
                                    <div class="sherif-basket_quantity">
                                        <a togglers="down" href="{{route('cart.down', ['rowId'=>$product->rowId, 'qty'=>$product->qty])}}" class="sherif-basket_quantity_min product_togglers"
                                           id_product="{{$product->id}}">-</a>
                                        <input type="text" id="basket_product_amount_{{$product->id}}"
                                               class="product_amount_input sherif-basket_quantity_num"
                                               value="{{$product->qty}}" id_product="{{$product->id}}">
                                        <a togglers="up" href="{{route('cart.up', ['rowId'=>$product->rowId, 'qty'=>$product->qty])}}" class="sherif-basket_quantity_plus product_togglers"
                                           id_product="{{$product->id}}">+</a></div>
                                    <span class="sherif-basket_sum sum_basket_ + element.id + ">Сумма <span>{{$product->price * $product->amount}}</span> грн</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                @if(count($products) == 0)
                    <div class="modal-footer sherif-basket_content_footer">
                        <span class="sherif-basket_content_footer_total">Общая сумма: <span
                                    class="total_basket">0</span> грн.</span>
                        <div class="sherif-basket_content_footer_btns">
                            <a class="sherif-basket_content_footer_btns_btn" data-dismiss="modal">ПРОДОЛЖИТЬ ПОКУПКИ</a>
                            <a href="{{route('ordering')}}" class="sherif-basket_content_footer_btns_btn order_btn">ОФОРМИТЬ
                                ЗАКАЗ</a>
                            <a href="#" onclick="printDiv()" class="sherif-basket_content_footer_btns_btn order_btn">ПЕЧАТЬ</a>
                        </div>
                    </div>
                @else
                    <div class="modal-footer sherif-basket_content_footer">
                        <span class="sherif-basket_content_footer_total">Общая сумма: <span
                                    class="total_basket">{{$curr_price}}</span> грн.</span>
                        <div class="sherif-basket_content_footer_btns">
                            <a class="sherif-basket_content_footer_btns_btn" data-dismiss="modal">ПРОДОЛЖИТЬ ПОКУПКИ</a>
                            <a href="{{route('ordering')}}" class="sherif-basket_content_footer_btns_btn order_btn">ОФОРМИТЬ
                                ЗАКАЗ</a>
                            <a href="#" onclick="printDiv()" class="sherif-basket_content_footer_btns_btn order_btn">ПЕЧАТЬ</a>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>


    <div class="data_print" id="print_order">
        <table>
            <thead>
            <tr>
                <th>Название</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>Всего</th>
            </tr>
            </thead>

            <tbody>

            <?php use Gloudemans\Shoppingcart\Facades\Cart;?>
            <?php foreach(Cart::content() as $row) :?>

            <tr>
                <td>
                    <p><strong><?php echo $row->name; ?></strong></p>
                    <p><?php echo ($row->options->has('size') ? $row->options->size : ''); ?></p>
                </td>
                <td><?php echo $row->qty; ?></td>
                <td><?php echo $row->price; ?> грн.</td>
                <td><?php echo $row->total; ?> грн.</td>
            </tr>

            <?php endforeach;?>

            </tbody>

            <tfoot>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td>Вся сумма</td>
                <td><?php echo Cart::subtotal(); ?></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td>Скидка</td>
                <td><?php echo Cart::tax(); ?></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td>Итог</td>
                <td><?php echo Cart::total(); ?></td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>

<script>

    function printDiv() {
        var divToPrint = document.getElementById('print_order');

        var newWin = window.open('', 'Print-Window');
        newWin.open();
        newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
        newWin.print();
        newWin.close();
    }

    //$(document).ready(function(){
    /*$('#product_name').keyup(function(){
     var query = $(this).val();
     if(query != '')
     {
     var _token = $('input[name="_token"]').val();
     $.ajax({
     url:"{{ route('autocomplete.fetch') }}",
     method:"POST",
     data:{query:query, _token:_token},
     success:function(data){
     $('#productList').fadeIn();
     $('#productList').html(data);
     }
     });
     }
     });*/

    /*$("a.btn-in-basket").on('click', function(e) {
     e.preventDefault();

     var product_id = $(this).attr('id_product');

     jQuery.ajax({
     url: "add-cart-product/" + product_id,
     method: 'get',
     data: {
     id: product_id
     },
     success: function(result){
     $('#ajaxContent').load(result);
     }});
     });*/


    /*$(document).on('click', 'li', function(){
     $('#product_name').val($(this).text());
     $('#productList').fadeOut();
     });
     $(document).mouseup(function (e){ // событие клика по веб-документу
     var div = $("#productList"); // тут указываем ID элемента
     if (!div.is(e.target) // если клик был не по нашему блоку
     && div.has(e.target).length === 0) { // и не по его дочерним элементам
     div.hide(); // скрываем его
     }
     });*/
    //});
</script>
