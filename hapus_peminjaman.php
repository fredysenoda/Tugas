<?php
    $id_peminjaman=$_GET['id_peminjaman'];
    $query=mysqli_query($koneksi, "DELETE FROM tambah peminjaman WHERE id_peminjaman='$id_peminjaman'");
    if ($query){
        echo "<script>alert('Peminjaman Berhasil Di Hapus')</script>";
        echo "<script>location='index.php?hal=hapus_peminjaman'</script>";
        
    }
?>