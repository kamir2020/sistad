<?php
include "db_config.php";

function getStatus($sql) {
	global $db_con;
	
	$stmt = $db_con->prepare($sql);
	$stmt->execute(); 
	
	try {
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $status = "true";
        }
        else{
            $status = "false";
        }
    }
    catch (Exception $e){
        $e = "error";
        $status = $e;
    }
	return $status;
}

function getData1($sql) {
	global $db_con;
	
	$stmt = $db_con->prepare($sql);
	$stmt->execute(); 
	$result = $stmt->fetch();
	return $result;
}

function updateData($sql) {
	global $db_con;
	
	$stmt = $db_con->prepare($sql);
    
    try {
        $stmt->execute();
        $result = "true";
    }
    catch (Exception $e){
        $e = "false";
        $result = $e;
    }

    return  $result;
}

function viewList1($sql) {
    global $db_con;

    $query = $db_con->prepare($sql);
    $query->execute();

    if ($query->rowCount() > 0) {
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
    }
    else {
        $result='';
    }

    return $result;
}

function insertData($sql) {
    global $db_con;
    $stmt = $db_con->prepare($sql);
    
    try {
        $stmt->execute();
        $status = "true";
    }
    catch (Exception $e){
        $e = "false";
        $status = $e;
    }

    return  $status;

}

function insertData1($sql) {
    global $db_con;

    $stmt = $db_con->prepare($sql);
    
    try {
        $stmt->execute();
        $id = $db_con->lastInsertId();
    }
    catch (Exception $e){
        $e = "0";
        $id = $e;
    }

    return  $id;
    //$id = $db_con->lastInsertId();
    //return $id;
}

function SelectView($sql) {
    global $db_con;
    $query = $db_con->prepare($sql);
    $query->execute();

    if ($query->rowCount() > 0) {
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
    }
    else {
        $result='';
    }

    return $result;
}

function Update($sql) {
    global $db_con;

    $stmt = $db_con->prepare($sql);
    $stmt->execute();
}

function DeleteRecord($sql) {
    global $db_con;
    $stmt = $db_con->prepare($sql);
    
    try {
        $stmt->execute();
        $status = "true";
    }
    catch (Exception $e){
        $e = "false";
        $status = $e;
    }

    return  $status;
}

function SelectCount($sql) {
    global $db_con;
    
    $query = $db_con->prepare($sql);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function SelectSum($sql) {
    global $db_con;
    
    $query = $db_con->prepare($sql);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
    return $row;
}

