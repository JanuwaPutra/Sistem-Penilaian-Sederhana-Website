<article><h2  style="font-weight:900;">Data Mahasiswa</h2>

<?php
    include_once "koneksi.php";

    $query = "SELECT * FROM tblmhs ORDER BY nim";
    $sql = mysqli_query($conn, $query);
    
    ?>
    <table border="1">
        <tr>
            <th>NO</th>
            <th>NIM</th>
            <th>NAMA</th>
            <th>TANGGAL LAHIR</th>
            <th>ALAMAT</th>
            <th>PROSES</th>
        </tr>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($sql)){
            $nim = $row['nim'];
            $nama = $row['nama'];
            $tgllahir = date('d-m-Y', strtotime($row['tgllahir']));
            $alamat = $row['alamat'];
        ?>
        <tr>
            <td align="center"><?php echo $no++ ?></td>
            <td align="center"><?php echo $nim ?></td>
            <td align="center"><?php echo $nama ?></td>
            <td align="center"><?php echo $tgllahir ?></td>
            <td ><?php echo $alamat ?></td>
            <td align="center">
               <a  class="link2" href="index.php?page=mhs_edit&mhs=<?=$nim?>">Edit  </a> 
               <a   class="link3" onClick="return confirm('Apakah Anda yakin mau menghapus data ini?')" href="index.php?page=mhs_del&mhs=<?=$nim?>">Delete</a> 
            </td>
        </tr>
        <?php } ?>
    </table><br />
    <h4><a  class="button" href="index.php?page=mhs_add">+ Tambah Mahasiswa Baru</a></h4>
        </article>