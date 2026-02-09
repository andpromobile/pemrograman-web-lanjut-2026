<?php
    $db = require_once('koneksi.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM profile where id=$id";
    $query = $db->prepare($sql);
    $query->execute();
    $mahasiswa = $query->fetch(PDO::FETCH_OBJ);//outputadalaharray
    $tanggal = date("m-d-Y", strtotime($mahasiswa->tanggal));
?>

<!DOCTYPE html>
<html>

<head>
    <title>Form Mahasiswa</title>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/
npm/pikaday/css/pikaday.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery
.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-mask
plugin@1.14.16/dist/jquery.mask.min.js"></script>
</head>

<body>
    <h1> Silahkan isikan form data anda </h1>
    
    <form method="post" action="http://localhost/php/pdo/save.php">
        
        <input type="hidden" name="id" value="<?= $mahasiswa->id; ?>">
        
        <input type="text" name="tanggal" id="datepicker" placeholder="Tanggal Bayar">
        <input type="text" name="nama" placeholder="nama lengkap" value="<?= $mahasiswa->nama; ?>">
        <input type="text" name="alamat" placeholder="alamat" value="<?= $mahasiswa->alamat; ?>">
        <input type="text" name="jumlah" placeholder="Jumlah Bayar" class="money" value="<?= $mahasiswa->jumlah; ?>">
        <div style="margin-top: 1em"><b>Status Pembayaran : </b></div>
        <div style="margin-top: 0; float:left">
            <span>
                <input type="radio" name="status_kredit" value="0" <?= (!$mahasiswa->status_kredit) ? 'checked' : ''; ?>>
                <label for="Tunai">Tunai</label><br>
            </span>
            <span>
                <input type="radio" name="status_kredit" value="1" <?= ($mahasiswa->status_kredit) ? 'checked' : ''; ?>>
                <label for="Kredit">Kredit</label><br>
            </span>
        </div>
        <div style="clear:both"></div>
        <button type="submit" style="margin-top: 20px">Simpan</button>
    </form>
</body>
<script>
    //format tanggal
    var picker = new Pikaday({
        field: document.getElementById('datepicker'),
        format: 'D/M/YYYY',
        toString(date, format) {
            // youshould do formattingbased on thepassed format,
            // butwewill just return 'D/M/YYYY' for simplicity
            const day = date.getDate();
            const month = date.getMonth() + 1;
            const year = date.getFullYear();
            return `${day}-${month}-${year}`;
        },
        parse(dateString, format) {
            // dateString is theresult of `toString` method
            const parts = dateString.split('/');
            const day = parseInt(parts[0], 10);
            const month = parseInt(parts[1], 10) - 1;
            const year = parseInt(parts[2], 10);
            return new Date(year, month, day);
        }
    });

    picker.setDate(new Date('<?= $tanggal; ?>'));
</script>
<script type="text/javascript">
    //Jquery Dependency
    $('.money').mask('000.000.000', {
        reverse: true
    });
</script>

</html>