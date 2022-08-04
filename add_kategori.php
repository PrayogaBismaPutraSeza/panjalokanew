<?php

?>

<?php

if (isset($_POST['submit']) != "") {
    $idkategori      = $_POST['idkategori'];
    $nama_kategori      = $_POST['nama_kategori'];
    $tgl_dibuat      = $_POST['tgl_dibuat'];

    $sql = $conn->query("INSERT INTO kategori (nama_kategori) values ('$nama_kategori')");

    if ($sql) {
?>
        <script>
            alert('Kategori berhasil ditambahkan');
            window.location.href = 'kategori.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Invalid.');
            window.location.href = 'index.php';
        </script>
<?php
    }
}
?>