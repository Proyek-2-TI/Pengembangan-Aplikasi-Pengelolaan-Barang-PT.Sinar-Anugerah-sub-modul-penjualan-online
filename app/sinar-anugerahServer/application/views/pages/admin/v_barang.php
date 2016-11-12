        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Data Barang</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-gear fa-fw"></i><i class="fa fa-caret-down"></i>
                                </a>                    
                                <ul class="dropdown-menu dropdown-jb">
                                    <li><a href="#" data-target="#modalAddJenisBarang" data-toggle="modal">
                                    <i class="fa fa-plus fa-fw"></i> Tambah Jenis Barang
                                        </a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-wrench fa-fw"></i> Config Jenis Barang</a>
                                    </li>
                                </ul><!-- /.dropdown-user -->
                            Data Barang
                            </li><!-- /.dropdown -->
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Kode</th>
                                        <th>Supplier</th>
                                        <th>Jenis</th>
                                        <th>Nama</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>
                                            <a data-target="#modalAddBarang" type="button" class="btn btn-outline btn-info" data-toggle="modal">
                                                <i class="fa fa-plus fa-fw"></i> Tambah Data
                                            </a>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    if(isset($data_barang)){
                                    foreach($data_barang as $row){
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row->kd_barang; ?></td>
                                        <td><?php echo $row->nm_supplier; ?></td>
                                        <td><?php echo $row->jenis_barang; ?></td>
                                        <td><?php echo $row->nm_barang; ?></td>
                                        <td><?php echo $row->stok; ?></td>
                                        <td><?php echo currency_format($row->harga);?></td>
                                        <td>
                                            <a type="button" class="btn btn-outline btn-primary" href="<?php echo site_url('master/edit_data_barang/'.$row->kd_barang);?>"> 
                                            <i class="fa fa-pencil fa-fw"></i> Edit</a>
                                            <a type="button" class="btn btn-outline btn-danger" href="<?php echo site_url('master/hapus_barang/'.$row->kd_barang);?>"
                                               onclick="return confirm('Anda yakin?')"> 
                                            <i class="fa fa-trash-o fa-fw"></i> Hapus</a>
                                        </td>
                                    </tr>

                                    <?php }
                                    }
                                    ?>

                                    </tbody>
                                </table>


<!-- ============ MODAL ADD BARANG =============== -->
 <div class="modal fade" id="modalAddBarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Barang</h4>
            </div>
            <center>
            <form id="defaultForm" class="form-horizontal" method="post" action="<?php echo site_url('master/tambah_barang')?>">
            <div class="modal-body">
                <div class="form-group">
                <label class="col-lg-4 control-label">Kode Barang</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="kd_barang" value="<?php echo $kd_barang;?>" readonly/>
                    </div>
                 </div>
                <div class="form-group">
                <label class="col-lg-4 control-label">Nama Barang</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="nm_barang" placeholder="Input nama barang . ." />
                    </div>
                 </div>
                <div class="form-group">
                <label class="col-lg-4 control-label">Jenis Barang</label>
                    <div class="col-lg-6">
                        <select id="id_jenis_barang" tabindex="5" class="form-control" name="id_jenis_barang" data-placeholder="Pilih Jenis Barang">
                            <option value=""></option>
                            <?php
                            if(isset($data_jenis_barang)){
                                foreach($data_jenis_barang as $row){
                                    ?>
                                <option value="<?php echo $row->id_jenis_barang?>"><?php echo $row->jenis_barang?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                 </div>
                <div class="form-group">
                <label class="col-lg-4 control-label">Supplier</label>
                    <div class="col-lg-6">
                        <select id="kd_supplier" tabindex="5" class="form-control" name="kd_supplier" data-placeholder="Pilih Supplier">
                            <option value=""></option>
                            <?php
                            if(isset($data_supplier)){
                                foreach($data_supplier as $row){
                                    ?>
                                <option value="<?php echo $row->kd_supplier?>"><?php echo $row->nm_supplier?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                 </div>
                <div class="form-group">
                <label class="col-lg-4 control-label">Stok</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="stok" placeholder="Input stok barang . ."/>
                    </div>
                 </div>
                <div class="form-group">
                <label class="col-lg-4 control-label">Harga</label>
                <div class="col-lg-6">
                        <input type="text" class="form-control" name="harga" placeholder="Input harga barang . ." />
                    </div>
                </div>
                <button type="button" data-dismiss="modal" class="btn btn-outline btn-warning"><i class="fa fa-mail-reply-all fa-fw"></i>Close</button>
                <button type="submit" class="btn btn-outline btn-primary"><i class="fa fa-save fa-fw"></i>Simpan</button>
            </div>
            </center>
            <div class="modal-footer">
            </div>
            </form>
        </div>
    </div>
</div>

<!-- ============ MODAL ADD JENIS BARANG =============== -->
 <div class="modal fade" id="modalAddJenisBarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Jenis Barang</h4>
            </div>
            <center>
            <form id="defaultForm2" class="form-horizontal" method="post" action="<?php echo site_url('master/tambah_jenis_barang')?>">
            <div class="modal-body">
                <div class="form-group">
                <label class="col-lg-4 control-label">Kode Jenis Barang</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="id_jenis_barang" value="<?php echo $id_jenis_barang;?>" readonly/>
                    </div>
                 </div>
                <div class="form-group">
                <label class="col-lg-4 control-label">Jenis Barang</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="jenis_barang" placeholder="Input nama jenis barang . ." />
                    </div>
                 </div>
                <button type="button" data-dismiss="modal" class="btn btn-outline btn-warning"><i class="fa fa-mail-reply-all fa-fw"></i>Close</button>
                <button type="submit" class="btn btn-outline btn-primary"><i class="fa fa-save fa-fw"></i>Simpan</button>
            </div>
            </center>
            <div class="modal-footer">
            </div>
            </form>
        </div>
    </div>
</div>

    <!--========================= Script Validation ==============================-->
<script type="text/javascript">
$(document).ready(function() {
    $('#defaultForm').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            id_jenis_barang: {
                message: 'field tidak valid',
                validators: {
                    notEmpty: {
                        message: 'Pilih jenis barang'
                    }
                }
            },
            kd_supplier: {
                message: 'field tidak valid',
                validators: {
                    notEmpty: {
                        message: 'Pilih supplier'
                    }
                }
            },
            nm_barang: {
                message: 'field tidak valid',
                validators: {
                    notEmpty: {
                        message: 'Nama barang harus di isi'
                    }
                }
            },
            stok: {
                message: 'field tidak valid',
                validators: {
                    notEmpty: {
                        message: 'Stok harus di isi'
                    },
                    numeric: {
                      message: 'Stok harus di isi dengan angka'
                    }
                }
            },
            harga: {
                message: 'field tidak valid',
                validators: {
                    notEmpty: {
                        message: 'harga harus di isi'
                    },
                    numeric: {
                      message: 'harga harus di isi dengan angka'
                    }
                }
            }
        }
    });

    // Validate the form manually
    $('#validateBtn').click(function() {
        $('#defaultForm').bootstrapValidator('validate');
    });

    $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#defaultForm2').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            jenis_barang: {
                message: 'field tidak valid',
                validators: {
                    notEmpty: {
                        message: 'Nama jenis barang harus di isi'
                    }
                }
            }
        }
    });

    // Validate the form manually
    $('#validateBtn').click(function() {
        $('#defaultForm').bootstrapValidator('validate');
    });

    $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });
});
</script>