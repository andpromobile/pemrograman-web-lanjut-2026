<?php

//parameter koneksi database
$dbconfig['host'] = 'localhost';
$dbconfig['username'] = 'root';
$dbconfig['password'] = '';
$dbconfig['name'] = 'mahasiswa';

//test koneksi dan akan error apabila gagal
try{
    $db = new PDO(
        "mysql:host=".$dbconfig['host'].";dbname=".$dbconfig['name'], 
        $dbconfig['username'], 
        $dbconfig['password'],
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        )
    );
    return $db;

}catch(PDOException $e){
    die(json_encode(array('status' => false, 
    'message' => 'Koneksi Gagal: '.$e->getMessage())));
}



?>