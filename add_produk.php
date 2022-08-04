<?php

?>

<?php

if (isset($_POST['submit']) != "") {
    $idproduk      = $_POST['idproduk'];
    $idkategori      = $_POST['idkategori'];
    $kode_produk      = $_POST['kode_produk'];
    $nama_produk      = $_POST['nama_produk'];
    $harga_modal      = 0;
    $harga_jual      = 0;
    $stock           = 0;

    $sql = $conn->query("INSERT INTO produk (idkategori,kode_produk,nama_produk,stock,harga_modal,harga_jual) values ('$idkategori','$kode_produk','$nama_produk','$stock','$harga_modal','$harga_jual')");

    if ($sql) {
?>
        <script>
            alert('Produk berhasil ditambahkan');
            window.location.href = 'produk.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Invalid.');
            window.location.href = 'produk.php';
        </script>
<?php
    }
}
?>