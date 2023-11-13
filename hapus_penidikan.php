<?php
    $id_pendidikan=$_GET['id_pendidikan'];
    $query=mysqli_query($koneksi, "DELETE FROM tb_pendidikan WHERE id_pendidikan='$id_pendidikan'");
    if ($query){
        echo "<script>alert('pendidikan Berhasil Di Hapus')</script>";
        echo "<script>location='index.php?hal=pendidikan'</script>";
        
    }
?>