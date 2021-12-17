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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <form action="<?php echo site_url("konsultasi/pertanyaan") ?>" method="get">
                                        <div class="container pt-0">
                                            <div class="row align-items-end">
                                                <div class="col-sm">
                                                    <select id="kd_penyakit" name="kd_penyakit" class="form-control" required onchange="onChangeSelect()">
                                                        <option value="">--Pilih Penyakit--</option>
                                                        <?php
                                                        foreach ($data_penyakit as $k) {
                                                            echo "
                                                            <option value='$k->kd_penyakit'>$k->kd_penyakit - $k->nama_penyakit</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm">
                                                    <img src="" alt="" id="img_penyakit">
                                                </div>
                                            </div>
                                            <div class="form-group py-4">
                                                <button class="btn btn-primary" type="submit">Submit</button>
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

    <script>
        function onChangeSelect() {
            const penyakits = <?php echo json_encode($data_penyakit) ?>;
            const selectVal = document.getElementById("kd_penyakit").value;
            var imgSource = null;
            for (let i = 0; i < penyakits.length; i++) {
                if (penyakits[i].kd_penyakit === selectVal) {
                    imgSource = penyakits[i].img_gejala;
                }
            }
            document.getElementById("img_penyakit").src = `<?php echo base_url('assets/images/perangkat/') ?>${imgSource}`;
        }
    </script>

</body>

</html>