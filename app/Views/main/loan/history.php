<?= $this->extend('partials/header_layout') ?>

<?= $this->section('content') ?>

<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title"><?= $title; ?> Lists</h3>
                            <div class="nk-block-des text-soft">
                                <p>You have total <?= $title; ?> admin users.</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                    <div class="card card-bordered card-preview">
                        <div class="card-inner">
                            <table class="datatable-init table">
                                <thead>
                                    <tr>
                                        <th>No</span></th>
                                        <th>Asset</span></th>
                                        <th>Peminjam</span></th>
                                        <th>NIP</span></th>
                                        <th>Unit</span></th>
                                        <th>Total</span></th>
                                        <th>Tanggal Peminjaman</span></th>
                                        <th>Tanggal Dikembalikan</span></th>
                                        <th>Activity</span></th>
                                    </tr>
                                        <!-- .nk-tb-item -->
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $x) { ?>
                                        <tr class="nk-tb-item">
                                            <td>
                                                <?= $no++; ?>
                                            </td>
                                            <td>
                                                <a href="html/apps-kanban.html" class="project-title">
                                                    <div class="project-info">
                                                        <h6 class="title"><?= $x['asset_name']; ?></h6>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>
                                                <span><?= $x['name']; ?></span>
                                            </td>
                                            <td>
                                                <span><?= $x['nip']; ?></span>
                                            </td>
                                            <td>
                                                <div class="user-avatar sq bg-danger"><span><?= singkatan(str_replace('BAGIAN','',str_replace(' KAMPUS JAKARTA', '', $x['unit']))); ?></span></div>
                                            </td>
                                            <td>
                                                <div class="user-avatar bg-light sm"><span><?= $x['amount_loan']; ?></span></div>
                                            </td>
                                            <td>
                                                <span><?= date('d/m/Y - H:i', strtotime($x['tanggal_pinjam'])); ?></span>
                                            </td>
                                            <td>
                                                <span><?= isset($x['tanggal_masuk'])? date('d/m/Y - H:i', strtotime($x['tanggal_masuk'])):'-'; ?></span>
                                            </td>
                                            <td>
                                                <span><?= $x['activity']; ?></span>
                                            </td>
                                        </tr><!-- .nk-tb-item -->
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- .card-preview -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>


<?= $this->extend('partials/footer_layout') ?>