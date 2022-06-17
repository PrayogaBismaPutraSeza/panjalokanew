<?php
  include("first.php"); //include auth.php file on all secure pages


?>




      <?php
        $sno=$_REQUEST['sno'];

      $query  = "SELECT * from transaction where sno='".$sno."'";
      $q = $conn->query($query);
      while($row = $q->fetch_assoc())
        {

          ?>

          <?php
          include("php/headerStore.php");
          ?>
                  <div id="page-wrapper">
                      <div id="page-inner">


          <div class="row">
              <div class="col-md-12">
                  <h1 class="page-head-line">Product: <?php echo $row['p_name']; ?></h1>
                  <h1 class="page-subhead-line">Welcome to <strong><?php echo ' '. $siteName ?></strong> Today is:
                  <i class="icon-calendar icon-large" ></i>


                  <?php
                  date_default_timezone_set("Asia/Jakarta");
                  echo  date(" l, F d, Y") . "<br>";

                  ?>
                   </h1>

              </div>
          </div>

              <form class="form-horizontal" action="update_transaction.php" method="post" name="form">
                <input type="hidden" name="new" value="1" />
                <input name="sno" type="hidden" value="<?php echo $sno;?>" />

                <div class="form-group">
                            <label class="col-sm-5 control-label">Date :</label>
                            <div class="col-sm-4">
                                <input class="form-control" id="datepicker" name="d_date" type="text" value = "<?php echo $row['t_date'];?>"/>
                                <script>
                                    $('#datepicker').datepicker({
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script>
                            </div>
                        </div>

                  <div class="form-group">
                    <label class="col-sm-5 control-label">Amount  :</label>
                    <div class="col-sm-4">
                      <input type="text" name="amount" class="form-control" value="<?php echo $row['amount'];?>" required="required">
                    </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-5 control-label">Cause  :</label>
                      <div class="col-sm-4">
                          <input type="text" name="cause" class="form-control" value="<?php echo $row['cause'];?>" required="required">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-5 control-label">Remark  :</label>
                      <div class="col-sm-4">
                          <input type="text" name="remark" class="form-control" value="<?php echo $row['remark'];?>" >
                      </div>
                  </div>
                 
                 

                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                      <input type="submit" name="submit" value="Update" class="btn btn-warning">
                      <a href="dailyTransactions.php" class="btn btn-danger">Cancel</a>
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
      $(document).ready(function()
      {
        $("#myBtn").click(function()
        {
          $("#myModal").modal();
        });
      });
    </script>
    <?php
  include("last.php");
  ?>
