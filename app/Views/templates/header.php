<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Latest Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap-4.5.2-dist/css/bootstrap.min.css'); ?>">
    <!--Local CSS build-->
    <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>">
    <!--JQuery UI css-->
    <link rel="stylesheet" href="<?php echo base_url('js/jquery-ui-1.12.1/jquery-ui.css'); ?>">
    <!--jQuery Library-->
    <script src="<?php echo base_url('js/jquery-3.5.1.min.js'); ?> "></script>
    <!--JQuery UI Library-->
    <script src="<?php echo base_url('js/jquery-ui-1.12.1/jquery-ui.js') ?>"></script>
    <!--Popper js-->
    <script src="<?php echo base_url('js/popper.min.js'); ?>"></script>
    <!--Latest Bootstrap js-->
    <script src="<?php echo base_url('css/bootstrap-4.5.2-dist/js/bootstrap.min.js') ?>"></script>
    <!--Ajax-->
    <script src="<?php echo base_url('js/ajax.js'); ?>"></script>
    <!--Local Script build-->
    <script src="<?php echo base_url('js/script.js'); ?>"></script>
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/8441bb9e17.js" crossorigin="anonymous"></script>

    <title><?= esc($title); ?></title>
</head>

<body>
    <nav id="navbarMain" class="navbar navbar-dark navbar-expand-md py-0 fixed-top">
        <a href="<?php echo base_url('web/'); ?>" class="navbar-brand">Punk From The West <i class="fas fa-fist-raised"></i></a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navLinks" aria-label="toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navLinks">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?php echo base_url('web/view/about'); ?>" class="nav-link">About</a>
                </li>
            </ul>
            <ul class="nav navbar-nav ml-auto align-items-center">
                <?php if (isset($session->username)) : ?>
                    <div class="btn-group dropleft">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle text-light" type="button" data-toggle="dropdown">
                            Profil
                        </button>
                        <div class="dropdown-menu">
                            <?php if ($session->username == 'penulis') : ?>
                                <div>
                                    <a class="dropdown-item mr-5" href="<?php echo base_url('penulis/index/' . $session->id); ?>">Dashboard Penulis</a>
                                    <a class="dropdown-item mr-5" href="<?php echo base_url('penulis/profile/' . $session->id); ?>">Profil Penulis</a>
                                </div>
                            <?php else : ?>
                                <div>
                                    <a class="dropdown-item mr-5" href="<?php echo base_url('admin/index'); ?>">Dashboard Admin</a>
                                    <a class="dropdown-item mr-5" href="<?php echo base_url('admin/profile/' . $session->id); ?>">Profil Admin</a>
                                </div>
                            <?php endif; ?>
                            <a class="dropdown-item" href="<?php echo base_url('logout/endSession'); ?>">Logout</a>
                        </div>
                    </div>
                <?php else : ?>
                    <div>
                        <li class="nav-item">
                            <a href="<?php echo base_url('penulis/login'); ?>" class="nav-link">Login</a>
                        </li>
                    </div>
                <?php endif; ?>
            </ul>
        </div>
    </nav>