@extends('backend.layouts.master')
@section('css-custom-script')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" align="center">วันสำคัญ</h4>
                        <p class="card-description" style="float: right;">
                            <button type="button" class="btn btn-primary btn-rounded btn-fw">
                                <a href="{{ route('backoffice.bless.create') }}" style="text-decoration:none; color: white;">
                                    เพิ่มข้อมูล
                                </a>
                            </button>
                        </p>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="DataTable">
                                <thead>
                                    <tr class="table-info" align="center">
                                        <th>ลำดับ</th>
                                        <th>วันสำคัญ</th>
                                        <th>จำนวนผุ้ลงนาม</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data_bless as $value_bless)
                                        <tr>
                                            <td align="center">
                                                {{ $no }}
                                            </td>
                                            <td>
                                                {{ $value_bless->title_name }}
                                            </td>
                                            <td align="center">
                                                {{ $value_bless->signature_count }} คน
                                            </td>
                                            <td align="center">
                                                <form method="POST" action="{{ route('backoffice.bless.edit') }}" style="display: inline;">
                                                    @csrf
                                                    <input type="hidden" value="{{ $value_bless->id }}" name="id">
                                                    <button type="submit" class="btn btn-inverse-warning btn-fw">แก้ไขข้อมูล</button>
                                                </form>
                                                <form method="POST" action="{{ route('backoffice.bless.destroy', $value_bless->id) }}" style="display: inline;">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-inverse-danger btn-fw">ลบข้อมูล</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @php
                                            $no++;
                                        @endphp
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
@section('js-custom-script')
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
@endsection
@section('js-custom')
    <script>
        $(document).ready(function() {
            $('#DataTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                "language": {
                    "sProcessing": "กำลังดำเนินการ...",
                    "sLengthMenu": "แสดง_MENU_ แถว",
                    "sZeroRecords": "ไม่พบข้อมูล",
                    "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                    "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
                    "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
                    "sInfoPostFix": "",
                    "sSearch": "ค้นหา:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "เิริ่มต้น",
                        "sPrevious": "ก่อนหน้า",
                        "sNext": "ถัดไป",
                        "sLast": "สุดท้าย"
                    }
                }
            });
        });
    </script>
@endsection