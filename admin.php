<div class="container mt-6">
    <h2>Data Admin</h2><br>
    <a href="index.php?hal=tambah_admin" class="btn btn-dark"> Tambah Data</a>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <hr>
    <table id="example" class="table table-striped">
        <thead>
            <th> No </th>
            <th> Nama Lengkap </th>
            <th> Username </th>
            <th> Alamat</th>
            <th>Aksi</th>
            
        </thead>
        <tbody>
        <?php
            $no=1; 
            $query = mysqli_query($koneksi, "SELECT * FROM tb_admin");
            while($rows = mysqli_fetch_array($query)){
             ?>
            <tr>
               <td><?= $no++; ?></td>
               <td><?= $rows['nama_admin'] ?></td>
               <td><?= $rows['username'] ?></td>
               <td><?= $rows['alamat'] ?></td>
               <td>
                <a href="index.php?hal=edit_admin&id_admin=<?=$rows['id_admin']?>" class="btn btn-warning btn-sm">Edit Data</a>
                <a onclick="return confirm ('Anda Yakin Hapus Data')" href="index.php?hal=hapus_admin&id_admin=<?=$rows['id_admin']?>" 
                class="btn btn-danger btn-sm">Hapus Data</a>
               </td>

                
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>