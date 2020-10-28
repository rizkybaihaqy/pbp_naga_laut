<?php
#File       : delete_category.php
#Deskripsi  : Menghapus data kategori
?>
<body id="crud_category">
<div class="container" style="margin-top: 8%;">
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <br>
            <h5>Anda yakin ingin menghapus kategori ini?</h5>
            <table class="table table-striped">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?php echo $row->nama; ?></td>
                </tr>
            </table>
            <br>
            <a class="btn btn-danger" href="<?php echo base_url('category/del').'/'.$row->idkategori; ?>">Delete</a>
            <a class="btn btn-primary" href="<?php echo base_url('category'); ?>">Cancel</a>
        </div>
    </div>
</div>
</body>