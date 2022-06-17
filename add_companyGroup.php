
<?php

?>

<?php

if(isset($_POST['submit'])!="")
{
    $company_id     = $_POST['company'];
    $g_id      = $_POST['g_id'];
    $g_name    = $_POST['g_name'];

    $query1  = "SELECT * from compaygroup where id = '".$company_id."' AND g_id = '".$g_id."'";
    $q1 = $conn->query($query1);


      if($row1 = $q1->fetch_assoc()){
        ?>
        <script>
            alert('Group ID already exits.');
            window.location.href='home_company.php?page=company_list';
        </script>
        <?php

      }
      else{
        $sql = $conn->query("INSERT into compaygroup(id, g_id, g_name)VALUES('$company_id','$g_id','$g_name')");

        if($sql)
        {
            ?>
            <script>
                alert('Company Group has been successfully added.');
                window.location.href='home_company.php?page=company_list';
            </script>
            <?php
        }

        else
        {
            ?>
            <script>
                alert('Invalid.');
                window.location.href='home_company.php?page=company_list';
            </script>
            <?php
        }

      }




}
?>
