@extends('main')
@section('content')
<main>
    <div class="container">
        <div class="row">

            <div class="col-lg-20ths col-md-9 col-sm-20ths">

                <div class="main-product container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px">
                            <!--Description-->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a data-toggle="tab" href="" role="presentation" >@foreach($haisan as $hs)
                                    {{$hs->title}}
                                    @endforeach</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="mota" class="tab-pane fade in active" style="padding-top:15px;">
                                        @foreach($haisan as $hs)
                                        {!!$hs->noidung!!}
                                        @endforeach
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
                    @foreach($haisan as $sp)           
                    <div class="fb-comments" data-href="http://haisanquangninh.com.vn/{{$sp->id}}" data-order-by="reverse_time" data-width="100%" data-numposts="5" ></div>
                    @endforeach
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
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</main> 
@endsection