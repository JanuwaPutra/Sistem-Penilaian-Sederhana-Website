<article>
    <div class="card">
        <h2 align="center" style="color:#0059be">Input Data Mahasiswa</h2>
        </form>
        <form id="Form" action="" method="post">
            <label style="color:#647cff" for="nim">Nim</label> <input class="box" id="nim" type="text" name="nim" placeholder="Nim" maxlength="10" required oninvalid="this.setCustomValidity('Isi Nim Mahasiswa!')" oninput="this.setCustomValidity('')" /> <br />
            <label style="color:#647cff" for="nama">Nama</label><input class="box2" id="nama" type="text" name="nama" placeholder="Nama" required oninvalid="this.setCustomValidity('Isi Nama Mahasiswa!')" oninput="this.setCustomValidity('')" /> <br />
            <label style="color:#647cff" for="tgllahir">Tanggal Lahir</label> <input id="tgllahir" class="box6" type="date" name="tanggallahir" placeholder="Tanggal Lahir" required oninvalid="this.setCustomValidity('Isi Tanggal Lahir Mahasiswa!')" oninput="this.setCustomValidity('')" /> <br />
            <label style="color:#647cff" for="alamat">Alamat</label> <textarea rows="3" id="alamat" name="alamat" placeholder="Alamat" required oninvalid="this.setCustomValidity('Isi Alamat Mahasiswa!')" oninput="this.setCustomValidity('')"></textarea> <br /><br />
            <input class="submit" type="submit" name="input" value="Input" /> <br />
            <input class="submit" type="button" onclick="myFunction()" value="Reset"><br />
        </form>
        
        <?php   
        if (isset($_POST['input'])) {
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $tgllahir = date('Y-m-d', strtotime($_POST['tanggallahir']));
            $alamat = $_POST['alamat'];

            include_once "koneksi.php";
            $query = "INSERT INTO tblmhs values ('$nim', '$nama', ' $tgllahir', ' $alamat')";

            $exequerry = mysqli_query($conn, $query);


            if ($exequerry) {
                $pesan = "Tambah mahasiswa berhasil";
                echo "<script>alert(' $pesan');document.location='index.php?page=tblmhs'</script>";
            } else {
                $pesan = "Tambah mahasiswa gagal";
                echo "<script>alert(' $pesan');document.location='index.php?page=tblmhs'</script>";
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