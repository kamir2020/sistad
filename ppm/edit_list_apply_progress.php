<div class="row layout-spacing">
	<div class="col-lg-12">
		<div class="statbox widget box box-shadow">
        
		<div class="widget-header">
        
		<div class="row">
        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
        <h4>SENARAI PERMOHONAN: PERUNDINGAN</h4>
        </div>
        </div>
        
        <div class="row">
        <div class="col-xl-12 col-md-12 col-sm-12 col-12" align="right">
        <div class="col-sm-6">
			<button type="button" class="btn btn-primary mb-2 mr-2" onclick="document.location.href='index.php?ppm=list_apply_progress';">Back</button>
		</div>
        </div>
        </div>
			
		</div>
        
        <?php 
        $sql = "SELECT tbl_application.id,tbl_application.name,tbl_application.nrid,
        tbl_application.email,tbl_application.phone,
        tbl_race.raceName,
        tbl_religion.religionName 
        FROM tbl_application
        	INNER JOIN tbl_race ON tbl_application.raceID=tbl_race.id  
        	INNER JOIN tbl_religion ON tbl_application.religionID=tbl_religion.id
        		WHERE tbl_application.id='".$_GET['id']."'";
        $res = getData1($sql);
        ?>
        
		<div class="widget-content widget-content-area">
        <b>* MAKLUMAT PEMOHON</b><br><br>
        
        <table width="100%" cellpadding="5px">
        
        <tr>
        <td width="15%"><b>Nama</b></td>
        <td width="85%"><?php echo $res['name'];?></td>
        </tr>
        
        <tr>
        <td width="15%"><b>NRID</b></td>
        <td width="85%"><?php echo $res['nrid'];?></td>
        </tr>
        
        <tr>
        <td width="15%"><b>Bangsa</b></td>
        <td width="85%"><?php echo $res['raceName'];?></td>
        </tr>
        
        <tr>
        <td width="15%"><b>Agama</b></td>
        <td width="85%"><?php echo $res['religionName'];?></td>
        </tr>
        
        <tr>
        <td width="15%"><b>Emel</b></td>
        <td width="85%"><?php echo $res['email'];?></td>
        </tr>
        
        <tr>
        <td width="15%"><b>No. Telefon</b></td>
        <td width="85%"><?php echo $res['phone'];?></td>
        </tr>
        
        </table>
        
        </div>
        
        <div class="widget-content widget-content-area">
        <b>* LATAR BELAKANG PEMOHON</b>&nbsp;&nbsp;
        <a href="index.php?ppm=edit_list_apply_progress&id=<?php echo $value['id'];?>" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
        <br><br>
        
        <?php
        $sql1 = "SELECT * FROM tbl_application_bg WHERE applicationID='".$res['id']."'";
        $res1 = getData1($sql1);
        ?>
        
        <table width="100%" cellpadding="5px">
        
        <tr>
        <td width="20%"><b>Tahap Pendidikan</b></td>
        <td width="80%"><?php echo $res1['educationID'];?></td>
        </tr>
        
        <tr>
        <td width="20%"><b>Status</b></td>
        <td width="80%"><?php echo $res1['maritalID'];?></td>
        </tr>
        
        <tr>
        <td width="20%"><b>Anak</b></td>
        <td width="80%"><?php echo $res1['children'];?></td>
        </tr>
        
        </table>
        
        </div>
    </div>
</div>

