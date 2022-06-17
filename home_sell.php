<?php

include("first.php");
include("add_sell.php");


$query  = "SELECT * from deductions WHERE deduction_id='1'";
$q = $conn->query($query);
while($row = $q->fetch_assoc())
  {
  }
?>
<?php
include("php/headerBill.php");
?>
        <div id="page-wrapper">
            <div id="page-inner">

<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line">My Store</h1>
        <h1 class="page-subhead-line">Welcome to <strong><?php echo ' '. $siteName ?></strong> Today is:
        <i class="icon-calendar icon-large" ></i>


        <?php
        date_default_timezone_set("Asia/Jakarta");
        echo  date(" l, F d, Y") . "<br>";

        ?>
         </h1>

    </div>
</div>

          <div class="well bs-component">
            <form class="form-horizontal">
              <fieldset>

                <button type="button" data-toggle="modal" data-target="#sellProduct" class="btn btn-success">Add Sell Product</button>
                <br><br>
                <div class="table-responsive">
                  <form method="post" action="" >
                    <table class="table table-bordered table-hover table-condensed" id="myTable">
                      <!-- <h3><b>Ordinance</b></h3> -->
                      <thead>
                        <tr class="info">
                          <th><p align="center">Id/Name</p></th> 
                          <th><p align="center">Quantity</p></th>
                            <th><p align="center">Price</p></th>
                            <th><p align="center">Stock</p></th>
                            <th><p align="center">Total</p></th>
                          <th><p align="center">Action</p></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        global $s_id;

                        
                        $query = "select * from sell where delete_status = '0' ORDER BY s_id asc ";
                        $q = $conn->query($query);
                        while($row = $q->fetch_assoc())
                          {
                            $s_id  =$row['s_id'];
                            $nama  =$row['nama'];
                            $banyak  =$row['banyak'];
                            $harga  =$row['harga'];
                            $stok = $row['stok'];
                            $total_bayar = $row['total_bayar'];

                        ?>

                        <tr>
                          <td align="center"><a href="view_sell.php?s_id=<?php echo $row["s_id"]; ?>" title="Update"><?php echo $s_id?>/  <?php echo $nama ?></a></td>
                          <td align="center"><a href="view_sell.php?s_id=<?php echo $row["s_id"]; ?>" title="Update"><?php echo $banyak?></a></td>
                            <td align="center"><a href="view_sell.php?s_id=<?php echo $row["s_id"]; ?>" title="Update"><?php echo $harga ?></a></td>
                            <td align="center"><a href="view_sell.php?s_id=<?php echo $row["s_id"]; ?>" title="Update"><?php echo $stok ?></a></td>
                            <td align="center"><a href="view_sell.php?s_id=<?php echo $row["s_id"]; ?>" title="Update"><?php echo $total_bayar ?> Ps</a></td>

                          <td align="center">
                            <a class="btn btn-warning" href="view_sell.php?s_id=<?php echo $row["s_id"]; ?>">Edit</a>
                            <a class="btn btn-danger" href="delete_sell.php?s_id=<?php echo $row["s_id"]; ?>">Delete</a>

                          </td>
                        </tr>

                        <?php } ?>
                      </tbody>

                        <tr class="info">
                          <th><p align="center">Id/Name</p></th>
                          <th><p align="center">Quantity</p></th>
                            <th><p align="center">Price</p></th>
                            <th><p align="center">Stock</p></th>
                            <th><p align="center">Total</p></th>
                          <th><p align="center">Action</p></th>
                        </tr>
                    </table>
                  </form>
                </div>
              </fieldset>
            </form>
          </div>

      <!-- this modal is for ADDING an Product -->
      <div class="modal fade" id="sellProduct" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>

                <input type="hidden" name="s_id" value="<?php echo $s_id; ?>" class="form-control" >
              <h3 align="center"><b>Sell Product</b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="#" name="form" method="post">
                <div class="form-group">
                              <label class="col-sm-4 control-label">Product :</label>
                              <div class="col-sm-8">
                                <select  class="form-control" s_id="p_id" style=" height:35px;" nama="p_name" onchange="myFunction(this.value)">
                                  <option value=''>------- Select --------</option>
                                  <?php
                                  $query1  = "SELECT p_id, p_name from product";
                                  $q1 = $conn->query($query1);
                                  while($row1 = $q1->fetch_assoc())
                                  {
                                  ?>
                                    <option class="form-control" value = "<?php echo $row1["p_id"] ?>"><?php echo $row1["p_name"] ?></option>
                                    <?php  }?>
                                </select>
                              </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-4 control-label">Quantity :</label>
                              <div class="col-sm-8">
                                <select  class="form-control" s_id="p_id" style=" height:35px;" banyak="p_quantity" onchange="myFunction(this.value)">
                                  <option value=''>------- Select --------</option>
                                  <?php
                                  $query1  = "SELECT p_id, p_quantity from product";
                                  $q1 = $conn->query($query1);
                                  while($row1 = $q1->fetch_assoc())
                                  {
                                  ?>
                                    <option class="form-control" value = "<?php echo $row1["p_id"] ?>"><?php echo $row1["p_quantity"] ?></option>
                                    <?php  }?>
                                </select>
                              </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-4 control-label">Harga :</label>
                      <div class="col-sm-8">
                          <input type="number" name="harga" class="form-control" placeholder="Enter product price" required="required">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-4 control-label">stok :</label>
                      <div class="col-sm-8">
                          <input type="number" name="stok" class="form-control" placeholder="Enter stock Quantity" required="required">
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
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center"><b>Add Product</b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="#" name="form" method="post">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Product :</label>
                    <div class="col-sm-8">
                        <select  class="form-control" id="product" style=" height:35px;" name="product" onchange="myFunction(this.value)">
                            <option value=''>------- Select --------</option>
                                <?php
                                $query1  = "SELECT p_id, name from product";
                                $q1 = $conn->query($query1);
                                while($row1 = $q1->fetch_assoc())
                                {
                                ?>
                                    <option class="form-control" value = "<?php echo $row1["p_id"] ?>"><?php echo $row1["p_name"] ?></option>
                                <?php  }?>
                        </select>
                 </div>

                  <div class="form-group">
                      <label class="col-sm-4 control-label">Quantity :</label>
                      <div class="col-sm-8">
                          <input type="number" name="quantity" class="form-control" placeholder="Enter product stock quantity" required="required">
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
      $(document).ready(function()
      {
        $("#myBtn").click(function()
        {
          $("#myModal").modal();
        });
      });
    </script>




        <?php

        include ("last.php");

        ?>
