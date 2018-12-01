$(document).ready(function(){
	var domain_url = $('link[rel="canonical"]').attr("href");
 	var url = "/basket/";

 	/*basket togglers*/

	$('html').on('click', '.product_togglers', function(){
		var product_id = $(this).attr('id_product'),
			togglers = $(this).attr('togglers');
			switch(togglers) {
				case 'up':
					$('#basket_product_amount_' + product_id).val(Number($('#basket_product_amount_' + product_id).val()) + 1 );
                    $('#ordering_product_amount_' + product_id).val(Number($('#ordering_product_amount_' + product_id).val()) + 1 );
					break;
				case 'down':
					if($('#basket_product_amount_' + product_id).val() != 1 ){
						$('#basket_product_amount_' + product_id).val($('#basket_product_amount_' + product_id).val() - 1)
					}
                    if($('#ordering_product_amount_' + product_id).val() != 1 ){
                        $('#ordering_product_amount_' + product_id).val($('#ordering_product_amount_' + product_id).val() - 1)
                    }
					break; 
			}

		$.ajax({
            url: url + 'update/' + product_id,
            data: {'amount': $('#basket_product_amount_' + product_id).val()},
            dataType: 'json',
            type: 'put',
            headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
            success: function( data, textStatus, jQxhr ){
            	$("#final_basket").empty().append(data.curr_price);
            	$(".total_basket").empty().append(data.curr_price);
                $('.final_currencty_price').empty().append(data.curr_price);
            	var basket_item = "";
            	console.log(data);
            	if(data.products.length != 0){
            		data.products.forEach( function(element, index) {
                		basket_item += '<div class="sherif-basket_content_body_itm bsk_itm_' + element.id + '"><div class="sherif-basket_product">';
                        basket_item += '<img src="' + domain_url + '/storage/' + element.mainimage + '" class="sherif-basket_product_img" alt="">';
                        basket_item += '<div class="sherif-basket_product_description"><span class="sherif-basket_product_description_title">'
                        basket_item += '<a href="' + domain_url + '/get/product/' + element.id + '" class="sherif-basket_product_description_link">' + element.name + '</a><br/>'
                        basket_item += '<span class="sherif-basket_product_description_code">Артикул: <span>' + element.vendor_code + '</span> </span>';
                        basket_item += '<span class="sherif-basket_product_description_code">Код товара: <span>' + element.code + '</span></span>';
                        basket_item += '</span><span class="sherif-basket_product_description_sc">';
                        basket_item += '<span>Размер: <span class="sherif-basket_product_description_sc_size">L</span></span>';
                        basket_item += '<span>Цвет: <span class="sherif-basket_product_description_sc_color">олива</span></span></span>';
                        basket_item += '<span class="sherif-basket_product_description_price">';
                        basket_item += '<span  class="sherif-basket_product_description_price_prev">Цена: <span>970</span> грн</span>';
                        basket_item += '<span  class="sherif-basket_product_description_price_current">Цена: <span>' + element.price_final + ' </span> грн</span></span>';
                        basket_item +=  '<a class="sherif-basket_product_description_link delete_from_basket" id_product="' + element.id + '"><i class="fas fa-times"></i> Убрать из корзины</a></div></div>';
                        basket_item +=  '<div class="sherif-basket_price">';
                        basket_item +=  '<div class="sherif-basket_quantity">';
                        basket_item +=  '<a togglers="down" class="sherif-basket_quantity_min product_togglers" id_product="' + element.id + '">-</a>';
                        basket_item +=  '<input type="text" id="basket_product_amount_' + element.id + '" class="product_amount_input sherif-basket_quantity_num" value="' + element.amount + '" id_product="' + element.id + '">';
                        basket_item +=  '<a togglers="up" class="sherif-basket_quantity_plus product_togglers" id_product="' + element.id + '">+</a></div>';
                        basket_item +=  '<span class="sherif-basket_sum sum_basket_' + element.id + '">Сумма <span>' + (element.price_final * element.amount) + '</span> грн</span>';    
                    	basket_item += '</div></div>';
                        $(".itm_currency_product").empty().append(element.price_final * element.amount);
               		});
            	}
            	$('.sherif-basket_content_body').empty().append(basket_item);

			},
            error: function(data){
            	$('html').append( data.responseText );
            }
        });
		return false;
	});

	

	/*Amount togglers*/

	$('.product_amount').on('click', '.product_togglers', function(){
		var product_id = $(this).attr('id_product'),
			togglers = $(this).attr('togglers');
			switch(togglers) {
				case 'up':
					$('#product_amount_' + product_id).val(Number($('#product_amount_' + product_id).val()) + 1 )
					break;
				case 'down':
					if($('#product_amount_' + product_id).val() != 0 ){
						$('#product_amount_' + product_id).val($('#product_amount_' + product_id).val() - 1)
						break;	
					}
					
			}
	});

	$('main').on('change', '.product_amount_input', function(){
		var product_id = $(this).attr('id_product'),
			value = $(this).val();
			if(value.indexOf('-') == -1);{
				value = value.replace('-', '');
				$(this).val(value);
			}
	});

	$("html").on('click', ".product_in_basket", function(){
		var product_id = $(this).attr('id_product');
		$.ajax({
            url: url + 'add/' + product_id,
            data: {'amount': $('#product_amount_' + product_id).val()},
            dataType: 'json',
            type: 'put',
            headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
            success: function( data, textStatus, jQxhr ){
            	$("#final_basket").empty().append(data.curr_price);
            	$(".total_basket").empty().append(data.curr_price);
            	var basket_item = "";
            	if(data.products.length != 0){
            		data.products.forEach( function(element, index) {
                		basket_item += '<div class="sherif-basket_content_body_itm bsk_itm_' + element.id + '"><div class="sherif-basket_product">';
                        basket_item += '<img src="' + domain_url + '/storage/' + element.mainimage + '" class="sherif-basket_product_img" alt="">';
                        basket_item += '<div class="sherif-basket_product_description"><span class="sherif-basket_product_description_title">'
                        basket_item += '<a href="' + domain_url + '/get/product/' + element.id + '" class="sherif-basket_product_description_link">' + element.name + '</a><br/>'
                        basket_item += '<span class="sherif-basket_product_description_code">Артикул: <span>' + element.vendor_code + '</span> </span>';
                        basket_item += '<span class="sherif-basket_product_description_code">Код товара: <span>' + element.code + '</span></span>';
                        basket_item += '</span><span class="sherif-basket_product_description_sc">';
                        basket_item += '<span>Размер: <span class="sherif-basket_product_description_sc_size">L</span></span>';
                        basket_item += '<span>Цвет: <span class="sherif-basket_product_description_sc_color">олива</span></span></span>';
                        basket_item += '<span class="sherif-basket_product_description_price">';
                        basket_item += '<span  class="sherif-basket_product_description_price_prev">Цена: <span>970</span> грн</span>';
                        basket_item += '<span  class="sherif-basket_product_description_price_current">Цена: <span>' + element.price_final + ' </span> грн</span></span>';
                        basket_item +=  '<a class="sherif-basket_product_description_link delete_from_basket" id_product="' + element.id + '"><i class="fas fa-times"></i> Убрать из корзины</a></div></div>';
                        basket_item +=  '<div class="sherif-basket_price">';
                        basket_item +=  '<div class="sherif-basket_quantity">';
                        basket_item +=  '<a togglers="down" class="sherif-basket_quantity_min product_togglers" id_product="' + element.id + '">-</a>';
                        basket_item +=  '<input type="text" id="basket_product_amount_' + element.id + '" class="product_amount_input sherif-basket_quantity_num" value="' + element.amount + '" id_product="' + element.id + '">';
                        basket_item +=  '<a togglers="up" class="sherif-basket_quantity_plus product_togglers" id_product="' + element.id + '">+</a></div>';
                        basket_item +=  '<span class="sherif-basket_sum sum_basket_' + element.id + '">Сумма <span>' + (element.price_final * element.amount) + '</span> грн</span>';    
                    	basket_item += '</div></div>';
               		});
            	}
                $('.sherif-basket_content_body').empty().append(basket_item);
                if($('.order_btn').hasClass('basket_content_footer_btns_btn_disabled')){
                	 	$('.order_btn').replaceWith('<a href="' + domain_url + '/ordering" class="sherif-basket_content_footer_btns_btn" data-dismiss="modal">ОФОРМИТЬ ЗАКАЗ</a>');
                	 }
			},
            error: function(data){
            	$('html').append( data.responseText );
            }
        });
		return false;
	})

	$("html").on('click', ".delete_from_basket", function(){
		var product_id = $(this).attr('id_product');
        if($('input[type="hidden"]').hasClass('count_basket_itm')){
            $(".count_basket_itm").val($(".count_basket_itm").val() - 1);
        }
		$.ajax({
            url: url + 'delete/' + product_id,
            type: 'delete',
            headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
            success: function( data, textStatus, jQxhr ){
            	$("#final_basket").empty().append(data.curr_price);
            	$(".total_basket").empty().append(data.curr_price);
                $('.bsk_itm_' + product_id).remove();
                if(data.products.length == 0){
                	 $('.sherif-basket_content_body').empty().append('<h3 class="basket_status">Корзина Пуста</h3>');
                	 if($('.order_btn').hasClass('basket_content_footer_btns_btn_disabled') == false){
                	 	$('.order_btn').addClass('basket_content_footer_btns_btn_disabled');
                	 }	
                }
			},
            error: function(data){
            	$('html').append( data.responseText );
            }
        });
	});

    $('html').on('change', '.product_amount_input', function(){
        
        var product_id = $(this).attr('id_product'),
            value = $(this).val();
            if(value.indexOf('-') == -1);{
                value = value.replace('-', '');
                $("#basket_product_amount_" + product_id).val(value);
                $("#ordering_product_amount_" + product_id).val(value);
                $(this).val(value);
            }
            if(value.indexOf('0') != -1){
                value = value.replace('0', '1');
                $("#basket_product_amount_" + product_id).val(value);
                $("#ordering_product_amount_" + product_id).val(value);
            }
        $.ajax({
            url: url + 'update/' + product_id,
            data: {'amount': $('#basket_product_amount_' + product_id).val()},
            dataType: 'json',
            type: 'put',
            headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
            success: function( data, textStatus, jQxhr ){
                $("#final_basket").empty().append(data.curr_price);
                $(".total_basket").empty().append(data.curr_price);
                var basket_item = "";
                console.log(data);
                if(data.products.length != 0){
                    data.products.forEach( function(element, index) {
                        basket_item += '<div class="sherif-basket_content_body_itm bsk_itm_' + element.id + '"><div class="sherif-basket_product">';
                        basket_item += '<img src="' + domain_url + '/storage/' + element.mainimage + '" class="sherif-basket_product_img" alt="">';
                        basket_item += '<div class="sherif-basket_product_description"><span class="sherif-basket_product_description_title">'
                        basket_item += '<a href="' + domain_url + '/get/product/' + element.id + '" class="sherif-basket_product_description_link">' + element.name + '</a><br/>'
                        basket_item += '<span class="sherif-basket_product_description_code">Артикул: <span>' + element.vendor_code + '</span> </span>';
                        basket_item += '<span class="sherif-basket_product_description_code">Код товара: <span>' + element.code + '</span></span>';
                        basket_item += '</span><span class="sherif-basket_product_description_sc">';
                        basket_item += '<span>Размер: <span class="sherif-basket_product_description_sc_size">L</span></span>';
                        basket_item += '<span>Цвет: <span class="sherif-basket_product_description_sc_color">олива</span></span></span>';
                        basket_item += '<span class="sherif-basket_product_description_price">';
                        basket_item += '<span  class="sherif-basket_product_description_price_prev">Цена: <span>970</span> грн</span>';
                        basket_item += '<span  class="sherif-basket_product_description_price_current">Цена: <span>' + element.price_final + ' </span> грн</span></span>';
                        basket_item +=  '<a class="sherif-basket_product_description_link delete_from_basket" id_product="' + element.id + '"><i class="fas fa-times"></i> Убрать из корзины</a></div></div>';
                        basket_item +=  '<div class="sherif-basket_price">';
                        basket_item +=  '<div class="sherif-basket_quantity">';
                        basket_item +=  '<a togglers="down" class="sherif-basket_quantity_min product_togglers" id_product="' + element.id + '">-</a>';
                        basket_item +=  '<input type="text" id="basket_product_amount_' + element.id + '" class="product_amount_input sherif-basket_quantity_num" value="' + element.amount + '" id_product="' + element.id + '">';
                        basket_item +=  '<a togglers="up" class="sherif-basket_quantity_plus product_togglers" id_product="' + element.id + '">+</a></div>';
                        basket_item +=  '<span class="sherif-basket_sum sum_basket_' + element.id + '">Сумма <span>' + (element.price_final * element.amount) + '</span> грн</span>';    
                        basket_item += '</div></div>';
                        $(".itm_currency_product").empty().append(element.price_final * element.amount);
                    });

                }
                $('.sherif-basket_content_body').empty().append(basket_item);

            },
            error: function(data){
                $('html').append( data.responseText );
            }
        });
        return false;
    });

	
});


