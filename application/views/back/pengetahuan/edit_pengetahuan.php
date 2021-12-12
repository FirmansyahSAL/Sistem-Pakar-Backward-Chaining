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
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Pengetahuan</h3>
                    </div>
                    <div class="card-body">

                        <?= validation_errors() ?>
                        <div class="form">
                            <form class="form-validate form-horizontal" method="post" action="<?php echo site_url('pengetahuan/edit') ?>">
                                <div class="form-group">
                                    <div class="col-lg-10">
                                        <label for="exampleInputEmail1">kode Pengetahuan</label>
                                        <input type="text" class="form-control" name="kd_pengetahuan" value="<?php echo $baris['kd_pengetahuan'] ?>" readonly="true" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_penyakit" class="control-label col-lg-2">Penyakit</label>
                                    <div class="col-lg-10">
                                        <select name="kd_penyakit" class="form-control">
                                            <option value="<?php echo $baris['kd_penyakit'] ?>"><?php echo $baris['kd_penyakit'] ?></option>
                                            <?php foreach ($data_penyakit as $k) {
                                                echo "<option value='$k->kd_penyakit'>$k->kd_penyakit - $k->nama_penyakit</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_gejala" class="control-label col-lg-2">Gejala</label>
                                    <div class="col-lg-10">
                                        <select name="kd_gejala" class="form-control">
                                            <option value="<?php echo $baris['kd_gejala'] ?>"><?php echo $baris['kd_gejala'] ?></option>
                                            <?php foreach ($data_gejala as $k) {
                                                echo "<option value='$k->kd_gejala'>$k->kd_gejala - $k->nama_gejala</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_gejala" class="control-label col-lg-2">Pertanyaan</label>
                                    <div class="col-lg-10">
                                        <select name="pertanyaan" class="form-control">
                                            <option value="Apakah mengalami <?php echo $baris['pertanyaan'] ?> ?">Apakah mengalami <?php echo $baris['pertanyaan'] ?> ?</option>
                                            <?php foreach ($data_gejala as $k) {
                                                echo "<option value='Apakah mengalami $k->nama_gejala ?'>Apakah mengalami $k->nama_gejala ?</option>";
                                            } ?>
                                            <option value="Selesai">Selesai</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Save</button>
                                <button type="reset" class="btn btn-danger btn-sm">Reset</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>