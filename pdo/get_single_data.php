<?php
$db = require_once('koneksi.php');

$id = $_GET['tanggal'];
$sql = "SELECT * FROM profile where id=$id";

$query = $db->prepare($sql);
$query->execute();

$row = $query->fetch();

var_dump($row);

?>