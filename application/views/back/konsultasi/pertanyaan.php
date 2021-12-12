<link href="<?php echo base_url('assets/template/css/bootstrap-responsive.css') ?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/template/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

<body>

    <!-- end header -->
    <!-- section intro -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Pertanyaan <?php echo count(json_decode(json_encode($pertanyaan))) ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <form class="form-horizontal" action="<?php echo site_url("konsultasi/tambahhasil") ?>" method="post">
                                        <?php foreach ($pertanyaan as $row) { ?>
                                            <div class="form-group row">
                                                <div class="col-md-8">
                                                    <div class="col-sm-10">
                                                        <p><?php echo $row->pertanyaan; ?> ?</p>
                                                        <br>
                                                        <input class="hidden" type="text" name="kd_penyakit[]" value="<?php echo $row->kd_penyakit; ?>">
                                                        <input class="hidden" type="text" name="kd_gejala[]" value="<?php echo $row->kd_gejala; ?>">
                                                    </div>

                                                </div>
                                                <div class="col-md-2">
                                                    <select name="poin_gejala[]" class="form-control" required>
                                                        <option value="0">--Pilih--</option>
                                                        <option value="<?php echo $row->poin_gejala; ?>">Ya</option>
                                                        <option value="0">Tidak</option>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <br>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <div class="col-lg-10">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                    <a href="<?php echo site_url('konsultasi') ?>" class="btn btn-success">Kembali</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>