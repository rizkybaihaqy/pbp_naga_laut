<?php
#File       : delete_post.php
#Deskripsi  : Menghapus data post
?>

<body id="crud_category">
    <div class="container" style="margin-top: 8%;">
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <br>
                <h5>Anda yakin ingin menghapus post ini?</h5>
                <table class="table table-striped">
                    <tr>
                        <td>Judul</td>
                        <td>:</td>
                        <td><?php echo $row->judul; ?></td>
                    </tr>
                </table>
                <br>
                <a class="btn btn-danger" href="<?php echo base_url('artikel/del/' . $row->idpost); ?>">Delete</a>
                <a class="btn btn-primary" href="<?php echo base_url('artikel'); ?>">Cancel</a>
            </div>
        </div>
    </div>
</body>