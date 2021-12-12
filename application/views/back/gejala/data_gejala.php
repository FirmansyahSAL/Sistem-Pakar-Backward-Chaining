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
                        <h3 class="card-title">Data Gejala</h3>
                        <a href="<?= base_url('gejala/add') ?>" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah Data</a>
                    </div>

                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Gejala</th>
                                    <th>Nama Gejala</th>
                                    <th>Poin Gejala</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $total = 0;
                                if ($data_gejala) {
                                    foreach ($data_gejala as $row) {
                                        $total = $total + $row->poin_gejala;
                                ?>
                                        <tr class="success">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->kd_gejala; ?></td>
                                            <td><?php echo $row->nama_gejala; ?></td>
                                            <td><?php echo $row->poin_gejala; ?></td>
                                            <td>
                                                <a class="btn btn-success" href="<?php echo site_url('gejala/edit/' . $row->kd_gejala); ?>"><i class="fas fa-eye"></i></a>
                                                <a class="btn btn-danger" href="<?php echo site_url('gejala/hapusGejala/' . $row->kd_gejala); ?>" onclick="return confirm('Anda yakin?')"><i class="fas fa-trash"></i></a>
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