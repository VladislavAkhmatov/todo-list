<?php
session_start();
require_once('autoload.php');
if (!isset($_SESSION['sys_name']) || isset($_POST['out'])) {
    session_destroy();
    header('Location: view/auth');
    exit();
}
?>