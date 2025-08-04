<div class="row layout-spacing">
	<div class="col-lg-12">
		<div class="statbox widget box box-shadow">
        
		<div class="widget-header">
        
        <?php
        if (isset($_POST['submit'])) {
        	
        	if ($_POST['id']!='') { // edit record
        		
        		$sql = "UPDATE tbl_application SET statusID='".$_POST['statusID']."' WHERE id='".$_POST['id']."'";
        		$res = updateData($sql);	
        		
        		if ($res=='true') {
        		
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
        		/*
        		$sql = "SELECT * FROM tbl_application ORDER BY id DESC";
        		$res = getData1($sql);
        		$id = $res['id'] + 1;
        		
        		$year = date('Y');
        		
        		$applicationID = $year.getRef(8).$id;
        		*/
        		
        		if ($_POST['maritalID']=='M1') { // if bujang
        			$namePartner = '';
        			$passportID = '';
        			$wargaID = '';
        			$jobID2 = '';
        			$supportNo = 0;
        		}
        		else {
        			$namePartner = $_POST['namePartner'];
        			$passportID = $_POST['passportID'];
        			$wargaID = $_POST['wargaID'];
        			$jobID2 = $_POST['jobID2'];
        			$supportNo = $_POST['supportNo'];
        		}
        		
        		$sql1 = "INSERT INTO tbl_application 
        		VALUES (null,'','".$_POST['refCourt']."','".$_POST['refFiles']."','".$_POST['name']."','".$_POST['jobID1']."',
        		'".$_POST['dateIslam']."','".$_POST['locationIslam']."','".$_POST['nrid']."','".$_POST['raceID']."',
        		'".$_POST['religionID']."','".$_POST['address1']."','".$_POST['stateID']."','".$_POST['districtID']."',
        		'".$_POST['postcode']."','".$_POST['email']."','".$_POST['phone']."',
        		'".$_POST['maritalID']."','".$namePartner."','".$passportID."',
        		'".$wargaID."','".$jobID2."','".$supportNo."','P1')";
        		
        		$res1 = insertData($sql1);
        		
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
        <h4>SENARAI PERMOHONAN</h4>
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
        <th width="20%">No. Mahkamah</th>
        <th width="15%">No. Fail</th>
        <th width="20%">Nama</th>
        <th width="15%">NRID</th>
        <th width="15%">Status</th>
        <th width="10%">Tindakan</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $stmt = "SELECT tbl_application.id,tbl_application.refCourt,tbl_application.refFiles,
        tbl_application.name,tbl_application.nrid,tbl_application.statusID,
        tbl_status.statusName 
        FROM tbl_application
        	INNER JOIN tbl_status ON tbl_application.statusID=tbl_status.id
        		WHERE tbl_status.typeID='T2' AND tbl_application.statusID='P1'";
        $result = SelectView($stmt);

        if ($result!='') {
            $i=1;
            foreach ($result as $value) {
                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $value['refCourt'];?></td>
                    <td><?php echo $value['refFiles'];?></td>
                    <td><?php echo $value['name'];?></td>
                    <td><?php echo $value['nrid'];?></td>
                    <td>
                    	<?php
                    	if ($value['statusID']=='P1') {
                    		?>
                    		<span class="badge badge-info"><?php echo $value['statusName'];?></span>
                    		<?php
                    	}
                    	?>
                    </td>
                    <td align="center">
                        <a href="index.php?pt=list_apply_view&id=<?php echo $value['id'];?>" data-toggle="tooltip" data-placement="top" title="Papar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings text-primary"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg></a>&nbsp;
                        &nbsp;
                        <a href="index.php?pt=list_apply" data-toggle="tooltip" data-placement="top" title="Hapus"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                        <!--
                        <a href="#" data-toggle="modal" data-target=".bd-example-modal-lgEdit<?php echo $value['id'];?>" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>&nbsp;
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Hapus"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>-->
                    </td>
                </tr>
                <?php
                
                //include "edit_apply.php";
                
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
        
        <form name="" action="index.php?pt=list_apply" method="post">
            <input type="hidden" name="id" value="">
            <div class="modal-body">
    		
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">*** MAKLUMAT PEMOHON  ***<br>
        		<font color='red'>(*) Perlu diisi.</font></lable>
        		&nbsp;
    			</div>
    			
				<div class="form-group mb-4">
        		<label for="formGroupExampleInput">* No. Rujukan (Mahkamah)</label>
        		<input type="text" class="form-control" id="refCourt" name="refCourt" required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">* No. Rujukan (Fail Permohonan)</label>
        		<input type="text" class="form-control" id="refFiles" name="refFiles" required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">* Nama</label>
        		<input type="text" class="form-control" id="name" name="name" required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">* Pekerjaan</label>
        		<select class="form-control" id="jobID1" name="jobID1" required>
				<?php
        		$sql1 = "SELECT * FROM tbl_job ORDER BY id ASC";
            	$result1 = viewList1($sql1);

            	if ($result1 != '') {
            		echo "<option value=''>-- Pilih Pekerjaan --</option>";
                	foreach ($result1 as $value1) {
                		?>
                		<option value="<?php echo $value1['id'];?>"><?php echo $value1['jobName'];?></option>
                		<?php
                	}
            	} else {
            		echo "<option value=''>-</option>";
            	}
            	?>
				</select>
    			</div>
    			
				<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Tarikh Memeluk Islam</label>
        		<input type="date" class="form-control" id="dateIslam" name="dateIslam">
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Tempat Memeluk Islam</label>
        		<input type="text" class="form-control" id="locationIslam" name="locationIslam">
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">* NRID (Tanpa '-')</label>
        		<input type="text" class="form-control" id="nrid" name="nrid" required maxlength="12" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">* Bangsa</label>
        		<select class="form-control" id="raceID" name="raceID" required>
				<?php
        		$sql2 = "SELECT * FROM tbl_race ORDER BY id ASC";
            	$result2 = viewList1($sql2);

            	if ($result2 != '') {
            		echo "<option value=''>-- Pilih Bangsa --</option>";
                	foreach ($result2 as $value2) {
                		?>
                		<option value="<?php echo $value2['id'];?>"><?php echo $value2['raceName'];?></option>
                		<?php
                	}
            	} else {
            		echo "<option value=''>-</option>";
            	}
            	?>
				</select>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">* Agama</label>
        		<select class="form-control" id="religionID" name="religionID" required>
				<?php
        		$sql3 = "SELECT * FROM tbl_religion ORDER BY id ASC";
            	$result3 = viewList1($sql3);

            	if ($result3 != '') {
            		echo "<option value=''>-- Pilih Agama --</option>";
                	foreach ($result3 as $value3) {
                		?>
                		<option value="<?php echo $value3['id'];?>"><?php echo $value3['religionName'];?></option>
                		<?php
                	}
            	} else {
            		echo "<option value=''>-</option>";
            	}
            	?>
				</select>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">* Alamat</label>
        		<input type="text" class="form-control" id="address1" name="address1" required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">* Negeri</label>
        		<select class="form-control" id="stateID" name="stateID" required>
				<?php
        		$sql4 = "SELECT * FROM tbl_state ORDER BY id ASC";
            	$result4 = viewList1($sql4);

            	if ($result4 != '') {
            		echo "<option value=''>-- Pilih Negeri --</option>";
                	foreach ($result4 as $value4) {
                		?>
                		<option value="<?php echo $value4['stateID'];?>"><?php echo $value4['stateName'];?></option>
                		<?php
                	}
            	} else {
            		echo "<option value=''>-</option>";
            	}
            	?>
				</select>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">* Daerah</label>
        		<select class="form-control" id="districtID" name="districtID" required>
				<?php
        		$sql5 = "SELECT * FROM tbl_district ORDER BY id ASC";
            	$result5 = viewList1($sql5);

            	if ($result5 != '') {
            		echo "<option value=''>-- Pilih Daerah --</option>";
                	foreach ($result5 as $value5) {
                		?>
                		<option value="<?php echo $value5['id'];?>"><?php echo $value5['districtName'];?></option>
                		<?php
                	}
            	} else {
            		echo "<option value=''>-</option>";
            	}
            	?>
				</select>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">* Poskod</label>
        		<input type="text" class="form-control" id="postcode" name="postcode" required maxlength="5" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
    			</div>
    			    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Emel</label>
        		<input type="text" class="form-control" id="email" name="email">
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">* No. Telefon (Tanpa '-')</label>
        		<input type="text" class="form-control" id="phone" name="phone" required maxlength="10" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">* Status</label>
        		<select class="form-control" id="maritalID" name="maritalID" onchange="displayStatus(this.value);" required>
				<?php
        		$sql6 = "SELECT * FROM tbl_marital ORDER BY id ASC";
            	$result6 = viewList1($sql6);

            	if ($result6 != '') {
            		echo "<option value=''>-- Pilih Status --</option>";
                	foreach ($result6 as $value6) {
                		?>
                		<option value="<?php echo $value6['maritalID'];?>"><?php echo $value6['maritalName'];?></option>
                		<?php
                	}
            	} else {
            		echo "<option value=''>-</option>";
            	}
            	?>
				</select>
    			</div>
    			
    			<!-- start if ada pasangan -->
    			<div id="S1">
    			<!-- if berkahwin -->
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">*** MAKLUMAT PASANGAN  ***</label>
        		&nbsp;
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Nama Pasangan</label>
        		<input type="text" class="form-control" id="namePartner" name="namePartner">
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">NRID/Passport</label>
        		<input type="text" class="form-control" id="passportID" name="passportID">
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Warganegara</label>
        		<select class="form-control" id="wargaID" name="wargaID">
				<?php
        		$sql7 = "SELECT * FROM tbl_warga ORDER BY id ASC";
            	$result7 = viewList1($sql7);

            	if ($result7 != '') {
            		echo "<option value=''>-- Pilih Warganegara --</option>";
                	foreach ($result7 as $value7) {
                		?>
                		<option value="<?php echo $value7['wargaID'];?>"><?php echo $value7['wargaName'];?></option>
                		<?php
                	}
            	} else {
            		echo "<option value=''>-</option>";
            	}
            	?>
				</select>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Pekerjaan</label>
        		<select class="form-control" id="jobID2" name="jobID2">
				<?php
        		$sql8 = "SELECT * FROM tbl_job ORDER BY id ASC";
            	$result8 = viewList1($sql8);

            	if ($result8 != '') {
            		echo "<option value=''>-- Pilih Pekerjaan --</option>";
                	foreach ($result8 as $value8) {
                		?>
                		<option value="<?php echo $value8['id'];?>"><?php echo $value8['jobName'];?></option>
                		<?php
                	}
            	} else {
            		echo "<option value=''>-</option>";
            	}
            	?>
				</select>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Bil. Tanggungan</label>
        		<input type="text" class="form-control" id="supportNo" name="supportNo">
    			</div>
    			
    			</div><!-- end if ada pasangan -->
    			    			
            	
            </div>
            
            <div class="modal-footer">
            	<button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                <button type="submit" name="submit" value="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById("S1").style.display = "none";

function displayStatus(str) {
	
	if (str=='M1') {
		document.getElementById("S1").style.display = "none";
	}
	
	else {
		document.getElementById("S1").style.display = "block";
	}
}

</script>  