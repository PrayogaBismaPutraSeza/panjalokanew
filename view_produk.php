<?php
include("first.php"); //include auth.php file on all secure pages



$query  = "SELECT * from produk WHERE idproduk='1'";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
}
?>




<?php
$id = $_REQUEST['idproduk'];

$query  = "SELECT * from produk where idproduk='" . $id . "'";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {

?>

    <?php
    include("php/header.php");
    ?>
    <div id="page-inner">


        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Produk: <?php echo $row['nama_produk']; ?></h1>
                <h1 class="page-subhead-line">Selamat Datang di Sistem ERP<strong><?php echo ' ' . $siteName ?></strong>
                    <i class="icon-calendar icon-large"></i>


                    <?php
                    date_default_timezone_set("Asia/Jakarta");
                    echo  date(" l, F d Y") . "<br>";

                    ?>
                </h1>

            </div>
        </div>

        <form class="form-horizontal" action="update_produk.php" method="post" name="form">
            <input type="hidden" name="new" value="1" />
            <input name="idproduk" type="hidden" value="<?php echo $row['idproduk']; ?>" />

            <div class="form-group">
                <label class="col-sm-5 control-label">Kode Produk :</label>
                <div class="col-sm-4">
                    <input type="text" name="kode_produk" class="form-control" value="<?php echo $row['kode_produk']; ?>" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 control-label">Nama Produk :</label>
                <div class="col-sm-4">
                    <input type="text" name="nama_produk" class="form-control" value="<?php echo $row['nama_produk']; ?>" required="required">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 control-label">Kategori Produk :</label>
                <div class="col-sm-4">
                    <select name="idkategori" class="form-control" required>
                        <?php
                        $dataK = mysqli_query($conn, "SELECT * FROM kategori ORDER BY nama_kategori ASC") or die(mysqli_error());
                        while ($dk = mysqli_fetch_array($dataK)) {
                        ?>
                            <option value="<?php echo $dk['idkategori'] ?>" class="small"><?php echo $dk['nama_kategori'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-5 control-label"></label>
                <div class="col-sm-4">
                    <input type="submit" name="submit" value="Update" class="btn btn-danger">
                    <a href="produk.php" class="btn btn-primary">Cancel</a>
                </div>
            </div>

        </form>
    <?php
}
    ?>

    <!-- this modal is for my Colins -->
    <div class="modal fade" id="colins" role="dialog">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                    <h3 align="center">You are logged in as <b><?php echo $_SESSION['username']; ?></b></h3>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <div align="center">
                        <a href="logout.php" class="btn btn-block btn-danger">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>


    <!-- this function is for modal -->
    <script>
        $(document).ready(function() {
            $("#myBtn").click(function() {
                $("#myModal").modal();
            });
        });
    </script>
    <?php
    include("last.php");
    ?>