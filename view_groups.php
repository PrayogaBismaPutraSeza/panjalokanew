<?php
include("first.php"); //include auth.php file on all secure pages



$query  = "SELECT * from deductions WHERE deduction_id='1'";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
}
?>

<?php
include("php/header.php");
?>
<div id="page-inner">
  <?php
  $s_id = $_REQUEST['s_id'];

  $id =


    $query  = "SELECT * from compaygroup where s_id='" . $s_id . "'";
  $q = $conn->query($query);
  while ($row = $q->fetch_assoc()) {

  ?>
    <div class="row">
      <div class="col-md-12">
        <?php
        $company_id = $row["id"];
        $query0  = "SELECT name from company where id = '" . $company_id . "'";
        $q0 = $conn->query($query0);
        $row0 = $q0->fetch_assoc();
        $company_name = $row0["name"];
        ?>
        <h1 class="page-head-line">Company: <?php echo ' ' . $company_name ?></h1>
        <h1 class="page-subhead-line">Welcome to <strong><?php echo ' ' . $siteName ?></strong> Today is:
          <i class="icon-calendar icon-large"></i>


          <?php
          date_default_timezone_set("Asia/Jakarta");
          echo  date(" l, F d, Y") . "<br>";

          ?>
        </h1>

      </div>
    </div>

    <form class="form-horizontal" action="update_group.php" method="post" name="form">
      <input type="hidden" name="new" value="1" />
      <input name="s_id" type="hidden" value="<?php echo $s_id ?>" />
      <div class="form-group">
        <label class="col-sm-5 control-label"></label>

      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Group ID :</label>
        <div class="col-sm-4">
          <input type="text" name="g_id" class="form-control" value="<?php echo $row['g_id']; ?>" required="required">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Group Name :</label>
        <div class="col-sm-4">
          <input type="text" name="g_name" class="form-control" value="<?php echo $row['g_name']; ?>" required="required">
        </div>
      </div>
      <br><br>

      <div class="form-group">
        <label class="col-sm-5 control-label"></label>
        <div class="col-sm-4">
          <input type="submit" name="submit" value="Update" class="btn btn-danger">
          <a href="home_employee.php" class="btn btn-primary">Cancel</a>
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


  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- <script src="assets/js/docs.min.js"></script> -->
  <script src="assets/js/search.js"></script>
  <script type="text/javascript" charset="utf-8" language="javascript" src="assets/js/dataTables.min.js"></script>

  <!-- FOR DataTable -->
  <script>
    {
      $(document).ready(function() {
        $('#myTable').DataTable();
      });
    }
  </script>

  <!-- this function is for modal -->
  <script>
    $(document).ready(function() {
      $("#myBtn").click(function() {
        $("#myModal").modal();
      });
    });
  </script>

  <?php include("last.php") ?>