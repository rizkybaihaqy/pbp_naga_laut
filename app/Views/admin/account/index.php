<div class="container" style="margin-top: 8%;">
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
                        <a class="navbar-brand" href="<?php echo base_url('admin'); ?>"><b>Dashboard</b></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-link" href="<?php echo base_url('admin/viewPenulis'); ?>">Penulis</a>
                                <a class="nav-link" href="<?php echo base_url('category'); ?>">Kategori</a>
                            </div>
                        </div>
                    </nav>
                    <h5 class="mb-3 ml-2" style="color: white;">Category Recap</h5>
                    <!-- PHP START -->
                    <?php //d($sumpost) ?>
                    <?php foreach ($category as $row) { ?>
                        <!-- HITUNG JUMLAH POST TIAP KATEGORI START -->
                        <?php
                        $count = 0;
                        foreach ($sumpost as $sum => $post) {
                            foreach ($post as $p => $val) {
                                if ($p == 'nama' && $val == $row->nama) {
                                    $count++;
                                }
                            }
                        }
                        ?>

                        <!-- CETAK TIAP KATEGORI -->
                        <div class="row mb-2">
                            <div class="col">
                                <div class="card shadow border-left-primary py-2">
                                    <div class="card-body">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col mr-2">
                                                <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span><?= $row->nama; ?></span></div>
                                                <div class="text-dark font-weight-bold h5 mb-0"><span><?= $count; ?> Posts</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- PHP END -->
                </div>
            </div>
        </div>
    </div>
</div>