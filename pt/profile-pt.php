<div class="row layout-spacing">
	<div class="col-lg-12">
		<div class="statbox widget box box-shadow">
    
        <div class="widget-header">
        	<?php
			
			if (isset($_POST['submit'])) {
        		
        		// update tbl_employee
        		$sql1 = "UPDATE tbl_employee SET fullname='".$_POST['fullname']."',address1='".$_POST['address1']."',
        		stateID='".$_POST['stateID']."',districtID='".$_POST['districtID']."',postcode='".$_POST['postcode']."',
        		email='".$_POST['email']."',phone='".$_POST['phone']."' WHERE userID='".$_POST['id']."'";
        		$res1 = updateData($sql1);
        		
        		if ($res1=='true') {
        			?>
        			<div class="widget-content widget-content-area">
        			<div class="alert alert-success mb-4" role="alert">
    					Data telah berjaya di simpan
					</div> 
					</div>
        			<?php
        		}
        		
        		else {
        			?>
        			<div class="widget-content widget-content-area">
        			<div class="alert alert-danger mb-4" role="alert">
    					Data tidak berjaya di simpan
					</div>
					</div>
        			<?php
        		}
        		
        	}
        
			
			$sql = "SELECT tbl_employee.fullname,tbl_employee.nrid,tbl_employee.address1,tbl_employee.districtID,tbl_employee.stateID,tbl_employee.postcode,
			tbl_employee.email,tbl_employee.phone,tbl_employee.positionID,
			tbl_user.username,tbl_user.levelID,tbl_user.userID 
			FROM tbl_user 
				INNER JOIN tbl_employee ON tbl_user.userID=tbl_employee.userID 
					WHERE tbl_user.userID='".$_SESSION['userID']."'";
			$res = getData1($sql);

			// get district 
			$sql1 = "SELECT tbl_district.districtName FROM tbl_district WHERE id='".$res['districtID']."'";
			$res1 = getData1($sql1);

			// get state 
			$sql2 = "SELECT tbl_state.stateName FROM tbl_state WHERE stateID='".$res['stateID']."'";
			$res2 = getData1($sql2);

			// get role
			$sql3 = "SELECT tbl_level.levelName FROM tbl_level WHERE id='".$res['levelID']."'";
			$res3 = getData1($sql3);

			// get position
			$sql4 = "SELECT tbl_position.positionName FROM tbl_position WHERE id='".$res['positionID']."'";
			$res4 = getData1($sql4);
			?>
        	
        	<div class="row">
        		<div class="col-xl-12 col-md-12 col-sm-12 col-12">
        		<h4>PROFIL</h4>
        		</div>
        		<div class="col-xl-12 col-md-12 col-sm-12 col-12">
        		
        		<div class="col-xl-12 col-md-12 col-sm-12 col-12" align="right">
        		<a href="#" class="mt-2 edit-profile" data-toggle="modal" data-target=".bd-example-modal-lg<?php echo $res['userID'];?>"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
        		<div class="col-xl-12 col-md-12 col-sm-12 col-12">
        		
        		<table width="90%" align="center" cellspacing="10px" cellpadding="10px">
        		<tr>
        		<td width="25%"><b>NO. PEKERJA<b></td>
        		<td width="75%"><?php echo $res['username'];?></td>
        		</tr>
        		
        		<tr>
        		<td width="25%"><b>NAMA<b></td>
        		<td width="75%"><?php echo $res['fullname'];?></td>
        		</tr>
        		
        		<tr>
        		<td width="25%"><b>NRID<b></td>
        		<td width="75%"><?php echo $res['nrid'];?></td>
        		</tr>
        		
        		<tr>
        		<td width="25%"><b>JAWATAN</b></td>
        		<td width="75%"><?php echo $res4['positionName'];?></td>
        		</tr>
        		
        		<tr>
        		<td width="25%"><b>PERANAN</b></td>
        		<td width="75%"><?php echo $res3['levelName'];?></td>
        		</tr>
        		
        		<tr>
        		<td width="25%"><b>ALAMAT</b></td>
        		<td width="75%"><?php echo $res['address1']."&nbsp;&nbsp;".$res['postcode']."&nbsp;&nbsp;".$res1['districtName']."&nbsp;&nbsp;".$res2['stateName'];?></td>
        		</tr>
        		
        		<tr>
        		<td width="25%"><b>EMEL</b></td>
        		<td width="75%"><?php echo $res['email'];?></td>
        		</tr>
        		
        		<tr>
        		<td width="25%"><b>NO. TELEFON</b></td>
        		<td width="75%"><?php echo $res['phone'];?></td>
        		</tr>
        	
        		</table><br><br>
        			
        			
        		</div>
        	</div>   
        </div>     
		
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg<?php echo $res['userID'];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">
        	<div class="modal-header">
            <h5 class="modal-title" id="myLargeModalLabel">Kemaskini Rekod</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>
        
        <?php
        $sql5 = "SELECT tbl_employee.fullname,tbl_employee.address1,tbl_employee.nrid,
        tbl_employee.stateID,tbl_employee.districtID,tbl_employee.postcode,
        tbl_employee.email,tbl_employee.phone,
        tbl_user.username,tbl_user.userID 
        FROM tbl_employee
        	INNER JOIN tbl_user ON tbl_employee.userID=tbl_user.userID  
        		WHERE tbl_employee.userID='".$res['userID']."'";
        $res5 = getData1($sql5);
        ?>
        
        <form name="" action="index.php?pt=profile" method="post">
            <input type="hidden" name="id" value="<?php echo $res5['userID'];?>">
            <div class="modal-body">
    		
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Nama</label>
        		<input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $res5['fullname'];?>" required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">No. Pekerja</label>
        		<input type="text" class="form-control" id="username" name="username" value="<?php echo $res5['username'];?>" readonly required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">NRID</label>
        		<input type="text" class="form-control" id="nrid" name="nrid" value="<?php echo $res5['nrid'];?>" readonly required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Alamat</label>
        		<input type="text" class="form-control" id="address1" name="address1" value="<?php echo $res5['address1'];?>" required>
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
                		<option value="<?php echo $value1['stateID'];?>" <?php if ($value1['stateID']==$res5['stateID']) { echo"selected"; }?>><?php echo $value1['stateName'];?></option>
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
                		<option value="<?php echo $value2['id'];?>" <?php if ($value2['id']==$res5['districtID']) { echo"selected"; }?>><?php echo $value2['districtName'];?></option>
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
        		<input type="text" class="form-control" id="postcode" name="postcode" value="<?php echo $res5['postcode'];?>" required>
    			</div>
    			
    			<!--
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Jawatan</label>
        		<select class="form-control" id="positionID" name="positionID" readonly required>
				<?php
        		$sql3 = "SELECT * FROM tbl_position ORDER BY id ASC";
            	$result3 = viewList1($sql3);

            	if ($result3 != '') {
            		echo "<option value=''>-- Pilih Jawatan --</option>";
                	foreach ($result3 as $value3) {
                		?>
                		<option value="<?php echo $value3['id'];?>"><?php echo $value3['positionName'];?></option>
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
        		<select class="form-control" id="levelID" name="levelID" readonly required>
				<?php
        		$sql4 = "SELECT * FROM tbl_level WHERE id!='L1' ORDER BY id ASC";
            	$result4 = viewList1($sql4);

            	if ($result4 != '') {
            		echo "<option value=''>-- Pilih Peranan --</option>";
                	foreach ($result4 as $value4) {
                		?>
                		<option value="<?php echo $value4['id'];?>"><?php echo $value4['levelName'];?></option>
                		<?php
                	}
            	} else {
            		echo "<option value=''>-</option>";
            	}
            	?>
				</select>
    			</div>-->
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Emel</label>
        		<input type="text" class="form-control" id="email" name="email" value="<?php echo $res5['email'];?>" required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">No. Telefon</label>
        		<input type="text" class="form-control" id="phone" name="phone" value="<?php echo $res5['phone'];?>" required>
    			</div>
            	
            </div>
            
            <div class="modal-footer">
            	<button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                <button type="submit" name="submit" value="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

