@extends('main')
@section('content')
<main class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-20ths col-md-20ths col-sm-20ths">
                <div class="main-product" style="margin-top:5px;">
                     <div class="aqc">   
                        <img src="../public/uploaded_files/danhmuc/23240365_haisanquangninh1.jpg" class="object-fit_cover img-responsive">
                    </div>
                </div>
                <div class="col-md-12">
        <style>
    ul.menu-blog li{
    float: left;    
    }
    li.mm-blog a:hover{
    color: #fff!important;
    background: #049881;
    }
    li.mm-blog a{
    color: #333;
    background: #fff;
    padding: 0 12px;
    line-height: 30px;
    display: inline-block;
    white-space: nowrap;
    border: 1px solid #0098d1;
    margin: 3px;
    }
    li.mm-blog a.current{
    color: #fff;
    background: #0098D1;
    padding: 0 12px;
    line-height: 30px;
    display: inline-block;  
    white-space: nowrap;
    }
    .open{
    display: block;
    }
    .menu-blog{
    height: 40px;

    }
    .dropdown-menu{
    top: 76%!important;
    }
    .mm{
    margin: 0px !important;
    }
    .dropdown-menu > li > a:hover{
    background: white!important;
    color:#00aeef !important;
    }
</style>
<ul class="menu-blog" style="padding-left: 10%;padding-right: 10%">          
    <li class="mm-blog">
        @foreach($theloai as $tl)@if($tl->id_menu==$id)
        <a href="{{url('danhmuc/theloai')}}/{{$tl->id}} " data-id="{{$tl->id}}" >
            <span>{{$tl->name}}</span>
        </a>
        @endif @endforeach
    </li>           
</ul>
</div>
    <div class="product-wrapper" style="clear:both;">   
    @foreach($thongtin as $hs)
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
            <div class="product-item product-resize 1002031408 fixheight" style="height: 277px;"> 
        <div class="image image-resize" style="height: auto;">
            <a href="{{url('sanpham')}}/{{$hs->id}}" ><img src="../public/uploaded_files/sanpham/19760925_hai-san-tuoi-song-tom-he.jpg"></a>
        </div>

        <div class="product-overlay hidden-xs">
            <a href="../../sanpham/Tom-He/41.html" title="Quick Shop" class="quick_shop action_button">
                <span> Xem Thêm </span>
            </a> 
        </div>
        <div class="name"><a href="../../sanpham/Bach-tuoc-(Ruoc)/31.html"><center>{{$hs->title}}</center></a></div>
        <div class="price">
            <center><em>{{$hs->gia}} VNĐ</em></center>
        </div>
        <div class="addcart addcart-collection">
            <CENTER>
                                            <form action="../cart" method="POST" class="side-by-side">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="id" value="111">
                                            <input type="hidden" name="name" value="111">
                                            <input type="hidden" name="price" value="111">
                                            <button type="submit" class="btn btn-success" style="background-color: #049881;border-color: #049881;">GIỎ HÀNG<i style="padding-left: 6px" class="fa fa-shopping-basket" aria-hidden="true"></i></button>
                                            </form>
                                            </CENTER>
        </div>
    </div>
</div>  
@endforeach                       
                </div>
            </div>
            <div class="text-center  clear">
            </div>              
        </div>
    </div>
</main>
@endsection