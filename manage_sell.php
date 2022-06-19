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
        <h1 class="page-head-line">Product: <?php echo $row['p_name']; ?></h1>
        <h1 class="page-subhead-line">Welcome to <strong><?php echo ' ' . $siteName ?></strong> Today is:
          <i class="icon-calendar icon-large"></i>


          <?php
          date_default_timezone_set("Asia/Jakarta");
          echo  date(" l, F d, Y") . "<br>";

          ?>
        </h1>

      </div>
    </div>

    <form class="form-horizontal" id="sellProduct" action="add_sell.php" method="post" name="form">
      <input type="hidden" name="new" value="1" />
      <input name="p_id" type="hidden" value="<?php echo $row['p_id']; ?>" />

      <div class="form-group">
        <label class="col-sm-5 control-label">Product Name :</label>
        <div class="col-sm-4">
          <input type="text" name="p_name" class="form-control" value="<?php echo $row['p_name']; ?>" required="required">
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
        <label class="col-sm-5 control-label">Select Operation:</label>
        <div class="col-sm-4">
          <input type="radio" id="sell_operation" name="sell_operation" value="sub">Sell


        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Quantity :</label>
        <div class="col-sm-4">
          <input type="number" id="banyak" name="banyak" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Result :</label>
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
        <label class="col-sm-5 control-label"></label>
        <div class="col-sm-4">
          <input type="submit" name="submit" value="Sell" class="btn btn-warning">
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
  <?php
  include("last.php");
  ?>