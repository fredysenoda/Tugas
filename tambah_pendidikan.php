<div class="container mt-4">
    <h2>Tambah Prodi</h2><hr>
    <div class="card shadow-lg p-3 mb-5">
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="">Kode Prodi</label>
                    <input type="text" name="kode_prodi" class="form-control" placeholder="Masukan Kode Prodi">
                </div>
                <div class="form-group">
                    <label for="">Nama Prodi</label>
                    <input type="text" name="nama_prodi" class="form-control" placeholder="Masukan Nama Prodi">
                </div>   
                <br>
                <button type="Submit" name="simpan" class="btn btn-success">Simpan</button>              
            </form>
        </div>
    </div>
</div>

<?php
    if (isset($_POST['simpan'])){
        $kode_prodi = $_POST['kode_prodi'];
        $nama_prodi = $_POST['nama_prodi'];
        

        $query = mysqli_query($koneksi, "INSERT INto tb_prodi VALUES(NULL,'$kode_prodi','$nama_prodi')");
        
        if ($query){
            echo "<script>alert('Prodi Berhasil Di Tambahkan')</script>";
            echo "<script>location='index.php?hal=prodi'</script>";
        }else{
            echo "<script>alert('Prodi Gagal Di Tambahkan')</script>";
            echo "<script>location='index.php?hal=tambah_prodi'</script>";
        }

    }
?>