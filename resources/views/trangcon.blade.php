@extends('main')
@section('title')
{{$sp->title}}
@endsection('title')
@section('content')
<main>
    <div class="container">
        <div class="row">
            
            <div class="col-lg-20ths col-md-9 col-sm-20ths">
                
                <div class="main-product container-fluid">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                   <div class="carousel-inner">
                                    <div class="item active">
                                      <img src="{{url('public/responsive_filemanager/thumbs/baiviet')}}/{{$sp->id}}.jpg" width="100%">
                                  </div>
                                  @foreach($hinhanh as $img)
                                  <div class="item">
                                      <img src="{{url('public/responsive_filemanager/thumbs/baiviet')}}/{{$img->name}}.jpg" width="100%">
                                  </div><!-- End Item -->
                                  @endforeach
                              </div><!-- End Carousel Inner -->
                              <ul class="nav nav-pills nav-justified">
                                <div class="row" style="background-color: white">
                                    <div class="col-md-3 col-sm-3 col-xs-3">
                                      <li data-target="#myCarousel" data-slide-to="0" class="active"><a href="#"><img src="{{url('public/responsive_filemanager/thumbs/baiviet')}}/{{$sp->id}}.jpg" width="100%"></a>
                                      </li>
                                  </div>
                                  <?php $a=1; ?>
                                  @foreach($hinhanh as $img)
                                  <div class="col-md-3 col-sm-3 col-xs-3">
                                      <li data-target="#myCarousel" data-slide-to="{{$a}}"><a href="#"><img src="{{url('public/responsive_filemanager/thumbs/baiviet')}}/{{$img->name}}.jpg" width="100%"></a></li>
                                  </div>
                                  <?php $a=$a+1; ?>
                                  @endforeach
                              </div>
                          </ul>
                      </div><!-- End Carousel -->
                  </div>
                  <script type="text/javascript">$('#myCarousel').carousel({
                    interval:   3000
                });
                  
                  var clickEvent = false;
                  $('#myCarousel').on('click', '.nav a', function() {
                    clickEvent = true;
                    $('.nav li').removeClass('active');
                    $(this).parent().addClass('active');        
                }).on('slid.bs.carousel', function(e) {
                    if(!clickEvent) {
                        var count = $('.nav').children().length -1;
                        var current = $('.nav li.active');
                        current.removeClass('active').next().addClass('active');
                        var id = parseInt(current.data('slide-to'));
                        if(count == id) {
                            $('.nav li').first().addClass('active');    
                        }
                    }
                    clickEvent = false;
                });</script>
            </div>
            <!--Form-->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 detail-product">
                <h1 style=" text-transform: capitalize;">{{$sp->title}}</h1>
                <label for="price">Giá Sản Phẩm</label>
                <div class="price" id="price-preview"><span class="product_price">{{$sp->gia}} VNĐ</span></div>
                <!--start form -->
                <div class="desc-title" style="margin-bottom:10px;">Mô tả ngắn </div>
                {!!str_limit($sp->noidung,500,'...')!!}
                <!-- end form -->
                <div style="margin-top:15px; clear:both;">
                    <form action="../cart" method="POST" class="side-by-side">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" value="{{$sp->id}}">
                        <input type="hidden" name="name" value="{{$sp->title}}">
                        <input type="hidden" name="price" value="{{$sp->gia}}">
                        <input type="submit" class="btn btn-success btn-lg" value="Đưa Vào Giỏ Hàng">
                    </form>
                    <div id="fb-root"></div>
                </div>                                
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a data-toggle="tab" href="" role="presentation">Mô tả sản phẩm</a></li>
                </ul>
                <div class="tab-content">
                    <div id="mota" class="tab-pane fade in active" style="padding-top:15px;">
                        {!!$sp->noidung!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div> 
</main>
<main class="content">
    <div class="container">
        <div class="row">
          <script>
            $('ul.left-nav li.level0.active ul.dropdown').slideUp();
            $('ul.left-nav li.level0.active').hover(
                function(){

                    $(this).find('ul.dropdown').slideDown();
                },
                function(){
                    $(this).find('ul.dropdown').slideUp();
                })
            </script>
            <div class="fb-comments" data-href="http://haisanquangninh.com.vn/{{$sp->id}}" data-order-by="reverse_time" data-width="100%" data-numposts="5" ></div>
            
            <div class="titles"><span>Sản phẩm liên quan</span></div>
            <div class="product-wrapper">
                @foreach($sanpham as $sp)
                <div class="col-lg-25ths col-md-25ths col-sm-6 col-xs-6">
                    <div class="product-item 1004245944"> 
                        <div class="image image-resize">
                            <a href="{{url('sanpham')}}/{{$sp->url}}"><img src="{{url('public/responsive_filemanager/thumbs/baiviet')}}/{{$sp->id}}1.jpg"/></a>
                        </div>
                        <div class="product-overlay" style="padding-top:50%">
                            <a href="{{url('sanpham')}}/{{$sp->url}}" title="Quick Shop" class="quick_shop action_button">  Xem Chi Tiết</a> 
                        </div>
                        <div class="name"><a  href="{{url('sanpham')}}/{{$sp->url}}"><center>{{$sp->title}}</center></a></div>
                        <div class="price">
                            <em><center>{{$sp->gia}} VND </center></em> 
                        </div>
                        <center>
                            <div class="addcart">   
                                <form action="{{url('cart')}}" method="POST" class="side-by-side">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="id" value="{{$sp->id}}">
                                    <input type="hidden" name="name" value="{{$sp->title}}">
                                    <input type="hidden" name="price" value="{{$sp->gia}}">
                                    <button type="submit" class="btn btn-success" style="background-color: #049881;border-color: #049881;">GIỎ HÀNG <i style="padding-left: 6px" class="fa fa-shopping-basket" aria-hidden="true"></i></button>
                                </form>
                                
                            </div>
                        </center>
                    </div>
                </div> 
                @endforeach                
            </div>
        </div>      
    </div>
    <div class="clear"></div>
</div>
</div>
</div>
</div>
</main> 
@endsection