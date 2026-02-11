<?php
require_once 'orm/ProfileORM.php';
//siapkan data baru
$profile = ProfileORM::create();
//konversi array jadi object dari $_POST['xx'] menjadi $post->xx;
$post = (object) $_POST;

//isi kolom dengan nilai dari form_tambah
$profile->nama = $post->nama;
$profile->asal_sekolah_id = $post->asal_sekolah_id;
$profile->alamat = $post->alamat;
$profile->tanggal = date("Y-m-d", strtotime($post->tanggal));
$profile->jumlah = str_replace(".", "", $post->jumlah);
$profile->status_kredit = $post->status_kredit;
//simpan data
$profile->save();
echo "Saving is successful" ;