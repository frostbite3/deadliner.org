<?php
$recepient = 'mlstmerser@gmail.com';
$sitename = "deadliner.org";
$name = trim($_POST["text_a3d1d83"]);
$contact = trim($_POST["text_5a4dbe0"]);
$g1 = trim($_POST["select_8b129a8"]);
$message = "Имя: $name \nКонтактные данные: $contact \nТип сайта: $g1";
$pagetitle = "Заказ на звонок с сайта \"$sitename\"";
mail($recepient, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");