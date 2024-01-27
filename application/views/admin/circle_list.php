<?php $this->load->view('admin/header'); ?>
<h2><?php echo $this->session->flashdata('msg'); ?></h2> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0 text-dark">CIRCLE</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-2 text-right">
                    <button type="button" class="btn btn-primary" onclick = "circle_add_data()">ADD NEW CIRCLE</button>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!--<li class="breadcrumb-item"><a href="#">Home</a></li>-->
                        <!--<li class="breadcrumb-item active">Dashboard</li>-->
                    </ol>
                </div>
                
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

 
    <!-- Main content -->
    <div class="content">
            <div class="container-fluid">
                <?php
                if (!empty($this->session->flashdata('msgemail'))) {
                echo "<div class='alert alert-info mb-3'>" . $this->session->flashdata('msgemail') . "</div>";
                }?>
    		</div>

            <div class="row">
            <!-- ./col 1 -->

               <?php
                foreach ($div_data as $caller) {  
                $circle_name = $caller->circle_name;
                $c_id = $caller->c_id;
                $cnt = $caller->divisioncount;
               ?>
                  
                    <div class="col-lg-4 col-6">
                         <!--small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h1><?= $circle_name ?></h1>
                                <H4><?php echo ($cnt) ?>&nbsp; Division</h4>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                           
                        
                             <div class="row">
                                <div class="col-sm-6">
                                    <a class="dropdown-item ul-widget__link--font" onclick="edit_circle_data(<?= $c_id ?>)" href="#">
                                        <i class="fas fa-arrow-circle-right"></i> EDIT CIRCLE
                                    </a>
                                </div>
                                <div class="col-sm-6">
                                    <form action="<?php echo base_url(); ?>index.php/Master_ctr/show_division_list_by_c_id" method="POST">
                                  <input type="hidden"  name="txt_circle_id" id="txt_circle_id" value="<?= $c_id ?>" >
                                  <button  type="submit" class="dropdown-item ul-widget__link--font ">DIVISION LIST</button>
                                </form>
                                </div>

                            </div>
                        
                        </div>
                    </div>
                  
                   <?php } ?> 

             <!--./col -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Modal -->

        <div class="modal fade" id="modalcircle" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content"  id="modalcircle1" style="width: 900px ; margin-left: -130px"></div>
            </div>
        </div>




<script type="text/javascript">


    function circle_add_data() {
      
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/Master_ctr/modal_add_circle',
            data: {},
            type: 'POST',
        }).done(function (data) {
            if (data === 'NA') {
                $.alert({
                    title: 'Alert!',
                    content: 'There seems a problem, please try after sometime',
                });
            } else {
                $('#modalcircle1').html(data);
                $('#modalcircle').modal('show');
            }
        });

    }
    
    
    function edit_circle_data($c_id) {
                $.ajax({
            url: '<?php echo base_url(); ?>index.php/master_ctr/modal_edit_circle',
            data: {c_id: $c_id},
            type: 'POST',
        }).done(function (data) {
            if (data === 'NA') {
                $.alert({
                    title: 'Alert!',
                    content: 'There seems a problem, please try after sometime',
                });

            } else {
                $('#modalcircle1').html(data);
                $('#modalcircle').modal('show');
            }
        });
    }
    
    
  
      
</script>

<?php $this->load->view('admin/footer'); ?>