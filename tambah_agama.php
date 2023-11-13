<div class="container mt-4">
    <h2>Tambah Agama</h2><hr>
    <div class="card shadow-lg p-3 mb-5">
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="">Nama Agama</label>
                    <input type="text" name="nama_agama" class="form-control" placeholder="Masukan Nama agama">
                </div>
                <br>
                <button type="Submit" name="simpan" class="btn btn-success">Simpan</button>              
            </form>
        </div>
    </div>
</div>

<?php
    if (isset($_POST['simpan'])){
        $nama_agama = $_POST['nama_agama'];
        // $username = $_POST['username'];
        // $password = md5($_POST['password']);
        // $alamat = $_POST['alamat'];

        $query = mysqli_query($koneksi, "INSERT INto tb_agam VALUES(NULL,'$nama_agama')");
        
        if ($query){
            echo "<script>alert('Data Berhasil Di Tambahkan')</script>";
            echo "<script>location='index.php?hal=agama'</script>";
        }else{
            echo "<script>alert('Data Gagal Di Tambahkan')</script>";
            echo "<script>location='index.php?hal=tambah_agama'</script>";
        }

    }
?>