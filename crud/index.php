<?php 
// 1. Sesi dan Koneksi Database harus selalu di paling atas
include 'koneksi.php';

// Jika belum login, tendang kembali ke halaman login
if (!isset($_SESSION['user_id'])) {
    header("location:login.php");
    exit;
}

$role = $_SESSION['role'];
$my_id = $_SESSION['user_id'];

// 2. Panggil Header dan Sidebar
include 'header.php';
include 'sidebar.php'; 
?>

<div id="content-wrapper" class="d-flex flex-column">

    <div id="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                            Halo, <b><?php echo $_SESSION['username']; ?></b> (<?php echo ucfirst($role); ?>)
                        </span>
                        <i class="fas fa-user-circle fa-2x text-gray-400"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="container-fluid">

            <h1 class="h3 mb-2 text-gray-800">Daftar Biodata Guru TKJ</h1>
            <p class="mb-4">Halaman ini menampilkan data guru sesuai dengan hak akses Anda.</p>

            <div class="card shadow mb-4">
                
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Guru</h6>
                    
                    <?php if ($role == 'admin') { ?>
                        <a href="tambah.php" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
                        </a>
                    <?php } ?>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama Lengkap</th>
                                    <th>Alamat</th>
                                    <th>Tempat, Tgl Lahir</th>
                                    <th width="150px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Logika Query: Admin lihat semua, Guru lihat dirinya sendiri
                                if ($role == 'admin') {
                                    $query = mysqli_query($koneksi, "SELECT users.username, biodata_guru.* FROM users JOIN biodata_guru ON users.id = biodata_guru.user_id ORDER BY biodata_guru.id DESC");
                                } else {
                                    $query = mysqli_query($koneksi, "SELECT users.username, biodata_guru.* FROM users JOIN biodata_guru ON users.id = biodata_guru.user_id WHERE users.id = '$my_id'");
                                }

                                $no = 1;
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['username']; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['alamat']; ?></td>
                                    <td><?php echo $data['tempat_lahir'] . ", " . $data['tanggal_lahir']; ?></td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $data['user_id']; ?>" class="btn btn-warning btn-sm shadow-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        
                                        <?php if ($role == 'admin') { ?>
                                            <a href="hapus.php?id=<?php echo $data['user_id']; ?>" class="btn btn-danger btn-sm shadow-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        </div>
    <?php 
// 4. Panggil Footer (Menutup div wrapper dan body, serta memanggil script JS)
include 'footer.php'; 
?>