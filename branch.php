<?php
include("db.php");
include("add_company.php");
$errormsg = '';
$action = "add";

$branch='';
$address='';
$detail = '';
$id= '';
if(isset($_POST['save']))
{

$branch = mysqli_real_escape_string($conn,$_POST['branch']);
$address = mysqli_real_escape_string($conn,$_POST['address']);
$detail = mysqli_real_escape_string($conn,$_POST['detail']);

 if($_POST['action']=="add")
 {

  $sql = $conn->query("INSERT INTO branch (branch,address,detail) VALUES ('$branch','$address','$detail')") ;

    echo '<script type="text/javascript">window.location="branch.php?act=1";</script>';

 }else
  if($_POST['action']=="update")
 {
 $id = mysqli_real_escape_string($conn,$_POST['id']);
   $sql = $conn->query("UPDATE  branch  SET  branch  = '$branch', address  = '$address', detail  = '$detail'  WHERE  id  = '$id'");
   echo '<script type="text/javascript">window.location="branch.php?act=2";</script>';
 }



}




if(isset($_GET['action']) && $_GET['action']=="delete"){

$conn->query("UPDATE  branch set delete_status = '1'  WHERE id='".$_GET['id']."'");
header("location: branch.php?act=3");

}


$action = "add";
if(isset($_GET['action']) && $_GET['action']=="edit" ){
$id = isset($_GET['id'])?mysqli_real_escape_string($conn,$_GET['id']):'';

$sqlEdit = $conn->query("SELECT * FROM branch WHERE id='".$id."'");
if($sqlEdit->num_rows)
{
$rowsEdit = $sqlEdit->fetch_assoc();
extract($rowsEdit);
$action = "update";
}else
{
$_GET['action']="";
}

}


if(isset($_REQUEST['act']) && @$_REQUEST['act']=="1")
{
$errormsg = "<div class='alert alert-success'><strong>Success!</strong> Branch Add successfully</div>";
}else if(isset($_REQUEST['act']) && @$_REQUEST['act']=="2")
{
$errormsg = "<div class='alert alert-success'><strong>Success!</strong> Branch Edit successfully</div>";
}
else if(isset($_REQUEST['act']) && @$_REQUEST['act']=="3")
{
$errormsg = "<div class='alert alert-success'><strong>Success!</strong> Branch Delete successfully</div>";
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online School Fees Payment System</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="css/custom.css" rel="stylesheet" />



    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

	 <script src="js/jquery-1.10.2.js"></script>



</head>
<?php
include("php/header.php");
?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Company
						<?php
						echo (isset($_GET['action']) && @$_GET['action']=="add" || @$_GET['action']=="edit")?
						' <a href="branch.php" data-toggle="modal" data-target="#addCompany" class="btn btn-primary btn-sm pull-right">Back <i class="glyphicon glyphicon-arrow-right"></i></a>':'
            <button type="button" data-toggle="modal" data-target="#addCompany" class="btn btn-primary btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i>Add </button>
                ';
						?>
						</h1>

<?php

echo $errormsg;
?>
                    </div>
                </div>



        <?php
		 if(isset($_GET['action']) && @$_GET['action']=="add" || @$_GET['action']=="edit")
		 {
		?>

			<script type="text/javascript" src="js/validation/jquery.validate.min.js"></script>
                <div class="row">

                    <div class="col-sm-8 col-sm-offset-2">
               <div class="panel panel-primary">
                        <div class="panel-heading">
                           <?php echo ($action=="add")? "Add Branch": "Edit Branch"; ?>
                        </div>
						<form action="branch.php" method="post" id="signupForm1" class="form-horizontal">
                        <div class="panel-body">




                          <div class="form-group">
                                          <label class="col-sm-4 control-label">Company Name</label>
                                          <div class="col-sm-8">
                                              <input type="text" name="name" class="form-control" placeholder="Company name" required="required">
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
                                              <input type="textarea" rows="4" cols="30" name="details" class="form-control" placeholder="Company Details" required="required">
                                          </div>
                                      </div>

						<div class="form-group">
								<div class="col-sm-8 col-sm-offset-2">
								<input type="hidden" name="id" value="<?php echo $id;?>">
								<input type="hidden" name="action" value="<?php echo $action;?>">

									<button type="submit" name="save" class="btn btn-primary">Save </button>
								</div>
							</div>





                         </div>
							</form>

                        </div>
                            </div>


                </div>




		<script type="text/javascript">


		$( document ).ready( function () {

			 if($("#signupForm1").length > 0)
         {
			$( "#signupForm1" ).validate( {
				rules: {
					branch: "required",
					address: "required"



				},
				messages: {
					company: "Please enter company name",
					address: "Please enter address"


				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					// Add `has-feedback` class to the parent div.form-group
					// in order to add icons to inputs
					element.parents( ".col-sm-10" ).addClass( "has-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}

					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !element.next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
					}
				},
				success: function ( label, element ) {
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !$( element ).next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-10" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-10" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
				}
			} );

			}

		} );
	</script>



		<?php
		}else{
		?>

		 <link href="css/datatable/datatable.css" rel="stylesheet" />




		<div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Company
                        </div>
                        <div class="masthead">

    </div>
    <div class="well bs-component">
        <form class="form-horizontal">
            <fieldset>
                <div class="alert alert-success" >
                    <i class="icon-calendar icon-large" ></i>


                    <?php
                    date_default_timezone_set("Asia/Dhaka");
                    echo  date("l, F d, Y") . "<br>";

                    ?>
                </div>
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




                            $query = "SELECT * from company WHERE delete_status ='0'";
                            $q = $conn->query($query);
                            while($row = $q->fetch_assoc())
                            {
                                $id     =$row['id'];
                                $name  =$row['name'];
                                $number  =$row['mobile'];
                                $address  =$row['address'];
                                $details   =$row['details'];

                                ?>

                                <tr>
                                   <input name="id" type="hidden" value="<?php echo $id?>" />
                                    <td align="center"><a href="view_company.php?id=<?php echo $row["id"]; ?>" title="Update"><?php echo $row['name'] ?></br><?php echo $row['mobile'] ?></a></td>
                                    <td align="center"><a href="view_company.php?id=<?php echo $row["id"]; ?>" title="Update"><?php echo $row['address'] ?></a></td>
                                    <td align="center"><a href="view_company.php?id=<?php echo $row["id"]; ?>" title="Update"><?php echo $row['details'] ?></a></td>
                                    <td align="center" width="200">
                                        <a class="btn btn-primary" href="view_groupList.php?id=<?php echo $row["id"]; ?>">Group List</a>
                                        <a class="btn btn-danger" href="deletecompany.php?id=<?php echo $row["id"]; ?>">Delete</a>
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
    <div class="modal fade" id="addCompany" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                    <h3 align="center"><b>Add Company</b></h3>
                </div>
                <div class="modal-body" style="padding:40px 50px;">

                    <form class="form-horizontal" action="#" name="form" method="post">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Company Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="name" class="form-control" placeholder="Company name" required="required">
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
                                <input type="textarea" rows="4" cols="30" name="details" class="form-control" placeholder="Company Details" required="required">
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
                    </div>

	<script src="js/dataTable/jquery.dataTables.min.js"></script>
     <script>
         $(document).ready(function () {
             $('#tSortable22').dataTable({
    "bPaginate": true,
    "bLengthChange": false,
    "bFilter": true,
    "bInfo": false,
    "bAutoWidth": true });

         });


    </script>

		<?php
		}
		?>



            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
       Rainbow English Classes | Developed By : <a href="http://www.codexking.com/" target="_blank">Codexking.com</a>
    </div>


    <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="js/custom1.js"></script>


</body>
</html>
