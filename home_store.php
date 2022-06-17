<?php

include("first.php");
include("add_product.php");


$query  = "SELECT * from deductions WHERE deduction_id='1'";
$q = $conn->query($query);
while($row = $q->fetch_assoc())
  {
  }
?>
<?php
include("php/headerStore.php");
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

                <button type="button" data-toggle="modal" data-target="#addProduct" class="btn btn-success">Add New Product</button>
                <br><br>
                <div class="table-responsive">
                  <form method="post" action="" >
                    <table class="table table-bordered table-hover table-condensed" id="myTable">
                      <!-- <h3><b>Ordinance</b></h3> -->
                      <thead>
                        <tr class="info">
                          <th><p align="center">Id/Name</p></th>
                          <th><p align="center">Company</p></th>
                          <th><p align="center">Type</p></th>
                          <th><p align="center">Quantity</p></th>
                            <th><p align="center">Price</p></th>
                            <th><p align="center">Stock</p></th>
                          <th><p align="center">Action</p></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        global $p_id;


                          $query = "select * from product where delete_status = '0' ORDER BY p_id asc ";
                        $q = $conn->query($query);
                        while($row = $q->fetch_assoc())
                          {
                            $p_id     =$row['p_id'];
                            $p_name  =$row['p_name'];
                            $company =$row['p_company'];
                            $type   =$row['p_type'];
                            $quantity  =$row['p_quantity'];
                            $price  =$row['price'];
                            $stock = $row['stock'];

                        ?>

                        <tr>
                          <td align="center"><a href="view_product.php?p_id=<?php echo $row["p_id"]; ?>" title="Update"><?php echo $p_id?>/  <?php echo $p_name ?></a></td>
                          <td align="center"><a href="view_product.php?p_id=<?php echo $row["p_id"]; ?>" title="Update"><?php echo $company ?></a></td>
                          <td align="center"><a href="view_product.php?p_id=<?php echo $row["p_id"]; ?>" title="Update"><?php echo $type?></a></td>
                          <td align="center"><a href="view_product.php?p_id=<?php echo $row["p_id"]; ?>" title="Update"><?php echo $quantity?></a></td>
                            <td align="center"><a href="view_product.php?p_id=<?php echo $row["p_id"]; ?>" title="Update"><?php echo $price ?></a></td>
                            <td align="center"><a href="manage_product_quantity.php?p_id=<?php echo $row["p_id"]; ?>" title="Update"><?php echo $stock ?> Ps</a></td>

                          <td align="center">
                            <a class="btn btn-warning" href="manage_product_quantity.php?p_id=<?php echo $row["p_id"]; ?>">Manage</a>
                            <a class="btn btn-danger" href="delete_product.php?p_id=<?php echo $row["p_id"]; ?>">Delete</a>

                          </td>
                        </tr>

                        <?php } ?>
                      </tbody>

                        <tr class="info">
                          <th><p align="center">Id/Name</p></th>
                          <th><p align="center">Company</p></th>
                          <th><p align="center">Type</p></th>
                          <th><p align="center">Quantity</p></th>
                            <th><p align="center">Price</p></th>
                            <th><p align="center">Stock</p></th>
                          <th><p align="center">Action</p></th>
                        </tr>
                    </table>
                  </form>
                </div>
              </fieldset>
            </form>
          </div>

      <!-- this modal is for ADDING an Product -->
      <div class="modal fade" id="addProduct" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>

                <input type="hidden" name="p_id" value="<?php echo $p_id; ?>" class="form-control" >
              <h3 align="center"><b>Add Product</b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="#" name="form" method="post">
                <div class="form-group">
                  <label class="col-sm-4 control-label">Product Name :</label>
                  <div class="col-sm-8">
                    <input type="text" name="pname" class="form-control" placeholder="Enter product name" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Company :</label>
                  <div class="col-sm-8">
                    <input type="text" name="company" class="form-control" placeholder="Enter company name" required="required">
                  </div>
                </div>
                  <div class="form-group">
                      <label class="col-sm-4 control-label">Product Type :</label>
                      <div class="col-sm-8">
                          <input type="text" name="type" class="form-control" placeholder="Enter product type" required="required">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-4 control-label">Product Qunatity :</label>
                      <div class="col-sm-8">
                          <input type="text" name="quantity" class="form-control" placeholder="Enter product quantity" required="required">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-4 control-label">Price :</label>
                      <div class="col-sm-8">
                          <input type="number" name="price" class="form-control" placeholder="Enter product price" required="required">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-4 control-label">Stock :</label>
                      <div class="col-sm-8">
                          <input type="number" name="stock" class="form-control" placeholder="Enter stock Quantity" required="required">
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
                  <label class="col-sm-4 control-label">Product Name :</label>
                  <div class="col-sm-8">
                    <input type="text" name="pname" class="form-control" value="<?php echo $p_id; ?>" required="required" readonly>
                  </div>
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
