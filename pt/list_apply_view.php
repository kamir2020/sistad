<div class="row layout-spacing">
	<div class="col-lg-12">
		
		<div class="info">
		<h6 class="">PERMOHONAN BARU</h6>
		
		<?php
    	if (isset($_POST['update_client_info'])) {
    		
    		$sql = "UPDATE tbl_application SET refCourt='".$_POST['refCourt']."',refFiles='".$_POST['refFiles']."',
    		name='".$_POST['name']."',jobID1='".$_POST['jobID1']."',dateIslam='".$_POST['dateIslam']."',
    		locationIslam='".$_POST['locationIslam']."',nrid='".$_POST['nrid']."',raceID='".$_POST['raceID']."',
    		religionID='".$_POST['religionID']."',address1='".$_POST['address1']."',stateID='".$_POST['stateID']."',
    		districtID='".$_POST['districtID']."',postcode='".$_POST['postcode']."',email='".$_POST['email']."',
    		phone='".$_POST['phone']."' WHERE id='".$_POST['id']."'";
    		$res = updateData($sql);
    		
    		if ($res=='true') { // success
    			?>
        		<div class="alert alert-success mb-4" role="alert">
    				Data telah berjaya di kemaskini
				</div> 
				<?php
    		}
    		
    		else { // fail
    			?>
        		<div class="alert alert-danger mb-4" role="alert">
    				Data tidak berjaya di kemaskini
				</div>
				<?php
    		}
    		
    	}
    	
    	else if (isset($_POST['update_client_partner'])) {
    		
    		if ($_POST['maritalID']=='M1') { // bujang
    		
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
    		
    		$sql = "UPDATE tbl_application SET maritalID='".$_POST['maritalID']."',namePartner='".$_POST['namePartner']."',
    		passportID='".$_POST['passportID']."',wargaID='".$_POST['wargaID']."',jobID2='".$_POST['jobID2']."',
    		supportNo='".$_POST['supportNo']."' WHERE id='".$_POST['id']."'";
    		$res = updateData($sql);
    		
    		if ($res=='true') { // success
    			?>
        		<div class="alert alert-success mb-4" role="alert">
    				Data telah berjaya di kemaskini
				</div> 
				<?php
    		}
    		
    		else { // fail
    			?>
        		<div class="alert alert-danger mb-4" role="alert">
    				Data tidak berjaya di kemaskini
				</div>
				<?php
    		}
    	}
    	?>
		
       	<div id="iconsAccordion" class="accordion-icons">
    	
    	<div class="card">
        	<div class="card-header" id="...">
            	<section class="mb-0 mt-0">
                	<div role="menu" class="collapsed" data-toggle="collapse" data-target="#iconAccordionOne" aria-expanded="true" aria-controls="iconAccordionOne">
                    	Maklumat Pemohon  <div class="icons"><svg> ... </svg></div>
                	</div>
            	</section>
        	</div>

        	<div id="iconAccordionOne" class="collapse show" aria-labelledby="..." data-parent="#iconsAccordion">
            	<div class="card-body">
                
                <?php 
        		$sql = "SELECT tbl_application.id,tbl_application.refCourt,tbl_application.refFiles,
        		tbl_application.name,tbl_application.nrid,
        		tbl_application.dateIslam,tbl_application.locationIslam,
        		tbl_application.address1,
        		tbl_application.email,tbl_application.phone,
        		tbl_race.raceName,
        		tbl_religion.religionName 
        		FROM tbl_application
        			INNER JOIN tbl_race ON tbl_application.raceID=tbl_race.id  
        			INNER JOIN tbl_religion ON tbl_application.religionID=tbl_religion.id
        				WHERE tbl_application.id='".$_GET['id']."'";
        		$res = getData1($sql);
				?>
            	
            	<table width="100%" style="font-size:90%" cellpadding="5px" border="0">
        
        		<tr>
        		<td width="25%">&nbsp;</td>
        		<td width="75%" align="right">
        			<button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target=".bd-example-modal-lg1<?php echo $_GET['id'];?>">Kemaskini</button>
        		</td>
        		</tr>
        		
        		<tr>
        		<td width="25%"><b>No. Mahkamah</b></td>
        		<td width="75%"><?php echo $res['refCourt'];?></td>
        		</tr>
        
        		<tr>
        		<td width="25%"><b>No. Fail</b></td>
        		<td width="75%"><?php echo $res['refFiles'];?></td>
        		</tr>
        
        		<tr>
        		<td width="25%"><b>Nama</b></td>
        		<td width="75%"><?php echo $res['name'];?></td>
        		</tr>
        
        		<tr>
        		<td width="25%"><b>Pekerjaan</b></td>
        		<td width="75%"><?php echo "-";?></td>
        		</tr>
        
				<tr>
        		<td width="25%"><b>Tarikh Memeluk Islam</b></td>
        		<td width="75%"><?php echo $res['dateIslam'];?></td>
        		</tr>
        
        		<tr>
        		<td width="25%"><b>Tempat Memeluk Islam</b></td>
        		<td width="75%"><?php echo $res['locationIslam'];?></td>
        		</tr>
        
        		<tr>
        		<td width="25%"><b>NRID</b></td>
        		<td width="75%"><?php echo $res['nrid'];?></td>
        		</tr>
        
        		<tr>
        		<td width="25%"><b>Bangsa</b></td>
        		<td width="75%"><?php echo $res['raceName'];?></td>
        		</tr>
        
        		<tr>
        		<td width="25%"><b>Agama</b></td>
        		<td width="75%"><?php echo $res['religionName'];?></td>
        		</tr>
        
        		<tr>
        		<td width="25%"><b>Alamat</b></td>
        		<td width="75%"><?php echo $res['address1'];?></td>
        		</tr>
        
        		<tr>
        		<td width="25%"><b>Emel</b></td>
        		<td width="75%"><?php echo $res['email'];?></td>
        		</tr>
        
        		<tr>
        		<td width="25%"><b>No. Telefon</b></td>
        		<td width="75%"><?php echo $res['phone'];?></td>
        		</tr>
        
        		</table>
            	
            	</div>
        	</div>
  		</div>

    	<div class="card">
        	<div class="card-header" id="...">
            	<section class="mb-0 mt-0">
                	<div role="menu" class="collapsed" data-toggle="collapse" data-target="#iconAccordionTwo" aria-expanded="false" aria-controls="iconAccordionTwo">
                    	Maklumat Pasangan  <div class="icons"><svg> ... </svg></div>
                	</div>
            	</section>
        	</div>
        	
        	<div id="iconAccordionTwo" class="collapse" aria-labelledby="..." data-parent="#iconsAccordion">
            	<div class="card-body">

                <?php
        		$sql1 = "SELECT tbl_application.namePartner,
        		tbl_application.passportID,tbl_application.wargaID,
        		tbl_application.jobID2,tbl_application.supportNo,
        		tbl_marital.maritalName 
        		FROM tbl_application
        			INNER JOIN tbl_marital ON tbl_application.maritalID=tbl_marital.maritalID  
        				WHERE tbl_application.id='".$res['id']."'";
        		$res1 = getData1($sql1);
        
        		// get warganegara
        		$sql2 = "SELECT tbl_warga.wargaName 
        		FROM tbl_warga 
        			WHERE tbl_warga.wargaID='".$res1['wargaID']."'";
        		$res2 = getData1($sql2);
        
        		// get job
        		$sql3 = "SELECT tbl_job.jobName 
        		FROM tbl_job 
        			WHERE tbl_job.id='".$res1['jobID2']."'";
        		$res3 = getData1($sql3);
        		?>
        
        		<table width="100%" style="font-size:90%" cellpadding="5px" border="0">
        		
        		<tr>
        		<td width="25%">&nbsp;</td>
        		<td width="75%" align="right">
        			<button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target=".bd-example-modal-lg2<?php echo $_GET['id'];?>">Kemaskini</button>
        		</td>
        		</tr>
        		
        		<tr>
        		<td width="25%"><b>Status</b></td>
        		<td width="75%"><?php echo $res1['maritalName'];?></td>
        		</tr>
        
        		<tr>
        		<td width="25%"><b>Nama Pasangan</b></td>
        		<td width="75%"><?php echo $res1['namePartner'];?></td>
        		</tr>
        
        		<tr>
        		<td width="25%"><b>Passport</b></td>
        		<td width="75%"><?php echo $res1['passportID'];?></td>
        		</tr>
        
        		<tr>
        		<td width="25%"><b>Warganegara</b></td>
        		<td width="75%"><?php echo $res2['wargaName'];?></td>
        		</tr>
        
        		<tr>
        		<td width="25%"><b>Pekerjaan</b></td>
        		<td width="75%"><?php echo $res3['jobName'];?></td>
        		</tr>
        
        		<tr>
        		<td width="25%"><b>Bil. Tanggungan</b></td>
        		<td width="75%"><?php echo $res1['supportNo'];?></td>
        		</tr>
        
        		</table>

            	</div>
        	</div>
    	</div>
    	
    	<div class="card">
        	<div class="card-header" id="...">
            	<section class="mb-0 mt-0">
                	<div role="menu" class="" data-toggle="collapse" data-target="#iconAccordionThree" aria-expanded="false" aria-controls="iconAccordionThree">
                    	Sesi Perunding Cara <div class="icons"><svg> ... </svg></div>
                	</div>
            	</section>
        	</div>
        	
        	<div id="iconAccordionThree" class="collapse" aria-labelledby="..." data-parent="#iconsAccordion">
        		<div class="card-body">
            
            	<?php
        		$sql3 = "SELECT * 
        		FROM tbl_application_session
        			WHERE tbl_application_session.id='".$res['id']."'";
        		$res3 = viewList1($sql3);
        		
        		?>
        		<div class="table-responsive">
        		<table class="table table-bordered table-hover mb-4">
        		<thead>
                <tr>
                <th width="5%">No.</th>
                <th width="10%">Tarikh.</th>
                <th width="70%">Keterangan.</th>
                <th width="15%">Status.</th>
                </tr>
                </thead>
        		<tbody>
        		<?php
        		$i=1;
        		foreach ($res3 as $row3) {
        			?>
        			<tr>
                    <td><?php echo $i;?></td>
                    <td>-</td>
                    <td>-</td>
                    </tr>
        			<?php
        		$i++;
        		} 
        		?>
        		</tbody>
                </table>
                </div>
        		
        		</div>
        	</div>
    	</div>
    	
    	<br>
    	</div>

    </div>
</div>


<div class="modal fade bd-example-modal-lg1<?php echo $_GET['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">
        	<div class="modal-header">
            	<h5 class="modal-title" id="myLargeModalLabel">Kemaskini Rekod</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                	<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            
            <?php
        	$stmt1 = "SELECT tbl_application.id,tbl_application.refCourt,tbl_application.refFiles,
        		tbl_application.name,tbl_application.jobID1,tbl_application.nrid,
        		tbl_application.raceID,tbl_application.religionID,
        		tbl_application.dateIslam,tbl_application.locationIslam,
        		tbl_application.address1,tbl_application.stateID,tbl_application.districtID,
        		tbl_application.postcode,tbl_application.email,tbl_application.phone
        		FROM tbl_application
        			WHERE tbl_application.id='".$_GET['id']."'";
        	$exe1 = getData1($stmt1);
        	?>
            
            <form name="" action="index.php?pt=list_apply_view&id=<?php echo $_GET['id'];?>" method="post">
            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
            <div class="modal-body">
            	
            	<div class="form-group mb-4">
        		<label for="formGroupExampleInput">*** MAKLUMAT PEMOHON  ***<br>
        		<font color='red'>(*) Perlu diisi.</font></lable>
        		&nbsp;
    			</div>
    			
				<div class="form-group mb-4">
        		<label for="formGroupExampleInput">* No. Rujukan (Mahkamah)</label>
        		<input type="text" class="form-control" id="refCourt" name="refCourt" value="<?php echo $exe1['refCourt'];?>" required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">* No. Rujukan (Fail Permohonan)</label>
        		<input type="text" class="form-control" id="refFiles" name="refFiles" value="<?php echo $exe1['refFiles'];?>" required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">* Nama</label>
        		<input type="text" class="form-control" id="name" name="name" value="<?php echo $exe1['name'];?>" required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">* Pekerjaan</label>
        		<select class="form-control" id="jobID1" name="jobID1" value="<?php echo $exe1['jobID1'];?>" required>
				<?php
        		$sql1 = "SELECT * FROM tbl_job ORDER BY id ASC";
            	$result1 = viewList1($sql1);

            	if ($result1 != '') {
            		echo "<option value=''>-- Pilih Pekerjaan --</option>";
                	foreach ($result1 as $value1) {
                		?>
                		<option value="<?php echo $value1['id'];?>" <?php if ($exe1['jobID1']==$value1['id']) { echo"selected"; }?>><?php echo $value1['jobName'];?></option>
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
        		<input type="date" class="form-control" id="dateIslam" name="dateIslam" value="<?php echo $exe1['dateIslam'];?>">
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Tempat Memeluk Islam</label>
        		<input type="text" class="form-control" id="locationIslam" name="locationIslam" value="<?php echo $exe1['locationIslam'];?>">
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">* NRID (Tanpa '-')</label>
        		<input type="text" class="form-control" id="nrid" name="nrid" value="<?php echo $exe1['nrid'];?>" maxlength="12" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
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
                		<option value="<?php echo $value2['id'];?>" <?php if ($exe1['raceID']==$value2['id']) { echo"selected"; } ?>><?php echo $value2['raceName'];?></option>
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
                		<option value="<?php echo $value3['id'];?>" <?php if ($exe1['religionID']==$value3['id']) { echo"selected"; } ?>><?php echo $value3['religionName'];?></option>
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
        		<input type="text" class="form-control" id="address1" name="address1" value="<?php echo $exe1['address1'];?>" required>
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
                		<option value="<?php echo $value4['stateID'];?>" <?php if ($exe1['stateID']==$value4['stateID']) { echo"selected"; } ?>><?php echo $value4['stateName'];?></option>
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
                		<option value="<?php echo $value5['id'];?>" <?php if ($exe1['districtID']==$value5['id']) { echo"selected"; } ?>><?php echo $value5['districtName'];?></option>
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
        		<input type="text" class="form-control" id="postcode" name="postcode" value="<?php echo $exe1['postcode'];?>" required maxlength="5" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
    			</div>
    			    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Emel</label>
        		<input type="text" class="form-control" id="email" name="email" value="<?php echo $exe1['email'];?>">
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">* No. Telefon (Tanpa '-')</label>
        		<input type="text" class="form-control" id="phone" name="phone" value="<?php echo $exe1['phone'];?>" required maxlength="10" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
    			</div>
            </div>
            <div class="modal-footer">
            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
            <button type="submit" name="update_client_info" value="submit" class="btn btn-primary">Simpan</button>
        	</div>
        	</form>
        	
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg2<?php echo $_GET['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">
        	<div class="modal-header">
            	<h5 class="modal-title" id="myLargeModalLabel">Kemaskini Rekod (Pasangan)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                	<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            
            <?php
        	$stmt2 = "SELECT tbl_application.id,tbl_application.maritalID,
        		tbl_application.namePartner,tbl_application.passportID,
        		tbl_application.wargaID,tbl_application.jobID2,
        		tbl_application.supportNo
        		FROM tbl_application
        			WHERE tbl_application.id='".$_GET['id']."'";
        	$exe2 = getData1($stmt2);
        	?>
            
            <form name="" action="index.php?pt=list_apply_view&id=<?php echo $_GET['id'];?>" method="post">
            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
            <div class="modal-body">
            	
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
                		<option value="<?php echo $value6['maritalID'];?>" <?php if ($exe2['maritalID']==$value6['maritalID']) { echo"selected"; } ?>><?php echo $value6['maritalName'];?></option>
                		<?php
                	}
            	} else {
            		echo "<option value=''>-</option>";
            	}
            	?>
				</select>
    			</div>
    			
    			<div id="S1"> <!-- start pasangan info -->
    			
            	<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Nama Pasangan</label>
        		<input type="text" class="form-control" id="namePartner" name="namePartner" value="<?php echo $exe2['namePartner'];?>">
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">NRID/Passport</label>
        		<input type="text" class="form-control" id="passportID" name="passportID" value="<?php echo $exe2['passportID'];?>">
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
                		<option value="<?php echo $value7['wargaID'];?>" <?php if ($exe2['wargaID']==$value7['wargaID']) { echo"selected"; } ?>><?php echo $value7['wargaName'];?></option>
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
                		<option value="<?php echo $value8['id'];?>" <?php if ($exe2['jobID2']==$value8['id']) { echo"selected"; } ?>><?php echo $value8['jobName'];?></option>
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
        		<input type="text" class="form-control" id="supportNo" name="supportNo" value="<?php echo $exe2['supportNo'];?>">
    			</div>
    			
    			</div> <!-- end of hide pasangan info -->
            	
            </div>
            <div class="modal-footer">
            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
            <button type="submit" name="update_client_partner" value="submit" class="btn btn-primary">Simpan</button>
        	</div>
        	
        	</form>
        </div>
    </div>
</div>

<script>
if (document.getElementById("maritalID").value == 'M1') {
	document.getElementById("S1").style.display = "none";
}
else {
	document.getElementById("S1").style.display = "block";
}


function displayStatus(str) {

	if (str=='M1') {
		document.getElementById("S1").style.display = "none";
	}
	
	else {
		document.getElementById("S1").style.display = "block";
	}
	
}
</script>
