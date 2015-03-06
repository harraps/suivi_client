<?php

session_start();
$_SESSION = array();
session_destroy();

setcookie('id', '');
setcookie('password', '');

header('Location: ../../');
