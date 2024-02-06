<?php

 $server = 'localhost';
 $user = 'root';
 $password = '';
 $database = 'banco_modelo_site';

 $db = new PDO("mysql:host=$server;dbname=$database;charset=utf8", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 date_default_timezone_set('America/Sao_Paulo');

session_start();

 $sessionIdentifier = "idUser@" . $database;
 $userIdentifier = "name@" . $database;
 $permissionIdentifier = "access_level@" . $database;
 $statusIdentifier = "status@" . $database;
 $vereadorIdentifier = "status@" . $database;
 
?>