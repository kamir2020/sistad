<!-- Modal -->
<div class="modal fade" id="exampleModalEdit<?php echo $value['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
    	<div class="modal-content">
        	<div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Rekod</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            	<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
            </div>
          	
          	<?php
          	$sql = "SELECT * FROM tbl_job WHERE id='".$value['id']."'";
          	$res = getData1($sql);
          	?>
          	  
            <form name="" action="index.php?admin=list_job" method="post">
            <input type="hidden" name="id" value="<?php echo $res['id'];?>">
            <div class="modal-body">
    		
    		<div class="form-group mb-4">
        	<label for="formGroupExampleInput">Nama</label>
        	<input type="text" class="form-control" id="jobName" name="jobName" value="<?php echo $res['jobName'];?>" required>
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