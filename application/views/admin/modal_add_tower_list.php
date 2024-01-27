<div class="modal-zheader">
    <h5 class="modal-title" >ADD TOWER LIST</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form class="form-horizontal" action="<?php echo base_url(); ?>index.php/Master_ctr/save_tower_list" method="POST"  enctype="multipart/form-data"  >
    <div class="modal-body">
        <fieldset>
          <div class="col-md-12 row">
                 <input type="hidden"  name="txtline_id" id="txtline_id" value="<?php echo $line_id ?>" required >
                <div class="col-md-4">
                    <label>LONGITUDE</label>
                </div>
                <div class="col-md-8 my-2">
                    <input type="taxt"  name="Longitude" id="petrollingName" value="" class="form-control ds" placeholder="LONGITUDE" required >
                </div>
               
                <div class="col-md-4">
                    <label>LATITUDE</label>
                </div>
                <div class="col-md-8 my-2">
                    <input type="text"  name="Latitude" id="petrollingName" value="" class="form-control ds" placeholder="LATITUDE" required>
                </div>
               
                <div class="col-md-4">
                    <label>DISTANCE BTW(Mtr)</label>
                </div>
                <div class="col-md-8 my-2">
                    <input type="text"  name="Distance_btw_Mtr" id="petrollingName" value="" class="form-control ds" placeholder="DISTANCE BTW(Mtr)" required>
                </div>
                
                <div class="col-md-4">
                    <label>TOWER TYPE1	</label>
                </div>
                <div class="col-md-8 my-2">
                    <input type="text"  name="tower_Type1" id="petrollingName" value="" class="form-control ds" placeholder="TOWER TYPE1" required>
                </div>
                
                <div class="col-md-4">
                    <label>TOWER TYPE2</label>
                </div>
                <div class="col-md-8 my-2">
                    <input type="text"  name="tower_Type2" id="petrollingName" value="" class="form-control ds" placeholder="TOWER TYPE2" required>
                </div>

              
               </div>
           </div>
        </fieldset> 

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
        <button type="submit" class="btn btn-primary">SAVE CHANGE</button>
    </div>
</form>
</div>

<script type="text/javascript">



</script>