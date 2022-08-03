<div class="d-none pt-5 px-4 print-show">
    <div class="row">
        <div class="col-12 text-center mb-2">
            <h1 style="font-size:60px;font-weight:700;"><?php echo $toko ?></h1>
            <h4 class="mb-0"><?php echo $alamat ?></h4>
            <h4 class="mb-2">Tel : <?php echo $telp  ?></h4>
        </div>
        <div class="col-sm-4">
            <h3 class="mb-0" style="text-transform: uppercase;">INVOICE : <?php echo $kodeCart ?></h3>
            <h3 class="mb-0" style="text-transform: uppercase;">KASIR : <?php echo $user ?></h3>
        </div>
        <div class="col-sm-4">
            <div class="row">
                <div class="col-sm-4text-right mb-1"><h3 class="mb-0">TANGGAL :</h3></div>
                <div class="col-sm-4 pl-1 mb-1"><h3 class="mb-0"><?php echo date('d-m-Y') ?></h3></div>
                <div class="col-sm-4 text-right"><h3 class="mb-0">PUKUL :</h3></div>
                <div class="col-sm-4 pl-1"><h3 class="mb-0" id="jam-print"></h3></div>
            </div>
        </div>
        <div class="col-sm-4 bg-secondary border my-3"></div>
        <div class="col-sm-4 mb-3">
            <div class="row">
                <div class="col-sm-4 text-center"><h3 style="font-weight:700;">QTY</h3></div>
                <div class="col-sm-4"><h3 style="font-weight:700;">PRODUK</h3></div>
                <div class="col-sm-4 text-center"><h3 style="font-weight:700;">HARGA</h3></div>
                <div class="col-sm-4 text-right"><h3 style="font-weight:700;">SUBTOTAL</h3></div>
            </div>
        </div>
        <?php
            $subtotalcart2= 0;
            $no=1;
            $data_produk1=mysqli_query($conn,"SELECT * FROM keranjang c, produk p
            WHERE p.idproduk=c.idproduk ORDER BY idcart ASC");
            while ($c = $data_produk1->fetch_assoc()) {
                $subtotalcart3 = $c['harga_jual'] * $c['quantity'];
                $subtotalcart2 += $subtotalcart3;
                ?>
        <div class="col-12 mb-2">
            <div class="row">
                <div class="col-1 text-center"><h3><?php echo $c['quantity'] ?></h3></div>
                <div class="col"><h3><?php echo $c['nama_produk'] ?></h3></div>
                <div class="col text-center"><h3>Rp.<?php echo ($c['harga_jual']) ?></h3></div>
                <div class="col text-right"><h3>Rp.<?php echo ($subtotalcart3) ?></h3></div>
            </div>
        </div>
        <?php }?>
        <div class="col-12 bg-secondary border my-3"></div>
        <div class="col-12">
            <h3>Total Belanja <span class="float-right">Rp.<?php echo ($subtotalcart2) ?></span></h3>
            <h3>Tunai <div class="float-right">Rp.<span id="bayarnya1"></span></div></h3>
            <h3>Kembali <div class="float-right">Rp.<span id="total2"></span></div></h3>
        </div>
        <div class="col-12 bg-secondary border my-3"></div>
        <div class="col-12">
            <h4>Catatan : <span id="new_catatan"></span></h4>
        </div>
        <div class="col-12 bg-secondary border my-3"></div>
        <div class="col-12 text-center">
            <h3>* Terima Kasih Telah Berbelanja Di Toko Kami *</h3>
            
        </div>
    </div><!-- end row -->
</div><!-- end box print -->