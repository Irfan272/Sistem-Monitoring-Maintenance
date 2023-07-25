<div class="sidebar-wrapper active">
    <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="/IT/dashboard"><img src="{{asset('assets/images/logo/logo_pku.png')}}" alt="Logo" srcset="" style="width: 200px; height: 30px"></a>
            </div>
            <div class="sidebar-toggler  x">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item  ">
                <a href="/IT/dashboard" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Transaksi</span>
                </a>
                <ul class="submenu ">
                    {{-- <li class="submenu-item ">
                        <a href="/IT/role">Data Role</a>
                    </li> --}}
                    <li class="submenu-item ">
                        <a href="/IT/divisi">Data Divisi</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="/IT/akun">Data Akun</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="/IT/peralatan">Data Peralatan</a>
                    </li>
                   
                </ul>
            </li>



        </ul>
    </div>
</div>