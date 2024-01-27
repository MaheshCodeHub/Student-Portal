<div class="modal-zheader">
    <h5 class="modal-title" >Add New Line List</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form class="form-horizontal" action="<?php echo base_url(); ?>index.php/Master_ctr/save_line_details" method="POST"  enctype="multipart/form-data"  >
    <div class="modal-body">
        <fieldset>
            <input type="hidden"  name="list_id" id="txtproductid" value="">
            <div class="col-md-12 row">
                   <input type="hidden"  name="sub_id" id="sub_id" value="<?php echo $sub_id ?>" required >
                <div class="col-md-4">
                    <label>LINE NAME </label>
                </div>
                <div class="col-md-8 my-2">
                    <input type="text"  name="txtline_name" id="txtline_name" value="" class="form-control ds" placeholder="Line Name" required >
                </div>
               
                <div class="col-md-4">
                    <label>VOLTAGE LEVEL</label>
                </div>
                <div class="col-md-8 my-2">
                    <input type="text"  name="voltage_level" id="voltage_level" value="" class="form-control ds" placeholder="Voltage Level" required >
                </div>
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