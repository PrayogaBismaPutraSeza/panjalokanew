<?php
include("first.php");
include("add_supply.php");
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
      <h1 class="page-head-line">Buy Supply</h1>
      <h1 class="page-subhead-line">Selamat Datang di Sistem ERP<strong><?php echo ' ' . $siteName ?></strong>
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

        <button type="button" data-toggle="modal" data-target="#addSupply" class="btn btn-success">Tambah Supply Baru</button>
        <a class="btn btn-info" href="report_supply.php" target="_blank"><i class='bx bx-printer'></i> Cetak PDF</a>
        <br><br>
        <div class="table-responsive">
          <form method="post" action="">
            <table class="table table-bordered table-hover table-condensed" id="myTable">
              <thead>
                <tr class="info">
                  <th>
                    <p align="center">Tanggal</p>
                  </th>
                  <th>
                    <p align="center">Id/Nama</p>
                  </th>
                  <th>
                    <p align="center">Supplier</p>
                  </th>
                  <th>
                    <p align="center">Harga</p>
                  </th>
                  <th>
                    <p align="center">Stok</p>
                  </th>
                  <th>
                    <p align="center">Total</p>
                  </th>
                  <th>
                    <p align="center">Action</p>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php

                global $b_id;


                $query = "select * from buy where delete_status = '0' ORDER BY b_id asc ";
                $q = $conn->query($query);
                while ($row = $q->fetch_assoc()) {
                  $b_id     = $row['b_id'];
                  $p_name  = $row['p_name'];
                  $company = $row['company'];
                  $given_date   = $row['given_date'];
                  $harga  = $row['harga'];
                  $banyak  = $row['banyak'];
                  $total = $row['total'];

                ?>

                  <tr>
                    <td align="center"><?php echo $given_date ?></a></td>
                    <td align="center"><?php echo $b_id ?>/ <?php echo $p_name ?></a></td>
                    <td align="center"><?php echo $company ?></a></td>
                    <td align="center"><?php echo $harga ?></a></td>
                    <td align="center"><?php echo $banyak ?></a></td>
                    <td align="center"><?php echo $total ?></a></td>


                    <td align="center">
                      <a class="btn btn-danger" href="delete_supply.php?b_id=<?php echo $row["b_id"]; ?>">Delete</a>

                    </td>
                  </tr>

                <?php } ?>
              </tbody>

              <tr class="info">
                <th>
                  <p align="center">Tanggal</p>
                </th>
                <th>
                  <p align="center">Id/Name</p>
                </th>
                <th>
                  <p align="center">Company</p>
                </th>
                <th>
                  <p align="center">Harga</p>
                </th>
                <th>
                  <p align="center">Stok</p>
                </th>
                <th>
                  <p align="center">Total</p>
                </th>
                <th>
                  <p align="center">Action</p>
                </th>
              </tr>
            </table>
          </form>
        </div>
      </fieldset>
    </form>
  </div>

  <!-- this modal is for ADDING an Product -->
  <div class="modal fade" id="addSupply" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:20px 50px;">
          <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>

          <input type="hidden" name="b_id" value="<?php echo $b_id; ?>" class="form-control">
          <h3 align="center"><b>Add Supply</b></h3>
        </div>
        <div class="modal-body" style="padding:40px 50px;">

          <form class="form-horizontal" action="#" name="form" method="post">
            <div class="form-group">
              <label class="col-sm-4 control-label">Date :</label>
              <div class="col-sm-4">
                <input class="form-control" id="datepicker" placeholder="Select Date" name="given_date" type="text" />
                <script>
                  $('#datepicker').datepicker({
                    uiLibrary: 'bootstrap4'
                  });
                </script>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Select Operation :</label>
              <div class="col-sm-4">
                <input type="radio" id="supplyOps" name="supplyOps" value="add">Buy


              </div>
            </div>
            <div class="form-group">

              <label class="col-sm-4 control-label">Product Name :</label>
              <div class="col-sm-8">
                <input type="text" name="p_name" class="form-control" placeholder="Enter product name" required="required">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-4 control-label">Company :</label>
              <div class="col-sm-8">
                <select class="form-control" id="company" style=" height:35px;" name="company" onchange="myFunction(this.value)">
                  <option value=''>------- Select --------</option>
                  <?php
                  $query1  = "SELECT id, name from company";
                  $q1 = $conn->query($query1);
                  while ($row1 = $q1->fetch_assoc()) {
                  ?>
                    <option class="form-control" value="<?php echo $row1["name"] ?>"><?php echo $row1["name"] ?></option>
                  <?php  } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Quantity :</label>
              <div class="col-sm-8">
                <input type="number" id="banyak" name="banyak" class="form-control" placeholder="Enter product quantity" required="required">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Price :</label>
              <div class="col-sm-8">
                <input type="number" id="harga" name="harga" class="form-control" placeholder="Enter product price" required="required">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-4 control-label">Total Bayar :</label>
              <div class="col-sm-8">
                <input type="number" id="total" name="total" class="form-control" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-4 control-label"></label>
              <div class="col-sm-8">
                <input type="submit" name="submit" class="btn btn-success" value="Submit">
                <input type="reset" name="" class="btn btn-danger" value="Clear Fields">
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

  <!-- this modal is for MANAGING an Product Stock-->
  <div class="modal fade" id="manageStock" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->




      <div class="form-group">
        <label class="col-sm-4 control-label"></label>
        <div class="col-sm-8">
          <input type="submit" name="submit" class="btn btn-success" value="Submit">
          <input type="reset" name="" class="btn btn-danger" value="Clear Fields">
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
<script src="assets/jquery/supplyOps.js" type="text/javascript"></script>




<?php

include("last.php");

?>