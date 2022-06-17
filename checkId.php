

<?php


if(isset($_POST["g_id"]))
{
    include("db.php");


    $g_id = filter_var($_POST["g_id"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);

    $statement = $conn->prepare("SELECT g_id FROM compaygroup WHERE g_id= '".$g_id."'");
    $statement->bind_param('s', $g_id);
    $statement->execute();
    $statement->bind_result($g_id);
    if($statement->fetch()){
        die('<img src="img/close.png" />');
    }else{
        die('<img src="img/checked.png" />');
    }
}

?>
