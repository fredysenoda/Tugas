<div class="container mt-4">
    <h3>Edit pasien</h3><hr>
    <div class="card shadow-lg p-3 mb-5">
        <div class="card-body">
            <?php
                $no_induk = $_GET['no_induk'];
                $query = mysqli_query($koneksi, "SELECT * FROM tb_pasien WHERE no_induk='$no_induk'");
                $rows = mysqli_fetch_array($query);
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">   
                    <label for="">no_induk</label>
                    <input type="text" name="no_induk" value="<?=$rows['no_induk'] ?>" class="form-control" placeholder="Masukkan no_induk" readonly>
                 </div>       
                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="<?=$rows['nama_lengkap'] ?>" class="form-control" placeholder="Masukkan Nama Lengkap">   
                </div>             
                <div class="form-group">
                    <label for="">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" value="<?=$rows['tempat_lahir'] ?>" class="form-control" placeholder="Masukkan Tempat Lahir">
                </div>
                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" value="<?=$rows['tgl_lahir'] ?>" class="form-control" placeholder="Masukkan Tanggal Lahir">
                </div>
                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="" class="form-control">
                        <option value="Laki-Laki" <?php if ($rows['jenis_kelamin']=="Laki-laki") {
                            echo"selected";
                        } ?> >Laki-Laki</option> 
                        <option value="Perempuan" <?php if ($rows['jenis_kelamin']=="Laki-laki") {
                            echo"selected";
                        } ?> >Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Program Studi</label>
                    <select name="pendidikan" id="" class="form-control">
                        <?php $no=1;
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_pendidikan");
                        while($pendidikan = mysqli_fetch_array($query)){
                            if ($pendidikan['id_pendidikan']==$rows['id_pendidikan']) {
                                echo "<option value='$pendidikan[id_pendidikan]' selected>$pendidikan[nama_pendidikan]</option>";
                            }else{
                                echo "<option value='$pendidikan[id_prodi]'>$pendidikan[nama_pendidikan]</option>";
                            }
                            
                          }

                        ?> 
                
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Agama</label>
                    <select name="agama" id="" class="form-control">
                        <?php $no=1;
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_agam");
                        while($a = mysqli_fetch_array($query)){
                            if ($a['id_agama']==$rows['id_agama']) {
                                echo "<option value='$a[id_agama]' selected>$a[nama_agama]</option>";
                            }else{
                                echo "<option value='$a[id_agama]'>$a[nama_agama]</option>"; 
                            }
                        }
                        ?> 

                    </select>
                </div>   
                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat" id="" cols="30" rows="3" class="form-control"><?=$rows['alamat']?></textarea>
                 </div>  
                 <div class="form-group">
                    <label for="">Asal Sekolah</label>
                    <input type="text" name="asal_sekolah" value="<?=$rows['asal_sekolah'] ?>" class="form-control" placeholder="Masukkan Asal Sekolah">
                </div>
                <div class="form-group">
                    <label for="">Gambar</label>
                    <input type="file" name="gambar" class="form-control" placeholder="Masukkan Gambar"><br>
                    <img src="gambar/<?=$rows['gambar'] ?>" width="100" alt="">
                </div>
                 <br>
                 <button type="submit" name="simpan" class="btn btn-success">Simpan</button>                                           
            </form>
        </div>
    </div>
</div>

<?php
    if (isset($_POST['simpan'])) {
        $no_induk =$_POST['no_induk'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $pendidikan = $_POST['pendidikan'];
        $agama = $_POST['agama'];
        $alamat = $_POST['alamat'];
        $asal_sekolah = $_POST['asal_sekolah'];


        //script untuk upload file atau gambar
        $file       = $_FILES['gambar']['name'];
        $lok        = $_FILES['gambar']['tmp_name'];
        $y          =explode('.', $file);
        $format     =strtolower(end($y));
        $namabaru   =uniqid();
        $namabaru   .='.';
        $namabaru   .=$format;
        if (!empty($lok)) {
            if (strlen($file)>0) {
                move_uploaded_file($lok, 'gambar/'.$namabaru);
            }
            $gambar=$rows['gambar'];
            if (file_exists("gambar/$gambar")) {
                unlink("gambar/$gambar");
            }
            $query = mysqli_query($koneksi,"UPDATE tb_pasien SET nama_lengkap='$nama_lengkap', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin', gambar='$namabaru', id_prodi='$pendidikan', id_agama='$agama', alamat='$alamat', asal_sekolah='$asal_sekolah' WHERE no_induk='$no_induk' ");
            if ($query) {
                echo "<script>alert('Gambar berhasil di edit ')</script>";
                echo "<script>location='index.php?hal=data_pasien'</script>";
            }else{
                echo "<script>alert('Gambbr Gagal di edit ')</script>";
                echo "<script>location='index.php?hal=data_pasien'</script>";
            }
        }else{
            $query = mysqli_query($koneksi,"UPDATE tb_pasien SET nama_lengkap='$nama_lengkap', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin',  id_prodi='$pendidikan', id_agama='$agama', alamat='$alamat', asal_sekolah='$asal_sekolah' WHERE no_induk='$no_induk' ");
            if ($query) {
                echo "<script>alert('Gambar berhasil di edit ')</script>";
                echo "<script>location='index.php?hal=data_pasien'</script>";
            }else{
                echo "<script>alert('Gambar Gagal di edit ')</script>";
                echo "<script>location='index.php?hal=data_pasien'</script>";
            }

        }
           

        }
    ?>
