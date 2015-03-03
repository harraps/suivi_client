<?php

    $database;
    try {
        $database = new PDO('mysql:host=localhost; dbname=Suivi_client; charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : '.$e->getMessage());
    }