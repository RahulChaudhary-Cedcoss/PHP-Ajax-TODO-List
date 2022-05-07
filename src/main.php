<?php
session_start();

if (!isset($_SESSION["todo"])) {
    $_SESSION["todo"] = array();
}
if ($_GET["action"] == "add") {
    $task = $_GET["val"];
    array_push($_SESSION["todo"], $task);
}

if ($_GET["action"] == "delete") {
    foreach ($_SESSION['todo'] as $key => $value) {
        if ($key == $_GET['id']) {
            array_splice($_SESSION['todo'], $key, 1);
        }
    }
}
if ($_GET["action"] == "update") {
    foreach ($_SESSION['todo'] as $key => $value) {
        if ($key == $_GET['id']) {
        $_SESSION['todo'][$key]= $_GET['val'];
        }
    }
}

return print_r(json_encode($_SESSION['todo']));
?>