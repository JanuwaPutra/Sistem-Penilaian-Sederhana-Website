<?php
include_once 'koneksi.php';

$nim = $_GET['nim'];
$kdmtk = $_GET['kdmtk'];
$query= "DELETE FROM tblnilai WHERE nim = '$nim' AND kd_mtk = '$kdmtk'";
$exequerry = mysqli_query($conn, $query);
if($exequerry) {
    $pesan = "hapus berhasil";
    echo "<script>alert('$pesan'); document.location= 'index.php?mhs=%25&matkul=%25&page=tblnilai'</script>";
} else {
    $pesan = "Hapus Gagal";
    echo "<script>alert('$pesan'); document.location= 'index.php?mhs=%25&matkul=%25&page=tblnilai'</script>";
}




?>