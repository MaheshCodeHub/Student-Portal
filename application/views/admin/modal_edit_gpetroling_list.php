<div class="modal-zheader">
    <h5 class="modal-title" >EDIT Ground Petrolling</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form class="form-horizontal" action="<?php echo base_url(); ?>index.php/Master_ctr/update_Ground_Petrolling" method="POST"  enctype="multipart/form-data" >
    <div class="modal-body">
        <fieldset>
            <?php foreach ($gp_det as $pd) { ?>
             <input type="hidden"  name="txtt_id" id="txtt_id" value="<?php echo $pd->tower_id; ?>">
             <input type="hidden"  name="txtg_id" id="txtg_id" value="<?php echo $pd->g_id; ?>">
            <div class="col-md-12 row">
                
                <div class="col-md-2">
                    <label>DATE</label>
                </div>
                <div class="col-md-4 my-2">
                    <input type="date"  name="date" id="line_id" value="<?php echo $pd->date; ?>" class="form-control ds" required>
                </div>
               
                <div class="col-md-2">
                    <label>NAME WORKER </label>
                </div>
                <div class="col-md-4 my-2">
                    <input type="text"  name="worker" id="txtline_name" value="<?php echo $pd->worker; ?>" class="form-control ds" required >
                </div>
                
                <div class="col-md-2">
                    <label>NOTE </label>
                </div>
                <div class="col-md-4 my-2">
                    <input type="text"  name="txt_note" id="txtline_name" value="<?php echo $pd->notes; ?>" class="form-control ds" required >
                </div>
                
                <div class="col-md-2">
                    <label>IMAGE</label>
                </div>
                <div class="col-md-4 my-2">
                    <input type="file"  name="profileToUpload" id="voltage_level" value="" class="form-control ds" required >
                </div>
                <?php } ?>

               </div>
           </div>
        </fieldset> 

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
        <button type="submit" class="btn btn-primary">SAVE CHANGES</button>
    </div>
</form>
</div>

<script type="text/javascript">



</script>