<?php
$recepient = 'mlstmerser@gmail.com';
$sitename = "deadliner.org";
$name = trim($_POST["fio"]);
$contact = trim($_POST["connection"]);
$g1 = trim($_POST["ch"]);
$message = "Имя: $name \nКонтактные данные: $contact \nТип сайта: $g1";
$pagetitle = "Заказ на звонок с сайта \"$sitename\"";
mail($recepient, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");