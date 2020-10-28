<?php
#File       : add_post.php
#Deskripsi  : Menulis post oleh penulis
?>
<body id="crud_category">
    <div class="container" style="margin-top: 8%;">
        <div class="card">
            <div class="card-header">Add Post</div>
            <div class="card-body">
                <form action="<?php echo base_url('artikel/save').'/'.$penulis->idpenulis;?>" method="post" autocomplete="on">
                    <div class="form-group">
                        <label for="judul">Judul:</label>
                        <input type="text" class="form-control <?php if ($validation->hasError('judul')) echo 'is-invalid'; ?>" id="judul" name="judul" value="<?php echo old('judul');?>">
                        <div class="error"><?php if ($validation->hasError('judul')) echo $validation->getError('judul'); ?></div>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori:</label>
                        <select name="kategori" id="kategori" class="form-control <?php if ($validation->hasError('kategori')) echo 'is-invalid'; ?>">
                            <option value="">---Select a Category</option>
                        <?php
                        foreach ($kategori as $cat) {
                        ?>
                            <option value="<?php echo $cat->idkategori; ?>" <?php if (old('kategori') == $cat->idkategori) echo 'selected="true"'; ?>><?php echo $cat->nama;?></option>
                        <?php } ?>
                        </select>
                        <div class="error"><?php if ($validation->hasError('kategori')) echo $validation->getError('kategori'); ?></div>
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi Post:</label>
                        <textarea name="isi" id="isi" class="form-control" cols="30" rows="10"><?php echo old('isi_post');?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Path Gambar:</label>
                        <input type="text" class="form-control <?php if ($validation->hasError('gambar')) echo 'is-invalid'; ?>" id="gambar" name="gambar" value="<?php echo old('gambar');?>">
                    </div>
                    <div class="form-group">            
                        <label for="tgl_insert">Tanggal Insert:</label>
                        <input type="" class="form-control tgl <?php if ($validation->hasError('tgl_insert')) echo 'is-invalid';?>" id="tgl_insert" name="tgl_insert" value="<?php echo old('tgl_insert');?>" placeholder="yyyy-mm-dd">
                        <div class="error"><?php if ($validation->hasError('tgl_insert')) echo $validation->getError('tgl_insert'); ?></div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>&nbsp;
                    <a href="<?php echo base_url('artikel/index').'/'.$penulis->idpenulis; ?>" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>