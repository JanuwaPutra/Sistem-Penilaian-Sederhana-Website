<article>
    <h2 style="font-weight:900;">Data Nilai Mahasiswa</h2>
    <form action="" method="get">
        <select class="box5" name="mhs" id="mhs-slct">
            <option value="%">Semua Nama Mahasiswa</option>
            <?php
            include_once "koneksi.php";
            $query = "SELECT nama,nim FROM tblmhs";
            $sql = mysqli_query($conn, $query);
            while ($mhs = mysqli_fetch_array($sql)) {
            ?>
                <option value="<?= $mhs[1] ?>" <?php if ($_GET['mhs'] == $mhs[1]) { ?> selected="true" <?php }; ?>><?php echo $mhs[0] ?></option>
            <?php
            }
            ?>
        </select>
        <select class="box5" name="matkul" id="mhs-slct">
            <option value="%">Semua Nama Matakuliah</option>
            <?php
            include_once "koneksi.php";
            $query = "SELECT nm_mtk, kd_mtk FROM tblmatkul";
            $sql = mysqli_query($conn, $query);
            while ($mtk = mysqli_fetch_array($sql)) {
            ?>
                <option value="<?= $mtk[1] ?>" <?php if ($_GET['matkul'] == $mtk[1]) { ?> selected="true" <?php }; ?>><?php echo $mtk[0] ?></option>
            <?php
            }
            ?>
        </select>
        <input type="hidden" name="page" value="tblnilai">
        <input class="filter" type="submit" value="Filter">
    </form><br />
    <?php
    include_once "koneksi.php";
    ?>
    <table border="1">
        <tr>
            <th>NO</th>
            <th>NIM</th>
            <th>NAMA MAHASISWA</th>
            <th>KODE</th>
            <th>MATAKULIAH</th>
            <th>NILAI</th>
            <th>GRADE</th>
            <th>PROSES</th>
        </tr>
        <?php
        if (isset($_GET['mhs'])) {
            $mhs = $_GET['mhs'];
            $matkul = $_GET['matkul'];
            $sql = "SELECT tblnilai.nim, tblmhs.nama, tblmatkul.kd_mtk, tblmatkul.nm_mtk, nilai
            FROM tblnilai
            INNER JOIN tblmhs
            ON tblnilai.nim=tblmhs.nim
            INNER JOIN tblmatkul
            ON tblnilai.kd_mtk=tblmatkul.kd_mtk
            WHERE tblmhs.nim LIKE '$mhs' AND tblmatkul.kd_mtk LIKE '$matkul'";
        } else {
            $sql = "SELECT tblnilai.nim, tblmhs.nama, tblmatkul.kd_mtk, tblmatkul.nm_mtk, nilai
            FROM tblnilai
            INNER JOIN tblmhs
            ON tblnilai.nim=tblmhs.nim
            INNER JOIN tblmatkul
            ON tblnilai.kd_mtk=tblmatkul.kd_mtk";
        }
        $sql = mysqli_query($conn, $sql);
        $no = 1;
        while ($row = mysqli_fetch_array($sql)) {
            $nim = $row['nim'];
            $nama = $row['nama'];
            $kode = $row['kd_mtk'];
            $mtk = $row['nm_mtk'];
            $nilai = $row['nilai'];

            if ($nilai >= 85) {
                $grade = "A";
            } else if ($nilai >= 80) {
                $grade = "A-";
            } else if ($nilai >= 75) {
                $grade = "B+";
            } else if ($nilai >= 70) {
                $grade = "B";
            } else if ($nilai >= 65) {
                $grade = "B-";
            } else if ($nilai >= 60) {
                $grade = "C";
            } else if ($nilai >= 45) {
                $grade = "D";
            } else {
                $grade = "E";
            }
        ?>

            <tr>
                <td align="center"><?php echo $no++ ?></td>
                <td align="center"><?php echo $nim ?></td>
                <td align="center"><?php echo $nama ?></td>
                <td align="center"><?php echo $kode ?></td>
                <td align="center"><?php echo $mtk ?></td>
                <td align="center"><?php echo $nilai ?></td>
                <td align="center"><?php echo $grade ?></td>
                <td align="center">
                    <a class="link2" href="index.php?page=nilai_edit&kdmtk=<?= $kode ?>&nim=<?= $nim ?>">Edit </a>

                    <a class="link3" onClick="return confirm('Apakah Anda yakin mau menghapus data ini?')" href="index.php?page=nilai_del&kdmtk=<?= $kode ?>&nim=<?= $nim ?> ">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table><br />
    <h4>
        <a class="button" href="index.php?page=nilai_entry">+ Entri Nilai Mahasiswa</a>
    </h4>
</article>