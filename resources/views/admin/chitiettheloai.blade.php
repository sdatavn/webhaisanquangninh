@extends('admin/main')
@section('title')
    Menu
@endsection
@section('tieumuc')
Menu
@endsection
@section('content')
<div class="row">
                        <div class="col-md-12">
                            <div class="portlet">
                            <div class="caption">
                                @foreach($name as $NAME)
                                <div class="tools" style="float: left;text-transform: capitalize;">{{$NAME->name}}</div>
                                    <div class="tools" style="float: right">
                                            <a href="themtheloai/{{$NAME->id}}"><button type="button" class="btn btn-success">Thêm Menu Con</button></a>
                                            <a href="javascript:;" class="collapse"> </a>
                                    </div>
                                @endforeach
                                <div class="portlet-body">
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-advance table-hover">
                                            <thead>
                                                <tr>
                                                    <th><i class="fa fa-user"></i> Thể Loại </th>
                                                    <th>Thao Tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($thongtin as $tt)
                                                <tr>
                                                    <td class="highlight">
                                                        <div class="success"></div>
                                                        <div style="padding-left: 10px"><a href="" style="text-decoration: none;color: black;text-transform: capitalize;">{{$tt->name}}</a></div>
                                                    </td>
                                                    <td>
                                                    @foreach($name as $NAME)
                                                        <a href="sua/{{$NAME->id}}/{{$tt->id}}" class="btn btn-outline btn-circle dark btn-sm black">
                                                            <i class="fa fa-pencil icon-black"></i> Edit </a>
                                                        <a href="xoa/{{$NAME->id}}/{{$tt->id}}" class="btn btn-outline btn-circle dark btn-sm black">
                                                            <i class="fa fa-trash-o"></i> Delete </a>
                                                    @endforeach
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <center></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection