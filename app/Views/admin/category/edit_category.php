<?php
#File       : edit_category.php
#Deskripsi  : Menyunting data kategori 
?>
<body id="crud_category">
<div class="container" style="margin-top: 8%;">
    <div class="card">
        <div class="card-header">Edit Category</div>
        <div class="card-body">
            <form action="<?php echo base_url('category/save').'/'.$row->idkategori; ?>" method="post" autocomplete="on">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" class="form-control <?php if ($validation->hasError('nama')) echo 'is-invalid'; ?>" value="<?php echo (!is_null(old('nama'))) ? old('nama') : $row->nama;?>">
                    <div class="error">
                        <?php if ($validation->hasError('nama')) echo $validation->getError('nama'); ?>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>&nbsp;
                <a href="<?php echo base_url('category'); ?>" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
</body>