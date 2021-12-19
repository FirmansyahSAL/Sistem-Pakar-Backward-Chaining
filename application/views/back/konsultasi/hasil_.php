<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Konsultasi</h1>

                </div><!-- /.col -->

            </div><!-- /.row -->

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
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
                                    if (empty($data_ps)) { echo "Tidak ada gejala yang Anda alami, analisa hasil tidak ditemukan"; } else {
                                        foreach ($data_ps as $row) {
                                        ?>
                                            <p>Kemungkinan Kerusakan Perangkat anda adalah :<b><?php echo $row->nama_penyakit; ?></b> </p>
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
                                            <br><br>
                                            <a href="<?php echo site_url('konsultasi') ?>" class="btn btn-light btn-large">Konsultasi Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>