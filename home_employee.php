<?php

include("first.php");
include("add_employee.php");


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
      <h1 class="page-head-line">Pegawai</h1>
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

        <button type="button" data-toggle="modal" data-target="#addEmployee" class="btn btn-success">Tambah Pegawai Baru</button>
        <br><br>
        <div class="table-responsive">
          <form method="post" action="">
            <table class="table table-bordered table-hover table-condensed" id="myTable">
              <!-- <h3><b>Ordinance</b></h3> -->
              <thead>
                <tr class="info">
                  <th>
                    <p align="center">Nama/No Hp</p>
                  </th>
                  <th>
                    <p align="center">Jenis Kelamin</p>
                  </th>
                  <th>
                    <p align="center">Divisi</p>
                  </th>
                  <th>
                    <p align="center">Tarif Gaji</p>
                  </th>
                  <th>
                    <p align="center">Aksi</p>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php


                global $emp_id;

                $query = "select * from employee ORDER BY emp_id asc";
                $q = $conn->query($query);
                while ($row = $q->fetch_assoc()) {
                  $id     = $row['emp_id'];
                  $emp_id = $id;
                  $fname  = $row['fname'];
                  $lname  = $row['lname'];
                  $mobile  = $row['mobileNo'];
                  $gender = $row['gender'];
                  $division = $row['division'];
                  $emp_type   = $row['emp_type'];
                ?>

                  <tr>
                    <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['fname'] ?> <?php echo $row['lname'] ?></br><?php echo $row['mobileNo'] ?></a></td>
                    <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['gender'] ?></a></td>
                    <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['division'] ?></a></td>
                    <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['salary'] ?></a></td>

                    <td align="center">
                      <a class="btn btn-warning" href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>">Edit</a>
                      <a class="btn btn-danger" href="delete.php?emp_id=<?php echo $row["emp_id"]; ?>">Hapus</a>
                    </td>
                  </tr>

                <?php } ?>
              </tbody>

              <tr class="info">
                  <th>
                    <p align="center">Nama/No Hp</p>
                  </th>
                  <th>
                    <p align="center">Jenis Kelamin</p>
                  </th>
                  <th>
                    <p align="center">Divisi</p>
                  </th>
                  <th>
                    <p align="center">Tarif Gaji</p>
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

  <!-- this modal is for ADDING an EMPLOYEE -->
  <div class="modal fade" id="addEmployee" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:20px 50px;">
          <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>


          <h3 align="center"><b>Tambah Pegawai</b></h3>
        </div>
        <div class="modal-body" style="padding:40px 50px;">

          <form class="form-horizontal" action="#" name="form" method="post">
            <div class="form-group">
              <input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>">
              <label class="col-sm-4 control-label">Nama Depan</label>
              <div class="col-sm-8">
                <input type="text" name="fname" class="form-control" placeholder="Nama Depan" required="required">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Nama Belakang</label>
              <div class="col-sm-8">
                <input type="text" name="lname" class="form-control" placeholder="Nama Belakang" required="required">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-4 control-label">No Hp</label>
              <div class="col-sm-8">
                <input type="text" name="mobile" class="form-control" placeholder="Masukkan nomor Hp" required="required">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Jenis Kelamin</label>
              <div class="col-sm-8">
                <select name="gender" class="form-control" placeholder="Jenis Kelamin" required>
                  <option value="">Jenis Kelamin</option>
                  <option value="Pria">Pria</option>
                  <option value="Wanita">Wanita</option>
                </select>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-4 control-label">Divisi</label>
              <div class="col-sm-8">
                <select name="division" class="form-control" placeholder="Divisi" required>
                  <option value="">Divisi</option>
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
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Tarif Gaji</label>
              <div class="col-sm-8">
                <input type="text" name="salary_rate" class="form-control" placeholder="Masukkan Gaji" required="required">
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