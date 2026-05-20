<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-network-wired"></i> </div>
        <div class="sidebar-brand-text mx-3">Web TKJ</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Daftar Biodata</span></a>
    </li>

    <?php if($_SESSION['role'] == 'admin') { ?>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Manajemen
        </div>
        <li class="nav-item">
            <a class="nav-link" href="tambah.php">
                <i class="fas fa-fw fa-user-plus"></i>
                <span>Tambah Guru</span></a>
        </li>
    <?php } ?>

    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item">
        <a class="nav-link" href="logout.php">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

</ul>