<div class="modal-zheader">
    <h5 class="modal-title" >ADD GROUND PETROLLING</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form class="form-horizontal" action="<?php echo base_url(); ?>index.php/Master_ctr/save_Ground_Petrolling" method="POST"  enctype="multipart/form-data" >
    <div class="modal-body">
        <fieldset>
            <input type="hidden"  name="txt_tid" id="txt_tid" value="<?php echo ($tower_id) ?>">
            <div class="col-md-12 row">
                <div class="col-md-2">
                    <label>DATE</label>
                </div>
                <div class="col-md-4 my-2">
                    <input type="date"  name="date" id="line_id" value="" placeholder="Date" class="form-control ds" required>
                </div>
               
                <div class="col-md-2">
                    <label>NAME WORKER </label>
                </div>
                <div class="col-md-4 my-2">
                    <input type="text"  name="worker" id="txtline_name" value="" placeholder="Name Woker" class="form-control ds" required >
                </div>
                
                <div class="col-md-2">
                    <label>NOTE</label>
                </div>
                <div class="col-md-4 my-2">
                    <input type="text"  name="txt_note" id="txtline_name" value="" placeholder="Note" class="form-control ds" required >
                </div>
                
                <div class="col-md-2">
                    <label>IMAGE</label>
                </div>
                <div class="col-md-4 my-2">
                    <input type="file"  name="profileToUpload" id="voltage_level" value="" placeholder="Image" class="form-control ds" >
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