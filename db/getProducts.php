<?php
require_once 'connect.php';

$query = $db->prepare("SELECT * FROM videogiochi");
$query->execute();
echo json_encode($query->fetch(PDO::FETCH_ASSOC));

?>