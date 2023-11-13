<?php
    $no_induk=$_GET['no_induk'];
    $query=mysqli_query($koneksi, "SELECT * FROM tb_pasien WHERE no_induk='$no_induk'");
    $row=mysqli_fetch_array($query);
    $gambar=$row['gambar'];
    if (file_exists("gambar/$gambar")){
        unlink("gambar/$gambar");
    }

    $hapus=mysqli_query($koneksi, "DELETE FROM tb_pasien WHERE no_induk='$no_induk'");
    
        echo "<script>alert('Berhasil Di Hapus')</script>";
        echo "<script>location='index.php?hal=data_pasien'</script>";
        
?>