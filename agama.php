<div class="container mt-5">
    <h2>Data Agama</h2><br>
    <a href="index.php?hal=tambah_agama" class="btn btn-dark"> Tambah Agama</a>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <hr>
    <table id="example" class="table table-striped">
        <thead>
            <th> No </th>
            <th> Nama Agama </th>
            <th>Aksi</th>
            
        </thead>
        <tbody>
        <?php
            $no=1; 
            $query = mysqli_query($koneksi, "SELECT * FROM tb_agam");
            while($rows = mysqli_fetch_array($query)){
        
             ?>
            <tr>
               <td><?= $no++; ?></td>
               <td><?= $rows['nama_agama'] ?></td>
               <td>
                <a href="index.php?hal=edit_agama&id_agama=<?=$rows['id_agama']?>" class="btn btn-warning btn-sm">Edit Data</a>
                <a onclick="return confirm ('Anda Yakin Hapus Agama')" href="index.php?hal=hapus_agama&id_agama=<?=$rows['id_agama']?>" 
                class="btn btn-danger btn-sm">Hapus Data</a>
               </td>

                
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>