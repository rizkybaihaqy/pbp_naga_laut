<section class="content">
    <div class="container my-5">
        <div>
            <?php //echo d($post);
            ?>
            <?php if (sizeof($post) != 0) : ?>
                <h2 class="text-light"><?php echo $post[0]->nama; ?></h2>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-12">
                <?php if (sizeof($post) == 0) : ?>
                    <div class="alert alert-danger" role="alert">
                        <p>Belum ada artikel di kategori ini.</p>
                    </div>
                <?php endif; ?>
                <?php for ($i = sizeof($post) - 1; $i >= 0; $i--) { ?>
                    <div class="card bg-dark text-white mb-5">
                        <img src="/imgs/<?php echo $post[$i]->gambar; ?>" class="card-img" alt="patch">
                        <div class="card-img-overlay">
                            <h3 class="card-title"><?php echo $post[$i]->judul; ?></h3>
                            <p class="card-text"><?php echo substr($post[$i]->isi_post, 0, 1000) . '...'; ?></p>
                            <a href="/post/index/<?php echo $post[$i]->idpost; ?>" class="btn btn-outline-info">Read More</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>