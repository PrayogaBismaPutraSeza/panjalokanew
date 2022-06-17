
<?php
include("first.php");
include("add_companyGroup.php");


// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
global $billsno;

if ($_SERVER["REQUEST_METHOD"] == "POST") {


  if (empty($_POST["payMethod"])) {
    $genderErr = "Select a Payment Method to pay";
  } else {
    $gender = test_input($_POST["payMethod"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
global $id;
$id = $_REQUEST['id'];



  $query0  = "SELECT name from company where id = '".$id."'";
  $q0 = $conn->query($query0);
  $row0 = $q0->fetch_assoc();
  $company_name = $row0["name"];

?>

<?php
include("php/headerCompany.php");
?>
        <div id="page-wrapper">
            <div id="page-inner">




<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line">Company: <?php echo ' '. $company_name ?></h1>
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
        <form class="form-horizontal" action="add_companyGroup.php" method="post" name="form">
          <fieldset>

                      <div class="alert alert-success" >
                          <i class="icon-calendar icon-large" ></i>


                          <?php
                          date_default_timezone_set("Asia/Dhaka");
                          echo  date("l, F d, Y") . "<br>";

                          ?>
                      </div>

                        <button type="button" data-toggle="modal" data-target="#addCompanyGroup" class="btn btn-success">Add New Company Group</button>
                        <a class="btn btn-info" href="home_company.php">Back</a>
                          <br><br>
                          <div class="table-responsive">
                              <form method="post" action="" >

                        <table class="table table-bordered table-hover table-condensed" id="myTable">
                            <!-- <h3><b>Ordinance</b></h3> -->
                            <thead>
                            <tr class="info">
                              <th><p align="center">SN</p></th>
                              <th><p align="center">Group ID</p></th>
                              <th><p align="center">Name</p></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            global $sn;
                            $sn = 0;
                            $query  = "SELECT * from compaygroup where id = '".$id."'";
                            $q = $conn->query($query);
                            while($row = $q->fetch_assoc())
                            {
                              $s_id = $row["s_id"];
                              $sn++;

                              $g_id = $row["g_id"];
                              $g_name = $row["g_name"];




                                ?>
                                <tr>
                                    <td align="center"><a href="view_groups.php?s_id=<?php echo $s_id ?>" title="Update"><?php echo $sn?></td>
                                    <td align="center"><a href="view_groups.php?s_id=<?php echo $s_id ?>" title="Update"><?php echo $g_id?></td>
                                    <td align="center"><a href="view_groups.php?s_id=<?php echo $s_id ?>" title="Update"><?php echo $g_name?></td>



                                </tr>
                            <?php } ?>
                            </tbody>

                            <tr class="info">
                              <th><p align="center">SN</p></th>
                              <th><p align="center">Group ID</p></th>
                              <th><p align="center">Name</p></th>
                            </tr>
                        </table>
                      </form>
                  </div>



          </fieldset>
        </form>
</div>
        <!-- this modal is for ADDING an Company Group -->
        <div class="modal fade" id="addCompanyGroup" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="padding:20px 50px;">
                        <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                        <h3 align="center"><b>Add Company Group</b></h3>
                    </div>
                    <div class="modal-body" style="padding:40px 50px;">

                        <form class="form-horizontal" action="#" name="form" method="post">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Company :</label>
                                <div class="col-sm-8">
                                  <select  class="form-control" id="company" style=" height:35px;" name="company" onchange="myFunction(this.value)">
                                    <option value=''>------- Select --------</option>
                                    <?php
                                    $query1  = "SELECT id, name from company where id='".$id."'";
                                    $q1 = $conn->query($query1);
                                    while($row1 = $q1->fetch_assoc())
                                    {
                                    ?>
                                      <option class="form-control" value = "<?php echo $row1["id"] ?>"><?php echo $row1["name"] ?></option>
                                      <?php  }?>
                                  </select>
                                </div>
                            </div>
                            <div class="form-group">


                                <label class="col-sm-4 control-label" for="g_id">Group ID :</label>
                                <div class="col-sm-8">
                                    <input type="number" rows="4" cols="50" id="g_id" name="g_id" class="form-control" placeholder="Enter Group ID(EX: any number)" required="required">
                                    <span id="id-result"></span>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Group Name :</label>
                                <div class="col-sm-8">
                                    <input type="text" name="g_name" class="form-control" placeholder="Enter New Group Name" required="required">
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
        $(document).ready(function()
        {
            $('#myTable').DataTable();
        });
    }
</script>

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
</br>


<?php
include ("last.php");

?>
