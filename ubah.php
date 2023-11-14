<!DOCTYPE html>
<html>

<head>
    <title>Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php
    include "koneksi.php";
    $id = $_GET['nisn'];
    $query = mysqli_query($konek, "select * From tbl_siswa where nisn='$id'");
    $data = mysqli_fetch_array($query);
    ?>
    <div class="container">
        <h3>Form Ubah Siswa</h3>
        <form method="post" action="#">
            <div class="mb-3">
                <label class="form-label">NISN</label>
                <input value="<?= $data['nisn']; ?>" class="form-control" type="text" name="nisn">
            </div>
            <div class="mb-3">
                <label class="form-label">NIS</label>
                <input value="<?= $data['nis']; ?>" class="form-control" type="text" name="nis">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input value="<?= $data['nama']; ?>" class="form-control" type="text" name="nama">
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <input class="form-check-input" type="radio" name="jk" value="Laki-laki" <?php if ($data['jk'] == 'Laki-laki') {
                                                                                                echo "checked";
                                                                                            } ?>> Laki-laki
                <input class="form-check-input" type="radio" name="jk" value="Perempuan" <?php if ($data['jk'] == 'Perempuan') {
                                                                                                echo "checked";
                                                                                            } ?>>Perempuan
            </div>
            <div class="mb-3">
                <label class="form-label">Kelas</label>
                <select class="form-control" name="kelas">
                    <option value="XI RPL 1" <?php if ($data['kelas'] == 'XI RPL 1') {
                                                    echo "selected";
                                                } ?>>XI RPL 1</option>
                    <option value="XI RPL 2" <?php if ($data['kelas'] == 'XI RPL 2') {
                                                    echo "selected";
                                                } ?>>XI RPL 2</option>
                </select>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Simpan" name="simpan">
                <a href="data_siswa.php" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>

    <?php
    include "koneksi.php";
    if (isset($_POST['simpan'])) {
        //pengambilan Data dari form
        $nisn   = $_POST['nisn'];
        $nis   = $_POST['nis'];
        $nama   = $_POST['nama'];
        $jk     = $_POST['jk'];
        $kelas  = $_POST['kelas'];

        //query tambah data
        $qtambah = mysqli_query($konek, "Update tbl_siswa set nis='$nis', nama='$nama', jk='$jk', kelas='$kelas' where nisn='$id' ");

        //validasi
        if ($qtambah) {
            header("location:data_siswa.php");
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>