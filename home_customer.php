

<?php
include("first.php");
include("add_customer.php");



?>
<?php
include("php/headerCustomer.php");
?>
        <div id="page-wrapper">
            <div id="page-inner">


<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line">Customer</h1>
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
                <button type="button" data-toggle="modal" data-target="#addCustomer" class="btn btn-success">Add New Customer</button>
                <p align="center"><big><b>List of Customer</b></big></p>
                <div class="table-responsive">
                    <form method="post" action="" >

                        <table class="table table-bordered table-hover table-condensed" id="myTable">
                            <!-- <h3><b>Ordinance</b></h3> -->
                            <thead>
                            <tr class="info">
                                <th><p align="center">Name/Number</p></th>
                                <th><p align="center">Address</p></th>
                                <th><p align="center">details</p></th>
                                <th><p align="center">Action</p></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php




                            $query = "SELECT * from customer WHERE delete_status ='0'";
                            $q = $conn->query($query);
                            while($row = $q->fetch_assoc())
                            {
                                $id     =$row['id'];
                                $name  =$row['name'];
                                $number  =$row['mobile'];
                                $address  =$row['address'];
                                $detail   =$row['details'];

                                ?>

                                <tr>
                                   <input name="id" type="hidden" value="<?php echo $id?>" />
                                    <td align="center"><a href="view_customer.php?id=<?php echo $row["id"]; ?>" title="Update"><?php echo $row['name'] ?></br><?php echo $row['mobile'] ?></a></td>
                                    <td align="center"><a href="view_customer.php?id=<?php echo $row["id"]; ?>" title="Update"><?php echo $row['address'] ?></a></td>
                                    <td align="center"><a href="view_customer.php?id=<?php echo $row["id"]; ?>" title="Update"><?php echo $row['details'] ?></a></td>
                                    <td align="center" width="200">
                                        <a class="btn btn-primary" href="view_groupList.php?id=<?php echo $row["id"]; ?>">Group List</a>
                                        <a class="btn btn-danger" href="deletecustomer.php?id=<?php echo $row["id"]; ?>">Delete</a>
                                    </td>
                                </tr>

                            <?php } ?>
                            </tbody>

                            <tr class="info">
                                <th><p align="center">Name/Number</p></th>
                                <th><p align="center">Address</p></th>
                                <th><p align="center">details</p></th>
                                <th><p align="center">Action</p></th>
                            </tr>
                        </table>
                    </form>
                </div>
            </fieldset>
        </form>
    </div>

    <!-- this modal is for ADDING an Company -->
    <div class="modal fade" id="addCustomer" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                    <h3 align="center"><b>Add Customer</b></h3>
                </div>
                <div class="modal-body" style="padding:40px 50px;">

                    <form class="form-horizontal" action="#" name="form" method="post">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Customer Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="name" class="form-control" placeholder="Customer Name" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Address</label>
                            <div class="col-sm-8">
                                <input type="textarea" rows="4" cols="50" name="address" class="form-control" placeholder="Address" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Mobile</label>
                            <div class="col-sm-8">
                                <input type="text" name="mobile" class="form-control" placeholder="Mobile No" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Details</label>
                            <div class="col-sm-8">
                                <input type="textarea" rows="4" cols="30" name="details" class="form-control" placeholder="Customer Details" required="required">
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
<script type="text/javascript">
        $(document).ready( function() {
            $('.btn-danger').click( function() {
                var id = $(this).attr("id");
                if(confirm("Are you sure you want to delete this Data?")){
                    $.ajax({
                        type: "POST",
                        url: "deletecompany.php",
                        data: ({id: id}),
                        cache: false,
                        success: function(html){
                        $(".del"+id).fadeOut('slow');
                        }
                    });
                }else{
                    return false;}
            });
        });
    </script>

</html>
<?php

include ("last.php");

?>
