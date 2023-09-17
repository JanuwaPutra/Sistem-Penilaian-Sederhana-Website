<article>
    <div class="card">
    <h2 align="center"  style="color:#0059be">Edit Nilai Mahasiswa</h2><br/>
    <?php
    // ambil data user di db
    include_once "koneksi.php";
    $kd_mtk_edited = $_GET['kdmtk']; 
    $nim_edited = $_GET['nim']; 
    $query = "SELECT tblnilai.nilai, tblmhs.nama, tblmatkul.nm_mtk FROM tblnilai, tblmhs, tblmatkul WHERE tblnilai.kd_mtk='$kd_mtk_edited' AND tblnilai.nim = '$nim_edited' AND tblmhs.nim= '$nim_edited' AND tblmatkul.kd_mtk='$kd_mtk_edited'";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        $row = mysqli_fetch_array($sql);
        $nilai = $row['nilai'];
        $nama = $row['nama'];
        $nm_mtk = $row['nm_mtk'];
        ?>
        <form  action="" method="post">
            Nim : <?php echo $nim_edited ?> - <?php echo $nama ?> <br /><br />
            Kode Matakuliah : <?php echo $kd_mtk_edited ?> - <?php echo $nm_mtk?> <br /> <br />
            <label style="color:#647cff" for="nilai">Nlai(Angka)</label> <input id="nilai" class="box4" min="0" max="100" type="number" name="nilai" placeholder="Nilai" value="<?= $row['nilai'] ?>" required oninvalid="this.setCustomValidity('Isi Nilai Mahasiswa!  Nilai 0-100')"  oninput="this.setCustomValidity('')"/> <br /><br />
            <input class="submit" type="submit" name="edit" value="Edit"/>
            <input type="hidden" name="grade_edited" value="<?= $grade_edited ?>">
        </form>

    <?php  } ?>
    <?php
    if (isset($_POST['edit'])) {
        $nim = $_POST['grade_edited'];
        $nilai = $_POST['nilai'];

        include_once "koneksi.php";
        $query = "UPDATE tblnilai SET nilai='$nilai' WHERE nim='$nim_edited' AND kd_mtk='$kd_mtk_edited'";




        $exequery = mysqli_query($conn, $query) or die($query);
        if ($exequery) {
            $pesan = "Proses Edit Berhasil";
            echo "<script>alert('$pesan'); document.location= 'index.php?mhs=%25&matkul=%25&page=tblnilai'</script>";
        } else {
            $pesan = "Proses edit gagal";
            echo "<script>alert('$pesan'); document.location= 'index.php?mhs=%25&matkul=%25&page=tblnilai'</script>";
        }

      
    }
    ?>
</div>
</article>