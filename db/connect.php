<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    $host = "localhost";
    $dbname = "videogen";
    $user = "postgres";
    $password = "postgres";

    try {
        $db = new PDO("pgsql:user=$user dbname=$dbname password=$password");
        //$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        die("Errore nella gestione del database $dbname: " . $e->getMessage());
    }
?>
