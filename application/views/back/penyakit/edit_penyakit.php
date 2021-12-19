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
                        <h3 class="card-title">Form Edit Penyakit</h3>
                    </div>
                    <div class="card-body">

                        <?= validation_errors() ?>
                        <form action="<?= base_url('penyakit/edit') ?>" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="exampleInputEmail1">kode Penyakit</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="kd_penyakit" value="<?php echo $baris['kd_penyakit'] ?>" readonly="true" placeholder="Enter penyakit">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Penyakit</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="nama_penyakit" value="<?php echo $baris['nama_penyakit'] ?>" placeholder="Enter penyakit">
                            </div>
                            <div class="form-group">
                                <label>Penyebab</label>
                                <textarea class="form-control" name="penyebab" type="text"><?php print $baris['penyebab']; ?></textarea>

                            </div>
                            <div class="form-group">
                                <label>Solusi</label>
                                <textarea class="form-control" name="solusi" type="text"><?php print $baris['solusi']; ?></textarea>
                            </div>
                            <input type="hidden" id="img_gejala_old" name="img_gejala_old" value="<?php echo $baris['img_gejala']; ?>">
                            <div class="form-group">
                                <label for="img_gejala">Image</label>
                                <!-- <input type="file" name="img_gejala" id="img_gejala" class="form-control-file" required="" > -->
                                <div class="custom-file">
                                    <input type="file" name="img_gejala" id="img_gejala" class="form-control-file" required="" onchange="onChangeImg()">
                                    <label class="custom-file-label" for="img_gejala" id="label_img_gejala"><?php echo $baris['img_gejala'] ? $baris['img_gejala'] : "Choose file..." ?></label>
                                    <div class="input-group-append">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php if ($baris["img_gejala"]) { ?>
                                    <img id="img_gejala_view" src="<?= base_url('assets/images/perangkat/' . $baris["img_gejala"]); ?>" width=" 50px">
                                <?php } ?>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-sm">Save</button>
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div>
<script>
    function onChangeImg() {
        const imgGejalaValue = document.getElementById("img_gejala").value;
        if (imgGejalaValue) {
            var startIndex = (imgGejalaValue.indexOf('\\') >= 0 ? imgGejalaValue.lastIndexOf('\\') : imgGejalaValue.lastIndexOf('/'));
            var filename = imgGejalaValue.substring(startIndex);
            if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                filename = filename.substring(1);
            }
        }
        document.getElementById("label_img_gejala").textContent = filename;
        document.getElementById("img_gejala_view").src = '';
    }
</script>