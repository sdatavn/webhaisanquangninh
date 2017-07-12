<!DOCTYPE HTML>
<html>
<head>
    <title>@yield('title')</title>
    <link href="{{ URL::asset('public/js-css/bootstrapa602.css?v=195')}}" rel='stylesheet' type='text/css'  media='all'  />
    <link href="{{ URL::asset('public/js-css/stylesa602.css?v=195')}}" rel='stylesheet' type='text/css'  media='all'  />
    <link href="{{ URL::asset('public/js-css/owl.carousela602.css?v=195')}}" rel='stylesheet' type='text/css'  media='all'  />
    <link href="{{ URL::asset('public/js-css/owl.theme.css')}}" rel='stylesheet' type='text/css'  media='all'  />
    <link href="{{ URL::asset('public/js-css/owl.transitions.css')}}" rel='stylesheet' type='text/css'  media='all'  />
    <link href="{{ URL::asset('public/js-css/settingsa602.css?v=195')}}" rel='stylesheet' type='text/css'  media='all'  />
    <link href="{{ URL::asset('public/js-css/responsivea602.css?v=195')}}" rel='stylesheet' type='text/css'  media='all'  />
    <script src="{{ URL::asset('public/js-css/jquery-1.11.3.min.js')}}" type='text/javascript'></script>
    <script src="{{ URL::asset('public/js-css/bootstrapa602.js?v=195')}}" type='text/javascript'></script>
    <script src="{{ URL::asset('public/js-css/owl.carousela602.js?v=195')}}" type='text/javascript'></script>
    <script src="{{ URL::asset('public/js-css/maina602.js?v=195')}}" type='text/javascript'></script>
    <script src="{{ URL::asset('public/js-css/modernizra602.js?v=195')}}" type='text/javascript'></script>
    <script src="{{ URL::asset('public/js-css/option_selection.js')}}" type='text/javascript'></script>
    <script src="{{ URL::asset('public/js-css/api.jquery.js')}}" type='text/javascript'></script>
    <script src="{{ URL::asset('public/js-css/jquery.slicknava602.js?v=195')}}" type='text/javascript'></script>
    <link href="{{ URL::asset('public/js-css/slicknava602.css?v=195')}}" rel='stylesheet' type='text/css'  media='all'  />
    <script data-target=".product-resize" data-parent=".content-product-list" data-img-box=".image-resize" src="{{ URL::asset('public/js-css/fixheightproducta602.js?v=195')}}"></script> 
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('public/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <script type="text/javascript" src="{{ URL::asset('public/validate/jquery.validate.js')}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        $('ul.left-nav li.level0.active ul.dropdown').slideUp();
        $('ul.left-nav li.level0.active').hover(
            function () {
                $(this).find('ul.dropdown').slideDown();
            },
            function () {
                $(this).find('ul.dropdown').slideUp();
            })
        </script>
        <script>
            $(document).ready(function () {
                if ($(window).width() < 768) {
                    var h = 0, h2 = 0, h3 = 0, h4 = 0;
                    $(window).resize(function () {
                        $('.product-wrapper').hImageLoaded(function () {
                            $('.product-item').each(function () {
                                if ($(this).find('.image img').height() > h) {
                                    h = $(this).find('.image img').height();
                                }
                                if ($(this).height() > h2) {
                                    h2 = $(this).height();
                                }
                            })
                            $('.product-item').height(h2);
                        });
                    });
                }
            });
        </script>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9&appId=730082367044134";
          fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>
        <style type="text/css">label.error{
            color:red;
            padding-left: 13px;
        }</style>
    </head>
    <body rel="index">
        <div class="header-top hidden-xs hidden-sm">
            <div class="container">
                <div class="row">
                    <div class="hotline-top no-padding-left col-md-8 hidden-xs hidden-sm">
                        @foreach($lienhe as $lh)
                        Hotline: <strong><a > {{$lh->zalo}}</a></strong>
                        @endforeach()
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div id="menu_mobi" class="visible-xs visible-sm col-md-1 col-sm-2 col-xs-2" style="float:left"> 
                        <link href="{{url('public/js-css/menu-mobilea602.css?v=195')}}" rel='stylesheet' type='text/css'  media='all'  />
                        <div class="slicknav_menu icon_slicknav_menumb">                            
                            <a href="javascript:void(0)" id="showmenu-mobile" class="slicknav_btn slicknav_collapsed" style="outline: none;">
                                <span class="slicknav_menutxt"></span>
                                <span class="slicknav_icon slicknav_no-text fa fa-th-list menu-toggle"></span>
                            </a>
                        </div>
                        <section id="wrap-header-mobile">
                            <nav id="menu-mobile" class="left visible-xs">
                                <a class="click-out-menu"><span class="background-icon-close"><i class="icon-close"></i></span></a>
                                <div class="block-sidebar header-menu col-md-12 col-sm-12 col-xs-12">
                                    <span class="title-hotline">Hotline mua hàng</span>
                                    <div class="hotline-icon">
                                        <img src="{{url('public/images/hotline-icona602.png?v=195')}}"/>
                                    </div>
                                    <ul class="hotline-product hotline-menu">
                                        <li>Hotline: <strong><a >0999.999.999 - FB/haisanquangninh.org</a></strong></li>
                                    </ul>   
                                </div>
                                <ul class="col-xs-12">
                                    <li><a href="{{ url('/trangchu') }}">trang chủ</a></li>
                                    <li><a href="{{ url('/gioithieu') }}">giới thiệu</a></li>
                                    @foreach($menu as $MeNu)
                                    <li><a href="{{url('danhmuc')}}/{{$MeNu->url}}">{{$MeNu->name}}</a>
                                    </li>
                                    @endforeach
                                    <li><a href="{{ url('/lienhe') }}">liên hệ</a></li>
                                    <li class=""><a href="{{ url('/cart') }}">Giỏ Hàng ({{ Cart::instance('default')->count(false) }})</a></li>
                                </ul>
                            </nav>
                        </section>
                    </div>
                    <div class="logo no-padding-left col-lg-5 col-md-4 col-sm-8 col-xs-7">
                        <a href="{{url('/')}}"><img alt="" src="{{url('public/responsive_filemanager/thumbs/logo.png')}}" width="280"  /></a>
                    </div>

                    <div class="visible-md visible-lg visible-sm block_search col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <form id="searchbox" method="get" action="{{url('timkiem')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="control-group input-group">
                                <label for="index_input_search" class="search-input-label"><i class="fa fa-search" aria-hidden="true"></i></label>
                                <input type="text" name="tukhoa"  class="index_input_search form-control" placeholder="Nhập Tên Sản Phẩm">
                                <span class="input-group-btn">
                                    <button class="btn_search_submit btn btn-default" type="submit">Tìm ngay</button>
                                </span>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="row visible-xs">
                    <div class="block_search col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <form id="searchbox" action="http://haisanquangninh.org/search" method="GET">
                            <div class="control-group input-group wrap-input">
                                <input type="hidden" name="type" value="product" />
                                <label for="index_input_search" class="search-input-label"><i class="fa fa-search" aria-hidden="true"></i></label>
                                <input type="text" name="q" value="" class="index_input_search form-control" placeholder="Nhập từ khóa tìm kiếm">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="main_menu hidden-sm hidden-xs" id="main_nav">
            <div class="container">
                <div class="row">
                    <nav class="no-padding col-md-9 col-sm-8 hidden-xs">
                        <ul class="nav navbar-nav menu_hori">
                            <li><a href="{{ url('/trangchu') }}">Trang Chủ</a></li>
                            <li><a href="{{ url('/gioithieu') }}">GIỚI THIỆU</a></li>
                            @foreach($menu as $MeNu)
                            <li><a href="{{url('danhmuc')}}/{{$MeNu->url}}">{{$MeNu->name}}</a>
                            </li>
                            @endforeach
                            <li><a href="{{ url('/lienhe') }}">LIÊN HỆ</a></li>
                            <li><a href="{{ url('/cart') }}">giỏ hàng ({{ Cart::instance('default')->count(false) }})</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!--/Header-->
    @yield('content')        
    <!--main-content-->
    <!--Fooer-->
    <footer>
        <section>
            <div class="footer-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12 footer-newsletter-title">
                            <img src="{{url('public/images/newsletter-icona602.jpg?v=195')}}"/>
                            <span>
                                Đăng ký nhận<br/> bản tin
                            </span>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 footer-newsletter-description">
                            Cập nhật nhiều ưu đãi và thông tin hữu ích
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12" id="frmNewsLetter">
                            <form id="mc-embedded-subscribe-form" accept-charset="UTF-8" action="guigmail" class="contact-form" method="get" style="width: 103.6%">
                                <input name="form_type" type="hidden" value="customer">
                                <input name="utf8" type="hidden" value="✓">
                                <input type="email" name="gmail" id="newsleterInput" placeholder="Email của bạn" class="form-control"/>
                                <input type="submit" id="newsletter_form_submit" class="form-control adr button" value="Gửi">
                            </form>
                            <script type="text/javascript">
                                $("#mc-embedded-subscribe-form").validate({
                                    rules:{
                                        gmail:{
                                            required:true,
                                            email:true,
                                        }
                                    },
                                    messages:{
                                        gmail:{
                                            required:"Vui Lòng Nhập Gmail Nhận Thông Báo",
                                            email:"nhập email không đúng",
                                        }
                                    }
                                })
                            </script> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><ul class="footer-col">
                        <h4>Giới thiệu chung</h4>
                        <li ><a href="{{url('gioithieu')}}">Giới thiệu</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><ul class="footer-col">
                    <h4>Hỗ trợ khách hàng</h4>
                    <li ><a href="{{url('muahang')}}">Hướng dẫn mua hàng</a></li>
                    <li ><a href="{{url('thanhtoan')}}">Hướng dẫn thanh toán</a></li>
                    <li ><a href="{{url('lienhe')}}">Liên hệ</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><ul class="footer-col">
                @foreach($lienhe as $lh9)
                <h4>Kết nối chúng tôi </h4>
                <li style="list-style:none; margin-bottom:12px;"><a href="{{$lh9->fanpage}}" target="_blank" style="position:relative;"><img src="{{url('public/images/facebook.png')}}" width="24" height="24"><span style="position:absolute; top:-1px; left:35px;">Facebook</span></a></li>
                <li style="list-style:none; margin-bottom:12px;"><a href="{{$lh9->google}}" target="_blank" title="Hải sản quảng ninh trên Google +" style="position:relative;"><img src="{{url('public/images/google.png')}}" alt="Hải sản quảng ninh trên Google+" width="25" height="25"><span style="position:absolute; top:-1px; left:35px;">Google +</span></a></li>
                <li style="list-style:none;"><a href="{{$lh9->youtube}}" target="_blank" style="position:relative;"><img src="{{url('public/images/Youtube-Icon-copy.jpg')}}" alt="" width="26" height="26"><span style="position:absolute; top:-1px; left:35px;">YouTube</span></a></li>
                @endforeach
            </ul>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="width: 49.333333%;">
            @foreach($lienhe as $lh2)
            <iframe src="https://www.facebook.com/plugins/page.php?href={{$lh2->fanpage}}=&amp;tabs&amp;width=980&amp;height=154&amp;small_header=true&amp;adapt_container_width=false&amp;hide_cover=false&amp;show_facepile=true&amp;appId" width="100%" height="100%" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
            @endforeach
        </div>
    </div>
</section>
<style>
    .fb-page.fb_iframe_widget{
        height: 220px;
        width: 240px;
    }
    .fb-page.fb_iframe_widget span{
        height: 100% !important;
        width: 100% !important;
    }
    .fb-page.fb_iframe_widget._h7r {
        margin-bottom: 20px;
    }
    .uiScaledImageContainer {
        position: relative;
        overflow: hidden;
        width: 222px;
        height: 100px;
    }
    @media screen and (max-width: 450px)
    {
    }
</style>
</footer>
</div>
<section class="copyright" style="margin-top:5px;">
    <div class="container">
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 text-center">
            <a href="{{url('trangchu')}}"><img class="logo-foot" alt="" src="{{url('public/images/logo.png')}}" width="280"  /></a>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" style="width:65%; padding-top:10px;">
            @foreach($lienhe as $lh1)
            <p>&copy; Copyright 2015 by {{$lh1->tentrangweb}}</p>
            <p>{{$lh1->diachi}}</p>
            <p>{{$lh1->zalo}}</p>
            @endforeach
        </div>
    </div>
</section>  
<script>
    (function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.quantity').on('change', function() {
            var id = $(this).attr('data-id')
            $.ajax({
              type: "PATCH",
              url: '{{ url("/cart") }}' + '/' + id,
              data: {
                'quantity': this.value,
            },
            success: function(data) {
                window.location.href = '{{ url('/cart') }}';
            }
        });

        });

    })();

</script>

</body>
<style type="text/css">
    .btn-top {
        background-image: url({{URL::asset('btn_top/btn_top.png')}});
background-repeat: no-repeat;
border: medium none;
bottom:220px;
cursor: pointer;
display: none;
height: 50px;
outline: medium none;
padding: 0;
position: fixed;
right: 20px;
width: 50px;
z-index: 9999;
}
</style>
<script language="javascript">
    jQuery(document).ready(function ($) {
        if ($(".btn-top").length > 0) {
            $(window).scroll(function () {
                var e = $(window).scrollTop();
                if (e > 300) {
                    $(".btn-top").show()
                } else {
                    $(".btn-top").hide()
                }
            });
            $(".btn-top").click(function () {
                $('body,html').animate({
                    scrollTop: 0
                })
            })
        }
    });
</script>
<script src="{{ URL::asset('public/js-css/jquery.spritezooma602.js?v=195')}}" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        $('#modal-checkout-button').click(function(e){
            e.preventDefault();
            window.location = '../../checkout.html';
        });
        jQuery('#main-menu').slicknav({
            label: '',
            prependTo:'#menu_mobi'
        });
        jQuery("#showmenu-mobile").click(function(e){
            e.preventDefault();
            jQuery("#menu-mobile").toggleClass("show");
            jQuery(".click-out-menu").toggleClass("show-menu");
                //jQuery("#wrap-header-mobile").append('<span class="background-rgba"></span>');  
                jQuery('body').addClass('overflow-hidden');
                jQuery('.background-icon-close').show();
                jQuery('#opacity').addClass("opacity-body");
            });
        jQuery('.click-out-menu').click(function(){
            jQuery('#menu-mobile').removeClass("show");
            jQuery(this).removeClass("show-menu");
            jQuery('body').removeClass('overflow-hidden');
            jQuery('.background-icon-close').hide();
            jQuery('#opacity').removeClass("opacity-body");
        });
        jQuery('.background-icon-close').click(function(){
            jQuery('#menu-mobile').removeClass("show");
            jQuery('.click-out-menu').removeClass("show-menu");
            jQuery(".background-rgba").remove();
            jQuery('body').removeClass('overflow-hidden');
            jQuery(this).hide();
            jQuery('#opacity').removeClass("opacity-body");
        });
    });
</script>
<a class="btn-top" href="javascript:void(0);" title="Top" style="display: block;"></a>
</html>