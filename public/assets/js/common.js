$(function() {

	//SVG Fallback
	if(!Modernizr.svg) {
		$("img[src*='svg']").attr("src", function() {
			return $(this).attr("src").replace(".svg", ".png");
		});
	};

	//E-mail Ajax Send
	//Documentation & Example: https://github.com/agragregra/uniMail
	$("form1").submit(function() { //Change
		var th = $(this);
		$.ajax({
			type: "POST",
			url: "mail.php", //Change
			data: th.serialize()
		}).done(function() {
			alert("Thank you!");
			setTimeout(function() {
				// Done Functions
				th.trigger("reset");
			}, 1000);
		});
		return false;
	});

	//Chrome Smooth Scroll
	try {
		$.browserSelector();
		if($("html").hasClass("chrome")) {
			$.smoothScroll();
		}
	} catch(err) {

	};

	$('.sherif_home_main-box_scroll .sherif-product_content_link').matchHeight();
	$(".incision_stock-box-product .promt_main").matchHeight();
	$(".sherif_home_main_novelties_items .sherif-product_content_link").matchHeight();
	
	$(".slider").owlCarousel({
		loop:true,
		items:1,
		itemElement:"slide-wrap",
		nav:true,
	});

	$(".owl-prev").html("<i class='fas fa-angle-left'></i>");
	$(".owl-next").html("<i class='fas fa-angle-right'></i>");
	$(".owl-dots").addClass("hidden-xs hidden-sm");
	$("img, a").on("dragstart", function(event) { event.preventDefault(); });


	$(".map_toggle").click(function(){
		var toggle = $(this).attr("toggle");
		if(toggle == "on"){
			$(".map_toggle").attr("toggle", "off");
			$(".map_toggle").css('color', '#213951')
			$(".map_toggle svg").replaceWith('<i class="far fa-arrow-alt-circle-down"></i>');
			$(".sherif_mobile_wrap").removeClass('sherif_mobile_wrap_toggle');
			$(".sherif_home_footer_map").removeClass('map_height');
		}else{
			$(".map_toggle").attr("toggle", "on");
			$(".map_toggle").css('color', '#e00000')	
			$(".map_toggle svg").replaceWith('<i class="far fa-arrow-alt-circle-up"></i>');
			$(".sherif_mobile_wrap").addClass('sherif_mobile_wrap_toggle');
			$(".sherif_home_footer_map").addClass('map_height');
		}
	});

	$(".mobile_toggle").click(function(){
		var toggle_object = $(this).attr("toggle-object");
		var toggle = $(this).attr("toggle");
		var Class = toggle_object + "_mobile";
		var Object = ".toggle_mobile_" + toggle_object;
		if(toggle == "on"){
			$(this).attr("toggle", "off");
			$(this).css('color', '#213951')
			$(this).empty().append('<i class="far fa-arrow-alt-circle-down"></i>');
			$(Object).removeClass(Class);
		}else{
			$(this).attr("toggle", "on");
			$(this).css('color', '#e00000')	
			$(this).empty().append('<i class="far fa-arrow-alt-circle-up"></i>');
			$(Object).addClass(Class);
		}
		// $(".toggle_mobile_" + toggle_object).addClass()
	});


	$(".catalog-toggle").click(function(){
		var toggle = $(this).attr("toggle");
		if(toggle == "on"){
			$(".catalog-toggle").attr("toggle", "off");
			$(".catalog-toggle svg").replaceWith('<i class="fas fa-caret-down"></i>');
			$(".sherif_header_catalog").css("height", "0");	
		}else{
			$(".catalog-toggle").attr("toggle", "on");
			$(".catalog-toggle svg").replaceWith('<i class="fas fa-caret-up"></i>');
			$(".sherif_header_catalog").css("height", "auto");
		}
	});


    $(document).ready(function(){
        $.fn.animate_Text = function() {
            var string = this.text();
            return this.each(function(){
                var $this = $(this);
                $this.html(string.replace(/./g, '<span class="new">$&</span>'));
                $this.find('span.new').each(function(i, el){
                    setTimeout(function(){ $(el).addClass('div_opacity'); }, 90 * i);
                });
            });
        };
        $('.sherif_alert .sherif_alert_text').show();
        $('.sherif_alert .sherif_alert_text').animate_Text();
    });


    if($('#product-category').length>0){

        $('.sort-by-filter').select2().on('change', function() {
            window.location.href = commonReplaceUrlParam(window.location.href, "sort_by", $(this).val());
        });
    }

});
