<?php 
session_start();
ob_start();
if($_SERVER["REQUEST_METHOD"]=="POST")
foreach ($_SESSION["data"] as $key => $value) {

    if(($key == $_POST['unchk_'.$key])&&($key>=0)){
        array_push($_SESSION['todo'],$value);
        array_splice($_SESSION['complete_todo'],$key,1);
    }
}

header("Location:index.php");die();
?>