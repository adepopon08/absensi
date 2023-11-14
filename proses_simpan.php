<?php 
$nm = $_POST['nama'];
$ktp = $_POST['ktp'];
$jk = $_POST['jk'];
$tempat_lahir = $_POST['tmptlahir'];
$tgllahir = $_POST['tgl_lahir'];
$agm = $_POST['agama'];
$sts = $_POST['status'];
$hoby = $_POST['hoby'];

echo "Nama : ".$nm;
echo "<br>NO KTP : ".$ktp;
echo "<br>Jenis Kelamin : ".$jk;
echo "<br>Tempat Tanggal Lahir : ".$tempat_lahir.", ".$tgllahir;
echo "<br>Agama : ".$agm;
echo "<br>Status : ".$sts;
echo "<br>Hoby : ".$hoby;
