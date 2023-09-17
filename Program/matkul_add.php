<article>
    <div class ="card">
    <h2 align="center" style="color:#0059be">Input Matakuliah</h2>
    <form  id="Form" action="" method="post">
        <label style="color:#647cff" for="kdmtk">Kode Matakuliah</label> <input id="kdmtk" class="box" type="text" name="kode" placeholder="Kode Matakuliah" required oninvalid="this.setCustomValidity('Isi Kode Matakuliah!')"  oninput="this.setCustomValidity('')" /> <br />
        <label style="color:#647cff" for="nmmtk">Nama Matakuliah</label><input id="nmmtk" class="box3" type="text" name="namamatkul" placeholder="Nama MataKuliah" required  oninvalid="this.setCustomValidity('Isi Nama Matakuliah!')"  oninput="this.setCustomValidity('')"/> <br />
        <label style="color:#647cff" for="sks">SKS</label><input id="sks" class="box4" type="number" name="sks" placeholder="sks" min="1" max="20" required oninvalid="this.setCustomValidity('Isi SKS! Nilai 1-20')"  oninput="this.setCustomValidity('')"/> <br /><br />
        <input   class="submit" type="submit" name="input" value="Input" /> <br/>
        <input  class="submit" type="button" onclick="myFunction()" value="Reset">
    </form>

    <?php
    if (isset($_POST['input'])) {
        $kode = $_POST['kode'];
        $namamtk = $_POST['namamatkul'];
        $sks = $_POST['sks'];

        include_once "koneksi.php";
        $query = "INSERT INTO tblmatkul values ('$kode', '$namamtk', ' $sks')";

        $exequerry = mysqli_query($conn, $query);


        if ($exequerry) {
            $pesan = "Tambah matakuliah berhasil";
            echo "<script>alert(' $pesan');document.location='index.php?page=tblmatkul'</script>";
        } else {
            $pesan = "Tambah Matakuliah gagal";
            echo "<script>alert(' $pesan');document.location='index.php?page=tblmatkul'</script>";
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