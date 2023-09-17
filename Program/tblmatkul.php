<article>
    <h2 style="font-weight:900;">Data Matakuliah</h2>
    <?php
    include_once "koneksi.php";

    $query = "SELECT * FROM tblmatkul ORDER BY kd_mtk";
    $sql = mysqli_query($conn, $query);
    ?>
    <table border="1">
        <tr>
            <th>NO</th>
            <th>KODE</th>
            <th>NAMA MATAKULIAH</th>
            <th>SKS</th>
            <th>PROSES</th>
        </tr>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($sql)) {
            $kode = $row['kd_mtk'];
            $nmmtk = $row['nm_mtk'];
            $sks = $row['sks'];
        ?>
            <tr>
                <td align="center"><?php echo $no++ ?></td>
                <td align="center"><?php echo $kode ?></td>
                <td align="center"><?php echo $nmmtk ?></td>
                <td align="center"><?php echo $sks ?></td>
                <td align="center" >
                    <a  class="link2" href="index.php?page=matkul_edit&mtk=<?= $kode ?>">Edit </a>
                    <a  class="link3" onClick="return confirm('Apakah Anda yakin mau menghapus data ini?')" href="index.php?page=matkul_del&mtk=<?= $kode ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table> <br />
    <h4>
    <a href="index.php?page=matkul_add" class="button">+ Tambah Matakuliah Baru</a>
    </h4>
</article>