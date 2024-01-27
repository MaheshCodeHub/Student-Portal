<div class="tranform-zheader">
    <h5 class="modal-title" >EDIT CIRCLE </h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form class="form-horizontal" action="<?php echo base_url(); ?>index.php/Master_ctr/update_circle_list" method="POST"  enctype="multipart/form-data"  >
    <div class="modal-body">
        <fieldset>
            <div class="col-md-12 row">
                <?php foreach ($linedet as $pd) { ?>
                 <input type="hidden"  name="txtc_id" id="txtc_id" value="<?php echo $pd->c_id ; ?>">
               
                <div class="col-md-4">
                    <label>CIRCLE NAME </label>
                </div>
                <div class="col-md-8 my-2">
                    <input type="text"  name="txtcircle_name" id="txtcircle_name" value="<?php echo $pd->circle_name; ?>" class="form-control ds" placeholder="Line Name" required>
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