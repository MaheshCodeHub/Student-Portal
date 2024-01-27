<?php $this->load->view('admin/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <?php foreach ($Circle_list as $ld) { ?>
                    <h1 class="m-0 text-dark"><?php echo $ld->circle_name ?>/Division List-<?php echo $ld->c_id ?></h1>
                    <?php }  ?>
                </div><!-- /.col -->
                <div class="col-sm-2 text-right">
                    <button type="button" class="btn btn-primary" onclick ="add_division(<?php echo ($circle_id) ?>)">Add New</button>
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
                          <!--<h3 class="card-title">DataTable with default features</h3>-->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                     <tr>
                                        <th>#</th>
                                        <th>Divison</th>
                                           <th>TOTAL SUB-DIV</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                             
                                <tbody>
                                    <?php
                                        if (count($Division_list)) {
                                            $count=1;
                                        foreach ($Division_list as $caller) {
                                        $div_id  = $caller->div_id  ;
                                        $dividion_name = $caller->division_name;
                                          $subdivcount = $caller->subdivcount;
                                    ?>
                                        <td><?= $count++ ?></td>
                                        <td><?= $dividion_name ?></td>
                                        <td><?= $subdivcount ?></td>
                                        <td>
                                                <button class="btn btn-success" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage</button>
                                                <div class="dropdown-menu" x-placement="bottom-start">
                                                <a class="dropdown-item ul-widget__link--font" onclick ="edit_division(<?php echo $caller->div_id; ?>)" href="#" ><i class="i-Statistic"> </i> Edit Division</a>
                                                <form action="<?php echo base_url(); ?>index.php/Master_ctr/sub_division_list" method="POST">
                                                    <input type="hidden"  name="txtdiv_id" id="txtdiv_id" value="<?= $div_id ?>" >
                                                    <button  type="submit" class="dropdown-item ul-widget__link--font">Sub Division List</button>
                                                </form>
                                               
                                                </div>
                                                
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
<div class="modal fade" id="modaldivision" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content"  id="modaldivision1" style="width: 900px ; margin-left: -130px"></div>
    </div>
</div>

<script type="text/javascript">




 function add_division($circle_id) {
        //   alert($circle_id);
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/Master_ctr/modal_add_division',
            data: {circle_id:$circle_id},
            type: 'POST',
        }).done(function (data) {
            if (data === 'NA') {
                $.alert({
                    title: 'Alert!',
                    content: 'There seems a problem, please try after sometime',
                });
            } else {
                $('#modaldivision1').html(data);
                $('#modaldivision').modal('show');
            }
        });
       }



    function edit_division($div_id) {
       
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/master_ctr/modal_edit_division',
            data: {div_id: $div_id},
            type: 'POST',
        }).done(function (data) {
            if (data === 'NA') {
                $.alert({
                    title: 'Alert!',
                    content: 'There seems a problem, please try after sometime',
                });

            } else {
                $('#modaldivision1').html(data);
                $('#modaldivision').modal('show');
            }
        });
    }

  function delete_division($id) {
      //alert($id);
        var r = confirm("Are you sure you want delete this record");
        if (r == true) {
                $.ajax({
            url: '<?php echo base_url(); ?>master_ctr/delete_division1',
            data: {id: $id},
            type: 'POST',
        }).done(function (data) {
             location.reload();
        });
        }
    }
    

</script>
<?php $this->load->view('admin/footer'); ?>