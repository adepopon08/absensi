<!Doctype html>
<html>

<head>
    <title>Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php
    include "koneksi.php";

    if (isset($_GET['cari'])) {
        $cari = $_GET['isiCari'];
        $query = mysqli_query($konek, "SELECT * FROM tbl_siswa WHERE nama LIKE '%$cari%'");
    } else {
        $query = mysqli_query($konek, "SELECT * FROM tbl_siswa");
    }
    $qnama = mysqli_query($konek, "SELECT nama FROM tbl_siswa");
    ?>
    <div class="container">
        <h3>Data Siswa Kelas XII RPL</h3>
        <a href="form_tambah.php" class="btn btn-success mb-3">Tambah</a>
        <form method="get" action="#">
            <label>Input Nama :</label>
            <input type="text" class="form-control" name="isiCari">
            <input list="cari" name="isiCari">
            <datalist id="cari">
                <?php
                while ($dnama = mysqli_fetch_array($qnama)) {
                    echo "<option value=" . $dnama['nama'] . ">" . $dnama['nama'] . "</option>";
                }
                ?>
            </datalist>
            <input type="submit" class="btn btn-primary" value="Cari" name="cari">
        </form>
        <table class="table table-striped">
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            while ($data = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nisn']; ?></td>
                    <td><?php echo $data['nis']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['jk']; ?></td>
                    <td><?php echo $data['kelas']; ?></td>
                    <td><a href="ubah.php?nisn=<?php echo $data['nisn']; ?>" class="btn btn-warning btn-sm">Ubah</a> <a href="hapus.php?nisn=<?php echo $data['nisn']; ?>" class="btn btn-danger btn-sm">Hapus</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>