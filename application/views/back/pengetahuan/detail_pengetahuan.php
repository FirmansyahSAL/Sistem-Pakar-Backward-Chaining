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
                        <h3 class="card-title">Detail Basis Pengetahuan</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-stripped dataTables1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Basis Pengetahuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($detail as $row) {
                                ?>
                                    <tr class="success">
                                        <td><?php echo $no++; ?></td>
                                        <td>Gejala : <b><?php echo $row->nama_gejala; ?></b>
                                            <br>Pertanyaan : <b><?php echo $row->pertanyaan; ?></b>
                                        </td>
                                        <td>
                                            <a class="btn btn-success" href="<?php echo site_url('pengetahuan/edit/' . $row->kd_pengetahuan); ?>"><i class="fas fa-eye"></i></a>
                                            <a class="btn btn-danger" href="<?php echo site_url('pengetahuan/hapusPengetahuan/' . $row->kd_pengetahuan); ?>" onclick="return confirm('Anda yakin?')"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        <div class="col-md-9">
                            <div class="form-group">

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