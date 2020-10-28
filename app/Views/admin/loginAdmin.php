<body id='crud_category'>
    <nav id="navbarMain" class="navbar navbar-dark navbar-expand-md py-0 fixed-top bg-black">
        <a href="<?php echo base_url('web'); ?>" class="navbar-brand">Punk From The West <i class="fas fa-fist-raised"></i></a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navLinks" aria-label="toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <div class="card card1">
        <div class="card-header">Login Form Admin</div>
        <div class="card-body">
            <form method="POST" autocomplete="on" action="<?php echo base_url('admin/masuk'); ?>">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control<?php if ($validation->hasError('email')) echo 'is-invalid'; ?>" value="<?php echo old('email'); ?>" id="email" name="email">
                    <div class="error">
                        <?php if ($validation->hasError('email')) echo $validation->getError('email'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control<?php if ($validation->hasError('password')) echo 'is-invalid'; ?>" id="password" name="password">
                    <div class="error">
                        <?php if ($validation->hasError('password')) echo $validation->getError('password'); ?>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-outline-primary col-4" name="submit" value="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>