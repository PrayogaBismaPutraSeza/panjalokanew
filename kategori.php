<?php
include("first.php");
include("add_kategori.php");
$query  = "SELECT * from deductions WHERE deduction_id='1'";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
}
?>
<?php
include("php/header.php");
?>
<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Kategori</h1>
            <h1 class="page-subhead-line">Selamat Datang di<strong><?php echo ' ' . $siteName ?></strong>
                <i class="icon-calendar icon-large"></i>


                <?php
                date_default_timezone_set("Asia/Jakarta");
                echo  date(" l, F d Y") . "<br>";

                ?>
            </h1>

        </div>
    </div>
    <div class="well bs-component">
        <form class="form-horizontal">
            <fieldset>
                <button type="button" data-toggle="modal" data-target="#addkategori" class="btn btn-success">Tambah Kategori Baru</button>
                <br><br>
                <div class="table-responsive">
                    <form method="post" action="">
                        <table class="table table-bordered table-hover table-condensed" id="myTable">
                            <thead>
                                <tr class="info">
                                    <th>
                                        <p align="center">Nama Kategori</p>
                                    </th>
                                    <th>
                                        <p align="center">Qty</p>
                                    </th>
                                    <th>
                                        <p align="center">Tanggal</p>
                                    </th>
                                    <th>
                                        <p align="center">Aksi</p>
                                    </th>
                            </thead>
                            <tbody>
                                <?php
                                global $idkategori;

                                $query = "select * from kategori ORDER BY idkategori ASC ";
                                $q = $conn->query($query);
                                while ($row = $q->fetch_assoc()) {
                                    $idkategori = $row['idkategori'];
                                    $nama_kategori = $row['nama_kategori'];
                                    $tgl_dibuat = $row['tgl_dibuat'];

                                ?>
                                    <tr>
                                        <td align="center"><?php echo $nama_kategori ?></td>
                                        <td align="center"><?php $result1 = mysqli_query($conn, "SELECT Count(idproduk) AS count FROM produk p, kategori k WHERE p.idkategori=k.idkategori and k.idkategori='$idkategori' ORDER BY idproduk ASC");
                                                            $cekrow = mysqli_num_rows($result1);
                                                            $row1 = mysqli_fetch_assoc($result1);
                                                            $count = $row1['count'];
                                                            if ($cekrow > 0) {
                                                                echo ($count);
                                                            } ?></td>
                                        <td align="center"><?php echo $tgl_dibuat ?></td>


                                        <td align="center">
                                            <a class="btn btn-warning" href="view_kategori.php?idkategori=<?php echo $row["idkategori"]; ?>">Edit</a>
                                            <a class="btn btn-danger" href="delete_kategori.php?idkategori=<?php echo $row["idkategori"]; ?>">Hapus</a>

                                        </td>
                                    </tr>

                                <?php } ?>
                            </tbody>

                            <tr class="info">
                                <th>
                                    <p align="center">Nama Kategori</p>
                                </th>
                                <th>
                                    <p align="center">Qty</p>
                                </th>
                                <th>
                                    <p align="center">Tanggal</p>
                                </th>
                                <th>
                                    <p align="center">Aksi</p>
                                </th>
                            </tr>
                        </table>
                    </form>
                </div>
            </fieldset>
        </form>
    </div>

    <!-- this modal is for ADDING an Product -->
    <div class="modal fade" id="addkategori" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>

                    <input type="hidden" name="b_id" value="<?php echo $b_id; ?>" class="form-control">
                    <h3 align="center"><b>Tambah kategori</b></h3>
                </div>
                <div class="modal-body" style="padding:40px 50px;">

                    <form class="form-horizontal" action="#" name="form" method="post">
                        <div class="form-group">

                            <label class="col-sm-4 control-label">Nama Kategori :</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama_kategori" class="form-control" placeholder="Masukkan kategori" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label"></label>
                            <div class="col-sm-8">
                                <input type="submit" name="submit" class="btn btn-success" value="Tambahkan">
                                <input type="reset" name="" class="btn btn-danger" value="Kosongkan Form">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <?php

    include("last.php");

    ?>