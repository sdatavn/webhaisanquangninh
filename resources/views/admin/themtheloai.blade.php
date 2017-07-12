@extends('admin/main')
@section('title')
    Thêm Thể Loại
@endsection
@section('tieumuc')
Thêm Thể Loại
@endsection
@section('content')
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light ">
                                            <div class="portlet-title tabbable-line">
                                                <div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Thêm Menu Con</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <!-- PERSONAL INFO TAB -->
                                                    <div class="tab-pane active" id="tab_1_1">
                                                        <form action="" method="POST">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <div class="form-group">
                                                                <label class="control-label">Tên Thể Loại</label>
                                                                <input type="text" name="name" class="form-control" value="" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Link URL</label>
                                                                <input type="text" name="url" class="form-control" value="" />
                                                            </div>
                                                            <div class="margin-top-10">
                                                                <button type = "submit" name = "ok" class = "btn default">Thêm Thể Loại</button>
                                                            </div>
                                                        </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection