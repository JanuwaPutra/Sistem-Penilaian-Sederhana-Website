<article>
    <div class="card">
        <h1 align="center" style="color:#0059be">Entry Nilai Mahasiswa</h1>
        <form id="Form" action="" method="post">
            <label style="color:#647cff" for="nim">Nim</label> <select id="nim" class="box3" name="nama" required oninvalid="this.setCustomValidity('Isi Nama Mahasiswa!')" oninput="this.setCustomValidity('')">
                <option value=""></option>
                <?php
                include "koneksi.php";
                $q = "SELECT * from tblmhs";
                $resultq = mysqli_query($conn, $q);
                while ($x = mysqli_fetch_array($resultq)) {
                ?>
                    <option value="<?php echo $x['nim']; ?>">
                        <?php echo $x['nama']; ?>
                    </option>
                <?php
                }
                ?>
            </select><br />
            <label style="color:#647cff" for="nmmtk">Nama Matakuliah</label> <select class="box3" id="nmmtk" name="nm_mtk" required oninvalid="this.setCustomValidity('Isi Nama Matakuliah Mahasiswa!')" oninput="this.setCustomValidity('')">
                <option value=""></option>
                <?php
                include "koneksi.php";
                $q = "SELECT * from tblmatkul";
                $resultq = mysqli_query($conn, $q);
                while ($x = mysqli_fetch_array($resultq)) {
                ?>
                    <option value="<?php echo $x['kd_mtk']; ?>">
                        <?php echo $x['nm_mtk']; ?>
                    </option>
                <?php
                }
                ?>
            </select>
            </table><br>
            <label style="color:#647cff" for="nilai">Nilai</label><input class="box4" id="nilai" type="number" name="nilai" placeholder="nilai" min="0" max="100" required oninvalid="this.setCustomValidity('Isi Nilai Mahasiswa!  Nilai 0-100')" oninput="this.setCustomValidity('')" /> <br /><br />
            <input class="submit" type="submit" name="input" value="input" /> <br />
            <input class="submit" type="button" onclick="myFunction()" value="Reset">
        </form>
        <?php
        if (isset($_POST['input'])) {
            $nama = $_POST['nama'];
            $nm_mtk = $_POST['nm_mtk'];
            $nilai = $_POST['nilai'];

            $query = "SELECT * FROM tblnilai";
            $sql = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($sql)) {
                if ($nama == TRUE && $nm_mtk == $row['kd_mtk']) {
                    echo "<script>alert('tidak bisa entry nilai karena Nilai sudah diinput!'); document.location= 'index.php?mhs=%25&matkul=%25&page=tblnilai'</script>";
                    $i = 1;
                }
            }
            if ($i != 1) {
                include_once "koneksi.php";
                $query = "INSERT INTO tblnilai (nim, kd_mtk, nilai) VALUES ('$nama','$nm_mtk','$nilai')";

                $exquery = mysqli_query($conn, $query);
                if ($exquery) {
                    $pesan = "Berhasil Menambahkan!";
                    echo "<script>alert('$pesan'); document.location= 'index.php?mhs=%25&matkul=%25&page=tblnilai'</script>";
                } else {
                    $pesan = "Gagal Menambahkan!";
                    echo "<script>alert('$pesan'); document.location= 'index.php?mhs=%25&matkul=%25&page=tblnilai'</script>";
                }
            }
        }

        ?>
        <script>
            function myFunction() {
                document.getElementById("Form").reset();
            }
        </script>
    </div>
</article>