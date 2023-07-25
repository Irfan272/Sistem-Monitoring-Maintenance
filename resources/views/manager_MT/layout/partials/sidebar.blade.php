<div class="sidebar-wrapper active">
    <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="index.html"><img src="{{asset('assets/images/logo/logo_pku.png')}}" alt="Logo" srcset="" style="width: 200px; height: 30px"></a>
            </div>
        
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item  ">
                <a href="/manager/dashboard" class='sidebar-link'>
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
                    <li class="submenu-item ">
                        <a href="/manager/perawatan/"> Perawatan Rutin</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="/manager/perbaikan">Approval Perbaikan</a>
                    </li>
                    
                </ul>
            </li>

            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Laporan</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="/manager/cetak-riwayat/">Kartu Riwayat Peralatan</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="/manager/cetak-perawatan/">Laporan Perawatan</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="/manager/cetak-perbaikan">Laporan Perbaikan</a>
                    </li>
                    
                </ul>
            </li>




        </ul>
    </div>
</div>