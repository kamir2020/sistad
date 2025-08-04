<!-- Modal -->
<div class="modal fade bd-example-modal-lgEdit<?php echo $value['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">
        	<div class="modal-header">
            <h5 class="modal-title" id="myLargeModalLabel">Kemaskini Rekod</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>
        
        <?php
        $sql = "SELECT * FROM tbl_ziarah WHERE id='".$value['id']."'";
        $res = getData1($sql);
        ?>
        
        <form name="" action="index.php?pt=list_ziarah" method="post">
            <input type="hidden" name="id" value="<?php echo $res['id'];?>">
            <div class="modal-body">
    		
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Nama</label>
        		<input type="text" class="form-control" id="name" name="name" value="<?php echo $res['name'];?>" required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Location</label>
        		<input type="text" class="form-control" id="locationName" name="locationName" value="<?php echo $res['locationName'];?>" required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Tarikh Mula</label>
        		<input type="date" class="form-control" id="dateStart" name="dateStart" value="<?php echo $res['dateStart'];?>" required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Tarikh Tamat</label>
        		<input type="date" class="form-control" id="dateEnd" name="dateEnd" value="<?php echo $res['dateEnd'];?>" required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Status</label>
				<select class="form-control" id="statusID" name="statusID" required>
				<?php
        		$sql2 = "SELECT * FROM tbl_status WHERE typeID='T3'";
            	$result2 = viewList1($sql2);

            	if ($result2 != '') {
            		echo "<option value=''>-- Pilih Status --</option>";
                	foreach ($result2 as $value2) {
                		?>
                		<option value="<?php echo $value2['id'];?>" <?php if ($value2['id']==$res['statusID']) { echo"selected"; }?>><?php echo $value2['statusName'];?></option>
                		<?php
                	}
            	} else {
            		echo "<option value=''>-</option>";
            	}
            	?>
				</select>
    			</div>
    			
            </div>
            
            <div class="modal-footer">
            	<button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                <button type="submit" name="submit" value="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>