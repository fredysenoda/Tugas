<div class="container mt-5">
    <h2>Data Pasien</h2><br>
    <a href="index.php?hal=tambah_pasien" class="btn btn-dark"> <i class="fa-solid fa-person-circle-plus"> Tambahkan</i></a>
    <a href="index.php?hal=home" class="btn btn-danger">kembali</a>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <hr>
    <table id="example" class="table table-striped">
        <thead>
            <th> No </th>
            <th> Foto </th>
            <th> Nim </th>
            <th> Nama Lengkap </th>
            <th> Pendidikan</th>
            <th> Tempat Tgl Lahir</th>
            <th> Alamat</th>
            <th>Aksi</th>
            
        </thead>
        <tbody>
        <?php
            $no=1; 
            $query = mysqli_query($koneksi, "SELECT * FROM tb_pasien INNER JOIN tb_pendidikan ON tb_pendidikan.id_pendidikan=tb_pasien.id_pendidikan");
            while($rows = mysqli_fetch_array($query)){
        
             ?>
            <tr>
               <td><?= $no++; ?></td>
               <td>
                    <img src="gambar/<?= $rows['gambar'] ?>" width="50" alt="">
               </td>
               <td><?= $rows['no_induk'] ?></td>
               <td><?= $rows['nama_lengkap'] ?></td>
               <td><?= $rows['nama_pendidikan'] ?></td>
               <td><?= $rows['tempat_lahir'] ?> <?= $rows['tgl_lahir'] ?></td>
               <td><?= $rows['alamat'] ?></td>
               
               <td>
                <a href="index.php?hal=edit_pasien&no_induk=<?=$rows['no_induk']?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-pen-to-square"> Edit</i></a>
                <a href="index.php?hal=detail_pasien&no_induk=<?=$rows['no_induk']?>" class="btn btn-info btn-sm"><i class="fa-solid fa-file-lines"></i> detail</a>

                <a onclick="return confirm ('Anda Yakin Hapus')" href="index.php?hal=hapus_pasien&no_induk=<?=$rows['no_induk']?>" 
                class="btn btn-warning btn-sm"><i class="fa-solid fa-trash-can"> Hapus</i></a>
               </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>