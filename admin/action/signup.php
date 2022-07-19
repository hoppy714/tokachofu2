<?php
include "../../function/function.php";

$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
$mail = htmlspecialchars($_POST['mail'], ENT_QUOTES, 'UTF-8');
$place_id = htmlspecialchars($_POST['place_id'], ENT_QUOTES, 'UTF-8');
$place_name = htmlspecialchars($_POST['place_name'], ENT_QUOTES, 'UTF-8');
$password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

if (!empty($name) && !empty($place_id) && !empty($password) && !empty($mail)) {
    $func = new Functions;
    $func->signup($name, $mail, $place_id, $place_name, $password);
}
exit();
