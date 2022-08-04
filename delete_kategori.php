<?php
require('db.php');

$idkategori = $_GET['idkategori'];

$deleteKategori = $conn->query("DELETE FROM kategori WHERE idkategori=$idkategori");
if ($deleteKategori) {
?>
    <script>
        alert('Kategori berhasil dihapus');
        window.location.href = 'kategori.php';
    </script>
<?php
} else {
?>
    <script>
        alert('Error Acures');
        window.location.href = 'kategori.php';
    </script>
<?php
}
?>