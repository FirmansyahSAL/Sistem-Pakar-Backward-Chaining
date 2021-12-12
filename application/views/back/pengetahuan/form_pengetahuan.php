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
                    </div>

                    <div class="card-body">
                        <div class="col-md-9">
                            <div class="form-group">
                                <div class="panel-body">
                                    <div class="form">
                                        <form class="form-validate form-horizontal" method="post" action="<?php echo site_url('pengetahuan/tambahPengetahuan') ?>">
                                            <div class="form-group">
                                                <label for="nama_penyakit" class="control-label col-lg-2">Penyakit</label>
                                                <div class="col-lg-10">
                                                    <select name="kd_penyakit" class="form-control">
                                                        <option value="">--Pilih Penyakit--</option>
                                                        <?php foreach ($data_penyakit as $k) {
                                                            echo "<option value='$k->kd_penyakit'>$k->kd_penyakit - $k->nama_penyakit</option>";
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_gejala" class="control-label col-lg-2">Gejala</label>
                                                <div class="col-lg-10">
                                                    <select name="kd_gejala" class="form-control">
                                                        <option value="">--Pilih Gejala--</option>
                                                        <?php foreach ($data_gejala as $k) {
                                                            echo "<option value='$k->kd_gejala'>$k->kd_gejala - $k->nama_gejala</option>";
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="pertanyaan" class="control-label col-lg-2">Pertanyaan</label>
                                                <div class="col-lg-10">
                                                    <select name="pertanyaan" class="form-control">
                                                        <option value=""></option>
                                                        <?php foreach ($data_gejala as $k) {
                                                            echo "<option value='Apakah mengalami $k->nama_gejala ?'>$k->kd_gejala - Apakah mengalami $k->nama_gejala ?</option>";
                                                        } ?>
                                                        <option value="Selesai">Selesai</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button class="btn btn-outline btn-success" type="submit">Simpan</button>
                                                <?php echo anchor('pengetahuan', 'Kembali', array('class' => 'btn btn-outline btn-primary')) ?>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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