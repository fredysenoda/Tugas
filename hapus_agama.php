<?php
    $id_agama=$_GET['id_agama'];
    $query=mysqli_query($koneksi, "DELETE FROM tb_agam WHERE id_agama='$id_agama'");
    if ($query){
        echo "<script>alert('Agama Berhasil Di Hapus')</script>";
        echo "<script>location='index.php?hal=agama'</script>";
                                            
    }
?>