<div style="margin-top: 8%;" id="wrapper">
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
                                    <?php if(!empty(session()->getFlashdata('success'))){ ?>
                                        <div class="alert alert-success alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <?php echo session()->getFlashdata('success');?>
                                        </div> 
                                    <?php } ?>

                                    <?php if(!empty(session()->getFlashdata('info'))){ ?>
                                        <div class="alert alert-info alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <?php echo session()->getFlashdata('info');?>
                                        </div>
                                    <?php } ?>

                                    <?php if(!empty(session()->getFlashdata('warning'))){ ?>
                                        <div class="alert alert-warning alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <?php echo session()->getFlashdata('warning');?>
                                        </div>
                                    <?php } ?>
                                        <form>
                                            <div class="form-row">
                                                <div class="col-2">
                                                    <div class="form-group"><label for="name"><strong>Name</strong></label></div>
                                                </div>
                                                <div class="col">
                                                    <?=': '. $admin->nama; ?>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-2">
                                                    <div class="form-group"><label for="email"><strong>Email Address</strong></label></div>
                                                </div>
                                                <div class="col">
                                                    <?=': '. $admin->email; ?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Change Password</p>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="<?= base_url('admin/editpwd').'/'.$admin->idadmin; ?>">
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