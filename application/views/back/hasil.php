<link href="<?php echo base_url('assets/template/css/bootstrap-responsive.css') ?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/template/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

<body>
    <!-- section intro -->

    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Hasil Diagnosa</h3>
                        </div>
                        <div class="card-body">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <?php
                                    if (empty($data_ps)) {
                                        echo "Tidak ada gejala yang Anda alami, analisa hasil tidak ditemukan"

                                    ?>
                                    <?php } else {
                                    ?>

                                        <?php
                                        foreach ($data_ps as $row) {
                                        ?>
                                            <p>Kemungkinan Anda mengidap penyakit <b><?php echo $row->nama_penyakit; ?></b> </p>
                                        <?php
                                        }
                                        ?>
                                        <table class="table table-bordered table-stripped dataTables1">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Gejala yang dialami</th>
                                                    <th>Poin Gejala</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $poin = 0;
                                                if ($data_hasil) {
                                                    foreach ($data_hasil as $row) {
                                                        $poin = $poin + $row->poin_gejala / 50 * 100 / 2;
                                                ?>
                                                        <tr class="info">
                                                            <td><?php echo $no++; ?></td>
                                                            <td><?php echo $row->nama_gejala; ?></td>
                                                            <td><?php echo $row->poin_gejala; ?></td>
                                                        </tr>
                                                <?php }
                                                }
                                                ?>
                                                <p>dengan tingkat kemungkinan <b><?php echo $poin; ?>%.</b></p>
                                            </tbody>
                                        </table>
                                        <?php
                                        if ($data_ps) {
                                            foreach ($data_ps as $row) {
                                        ?>
                                                <table class="table table-bordered table-stripped dataTables1">
                                                    <thead>
                                                        <tr>
                                                            <th>Penyebab</th>
                                                            <th>Solusi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="info">
                                                            <td><?php echo $row->penyebab; ?></td>
                                                            <td><?php echo $row->solusi; ?></td>
                                                        </tr>
                                                <?php }
                                        }
                                                ?>
                                                    </tbody>
                                                </table>
                                            <?php
                                        } ?>
                                            <br><br><a href="<?php echo site_url('konsultasi') ?>" class="btn btn-success btn-large">
                                                <i class="fa fa-list"></i> Konsultasi Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.easing.1.3.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/modernizr.custom.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/toucheffects.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/google-code-prettify/prettify.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.prettyPhoto.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/portfolio/jquery.quicksand.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/portfolio/setting.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/animate.js') ?>"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets/vendor/metisMenu/metisMenu.min.js'); ?>"></script>
    <!-- Template Custom JavaScript File -->
    <script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url('assets/vendor/datatables/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables-plugins/dataTables.bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables-responsive/dataTables.responsive.js'); ?>"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
    <script>
        $(function() {
            $("#showPass").click(function() { // #showPass -> id Checkbox
                if ($("[name=password]").attr('type') == 'password') {
                    $("[name=password]").attr('type', 'text');
                } else {
                    $("[name=password]").attr('type', 'password');
                }
            });
        });
    </script>
</body>

</html>