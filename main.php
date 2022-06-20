<div class="col-md-12">
  <div class="panel panel-success">
    <div class="panel-heading">
      <h3 class="panel-title">
        Laporan Transaksi Tahunan</h3>
      <span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span>
    </div>
    <div class="panel-body">
      <div class="main-box bg-info">

        <div class="row">
          <div class="col-sm-12 bg-info">
            <div class="row">
              <div class="col-sm-3  bg-info">
                <?php
                global $deduction;
                $deduction = 0;
                $total_cash = 0;
                $query  = "SELECT amount from cash";
                $q = $conn->query($query);
                while ($row = $q->fetch_assoc()) {
                  $total_cash = $total_cash + $row["amount"];
                }
                $query  = "SELECT total from sell where delete_status='0'";
                $q = $conn->query($query);
                while ($row = $q->fetch_assoc()) {
                  $total_cash = $total_cash + $row["total"];
                }
                ?>
                <a class="btn btn-primary " align="center" href="home_cash.php"><strong>Total Uang Perusahaan : Rp.</strong> <?php echo $total_cash; ?> </a>

              </div>

              <div class="col-sm-3 bg-info">
                <?php
                $total_cost = 0;
                $query  = "SELECT amount from transaction where delete_status='0'";
                $q = $conn->query($query);
                while ($row = $q->fetch_assoc()) {
                  $total_cost = $total_cost + $row["amount"];
                }
                $query  = "SELECT pay_amount from payment where delete_status='0'";
                $q = $conn->query($query);
                while ($row = $q->fetch_assoc()) {
                  $total_cost = $total_cost + $row["pay_amount"];
                }
                $query  = "SELECT total from buy where delete_status='0'";
                $q = $conn->query($query);
                while ($row = $q->fetch_assoc()) {
                  $total_cost = $total_cost + $row["total"];
                }

                ?>
                <a class="btn btn-primary" align="center" href="dailyTransactions.php"><strong>Total Pengeluaran : Rp.</strong><?php echo $total_cost ?> </a>

              </div>
              <div class="col-sm-3 bg-info">
                <?php
                $total_salary = 0;
                $query  = "SELECT pay_amount from payment where delete_status='0'";
                $q = $conn->query($query);
                while ($row = $q->fetch_assoc()) {
                  $total_salary = $total_salary + $row["pay_amount"];
                }
                $query  = "SELECT d_amount from deductions";
                $q = $conn->query($query);
                while ($row = $q->fetch_assoc()) {
                  $deduction = $deduction + $row["d_amount"];
                }

                ?>
                <a class="btn btn-primary" align="center" href="home_salaryRegular.php"><strong>Gaji dibayar : Rp.</strong><?php echo $total_salary; ?> </a>

              </div>
              <div class="col-sm-3 bg-info">
                <a class="btn btn-primary w-600" align="center" href="#"><strong>Uang Bersih : Rp.</strong> <?php echo $total_cash - ($total_cost + $total_salary); ?> </a>

              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-12">
    <h1 class="page-subhead-line"><strong>Dashboard</strong>

    </h1>

  </div>
</div>

<div class="row">

  <div class="col-md-4">
    <div class="main-box mb-pink">
      <a href="home_customer.php">
        <i class="fa fa-user fa-5x"></i>
        <h5>Customer</h5>
      </a>
    </div>
  </div>

  <div class="col-md-4">
    <div class="main-box mb-pink">
      <a href="home_employee.php">
        <i class="fa fa-users fa-5x"></i>
        <h5>Pegawai</h5>
      </a>
    </div>
  </div>

  <div class="col-md-4">
    <div class="main-box mb-dull">
      <a href="home_payment.php">
        <i class="fa fa-inr fa-5x"></i>
        <h5>Pembayaran</h5>
      </a>
    </div>
  </div>

  <div class="col-md-4">
    <div class="main-box mb-red">
      <a href="home_salaryRegular.php">
        <i class="fa fa-money fa-5x"></i>
        <h5>Gaji</h5>
      </a>
    </div>
  </div>

  <div class="col-md-4">
    <div class="main-box mb-red">
      <a href="home_supply.php">
        <i class="fa fa-truck fa-5x"></i>
        <h5>Buy Supply</h5>
      </a>
    </div>
  </div>              

  <div class="col-md-4">
    <div class="main-box mb-red">
      <a href="home_sell.php">
        <i class="fa fa-file-text fa-5x"></i>
        <h5>Sell</h5>
      </a>
    </div>
  </div>
  <div class="col-md-4">
    <div class="main-box bg-primary">
      <a href="home_store.php">
        <i class="fa fa-box fa-5x"></i>
        <h5>Toko</h5>
      </a>
    </div>
  </div>


</div>




</div>
<script>
  $(document).on('click', '.panel-heading span.clickable', function(e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
      $this.parents('.panel').find('.panel-body').slideUp();
      $this.addClass('panel-collapsed');
      $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
      $this.parents('.panel').find('.panel-body').slideDown();
      $this.removeClass('panel-collapsed');
      $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
  });
  $(document).on('click', '.panel div.clickable', function(e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
      $this.parents('.panel').find('.panel-body').slideUp();
      $this.addClass('panel-collapsed');
      $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
      $this.parents('.panel').find('.panel-body').slideDown();
      $this.removeClass('panel-collapsed');
      $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
  });
  $(document).ready(function() {
    $('.panel-heading span.clickable').click();
    $('.panel div.clickable').click();
  });
</script>