<?php
#File       : edit_post.php
#Deskripsi  : Menyunting post yang penulis tulis
?>

<body id="crud_category">
    <div class="container" style="margin-top: 8%;">
        <div class="card">
            <div class="card-header">Edit Post</div>
            <div class="card-body">
                <form action="<?php echo base_url('artikel/update/' . $row->idpost); ?>" method="post" autocomplete="on">
                    <div class="form-group">
                        <label for="judul">Judul:</label>
                        <input type="text" class="form-control <?php if ($validation->hasError('judul')) echo 'is-invalid'; ?>" id="judul" name="judul" value="<?php echo (!is_null(old('judul'))) ? old('judul') : $row->judul; ?>">
                        <div class="error"><?php if ($validation->hasError('judul')) echo $validation->getError('judul'); ?></div>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori:</label>
                        <select name="kategori" id="kategori" class="form-control <?php if ($validation->hasError('kategori')) echo 'is-invalid'; ?>">
                            <?php $kat = (!is_null(old('kategori'))) ? old('kategori') : $row->idkategori; ?>
                            <?php
                            foreach ($kategori as $cat) {
                            ?>
                                <option value="<?php echo $cat->idkategori; ?>" <?php if ($kat == $cat->idkategori) echo 'selected="true"'; ?>><?php echo $cat->nama; ?></option>
                            <?php } ?>
                        </select>
                        <div class="error"><?php if ($validation->hasError('kategori')) echo $validation->getError('kategori'); ?></div>
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi Post:</label>
                        <textarea name="isi" id="isi" class="form-control" cols="30" rows="10"><?php echo (!is_null(old('isi_post'))) ? old('isi_post') : $row->isi_post; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Path Gambar:</label>
                        <input type="text" class="form-control <?php if ($validation->hasError('gambar')) echo 'is-invalid'; ?>" id="gambar" name="gambar" value="<?php echo (!is_null(old('gambar'))) ? old('gambar') : $row->gambar; ?>">
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>&nbsp;
                    <a href="<?php echo base_url('artikel/index') . '/' . $row->idpenulis; ?>" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>