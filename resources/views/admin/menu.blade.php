@extends('admin/main')
@section('title')
    Menu
@endsection
@section('tieumuc')
Menu
@endsection
@section('content')
@if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif
<div class="row">
                        <div class="col-md-12">
                            <div class="portlet">
                            <div class="caption">
                                    <div class="tools" style="float: right">
                                            <a href="menu/themmenu"><button type="button" class="btn btn-success">Thêm Menu</button></a>
                                            <a href="javascript:;" class="collapse"> </a>
                                    </div>
                                <div class="portlet-body">
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-advance table-hover">
                                            <thead>
                                                <tr>
                                                    <th><i class="fa fa-briefcase" style="padding-right: 6px"></i> Tên Bài Viết </th>
                                                    <th>Thao Tác</th>
                                                </tr>
                                            </thead>
                                            <tbody id="sortable">
                                            @foreach($menu as $mn)
                                            <tr id="{{$mn->id}}">
                                                    <td class="highlight">
                                                    <div class="success"></div>
                                                        <div style="padding-left: 10px"><a href="menu/chitietmenu/{{$mn->id}}" style="text-decoration: none;color: black;text-transform: capitalize;">{{$mn->name}}</a></div>
                                                    </td>
                                                    <td>
                                                        <a href="menu/sua/{{$mn->id}}" class="btn btn-outline btn-circle dark btn-sm black">
                                                            <i class="fa fa-pencil icon-black"></i> Edit </a>
                                                        <a onclick="return confirm('Bạn Có Chắc Muốn Xóa Menu Này?')" href="menu/{{$mn->id}}" class="btn btn-outline btn-circle dark btn-sm black">
                                                            <i class="fa fa-trash-o"></i> Delete </a>
                                                    </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
@section('script')
  <script>
  $( function() {
    $( "#sortable" ).sortable({
        stop:function(){
            $.map($(this).find('tr'),function(el){
                var id=el.id;
                var tt = $(el).index();
                $.ajax({
                    url:"menuu",
                    type:"get",
                    dataType:"json",
                    data:{id:id,tt:tt},
                })
            });
        }
    });
});
  </script>
@endsection