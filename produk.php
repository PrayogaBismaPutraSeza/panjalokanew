<?php
include("first.php");
include("add_produk.php");
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
            <h1 class="page-head-line">Produk</h1>
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
                <button type="button" data-toggle="modal" data-target="#addproduk" class="btn btn-success">Tambah Produk Baru</button>
                <br><br>
                <div class="table-responsive">
                    <form method="post" action="">
                        <table class="table table-bordered table-hover table-condensed" id="myTable">
                            <thead>
                                <tr class="info">
                                    <th>
                                        <p align="center">Kode Produk</p>
                                    </th>
                                    <th>
                                        <p align="center">Nama Produk</p>
                                    </th>
                                    <th>
                                        <p align="center">Kategori</p>
                                    </th>
                                    <th>
                                        <p align="center">Stock</p>
                                    </th>
                                    <th>
                                        <p align="center">Harga Modal</p>
                                    </th>
                                    <th>
                                        <p align="center">Harga Jual</p>
                                    </th>
                                    <th>
                                        <p align="center">Tanggal Input</p>
                                    </th>
                                    <th>
                                        <p align="center">Opsi</p>
                                    </th>
                            </thead>
                            <tbody>
                                <?php
                                global $idproduk;
                                $query = "select * from kategori k, produk p WHERE k.idkategori=p.idkategori ORDER BY idproduk ASC ";
                                $q = $conn->query($query);
                                while ($row = $q->fetch_assoc()) {
                                    $idproduk  = $row['idproduk'];
                                    $idkategori = $row['idkategori'];
                                    $nama_kategori = $row['nama_kategori'];
                                    $kode_produk = $row['kode_produk'];
                                    $nama_produk = $row['nama_produk'];
                                    $harga_modal = $row['harga_modal'];
                                    $harga_jual = $row['harga_jual'];
                                    $stock = $row['stock'];
                                    $tgl_input = $row['tgl_input'];

                                ?>
                                    <tr>
                                        <td align="center"><?php echo $kode_produk ?></td>
                                        <td align="center"><?php echo $nama_produk ?></td>
                                        <td align="center"><?php echo $nama_kategori ?></td>
                                        <td align="center"><?php echo $stock ?></td>
                                        <td align="center">Rp<?php echo number_format($harga_modal, 0) ?></td>
                                        <td align="center">Rp<?php echo number_format($harga_jual, 0) ?></td>
                                        <td align="center"><?php echo $tgl_input ?></td>
                                        <td align="center">
                                            <a class="btn btn-warning" href="view_produk.php?idproduk=<?php echo $row["idproduk"]; ?>">Edit</a>
                                            <a class="btn btn-danger" href="delete_produk.php?idproduk=<?php echo $row["idproduk"]; ?>">Hapus</a>

                                        </td>
                                    </tr>

                                <?php } ?>
                            </tbody>

                            <tr class="info">
                                <th>
                                    <p align="center">Kode Produk</p>
                                </th>
                                <th>
                                    <p align="center">Nama Produk</p>
                                </th>
                                <th>
                                    <p align="center">Kategori</p>
                                </th>
                                <th>
                                    <p align="center">Stock</p>
                                </th>
                                <th>
                                    <p align="center">Harga Modal</p>
                                </th>
                                <th>
                                    <p align="center">Harga Jual</p>
                                </th>
                                <th>
                                    <p align="center">Tanggal Input</p>
                                </th>
                                <th>
                                    <p align="center">Opsi</p>
                                </th>
                            </tr>
                        </table>
                    </form>
                </div>
            </fieldset>
        </form>
    </div>

    <!-- this modal is for ADDING an Product -->
    <div class="modal fade" id="addproduk" role="dialog">
        <?php
        $query = mysqli_query($conn, "SELECT max(kode_produk) as kodeTerbesar FROM produk");
        $data = mysqli_fetch_array($query);
        $kodeBarang = $data['kodeTerbesar'];
        $urutan = (int) substr($kodeBarang, 3, 3);
        $urutan++;
        $huruf = "BRG";
        $kodeBarang = $huruf . sprintf("%03s", $urutan);
        ?>
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>

                    <input type="hidden" name="b_id" value="<?php echo $b_id; ?>" class="form-control">
                    <h3 align="center"><b>Kode Produk : </b></h3>
                </div>
                <div class="modal-body" style="padding:40px 50px;">

                    <form class="form-horizontal" action="#" name="form" method="post">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Kode Produk :</label>
                            <div class="col-sm-8">
                                <input type="text" name="kode_produk" class="form-control" value="<?php echo $kodeBarang; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nama Produk :</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama_produk" class="form-control" placeholder="Masukkan nama produk" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Kategori Produk :</label>
                            <div class="col-sm-8">
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