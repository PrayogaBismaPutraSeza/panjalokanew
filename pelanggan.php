<?php
include("first.php");
include("add_customer.php");
?>
<?php
include("php/header.php");
?>
<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Customer</h1>
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
                <button type="button" data-toggle="modal" data-target="#addCustomer" class="btn btn-success">Tambah Customer Baru</button>
                <p align="center"><big><b>Daftar Pelanggan</b></big></p>
                <div class="table-responsive">
                    <form method="post" action="">

                        <table class="table table-bordered table-hover table-condensed" id="myTable">
                            <thead>
                                <tr class="info">
                                    <th>
                                        <p align="center">Nama Pelanggan</p>
                                    </th>
                                    <th>
                                        <p align="center">Telepon</p>
                                    </th>
                                    <th>
                                        <p align="center">Alamat</p>
                                    </th>
                                    <th>
                                        <p align="center">Aksi</p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * from pelanggan";
                                $q = $conn->query($query);
                                while ($row = $q->fetch_assoc()) {
                                    $idpelanggan    = $row['idpelanggan'];
                                    $nama_pelanggan = $row['nama_pelanggan'];
                                    $telepon_pelanggan = $row['telepon_pelanggan'];
                                    $alamat_pelanggan  = $row['alamat_pelanggan'];
                                ?>
                                    <tr>
                                        <input name="id" type="hidden" value="<?php echo $idpelanggan ?>" />
                                        <td align="center"><?php echo $nama_pelanggan ?></td>
                                        <td align="center"><?php echo $telepon_pelanggan ?></td>
                                        <td align="center"><?php echo $alamat_pelanggan ?></td>
                                        <td align="center">
                                            <a class="btn btn-warning" href="view_customer.php?idpelanggan=<?php echo $row["idpelanggan"]; ?>">Edit</a>
                                            <a class="btn btn-danger" href="deletecustomer.php?idpelanggan=<?php echo $row["idpelanggan"]; ?>">Hapus</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                            <tr class="info">
                                <th>
                                    <p align="center">Nama Pelanggan</p>
                                </th>
                                <th>
                                    <p align="center">Telepon</p>
                                </th>
                                <th>
                                    <p align="center">Alamat</p>
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

    <!-- this modal is for ADDING an Company -->
    <div class="modal fade" id="addCustomer" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                    <h3 align="center"><b>Tambah Customer</b></h3>
                </div>
                <div class="modal-body" style="padding:40px 50px;">

                    <form class="form-horizontal" action="#" name="form" method="post">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nama Pelanggan</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Pelanggan" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Telepon</label>
                            <div class="col-sm-8">
                                <input type="text" name="telepon_pelanggan" class="form-control" placeholder="Masukkan nomor Hp" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Alamat</label>
                            <div class="col-sm-8">
                                <input type="textarea" rows="4" cols="50" name="alamat_pelanggan" class="form-control" placeholder="Masukkan alamat" required="required">
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