<?php
#File       : view_penulis.php
#Deskripsi  : Melihat semua penulis yang ada
?>
<body id="crud_category">
<div class="container" style="margin-top: 8%;">
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
    <div class="card">
        <div class="card-header">Category Data</div>
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
            <br>
            <table class="table table-striped">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kota</th>
                    <th>No. Telepon</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            <?php
            $i = 1;
            foreach ($penulis as $row) {
                echo '<tr>';
                echo '<td>'.$i.'</td>';
                echo '<td>'.$row->nama.'</td>';
                echo '<td>'.$row->alamat.'</td>';
                echo '<td>'.$row->kota.'</td>';
                echo '<td>'.$row->no_telp.'</td>';
                echo '<td>'.$row->email.'</td>';
                if ($row->password == '202cb962ac59075b964b07152d234b70') {
                    $pass = 'Default';
                }else {
                    $pass = 'Tidak Default';
                }
                echo '<td>'.$pass.'</td>';
                echo '<td><a class="btn btn-danger btn-sm" href="'.base_url('admin/reset').'/'.$row->idpenulis.'">Reset</a>&nbsp;&nbsp;
		            </td>';
                echo '</tr>';
                $i++;
            }
            ?>
            </table>
            <br>
            <?php echo 'Total Results: '.count($penulis); ?>
        </div>
    </div>
</div>
</body>