<?php
#File       : reset.php
#Deskripsi  : Reset password penulis
?>
<body id="crud_category">
<div class="container" style="margin-top: 8%;">
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <br>
            <h5>Anda yakin ingin mereset password penulis ini?</h5>
            <table class="table table-striped">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?php echo $row->nama; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><?php echo $row->email; ?></td>
                </tr>
            </table>
            <br>
            <a class="btn btn-danger" href="<?php echo base_url('admin/do_reset').'/'.$row->idpenulis; ?>">Reset</a>
            <a class="btn btn-primary" href="<?php echo base_url('admin/viewPenulis'); ?>">Cancel</a>
        </div>
    </div>
</div>
</body>