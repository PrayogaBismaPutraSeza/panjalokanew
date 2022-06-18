<?php
include("first.php"); //include auth.php file on all secure pages



$query  = "SELECT * from deductions WHERE deduction_id='1'";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
}
?>




<?php
$id = $_REQUEST['p_id'];

$query  = "SELECT * from product where p_id='" . $id . "'";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {

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

    <form class="form-horizontal" action="update_product.php" method="post" name="form">
      <input type="hidden" name="new" value="1" />
      <input name="p_id" type="hidden" value="<?php echo $row['p_id']; ?>" />

      <div class="form-group">
        <label class="col-sm-5 control-label">Product Name :</label>
        <div class="col-sm-4">
          <input type="text" name="p_name" class="form-control" value="<?php echo $row['p_name']; ?>" required="required">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-5 control-label">Company :</label>
        <div class="col-sm-4">
          <input type="text" name="company" class="form-control" value="<?php echo $row['p_company']; ?>" required="required">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Type :</label>
        <div class="col-sm-4">
          <input type="text" name="type" class="form-control" value="<?php echo $row['p_type']; ?>" required="required">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Quantity :</label>
        <div class="col-sm-4">
          <input type="text" name="quantity" class="form-control" value="<?php echo $row['p_quantity']; ?>" required="required">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Price :</label>
        <div class="col-sm-4">
          <input type="text" name="price" class="form-control" value="<?php echo $row['price']; ?>" required="required">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-5 control-label"></label>
        <div class="col-sm-4">
          <input type="submit" name="submit" value="Update" class="btn btn-warning">
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
  <?php
  include("last.php");
  ?>