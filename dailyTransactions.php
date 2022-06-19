<?php

include("first.php");
include("add_dailyTransaction.php");


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
      <h1 class="page-head-line">Transaksi Harian</h1>
      <h1 class="page-subhead-line">Selamat Datang di Sistem ERP <strong><?php echo ' ' . $siteName ?></strong>
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

        <button type="button" data-toggle="modal" data-target="#addTransaction" class="btn btn-success">Tambah Transaksi Baru</button>
        <br><br>
        <div class="table-responsive">
          <form method="post" action="">
            <table class="table table-bordered table-hover table-condensed" id="myTable">
              <!-- <h3><b>Ordinance</b></h3> -->
              <thead>
                <tr class="info">
                  <th>
                    <p align="center">NO:</p>
                  </th>
                  <th>
                    <p align="center">Tanggal</p>
                  </th>
                  <th>
                    <p align="center">Jumlah</p>
                  </th>
                  <th>
                    <p align="center">Detail</p>
                  </th>
                  <th>
                    <p align="center">Metode</p>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php




                $query = "select * from transaction where delete_status = '0' ORDER BY sno asc ";
                $q = $conn->query($query);
                $serial = 0;
                while ($row = $q->fetch_assoc()) {
                  $serial++;
                  $sno     = $row['sno'];
                  $date = date('D-d/M-Y', strtotime($row['t_date']));
                  $cause   = $row['cause'];
                  $amount  = $row['amount'];
                  $method  = $row['method'];



                ?>

                  <tr>
                    <td align="center"><a title="Update"> <?php echo $serial ?></a></td>
                    <td align="center"><a title="Update"><?php echo $date ?></a></td>
                    <td align="center"><a title="Update"><?php echo $amount ?></a></td>
                    <td align="center"><a title="Update"><?php echo $cause ?></a></td>
                    <td align="center"><a title="Update"><?php echo $method ?></a></td>

                  </tr>

                <?php } ?>
              </tbody>

              <tr class="info">
                <th>
                  <p align="center">NO:</p>
                </th>
                <th>
                  <p align="center">Tanggal</p>
                </th>
                <th>
                  <p align="center">Jumlah</p>
                </th>
                <th>
                  <p align="center">Detail</p>
                </th>
                <th>
                  <p align="center">Metode</p>
                </th>
              </tr>
            </table>
          </form>
        </div>
      </fieldset>
    </form>
  </div>

  <!-- this modal is for ADDING an Product -->
  <div class="modal fade" id="addTransaction" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:20px 50px;">
          <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
          <h3 align="center"><b>Tambah Transaksi</b></h3>
        </div>
        <div class="modal-body" style="padding:40px 50px;">

          <form class="form-horizontal" action="#" name="form" method="post">
            <div class="form-group">
              <label class="col-sm-4 control-label">Tanggal :</label>
              <div class="col-sm-8">
                <input class="form-control" id="datepicker" name="date" type="text" />
                <script>
                  $('#datepicker').datepicker({
                    uiLibrary: 'bootstrap4'
                  });
                </script>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-4 control-label">Detail :</label>
              <div class="col-sm-8">
                <input type="text" name="cause" class="form-control" placeholder="Masukkan alasan transaksi" required="required">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Jumlah :</label>
              <div class="col-sm-8">
                <input type="text" name="amount" class="form-control" placeholder="Masukkan jumlah transaksi" required="required">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Metode Pembayaran :</label>
              <div class="col-sm-4">
                <input type="radio" name="method" value="cash">Tunai &nbsp;&nbsp;
                <input type="radio" name="method" value="bkash">Transfer


              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-4 control-label"></label>
              <div class="col-sm-8">
                <input type="submit" name="submit" class="btn btn-success" value="Submit">
                <input type="reset" name="" class="btn btn-danger" value="Kosongkan Form">
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

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