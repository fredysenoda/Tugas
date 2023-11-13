<?php
    $id_admin=$_GET['id_admin'];
    $query=mysqli_query($koneksi, "DELETE FROM tb_admin WHERE id_admin='$id_admin'");
    if ($query){
        echo "<script>alert('Data Berhasil Di Hapus')</script>";
        echo "<script>location='index.php?hal=admin'</script>";
        
    }
?>