<?php $this->load->view('admin/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0 text-dark">MULTIPLE IMAGES LIST</h1>
                </div><!-- /.col -->
                <div class="col-sm-2 text-right">
                    <button type="button" class="btn btn-primary" onclick = "newimagesadd()">ADD NEW LIST</button>
                    <button class="btn btn-danger my-3" onclick="deleteSelectedRows()">DELETE SELECTED ROWS</button>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<?php
// Check if there is an error flash data
if ($this->session->flashdata('error')) {
    echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
}

// Check if there is a success flash data
if ($this->session->flashdata('success')) {
    echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
}
?>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- /.card -->

                    <div class="card">
                      
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">#SR.</th>
                                        <th class="text-center">Image Name</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                                     $counter=0;
                                        if (count($imageslist)) {
                                            foreach ($imageslist as $caller) {
                                                $img_id  = $caller->img_id ;
                                                $img_name = $caller->img_name ;
                                                $img_link = $caller->images;
                                                $counter++
                                               ?>
                                               <td><input type="checkbox" name="deleteRow" value="<?= $img_id ?>"><div class="d-flex justify-content-center"><?= $counter ?></div></td>
                                               <td><div class="d-flex justify-content-center"><?= $img_name  ?>-<?= $counter  ?></div></td>
                                               <td>
                                                  <div class="d-flex justify-content-center">
                                                    <a href="<?= base_url("images/".$img_link) ?>" target="_blank">
                                                    <img src="<?= base_url("images/".$img_link) ?>"  alt="profile Image/" class="img-fluid" data-bs-toggle="modal" data-bs-target="#staticBackdrop1" style="width: 100px; height: 100px;">
                                                    </a>
                                                  </div>
                                               </td>
                                               <td>
                                                    <div class="d-flex justify-content-center">
                                                    <button class="btn btn-success" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">MANAGE</button>
                                                    <div class="dropdown-menu" x-placement="bottom-start">
                                                       <a class="dropdown-item ul-widget__link--font" href="#" onclick="delete_image(<?= $img_id  ?>)"><i class="i-Statistic"> </i> DELETE</a>
                                                    </div>
                                                    </div>
                                               </td>
                                            </tr>
                                    <?php } ?>
                            <?php } ?> 
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Modal -->
<div class="modal fade" id="modalproduct" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content"  id="modalproduct1" style="width: 900px ; margin-left: -130px"></div>
    </div>
</div>
<div class="modal fade" id="modalproductedit" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content"  id="modalproductedit1" style="width: 900px ; margin-left: -130px"></div>
    </div>
</div>

<script type="text/javascript">
    function deleteSelectedRows() {
        var selectedRows = document.querySelectorAll('input[name="deleteRow"]:checked');
        var selectedImgIds = [];
        selectedRows.forEach(function (checkbox) {
            selectedImgIds.push(checkbox.value);
        });
        if (selectedImgIds.length === 0) {
            alert('Please select rows to delete.');
        } else {
            var r = confirm('Are you sure you want to delete the selected rows?');
            if (r === true) {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/master_ctr/delete_selected_images_list',
                    data: { imgIds: selectedImgIds },
                    type: 'POST',
                }).done(function (data) {
                    location.reload();
                });
            }
        }
    }

    function newimagesadd() {
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/Master_ctr/modal_add_Mul_images',
            data: {},
            type: 'POST',
        }).done(function (data) {
            if (data === 'NA') {
                $.alert({
                    title: 'Alert!',
                    content: 'There seems a problem, please try after sometime',
                });
            } else {
                $('#modalproduct1').html(data);
                $('#modalproduct').modal('show');
            }
        });

    }
   
    function delete_image($img_id) {
        // alert($productid);
        var r = confirm("Are you sure you want delete this record");
        if (r == true) {
                $.ajax({
            url: '<?php echo base_url(); ?>index.php/master_ctr/delete_image_list',
            data: {img_id: $img_id},
            type: 'POST',
        }).done(function (data) {
             location.reload();
        });
        }
    }
    
    
    // Automatically hide the error message after 3 seconds
    setTimeout(function() {
        $('.alert-danger').fadeOut('slow');
    }, 3000);
    
    // Automatically hide the success message after 3 seconds
    setTimeout(function() {
        $('.alert-success').fadeOut('slow');
    }, 3000);   

</script>
<?php $this->load->view('admin/footer'); ?>