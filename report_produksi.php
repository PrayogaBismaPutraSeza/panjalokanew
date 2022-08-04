<?php

include("first.php");



$query  = "SELECT * from deductions WHERE deduction_id='1'";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
}
?>
<?php

?>
<div id="page-inner">
  <div class="row">
    <div class="col-md-12">
      <h1 class="page-head-line">Toko</h1>
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
      
        
        <br><br>
        <div class="table-responsive">
          <form method="post" action="">
            <table class="table table-bordered table-hover table-condensed" id="myTable">
              <!-- <h3><b>Ordinance</b></h3> -->
              <thead>
                <tr class="info">
                <th>
                  <p align="center">Id</p>
                </th>
                <th>
                  <p align="center">Tanggal</p>
                </th>
                <th>
                  <p align="center">Nama Produk Jadi</p>
                </th>
                <th>
                  <p align="center">Pegawai 1</p>
                </th>
                <th>
                  <p align="center">Pegawai 2</p>
                </th>
                <th>
                  <p align="center">Bahan</p>
                </th>
                <th>
                  <p align="center">Jumlah Bahan Digunakan</p>
                </th>
                <th>
                  <p align="center">Bahan Bakar</p>
                </th>
                <th>
                  <p align="center">Hasil Jadi</p>
                </th>
                <th>
                  <p align="center">Hpp</p>
                </th>
                
                </tr>
              </thead>
              <tbody>
                <?php


                global $id;

                $query = "select * from produksi ORDER BY id asc";
                $q = $conn->query($query) or die($conn->error);;
                while ($row = $q->fetch_assoc()) {
                  $id     = $row['id'];
                  $p_name  = $row['p_name'];
                  $name1  = $row['name1'];
                  $name2  = $row['name2'];
                  date_default_timezone_set("Asia/Jakarta");
                  $given_date = date('D , d-M , Y', strtotime($row["given_date"]));
                  $stok = $row['stok'];
                  $bahan = $row['bahan'];
                  $jumbahan   = $row['jumbahan'];
                  $bhnbakar = $row['bhnbakar'];
                  $hpp   = $row['hpp'];
                ?>

                  <tr>
                    <td align="center"><?php echo $id ?></td>
                    <td align="center"><?php echo $given_date ?></td>
                    <td align="center"><?php echo $p_name ?></td>
                    <td align="center"><?php echo $name1 ?> </td>
                    <td align="center"><?php echo $name2 ?> </td>
                    <td align="center"><?php echo $bahan ?></td>
                    <td align="center"><?php echo $jumbahan ?> Kg</td>
                    <td align="center">Rp. <?php echo number_format($bhnbakar) ?></td>
                    <td align="center"><?php echo $stok ?> Kg</td>
                    <td align="center">Rp. <?php echo $hpp ?></td>
                    
                  </tr>

                <?php } ?>

              </tbody>

              <tr class="info">
                <th>
                  <p align="center">Id</p>
                </th>
                <th>
                  <p align="center">Tanggal</p>
                </th>
                <th>
                  <p align="center">Nama Produk Jadi</p>
                </th>
                <th>
                  <p align="center">Pegawai 1</p>
                </th>
                <th>
                  <p align="center">Pegawai 2</p>
                </th>
                <th>
                  <p align="center">Bahan</p>
                </th>
                <th>
                  <p align="center">Jumlah Bahan Digunakan</p>
                </th>
                <th>
                  <p align="center">Bahan Bakar</p>
                </th>
                <th>
                  <p align="center">Hasil Jadi</p>
                </th>
                <th>
                  <p align="center">Hpp</p>
                </th>
                
              </tr>
            </table>
          </form>
        </div>
      </fieldset>
    </form>
  </div>

  <!-- this modal is for ADDING an Product -->
  
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



<script>
    window.print();
</script>