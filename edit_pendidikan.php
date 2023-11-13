<div class="container mt-4">
    <h2>Edit Pendidikan</h2><hr>
    <div class="card shadow-lg p-3 mb-5">
        <div class="card-body">
            <?php
                $id_pendidikan = $_GET['id_pendidikan'];
                $query = mysqli_query($koneksi,"SELECT * FROM tb_pendidikan WHERE id_pendidikan='$id_pendidikan'");
                $rows = mysqli_fetch_array($query);
            ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="">Kode Pendidikan</label>
                    <input type="text" name="kode_pendidikan" value="<?= $rows['kode_pendidikan']?>" class="form-control" placeholder="Masukan Kode Pendidikan">
                </div>
                <div class="form-group">
                    <label for="">Nama Pendidikan</label>
                    <input type="text" name="nama_pendidikan" value="<?= $rows['nama_pendidikan']?>" class="form-control" placeholder="Masukan Nama Pendidikan">
                </div>  
                <br>
                <button type="Submit" name="simpan" class="btn btn-success">Simpan</button>              
            </form>
        </div>
    </div>
</div>

<?php
    if (isset($_POST['simpan'])){
        $kode_pendidikan = $_POST['kode_pendidikan'];
        $nama_pendidikan = $_POST['nama_pendidikan'];
        

        $query = mysqli_query($koneksi, "UPDATE tb_pendidikan SET kode_pendidikan='$kode_pendidikan',nama_pendidikan='$nama_pendidikan' WHERE id_pendidikan = '$id_pendidikan' ");
        
        if ($query){
            echo "<script>alert('Pendidikan Berhasil Di Edit')</script>";
            echo "<script>location='index.php?hal=prodi'</script>";
        }else{
            echo "<script>alert('prodi Gagal Di Edit')</script>";
            echo "<script>location='index.php?hal=tambah_prodi'</script>";
        }

    }
?>