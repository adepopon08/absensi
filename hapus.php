<?php 
include "koneksi.php";

$id = $_GET['nisn'];

$sql = mysqli_query($konek, "Delete from tbl_siswa where nisn='$id'");

if($sql){
    header("location:data_siswa.php");
}
