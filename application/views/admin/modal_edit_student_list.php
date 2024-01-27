<div class="modal-header">
    <h5 class="modal-title" >EDIT UAE DM PPRODUCT</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form class="form-horizontal" action="<?php echo base_url(); ?>index.php/Master_ctr/update_student_list" method="POST">
    <div class="modal-body">
        <fieldset>
              <?php foreach ($productdet as $pd) { ?>
                <input type="hidden"  name="txtstud_id" id="txtstud_id" value="<?php echo $pd->stud_id; ?>">
            <div class="col-md-12 row">
                 <div class="col-md-3">
                    <label>Full Name</label>
                </div>
                <div class="col-md-9 my-2">
                    <input type="text"  name="txtfullname" id="txtfullname" value="<?php echo $pd->Full_Name; ?>" class="form-control ds" autocomplete="off"  placeholder="Full Name" required="required" data-toggle="tooltip" data-placement="top" title="manufacturer">
                </div>
                 <div class="col-md-3">
                    <label>Date of Birth</label>
                </div>
                <div class="col-md-3 my-2">
                    <input type="date"  name="txtdateofbirth" id="txtdateofbirth" value="<?php echo $pd->DOB; ?>" class="form-control ds" autocomplete="off"  placeholder="Full Name" required="required" data-toggle="tooltip" data-placement="top" title="manufacturer">
                </div>
                <div class="col-md-2">
                <label>Gender</label>
                 </div>
                <div class="col-md-2 my-2">
                    Male: <input type="radio" name="txtgender" value="Male" autocomplete="off" required="required" <?php if ($pd->Gender === "Male") echo "checked"; ?>>
                </div>
                <div class="col-md-2 my-2">
                    Female: <input type="radio" name="txtgender" value="Female" autocomplete="off" required="required" <?php if ($pd->Gender === "Female") echo "checked"; ?>>
                </div>
                <div class="col-md-3">
                    <label>Email Address</label>
                </div>
                <div class="col-md-9 my-2">
                    <input type="text"  name="txtemail" id="txtemail" value="<?php echo $pd->Email_address ; ?>" class="form-control ds" autocomplete="off"  placeholder="Email Address" required="required" data-toggle="tooltip" data-placement="top" title="manufacturer">
                </div>
                <div class="col-md-3">
                    <label>Phone Number</label>
                </div>
                <div class="col-md-9 my-2">
                    <input type="text"  name="txtphone" id="txtphone" maxlength="10" value="<?php echo $pd->Phone_Number; ?>" class="form-control ds" autocomplete="off"  placeholder="Phone Number" required="required" data-toggle="tooltip" data-placement="top" title="manufacturer">
                </div>
                 <div class="col-md-3">
                    <label>Address (Street, City, State, ZIP/Postal Code)</label>
                </div>
                <div class="col-md-9 my-2">
                   <textarea id="txtaddress" name="txtaddress" value="<?php echo $pd->Address; ?>" rows="4" placeholder="Full Address" cols="50"><?php echo $pd->Address; ?></textarea>
                </div>
                <div class="col-md-3">
                    <label>Program or Degree Type</label>
                </div>
                <div class="col-md-9 my-2">
                    <select class="custom-select rounded-0" value="<?php echo $pd->Prog_Type; ?>"  name="txtcategory" required="required" id="exampleSelectRounded0">
                        <option><?php echo $pd->Prog_Type; ?></option>
                    <option>Bachelor's</option>
                    <option>Master's</option>  
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Admission Type</label>
                </div>
                <div class="col-md-9 my-2">
                    <select class="custom-select rounded-0"  value="<?php echo $pd->Addmision_Type; ?>" name="txtaddtype" required="required" id="exampleSelectRounded0">
                         <option><?php echo $pd->Addmision_Type ; ?></option>
                    <option>Regular</option>
                    <option>Early Decision</option>  
                    </select>
                </div>
              
            </div>
            <?php } ?> 
        </fieldset> 

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
</div>

<script type="text/javascript">



</script>