<link rel="stylesheet" href="<?= base_url() ?>assets/back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Basis Pengetahuan</h3>
                        <a href="<?= base_url('pengetahuan/add') ?>" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah Basis Pengetahuan</a>
                    </div>

                    <div class="card-body">
                        <div class="col-md-9">
                            <div class="form-group">
                                <form action="<?php echo site_url("pengetahuan/detail/?kd_penyakit=''") ?>" method="GET">
                                    <div class="input-group input-group-sm">
                                        <select name="kd_penyakit" class="form-control" required>
                                            <option value="">--Pilih Penyakit--</option>
                                            <?php
                                            foreach ($data_penyakit as $k) {
                                                echo "<option value='$k->kd_penyakit'>$k->kd_penyakit - $k->nama_penyakit</option>";
                                            }
                                            ?>
                                        </select>
                                        <span class="input-group-append">
                                            <input class="btn btn-primary" type="submit" class="btn btn-info btn-flat" value="Lihat Data"></input>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?= base_url() ?>assets/back/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/back/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/back/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/back/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>



<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>