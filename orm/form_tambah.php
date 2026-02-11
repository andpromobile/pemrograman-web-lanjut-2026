<?php
require_once 'orm/AsalSekolahORM.php';
//ambil seluruh record dengan menggunakan tabel orm asal
// sekolah dan simpan di variable
$list_asal_sekolah = AsalSekolahORM::findMany();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Form Mahasiswa</title>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js">
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdel
ivr.net/npm/pikaday/css/pikaday.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.
1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-mask
plugin@1.14.16/dist/jquery.mask.min.js"></script>
</head>

<body>
    <h1> Silahkan isikan form data anda </h1>
    <form method="post" action="http://localhost/php/orm/save.php">
        <input type="text" name="tanggal" id="datepicker" placehol der="Tanggal Bayar">
        <input type="text" name="nama" placeholder="nama lengkap">
        <input type="text" name="alamat" placeholder="alamat">
        <input type="text" name="jumlah" placeholder="Jumlah Bayar
" class="money">
        <div style="margin-top: 1em">
            <label><b>Asal Sekolah : </b></label>
            <span style="margin-top: 0; ">
                <select name="asal_sekolah_id">
                    <?php foreach ($list_asal_sekolah as $asal_sekolah) : ?>
                    <option value="<?= $asal_sekolah
>id; ?>">
                        <?= $asal_sekolah->nama; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </span>
        </div>
        <div style="margin
top: 1em"><b>Status Pembayaran : </b></div>
        <div style="margin-top: 0; float:left">
            <span>
                <input type="radio" name="status_kredit" value="0">
                >
                <label for="Tunai">Tunai</label><br>
            </span>
            <span>
                <input type="radio" name="status_kredit" value="1" <label for="Kredit">Kredit</label><br>
            </span>
        </div>
        <div style="clear:both"></div>
        <button type="submit" style="margin
top: 20px">Simpan</button>
    </form>
</body>
<script>
    //format tanggal
    var picker = new Pikaday({
        field: document.getElementById('datepicker'),
        format: 'D/M/YYYY',
        toString(date, format) {
// you should do formatting based on the passed format
,
        // but we will just return 'D/M/YYYY' for simplicity
        const day = date.getDate();
        const month = date.getMonth() + 1;
        const year = date.getFullYear();
        return `${day}-${month}-${year}`;
    },
        parse(dateString, format) {
        // dateString is the result of `toString` method
        const parts = dateString.split('/');
        const day = parseInt(parts[0], 10);
        const month = parseInt(parts[1], 10) - 1;
        const year = parseInt(parts[2], 10);
        return new Date(year, month, day);
    }
});
</script>
<script type="text/javascript">
    // Jquery Dependency
    $('.money').mask('000.000.000', {
        reverse: true
    });
</script>

</html>