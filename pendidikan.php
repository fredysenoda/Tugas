<div class="container mt-5">
    <h2>Data pendidikan</h2><br>
    <a href="index.php?hal=tambah_pendidikan" class="btn btn-dark"> Tambah pendidikan</a>
    <hr>
    <table id="example" class="table table-striped">
        <thead>
            <th> No </th>
            <th> Kode pendidikan </th>
            <th> Nama pendidikan </th>
            <th>Aksi</th>
            
        </thead>
        <tbody>
        <?php
            $no=1; 
            $query = mysqli_query($koneksi, "SELECT * FROM tb_pendidikan");
            while($rows = mysqli_fetch_array($query)){
        
             ?>
            <tr>
               <td><?= $no++; ?></td>
               <td><?= $rows['kode_pendidikan'] ?></td>
               <td><?= $rows['nama_pendidikan'] ?></td>
                <td>
                <a href="index.php?hal=edit_pendidikan&id_pendidikan=<?=$rows['id_pendidikan']?>" class="btn btn-warning btn-sm">Edit pendidikan</a>
                <a onclick="return confirm ('Anda Yakin Hapus pendidikan')" href="index.php?hal=hapus_pendidikan&id_pendidikan=<?=$rows['id_pendidikan']?>" 
                class="btn btn-danger btn-sm">Hapus pendidikan</a>
               </td>

                
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>