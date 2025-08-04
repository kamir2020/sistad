<?php 
session_start();
include "db_config.php";
include "secure.php";
include "query.php";


$stmt = $db_con->prepare("SELECT * FROM tbl_user WHERE username='".$_POST['username']."' AND statusID='S1'");
$stmt->execute();
$data = $stmt->fetch();
    
if ($data > 0) {

	$password2 = trim(decrypt($data['password']));

	if ($_POST['password']==$password2) {
		
	
        $_SESSION['userID'] = $data['userID'];
        		
		if ($data['levelID']=='L2') {
			echo"<script>document.location.href='admin/index.php';</script>";
		}
		
		
		else if ($data['levelID']=='L3') {
			echo"<script>document.location.href='pt/index.php';</script>";
		}
		
		else if ($data['levelID']=='L4') {
			echo"<script>document.location.href='ppm/index.php';</script>";
		}
		
		/*
		else if ($data['levelID']=='L2') {
			
			$sql = "SELECT * FROM tbl_member WHERE tbl_member.userID='".$data['userID']."'";
			$res = getData1($sql);
			
			$_SESSION['districtID'] = $res['districtID'];
			
			echo"<script>document.location.href='admin/index.php';</script>";
		}

		else if ($data['levelID']=='L3') {
			echo"<script>document.location.href='user/index.php';</script>";
		}*/
	}

	else {
		echo"<script>alert('Katanama dan katalaluan tidak tepat...');document.location.href='index.php';</script>";	
	}


}
	
else {
	echo"<script>alert('Katanama dan katalaluan tidak tepat...');document.location.href='index.php';</script>";
}

?>
