<div class="modal-zheader">
    <h5 class="modal-title" >Edit Line List </h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form class="form-horizontal" action="<?php echo base_url(); ?>index.php/Master_ctr/update_line_list" method="POST"  enctype="multipart/form-data"  >
    <div class="modal-body">
        <fieldset>
            <div class="col-md-12 row">
                <?php foreach ($linedet as $pd) { ?>
                 <input type="hidden"  name="txtline_id" id="txtline_id" value="<?php echo $pd->line_id; ?>">
                 <div class="col-md-4">
                    <label>LINE NAME </label>
                </div>
                <div class="col-md-8 my-2">
                    <input type="text"  name="txt_line_Name" id="txt_line_Name" value="<?php echo $pd->line_name; ?>" class="form-control ds" placeholder="Line Name" required>
                </div>
               
                <div class="col-md-4">
                    <label>VOLTAGE LEVEL </label>
                </div>
                <div class="col-md-8 my-2">
                    <input type="text"  name="txt_voltage" id="txt_voltage" value="<?php echo $pd->voltage; ?>" class="form-control ds" placeholder="Voltage Level" required>
                </div>

              <?php } ?>  
               </div>
           </div>
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