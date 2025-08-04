<div class="row layout-spacing">
	<div class="col-lg-12">
		<div class="statbox widget box box-shadow">
        
		<div class="widget-header">
        
        <?php
        if (isset($_POST['submit'])) {
        	
        	if ($_POST['id']!='') { // edit record
        		
        		$sql = "UPDATE tbl_user SET username='".$_POST['username']."',levelID='".$_POST['levelID']."' 
        		WHERE userID='".$_POST['id']."'";
        		$res = updateData($sql);	
        		
        		if ($res=='true') {
        		
        			$sql1 = "UPDATE tbl_employee SET fullname='".$_POST['fullname']."',nrid='".$_POST['nrid']."',
        			address1='".$_POST['address1']."',stateID='".$_POST['stateID']."',districtID='".$_POST['districtID']."',
        			postcode='".$_POST['postcode']."',positionID='".$_POST['positionID']."',email='".$_POST['email']."',
        			phone='".$_POST['phone']."' WHERE userID='".$_POST['id']."'";
        			$res1 = updateData($sql1);
        		
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
        	
        	else { // add new record
        		
        		// get current
        		$sql = "SELECT * FROM tbl_user ORDER BY id DESC";
        		$res = getData1($sql);
        		$id = $res['id'] + 1;
        		
        		$userID = getRef(5).$id;
        		
        		
        		$sql1 = "INSERT INTO tbl_user VALUES (null,'".$userID."','".$_POST['username']."','".encrypt($_POST['nrid'])."','".$_POST['levelID']."','S1')";
        		$res1 = insertData($sql1);
        		
        		if ($res1=='true') {
        			
        			$sql2 = "INSERT INTO tbl_employee VALUES (null,'".$userID."','".$_POST['fullname']."','".$_POST['nrid']."','".$_POST['address1']."',
        			'".$_POST['stateID']."','".$_POST['districtID']."','".$_POST['postcode']."','".$_POST['positionID']."','".$_POST['email']."','".$_POST['phone']."')";
        			$res2 = insertData($sql2);
        		
        			if ($res2=='true') {
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
        }
        
        else if (isset($_GET['delete-id'])) {  // delete record
        	
        	$sql = "DELETE tbl_user.*,tbl_employee.*
		 	FROM tbl_user
		 		LEFT JOIN tbl_employee ON tbl_user.userID=tbl_employee.userID
		 			WHERE tbl_user.userID='".$_GET['delete-id']."'";
        	$res= DeleteRecord($sql);
        	
        	if ($res=='true') {
        		?>
        		<div class="widget-content widget-content-area">
        		<div class="alert alert-success mb-4" role="alert">
    				Data telah berjaya di hapuskan
				</div> 
				</div>
        		<?php
        	}
        		
        	else {
        		?>
        		<div class="widget-content widget-content-area">
        		<div class="alert alert-danger mb-4" role="alert">
    				Data tidak berjaya di hapuskan
				</div>
				</div>
        		<?php
        	}
        	
        }
        ?>
        
		<div class="row">
        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
        <h4>SENARAI KAKITANGAN</h4>
        </div>
        </div>
			
		<div class="row">
        <div class="col-xl-12 col-md-12 col-sm-12 col-12" align="right">
        <div class="col-sm-6">
			<button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Rekod</button>
		</div>
        </div>
        </div>

        </div>
        
		<div class="widget-content widget-content-area">
        <div class="table-responsive mb-4 style-1">

        <div class="table-responsive mb-4 mt-4">

        <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
        <thead>
        <tr>
        <th width="5%">No.</th>
        <th width="25%">Nama</th>
        <th width="15%">Emel</th>
        <th width="15%">No. Telefon</th>
        <th width="15%">Jawatan</th>
        <th width="15%">Peranan</th>
        <th width="20%">Tindakan</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $stmt = "SELECT tbl_user.userID,
        tbl_level.levelName,
        tbl_employee.fullname,tbl_employee.email,tbl_employee.phone,
        tbl_position.positionName 
        FROM tbl_user 
       		INNER JOIN tbl_level ON tbl_user.levelID=tbl_level.id  
        	INNER JOIN tbl_employee ON tbl_user.userID=tbl_employee.userID
        		LEFT JOIN tbl_position ON tbl_employee.positionID=tbl_position.id 
        			WHERE tbl_user.levelID!='L1'";
        $result = SelectView($stmt);

        if ($result!='') {
            $i=1;
            foreach ($result as $value) {
                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $value['fullname'];?></td>
                    <td><?php echo $value['email'];?></td>
                    <td><?php echo $value['phone'];?></td>
                    <td><?php echo $value['positionName'];?></td>
                    <td><?php echo $value['levelName'];?></td>
                    <td align="center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-dark btn-sm">Buka</button>
                            <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target=".bd-example-modal-lg-edit<?php echo $value['userID'];?>">Kemaskini</a>
                                <a class="dropdown-item" href="index.php?admin=list_staff&delete-id=<?php echo $value['userID'];?>" onclick="return confirm('Hapus rekod ini?');">Hapus</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php
                
                include "edit_staff.php";
                
            $i++;
            }
        }
        ?>

        </tbody>
        </table>

        </div>
        </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">
        	<div class="modal-header">
            <h5 class="modal-title" id="myLargeModalLabel">Tambah Rekod</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>
        
        <form name="" action="index.php?admin=list_staff" method="post">
            <input type="hidden" name="id" value="">
            <div class="modal-body">
    		
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Nama</label>
        		<input type="text" class="form-control" id="fullname" name="fullname" required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">No. Pekerja</label>
        		<input type="text" class="form-control" id="username" name="username" required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">NRID</label>
        		<input type="text" class="form-control" id="nrid" name="nrid" required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Alamat</label>
        		<input type="text" class="form-control" id="address1" name="address1" required>
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
                		<option value="<?php echo $value1['stateID'];?>"><?php echo $value1['stateName'];?></option>
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
                		<option value="<?php echo $value2['id'];?>"><?php echo $value2['districtName'];?></option>
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
        		<input type="text" class="form-control" id="postcode" name="postcode" required>
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
        		<select class="form-control" id="levelID" name="levelID" required>
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
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Emel</label>
        		<input type="text" class="form-control" id="email" name="email" required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">No. Telefon</label>
        		<input type="text" class="form-control" id="phone" name="phone" required>
    			</div>
            	
            </div>
            
            <div class="modal-footer">
            	<button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                <button type="submit" name="submit" value="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
             