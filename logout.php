<?php
session_start();
$_SESSION['userID'] = "";
session_destroy();
echo"<script>document.location.href='index.php';</script>";
?>