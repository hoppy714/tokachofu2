<?php

$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8', false);
$address = htmlspecialchars($_POST['tel'], ENT_QUOTES, 'UTF-8', false);
$tel = htmlspecialchars($_POST['tel'], ENT_QUOTES, 'UTF-8', false);
$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8', false);
$context = htmlspecialchars($_POST['context'], ENT_QUOTES, 'UTF-8', false);

mb_language("Japanese");
mb_internal_encoding("UTF-8");

session_start();
// 送信先メールアドレス
$to = "info@yutons.com";
$title = "Tokachofu | お問い合わせ";
$message = "氏名: " . $name . "\n 電話番号: " . $tell . "\n 返信用メールアドレス: " . $email . "\n \n  内容: " . $Textarea;


if (mb_send_mail($to, $title, $message)) {
    header('Location: ./index.html');
    exit();
} else {
    header('Location: ./index.html');
    exit();
}
