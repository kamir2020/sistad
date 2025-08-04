<div class="row layout-spacing">
	<div class="col-lg-12">
		<div class="statbox widget box box-shadow">
        
		<div class="widget-header">
        
        <?php
        if (isset($_POST['submit'])) {
        	
        	if ($_POST['id']!='') { // edit record
        		
        		$sql = "UPDATE tbl_race SET raceName='".$_POST['raceName']."' WHERE id='".$_POST['id']."'";
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
        		
        		$sql = "INSERT INTO tbl_race VALUES (null,'".$_POST['raceName']."')";
        		$res = insertData($sql);
        		
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
        }
        
        else if (isset($_GET['delete-id'])) {  // delete record
        	
        	$sql = "DELETE FROM tbl_race WHERE id='".$_GET['delete-id']."'";
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
        <h4>SENARAI BANGSA</h4>
        </div>
        </div>
			
		<div class="row">
        <div class="col-xl-12 col-md-12 col-sm-12 col-12" align="right">
        <div class="col-sm-6">
			<button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#exampleModal">Tambah Rekod</button>
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
        <th width="10%">No.</th>
        <th width="80%">Nama</th>
        <th width="20%">Tindakan</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $stmt = "SELECT * FROM tbl_race
        ORDER BY tbl_race.raceName DESC";
        $result = SelectView($stmt);

        if ($result!='') {
            $i=1;
            foreach ($result as $value) {
                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $value['raceName'];?></td>
                    <td align="center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-dark btn-sm">Buka</button>
                            <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalEdit<?php echo $value['id'];?>">Kemaskini</a>
                                <a class="dropdown-item" href="index.php?admin=list_race&delete-id=<?php echo $value['id'];?>" onclick="return confirm('Hapus rekod ini?');">Hapus</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php
                
                include "edit_race.php";
                
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
    	<div class="modal-content">
        	<div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Rekod</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            	<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
            </div>
            
            <form name="" action="index.php?admin=list_race" method="post">
            <input type="hidden" name="id" value="">
            <div class="modal-body">
    		
    		<div class="form-group mb-4">
        	<label for="formGroupExampleInput">Nama</label>
        	<input type="text" class="form-control" id="raceName" name="raceName" required>
    		</div>
            	
            </div>
            
            <div class="modal-footer">
            	<button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                <button type="submit" name="submit" value="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
            
        </div>
    </div>
</div>