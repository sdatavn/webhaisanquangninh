jQuery(document).ready(function($){

	var timelineBlocks = $('.cd-timeline-block'),
			offset = 0.8;

	//hide timeline blocks which are outside the viewport
	hideBlocks(timelineBlocks, offset);

	//on scolling, show/animate timeline blocks when enter the viewport
	$(window).on('scroll', function(){
		(!window.requestAnimationFrame) 
		? setTimeout(function(){ showBlocks(timelineBlocks, offset); }, 100)
		: window.requestAnimationFrame(function(){ showBlocks(timelineBlocks, offset); });
	});

	function hideBlocks(blocks, offset) {
		blocks.each(function(){
			( $(this).offset().top > $(window).scrollTop()+$(window).height()*offset ) && $(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
		});
	}

	function showBlocks(blocks, offset) {
		blocks.each(function(){
			( $(this).offset().top <= $(window).scrollTop()+$(window).height()*offset && $(this).find('.cd-timeline-img').hasClass('is-hidden') ) && $(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
		});
	}
});

jQuery(document).ready(function(){
		$("#owl-demo").owlCarousel({
		items : 5,
		lazyLoad : true,
		pagination : false,
		navigation : true,
		itemsDesktop: [1199, 5],
		itemsDesktopSmall: [979, 4],
		itemsTablet: [768,2],
		itemsTabletSmall: [480, 2],
		itemsMobile: [360, 2],
		navigationText : ["<span class='fa fa-angle-left'></span>", "<span class='fa fa-angle-right'></span>"]
	});

	$("#owl-slider").owlCarousel({
		navigation : true, // Show next and prev buttons
		paginationSpeed : 400,
		pagination : true,
		singleItem:true,
		stopOnHover: true,
		transitionStyle : "fade",
		autoPlay: 5000,
		navigationText : ["<span class='fa fa-angle-left'></span>", "<span class='fa fa-angle-right'></span>"]
	});
});

function compare(){
	jQuery('.modal-body.equal .row').html('');
	jQuery('.compare').each(function(){
		if(jQuery(this).prop('checked'))
		{
			node = jQuery('.product-item.'+jQuery(this).attr('data')).html();
			jQuery('.modal-body.equal .row').append("<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>"+node+"</div>");
		}
	});
}
jQuery(document).ready(function(){
	jQuery('button.equa').click(function(){
		jQuery('.modal-body.equal .row').html('');
		jQuery('.compare').each(function(){
			if(jQuery(this).prop('checked'))
			{
				node = jQuery('.product-item.'+jQuery(this).attr('data')).html();
				jQuery('.modal-body.equal .row').append("<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>"+node+"</div>");
			}
		});
		if(jQuery('.modal-body.equal .row').html() == '')
			jQuery('.modal-body.equal .row').html('<div class="text-center">Bạn chưa chọn sản phẩm nào!</div>');
	})
	Number.prototype.formatMoney = function(c, d, t){
		var n = this, 
				c = isNaN(c = Math.abs(c)) ? 2 : c, 
				d = d == undefined ? "." : d, 
				t = t == undefined ? "," : t, 
				s = n < 0 ? "-" : "", 
				i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", 
				j = (j = i.length) > 3 ? j % 3 : 0;
		return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
	};
	Haravan.onItemAdded = function(line_item) {
		console.log(line_item);
		jQuery('#cart-modal').modal();
		var html="<div class='content'><div class='col-sm-5 col-xs-12'><div class='cart1'><a href='"+line_item.url+"'><img src='"+line_item.image+"'/> </a></div><div class='cartItem'> <div><a href='"+line_item.url+"'>"+line_item.title+"</a></div><div><span class='item-price'></span></div> <div>Số lượng: "+line_item.quantity+"</div></div></div><div class='col-sm-7 col-xs-12'><div class='cartsum'> <div class='subTotal'>Gía trị đơn hàng:<em class='productPrice'></em> </div> <div>Giỏ hàng của bạn hiện có <span class='cart-count'></span> sản phẩm</div> </div></div></div></div>";

		jQuery('#cart-modal').find('.CartThumb').empty();
		jQuery('#cart-modal').find('.CartThumb').html(html);
		jQuery.getJSON('/cart.js', function(cart, textStatus) {
			jQuery('.cart-count').html(cart.item_count);
			jQuery('.productPrice').html((parseInt(cart.total_price)/100).formatMoney(0, '.', ',') + 'đ');
		});
		jQuery('.item-price').html((parseInt(line_item.price)/100).formatMoney(0, '.', ',') + 'đ');
		jQuery('.count-item').html();
	};
	Haravan.addItemFromForm = function(form_id, callback) {
		var params = {
			async: true,
			type: 'POST',
			url: '/cart/add.js',
			data: jQuery('#' + form_id).serialize(),
			dataType: 'json',
			success: function(line_item) {
				if ((typeof callback) === 'function') {
					callback(line_item);

				} else {
					Haravan.onItemAdded(line_item);
				}
			},
			//error: function(XMLHttpRequest, textStatus) {
			//Haravan.onError(XMLHttpRequest, textStatus);
			//}
		};
		jQuery.ajax(params);
	};

	$(document).ready(function(){
		/*function getCartAjax(){
console.log('Sơn Khùng');
			var cart = null;
			$('#cartform').hide();
			$('#myCart #exampleModalLabel').text("Giỏ hàng");
			jQuery.getJSON('/cart.js', function(cart, textStatus) {
				if(cart)
				{
					$('#cartform').show();
					$('.line-item:not(.original)').remove();
					$.each(cart.items,function(i,item){
						var total_line = 0;
						var total_line = item.quantity * item.price;
						tr = $('.original').clone().removeClass('original').appendTo('table#cart-table tbody');
						if(item.image != null)
							tr.find('.item-image').html("<img src=" + Haravan.resizeImage(item.image,'small') + ">");
						else
							tr.find('.item-image').html("<img src='//hstatic.net/0/0/global/noDefaultImage6_large.gif'>");
						vt = item.variant_options;
						if(vt.indexOf('Default Title') != -1)
							vt = '';
						tr.find('.item-title a').html(item.product_title + '<br><span>' + vt + '</span>').attr('href', item.url);
						tr.find('.item-quantity').html("<input id='quantity1' name='updates[]' min='1' type='number' value=" + item.quantity + " class='' />");
						if ( typeof(formatMoney) != 'undefined' ){
							tr.find('.item-one-price').html(Haravan.formatMoney(item.price, formatMoney));
							tr.find('.item-price').html(Haravan.formatMoney(total_line, formatMoney));
						}else {
							tr.find('.item-one-price').html(Haravan.formatMoney(item.price, ''));
							tr.find('.item-price').html(Haravan.formatMoney(total_line, ''));
						}
						tr.find('.item-delete').html("<a href='javascript:void(0)' onclick='deletecart(" + item.variant_id + ")' ><img class='delete-cart' src='//hstatic.net/244/1000030244/10/2016/5-31/icon-delelte.png'/> Bỏ sản phẩm</a>");
					});
					if ( typeof(formatMoney) != 'undefined' ){
						$('.item-total').html(Haravan.formatMoney(cart.total_price, formatMoney));
					}else {
						$('.item-total').html(Haravan.formatMoney(cart.total_price, ''));
					}
					$('.modal-title b').html(cart.item_count);
					$('*[id=cart-count]').html(cart.item_count);
					if(cart.item_count == 0){
						//$('#myCart button').attr('disabled', '');
						$('#myCart #cartform').addClass('hidden');
						$('#myCart #exampleModalLabel').html('Giỏ hàng của bạn đang trống. Mời bạn tiếp tục mua hàng.');
					}
					else{
						$('#myCart #exampleModalLabel').html('<img src="//hstatic.net/244/1000030244/10/2016/5-31/icon-cart.png" class="icon-cart"/> Giỏ hàng của bạn (' + cart.item_count + 'sản phẩm) <i class="fa fa-play" aria-hidden="true"></i>');
						$('#myCart #cartform').removeClass('hidden');
						$('#myCart button').removeAttr('disabled');
					}

				}
				else{
					$('#myCart #exampleModalLabel').html('Giỏ hàng của bạn đang trống. Mời bạn tiếp tục mua hàng.');
					$('#cartform').hide();
				}
			});

		}*/
		$('#cart-target a').click(function(event){
			event.preventDefault() ;
			getCartAjax();

			$('#myCart').modal('show');
			$('.modal-backdrop').css({'height':$(document).height()});
		});
		$('a[data-spy=scroll]').click(function(){
			event.preventDefault() ;
			$('body').animate({scrollTop: ($($(this).attr('href')).offset().top - 20) + 'px'}, 500);
		})
		$('#update-cart-modal').click(function(event){
			event.preventDefault();
			if (jQuery('#cartform').serialize().length <= 5) return;
			$(this).html('Đang cập nhật');
			var params = {
				type: 'POST',
				url: '/cart/update.js',
				data: jQuery('#cartform').serialize(),
				dataType: 'json',
				success: function(cart) {
					if ((typeof callback) === 'function') {
						callback(cart);
					} else {

						getCartAjax();
					}

					$('#update-cart-modal').html('Cập nhật');
				},
				error: function(XMLHttpRequest, textStatus) {
					Haravan.onError(XMLHttpRequest, textStatus);
				}
			};
			jQuery.ajax(params);
		});
		/*function deletecart(variant_id){
			var params = {
				type: 'POST',
				url: '/cart/change.js',
				data: 'quantity=0&id=' + variant_id,
				dataType: 'json',
				success: function(cart) {
					getCartAjax();
				},
				error: function(XMLHttpRequest, textStatus) {
					Haravan.onError(XMLHttpRequest, textStatus);
				}
			};
			jQuery.ajax(params);
		}*/
		$('#checkout').click(function(){
			$('#cartform').submit();
		})

		/*	$('.addcartindex').click(function(e){
		e.preventDefault();
		var id = $(this).attr('data-id');
		var params = {
			type: 'POST',
			url: '/cart/add.js',
			async : false,
			data: 'quantity=1&id=' + id,
			dataType: 'json',
			success: function(line_item) {
				if ((typeof callback) === 'function') {
					callback(line_item);
				} else {

					getCartAjax();
					$('#myCart').modal('show');
					$('.modal-backdrop').css({'height':$(document).height()});
				}
			},
			error: function(XMLHttpRequest, textStatus) {
				Haravan.onError(XMLHttpRequest, textStatus);
			}
		};
		jQuery.ajax(params);
	})*/
	});



})