<div class="modal-header">
    <h5 class="modal-title" >ADD Multiple Images</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form class="form-horizontal" action="<?php echo base_url(); ?>index.php/Master_ctr/save_mul_images" method="POST"  enctype="multipart/form-data">
    <div class="modal-body">
        <fieldset>
             <div class="col-md-12 row">
                 <div class="col-md-3">
                    <label>Full Name</label>
                </div>
                <div class="col-md-9 my-2">
                    <input type="text"  name="txtimgname" id="txtimgname" value="" class="form-control ds" autocomplete="off"  placeholder="Full Name" required="required" data-toggle="tooltip" data-placement="top" title="manufacturer">
                </div>
                 <div class="col-md-3">
                    <label>IMAGES</label>
                </div>
                <div class="col-md-9 my-2">
                    <input type="file" name="profileToUpload[]" id="voltage_level" value="" placeholder="Image" class="form-control ds" multiple>
                     <label style="color: red;">You can upload a maximum of 5 images</label>
            
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