<article>
    <div class="card">
    <h2 align="center" style="color:#0059be">Edit Data Mahasiswa</h2>
    <?php
    // ambil data user di db
    include_once "koneksi.php";
    $user_edited = $_GET['mhs'];
    $query = "SELECT nim, nama, tgllahir, alamat FROM tblmhs
            WHERE nim='$user_edited'";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        $row = mysqli_fetch_array($sql);
        $nim = $row['nim'];
        $nama = $row['nama'];
        $tgllahir = $row['tgllahir'];
        $alamat = $row['alamat'];
    ?>
        <form action="" method="post">
        <label style="color:#647cff" for="nim">Nim</label> <input class="box" id="nim" type="text" name="nim" placeholder="Nim" value="<?= $row['nim'] ?>" required  readonly/> <br />
        <label style="color:#647cff" for="nama">Nama</label> <input id="nama" class="box2" type="name" name="nama" placeholder="Nama" value="<?= $row['nama'] ?>" required oninvalid="this.setCustomValidity('Isi Nama Mahasiswa!')"  oninput="this.setCustomValidity('')"/> <br />
        <label style="color:#647cff" for="tgllahir">Tanggal Lahir</label>  <input class="box6" id="tgllahir" type="date" name="tgllahir" placeholder="Tanggal Lahir" value="<?=$row['tgllahir']?>" required oninvalid="this.setCustomValidity('Isi Tanggal Lahir Mahasiswa!')"  oninput="this.setCustomValidity('')"/> <br />
        <label style="color:#647cff" for="alamat">Alamat</label> <textarea id="alamat" type="text" name="alamat" placeholder="Alamat" required oninvalid="this.setCustomValidity('Isi Alamat Mahasiswa!')"  oninput="this.setCustomValidity('')"><?= $row['alamat']?></textarea> <br /><br />
            <input  class="submit" type="submit" name="edit" value="Edit" />
            <input type="hidden" name="user_edited" value="<?= $user_edited ?>">
        </form>

    <?php  } ?>
    <?php
    if (isset($_POST['edit'])) {
        $nim = $_POST['user_edited'];
        $nama = $_POST['nama'];
        $tgllahir = date('Y-m-d', strtotime($_POST['tgllahir']));
        $alamat = $_POST['alamat'];
        include_once "koneksi.php";
        $query = "UPDATE tblmhs SET nama='$nama', tgllahir='$tgllahir', alamat='$alamat' WHERE nim='$nim'";
        $exequery = mysqli_query($conn, $query) or die($query);
        if ($exequery) {
            $pesan = "Proses Edit Berhasil";
            echo "<script>alert('$pesan'); document.location= 'index.php?page=tblmhs'</script>";
        } else {
            $pesan = "Proses edit gagal";
            echo "<script>alert('$pesan'); document.location= 'index.php?page=tblmhs'</script>";
        }
       
    }
    ?>
</div>
</article>