<?php

    session_start();
    $_SESSION = array();
    session_destroy();

    setcookie('id', '');
    setcookie('firstname', '');
    setcookie('lastname', '');
    setcookie('password', '');

    header('Location: ../../');
