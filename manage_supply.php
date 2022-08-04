<?php
include("first.php"); //include auth.php file on all secure pages



$query  = "SELECT * from buy WHERE b_id='1'";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
}
?>




<?php
$id = $_REQUEST['p_id'];

$query  = "SELECT * from buy where b_id='" . $id . "'";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {

  $quantity = $row["banyak"];

?>

  <?php
  include("php/header.php");
  ?>
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-head-line">Produksi: <?php echo $row['p_name']; ?></h1>
        <h1 class="page-subhead-line">Welcome to <strong><?php echo ' ' . $siteName ?></strong> Today is:
          <i class="icon-calendar icon-large"></i>


          <?php
          date_default_timezone_set("Asia/Jakarta");
          echo  date(" l, F d, Y") . "<br>";

          ?>
        </h1>

      </div>
    </div>


    <form class="form-horizontal" action="add_produksi.php" method="post" name="form">
      <input type="hidden" name="new" value="1" />
      <input name="b_id" type="hidden" value="<?php echo $row['b_id']; ?>" />

      <div class="form-group">
        <label class="col-sm-5 control-label">Nama Bahan :</label>
        <div class="col-sm-4">
          <input type="text" name="bahan" class="form-control" value="<?php echo $row['p_name']; ?>" required="required" readonly>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Harga Bahan :</label>
        <div class="col-sm-4">
          <input type="text" id="harga" name="harga" class="form-control" value="<?php echo number_format($row['harga']); ?>" required="required" readonly>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-5 control-label">Nama Produk Jadi :</label>
        <div class="col-sm-4">
          <select class="form-control" id="produk" style=" height:35px;" name="produk" onchange="myFunction(this.value)">
            <option value=''>------- Pilih Produk --------</option>
            <?php
            $query1  = "SELECT idproduk, nama_produk from produk";
            $q1 = $conn->query($query1);
            while ($row1 = $q1->fetch_assoc()) {
            ?>
              <option class="form-control" value="<?php echo $row1["idproduk"] ?> <?php echo $row1["nama_produk"] ?> "><?php echo $row1["nama_produk"] ?> </option>
            <?php  } ?>
          </select>
        </div>
      </div>

      <form class="form-horizontal" action="#" name="form" method="post">
        <div class="form-group">
          <label class="col-sm-5 control-label">Tanggal :</label>
          <div class="col-sm-4">
            <input class="form-control" id="datepicker" placeholder="Pilih Tanggal" name="given_date" type="text" required="required" readonly />
            <script>
              $('#datepicker').datepicker({
                format: 'mm/dd/yyyy',
                uiLibrary: 'bootstrap4'
              }).datepicker("setDate", 'now');
            </script>
          </div>
        </div>

        <div class="form-group" name="pegawai_form">
          <label class="col-sm-5 control-label">Pegawai 1:</label>
          <div class="col-sm-4">
            <select class="form-control" id="name" style=" height:35px;" name="name" onchange="myFunction(this.value)">
              <option value=''>------- Pilih Pegawai --------</option>
              <?php
              $query1  = "SELECT emp_id, fname, lname,salary from employee where delete_status = '0'AND emp_type = 'freelance' AND division = 'produksi'";
              $q1 = $conn->query($query1);
              while ($row1 = $q1->fetch_assoc()) {
              ?>
                <option class="form-control" name="emp_id1" value="<?php echo $row1["emp_id"] ?> <?php echo $row1["fname"] ?> <?php echo $row1["lname"] ?>"><?php echo $row1["emp_id"] ?> . <?php echo $row1["fname"] ?> <?php echo $row1["lname"] ?></option>
              <?php  } ?>
            </select>
          </div>
        </div>
        <div class="form-group">

          <div class="form-group" name="pegawai_form">
            <label class="col-sm-5 control-label">Pegawai 2:</label>
            <div class="col-sm-4">
              <select class="form-control" id="name2" style=" height:35px;" name="name2" onchange="myFunction(this.value)">
                <option value=''>------- Pilih Pegawai --------</option>
                <?php
                $query2  = "SELECT emp_id, fname, lname from employee where delete_status = '0' AND emp_type = 'freelance'";
                $q2 = $conn->query($query1);
                while ($row2 = $q2->fetch_assoc()) {
                ?>
                  <option class="form-control" name="emp_id2" value="<?php echo $row2["emp_id"] ?> <?php echo $row2["fname"] ?> <?php echo $row2["lname"] ?>"><?php echo $row2["emp_id"] ?> . <?php echo $row2["fname"] ?> <?php echo $row2["lname"] ?></option>
                <?php  } ?>
              </select>
            </div>
          </div>
          <div class="form-group">

            <div class="form-group">
              <label class="col-sm-5 control-label">Quantity :</label>
              <div class="col-sm-4">
                <input type="number" id="banyak" name="banyak" class="form-control" value="<?php echo $row['banyak']; ?>" required="required" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-5 control-label">Select Operation:</label>
              <div class="col-sm-4">
                <input type="radio" id="stock_operation" name="stock_operation" value="sub">Pakai


              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-5 control-label">Ket :</label>
              <div class="col-sm-4">
                <a class="btn-danger">*150kg/day</a>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-5 control-label">Value :</label>
              <div class="col-sm-4">
                <input type="number" id="operation_value" name="operation_value" value='0' class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-5 control-label">Sisa Bahan :</label>
              <div class="col-sm-4">
                <input type="number" id="result" name="result" class="form-control" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-5 control-label">Stok Produk Jadi :</label>
              <div class="col-sm-4">
                <input type="number" id="stok" name="stok" class="form-control" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-5 control-label">HPP :</label>
              <div class="col-sm-4">
                <input type="number" id="hpp" name="hpp" class="form-control" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-5 control-label">HPP /Kg:</label>
              <div class="col-sm-4">
                <input type="number" id="hppKg" name="hppKg" class="form-control" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-5 control-label"></label>
              <div class="col-sm-4">
                <input type="submit" name="submit" value="Produksi" class="btn btn-warning">
                <a href="home_supply.php" class="btn btn-danger">Cancel</a>
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
  <script src="assets/jquery/supOps2.js" type="text/javascript"></script>
  <?php
  include("last.php");
  ?>