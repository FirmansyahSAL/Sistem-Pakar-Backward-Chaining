<div class="subnavbar">

    <div class="container">
        <div class="row">

            <div class="span13">
                <div class="widget ">
                    <div class="widget-header"> <i class="icon-th-list"></i>
                        <h3>No Tiket <?= $tiket->no_tiket ?></h3>
                    </div>

                    <div class="widget-content">
                        <div class="span11">

                            <h4>
                                <i class="fas fa-globe"></i> IT Helpdesk
                                <ul class="nav pull-right">
                                    <small class="float-right">Date : <?= $tiket->tgl_daftar ?></small>
                                </ul>
                            </h4>
                            <br>
                        </div>


                        <div class="span11">
                            <div class="span3">
                                <h8 class="bigstats">
                                    <div class="stat">
                                        From
                                        <strong><?= $tiket->username; ?></strong><br>
                                        <?= $tiket->divisi ?><br>
                                        <?= $tiket->jabatan ?><br>
                                        <?= $tiket->email ?><br>
                                    </div>
                                </h8>
                            </div>

                            <div class="span3">
                                <h7 class="bigstats">
                                    <div class="stat">
                                        To
                                        <b>Status Tiket</b> : <?php if ($tiket->status_tiket == 0) {
                                                                    echo '<span class="badge badge-warning"> Waiting...</span>';
                                                                } else if ($tiket->status_tiket == '1') {
                                                                    echo '<span class="badge badge-info"> Response...</span>';
                                                                } else if ($tiket->status_tiket == '2') {
                                                                    echo '<span class="badge badge-success"> Process...</span>';
                                                                } else {
                                                                    echo '<span class="badge badge-danger"> solved...</span>';
                                                                } ?>
                                        <br>
                                        <br>
                                        <h5> No Tiket :
                                            <?= $tiket->no_tiket ?></h5>
                                        <p></p>
                                        <b> Selesai :</b>
                                        <?php

                                        if ($tiket->status_tiket == '3') {
                                            echo $tiket->waktu_tanggapan;
                                        } else {
                                            echo "---";
                                        }
                                        ?>
                                    </div>
                                </h7>
                            </div>

                            <br>
                            <p>&nbsp;</p>
                            <br>

                            <div class="row">

                                <div class="span 3">
                                    <p class="lead">Keluhan User / Karyawan</p>
                                    <input type="text" class="span6 disabled" value="<?= $tiket->judul_tiket ?>" disabled>
                                </div>
                                <div class="span 3">
                                    <p class="lead">Keterangan Lengkap</p>
                                    <input type="text" class="span6 disabled" value="<?= $tiket->judul_tiket ?>" disabled>
                                </div>

                                <div class="span 3">
                                    <p class="lead">Tanggapan Dept IT</p>
                                    <th style="width:50%">
                                        <input type="text" class="span6 disabled" value="<?= $tiket->judul_tiket ?>" disabled>
                                    </th>
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

    </div>
</div>
</div>
</div>
</div>
</div>
</div>