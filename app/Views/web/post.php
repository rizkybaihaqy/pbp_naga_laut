        <section class="post">
            <div class="container mt-5">
                <div class="card mb-3">
                    <?php //echo dd($post);
                    ?>
                    <img src="/imgs/user_upload/<?php echo $post->gambar; ?>" class="card-img-top" alt="patch">
                    <div class="card-img-overlay">
                        <?php //echo d($post);
                        ?>
                        <h2 class="card-title text-light display-3"><?php echo $post->judul; ?></h2>
                        <p class="text-light lead">By : <?php echo $post->nama; ?></p>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><small class="text-muted"><?php echo $post->tgl_update; ?></small></p>
                        <p class="card-text"><?php echo $post->isi_post; ?></p>
                    </div>
                </div>


                <section id="komentar">
                    <?php //echo d($komentar);
                    ?>
                    <h4 class="text-light">Komentar</h4>
                    <div class="card">
                        <div class="card-body">
                            <?php if (!empty(session()->getFlashdata('comment-success'))) { ?>
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <?php echo session()->getFlashdata('comment-success'); ?>
                                </div>
                            <?php } ?>
                            <?php if (!empty(session()->getFlashdata('comment-success-dihapus'))) { ?>
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <?php echo session()->getFlashdata('comment-success-dihapus'); ?>
                                </div>
                            <?php } ?>
                            <?php for ($i = 0; $i < sizeof($komentar); $i++) { ?>
                                <h5 class="card-title"><?php echo $komentar[$i]->nama;
                                                        ?></h5>
                                <p class="card-text"><?php echo $komentar[$i]->isi
                                                        ?></p>
                                <?php if ($session->id == $post->idpenulis) { ?>
                                    <div class="d-flex justify-content-end">
                                        <form action="<?php echo base_url('post/delKomentar/' . $komentar[$i]->idkomentar . '/' . $komentar[$i]->idpost); ?>" method="post">
                                            <button class="btn btn-outline-danger" type="submit" name="submit" value="submit">Hapus Komentar</button>
                                        </form>
                                        <!-- <a href="<?php //echo base_url('post/del') . '/' . $komentar[$i]->idkomentar; 
                                                        ?>" class="btn-outline-danger">
                                        Hapus Komentar</a> -->
                                    </div>
                                <?php } ?>
                                <hr>
                            <?php } ?>
                        </div>
                    </div>
                    <?php if ($session->username == 'penulis') { ?>
                        <div class="form-group text-light">
                            <form action="<?php echo base_url('post/saveKomentar/' . $post->idpost); ?>" method="post">
                                <label for="comment">Tulis Komment:</label>
                                <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-outline-light mt-2" type="submit" name="submit" value="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    <?php } ?>
                </section>
            </div>
        </section>
        </body>