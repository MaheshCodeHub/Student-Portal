<?php $this->load->view('admin/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0 text-dark">STUDENT INFORMATION LIST</h1>
                </div><!-- /.col -->
                <div class="col-sm-2 text-right">
                    <button type="button" class="btn btn-primary" onclick ="unhide_student_list()">UN-HIDE ALL</button>
                    <button type="button" class="btn btn-primary" onclick = "newstudentadd()">ADD NEW LIST</button>
                    <button class="btn btn-danger my-3" onclick="deleteSelectedRows()">DELETE SELECTED ROWS</button>

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

                    <div class="card">
                      
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#SR.</th>
                                        <th>Full Name</th>
                                        <th>DOB</th>
                                        <th>Gender</th>
                                        <th>Email Address</th>
                                        <th>Phone Number</th>
                                        <th>Address </th>
                                        <th>Program Type </th>
                                        <th>Addmision Type </th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                                        if (count($studentlist)) {
                                            foreach ($studentlist as $caller) {
                                                $stud_id  = $caller->stud_id ;
                                                $Full_Name = $caller->Full_Name ;
                                                $DOB = $caller->DOB;
                                                $Gender = $caller->Gender;
                                                $Email_address = $caller->Email_address;
                                                $Phone_Number = $caller->Phone_Number;
                                                $Address = $caller->Address;
                                                $Prog_Type = $caller->Prog_Type;
                                                $Addmision_Type = $caller->Addmision_Type ;
                                               ?>
                                                 
                                              <td><input type="checkbox" name="deleteRow" value="<?= $stud_id ?>"><?= $stud_id ?></td>
                                                <td><?= $Full_Name  ?></td>
                                                <td><?= $DOB  ?></td>
                                                <td><?= $Gender  ?></td>
                                                <td><?= $Email_address  ?></td>
                                                <td><?= $Phone_Number  ?></td>
                                                <td><?= $Address  ?></td>
                                                <td><?= $Prog_Type  ?></td>
                                                <td><?= $Addmision_Type  ?></td>
                                                <td>
                                                    <button class="btn btn-success" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">MANAGE</button>
                                                    <div class="dropdown-menu" x-placement="bottom-start">
                                                        <a class="dropdown-item ul-widget__link--font" onclick = "editStudent(<?= $stud_id  ?>)" href="#" ><i class="i-Statistic"> </i> EDIT</a>
                                                        <a class="dropdown-item ul-widget__link--font" href="#" onclick="delete_student_list(<?= $stud_id  ?>)"><i class="i-Statistic"> </i> DELETE</a>
                                                        
                                                        <a class="dropdown-item ul-widget__link--font" href="#" onclick="hide_student_list(<?= $stud_id  ?>)"<i class="i-Statistic"> </i> HIDE</a>
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
        var selectedStudIds = [];
        selectedRows.forEach(function (checkbox) {
            selectedStudIds.push(checkbox.value);
        });
        if (selectedStudIds.length === 0) {
            alert('Please select rows to delete.');
        } else {
            var r = confirm('Are you sure you want to delete the selected rows?');
            if (r === true) {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/master_ctr/delete_selected_student_list',
                    data: { studIds: selectedStudIds },
                    type: 'POST',
                }).done(function (data) {
                    location.reload();
                });
            }
        }
    }

    function newstudentadd() {
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/Master_ctr/modal_add_student_call',
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
    function editStudent($stud_id) {

        $.ajax({
            url: '<?php echo base_url(); ?>index.php/master_ctr/edit_student_list',
            data: {stud_id: $stud_id},
            type: 'POST',
        }).done(function (data) {
            if (data === 'NA') {
                $.alert({
                    title: 'Alert!',
                    content: 'There seems a problem, please try after sometime',
                });

            } else {
                $('#modalproductedit1').html(data);
                $('#modalproductedit').modal('show');
            }
        });
    }
    
    
     function delete_student_list($stud_id) {
        // alert($productid);
        var r = confirm("Are you sure you want delete this record");
        if (r == true) {
                $.ajax({
            url: '<?php echo base_url(); ?>index.php/master_ctr/delete_student_list',
            data: {stud_id: $stud_id},
            type: 'POST',
        }).done(function (data) {
             location.reload();
        });
        }
    }
    
    
    function hide_student_list($stud_id) {
        var r = confirm("Are you sure you want HIDE this record");
        if (r == true) {
           
                $.ajax({
            url: '<?php echo base_url(); ?>index.php/master_ctr/hide_student_list',
            data: {stud_id: $stud_id},
            type: 'POST',
        }).done(function (data) {
             location.reload();
        });
        }
    }
       
       
    function unhide_student_list() {
        
        var r = confirm("Are you sure you want to UNHIDE this record?");
        if (r == true) {
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/master_ctr/unhide_student_list',
            data: {},
            type: 'POST',
        }).done(function (data) {
            location.reload();
        });
    }
}

       
       

</script>
<?php $this->load->view('admin/footer'); ?>