<?php
include("first.php");
include("php/header.php");
?>
<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-subhead-line">Selamat Datang di Sistem ERP<strong><?php echo ' ' . $siteName ?></strong>
                <i class="icon-calendar icon-large"></i>

                <?php
                date_default_timezone_set("Asia/Jakarta");
                echo  date(" l, F d Y") . "<br>";

                ?>
            </h1>

        </div>
    </div>
    <!-- /. ROW  -->
    <?php
    include("main.php");
    ?>
    <!-- /. ROW  -->

    <?php

    include("last.php");

    ?>


    <script src="js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="js/custom1.js"></script>



    </body>

    </html>