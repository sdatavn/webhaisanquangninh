@extends('main')
@section('title')
Hải Sản Biển
@endsection('title')
@section('content')
<div>
    <div class="row" style="padding-top: 10px">
        <div class="container">
            <div class="col-lg-8 col-xs-12">
                <div id="owl-slider" class="owl-carousel">
                    <?php $a=1 ?>
                    @foreach($url as $ul)
                    <a href="{{$ul->url}}" target="_self"  class="nivo-imageLink" >
                        <img src="public/responsive_filemanager/thumbs/slide/{{$a}}.jpg" />
                    </a>
                    <?php $a=$a+1 ?>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-xs-4">
                <img src='public/responsive_filemanager/thumbs/banner/1.jpg' width="110%" class="object-fit_cover img-responsive"/>
            </div>
            <div class="col-lg-4 col-xs-4">
               <img src='public/responsive_filemanager/thumbs/banner/2.jpg' width="110%" class="object-fit_cover img-responsive" />
           </div>
           <div class="col-lg-4 col-xs-4">
            <img src='public/responsive_filemanager/thumbs/banner/3.jpg' width="110%" class="object-fit_cover img-responsive"/>
        </div>
    </div>
</div>
</div>
<main class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-lg-20ths col-md-20ths col-sm-20ths">  
                    @foreach($menu as $mn)
                    <?php $a=1 ?>
                    <div class="rows aqc">
                        <a href=""><img src="{{url('public/responsive_filemanager/thumbs/quangcao')}}/{{$mn->id}}.jpg" class="object-fit_cover img-responsive"/></a>
                    </div>
                    <div class="rows product-1">
                        <div class="titles"><span>{{$mn->name}}</span><span class="pull-right readmore-index"><a href="danhmuc/{{$mn->id}}">Xem Thêm</a></span></div>
                        <div class="product-wrapper">
                            @foreach($haisan as $hs)
                            @if($mn->id==$hs->id_menu)
                            @if($a<5)
                            @if($mn->name!="tin tức")
                            <div class="col-lg-25ths col-md-25ths col-sm-6 col-xs-6">
                                <div class="product-item 1004245944" style="border-radius: 10px"> 
                                    <div class="image image-resize">
                                        <a href="sanpham/{{$hs->url}}"><img src="{{url('public/responsive_filemanager/thumbs/baiviet')}}/{{$hs->id}}.jpg" /></a>
                                    </div>
                                    <div class="product-overlay">
                                        <a href="sanpham/{{$hs->url}}" title="Quick Shop" class="quick_shop action_button">    Xem Chi Tiết
                                        </a> 
                                    </div>
                                    <div class="name"><a  href="sanpham/Muc-la-to/20.html"><center></center></a></div>
                                    <!--div class="compare"><input id="1004245944" type="checkbox" data="1004245944" class="compare" /><label for="1004245944">So sánh</label></div-->
                                    <div class="price">
                                        <center style=" text-transform: capitalize;">{{str_limit($hs->title,24,"...")}}<em>
                                            {{number_format($hs->gia,0)}} VNĐ
                                        </em></center>
                                    </div>
                                    <div class="addcart">   
                                        <CENTER>
                                            <form action="{{url('cart')}}" method="POST" class="side-by-side">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="id" value="{{$hs->id}}">
                                                <input type="hidden" name="name" value="{{$hs->title}}">
                                                <input type="hidden" name="price" value="{{$hs->gia}}">
                                                <button type="submit" class="btn btn-success" style="background-color: #049881;border-color: #049881;">GIỎ HÀNG<i style="padding-left: 6px" class="fa fa-shopping-basket" aria-hidden="true"></i></button>
                                            </form>
                                        </CENTER>
                                    </div>
                                </div>
                            </div>
                            <?php $a++ ?>
                            @else
                            <div class="col-lg-25ths col-md-25ths col-sm-6 col-xs-6">
                                <div class="product-item 1004245944" style="border-radius: 10px"> 
                                    <div class="image image-resize">
                                        <a href="tintuc/{{$hs->url}}"><img src="{{url('public/responsive_filemanager/thumbs/baiviet')}}/{{$hs->id}}.jpg" /></a>
                                    </div>
                                    <div class="name"><a  href="tintuc/{{$hs->url}}"><center></center></a></div>
                                    <div class="price">
                                        <center style=" text-transform: capitalize;"><a href="tintuc/{{$hs->url}}" style="white-space:pre-line;">{{str_limit($hs->title,45,"...")}}</a></center>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <?php $a++ ?>
                        @endif
                        @endif
                        @endif
                        @endforeach
                    </div>
                    <div class="clear"></div>
                </div>            
                @endforeach
                <div class="rows aqc">
                    <a href=""><img src="public/responsive_filemanager/thumbs/banner/4.jpg" class="object-fit_cover img-responsive"/></a>
                </div>
            </div>
        </div>
    </div>

</div>

</main>

@stop