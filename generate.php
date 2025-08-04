<?php
include "secure.php";

echo $id = getRef(5);
echo"<br><br>";
echo $pwd = encrypt('password');

?>