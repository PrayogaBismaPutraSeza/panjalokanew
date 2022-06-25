<?php
include("first.php"); //include auth.php file on all secure pages
include("add_sell.php");


$query  = "SELECT * from product WHERE p_id='1'";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
}
?>




<?php
$id = $_REQUEST['p_id'];

$query  = "SELECT * from product where p_id='" . $id . "'";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {

  $quantity = $row["stock"];

?>

  <?php
  include("php/header.php");
  ?>
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-head-line">Produk: <?php echo $row['p_name']; ?></h1>
        <h1 class="page-subhead-line">Selamat Datang di Sistem ERP<strong><?php echo ' ' . $siteName ?></strong>
          <i class="icon-calendar icon-large"></i>


          <?php
          date_default_timezone_set("Asia/Jakarta");
          echo  date(" l, F d Y") . "<br>";

          ?>
        </h1>

      </div>
    </div>

    <form class="form-horizontal" id="sellProduct" action="add_sell.php" method="post" name="form">
      <input type="hidden" name="new" value="1" />
      <input name="p_id" type="hidden" value="<?php echo $row['p_id']; ?>" />

      <div class="form-group">
        <label class="col-sm-5 control-label">Nama Produk :</label>
        <div class="col-sm-4">
          <input type="text" name="p_name" class="form-control" value="<?php echo $row['p_name']; ?>" required="required">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Tanggal :</label>
        <div class="col-sm-4">
          <input class="form-control" id="datepicker" placeholder="Pilih Tanggal" name="given_date" type="text" />
          <script>
            $('#datepicker').datepicker({
              uiLibrary: 'bootstrap4'
            });
          </script>
        </div>
      </div>
      <div class="form-group">
              <label class="col-sm-5 control-label">Customer :</label>
              <div class="col-sm-4">
                <select class="form-control" id="name" style=" height:35px;" name="name" onchange="myFunction(this.value)">
                  <option value=''>------- Pilih Customer --------</option>
                  <?php
                  $query1  = "SELECT id, name from customer where delete_status = '0'";
                  $q1 = $conn->query($query1);
                  while ($row1 = $q1->fetch_assoc()) {
                  ?>
                    <option class="form-control" value="<?php echo $row1["name"] ?>"><?php echo $row1["name"] ?></option>
                  <?php  } ?>
                </select>
              </div>
            </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Stok :</label>
        <div class="col-sm-4">
          <input type="number" id="stock_quantity" name="stock_quantity" class="form-control" value="<?php echo $row['stock']; ?>" required="required" readonly>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Harga :</label>
        <div class="col-sm-4">
          <input type="number" id="harga" name="harga" class="form-control" value="<?php echo $row['price']; ?>" required="required" readonly>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Pilih Operasi:</label>
        <div class="col-sm-4">
          <input type="radio" id="sell_operation" name="sell_operation" value="sub"> Jual


        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-5 control-label">Kuantitas :</label>
        <div class="col-sm-4">
          <input type="number" id="banyak" name="banyak" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Hasil :</label>
        <div class="col-sm-4">
          <input type="number" id="result" name="result" class="form-control" readonly>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Total Bayar :</label>
        <div class="col-sm-4">
          <input type="number" id="total" name="total" class="form-control" readonly>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Diskon :</label><a>%</a>
        <div class="col-sm-1">
          <input type="number" id="diskon" name="diskon" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Total Bayar Setelah Diskon:</label>
        <div class="col-sm-4">
          <input type="number" id="totalDis" name="totalDis" class="form-control" readonly> 
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label"></label>
        <div class="col-sm-4">
          <input type="submit" name="submit" value="Jual" class="btn btn-warning">
          <a href="home_store.php" class="btn btn-danger">Cancel</a>
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
  <script src="assets/jquery/sellOperation.js" type="text/javascript"></script>
  <script src="assets/jquery/discOps.js" type="text/javascript"></script>
  <?php
  include("last.php");
  ?>