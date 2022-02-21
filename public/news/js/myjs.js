function accrodion () {
    
	if ($('.accrodion-grp').length) {
		
		$('.accrodion-grp').each(function () {
			var accrodionName = $(this).data('grp-name');
			var Self = $(this);
			Self.addClass(accrodionName);
			Self.find('.accrodion .accrodion-content').hide();
			Self.find('.accrodion.active').find('.accrodion-content').show();
			Self.find('.accrodion').each(function() {
				$(this).find('.accrodion-title').on('click', function () {
					if ($(this).parent().hasClass('active') === false ) {					
						$('.accrodion-grp.'+accrodionName).find('.accrodion').removeClass('active');
						$('.accrodion-grp.'+accrodionName).find('.accrodion').find('.accrodion-content').slideUp();
						$(this).parent().addClass('active');					
						$(this).parent().find('.accrodion-content').slideDown();	
					};
				});
			});
		});
		
	};
}
jQuery(document).on('ready', function () {

	
	(function ($) {
		// add your functions
		
		accrodion();
		
	})(jQuery);

});

$('i.Quick-view').click(function (e) {
	e.preventDefault();
	
	let url = $(this).data('url');
console.log(url);
	
	$.get(url, function (data) {
		console.log(data);
		
		$('.product-image').attr('src', data.thumb);
		$('.product-name').html(data.name);
		// $('.product-description').html(data.description);
		$('.product-price-old').html(data.price_default);
        $('.product-price-sale').html(data.price_sale);
		$('.add_to_cart').attr('data-url',data.linkAddToCart);

	}, 'json');
});
$('.action-cart').click(function (e) {
	e.preventDefault();
	let $cart = $('.minicart-btn');
       
        let $url = $(this).data('url');
	
		console.log($url);
	
	$.get($url, function (result) {	
		console.log(result)
		$(".cart-item_count").text(result.totalItem);
		$cart.notify('Thêm giỏ hàng thành công!', {
			className: 'success',
			position: 'top left',
			
		});

	}, 'json');
});
$('.action-wishlist').click(function (e) {
	e.preventDefault();
	
	let $cart = $('.minicart-btn');
	let $url = $(this).data('url');

	console.log($url);

$.get($url, function (result) {	
	console.log(result)
	$(".wishlist-item_count").text(result.totalItem);
	$cart.notify('Thêm vào danh sách yêu thích thành công!', {
		className: 'success',
		position: 'top left',
		
	});

}, 'json');

});
let $selectChangeAttrAjax = $("select.select-ajax");
$selectChangeAttrAjax.on("change", function () {
	
	let select_value = $(this).val();
	let $url = $(this).data("url");
	
	$url = $url.replace("value_new", select_value);
	console.log($url);
	// url = route('cart/ajaxShip',['id'=> select_value]);
	$.get($url, function (data) {
		
		console.log(data);
		$('span.ship-check-out').text(data.shipPrice);
		$('span.gandtotal-check-out').text(data.finalPrice);
		
		

	}, 'json');
});

$("#cbox").click(function () {
	
	$("#ship-box").removeAttr("checked");
});

function addToCart(e){
	e.preventDefault();
	
	let $cart = $('.minicart-btn');
	let quantity = $('.detail-quantity').val();
	if(quantity < 1){
		quantity = 1;
	}
	let $url = $(this).data('url');
	$url = $url.replace("value_new", quantity);
	console.log($url);
	$.get($url, function (result) {
		console.log(result)
		$(".cart-item_count").text(result.totalItem);
		$('#exampleModalCenter').modal('hide');
		$('.detail-quantity').val(1);
		$cart.notify('Thêm giỏ hàng thành công!', {
			className: 'success',
			position: 'top left',
			
		});

	}, 'json');
	
}
$(function(){
$('.btn-add-to-cart').on('click',addToCart);
});
$('.ajax-quantity').change(function (){
	let $cart = $('.minicart-btn');
	$quantity = $(this);
	let select_value = $(this).val();
	let quantity = $(this).val();
	let $url = $(this).data("url");
	$url = $url.replace("value_new", select_value);
	
	console.log($url);
	$.get($url, function (result) {
		console.log(result);
		var a = 'span.subtotal-'+ result.id;
		console.log(result);
		$(this).attr('value', result.quantity);
		$(a).text(result.itemPrice);
		$('td.sub-total').text(result.totalPrice);
		$('td.gand-total').text(result.totalPrice);
		$(".cart-item_count").text(result.totalItem);
		$cart.notify('Cập nhật giỏ hàng thành công!', {
			className: 'success',
			position: 'top left',
			
		});

	}, 'json');
});
$('.remove-product-cart').click(function (e) {
	e.preventDefault();
	
	let url = $(this).data("url");
	let $cart = $('.minicart-btn');

	console.log(url);
	$.get(url, function (result) {

		var a = 'tr.product-'+ result.id;
		console.log(result);
		
		$(a).remove();
		
		$('td.sub-total').text(result.totalPrice);
		$('td.gand-total').text(result.totalPrice);
		$(".cart-item_count").text(result.totalItem);
		$cart.notify('Cập nhật giỏ hàng thành công!', {
			className: 'success',
			position: 'top left',
			
		});

	}, 'json');
});
$('.remove-product-wishlist').click(function (e) {
	e.preventDefault();
	
	let url = $(this).data("url");
	let $cart = $('.minicart-btn');

	console.log(url);
	$.get(url, function (result) {

		var a = 'tr.product-wishlist-'+ result.id;
		console.log(result);
		
		$(a).remove();
		
		$(".wishlist-item_count").text(result.totalItem);
		$cart.notify('Xóa thành công!', {
			className: 'success',
			position: 'top left',
			
		});

	}, 'json');
});
$('.coupon-submit').click(function (e) {
	e.preventDefault();
	
	let $url = $(this).data("url");
	let coupon = $('input.coupon-value').val();
	$url = $url.replace("value_new", coupon);
	console.log(coupon);
	console.log($url);
	$.get($url, function (result) {
		console.log(result);
		// var a = 'tr.product-'+ result.id;
		if(result.message == 'success'){
		$('td.gand-total').text(result.totalPrice);
		$('td.priceCoupon').text(result.value);
		$('input.coupon-value').notify('Sử dụng mã giảm giá thành công!', {
			className: 'success',
			position: 'top right',		
		});
		
		
}else{
	$('td.gand-total').text(result.totalPrice);
	$('td.priceCoupon').text(result.value);
	$('input.coupon-value').notify('Mã giảm giá hết hạn hoặc không chính xác!', {
		
		className: 'danger',
		position: 'top right',		
	});
}
		
	}, 'json');
});
$(".btn-search-home").click(function() {

	let $inputSearchValue = $("input[name  = search_value]");
	var pathname	= window.location.pathname;
	console.log($inputSearchValue);
	let searchParams= new URLSearchParams(window.location.search);	// ?filter_status=active
	let params 		= ['select_sort'];
	let link		= "";
	$.each( params, function( key, param ) { // filter_status
		if (searchParams.has(param) ) {
			link += param + "=" + searchParams.get(param) + "&" // filter_status=active
		}
	});
	
	
	let search_value = $inputSearchValue.val();

	if(search_value.replace(/\s/g,"") == ""){
		alert("Nhập vào giá trị cần tìm !!");
	} else {
		window.location.href = pathname + "?" + link + '&s=' + search_value;
		$inputSearchValue.text(search_value);
	}
});
$('select[name="filter_sort"]').on("change", function() {
	var pathname = window.location.pathname;
	let searchParams = new URLSearchParams(window.location.search);
	params = [
	
		"s",
	];

	let link = "";
	$.each(params, function(key, value) {
		if (searchParams.has(value)) {
			link += `${value}=${searchParams.get(value)}&`;
		}
	});

	let select_sort = $(this).val();
	// $('select[name="select_sort"]'.option)
	window.location.href = `${pathname}?select_sort=${select_sort}`;
	// window.location.href = `${pathname}?${link}filter_sort=${filter_sort}`;
	
});
$('.filter-price').click(function (e){
	e.preventDefault();
	var pathname = window.location.pathname;
	let searchParams = new URLSearchParams(window.location.search);
	params = [
	
		"s",
		"select_sort"
	];

	let link = "";
	$.each(params, function(key, value) {
		if (searchParams.has(value)) {
			link += `${value}=${searchParams.get(value)}&`;
		}
	});

	let select_sort = $(this).val();
	let min = $( "#amount" ).val();
	
	console.log(min);
	// $('select[name="select_sort"]'.option)
	// window.location.href = `${pathname}?select_sort=${select_sort}`;
	window.location.href = `${pathname}?${link}p=${min}`;
	
});
$( "#slider-range" ).slider({
	
	range: true,
	min: 100000,
	max: 2000000,
	step: 10000,
	values: [  100000, 2000000 ],
	slide: function( event, ui ) {
	$( "#amount" ).val( ui.values[ 0 ] + "đ" + " - " + ui.values[ 1 ] + "đ" );
   }
});

$( "#amount" ).val( $( "#slider-range" ).slider( "values", 0 )+"đ" +
   " - " + $( "#slider-range" ).slider( "values", 1 ) +"đ" );
$('.check-cart').click(function (e) {
	e.preventDefault();
	
	let $url = $(this).data("url");
	let code = $('input.code_value').val();
	$url = $url.replace("value_new", code);
	console.log(code);
	console.log($url);
	$.get($url, function (result) {
		console.log(result);
		
		if(result.message == 'success'){
		$('input.check-cart-name').attr('value',result.name);
		$('input.check-cart-phone').attr('value',result.phone);
	
		$('input.check-cart-address').attr('value',result.address);
		$('input.check-cart-date').attr('value',result.date);
		$('input.check-cart-status').attr('value',result.status);
		
		
		
		
}else{
	$('input.check-cart-name').attr('value','');
		$('input.check-cart-phone').attr('value','');
		$('input.check-cart-detail').attr('value','');
		$('input.check-cart-address').attr('value','');
		$('input.check-cart-date').attr('value','');
		$('input.check-cart-status').attr('value','');
	$('input.code_value').notify('Mã đơn hàng không chính xác', {
		className: 'danger',
		position: 'top right',		
	});
}
		
	}, 'json');
});
$(function () {

	var pathname = window.location.pathname;
	var link = $('.zvn-menu a').find('a').attr('href');
	$('.zvn-menu a').each(function () {
		var link = $(this).attr('href');
		if (pathname == link) {
			var elmThis=$(this);
			var elmDropmenu = elmThis.parents('.dropdown');
		   if(elmDropmenu.length > 0){
			   elmDropmenu.children("a").addClass('active');
		   }else{
			   elmThis.addClass('active');
		   }
		}
	});
	$(document).on('click','.zvn-read-more',function () {
		var $elmContainText =$(this).siblings('.zvn-panel');
		var $elmDots = $elmContainText.find('.zvn-dots');
		var $elmMore = $elmContainText.find('.zvn-more');
		if ($elmDots.css("display") === "none") {
			$elmDots.css("display",'inline');
			$(this).text("Đọc thêm");
			$elmMore.css("display",'none');
		}else{
			$elmDots.css("display",'none');
			$(this).text("Thu gọn");
			$elmMore.css("display",'inline');
		}
	});

});
// $('select[name="select-sort"]').change(function () {
// 	let sort = $(this).val();
// 	let url = $(this).data('url');
// 	console.log(url);
// 	url = url.replace('value_new', sort);
// 	console.log(url);
// 	url= `list.html?sort=${sort}`;
// 	$.get(
// 		url,
// 		function (data) {
			
// 			window.location.href = url;
// 			// $('select[name="select-sort"]').attr('data-url'=`/project/index.php?module=fontend&controller=book&action=list&sort=value_new`);
// 		}
// 	)

// });

