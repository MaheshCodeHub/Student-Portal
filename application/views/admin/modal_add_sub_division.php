<div class="modal-zheader">
    <h5 class="modal-title" >ADD NEW SUB-DIVISION</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form class="form-horizontal" action="<?php echo base_url(); ?>index.php/Master_ctr/save_sub_division_details" method="POST"  enctype="multipart/form-data"  >
    <div class="modal-body">
        <fieldset>
           
            <div class="col-md-12 row">
                 <input type="hidden"  name="txtdiv_id" id="txtdiv_id" value="<?php echo $div_id ?>" required >
                <div class="col-md-4">
                    <label>SUB-DIVISION NAME</label>
                </div>
                <div class="col-md-8 my-2">
                    <input type="taxt"  name="sub_division_name" id="sub_division_name" value="" class="form-control ds" placeholder="SUB-DIVISION NAME" required >
                </div>
              
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