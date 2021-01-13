<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/style.css">
    <style type="text/css">
   .left    { text-align: left;}
   .right   { text-align: right;}
   .center  { text-align: center;}
   .justify { text-align: justify;}

</style>
</head>
<body>
    <div class="container">
    <div class="header">
    <h1 class="text-left">DION ESPORT</h1>
    <h3 class="text-left">Main Terus Tapi Ga Jago</h3>
<style>
   body{
    background-image: url("dion.jpg");
    background-size:cover
   }
 </style>
    </div>
    </div>
    <div class="container mt-3">
    <h3 class="text-white">Wellcome to Dion Esport</h3>
   <p class="justify text-white">Terbentuk pada bulan Januari 2021, "Dion Esport" beranggotakan para pemain Mobile Legends kelas Informatika 5B UPGRIS. Kami bermain hanya untuk sekedar hiburan dan menghilangkan stress akibat tugas kuliah.</p>

    <p class="justify text-white">Kini Player Dion Esport sedang sibuk mempersiapkan UAS yang akan dimulai tanggal 11 Januari 2021. Semoga kami di beri kelancaran dalam mengerjakan UAS sehingga liburan tanpa ada remidi dan bisa bermain kembali.</p>

    <p class="justify text-white">SEMOGA CORONA CEPAT HILANG DAN KITA BISA BERAKTIVITAS SEPERTI BIASA, TAKE CARE & SAFE HEALTY.</p>
   </div>
<div class="container">
    <br>
    <h4 class="justify text-white">Daftar Anggota Dion Esport</h4>
<?php

    include "koneksi.php";

    if (isset($_GET['id_anggota'])) {
        $id_anggota=htmlspecialchars($_GET["id_anggota"]);

        $sql="delete from anggota where id_anggota='$id_anggota' ";
        $hasil=mysqli_query($kon,$sql);

            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>

    <table class="table table-bordered table-striped bg-success text-white">
        <br>
        <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>No HP</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>
        <?php
        include "koneksi.php";
        $sql="select * from anggota order by id_anggota desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["username"]; ?></td>
                <td><?php echo $data["nama"];   ?></td>
                <td><?php echo $data["alamat"];   ?></td>
                <td><?php echo $data["email"];   ?></td>
                <td><?php echo $data["no_hp"];   ?></td>
                <td>
                    <a href="update.php?id_anggota=<?php echo htmlspecialchars($data['id_anggota']); ?>" class="btn btn-warning" role="button">Update</a>
                    <td onClick="javascript: return confirm('Anda yakin ingin menghapus?')">
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_anggota=<?php echo $data['id_anggota']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>

</div>


            <div class="container">
                <div class="footer mt-5">
                    <p class="copy-right">Copyright &copy; 2021 | Dion Ardy Ramadhan | 18670055 | Informatika 5B | Fakultas Teknik & Informatika | Universitas PGRI Semarang </p>
                </div>
            </div>
        

</body>
</html>
