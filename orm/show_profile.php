<?php
require_once'orm/ProfileORM.php';
require_once'orm/AsalSekolahORM.php';
require_once'helper.php';
$id=$_GET['id'];//diambildariurlparameterget
$profile= ProfileORM::findOne($id);//outputadalaharray
if(!$profile){
echo'datatidak ditemukan';
return;
}
$asal_sekolah=AsalSekolahORM::findOne($profile->asal_sekolah_id);
?>
<!DOCTYPEhtml>
    <htmllang="en">

        <head>
            <metacharset="UTF-8">
                <metahttp-equiv="X-UA-Compatible"content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <style>
                        .row {
                            margin: 0 0 20px 10px;
                        }
                    </style>
                    <title>Profile Mahasiswa</title>
        </head>

        <body>
            <h1> Data Mahasiswa</h1>
            <div class="row">
                <div><b>Nama</b></div>
                <div>
                    <?= $profile->nama; ?>
                </div>
            </div>
            <div class="row">
                <div><b>Alamat</b></div>
                <div>
                    <?= $profile->alamat; ?>
                </div>
            </div>
            <div class="row">
                <div><b>Jumlah Pembayaran</b></div>
                <div>
                    <?= format_rupiah($profile->jumlah); ?>
                </div>
            </div>
            <div class="row">
                <div><b>Jenis</b></div>
                <div>
                    <?= ($profile->status_kredit) ? 'Kredit' : 'Tunai'; ?>
                </div>
            </div>
            <div class="row">
                <div><b>Asal Sekolah</b></div>
                <div>
                    <?= $asal_sekolah->nama ?>
                </div>
            </div>
            <div class="row">
                <div style="float:left; margin-right: 20px"><b>
                        <ahref="http: //localhost/php/orm/form_edit.php?id=<?=$id; ?>">Edit</a>
                    </b></div>
                <div div style="float:left"><b><a href="http://localhost/php/orm/delete.php?id=<?= $id; ?>" style="color:
red">Delete</a></b></div>
            </div>
        </body>

        </html>