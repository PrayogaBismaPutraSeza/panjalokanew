
<?php
  include("login.php"); //include auth.php file on all secure pages
  include("php/dbconnect.php"); 

?>


<html>
<head>
</head>
<body>
<form action=""  method="POST">
Your Email:<br /><input type="text" name="email = size="30"/><br/>
<input type = "submit" name="submit" value="Submit" />
</form>
<?php
$email =$_POST['email'];
$submit =$_POST['submit'];


//connect to the db

$connect = mysql_connect("localhost","msjahidprinters_payrollN","M59RZHM2BC2544");
mysql_select_db("forgot",$connect);

 if($submit){
 
 $email_check = mysql_query("SELECT = FORM user WHERE email='".$email."');
 $count = mysql_num_rows($email_check);
 
 if($count ! =0){
 
 //generated a new password
 $random = rand(72891,92729)
 $new_password = $random;
 
 // create a copy of the new password
 $email_password =$new_password;
 
 //encrypt the new password
 $new_password = md5($new_password);
 
 
 //update the db
 my_query(update users set password='".$new_password."' WHERE email ='".$email."');
 
 //send the password to the user
 $subject = ("Login Information");
 $message= "Your passwoerd has been change to $email_password ";
 $from = "From: riabir69@gmail.com";
 mail($email,$subject,$message,$from);
 echo"Your new passwoerd has been emailed to you.";
 
 }
 
else {
echo "This email does not exist.";
}

}
?>
</body>
</html>