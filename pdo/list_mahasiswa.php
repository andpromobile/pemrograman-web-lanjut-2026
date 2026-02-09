<?php
$db = require_once('koneksi.php');
require_once('helper.php');
$sql = "SELECT * FROM profile";
$query = $db->prepare($sql);

$query->execute();
$row=$query->fetchAll(PDO::FETCH_OBJ); //outputadalaharray
//var_dump($row);
?>
<!DOCTYPEhtml>
    <html lang="en">

        <head>
            <metacharset="UTF-8">
                <metahttp-equiv="X-UA-Compatible" content="IE=edge">
                    <metaname="viewport"content="width=device-width,initial-scale=1.0">
                        <title>ListMahasiswa</title>
                        <style>
                            table,
                            th,
                            td {
                                border: 1px solid#b8b8b8;
                                padding: 4px10px;
                            }

                            table {
                                border-collapse: collapse;
                            }
                        </style>
        </head>

        <body>
            <h1>Daftar Mahasiswa</h1>
            <table>
                <tr style="background: #fffcf5">
                    <td>No</td>
                    <td>Nama</td>
                    <td>Alamat</td>
                    <td>Jumlah</td>
                    <td>Jenis</td>
                    <td>Action</td>
                    </tr>
                    <?php foreach($row as $key=>$mahasiswa): ?>
                    <tr>
                        <td>
                            <?= $key+1; ?>
                        </td>
                        <td>
                            <?= $mahasiswa->nama;?>
                        </td>
                        <td>
                            <?= $mahasiswa->alamat;?>
                        </td>
                        <td>
                            <?= format_rupiah($mahasiswa->jumlah);?>
                        </td>
                        <td>
                            <?= ($mahasiswa->status_kredit)?'Kredit' :'Tunai';?>
                        </td>
                        <td>
                            <a href="http://localhost/php/pdo/show_profile.php?id=<?=$mahasiswa->id;?>">Detail</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
            </table>
        </body>

        </html>