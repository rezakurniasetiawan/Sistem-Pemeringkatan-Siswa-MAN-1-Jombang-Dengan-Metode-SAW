<?php
include('koneksi.php');
$query="DELETE from tb_siswa where NIS='".$_GET['id']."'";
mysqli_query($koneksi, $query);
header("location:vdatasiswa.php");
?>