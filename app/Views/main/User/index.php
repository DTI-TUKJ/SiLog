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
                                <p>You have total <?= $total; ?> admin users.</p>
                            </div>
                            <?= session()->getFlashdata('errorAdminName') ?>
                            <?= session()->getFlashdata('errorUsername') ?>
                            <?= session()->getFlashdata('errorPassword') ?>
                            <?= session()->getFlashdata('errorUserType') ?>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-bs-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li>
                                                            <a href="" title="tambah data" data-bs-toggle="modal" data-bs-target="#modaltambah"><span>Add <?= $title; ?></span></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><span>Add Role</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .toggle-wrap -->
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                    <div class="card card-bordered card-preview">
                        <div class="card-inner">
                            <table class="datatable-init table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Type</th>
                                        <th>Input date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $u) {; ?>
                                        <tr>
                                            <td><?= $no++;; ?></td>
                                            <td><?= $u['Admin_name'] ?></td>
                                            <td><?= $u['username'] ?></td>
                                            <td><?= $u['password_plain'] ?></td>
                                            <td><?= $u['type'] ?></td>
                                            <td><?= $u['input_date'] ?></td>
                                            <td>
                                                <a href="#" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="#" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php }; ?>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- .card-preview -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<div class="modal fade " role="dialog" aria-hidden="true" id="modaltambah">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">Add User</h5>
            </div>
            <div class="modal-body">
                <!-- <form id="frmtambah"> -->
                <?= form_open('User/simpanData'); ?>
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="adminName">Admin Name</label>
                            <div class="form-control-wrap">
                                <?= form_input('adminName', '', [
                                    'class' => 'form-control',
                                    'id'    => 'adminName',
                                    'autofocus'     => true,
                                    'placeholder'   => 'Enter Admin Name'
                                ]) ;?>
                            </div>
                            <!-- <div id="asset_status-error"></div> -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="username">Username</label>
                            <div class="form-control-wrap">
                                <!-- <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('asset_name') ?>" placeholder="Enter Name"> -->
                                <?= form_input('username', '', [
                                    'class'         => 'form-control',
                                    'id'            => 'username',
                                    'placeholder'   => 'Enter Username..'
                                ]); ?>
                                <!-- <div id="nama-error"></div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="password">Password</label>
                            <div class="form-control-wrap">
                                <!-- <input type="text" class="form-control" id="email-address-1" name="description" value="<?php echo set_value('email') ?>" placeholder="Enter Description"> -->
                                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                </a>
                                <?= form_input('password', '', [
                                    'class'         => 'form-control',
                                    'id'            => 'password',
                                    'placeholder'   => 'Enter Password..'
                                ]); ?>
                            </div>
                            <!-- <div id="description-error"></div> -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="userType">User Type</label>
                            <div class="form-control-wrap">
                                <!-- <select class="form-select" id="asset_type_select" name="asset_type" onchange="">
                                    <option value="">-Pilih Type-</option>
                                    <option value="Ruangan">Ruangan</option>
                                    <option value="Kendaraan">Kendaraan</option>
                                    <option value="Zoom">Zoom</option>
                                </select> -->
                                <?= form_input('userType', '', [
                                    'class'         => 'form-control',
                                    'id'            => 'userType',
                                    'placeholder'   => 'Enter User Type'
                                ]); ?>
                            </div>
                            <!-- <div id="asset_type_select-error"></div> -->
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <!-- <button type="button" class="btn btn-lg btn-primary" id="buttonsave" onclick="addAsset()">Save</button> -->
                            <?= form_submit('', 'submit', [
                                'class' => 'btn btn-lg btn-primary'
                            ]) ;?>
                            <span class="loader" id="loader" style="display: none;"></span>

                        </div>
                    </div>
                </div>
                <?= form_close() ;?>
                <!-- </form> -->
            </div>

        </div>
    </div>


    <?= $this->endSection() ?>


    <?= $this->extend('partials/footer_layout') ?>