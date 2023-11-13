<div class="container mt-4">
    <h2>Edit Agama</h2><hr>
    <div class="card shadow-lg p-3 mb-5">
        <div class="card-body">
            <?php
                $id_agama = $_GET['id_agama'];
                $query = mysqli_query($koneksi,"SELECT * FROM tb_agam WHERE id_agama='$id_agama'");
                $rows = mysqli_fetch_array($query);
            ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="">Nama Agama</label>
                    <input type="text" name="nama_agama" value="<?= $rows['nama_agama']?>" class="form-control" placeholder="Masukan Nama Agama">
                </div>
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
        
        $query = mysqli_query($koneksi, "UPDATE tb_agam SET nama_agama='$nama_agama' WHERE id_agama= '$id_agama' ");
        
        if ($query){
            echo "<script>alert('Agama Berhasil Di Tambahkan')</script>";
            echo "<script>location='index.php?hal=agama'</script>";
        }else{
            echo "<script>alert('Agama Gagal Di Tambahkan')</script>";
            echo "<script>location='index.php?hal=tambah_agama'</script>";
        }

    }
?>