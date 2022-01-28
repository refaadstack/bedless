(function ($) {
 "use strict";

/*----------------------------
 jQuery MeanMenu
------------------------------ */
	jQuery('nav#dropdown').meanmenu();	
	 
/*----------------------------
 owl active
------------------------------ */  
	$("#products-carousel").owlCarousel({
		autoPlay: false, 
		slideSpeed:1000,
		pagination:false,
		navigation:true,	  
		items : 4,
		navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		itemsDesktop : [1199,4],
		itemsDesktopSmall : [980,3],
		itemsTablet: [767,2],
		itemsMobile : [479,1],
	});
	
	$("#upsell-products-carousel").owlCarousel({
		autoPlay: false, 
		slideSpeed:1000,
		pagination:false,
		navigation:true,	  
		items : 4,
		navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		itemsDesktop : [1199,4],
		itemsDesktopSmall : [980,3],
		itemsTablet: [768,2],
		itemsMobile : [479,1],
	});
	
	$("#testimonial-carousel").owlCarousel({
		autoPlay: false, 
		slideSpeed:1000,
		pagination:true,
		navigation:false,	  
		singleItem:true,
		transitionStyle: "backSlide"
	});
	
	$("#related-products-carousel").owlCarousel({	 
		navigation : false, // Show next and prev buttons
		pagination:false,
		slideSpeed : 300,
		paginationSpeed : 600,
		singleItem:true	 
	});
/*----------------------------
 price-slider active
-----------------------------*/  
	$( "#price-slider" ).slider({
	 range: true,
	 min: 0,
	 max: 1169,
	 values: [ 200, 969 ],
	 slide: function( event, ui ) {
		$( "#min-price" ).val( ui.values[ 0 ] );
		$( "#max-price" ).val( ui.values[ 1 ] );
	 }
	});
	$( "#min-price" ).val( $( "#price-slider" ).slider( "values", 0 ));   
	$( "#max-price" ).val( $( "#price-slider" ).slider( "values", 1 ));  
	   
/*----------------------------
 venobox
-----------------------------*/ 
	$('.venobox').venobox();
	   
/*----------------------------
 cart-plus-minus-button
-----------------------------*/
	//$(".cart-plus-minus").append('<span class="decrease-btn qty-btn">-</i></span><span class="increase-btn qty-btn">+</span>');
	
	$(".qty-btn").on("click", function () {
		var $button = $(this);
		var oldValue = $button.parent().find("input").val();
		if ($button.text() == "+") {
			if (oldValue < batas){
			var newVal = parseFloat(oldValue) + 1;
			}else{
			var newVal = batas;
			}
		} else {
			// Don't allow decrementing below zero
			if (oldValue > 1) {
				var newVal = parseFloat(oldValue) - 1;
			} else {
				newVal = 1;
			}
		}
		$button.parent().find("input").val(newVal);
		
	});
		
/*--------------------------
 scrollUp
---------------------------- */	
	$.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade',
		animationSpeed: 500
    }); 	   
 
})(jQuery); 