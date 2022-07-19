<?php

include('../../function/function.php');

$user_id = htmlspecialchars($_GET['user'], ENT_QUOTES, 'UTF-8');

$func = new Functions;

$func->getLatestPPM($user_id);
