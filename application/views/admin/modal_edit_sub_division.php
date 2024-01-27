<div class="modal-zheader">
    <h5 class="modal-title" >EDIT SUB DIVISION</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form class="form-horizontal" action="<?php echo base_url(); ?>index.php/Master_ctr/update_sub_division_list" method="POST"  enctype="multipart/form-data" >
    <div class="modal-body">
        <fieldset>
            <?php foreach ($sub_data as $pd) { ?>
            <input type="hidden"  name="sub_div_id" id="sub_div_id" value="<?php echo $pd->sdiv_id; ?>">
            <div class="col-md-12 row">

                <div class="col-md-2">
                    <label>SUB DIVISION NAME </label>
                </div>
                <div class="col-md-4 my-2">
                    <input type="text"  name="txtsubdiv_name" id="txtsubdiv_name" value="<?php echo $pd->sub_name; ?>" class="form-control ds" required >
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