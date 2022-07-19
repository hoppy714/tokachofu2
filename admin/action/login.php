<?php
include __DIR__ . "/../../function/function.php";

$id = htmlspecialchars($_POST['user_id'], ENT_QUOTES, 'UTF-8');
$password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

if (!empty($id) && !empty($password)) {
    $func = new Functions;
    $func->login($id, $password);
}
exit();
