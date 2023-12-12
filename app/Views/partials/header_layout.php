<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <?php 
        header("X-Frame-Options: DENY");
     ?>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?php echo base_url('') ?>/images/logo_telkom_university.png">
    <!-- Page Title  -->
    <title>SiLo | Sistem Informasi Logistik</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?php echo base_url('') ?>/assets/css/dashlite.css?ver=3.2.0">
    <link id="skin-red" rel="stylesheet" href="<?php echo base_url('') ?>/assets/css/skins/theme-red.css?ver=3.2.0">
     <link rel="stylesheet" href="<?php echo base_url('') ?>/assets/extension/filepond/filepond.css">
        <link rel="stylesheet" href="<?php echo base_url('') ?>/assets/css/filepond.css">
        <link rel="stylesheet" href="<?php echo base_url('') ?>/assets/extension/toastify-js/src/toastify.css">
        <link rel="stylesheet" href="<?php echo base_url('') ?>/assets/extension/filepond-plugin-image-preview/filepond-plugin-image-preview.css">
         <link rel="stylesheet" href="<?php echo base_url('') ?>/assets/css/custom.css">

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css"
        integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css"
        integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/solid.min.css"
        integrity="sha512-yDUXOUWwbHH4ggxueDnC5vJv4tmfySpVdIcN1LksGZi8W8EVZv4uKGrQc0pVf66zS7LDhFJM7Zdeow1sw1/8Jw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/regular.min.css"
        integrity="sha512-WidMaWaNmZqjk3gDE6KBFCoDpBz9stTsTZZTeocfq/eDNkLfpakEd7qR0bPejvy/x0iT0dvzIq4IirnBtVer5A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css">
    <link rel=stylesheet href=https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/style.css>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css"
        integrity="sha512-MQXduO8IQnJVq1qmySpN87QQkiR1bZHtorbJBD0tzy7/0U9+YIC93QWHeGTEoojMVHWWNkoCp8V6OzVSYrX0oQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
         <?php if  ($_SERVER['REQUEST_URI']!='/Silo/User' && $_SERVER['REQUEST_URI']!='/Silo/loanHistory') {?>
         <style type="text/css">     
            .dataTables_wrapper .dataTables_filter {
                float: right;
                position: relative;
                right: 50px;
            /*    right: 30px;*/
            /*    text-align: right*/

            }
            .dataTables_wrapper .dataTables_filter  {
                float: right;
                position: relative;
                right: 50px;
            /*    right: 30px;*/
            /*    text-align: right*/

            }
            .dataTables_wrapper .dataTables_paginate{
              float: right;
                position: relative;
                right: 3px;
                top: 5px;
            }
            .dataTables_wrapper .dataTables_length,
                .dataTables_wrapper .dataTables_filter {
                    margin-bottom: 10px;
                }

            .dataTables_wrapper .dataTables_filter input {
                border: 1px solid #aaa;
                border-radius: 3px;
                padding: 5px;
                background-color: transparent;
                margin-left: 3px;

            }
            @media screen and (max-width: 640px) {

                .dataTables_wrapper .dataTables_length,
                .dataTables_wrapper .dataTables_filter {
                    float: none;
                    text-align: center
                }

                .dataTables_wrapper .dataTables_filter {
                    margin-top: .5em
                }
            }
         </style>
     <?php  } ?>
</head>

<body class="nk-body bg-lighter no-touch nk-nio-theme ui-softy">
    <div class="nk-app-root">
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            <div class="nk-header nk-header-fixed is-theme">
                <div class="container-fluid">
                    <div class="nk-header-wrap">
                        <div class="nk-menu-trigger me-sm-2 d-lg-none">
                            <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em class="icon ni ni-menu"></em></a>
                        </div>
                        <div class="nk-header-brand">
                            <a href="html/index.html" class="logo-link">
                                <img class="logo-light logo-img"  src="<?php echo base_url('') ?>/images/logo_silo_putih.png" srcset="<?php echo base_url('') ?>/images/logo_silo_putih.png 2x" alt="logo">
                                <img class="logo-dark logo-img" src="<?php echo base_url('') ?>/images/logo_silo_putih.png" srcset="<?php echo base_url('') ?>/images/logo_silo_putih.png 2x" alt="logo-dark">
                            </a>
                        </div><!-- .nk-header-brand -->
                        <div class="nk-header-menu ms-auto" data-content="headerNav">
                            <div class="nk-header-mobile">
                                <div class="nk-header-brand">
                                    <a href="html/index.html" class="logo-link">
                                        <img class="logo-light logo-img" src="<?php echo base_url('') ?>/images/logo_silo.png" srcset="<?php echo base_url('') ?>/images/logo_silo.png 2x" alt="logo">
                                        <img class="logo-dark logo-img" src="<?php echo base_url('') ?>/images/logo_silo.png" srcset="<?php echo base_url('') ?>/images/logo_silo.png 2x" alt="logo-dark">
                                    </a>
                                </div>
                                <div class="nk-menu-trigger me-n2">
                                    <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em class="icon ni ni-arrow-left"></em></a>
                                </div>
                            </div>
                            <ul class="nk-menu nk-menu-main ui-s2">
                                <li class="nk-menu-item has-sub">
                                    <a href="<?php echo base_url('Silo') ?>" class="nk-menu-link">
                                        <span class="nk-menu-text">Dashboards</span>
                                    </a>
                                    
                                </li><!-- .nk-menu-item -->
                                <?php if(session()->type!='pegawai') { ?>
                                <li class="nk-menu-item has-sub">
                                    <a href="<?php echo base_url('Silo/MyAsset') ?>" class="nk-menu-link">
                                        <span class="nk-menu-text">My Asset</span>
                                    </a>
                                    
                                </li>
                                 <li class="nk-menu-item has-sub">
                                    <a href="<?php echo base_url('Silo/DataLoan') ?>" class="nk-menu-link">
                                        <span class="nk-menu-text">Loan</span>
                                    </a>
                                    
                                </li><!-- .nk-menu-item -->
                                <?php  if (session()->type=='superadmin') {?>
                                <li class="nk-menu-item has-sub">
                                    <a href="<?php echo base_url('Silo/User') ?>" class="nk-menu-link">
                                        <span class="nk-menu-text">Users </span>
                                    </a>
                                    
                                </li><!-- .nk-menu-item -->
                                 <li class="nk-menu-item has-sub">
                                    <a href="<?php echo base_url('Silo/DataEmployee') ?>" class="nk-menu-link">
                                        <span class="nk-menu-text">Employee </span>
                                    </a>
                                    
                                </li><!-- .nk-menu-item -->
                                 <?php }
                              }  ?>

                               <?php if(session()->type=='pegawai') { ?>
                                <li class="nk-menu-item has-sub">
                                    <a href="<?php echo base_url('Silo/MyLoan') ?>" class="nk-menu-link">
                                        <span class="nk-menu-text">My Loan </span>
                                    </a>
                                    
                                </li>
                               <?php }  ?>
                              <li class="nk-menu-item has-sub">
                                    <a href="<?php echo base_url('Silo/loanHistory') ?>" class="nk-menu-link">
                                        <span class="nk-menu-text">Loan History </span>
                                    </a>
                                    
                                </li>
                                <!-- <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-text">Components</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item has-sub">
                                            <a href="#" class="nk-menu-link">
                                                <span class="nk-menu-text">Ui Elements</span>
                                            </a>
                                            
                                        </li>
                                        
                                    </ul>
                                </li> -->
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-header-menu -->
                        <div class="nk-header-tools">
                            <ul class="nk-quick-nav">
                     
                               <?php if(isset(session()->name_emp)) {?>
                                <li class="dropdown user-dropdown">
                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                        <div class="user-toggle">
                                            <div class="user-avatar sm">
                                                <em class="icon ni ni-user-alt"></em>
                                            </div>
                                        </div>
                                         <div class="user-info d-none d-xl-block" style="padding-left:10px">
                                                <div class="user-status" style="color:white;"><?php echo session()->name_emp ?></div>
                                                <div class="user-name dropdown-indicator" style="color: #fafafa;"><?php echo str_replace('BAGIAN','',str_replace(' KAMPUS JAKARTA', '', session()->unit_emp)) ?></div>
                                            </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1 is-light">
                                        <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                            <div class="user-card">
                                                <div class="user-avatar">
                                                    <span>AB</span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="lead-text"><?php echo session()->name_emp ?></span>
                                                    <!-- <span class="sub-text">sofyan@gmail.com</span> -->
                                                </div>
                                              <!--   <div class="user-action">
                                                    <a class="btn btn-icon me-n2" href="html/user-profile-setting.html"><em class="icon ni ni-setting"></em></a>
                                                </div> -->
                                            </div>
                                        </div>
                                       <?php if (session()->status_pgw=='MAGANG') {?>
                                        <div class="dropdown-inner">
                                            <ul class="link-list">
                                             <!--    <li><a href="html/user-profile-regular.html"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                                <li><a href="html/user-profile-setting.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                                <li><a href="html/user-profile-activity.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li> -->
                                                 <li><a type="button" class="li-menu-user" data-bs-toggle="modal" data-bs-target="#modalunit"><i class="icon fa-solid fa-people-roof"></i><span>My Unit</span></a></li>
                                            </ul>
                                        </div>
                                    <?php } ?>
                                        <div class="dropdown-inner">
                                            <ul class="link-list">
                                                <li><a href="<?php echo base_url('Logout') ?>"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>                                            </ul>
                                        </div>
                                    </div>
                                </li><!-- .dropdown -->
                                <?php } ?>
                            </ul><!-- .nk-quick-nav -->
                        </div><!-- .nk-header-tools -->
                    </div><!-- .nk-header-wrap -->
                </div><!-- .container-fliud -->
            </div>

            <!-- main header @e -->
            <!-- content @s -->
            <?= $this->renderSection('content') ?>
            <!-- content @e -->
            <!-- footer @s -->
            <?= $this->renderSection('footer') ?>
            <!-- footer @e -->
        </div>
        <!-- wrap @e -->
    </div>
    <!-- app-root @e -->
    <!-- select region modal -->

  
                <div class="modal fade " tabindex="-1" id="modalunit">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <em class="icon ni ni-cross"></em>
                                    </a>
                                    <div class="modal-header">
                                        <h5 class="modal-title">Change Unit</h5>
                                    </div>
                                    <div class="modal-body">
                                      
                                            <form id="frmupunit">
                                               
                                                <div class="form-group">
                                                    <label class="form-label" for="cf-full-name">Unit Name</label>
                                                    <input type="text" class="form-control" id="unit_emp" name="unit_emp" value="<?php echo session()->unit_emp; ?>">
                                                    
                                                    <div id="unit_emp-error">
                                                    </div>
                                                </div>
                                                
                                              
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-lg btn-primary" id="buttonChangeUnit" onclick="ChangeUnit()">Save</button>
                                                    <span class="loader" id="loaderChangeUnit" style="display: none;"></span>

                                                </div>
                                            </form>
                                       
                               
                                </div>  
                              
                            </div>
                        </div>
                </div>

            <script type="text/javascript">
                function ChangeUnit()
                    {
                        var form_data = new FormData($('#frmupunit')[0]);

                       $.ajax({
                         url:"<?php echo base_url('changeUnit') ?>",
                         global:false,
                         async:true,
                         type:'post',
                        processData: false,
                         contentType: false,
                         dataType:'json',
                         enctype: "multipart/form-data",
                         data: form_data,
                         beforeSend: function () {
                                    $('#buttonChangeUnit').hide()
                                    $('#loaderChangeUnit').show()
                                  },
                         success : function(e) {
                           if(e.status == 'ok;') 
                           {
                            $('#buttonChangeUnit').show()
                            $('#loaderChangeUnit').hide()
                             let timerInterval
                              Swal.fire({
                                icon: 'success',
                                title: ' Data has been Updated',
                                showConfirmButton: false,
                                timer: 1500,
                                timerProgressBar: true,
                                didOpen: () => {
                                  timerInterval = setInterval(() => {

                                  }, 100)
                                },
                                willClose: () => {
                                  clearInterval(timerInterval)
                                }
                              }).then((result) => {
                                /* Read more about handling dismissals below */
                                if (result.dismiss === Swal.DismissReason.timer) {
                                  location.reload();
                                }
                              })
                          } 
                          else{ 
                             $('#buttonChangeUnit').show()
                            $('#loaderChangeUnit').hide()
                            var msgeror='';
                            console.log(e.data)
                             $.each(e.dataname, function(key, value) {
                                document.getElementById(key+"-error").innerHTML ="";
                              });

                            $.each(e.data, function(key, value) {
                             document.getElementById(key+"-error").innerHTML = `<span class="badge badge-dim bg-danger">`+value+`
                                                                                </span>`;
                          });
                            $('#buttonChangeUnit').show()
                            $('#loaderChangeUnit').hide()
                            $("#modalunit").modal('show');
                         }
                      },
                      error :function(xhr, status, error) {
                       alert(xhr.responseText);
                    }

                 });
                }
                            </script>
</body>

</html>
 
   

