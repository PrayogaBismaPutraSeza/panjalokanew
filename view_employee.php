<?php
include("first.php"); //include auth.php file on all secure pages



$id = $_REQUEST['emp_id'];

$query  = "SELECT * from employee where emp_id='" . $id . "'";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
  $name = $row['fname'] . ' ' . $row['lname'];
}
?>
<?php
include("php/headerEmployee.php");
?>
<div id="page-wrapper">
  <div id="page-inner">




    <div class="row">
      <div class="col-md-12">
        <h1 class="page-head-line"><?php echo $name; ?></h1>
        <h1 class="page-subhead-line">Selamat Datang di <strong><?php echo ' ' . $siteName ?></strong>
          <i class="icon-calendar icon-large"></i>


          <?php
          date_default_timezone_set("Asia/Jakarta");
          echo  date(" l, F d Y") . "<br>";

          ?>
        </h1>

      </div>
    </div>
    <?php
    $id = $_REQUEST['emp_id'];

    $query  = "SELECT * from employee where emp_id='" . $id . "'";
    $q = $conn->query($query);
    while ($row = $q->fetch_assoc()) {

    ?>

      <form class="form-horizontal" action="update_employee.php" method="post" name="form">
        <input type="hidden" name="new" value="1" />
        <input name="id" type="hidden" value="<?php echo $row['emp_id']; ?>" />

        <div class="form-group">
          <label class="col-sm-5 control-label">Nama Depan :</label>
          <div class="col-sm-4">
            <input type="text" name="fname" class="form-control" value="<?php echo $row['fname']; ?>" required="required">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-5 control-label">Nama Belakang :</label>
          <div class="col-sm-4">
            <input type="text" name="lname" class="form-control" value="<?php echo $row['lname']; ?>" required="required">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-5 control-label">Hp :</label>
          <div class="col-sm-4">
            <input type="text" name="mobile" class="form-control" value="<?php echo $row['mobileNo']; ?>" required="required">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-5 control-label">Jenis Kelamin :</label>
          <div class="col-sm-4">
            <select name="gender" class="form-control" required>
              <option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
              <option value="Pria">Pria</option>
              <option value="Wanita">Wanita</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-5 control-label">Tipe Pegawai :</label>
          <div class="col-sm-4">
            <select name="emp_type" class="form-control" required>
              <option value="<?php echo $row['emp_type']; ?>"><?php echo $row['emp_type']; ?></option>
              <option value="Tetap">Tetap</option>
              <option value="Freelance">Freelance</option>
              <option value="Kontrak">Kontrak</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-5 control-label">Departmen :</label>
          <div class="col-sm-4">
            <select name="division" class="form-control" placeholder="Division" required>
              <option value="<?php echo $row['division']; ?>"><?php echo $row['division']; ?></option>
              <option value="Admin">Admin</option>
              <option value="Human Resource">Human Resource</option>
              <option value="Gudang">Gudang</option>
              <option value="Engineering">Engineering</option>
              <option value="Produksi">Produksi</option>
              <option value="Supply">Supply</option>
              <option value="Maintenance">Maintenance</option>
              <option value="Control">Control</option>
              <option value="Lainnya">Lainnya</option>
            </select>
          </div>
        </div><br><br>

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