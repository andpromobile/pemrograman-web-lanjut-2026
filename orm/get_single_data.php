<?php
require_once 'ProfileORM.php';
//nantinya dapat menggunakan parameter value dari $_GET
$id = 1;
$profile = ProfileORM::findOne($id);
//untuk melihat query terakhir yang dikirimkan ParisORM ke SQL
echo ORM::get_last_query();
//tampilkan isi dari hasil pengambilan data dari database
var_dump($profile);