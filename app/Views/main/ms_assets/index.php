<?= $this->extend('partials/header_layout') ?>

<?= $this->section('content') ?>

<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Assets List</h3>
       
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <div class="drodown">
                                                <a href="" title="tambah data" class="dropdown-toggle btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#modaltambah"><em class="icon ni ni-plus"></em></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .toggle-wrap -->
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="card card-bordered card-preview">
                                        <div class="card-inner">
                                           
                                            <table class=" nk-tb-list nk-tb-ulist table" data-auto-responsive="false" id="example" style="min-width:1425px;">
                                                <thead>
                                                    <tr class="nk-tb-item nk-tb-head">
                                                      <!--   <th class="nk-tb-col nk-tb-col-check">
                                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                <input type="checkbox" class="custom-control-input" id="uid">
                                                                <label class="custom-control-label" for="uid"></label>
                                                            </div>
                                                        </th> -->
                                                        <th class="nk-tb-col"><span class="sub-text">Asset Name</span></th>
                                                       
                                                        <th class="nk-tb-col"><span class="sub-text">Asset Type</span></th>
                                                        <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                                                        <th class="nk-tb-col"><span class="sub-text">Asset Amount</span></th>
                                                        <th class="nk-tb-col"><span class="sub-text">Owner</span></th>
                                                        <th class="nk-tb-col ">action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                      <!--  <td class="nk-tb-col nk-tb-col-check">
                                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                <input type="checkbox" class="custom-control-input" id="uid1">
                                                                <label class="custom-control-label" for="uid1"></label>
                                                            </div>
                                                        </td> -->
                                                         <!--       <ul class="list-status">
                                                                <li><em class="icon text-success ni ni-check-circle"></em> <span>Email</span></li>
                                                                <li><em class="icon ni ni-alert-circle"></em> <span>KYC</span></li>
                                                            </ul> -->
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
                <h5 class="modal-title">Add Asset</h5>
            </div>
            <div class="modal-body">

              

                    <form id="frmtambah">
                      <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="full-name-1">Asset Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="full-name-1" name="asset_name" value="<?php echo set_value('asset_name') ?>" placeholder="Enter Name">
                                    <div id="nama-error">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="email-address-1">Description</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="email-address-1" name="description" value="<?php echo set_value('email') ?>" placeholder="Enter Description">
                                </div>
                                <div id="description-error">

                                </div>
                            </div>
                        </div>
                         <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="asset_type_select">Asset Type</label>
                                <div class="form-control-wrap">
                                     <select class="form-select" id="asset_type_select" name="asset_type" onchange="">
                                        <option value="">-Pilih Type-</option>
                                         <option value="Ruangan">Ruangan</option>
                                        <option value="Kendaraan">Kendaraan</option>
                                         <option value="Zoom">Zoom</option>
                                    </select>
                                </div>
                                <div id="asset_type_select-error">

                                </div>
                            </div>
                        </div>
                         
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="asset_status">Asset Status</label>
                                <div class="form-control-wrap">
                                     <select class="form-select" id="asset_status" name="asset_type" onchange="">
                                         <option value="Ruangan">Ready</option>
                                        <option value="Kendaraan">Maintenance</option>

                                    </select>
                                </div>
                                <div id="asset_status-error">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="asset_owner">Asset Owner</label>
                                <div class="form-control-wrap">
                                     <select class="form-select" id="asset_owner" name="asset_owner" <?= session()->type != 'superadmin'? 'readonly':'' ?>>
                                        <?php if (session()->type=='superadmin') {?>

                                            <option value="">-Pilih Type-</option>
                                             <?php foreach ($data_owner as  $val) { 
                                                if ($val['type']!='superadmin') {
                                                    ?>
                                               

                                             <option value="<?php echo $val['id'] ?>"><?php echo $val['type'] ?></option>
                                                <?php  }
                                                } 
                                            }else{
                                                ?>
                                                <option value="<?php echo session()->id ?>"><?php echo session()->type ?></option>
                                            <?php } ?>
                                        
                                    </select>
                                </div>
                                <div id="asset_owner-error">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="WhatsApp">Asset Amount</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control"  name="asset_amount" id="WhatsApp" placeholder="Enter Amount">
                                </div>
                                <div id="wa-error">

                                </div>
                            </div>
                        </div>
             
                  

                        
                            <div class="form-group">
                                <label class="form-label" for="pay-amount-1">Asset Image (Opotional)</label>
                                <div class="form-control-wrap">
                                     <input type="file" class="image-preview-filepond" accept="image/*">
                                    <div id="signature-error">

                                    </div>
                                  
                                </div>
                               
                            </div>
                       

                        <div class="col-12">
                            <div class="form-group">
                                <button type="button" class="btn btn-lg btn-primary" id="buttonsave" onclick="addAsset()">Save</button>
                                <span class="loader" id="loader" style="display: none;"></span>

                            </div>
                        </div>
                    </div>
                </form>

        </div>

    </div>
</div>
</div>

<script type="text/javascript">
     function calldata() {
        $('#example').DataTable({
        scrollX:true,
        "processing":false,
        "serverSide":true,
        "order":false,
        "lengthMenu": [30, 60, 90, 120], 
        "pageLength": 30,
        "ajax" : {
            url : '<?php echo base_url('callDataJson') ?>',
            type: "POST",
            // data : function(data){
            //     // data.periode =document.getElementById('bulan').value;
            // }

        },
        "columnDefs":[{
            "targets":'_all',
            "orderable":false,
            // render: $.fn.dataTable.render.html()
        }]
     });
    }

     function reloadtable() {

        $('#example').dataTable().fnDraw(false)

    }

      $(document).ready(function () {
            calldata();

               $("#asset_type_select").select2({
                dropdownParent: $("#modaltambah"),
                minimumResultsForSearch: -1
              });
               $("#asset_status").select2({
                dropdownParent: $("#modaltambah"),
                minimumResultsForSearch: -1
              });
               $("#asset_owner").select2({
                dropdownParent: $("#modaltambah"),
                // minimumResultsForSearch: -1
              });

     FilePond.registerPlugin(FilePondPluginFileValidateType);
     FilePond.registerPlugin(FilePondPluginImagePreview);
      FilePond.registerPlugin(FilePondPluginFileValidateSize);

     FilePond.create(document.querySelector(".image-preview-filepond"), {
          credits: null,
          allowImagePreview: true,
          allowImageFilter: false,
          allowImageExifOrientation: false,
          required: true,
          allowImageCrop: false,
          name: 'asset_image',
          storeAsFile:true,
          labelIdle:  'Upload Asset Image (jpg,png,jpeg)',
          acceptedFileTypes: ["image/png", "image/jpg", "image/jpeg"],
          fileValidateTypeDetectType: (source, type) =>
            new Promise((resolve, reject) => {
              // Do custom type detection here and return with promise
              resolve(type);
            }),
        });
      })

// function addAsset(){
//         var form_data = new FormData($('#frmtambah')[0]);
//                $.ajax({
//                  url:"<?php echo base_url('addPegawai') ?>",
//                  global: false,
//                 async: true,
//                 type: 'post',
//                 processData: false,
//                 contentType: false,
//                 dataType: 'json',
//                 enctype: "multipart/form-data",
//                 data: form_data,
//                 beforeSend: function () {
//                     $('#buttonsave').hide()
//                     $('#loader').show()
//                   },
//                  success : function(e) {
//                    if(e.status == 'ok;') 
//                    {
//                         $('#buttonsave').show()
//                          $('#loader').hide()
//                     let timerInterval
//                       Swal.fire({
//                         icon: 'success',
//                         title: ' Data has been Saved',
//                         showConfirmButton: false,
//                         timer: 1500,
//                         timerProgressBar: true,
//                         didOpen: () => {
                          
//                           timerInterval = setInterval(() => {

//                           }, 100)
//                         },
//                         willClose: () => {
//                           clearInterval(timerInterval)
//                         }
//                       }).then((result) => {
                        
//                         /* Read more about handling dismissals below */
//                         if (result.dismiss === Swal.DismissReason.timer) {
                             
//                          location.reload();
//                         }
//                       })
                    
//                   } 
//                   else{ 
//                    // console.log(e.dataname);
//                      $('#buttonsave').show()
//                          $('#loader').hide()
//                       $.each(e.dataname, function(key, value) {
//                         document.getElementById(key+"-error").innerHTML ="";
//                       });
//                     $.each(e.data, function(key, value) {
                     
                      
//                      document.getElementById(key+"-error").innerHTML = `<span class="badge badge-dim bg-danger" style="">`+value+`
//                                                                         </span>`;
//                   });
//                         document.getElementById("signature_m-error").innerHTML ="";
                       
//                     $('#buttonsave').show()
//                     $('#loader').hide()
//                     $("#modaltambah").modal('show');
//                  }
//               },
//               error :function(xhr, status, error) {
//                alert(xhr.responseText);
//             }

//          });
//     }

</script>

<?= $this->endSection() ?>


<?= $this->extend('partials/footer_layout') ?>