<?php
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query = $db->prepare(
            "INSERT INTO videogiochi(titolo, produttore)
            VALUES(?, ?)");
    $query->execute([$_POST['name'], $_POST['producer']]);
    
    $query = $db->prepare(
            "SELECT * FROM videogiochi
            WHERE titolo = ?");
    $query->execute([$_POST['name']]);
    $cod_gioco = $query->fetch(PDO::FETCH_NUM)[0];
    
    $query = $db->prepare("SELECT * FROM console");
    $query->execute();
    $consoles = $query->fetchAll();
    
    foreach($consoles as $console){
        $cod_console = $console['cod'];
        $query = $db->prepare(
                "INSERT INTO giochi_console
                VALUES(?, ?, ?, ?)");
        $query->execute([$cod_gioco, $cod_console, 10, $_POST['price']]);
    }
    
}
?>