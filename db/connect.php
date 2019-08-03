<?php
    session_start();
    
    $host = $IP; 
    $dbname = "videogen"; 
    $user = "admin"; 
    $password = "admin";
    
    try {
        $db = new PDO("pgsql:user=$user dbname=$dbname password=$password");
        //$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        die("Errore nella gestione del database $dbname: " . $e->getMessage());
    }
?>