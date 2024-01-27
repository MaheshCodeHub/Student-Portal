<div class="trasform-zheader">
    <h5 class="modal-title" >ADD NEW CIRCLE</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
    <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/Master_ctr/save_circle_details" method="POST"  enctype="multipart/form-data"  >
        <div class="modal-body">
         <fieldset>
           <div class="col-md-12 row">
                
                <div class="col-md-4">
                    <label>CIRCLE  NAME </label>
                </div>
                <div class="col-md-8 my-2">
                    <input type="text"  name="txtcircle_name" id="txtcircle_name" value="" class="form-control ds" placeholder="Circle Name" required >
                </div>
               </div>
           </div>
        </fieldset> 

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
        <button type="submit" class="btn btn-primary">SUBMIT</button>
    </div>
</form>
</div>

<script type="text/javascript">

</script>