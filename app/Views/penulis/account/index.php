<?php
#File       : view_post.php
#Deskripsi  : Melihat semua post yang penulis tulis
?>
<body id="crud_category">
<div class="container" style="margin-top: 8%;">
    <div class="card">
        <div class="card-header">Post Data</div>
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
            <a class="btn btn-primary" href="<?php echo base_url('post/add').'/'.$penulis->idpenulis; ?>">+ Add Post Data</a><br><br>
            <table class="table table-striped">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tanggal Post</th>
                    <th>Tanggal Update</th>
                    <th>Action</th>
                </tr>
            <?php
                $i = 1;
                foreach ($post as $row) {
                    echo '<tr>';
                    echo '<td>'.$i.'</td>';
                    echo '<td>'.$row->judul.'</td>';
                    echo '<td>'.$row->nama.'</td>';
                    echo '<td>'.$row->tgl_insert.'</td>';
                    echo '<td>'.$row->tgl_update.'</td>';
                    echo '<td><a class="btn btn-warning btn-sm" href="'.base_url('post/edit').'/'.$row->idpost.'">Edit</a>&nbsp;&nbsp; 
		                    <a class="btn btn-danger btn-sm" href="'.base_url('post/delete').'/'.$row->idpost.'">Delete</a>
		                </td>';
                    echo '</tr>';
                    $i++;
                }
            ?>
            </table>
            <br>
            <?php echo 'Total Results: '.count($post); ?>
        </div>
    </div>
</div>
</body>