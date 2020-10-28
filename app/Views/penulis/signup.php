<body id='crud_category'>
  <nav id="navbarMain" class="navbar navbar-dark navbar-expand-md py-0 fixed-top bg-black">
    <a href="<?php echo base_url('web/view/index'); ?>" class="navbar-brand">Punk From The West <i class="fas fa-fist-raised"></i></a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navLinks" aria-label="toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>

  <div class="container mt-5" style="width: 50%;">
    <div class="card">
      <div class="card-header">Sign Up Penulis</div>
      <form action="<?php echo base_url('penulis/save'); ?>" method="POST" autocomplete="on">
        <div class="card-body">
          <div class="form-group justify-content-center">
            <label for="nama">Nama</label>
            <input type="text" class="form-control<?php if ($validation->hasError('nama')) echo 'is-invalid'; ?>" value="<?php echo old('nama'); ?>" id="nama" name="nama" maxlength="30">
            <div class="error">
              <?php if ($validation->hasError('nama')) echo $validation->getError('nama'); ?>
            </div>
          </div>

          <div class="form-group">
            <label for="alamat">alamat</label>
            <input type="text" class="form-control<?php if ($validation->hasError('alamat')) echo 'is-invalid'; ?>" value="<?php echo old('alamat'); ?>" id="alamat" name="alamat">
            <div class="error">
              <?php if ($validation->hasError('alamat')) echo $validation->getError('alamat'); ?>
            </div>
          </div>

          <div class="form-group">
            <label for="kota">kota</label>
            <input type="text" class="form-control<?php if ($validation->hasError('kota')) echo 'is-invalid'; ?>" value="<?php echo old('kota'); ?>" id="kota" name="kota">
            <div class="error">
              <?php if ($validation->hasError('kota')) echo $validation->getError('kota'); ?>
            </div>
          </div>

          <div class="form-group">
            <label for="no_telp">Nomor Telepon</label>
            <input type="text" class="form-control <?php if ($validation->hasError('no_telp')) echo 'is-invalid'; ?>" value="<?php echo old('no_telp'); ?>" id="no_telp" name="no_telp">
            <div class="error">
              <?php if ($validation->hasError('no_telp')) echo $validation->getError('no_telp'); ?>
            </div>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control<?php if ($validation->hasError('email')) echo 'is-invalid'; ?>" value="<?php echo old('email'); ?>" id="email" name="email">
            <div class="error">
              <?php if ($validation->hasError('email')) echo $validation->getError('email'); ?>
            </div>
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control <?php if ($validation->hasError('password')) echo 'is-invalid'; ?>" value="<?php echo old('password'); ?>" id="pasword" name="password">
            <div class="error">
              <?php if ($validation->hasError('password')) echo $validation->getError('password'); ?>
            </div>
          </div>
          <br>

          <!-- submit, reset -->
          <button type="submit" class="btn btn-outline-primary" name="submit" value="submit">Submit</button>
          <button type="reset" class="btn btn-outline-danger">Reset</button>

      </form>
    </div>
  </div>

  </div>
</body>