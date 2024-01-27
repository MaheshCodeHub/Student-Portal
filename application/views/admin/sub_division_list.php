<?php $this->load->view('admin/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <?php foreach ($div_data as $ld) { ?>
                    <h1 class="m-0 text-dark"><?php echo $ld->division_name ?>/SUB-DIVISION LIST-<?php echo $ld->div_id ?></h1>
                    <?php }  ?>
                </div><!-- /.col -->
                <div class="col-sm-2 text-right">
                    <button type="button" class="btn btn-primary" onclick ="new_sub_division(<?php echo ($div_id) ?>)">Add New</button>
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
                                        <th>SUB-DIVISION</th>
                                    <th>TOTAL LINE</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                    <?php
                                        if (count($subdivlist)) {
                                            $count=1;
                                        foreach ($subdivlist as $sd) {
                                        $sub_id  = $sd->sdiv_id ;
                                        $sub_division_name = $sd->sub_name	;
                                        $linelistcount = $sd->linelistcount;
                                           
                                    ?>
                                                <td><?= $count++ ?></td>
                                                <td><?= $sub_division_name ?></td>
                                                <td><?= $linelistcount ?></td>
                                                
                                                  
                                            
                                                  <td>
                                                    <button class="btn btn-success" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage</button>
                                                    
                                                    <div class="dropdown-menu" x-placement="bottom-start">
                                                                                                      
                                                        <a class="dropdown-item ul-widget__link--font" onclick ="edit_sub_division(<?php echo $sd->sdiv_id; ?>)" href="#" ><i class="i-Statistic"> </i> Edit</a>
                                                        <!--<a class="dropdown-item ul-widget__link--font" onclick ="delete_sub_division(<?= $sub_id ?>)" href="#" ><i > </i> Delete </a>-->
    
                                                        <form action="<?php echo base_url(); ?>index.php/Master_ctr/show_line_list" method="POST">
                                                            <input type="hidden"  name="txtsub_id" id="txtsub_id" value="<?= $sub_id ?>" >
                                                            <button  type="submit" class="dropdown-item ul-widget__link--font">Line  List</button>
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
<div class="modal fade" id="modalsubdivision" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content"  id="modalsubdivision1" style="width: 900px ; margin-left: -130px"></div>
    </div>




<script type="text/javascript">

 
  
    function new_sub_division($div_id) {
         //alert($line_id)
        
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/Master_ctr/modal_add_sub_division',
            data: {div_id:$div_id},
            type: 'POST',
        }).done(function (data) {
            if (data === 'NA') {
                $.alert({
                    title: 'Alert!',
                    content: 'There seems a problem, please try after sometime',
                });
            } else {
                $('#modalsubdivision1').html(data);
                $('#modalsubdivision').modal('show');
            }
        });
      }
       
       
   function edit_sub_division($sdiv_id) {
        // alert($id);  
        
        $.ajax({                             
            url: '<?php echo base_url(); ?>index.php/master_ctr/modal_edit_sub_division',
            data: {sdiv_id: $sdiv_id},
            type: 'POST',
        }).done(function (data) {
            if (data === 'NA') {
                $.alert({
                    title: 'Alert!',
                    content: 'There seems a problem, please try after sometime',
                });

            } else {
                $('#modalsubdivision1').html(data);
                $('#modalsubdivision').modal('show');
            }
        });
    }

    
     function delete_sub_division($id) {
      //alert($id);
        var r = confirm("Are you sure you want delete this record");
        if (r == true) {
                $.ajax({
            url: '<?php echo base_url(); ?>master_ctr/delete_sub_division1',
            data: {id: $id},
            type: 'POST',
        }).done(function (data) {
             location.reload();
        });
        }
    }
    
 
  
  
                
</script>

<?php $this->load->view('admin/footer'); ?>
