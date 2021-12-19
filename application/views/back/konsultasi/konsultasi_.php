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
                            <h3 class="card-title">Konsultasi baru</h3>
                        </div>
                        <br>
                        <div class="card-body row">
                            <div class="col-md-6">
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

                                            </div>
                                            <div class="form-group py-2">
                                                <button class="btn btn-info" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-sm d-flex justify-content-center" style="height: 250px;">
                                    <img src="" alt="" id="img_penyakit" style="max-height: 250px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Konsultasi terbaru</h3>
                        </div>
                        <div class="card-body">
                            <?php foreach ($history as $h) { ?>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3 class="card-title">Konsultasi penyakit <b><?php echo $h->nama_penyakit; ?></b></h3>
                                                <p class="card-text text-gray"><i class="fas fa-clock mr-1"></i><?php echo $h->created_at ?></p>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <a class="btn btn-default" href="<?php echo base_url('konsultasi/hasil/' . $h->id) ?>" role="button">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            ...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
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