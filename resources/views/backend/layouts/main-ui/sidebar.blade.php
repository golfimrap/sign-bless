<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item sidebar-category">
            <p>เปิด / ปิด </p>
            <span></span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('backoffice.index') }}">
                <i class="mdi mdi-view-quilt menu-icon"></i>
                <span class="menu-title">ปิด/ปิด วันสำคัญ</span>
                <!-- <div class="badge badge-info badge-pill"></div> -->
            </a>
        </li>
        <hr>
        <li class="nav-item sidebar-category">
            <p>จัดการวันสำคัญ</p>
            <span></span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('backoffice.bless.index') }}">
                <i class="mdi mdi-view-quilt menu-icon"></i>
                <span class="menu-title">จัดการวันสำคัญ</span>
                <!-- <div class="badge badge-info badge-pill"></div> -->
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('backoffice.backgroundblass.index') }}">
                <i class="mdi mdi-view-quilt menu-icon"></i>
                <span class="menu-title">จัดการรูปภาพพื้นหลัง</span>
                <!-- <div class="badge badge-info badge-pill"></div> -->
            </a>
        </li> --}}
        {{-- <li class="nav-item">
            <a class="nav-link" href="">
                <i class="mdi mdi-view-quilt menu-icon"></i>
                <span class="menu-title">จัดการรูปภาพ</span>
                <!-- <div class="badge badge-info badge-pill"></div> -->
            </a>
        </li> --}}
        <hr>
        {{-- <li class="nav-item sidebar-category">
            <p>จัดการรายละเอียดทั่วไป</p>
            <span></span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="mdi mdi-view-quilt menu-icon"></i>
                <span class="menu-title">จัดการหน่วยงาน</span>
                <!-- <div class="badge badge-info badge-pill"></div> -->
            </a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="mdi mdi-view-quilt menu-icon"></i>
                <span class="menu-title">LOG OUT</span>
                <!-- <div class="badge badge-info badge-pill"></div> -->
            </a>
        </li>
    </ul>
</nav>
