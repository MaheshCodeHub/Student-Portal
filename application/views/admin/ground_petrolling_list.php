<?php $this->load->view('admin/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <?php $firstIteration = true; ?>
                    <?php foreach ($towerdet as $tw): ?>
                     <h1 class="m-0 text-dark">Ground Patrolling for - tower <?php echo $tw->tower_id ?></h1>
                    <?php $firstIteration = false; ?>
                    <?php if ($firstIteration === false) break; ?>
                    <?php endforeach; ?>
                </div>
                <div class="col-sm-2 text-right">
                    <button type="button" class="btn btn-primary" onclick ="newgpetrolling(<?php echo ($tower_id) ?>)">Add New G-Petrolling</button>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                          <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                       <tr>
                                        <th>#</th>
                                        <th>date</th>
                                        <th>name_worker</th>
                                        <th>Notes</th>
                                        <th>image</th>
                                        <th>Action</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if (count($towerdet)) {
                                         foreach ($towerdet as $caller) {
                                         $g_id = $caller->g_id;
                                         $date= $caller->date;
                                         $name_worker = $caller->worker;
                                         $notes = $caller->notes;
                                         $image = $caller->image;
                                    ?>
                                    <tr>                                        
                                        <td><?= $g_id ?></td>
                                        <td><?= $date ?></td>
                                        <td><?= $name_worker ?></td>
                                        <td><?= $notes ?></td>
                                        <td><?= $image ?></td>          
                                        <td>
                                            <button class="btn btn-success" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage</button>
                                            <div class="dropdown-menu" x-placement="bottom-start">
                                            <a class="dropdown-item ul-widget__link--font" onclick ="editgpetrolling(<?= $g_id ?>)" href="#" ><i class="i-Statistic"> </i> Edit</a>
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
<div class="modal fade" id="modalgroundpetro" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content"  id="modalgroundpetro1" style="width: 900px ; margin-left: -130px"></div>
    </div>
</div>


<script type="text/javascript">


    function newgpetrolling($tower_id) {
       $.ajax({
            url: '<?php echo base_url(); ?>index.php/Master_ctr/modal_add_ground_list',
            data: {tower_id:$tower_id},
            type: 'POST',
        }).done(function (data) {
            if (data === 'NA') {
                $.alert({
                    title: 'Alert!',
                    content: 'There seems a problem, please try after sometime',
                });
            } else {
                $('#modalgroundpetro1').html(data);
                $('#modalgroundpetro').modal('show');
            }
        });
    }
 
    //Edit Ground List
    function editgpetrolling($g_id) {
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/master_ctr/modal_edit_gpetroling_List',
            data: {g_id: $g_id},
            type: 'POST',
        }).done(function (data) {
            if (data === 'NA') {
                $.alert({
                    title: 'Alert!',
                    content: 'There seems a problem, please try after sometime',
                });

            } else {
                $('#modalgroundpetro1').html(data);
                $('#modalgroundpetro').modal('show');
            }
        });
    }
  

    
    
  
  
  
                
</script>
<?php $this->load->view('admin/footer'); ?>