<section id="hero" class="d-flex align-items-center" style="height: 120vh;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Pertanyaan</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-9">
                            <div class="form-group">
                                <form class="form-horizontal" action="<?php echo site_url("konsultasi_public/tambahhasil") ?>" method="post">
                                    <input class="hidden" type="hidden" name="kd_penyakit" value="<?php echo $kd_penyakit; ?>">
                                    <?php foreach ($pertanyaan as $row) { ?>
                                        <div class="form-group row">
                                            <div class="col-md-8">
                                                <div class="col-sm-10">
                                                    <p><?php echo $row->pertanyaan; ?> ?</p>
                                                    <br>
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
                                                <a href="<?php echo site_url('konsultasi_public') ?>" class="btn btn-light">Kembali</a>
                                                <button class="btn btn-primary" type="submit">Submit</button>
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