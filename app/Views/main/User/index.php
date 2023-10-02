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
                                                        <li><a href="<?= base_url('User/addUser'); ?>"><span>Add User</span></a></li>
                                                        <li><a href="#"><span>Add Role</span></a></li>
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
                                    foreach($data as $u){ ;?>
                                    <tr>
                                        <td><?= $no++; ;?></td>
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
                                    <?php } ;?>
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