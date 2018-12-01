$(document).ready(function(){

	$("#sherif_telephon").mask("+380(99) 99-99-999");

	$(".submit_order").submit(function(){
		var th = $(this);
		if($(".count_basket_itm").val() > 0){
			$.ajax({
	            url: 'ordering/buy',
	            data: th.serialize(),
	            type: 'post',
	            headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
	            success: function( data, textStatus, jQxhr ){
	            	console.log(data);
				},
	            error: function(data){
	            	$('html').append( data.responseText );
	            }
	        });
        }else{
        	alert("Корзина Пуста!")
        }
		return false;
	});
});