<!-- Modal -->
<div class="modal fade bd-example-modal-lg-edit<?php echo $value['userID'];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">
        	<div class="modal-header">
            <h5 class="modal-title" id="myLargeModalLabel">Kemaskini Rekod</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>
       	
       	<?php
		$sql = "SELECT tbl_user.userID,tbl_user.username,tbl_user.levelID,
		tbl_employee.fullname,tbl_employee.nrid,tbl_employee.address1,
		tbl_employee.postcode,tbl_employee.email,tbl_employee.phone,
		tbl_employee.stateID,tbl_employee.districtID,tbl_employee.positionID 
		FROM tbl_user 
			INNER JOIN tbl_employee ON tbl_user.userID=tbl_employee.userID 
				WHERE tbl_user.userID='".$value['userID']."'";
		$res = getData1($sql);
		?>
       	 
        <form name="" action="index.php?admin=list_staff" method="post">
            <input type="hidden" name="id" value="<?php echo $res['userID'];?>">
            <div class="modal-body">
    		
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Nama</label>
        		<input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $res['fullname'];?>" required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">No. Pekerja</label>
        		<input type="text" class="form-control" id="username" name="username" value="<?php echo $res['username'];?>" required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">NRID</label>
        		<input type="text" class="form-control" id="nrid" name="nrid" value="<?php echo $res['nrid'];?>" required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Alamat</label>
        		<input type="text" class="form-control" id="address1" name="address1" value="<?php echo $res['address1'];?>" required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Negeri</label>
        		<select class="form-control" id="stateID" name="stateID" required>
				<?php
        		$sql1 = "SELECT * FROM tbl_state ORDER BY id ASC";
            	$result1 = viewList1($sql1);

            	if ($result1 != '') {
            		echo "<option value=''>-- Pilih Negeri --</option>";
                	foreach ($result1 as $value1) {
                		?>
                		<option value="<?php echo $value1['stateID'];?>" <?php if ($res['stateID']==$value1['stateID']) { echo"selected"; } ?>><?php echo $value1['stateName'];?></option>
                		<?php
                	}
            	} else {
            		echo "<option value=''>-</option>";
            	}
            	?>
				</select>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Daerah</label>
        		<select class="form-control" id="districtID" name="districtID" required>
				<?php
        		$sql2 = "SELECT * FROM tbl_district ORDER BY id ASC";
            	$result2 = viewList1($sql2);

            	if ($result2 != '') {
            		echo "<option value=''>-- Pilih Daerah --</option>";
                	foreach ($result2 as $value2) {
                		?>
                		<option value="<?php echo $value2['id'];?>" <?php if ($res['districtID']==$value2['id']) { echo"selected"; } ?>><?php echo $value2['districtName'];?></option>
                		<?php
                	}
            	} else {
            		echo "<option value=''>-</option>";
            	}
            	?>
				</select>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Poskod</label>
        		<input type="text" class="form-control" id="postcode" name="postcode" value="<?php echo $res['postcode'];?>" required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Jawatan</label>
        		<select class="form-control" id="positionID" name="positionID" required>
				<?php
        		$sql3 = "SELECT * FROM tbl_position ORDER BY id ASC";
            	$result3 = viewList1($sql3);

            	if ($result3 != '') {
            		echo "<option value=''>-- Pilih Jawatan --</option>";
                	foreach ($result3 as $value3) {
                		?>
                		<option value="<?php echo $value3['id'];?>" <?php if ($res['positionID']==$value3['id']) { echo"selected"; } ?>><?php echo $value3['positionName'];?></option>
                		<?php
                	}
            	} else {
            		echo "<option value=''>-</option>";
            	}
            	?>
				</select>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Peranan</label>
        		<select class="form-control" id="levelID" name="levelID" required>
				<?php
        		$sql4 = "SELECT * FROM tbl_level WHERE id!='L1' ORDER BY id ASC";
            	$result4 = viewList1($sql4);

            	if ($result4 != '') {
            		echo "<option value=''>-- Pilih Peranan --</option>";
                	foreach ($result4 as $value4) {
                		?>
                		<option value="<?php echo $value4['id'];?>" <?php if ($res['levelID']==$value4['id']) { echo"selected"; } ?>><?php echo $value4['levelName'];?></option>
                		<?php
                	}
            	} else {
            		echo "<option value=''>-</option>";
            	}
            	?>
				</select>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Emel</label>
        		<input type="text" class="form-control" id="email" name="email" value="<?php echo $res['email'];?>" required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">No. Telefon</label>
        		<input type="text" class="form-control" id="phone" name="phone" value="<?php echo $res['phone'];?>" required>
    			</div>
            	
            </div>
            
            <div class="modal-footer">
            	<button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                <button type="submit" name="submit" value="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>