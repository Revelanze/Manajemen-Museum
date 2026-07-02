<?php
session_start();
include "../config/koneksi.php";

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

include "../includes/header.php";
include "../includes/sidebar.php";

$query = mysqli_query($conn, "SELECT * FROM pengunjung ORDER BY id_pengunjung DESC");
?>

<div class="content">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Data Pengunjung</h2>

        <a href="tambah.php" class="btn btn-primary">
            <i class="fa fa-plus"></i> Tambah Pengunjung
        </a>
    </div>

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-bordered table-striped" id="pengunjung">

                <thead class="table-primary">

                <tr>

                    <th width="60">No</th>

                    <th>Nama</th>

                    <th>Alamat</th>

                    <th>No HP</th>

                    <th width="170">Aksi</th>

                </tr>

                </thead>

                <tbody>

                <?php
                $no=1;

                while($d=mysqli_fetch_assoc($query)){
                ?>

                <tr>

                    <td><?= $no++ ?></td>

                    <td><?= htmlspecialchars($d['nama']) ?></td>

                    <td><?= htmlspecialchars($d['alamat']) ?></td>

                    <td><?= htmlspecialchars($d['no_hp']) ?></td>

                    <td>

                        <a href="edit.php?id=<?= $d['id_pengunjung'] ?>"
                           class="btn btn-warning btn-sm">

                            <i class="fa fa-edit"></i>

                            Edit

                        </a>

                        <a href="hapus.php?id=<?= $d['id_pengunjung'] ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin ingin menghapus data ini?')">

                            <i class="fa fa-trash"></i>

                            Hapus

                        </a>

                    </td>

                </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<script>

$(document).ready(function(){

    $('#pengunjung').DataTable({

        language:{
            search:"Cari :",
            lengthMenu:"Tampilkan _MENU_ data",
            zeroRecords:"Data tidak ditemukan",
            info:"Menampilkan _START_ - _END_ dari _TOTAL_ data",
            paginate:{
                previous:"Sebelumnya",
                next:"Berikutnya"
            }
        }

    });

});

</script>

<?php
include "../includes/footer.php";
?>