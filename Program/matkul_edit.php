<article>
    <div class="card">
        <h2 align="center" style="color:#0059be">Edit Data Matakuliah</h2>
        <?php
        // ambil data user di db
        include_once "koneksi.php";
        $code_edited = $_GET['mtk'];
        $query = "SELECT kd_mtk, nm_mtk, sks FROM tblmatkul
            WHERE kd_mtk='$code_edited'";
        $sql = mysqli_query($conn, $query);
        if ($sql) {
            $row = mysqli_fetch_array($sql);
            $kd_mtk = $row['kd_mtk'];
            $nmmtk = $row['nm_mtk'];
            $sks = ['sks'];

        ?>
            <form action="" method="post">
                <label style="color:#647cff" for="kdmtk">Kode Matakuliah</label> <input id="kdmtk" class="box" type="text" name="code_edited" placeholder="Kode Matakuliah" value="<?= $row['kd_mtk'] ?>" readonly /> <br />
                <label style="color:#647cff" for="nmmtk">Nama Matakuliah</label> <input class="box3" id="nmmtk" size="25px" type="text" name="nm_mtk" placeholder="Nama Matakuliah" value="<?= $row['nm_mtk'] ?>" required oninvalid="this.setCustomValidity('Isi Nama Matakuliah')" oninput="this.setCustomValidity('')" /> <br />
                <label style="color:#647cff" for="sks">SKS</label> <input id="sks" type="number" class="box4" name="sks" placeholder="SKS" value="<?= $row['sks'] ?>" required min="1" max="20" oninvalid="this.setCustomValidity('Isi SKS! Nilai 1-20')" oninput="this.setCustomValidity('')" /> <br /><br />
                <input class="submit" type="submit" name="edit" value="Edit" />
                <input type="hidden" name="code_edited" value="<?= $code_edited ?>">
            </form>

        <?php  } ?>
        <?php
        if (isset($_POST['edit'])) {
            $kd_mtk = $_POST['code_edited'];
            $nmmtk = $_POST['nm_mtk'];
            $sks = $_POST['sks'];

            include_once "koneksi.php";
            $query = "UPDATE tblmatkul SET nm_mtk='$nmmtk', sks='$sks' WHERE kd_mtk='$kd_mtk'";



            $exequery = mysqli_query($conn, $query) or die($query);
            if ($exequery) {
                $pesan = "Proses Edit Berhasil";
                echo "<script>alert('$pesan'); document.location= 'index.php?page=tblmatkul'</script>";
            } else {
                $pesan = "Proses edit gagal";
                echo "<script>alert('$pesan'); document.location= 'index.php?page=tblmatkul'</script>";
            }

         
        }
        ?>
    </div>
</article>