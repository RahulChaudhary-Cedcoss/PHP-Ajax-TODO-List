<?php 
session_start();
ob_start();
if (!isset($_SESSION["complete_todo"])) {
    $_SESSION["complete_todo"] = array();
}
if($_SERVER["REQUEST_METHOD"]=="POST")
foreach ($_SESSION["data"] as $key => $value) {

    if(($key == $_POST['chk_'.$key])&&($key>=0)){
        array_push($_SESSION['complete_todo'],$value);
        array_splice($_SESSION['todo'],$key,1);

    }
}

header("Location:index.php");die();
?>