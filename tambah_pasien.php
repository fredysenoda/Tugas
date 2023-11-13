<div class="container mt-4">
    <h2>Tambah Mahasiswa</h2><hr>
    <div class="card shadow-lg p-3 mb-5">
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Nim</label>
                    <input type="text" name="nim" class="form-control" placeholder="Masukan Nim">
                </div>
                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukan Nama">
                </div>  
                <div class="form-group">
                    <label for="">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukan Tempat">
                </div>
                <div class="form-group">
                    <label for="">Tgl Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" placeholder="Masukan Username Admin">
                </div>
                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="" class="form-control">
                    <option velue="Laki Laki">Laki Laki</option>
                    <option velue="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Program Studi</label>
                    <select name="prodi" id="" class="form-control">
                    <?php $no=1;
                        $query = mysqli_query($koneksi,"SELECT * FROM tb_prodi"); 
                        while($rows = mysqli_fetch_array($query)){
                        ?>    
                        <option value="<?= $rows['id_prodi'] ?>"><?= $rows['nama_prodi'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Agama</label>
                    <select name="agama" id="" class="form-control">
                         <?php $no=1;
                        $query = mysqli_query($koneksi,"SELECT * FROM tb_agam"); 
                        while($rows = mysqli_fetch_array($query)){
                        ?>    
                        <option value="<?= $rows['id_agama'] ?>"><?= $rows['nama_agama'] ?></option>
                        <?php } ?> -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Asal Sekolah</label>
                    <input type="text" name="asal_sekolah"  class="form-control" placeholder="Masukan Asal Sekolah">
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea type="text" name="alamat" id="" cols="30" rows="3" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Gambar</label>
                    <input type="file" name="gambar"  class="form-control" placeholder="Masukan Asal Sekolah" >
                </div>
                <br>
                <button type="Submit" name="simpan" class="btn btn-success">Simpan</button>              
            </form>
        </div>
    </div>
</div>
<?php
    if (isset($_POST['simpan'])){
        $nim            = $_POST['nim'];
        $nama_lengkap   = $_POST['nama_lengkap'];
        $tempat_lahir    = $_POST['tempat_lahir'];
        $tgl_lahir       = $_POST['tgl_lahir'];
        $jenis_kelamin    = $_POST['jenis_kelamin'];
        $prodi          = $_POST['prodi'];
        $agama          = $_POST['agama'];
        $alamat          = $_POST['alamat'];
        $asal_sekolah = $_POST['asal_sekolah'];

        $file =$_FILES['gambar']['name'];
        $lok =$_FILES['gambar']['tmp_name'];
        $y =explode('.',$file);
        $format =strtolower(end($y));
        $namabaru =uniqid();
        $namabaru .='.';
        $namabaru .=$format;

        $query = mysqli_query($koneksi, "INSERT INto tb_mahasiswa VALUES('$nim','$nama_lengkap','$tempat_lahir',
        '$tgl_lahir','$jenis_kelamin','$prodi','$agama','$alamat','$asal_sekolah','$namabaru')");
        if(strlen($file)>0){
            move_uploaded_file($lok, 'gambar/'.$namabaru);
        }
        
        if ($query){
            echo "<script>alert('Data Berhasil Di Tambahkan')</script>";
            echo "<script>location='index.php?hal=data_mahasiswa'</script>";
        }else{
            echo "<script>alert('Data Gagal Di Tambahkan')</script>";
            echo "<script>location='index.php?hal=tambah_mahasiswa'</script>";
        }

    }
?>