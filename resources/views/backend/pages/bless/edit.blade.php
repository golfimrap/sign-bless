@extends('backend.layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" align="center">แก้ไขวันสำคัญ</h4>
                        <form class="forms-sample" method="POST" action="{{ route('backoffice.bless.update', [$data_bless->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="title_bless">วันสำคัญ</label>
                                <input type="text" class="form-control" id="title_name" name="title_name" value="{{ $data_bless->title_name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="file_background">
                                    รูปภาพพื้นหลัง :: 
                                    <a href="{{ route('getFilesUpload',['backgrounds', $data_bless->id, $data_bless->file_background]) }}" target="_blank">
                                        {{ $data_bless->file_background }}
                                    </a>
                                </label><br/>
                                <label for="file_background">แก้ไขรูปภาพพื้นหลัง</label>
                                <input type="file" class="form-control" id="file_background" name="file_background">
                            </div>
                            <div class="form-group">
                                <label for="file_picture">
                                    รูปภาพบุคคล :: 
                                    <a href="{{ route('getFilesUpload',['peoples', $data_bless->id, $data_bless->file_picture]) }}" target="_blank">
                                        {{ $data_bless->file_picture }}
                                    </a>
                                </label><br/>
                                <label for="file_background">แก้ไขรูปภาพบุคคล</label>
                                <input type="file" class="form-control" id="file_picture" name="file_picture">
                            </div>
                            <div class="form-group">
                                <label for="file_text">
                                    รูปภาพข้อความ :: 
                                    <a href="{{ route('getFilesUpload',['texts', $data_bless->id, $data_bless->file_text]) }}" target="_blank">
                                        {{ $data_bless->file_text }}
                                    </a>
                                </label><br/>
                                <label for="file_text">แก้ไขรูปภาพข้อความ</label>
                                <input type="file" class="form-control" id="file_text" name="file_text">
                            </div>
                            <div class="form-group">
                                <label for="start_date_bless">วันที่เริ่ม</label>
                                <input type="date" class="form-control" id="start_date_bless" name="start_date_bless" value="{{ $data_bless->start_date_bless }}" required>
                            </div>
                            <div class="form-group">
                                <label for="end_date_bless">วันที่สิ้นสุด</label>
                                <input type="date" class="form-control" id="end_date_bless" name="end_date_bless" value="{{ $data_bless->end_date_bless }}" required>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="button_text">ปุ่มกด</label>
                                <input type="text" class="form-control" id="button_text" name="button_text" value="{{ $data_bless->button_text }}" required>
                            </div>
                            <div class="form-group">
                                <label for="button_color">สีปุ่มกด :: </label>
                                <input type="color" id="button_color" name="button_color" value="{{ $data_bless->button_color }}" required>
                            </div>
                            <div class="form-group">
                                <label for="text_color">สีข้อความ :: </label>
                                <input type="color" id="text_color" name="text_color" value="{{ $data_bless->text_color }}" required>
                            </div>
                            <button type="submit" class="btn btn-warning mr-2" style="float: right;">แก้ไขวันสำคัญ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection