<!-- 
    File view method index
 -->
<section class="header">
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 class="display-1 mt-5">Punk From The West</h1>
            <p class="lead">journey in the search of the best punk experience.</p>
            <!-- <p class="lead">by rizky baihaqy</p> -->
            <p><i class="fas fa-fist-raised"></i></p>

            <form action="" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Apa yang mau dibaca hari ini?" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit" name="submit">Cari</button>
                    </div>
                </div>
            </form>

            <?php //echo d($category); 
            ?>
            <?php for ($i = 0; $i < sizeof($category); $i++) {
            ?>
                <div class="mt-4 d-inline">
                    <a href="/web/category/<?php echo $category[$i]->idkategori; ?>" class="btn btn-secondary">
                        <?php echo $category[$i]->nama; ?></a>
                </div>
            <?php }
            ?>

        </div>
    </div>
</section>
<?php //echo d($post);
?>
<section class="content">
    <div class="container">
        <div>
            <h2 class="display-5 text-light mb-2">Recent Post</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <?php for ($i = 0; $i < sizeof($post); $i++) { ?>
                    <div class="card bg-dark text-white mb-5">
                        <img src="/imgs/user_upload/<?php echo $post[$i]->gambar; ?>" class="card-img" alt="patch">
                        <div class="card-img-overlay">
                            <h3 class="card-title"><?php echo $post[$i]->judul; ?></h3>
                            <p class="lead">By : <?php echo $post[$i]->nama; ?></p>
                            <p class="card-text"><?php echo substr($post[$i]->isi_post, 0, 1000) . '...'; ?></p>
                            <a href="/post/index/<?php echo $post[$i]->idpost; ?>" class="btn btn-outline-info">Read More</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>