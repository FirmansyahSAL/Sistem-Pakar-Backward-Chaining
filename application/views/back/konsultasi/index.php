<body>

    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Konsultasi</h3>
                        </div>
                        <br>
                        <div class="card-body">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <form action="<?php echo site_url("konsultasi/pertanyaan") ?>" method="get">
                                        <select name="kd_penyakit" class="form-control" required>
                                            <option value="">--Pilih Penyakit--</option>
                                            <?php
                                            foreach ($data_penyakit as $k) {
                                                echo "
                                                <option value='$k->kd_penyakit'>$k->kd_penyakit - $k->nama_penyakit- base_url('assets/images/perangkat/'.$k->img_gejala)</option>";
                                            }
                                            ?>
                                        </select>
                                        <br>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <div class="col-lg-10">
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


    </section><!-- End Hero -->

    <!-- javascript
    ================================================== -->

</body>

</html>