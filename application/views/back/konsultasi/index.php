<div class="wrapper">
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Konsultasi</h3>
                        </div>
                        <br>
                        <div class="card-body row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <form action="<?php echo site_url("konsultasi_public/pertanyaan") ?>" method="get">
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

                                            </div>
                                            <div class="form-group py-2">
                                                <button class="btn btn-primary" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-sm d-flex justify-content-center" style="height: 300px;">
                                    <img src="" alt="" id="img_penyakit" style="max-height: 300px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function onChangeSelect() {
        const penyakits = <?php echo json_encode($data_penyakit) ?>;
        const selectVal = document.getElementById("kd_penyakit").value;
        var imgSource = null;
        var altImage = 'Penyakit image';
        for (let i = 0; i < penyakits.length; i++) {
            if (penyakits[i].kd_penyakit === selectVal) {
                imgSource = penyakits[i].img_gejala;
                altImage = penyakits[i].nama_penyakit;
            }
        }
        document.getElementById("img_penyakit").src = `<?php echo base_url('assets/images/perangkat/') ?>${imgSource}`;
        document.getElementById("img_penyakit").alt = `${altImage} image.`;
    }
</script>