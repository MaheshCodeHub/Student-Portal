<?php $this->load->view('admin/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-10">
                                <h1 class="m-0 text-dark">Line List</h1>
                            </div>
                            <!-- /.col -->
                           
                            <div class="col-sm-10">
                                <?php foreach ($subdivlist as $ld) { ?>
                                <h1 class="m-0 text-dark"><?php echo $ld->sub_name ?>/LINE-LIST-<?php echo $ld->sdiv_id ?></h1>
                                <?php }  ?>
                            </div>
                            
                            
                            <div class="col-sm-2 text-right">
                                <button type="button" class="btn btn-primary" onclick = "newLine(<?php echo ($sub_id) ?>)">ADD NEW</button>
                            </div>
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                
                <!-- /.content-header -->
            
                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
            
                                <!-- /.card -->
         
         
                 <?php
                    $error_message = $this->session->flashdata('error_message');
                    if ($error_message) {
                        echo '<div class="alert alert-danger">' . $error_message . '</div>';
                    }
                    
                    $success_message = $this->session->flashdata('success_message');
                    if ($success_message) {
                        echo '<div class="alert alert-success">' . $success_message . '</div>';
                    }
                ?>
                    
                     <div class="card">
                        <!--<div class="card-header">
                          <h3 class="card-title">DataTable with default features</h3>
                        </div>-->
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                       <tr>
                                        <th>LINE ID</th>
                                        <th>LINE NAME</th>
                                        <th>VOLTAGE</th>
                                        <th>TOTAL TOWERS</th>
                                        <th>ACTION</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                                if (count($linedet)) {
                                                 foreach ($linedet as $caller) {
                                                 $line_id = $caller->line_id;
                                                 $line_name = $caller->line_name;
                                                 $voltage_level = $caller->voltage;
                                                 $towerlistcout = $caller->towerlistcout;
                                                 
                                                  ?>
                                            <tr> 
                                                
                                                <td><?= $line_id ?></td>
                                                <td><?= $line_name ?></td>
                                                <td><?= $voltage_level ?></td>
                                                <td><?= $towerlistcout ?></td>          
                                                
                                                <td>
                                                    <button class="btn btn-success" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">MANAGE</button>
                                                    <div class="dropdown-menu" x-placement="bottom-start">
                                                        <a class="dropdown-item ul-widget__link--font" onclick = "editline(<?= $line_id ?>)" href="#" ><i class="i-Statistic"> </i> EDIT</a>
                                                        <!--<a class="dropdown-item ul-widget__link--font" href="#" onclick="delete_line(<?= $line_id  ?>)"><i class="i-Statistic"> </i> DELETE</a>-->

                                                        
                                                         <form action="<?php echo base_url(); ?>index.php/Master_ctr/show_tower_list" method="POST">
                                                         <input type="hidden"  name="txtlineid" id="txtlineid" value="<?= $line_id ?>" >
                                                          <button  type="submit" class="dropdown-item ul-widget__link--font">Tower List</button>
                                                   </form>
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
<div class="modal fade" id="modalline" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content"  id="modalline1" style="width: 900px ; margin-left: -130px"></div>
    </div>
</div>


<script type="text/javascript">

    function newLine($sub_id) {
        // alert($sub_id);
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/Master_ctr/modal_add_line_list',
            data: {sub_id: $sub_id},
            type: 'POST',
        }).done(function (data) {
            if (data === 'NA') {
                $.alert({
                    title: 'Alert!',
                    content: 'There seems a problem, please try after sometime',
                });
            } else {
                $('#modalline1').html(data);
                $('#modalline').modal('show');
            }
        });

    }
   
  
    function editline($line_id) {
                $.ajax({
            url: '<?php echo base_url(); ?>index.php/master_ctr/modal_edit_line_list',
            data: {line_id: $line_id},
            type: 'POST',
        }).done(function (data) {
            if (data === 'NA') {
                $.alert({
                    title: 'Alert!',
                    content: 'There seems a problem, please try after sometime',
                });

            } else {
                $('#modalline1').html(data);
                $('#modalline').modal('show');
            }
        });
    }
    
    function delete_line($id) {
        alert($id);
        var r = confirm("Are you sure you want delete this record");
        if (r == true) {
                $.ajax({
            url: '<?php echo base_url(); ?>master_ctr/delete_line_list1',
            data: {id: $id},
            type: 'POST',
        }).done(function (data) {
             location.reload();
        });
        }
    }
              
</script>

<?php $this->load->view('admin/footer'); ?>