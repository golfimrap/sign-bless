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
                        <h4 class="card-title" align="center">เปิด/ปิด การใช้งานวันสำคัญ</h4>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="DataTable">
                                <thead>
                                    <tr class="table-info" align="center">
                                        <th>ลำดับ</th>
                                        <th>วันสำคัญ</th>
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
                                                @if ($value_bless->status == 0)
                                                    <form method="POST" action="{{ route('backoffice.update', [$value_bless->id]) }}" style="display: inline;">
                                                        @csrf
                                                        @method('patch')
                                                        <input type="hidden" name="status" value="1">
                                                        <button type="submit" class="btn btn-inverse-primary btn-fw">เปิดการใช้งาน</button>
                                                    </form>
                                                @endif
                                                @if ($value_bless->status == 1)
                                                    <form method="POST" action="{{ route('backoffice.update', [$value_bless->id]) }}" style="display: inline;">
                                                        @csrf
                                                        @method('patch')
                                                        <input type="hidden" name="status" value="0">
                                                        <button type="submit" class="btn btn-inverse-danger btn-fw">ปิดการใช้งาน</button>
                                                    </form>
                                                @endif
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