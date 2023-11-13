<div class="container mt-4">
    <h2>Edit Admin</h2><hr>
    <div class="card shadow-lg p-3 mb-5">
        <div class="card-body">
            <?php
                $id_admin = $_GET['id_admin'];
                $query = mysqli_query($koneksi,"SELECT * FROM tb_admin WHERE id_admin='$id_admin'");
                $rows = mysqli_fetch_array($query);
            ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="">Nama Admin</label>
                    <input type="text" name="nama_admin" value="<?= $rows['nama_admin']?>" class="form-control" placeholder="Masukan Nama Admin">
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" value="<?= $rows['username']?>" class="form-control" placeholder="Masukan Username Admin">
                </div>  
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukan password Admin">
                    <input type="hidden" nama='id_admin' value='<?=$rows['id_admin']?>'>
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea type="text" name="alamat" id="" cols="30" rows="3" class="form-control"><?= $rows['alamat']?></textarea>
                </div>  
                <br>
                <button type="Submit" name="simpan" class="btn btn-success">Simpan</button>              
            </form>
        </div>
    </div>
</div>

<?php
    if (isset($_POST['simpan'])){
        $nama_admin = $_POST['nama_admin'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $alamat = $_POST['alamat'];

        $query = mysqli_query($koneksi, "UPDATE tb_admin SET nama_admin='$nama_admin',username='$username',password='$password', alamat='$alamat' WHERE id_admin = '$id_admin' ");
        
        if ($query){
            echo "<script>alert('Data Berhasil Di Tambahkan')</script>";
            echo "<script>location='index.php?hal=admin'</script>";
        }else{
            echo "<script>alert('Data Gagal Di Tambahkan')</script>";
            echo "<script>location='index.php?hal=tambah_admin'</script>";
        }

    }
?>