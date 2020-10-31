<?php
#File       : view_category.php
#Deskripsi  : Melihat semua kategori yang ada
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
                    <a class="nav-link active" href="<?php echo base_url('category'); ?>">Kategori</a>
                </div>
            </div>
        </nav>
        <div class="card">
            <div class="card-header">Category Data</div>
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
                <br>
                <a class="btn btn-primary" href="<?php echo base_url('category/add'); ?>">+ Add Category Data</a><br><br>
                <table class="table table-striped">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $i = 1;
                    foreach ($category as $row) {
                        echo '<tr>';
                        echo '<td>' . $i . '</td>';
                        echo '<td>' . $row->nama . '</td>';
                        echo '<td><a class="btn btn-warning btn-sm" href="' . base_url('category/edit') . '/' . $row->idkategori . '">Edit</a>&nbsp;&nbsp; 
		            <a class="btn btn-danger btn-sm" href="' . base_url('category/delete') . '/' . $row->idkategori . '">Delete</a>
		            </td>';
                        echo '</tr>';
                        $i++;
                    }
                    ?>
                </table>
                <br>
                <?php echo 'Total Results: ' . count($category); ?>
            </div>
        </div>
    </div>
</body>