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
                        <h3 class="card-title">Data Penyakit</h3>
                        <a href="<?= base_url('penyakit/add') ?>" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah Data</a>
                    </div>

                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Penyakit</th>
                                    <th>Nama Penyakit</th>
                                    <th>Penyebab</th>
                                    <th>Solusi</th>
                                    <th>Gambar</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if ($data_penyakit) {
                                    foreach ($data_penyakit as $row) {
                                ?>
                                        <tr class="success">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->kd_penyakit; ?></td>
                                            <td><?php echo $row->nama_penyakit; ?></td>
                                            <td><?php echo $row->penyebab; ?></td>
                                            <td><?php echo $row->solusi; ?></td>
                                            <td>

                                                <img src="<?= base_url('assets/images/perangkat/' . $row->img_gejala); ?>" width=" 50px">

                                            </td>

                                            <td>
                                                <a class="btn btn-success" href="<?php echo site_url('penyakit/edit/' . $row->kd_penyakit); ?>"><i class="fas fa-eye"></i></a>
                                                <a class="btn btn-danger" href="<?php echo site_url('penyakit/hapusPenyakit/' . $row->kd_penyakit); ?>" onclick="return confirm('Anda yakin?')"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                <?php }
                                }
                                ?>
                            </tbody>
                        </table>
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