<?php $this->load->view('admin/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                 <div class="col-sm-10">
                    <h1 class="m-0 text-dark">Tower List</h1>
                </div>
                <div class="col-sm-10">
                    <?php foreach ($linedet as $ld) { ?>
                    <h1 class="m-0 text-dark">TOWERS LIST-<?php echo $ld->line_id ?>/<?php echo $ld->line_name ?>(<?php echo $ld->voltage ?>)</h1>
                    <?php }  ?>
                </div><!-- /.col -->
                <div class="col-sm-2 text-right">
                    <button type="button" class="btn btn-primary" onclick ="newtower(<?php echo ($line_id) ?>)">Add New</button>
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
                        <div class="card-header">
                          <!--<h3 class="card-title">DataTable with default features</h3>-->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                   
                                     <tr>
                                        <th>#</th>
                                        <th>LONGITUDE</th>
                                        <th>LATITUDE</th>
                                        <th>DISTANCE BTW(Mtr)</th>
                                        <th>TOWER TYPE1</th>
                                        <th>TOWER TYPE2</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                             
                                <tbody>
                                    <?php
                                            if (count($towerlist)) {
                                            foreach ($towerlist as $caller) {
                                            $tower_id  = $caller->t_id ;
                                            $longitude = $caller->longitude;
                                            $latitude = $caller->latitude;
                                            $distance_btw = $caller->distance;
                                            $tower_type1 = $caller->tower_one;
                                            $tower_type2 = $caller->tower_two;
                                    ?>
                                                <td><?= $tower_id ?></td>
                                                <td><?= $longitude ?></td>
                                                <td><?= $latitude ?></td>
                                                <td><?= $distance_btw ?></td>
                                                 <td><?= $tower_type1 ?></td>
                                                  <td><?= $tower_type2 ?></td>
                                                  
                                            
                                                  <td>
                                                    <button class="btn btn-success" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage 1</button>
                                                     <!--<a class="dropdown-item ul-widget__link--font" onclick = "edittower(<?= $tower_id ?>)" href="#" ><i class="i-Statistic"> </i> EDIT</a>-->

                                                    <!--<button class="btn btn-success" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage 2</button>-->
                                                    <div class="dropdown-menu" x-placement="bottom-start">
                                                        
                                                    <a class="dropdown-item ul-widget__link--font" onclick = "add_ground_ptr(<?= $tower_id ?>)" href="#"><i class="fas fa-arrow-circle-right"></i> Ground Petrolling </a>
                                                    <form action="<?php echo base_url(); ?>index.php/Master_ctr/list_ground_petrolling" method="POST">
                                                        <input type="hidden"  name="txt_tower_id" id="txt_tower_id" value="<?= $tower_id ?>" >
                                                        <button  type="submit" class="dropdown-item ul-widget__link--font">Show List </button>
                                                    </form>
                                                   
                               
                                                    <!--<a class="dropdown-item ul-widget__link--font" onclick = "add_monkey_ptr(<?= $tower_id ?>)" href="#" ><i class="fas fa-arrow-circle-right"></i> Monkey Petrolling </a>-->
                                                    <!--<form action="<?php echo base_url(); ?>Master_ctr/list_monkey_petrolling" method="POST">-->
                                                    <!--    <input type="hidden"  name="txt_tower_id" id="txt_tower_id" value="<?= $tower_id ?>" >-->
                                                    <!--    <button  type="submit" class="dropdown-item ul-widget__link--font">M-P List</button>-->
                                                    <!--</form>-->
                                                  </td>
                                                
                                            </tr>
                                            
                                           <?php } ?>
                            <?php }else{ ?> 
                            
                             <td colspan = "7">Data Not Found</td>
                            
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
<div class="modal fade" id="modaltowerline" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content"  id="modaltowerline1" style="width: 900px ; margin-left: -130px"></div>
    </div>
</div>


<script type="text/javascript">

 
  
    function newtower($line_id) {
        // alert($line_id)
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/Master_ctr/modal_add_tower_list',
            data: {line_id:$line_id},
            type: 'POST',
        }).done(function (data) {
            if (data === 'NA') {
                $.alert({
                    title: 'Alert!',
                    content: 'There seems a problem, please try after sometime',
                });
            } else {
                $('#modaltowerline1').html(data);
                $('#modaltowerline').modal('show');
            }
        });
       }
       
       
       
    // function edittower($productid) {
    //             $.ajax({
    //         url: '<?php echo base_url(); ?>master_ctr/edit_tower1',
    //         data: {productid: $productid},
    //         type: 'POST',
    //     }).done(function (data) {
    //         if (data === 'NA') {
    //             $.alert({
    //                 title: 'Alert!',
    //                 content: 'There seems a problem, please try after sometime',
    //             });

    //         } else {
    //             $('#modaltowerline1').html(data);
    //             $('#modaltowerline').modal('show');
    //         }
    //     });
    // }
    
    
    
    function groundpetrolling() {
        // alert('asdjhfalkdsjfh');die;
                $.ajax({
            url: '<?php echo base_url(); ?>master_ctr/patrollinglist',
            data: {},
            type: 'POST',
        }).done(function (data) {
          
        });
    }
    
    
    
    function deletepp($productid) {
      // alert($productid)
                $.ajax({
            url: '<?php echo base_url(); ?>master_ctr/deletep',
            data: {productid: $productid},
            type: 'POST',
        }).done(function (data) {
            if (data === 'NA') {
                $.alert({
                    title: 'Alert!',
                    content: 'There seems a problem, please try after sometime',
                });

            } else {
                $('#modaltowerline1').html(data);
                $('#modaltowerline').modal('show');
            }
        });
    }
    
    
    
    function addpatrolling() {
        $.ajax({
            url: '<?php echo base_url(); ?>Master_ctr/addproduct2',
            data: {},
            type: 'POST',
        }).done(function (data) {
            if (data === 'NA') {
                $.alert({
                    title: 'Alert!',
                    content: 'There seems a problem, please try after sometime',
                });
            } else {
                $('#modaltowerline1').html(data);
                $('#modaltowerline').modal('show');
            }
        });
    }
    
    
    

  


  
//////////////////////////   Add Ground Petrolling /////////////////////////////////


 function add_ground_ptr($tower_id) {
        
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
                $('#modaltowerline1').html(data);
                $('#modaltowerline').modal('show');
            }
        });
       }
 
 
 function view_ground_ptr($line_id) {
        //  alert($line_id);die;
        $.ajax({
            url: '<?php echo base_url(); ?>Master_ctr/list_ground_petrolling',
            data: {line_id:$line_id},
            type: 'POST',
        }).done(function (data) {
            if (data === 'NA') {
                $.alert({
                    title: 'Alert!',
                    content: 'There seems a problem, please try after sometime',
                });
            } else {
                $('#modaltowerline1').html(data);
                $('#modaltowerline').modal('show');
            }
        });
       }
       
       
       
       
    //////////////////////////   Add Monkey Petrolling   ////////////////////////
    
      function add_monkey_ptr($tower_id) {
        //  alert($line_id);die;
        $.ajax({
            url: '<?php echo base_url(); ?>Master_ctr/add_monkey_ptr1',
            data: {tower_id:$tower_id},
            type: 'POST',
        }).done(function (data) {
            if (data === 'NA') {
                $.alert({
                    title: 'Alert!',
                    content: 'There seems a problem, please try after sometime',
                });
            } else {
                $('#modaltowerline1').html(data);
                $('#modaltowerline').modal('show');
            }
        });
       }
       
       
       
       
      //////////////////////// // Add Thermo Scanning   ////////////////////////
       
       
        function add_thermo_scan($tower_id) {
        //  alert($line_id);die;
        $.ajax({
            url: '<?php echo base_url(); ?>Master_ctr/add_thermo_scan1',
            data: {tower_id:$tower_id},
            type: 'POST',
        }).done(function (data) {
            if (data === 'NA') {
                $.alert({
                    title: 'Alert!',
                    content: 'There seems a problem, please try after sometime',
                });
            } else {
                $('#modaltowerline1').html(data);
                $('#modaltowerline').modal('show');
            }
        });
       }
       
       
       
         
       ////////////////////////// Add Puncture Solution   ////////////////////////
       
       
        function add_puncture_solu($line_id) {
        //  alert($line_id);die;
        $.ajax({
            url: '<?php echo base_url(); ?>Master_ctr/add_puncture_solu1',
            data: {line_id:$line_id},
            type: 'POST',
        }).done(function (data) {
            if (data === 'NA') {
                $.alert({
                    title: 'Alert!',
                    content: 'There seems a problem, please try after sometime',
                });
            } else {
                $('#modaltowerline1').html(data);
                $('#modaltowerline').modal('show');
            }
        });
       }
      
      
      
      
    //////////////////////////   Add Tower Footing Impedance     ////////////////////////
       
       
        function add_tower_footing_impe($line_id) {
        //  alert($line_id);die;
        $.ajax({
            url: '<?php echo base_url(); ?>Master_ctr/add_tower_footing_impe1',
            data: {line_id:$line_id},
            type: 'POST',
        }).done(function (data) {
            if (data === 'NA') {
                $.alert({
                    title: 'Alert!',
                    content: 'There seems a problem, please try after sometime',
                });
            } else {
                $('#modaltowerline1').html(data);
                $('#modaltowerline').modal('show');
            }
        });
       }
       
       
       
    //////////////////////////   Add Tree Cutting    ////////////////////////
       
       
        function add_tree_cutting($line_id) {
        //  alert($line_id);die;
        $.ajax({
            url: '<?php echo base_url(); ?>Master_ctr/add_tree_cutting1',
            data: {line_id:$line_id},
            type: 'POST',
        }).done(function (data) {
            if (data === 'NA') {
                $.alert({
                    title: 'Alert!',
                    content: 'There seems a problem, please try after sometime',
                });
            } else {
                $('#modaltowerline1').html(data);
                $('#modaltowerline').modal('show');
            }
        });
       }
       
       
       
       
    //////////////////////////   Add Outage    ////////////////////////
       
       
        function add_outage($line_id) {
        //  alert($line_id);die;
        $.ajax({
            url: '<?php echo base_url(); ?>Master_ctr/add_outage1',
            data: {line_id:$line_id},
            type: 'POST',
        }).done(function (data) {
            if (data === 'NA') {
                $.alert({
                    title: 'Alert!',
                    content: 'There seems a problem, please try after sometime',
                });
            } else {
                $('#modaltowerline1').html(data);
                $('#modaltowerline').modal('show');
            }
        });
       }
       
       
       
       
       
       
    //////////////////////////   Add Legal Issues    ////////////////////////
       
       
        function add_legal_issues($line_id) {
        //  alert($line_id);die;
        $.ajax({
            url: '<?php echo base_url(); ?>Master_ctr/add_legal_issues1',
            data: {line_id:$line_id},
            type: 'POST',
        }).done(function (data) {
            if (data === 'NA') {
                $.alert({
                    title: 'Alert!',
                    content: 'There seems a problem, please try after sometime',
                });
            } else {
                $('#modaltowerline1').html(data);
                $('#modaltowerline').modal('show');
            }
        });
       }
       
  
  
  
                
</script>
<?php $this->load->view('admin/footer'); ?>