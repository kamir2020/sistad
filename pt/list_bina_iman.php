<div class="row layout-spacing">
	<div class="col-lg-12">
		<div class="statbox widget box box-shadow">
        
		<div class="widget-header">
        
        <?php
        if (isset($_POST['submit'])) {
        	
        	if ($_POST['id']!='') { // edit record
        		
        		$sql = "UPDATE tbl_iman SET name='".$_POST['name']."',locationName='".$_POST['locationName']."',
        		dateStart='".$_POST['dateStart']."',dateEnd='".$_POST['dateEnd']."',
        		statusID='".$_POST['statusID']."' WHERE id='".$_POST['id']."'";
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
        		
        	
        		$sql1 = "INSERT INTO tbl_iman 
        		VALUES (null,'".$_POST['name']."','".$_POST['dateStart']."','".$_POST['dateEnd']."','".$_POST['locationName']."','M1')";
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
        	
        	/*
        	$sql = "DELETE tbl_user.*,tbl_employee.*
		 	FROM tbl_user
		 		LEFT JOIN tbl_employee ON tbl_user.userID=tbl_employee.userID
		 			WHERE tbl_user.userID='".$_GET['delete-id']."'";*/
        	$sql = "DELETE FROM tbl_iman WHERE id='".$_GET['delete-id']."'";
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
        <h4>SENARAI BINA IMAN</h4>
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
        <th width="20%">Nama</th>
        <th width="15%">Lokasi</th>
        <th width="15%">Mula</th>
        <th width="15%">Tamat</th>
        <th width="15%">Status</th>
        <th width="20%">Tindakan</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $stmt = "SELECT tbl_iman.id,tbl_iman.name,tbl_iman.locationName,
        tbl_iman.dateStart,tbl_iman.dateEnd,tbl_iman.statusID,
        tbl_status.statusName
        	FROM tbl_iman 
        		INNER JOIN tbl_status ON tbl_iman.statusID=tbl_status.id";
        $result = SelectView($stmt);

        if ($result!='') {
            $i=1;
            foreach ($result as $value) {
                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $value['name'];?></td>
                    <td><?php echo $value['locationName'];?></td>
                    <td><?php echo $value['dateStart'];?></td>
                    <td><?php echo $value['dateEnd'];?></td>
                    <td>
                    	<?php 
                    	if ($value['statusID']=='M1') {
                    		?>
                    		<span class="badge badge-info"><?php echo $value['statusName'];?></span>
                    		<?php
                    	}
                    	
                    	else if ($value['statusID']=='M2') {
                    		?>
                    		<span class="badge badge-success"><?php echo $value['statusName'];?></span>
                    		<?php
                    	}
                    	?>
                    </td>
                    <td align="center">
                        <a href="#" data-toggle="modal" data-target=".bd-example-modal-lg" title="Papar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings text-primary"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg></a>&nbsp;
                        <a href="#" data-toggle="modal" data-target=".bd-example-modal-lgEdit<?php echo $value['id'];?>" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>&nbsp;
                        <a href="index.php?pt=list_bina_iman&delete-id=<?php echo $value['id'];?>" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Hapus rekod ini?');"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                    </td>
                </tr>
                <?php
                
                include "edit_bina_iman.php";
                
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
        
        <form name="" action="index.php?pt=list_bina_iman" method="post">
            <input type="hidden" name="id" value="">
            <div class="modal-body">
    		
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Nama</label>
        		<input type="text" class="form-control" id="name" name="name" required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Location</label>
        		<input type="text" class="form-control" id="locationName" name="locationName" required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Tarikh Mula</label>
        		<input type="date" class="form-control" id="dateStart" name="dateStart" required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Tarikh Tamat</label>
        		<input type="date" class="form-control" id="dateEnd" name="dateEnd" required>
    			</div>
    			
    			<div class="form-group mb-4">
        		<label for="formGroupExampleInput">Belanja (RM)</label>
        		<input type="text" class="form-control" id="locationName" name="locationName" required>
    			</div>
    			
            </div>
            
            <div class="modal-footer">
            	<button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                <button type="submit" name="submit" value="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
             