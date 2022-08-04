<?php

?>

<?php

if (isset($_POST['submit']) != "") {
    $idpelanggan      = $_POST['idpelanggan'];
    $nama_pelanggan      = $_POST['nama_pelanggan'];
    $telepon_pelanggan     = $_POST['telepon_pelanggan'];
    $alamat_pelanggan      = $_POST['alamat_pelanggan'];

    $sql = $conn->query("INSERT INTO pelanggan (nama_pelanggan,telepon_pelanggan,alamat_pelanggan) values ('$nama_pelanggan','$telepon_pelanggan','$alamat_pelanggan')");

    if ($sql) {
?>
        <script>
            alert('Pelanggan berhasil ditambahkan');
            window.location.href = 'pelanggan.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Invalid.');
            window.location.href = 'pelanggan.php';
        </script>
<?php
    }
}
?>