<!--========================= Content Wrapper ==============================-->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header"> Detail Penjualan Barang</h1>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tujuan dan Keterangan
                </div>
                <div class="panel-body">
                <?php if(isset($dt_penjualan)){
                    foreach($dt_penjualan as $row){
                        ?>
                    <div class="col-lg-4">
                        <dl class="dl-horizontal">
                            <dt>Kode Penjualan :</dt>
                            <dd><?php echo $row->kd_penjualan?></dd>
                            <br/>
                            <dt>Tanggal Penjualan :</dt>
                            <dd><?php echo date("d M Y",strtotime($row->tanggal_penjualan));?></dd>
                            <br/>
                            <dt>Total Harga :</dt>
                            <dd><strong><u><?= currency_format($row->total_harga); ?></u></strong></dd>
                            <br/>
                            <dt>Pegawai :</dt>
                            <dd><?php echo $row->nama?></dd>
                        </dl>
                    </div>
                    <div class="col-lg-6">
                        <dl class="dl-horizontal">
                            <dt>Pelanggan :</dt>
                            <dd><?php echo $row->nm_pelanggan?></dd>
                            <br/>
                            <dt>Alamat :</dt>
                            <dd><?php echo $row->alamat?></dd>
                            <br/>
                            <dt>Telp / Email :</dt>
                            <dd><?php echo $row->email?></dd>
                        </dl>
                    </div>
                <?php }
                    }
                ?>
                </div>
                <div class="panel-footer">
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Barang
                </div>
                <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no=1;
                    if(isset($barang_jual)){
                        foreach($barang_jual as $row ){
                            ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row->kd_barang?></td>
                        <td><?php echo $row->nm_barang?></td>
                        <td><?php echo $row->qty?></td>
                        <td><?php echo currency_format($row->harga)?></td>
                    </tr>
                    <?php }
                        }
                    ?>
                    </tbody>
                </table>
                </div>
                <div class="panel-footer">
                </div>
            </div>
        </div>
        <div class="form-actions">
            <a href="<?php echo site_url('penjualan')?>" type="button" class="btn btn-outline btn-primary">
                <i class="fa fa-mail-reply-all fa-fw"></i> Back
            </a>
            <?php if(isset($dt_penjualan)){
                foreach($dt_penjualan as $row){
                    ?>
            <a type="button" class="btn btn-outline btn-warning btnPrint" href="<?php echo site_url('cetak/print_penjualan/'.$row->kd_penjualan)?>">
                <i class="fa fa-print fa-fw"></i> Print
            </a>
            <?php }
                }
            ?>
        </div>
    </div>
</div>