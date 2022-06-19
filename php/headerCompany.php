<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Panjala Grup</a>
            </div>

        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <!-- <div class="user-img-div">
                            <img src="img/user.png" class="img-thumbnail" />

                            <div class="inner-text">
                                <?php echo $_SESSION['rainbow_name']; ?>
                            <br />

                            </div>
                        </div> -->

                    </li>


                    <li>
                        <a href="index.php"><i class="fas fa-columns "></i>Dashboard</a>
                    </li>

                    <li>
                        <a class="active-menu" href="home_company.php"><i class="fa fa-university "></i>Supplier</a>
                    </li>

                    <li>
                        <a href="home_customer.php"><i class="fa fa-user "></i>Customer</a>
                    </li>

                    <li class="dropdown">
                        <a><i class="fa fa-users "></i>Human Resource</a>
                        <ul class="nav">
                            <li>
                                <a href="home_employee.php"><i class="fa fa-users "></i>Pegawai</a>
                            </li>
                            <li>
                                <a href="home_salaryRegular.php"><i class="fa fa-money "></i>Gaji</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="home_store.php"><i class="fa fa-box "></i>Produk</a>
                    </li>

                    <li>
                        <a href="home_payment.php"><i class="fa fa-inr "></i>Payment</a>
                    </li>
                    <li>
                        <a href="home_report.php"><i class="fa fa-inr "></i>Laporan</a>
                    </li>
                    <li>
                        <a href="home_sell.php"><i class="fa fa-file-text "></i>Sell </a>
                    </li>



                    <li>
                        <a href="setting.php"><i class="fa fa-cogs "></i>Setting</a>
                    </li>

                    <li>
                        <a href="logout.php"><i class="fa fa-power-off "></i>Logout</a>
                    </li>


                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->