<?php

session_start();

$_SESSION['request_id'] = htmlspecialchars($_GET['id'],ENT_QUOTES,'UTF-8');;

header('Location: ./admin/index.php');
exit();
