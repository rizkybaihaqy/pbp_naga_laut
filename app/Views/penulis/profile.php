<br>
<br>
<br>
<div id="wrapper">
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <div class="container-fluid">
                <div class="row justify-content-center mb-3">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">My Info</p>
                                    </div>
                                    <div class="card-body">
                                        <?php if (!empty(session()->getFlashdata('success'))) { ?>
                                            <div class="alert alert-success alert-dismissible">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <?php echo session()->getFlashdata('success'); ?>
                                            </div>
                                        <?php } ?>

                                        <?php if (!empty(session()->getFlashdata('info'))) { ?>
                                            <div class="alert alert-info alert-dismissible">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <?php echo session()->getFlashdata('info'); ?>
                                            </div>
                                        <?php } ?>

                                        <?php if (!empty(session()->getFlashdata('warning'))) { ?>
                                            <div class="alert alert-warning alert-dismissible">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <?php echo session()->getFlashdata('warning'); ?>
                                            </div>
                                        <?php } ?>
                                        <form method="POST" action="<?= base_url('penulis/editprofile'); ?>">
                                            <div class="form-row">
                                                <div class="col-2">
                                                    <div class="form-group"><label for="name"><strong>Name</strong></label></div>
                                                </div>
                                                <div class="col">
                                                    <input class="form-control" type="text" name="nama" id="nama" value="<?= $penulis->nama; ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-2">
                                                    <div class="form-group"><label for="email"><strong>Email Address</strong></label></div>
                                                </div>
                                                <div class="col">
                                                    <input class="form-control" type="email" name="email" id="email" value="<?= $penulis->email; ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-2">
                                                    <div class="form-group"><label for="kota"><strong>Kota</strong></label></div>
                                                </div>
                                                <div class="col">
                                                    <input class="form-control" type="text" name="kota" id="kota" value="<?= $penulis->kota; ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-2">
                                                    <div class="form-group"><label for="Alamat"><strong>Alamat</strong></label></div>
                                                </div>
                                                <div class="col">
                                                    <input class="form-control" type="text" name="alamat" id="alamat" value="<?= $penulis->alamat; ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-2">
                                                    <div class="form-group"><label for="no_telp"><strong>No. Telp</strong></label></div>
                                                </div>
                                                <div class="col">
                                                    <input class="form-control" type="text" name="no_telp" id="no_telp" value="<?= $penulis->no_telp; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Update</button></div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Change Password</p>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="<?= base_url('penulis/editpwd'); ?>">
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label for="old_pwd"><strong>Old Password</strong></label><input class="form-control" type="password" name="old_pwd" id="old_pwd"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group"><label for="new_pwd"><strong>New Password</strong></label><input class="form-control" type="password" name="new_pwd" id="new_pwd"></div>
                                                </div>
                                            </div>
                                            <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Update&nbsp;Password</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>