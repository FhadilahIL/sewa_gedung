<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li class="sidebar-item <?= $selected[0] ?>">
                    <a class="sidebar-link sidebar-link <?= $active[0] ?>" href="<?= base_url('admin') ?>" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li class="list-divider"></li>

                <li class="nav-small-cap">
                    <span class="hide-menu">Master Data</span>
                </li>
                <li class="sidebar-item <?= $selected[1] ?>">
                    <a class="sidebar-link sidebar-link <?= $active[1] ?>" href="<?= base_url('admin/data_admin') ?>" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Data Admin</span>
                    </a>
                </li>
                <li class="sidebar-item <?= $selected[2] ?>">
                    <a class="sidebar-link sidebar-link <?= $active[2] ?>" href="<?= base_url('admin/data_penyewa') ?>" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Data Penyewa</span>
                    </a>
                </li>
                <li class="sidebar-item <?= $selected[3] ?>">
                    <a class="sidebar-link sidebar-link <?= $active[3] ?>" href="<?= base_url('admin/data_gedung') ?>" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Data Gedung</span>
                    </a>
                </li>
                <li class="sidebar-item <?= $selected[4] ?>">
                    <a class="sidebar-link sidebar-link <?= $active[4] ?>" href="<?= base_url('admin/data_fasilitas') ?>" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Data Fasilitas</span>
                    </a>
                </li>

                <li class="list-divider"></li>

                <li class="nav-small-cap">
                    <span class="hide-menu">Transaksi</span>
                </li>
                <li class="sidebar-item <?= $selected[5] ?>">
                    <a class="sidebar-link sidebar-link <?= $active[5] ?>" href="<?= base_url('admin/data_sewa_gedung') ?>" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Sewa Gedung</span>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->