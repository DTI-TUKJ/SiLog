<?= $this->extend('partials/header_layout' ) ?>

<?= $this->section('content') ?>
	        <div class="nk-content ">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title">Asset Status</h3>
                                        <div class="nk-block-des text-soft">
                                            <p>Hubung admin untuk info asset</p>
                                        </div> 
                                    </div><!-- .nk-block-head-content -->
                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">
                                                    <li> 
                                                        <input type="text" class="form-control"  name="search_loan" id="search_loan" placeholder="Search Asset in loan">
                                                    </li>
                                                    <li>
                                                    <select class="form-select" id="s_cat_loan" name="s_cat_loan" onchange="">
                                                         <option value="All">All</option>
                                                         <option value="Ruangan">Ruangan</option>
                                                            <option value="Kendaraan">Kendaraan</option>
                                                         <option value="Zoom">Zoom</option>

                                                    </select>
                                                    </li>
                                                   
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <div class="row g-gs kontenproduk_loan"  id="kontenproduk_loan" style="justify-content: center;">
                                    <div class="col-md-4 subkonten_loan">
                                         <div class="card card-bordered card-full">
                                            <div class="card-inner" style="justify-content:center;display: flex;">
                                                <span>There's no asset in Use</span>
                                               
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                <?php for ($i=0; $i <6 ; $i++) { 
                                        // code...
                                ?>
                                <!--     <div class="col-md-4 subkonten_loan">
                                         <div class="card card-bordered card-full">
                                            <div class="card-inner">
                                                <div class="row g-gs">
                                                    <div class="col-md-3">
                                                      <div class="image-item ">
                                                          <img class="image-content" src="<?php// echo base_url('').'/assets/images/item/example.jpg' ?>" alt="" srcset="" class="profile-img" style="width: 110px;height: 100px;object-fit: cover;margin: 0 auto;">
                                                          </div>
                                                    </div>
                                                    <div class="col-md-9" >
                                                 
                                                            <div class="card-title-group align-start mb-0" style="margin-top: 5px;">
                                                                <div class="card-title">
                                                                    <h6 class="subtitle">Asset Name <?php //echo $i ?></h6>
                                                                </div>
                                                              
                                                            </div>
                                                            <div class="card-amount">
                                                                <span class="amount" style="font-size:20px">Mobil Avanza
                                                                </span>
                                                                
                                                            </div>
                                                          
                                                            <div class="invest-data mt-1">
                                                                <div class="invest-data-amount g-2">
                                                                    
                                                                    <div class="invest-data-history">
                                                                        <div class="title">Status</div>
                                                                        <div class="amount">In Use until <b> 4.00 PM  </b> </div>
                                                                    </div>

                                                                </div>
                                                                
                                                              
                                                            </div>   
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div> -->
                               <?php } ?>
                                  
                                </div>
                                 <nav class="mt-4 pagination-wrap_loan" id="pagination-wrap_loan">
                                   
                                 </nav>
                            </div>
                        </div>
                         <div class="nk-content-body" style="margin-top:30px">
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title">Available Asset</h3>
                                        <div class="nk-block-des text-soft">
                                            <p>Hubung admin untuk info asset</p>
                                        </div>
                                    </div><!-- .nk-block-head-content -->
                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">
                                                      <li> 
                                                        <input type="text" class="form-control"  name="search_available" id="search_available" placeholder="Search Available Asset">
                                                    </li>
                                                    <li>
                                                    <select class="form-select" id="s_cat_available" name="s_cat_available">
                                                         <option value="All">All</option>
                                                         <option value="Ruangan">Ruangan</option>
                                                            <option value="Kendaraan">Kendaraan</option>
                                                         <option value="Zoom">Zoom</option>

                                                    </select>
                                                    </li>
                                                   
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <div class="row g-gs" id="loader_container" style="justify-content: center;">
                                    <span class="loader_front" id="loader_front" style="margin-top:5%;display: none;"></span>
                                </div>
                                <div class="row g-gs kontenproduk"  id="kontenproduk" style="justify-content: center;">
                              
                                    <!-- <span class="loader_front" id="loader_front" style="margin-top:5%;display: none;"></span> -->
                                 
                                </div>
                                <nav class="mt-4 pagination-wrap" id="pagination-wrap">
                                  
                                 </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                 $(document).ready(function(){
                  var param=document.getElementById('s_cat_available').value;
                  // console.log(param)
                  showproduk(param)
                  produk_pagination_loan();
                  
                })

                 $('#s_cat_available').on('change', function() {
                      var paramName = document.getElementById('search_available').value;
                      $('#loader_container').show()
                       document.getElementById("kontenproduk").innerHTML = "";
                        document.getElementById("pagination-wrap").innerHTML = "";
                      showproduk(this.value, 'onchange',paramName )
                });
         const source = document.getElementById('search_available');


          const inputHandler = function(e) {
                        $('#loader_container').show()
                       document.getElementById("kontenproduk").innerHTML = "";
                        document.getElementById("pagination-wrap").innerHTML = "";
              //showproduk(e.target.value);
                        var type=document.getElementById('s_cat_available').value;
                        // console.log(type)
                        $.ajax({
                              url:"<?php echo base_url('showAsset') ?>",
                              global:false,
                              async:true,
                              type:'post',
                              dataType:'json',
                              data: ({
                               searchByName : e.target.value,
                               search : type,

                              }),
                              beforeSend: function () {
                                    $('#loader_front').show()
                                   // $('.subkonten').hide()
                              },
                              success : function(e) {
                                  var html ='';
                                    $('#loader_front').hide()
                                    $('#loader_container').hide()
                                    // $('.subkonten').show()
                                    if (e.data.length!=0){
                                    $.each(e.data, function(key, value) {
                                      // console.log(`ini${value.amount_asset}`)
                                     
                                       html +=`
                                        <div class="col-md-4 subkonten" style="cursor: pointer;">
                                                <div class="card card-bordered card-full">
                                                    <div class="card-inner">
                                                        <div class="row g-gs">
                                                            <div class="col-md-3">
                                                                <div class="image-item ">
                                                                  <img class="image-content" src="<?php echo base_url('').'/assets/images/item/' ?>${value.asset_image}" alt="" srcset="" class="profile-img" style="width: 110px;height: 100px;object-fit: cover;margin: 0 auto;">
                                                                  </div>
                                                                    
                                                            </div>
                                                            <div class="col-md-9" >
                                                         
                                                                    <div class="card-title-group align-start mb-0" style="margin-top: 10px;">
                                                                        <div class="card-title">
                                                                            <h6 class="subtitle">Asset Name</h6>
                                                                        </div>
                                                                      
                                                                    </div>
                                                                    <div class="card-amount">
                                                                        <span class="amount" style="font-size:20px">${value.asset_name}
                                                                        </span>
                                                                        
                                                                    </div>
                                                                    <div class="invest-data">
                                                                        <div class="invest-data-amount g-2">
                                                                            <div class="invest-data-history">
                                                                                <div class="title">Asset Owner</div>
                                                                                <div class="amount">${value.id_owner}</div>
                                                                            </div>
                                                                            <div class="invest-data-history">
                                                                                <div class="title">Available Unit</div>
                                                                                <div class="amount">${value.amount_asset}</span></div>
                                                                            </div>

                                                                        </div>

                                                                      
                                                                    </div> 
                                                                    <div class="invest-data mt-1">
                                                                        <div class="invest-data-amount g-2">
                                                                            <div class="invest-data-history">
                                                                                <div class="title">Description</div>
                                                                                <div class="amount">${value.description} dinas</div>
                                                                            </div>
                                                                       
                                                                        </div>
                                                                      
                                                                    </div>   
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                </div><!-- .card -->
                                            </div><!-- .col -->

                                            `;
                                    });
                                    }else{
                                        html +=` <div class="col-md-4 subkonten">
                                         <div class="card card-bordered card-full">
                                            <div class="card-inner" style="justify-content:center;display: flex;">
                                                <span>There's no Available Asset</span>
                                               
                                            </div>
                                        </div><!-- .card -->
                                    </div>`
                                    }  
                                     $('#kontenproduk').html(html);

                                     document.getElementById("pagination-wrap").innerHTML = "";
                                     produk_pagination_available();
                                    

                                      
                                  
                              },
                              error :function(xhr, status, error) {
                               alert(xhr.responseText);
                              }

                            })
                }

          source.addEventListener('input', inputHandler);
          source.addEventListener('propertychange', inputHandler);


            function showproduk(search, select='', paramName=null){
                  $.ajax({
                    url:"<?php echo base_url('showAsset') ?>",
                    global:false,
                    async:true,
                    type:'post',
                    dataType:'json',
                    data: ({
                     search : search,
                     searchByName:paramName
                    }),
                     beforeSend: function () {
                                    
                                    $('#loader_front').show()
                                    
                              },
                    success : function(e) {
                        var html ='';
                             $('#loader_front').hide()
                             $('#loader_container').hide()
                         if (e.data.length!=0){
                          $.each(e.data, function(key, value) {
                            // console.log(`ini${value.amount_asset}`)
                             // if (value.amount_asset>0){
                             //  var label = 'bg-label-success';
                             //  var disabled ='';
                             // }else{
                             //   var label = 'bg-label-danger';
                             //  var disabled ='disabled';
                             // }
                             html +=`
                                        <div class="col-md-4 subkonten" id="subkonten">
                                                <div class="card card-bordered card-full">
                                                    <div class="card-inner">
                                                        <div class="row g-gs">
                                                            <div class="col-md-3">
                                                                <div class="image-item ">
                                                                  <img class="image-content" src="<?php echo base_url('').'/assets/images/item/' ?>${value.asset_image}" alt="" srcset="" class="profile-img" style="width: 110px;height: 100px;object-fit: cover;margin: 0 auto;">
                                                                  </div>
                                                                    
                                                            </div>
                                                            <div class="col-md-9" >
                                                         
                                                                    <div class="card-title-group align-start mb-0" style="margin-top: 10px;">
                                                                        <div class="card-title">
                                                                            <h6 class="subtitle">Asset Name</h6>
                                                                        </div>
                                                                      
                                                                    </div>
                                                                    <div class="card-amount">
                                                                        <span class="amount" style="font-size:20px">${value.asset_name}
                                                                        </span>
                                                                        
                                                                    </div>
                                                                    
                                                                    <div class="invest-data ">
                                                                        <div class="invest-data-amount g-2">
                                                                            <div class="invest-data-history">
                                                                                <div class="title">Description</div>
                                                                                <div class="amount">${value.description} dinas</div>
                                                                            </div>
                                                                       
                                                                        </div>
                                                                      
                                                                    </div>   
                                                                    
                                                                     <div class="invest-data mt-1">
                                                                        <div class="invest-data-amount g-2">
                                                                            
                                                                            <div class="invest-data-history">
                                                                                <div class="title">Available Unit</div>
                                                                                <div class="amount">${value.amount_asset}</span></div>
                                                                            </div>
                                                                            <div class="invest-data-history" >
                                                                                
                                                                                <div class="amount mt-3" style="margin-left:15%">
                                                                                <a href="#" class="btn btn-round btn-sm btn-info">Check Schedule</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                      
                                                                    </div>
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                </div><!-- .card -->
                                            </div><!-- .col -->

                                  `;
                          });
                        }else{
                            html +=` <div class="col-md-4 subkonten_loan">
                                         <div class="card card-bordered card-full">
                                            <div class="card-inner" style="justify-content:center;display: flex;">
                                                <span>There's no Available Asset</span>
                                               
                                            </div>
                                        </div><!-- .card -->
                                    </div>`
                        }

                           $('#kontenproduk').html(html);
                            document.getElementById("pagination-wrap").innerHTML = "";
                            produk_pagination_available();
                            
                        
                    },
                    error :function(xhr, status, error) {
                     alert(xhr.responseText);
                    }

                  })

                }

                function produk_pagination_available() {
                $(function () {
                            var numberOfitem=$('.kontenproduk .subkonten ').length;
                            var limitPerpage=6;
                            var totalPages=Math.ceil(numberOfitem/limitPerpage);
                            var paginationSize=5;
                            var currentPage;

                            function showPage_available(whichPage) {
                                if(whichPage<1 || whichPage>totalPages) return false;

                                currentPage = whichPage;

                                $('.kontenproduk .subkonten ').hide().slice((currentPage-1)*limitPerpage, currentPage*limitPerpage).show();
                                $('.pagination-wrap li').slice(1,-1).remove();

                                // var halaman=1;
                                // var cek=getPageList(totalPages, currentPage, paginationSize);
                                // console.log(cek);
                                getPageList(totalPages, currentPage, paginationSize).forEach(item => {

                                  $("<li>").addClass("page-item").addClass(item ? "current-page" : "dots").toggleClass("active", item === currentPage).append($("<a>").addClass("page-link")
                                  .attr({href: "javascript:void(0)"}).text(item || "...")).insertBefore(".next");

                                });

                                 $(".prev").toggleClass("disable", currentPage === 1);
                                $(".next").toggleClass("disable", currentPage === totalPages);
                                return true;
                            }
                           //console.log(numberOfitem); 

                            $(".pagination-wrap").append(
                                 $("<ul>").append(
                                    $("<li>").addClass("page-item").addClass("prev").append($("<a>").addClass('page-link').attr({href: "javascript:void(0)"}).append($("<i>").addClass("icon fa-solid fa-circle-arrow-left"))),
                                 $("<li>").addClass("page-item").addClass("next").append($("<a>").addClass('page-link').attr({href: "javascript:void(0)"}).append($("<i>").addClass("icon fa-solid fa-circle-arrow-right")))
                                    ).addClass("pagination justify-content-center"));

                            $(".kontenproduk").show();
                            showPage_available(1); 
                            $(document).on("click", ".pagination-wrap li.current-page:not(.active)", function(){
                                return showPage_available(+$(this).text());
                              });
                            
                              $(".next").on("click", function(){
                                return showPage_available(currentPage + 1);
                              });
                            
                              $(".prev").on("click", function(){
                                return showPage_available(currentPage - 1);
                              });      
                        });
            }

            function produk_pagination_loan() {
                $(function () {
                            var numberOfitem=$('.kontenproduk_loan .subkonten_loan ').length;
                            var limitPerpage=3;
                            var totalPages=Math.ceil(numberOfitem/limitPerpage);
                            var paginationSize=5;
                            var currentPage;

                            function showPage_loan(whichPage) {
                                if(whichPage<1 || whichPage>totalPages) return false;

                                currentPage = whichPage;

                                $('.kontenproduk_loan .subkonten_loan').hide().slice((currentPage-1)*limitPerpage, currentPage*limitPerpage).show();
                                $('.pagination-wrap_loan li').slice(1,-1).remove();

                                // var halaman=1;
                                // var cek=getPageList(totalPages, currentPage, paginationSize);
                                // console.log(cek);
                                getPageList(totalPages, currentPage, paginationSize).forEach(item => {

                                  $("<li>").addClass("page-item").addClass(item ? "current-page" : "dots").toggleClass("active", item === currentPage).append($("<a>").addClass("page-link")
                                  .attr({href: "javascript:void(0)"}).text(item || "...")).insertBefore(".next_loan");

                                });

                                 $(".prev_loan").toggleClass("disable", currentPage === 1);
                                $(".next_loan").toggleClass("disable", currentPage === totalPages);
                                return true;
                            }
                           //console.log(numberOfitem); 

                            $(".pagination-wrap_loan").append(
                                 $("<ul>").append(
                                    $("<li>").addClass("page-item").addClass("prev_loan").append($("<a>").addClass('page-link').attr({href: "javascript:void(0)"}).append($("<i>").addClass("icon fa-solid fa-circle-arrow-left"))),
                                    $("<li>").addClass("page-item").addClass("next_loan").append($("<a>").addClass('page-link').attr({href: "javascript:void(0)"}).append($("<i>").addClass("icon fa-solid fa-circle-arrow-right")))
                                ).addClass("pagination justify-content-center"));

                            $(".kontenproduk_loan").show();
                            showPage_loan(1); 
                            $(document).on("click", ".pagination-wrap_loan li.current-page:not(.active)", function(){
                                return showPage_loan(+$(this).text());
                              });
                            
                              $(".next_loan").on("click", function(){
                                return showPage_loan(currentPage + 1);
                              });
                            
                              $(".prev_loan").on("click", function(){
                                return showPage_loan(currentPage - 1);
                              });      
                        });
            }

            function getPageList(totalPages, page, maxLength){
                  function range(start, end){
                    return Array.from(Array(end - start + 1), (_, i) => i + start);
                  }
                
                  var sideWidth = maxLength < 9 ? 1 : 2;
                  var leftWidth = (maxLength - sideWidth * 2 - 3) >> 1;
                  var rightWidth = (maxLength - sideWidth * 2 - 3) >> 1;
                  console.log(sideWidth);
                
                  if(totalPages <= maxLength){
                    return range(1, totalPages);
                  }
                
                  if(page <= maxLength - sideWidth - 1 - rightWidth){
                    return range(1, maxLength - sideWidth - 1).concat(0, range(totalPages - sideWidth + 1, totalPages));
                  }
                
                  if(page >= totalPages - sideWidth - 1 - rightWidth){
                    return range(1, sideWidth).concat(0, range(totalPages- sideWidth - 1 - rightWidth - leftWidth, totalPages));
                  }
                
                  return range(1, sideWidth).concat(0, range(page - leftWidth, page + rightWidth), 0, range(totalPages - sideWidth + 1, totalPages));
                }
            </script>

<?= $this->endSection() ?>


<?= $this->extend('partials/footer_layout' ) ?>
