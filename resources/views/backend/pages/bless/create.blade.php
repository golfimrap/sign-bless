@extends('backend.layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" align="center">เพิ่มวันสำคัญ</h4>
                        <form class="forms-sample" method="POST" action="{{ route('backoffice.bless.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title_bless">วันสำคัญ</label>
                                <input type="text" class="form-control" id="title_name" name="title_name" required>
                            </div>
                            <div class="form-group">
                                <label for="file_background">รูปภาพพื้นหลัง</label>
                                <input type="file" class="form-control" id="file_background" name="file_background" required>
                            </div>
                            <div class="form-group">
                                <label for="file_picture">รูปภาพบุคคล</label>
                                <input type="file" class="form-control" id="file_picture" name="file_picture" required>
                            </div>
                            <div class="form-group">
                                <label for="file_text">รูปภาพข้อความ</label>
                                <input type="file" class="form-control" id="file_text" name="file_text" required>
                            </div>
                            <div class="form-group">
                                <label for="start_date_bless">วันที่เริ่ม</label>
                                <input type="date" class="form-control" id="start_date_bless" name="start_date_bless" required>
                            </div>
                            <div class="form-group">
                                <label for="end_date_bless">วันที่สิ้นสุด</label>
                                <input type="date" class="form-control" id="end_date_bless" name="end_date_bless" required>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="button_text">ปุ่มกด</label>
                                <input type="text" class="form-control" id="button_text" name="button_text" required>
                            </div>
                            <div class="form-group">
                                <label for="button_color">สีปุ่มกด :: </label>
                                <input type="color" id="button_color" name="button_color" required>
                            </div>
                            <div class="form-group">
                                <label for="text_color">สีข้อความ :: </label>
                                <input type="color" id="text_color" name="text_color" required>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2" style="float: right;">เพิ่มวันสำคัญ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection