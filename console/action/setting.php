<?php

include('../../function/function.php');

$machine_id = htmlspecialchars($_POST['machine_id'], ENT_QUOTES, 'UTF-8');
$place = htmlspecialchars($_POST['place'], ENT_QUOTES, 'UTF-8');

$func = new Functions;

$func->insertNewMachine($machine_id, $place);
