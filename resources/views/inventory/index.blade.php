<!DOCTYPE html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport"content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Inventory | Toko Alat Tulis</title>
  @include('panel.style')
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      @include('panel.sidebar')
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">

        <!-- Navbar -->
        @include('panel.navbar')
        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row mb-4">
              <div class="col-12 col-md-6 align-self-center">
                <div class="d-sm-flex py-3">
                  <h4 class="fw-bold mb-0">
                    <span class="text-muted fw-light">Dashboard / </span>
                    Inventory
                  </h4>
                </div>
              </div>
              <div class="col-12 col-md-6 align-self-center text-center text-sm-end">
                <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#newProduct">
                  <span class="tf-icons bx bx-plus-circle"></span>
                  New Product
                </button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newSubstract">
                  <span class="tf-icons bx bx-plus-circle"></span>
                  Product Substract
                </button>
              </div>
            </div>
            <!-- Table Card -->
            <div class="card py-3">
              <div class="row px-3">
                <!-- Search -->
                <div class="col">
                  <div class="d-flex align-items-center">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input type="text" id="search" class="form-control border-0 shadow-none" placeholder="Search..."
                      aria-label="Search..." />
                  </div>
                </div>

                <div class="col">
                  <div class="row g-2">
                    <!-- Button Delete -->
                    <div class="col text-end">
                      <button type="button" id="btn_delete" class="btn btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target="#deleteModal">
                        <span class="tf-icons bx bx-trash"></span>&nbsp; Delete
                      </button>
                    </div>

                    <!-- Sort by -->
                    <!-- <div class="col-3">
                      <select class="form-select" id="sortby" name="sortby" aria-label="Sort by">
                        <option selected disabled value="">Sort by</option>
                        <option value="1">Name A-Z</option>
                        <option value="2">Name Z-A</option>
                        <option value="3">Low Price</option>
                        <option value="4">High Price</option>
                      </select>
                    </div> -->
                  </div>
                </div>

              </div>
              <!-- Table Body -->
              <div class="table-responsive text-nowrap py-3">
                <table class="table table-striped" id="datatable">
                  <thead>
                    <tr>
                      <th style="width: 5%;">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="1" id="allcheck">
                        </div>
                      </th>
                      <th style="width: 20%;">Product</th>
                      <th style="width: 20%;">Category</th>
                      <th style="width: 15%;">Buy Price</th>
                      <th style="width: 15%;">Sell Price</th>
                      <th style="width: 15%;">Description</th>
                      <th style="width: 5%;">Stock</th>
                      <th style="width: 5%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- / Content -->

          <!-- Footer -->
          @include('panel.footer')
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Modal New Product -->
  <div class="modal fade" id="newProduct" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">New Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form id="formnewproduct">
        <!-- Modal Body -->
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="productName" class="form-label">Product Name</label>
              <input required type="text" name="productName" id="productName" class="form-control" placeholder="Enter Product Name" />
            </div>
          </div>
          <div class="row g-md-2">
            <div class="col-md-6 mb-3">
              <label for="category" class="form-label">Category</label>
              <select required class="form-select" id="categories" name="categories" aria-label="Select Category">
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label for="stock" class="form-label">Stock</label>
              <input required type="number" name="stock" id="stock" class="form-control" placeholder="ex: 99" />
            </div>
          </div>
          <div class="row g-md-2">
            <div class="col-md-6 mb-3">
              <label for="buyPrice" class="form-label">Buy Price</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text">Rp</span>
                <input required type="number" name="buyPrice" id="buyPrice" class="form-control" placeholder="ex: 15000"
                  aria-label="Buy Price" />
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="sellPrice" class="form-label">Sell Price</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text">Rp</span>
                <input required type="number" name="sellPrice" id="sellPrice" class="form-control" placeholder="ex: 20000"
                  aria-label="Sell Price" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col mb-0">
              <label for="description" class="form-label">Description</label>
              <textarea required class="form-control" id="description" rows="3" id="description" name="description"></textarea>
            </div>
          </div>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Cancel
          </button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal New Substract -->
  <div class="modal fade" id="newSubstract" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Product Substract</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Modal Body -->
        <form id="formSubstract">
        <div class="modal-body">
          <div class="row g-md-2">
            <div class="col-md-6 mb-3">
              <label for="substractQty" class="form-label">Qty</label>
              <input required type="number" id="substractQty" name="substractQty" class="form-control" min="1" placeholder="ex: 99" />
            </div>
            <div class="col-md-6 mb-3">
              <label for="substractCategories" class="form-label">Category</label>
              <select required class="form-select" id="substractCategories" name="substractCategories" aria-label="Select Category">
                <option value="">-- Select Category --</option>
                @if(isset($category) && !empty($category))
                @foreach($category as $rw)
                <option value="{{$rw['id']}}">{{$rw['categories_name']}}</option>
                @endforeach
                @endif
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col mb-3">
              <label for="substractProduct" class="form-label">Product</label>
              <select required class="form-select select-product" id="substractProduct" name="substractProduct" aria-label="Select Product"
                style="width: 100%;">
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col mb-0">
              <label for="substractDesc" class="form-label">Description</label>
              <textarea required class="form-control" id="substractDesc" name="substractDesc" rows="3"></textarea>
            </div>
          </div>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Cancel
          </button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Edit Product -->
  <div class="modal fade" id="editProduct" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Edit Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Modal Body -->
        <form id="formEdit">
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="productName" class="form-label">Product Name</label>
              <input type="hidden" id="idEdit" name="idEdit" required>
              <input type="text" id="productNameEdit" required name="productNameEdit" class="form-control" value="Product 1"
                placeholder="Enter Product Name" />
            </div>
          </div>
          <div class="row g-md-2">
            <div class="col-md-6 mb-3">
              <label for="categoriesEdit" class="form-label">Category</label>
              <select class="form-select" required id="categoriesEdit" name="categoriesEdit" aria-label="Select Category">
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label for="stockEdit" class="form-label">Stock</label>
              <input type="number" id="stockEdit" name="stockEdit" class="form-control" required placeholder="ex: 99" />
            </div>
          </div>
          <div class="row g-md-2">
            <div class="col-md-6 mb-3">
              <label for="buyPriceEdit" class="form-label">Buy Price</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text">Rp</span>
                <input type="number" id="buyPriceEdit" name="buyPriceEdit" class="form-control" required placeholder="ex: 15000"
                  aria-label="Buy Price" />
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="sellPriceEdit" class="form-label">Sell Price</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text">Rp</span>
                <input type="number" id="sellPriceEdit" name="sellPriceEdit" class="form-control" required placeholder="ex: 20000"
                  aria-label="Sell Price" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col mb-0">
              <label for="descriptionEdit" class="form-label">Description</label>
              <textarea required class="form-control" id="descriptionEdit" name="descriptionEdit" rows="3" placeholder="Enter Description..."></textarea>
            </div>
          </div>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Cancel
          </button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>

      </div>
    </div>
  </div>

  <!-- Modal Delete Conformation -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <div class="col">
            <h5 class="modal-title text-center" id="modalCenterTitle">Delete Confirmation</h5>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Modal Body -->
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <p class="mb-0 text-center">Are you surewant to delete this item?</p>
            </div>
          </div>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
          <button type="button" id="delete_multi" name="delete_multi" class="btn btn-primary">Okay</button>
        </div>

      </div>
    </div>
  </div>
  @include('panel.script')

  <script type="text/javascript">
    let key = '';
    let sort= '';

    $('#substractProduct').select2({
      placeholder: 'Select Product',
      allowClear: 'true',
      dropdownParent: '#newSubstract',
      closeOnSelect: true,
      ajax: {
            method : "GET",
            url: "{{asset('/optproduct')}}",
            dataType: "JSON", 
            data: function (params) {
                return {
                keyword: params.term,
                category  : $('#substractCategories').val()
                };
            },
            processResults: function (data, params) {
                return {
                results: data.result
                };
            },
            cache: true,
        }
    });

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

    showlist();
    function showlist(){
      $.ajax({
        type : 'GET',
        url  : `<?= asset('listinventory') ?>`,
        data : {
          keyword : key,
          sortby  : sort
        },
        contentType: "application/json",
        success: function(data){
          let dataTableData = []
          if(data.ERR == false){
            if(data.DATA.length != 0){
              data.DATA.map(n => {
                  let buy = formatRupiah(n.buy_price.toString(),'Rp. ');
                  let sell = formatRupiah(n.sell_price.toString(),'Rp. ');
                  dataTableData.push([
                      `<div class="form-check">
                           <input class="form-check-input check" onclick="checkbuttondel()" name="check[]" id="check${n.id}" type="checkbox" value="${n.id}">
                      </div>`,
                      n.product_name,
                      n.categories_name,
                      buy,
                      sell,
                      n.description,
                      n.stock,
                      `<div class="dropdown">
                           <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                             <i class="bx bx-edit"></i>
                           </button>
                           <div class="dropdown-menu">
                             <button class="dropdown-item" onclick="showmodalEdit(${n.id})">
                               <i class="bx bx-edit-alt me-1"></i>
                               Edit
                             </button>
                             <button class="dropdown-item" onclick="deletes(${n.id})" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                               Delete</button>
                           </div>
                         </div>`

                    ])
                })
            }
            $('#datatable').DataTable().destroy();
              $('#datatable').DataTable({
                        data: dataTableData,
                        bPaginate: true,
                        bLengthChange :false,
                        bFilter : false,
                        bInfo : true,
                        bAutoWidth : true,
                        columns: [{
                                title: `<div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" onclick="allcheck()" id="allcheck">
                                      </div>`,
                                sorting   : false,
                                orderable : false,
                            },
                            {
                                title: 'Product'
                            },
                            {
                                title: 'Category'
                            },
                            {
                                title: 'Buy Price'
                            },
                            {
                                title: 'Sell Price'
                            },
                            {
                                title: 'Description'
                            },
                            {
                                title: 'Stock'
                            },
                            {
                                title: 'Action'
                            },
                        ],
                    })
          }
        }
      });
    }

    function showmodalEdit(id){
      event.preventDefault();
      $.ajax({
        type:'GET',
        url: `{{asset('inventory')}}/${id}`,
        data: null,
        error:function(e){
          console.log(e);
        },
        success:function(res){
          if(res.ERR == false){
            let data  = res.DATA;
            console.log(data);
            $('#editProduct').modal('show');
            $('#idEdit').val(data.id);
            $('#productNameEdit').val(data.product_name);
            $('#categoriesEdit').val(data.categories);
            $('#stockEdit').val(data.stock);
            $('#buyPriceEdit').val(data.buy_price);
            $('#sellPriceEdit').val(data.sell_price);
            $('#descriptionEdit').val(data.description);
          }else{
          console.log(res);
          }
        }
      });
    }
    $('#search').on('keyup', function(e){
      key = document.querySelector('#search').value;
      sort = sort;
      showlist();
    });

    
    $('#sortby').on('change', function(e){
      key = document.querySelector('#search').value;
      sort = sort;
      showlist();
    });

    function allcheck(){
      allval = document.querySelector('#allcheck').value;
      if(allval == 1){
        $('.check').attr('checked', true);
        document.querySelector('#allcheck').value = 0;
      }else{
        $('.check').attr('checked', false);
        document.querySelector('#allcheck').value = 1;
      }
      checkbuttondel();
    }

    checkbuttondel();
    function checkbuttondel(){
      let select = new Array();
      $('input[name="check[]"]:checked').each(function() {
        select.push(this.value);
      });
      if(select.length == 0){
        $('#btn_delete').attr('disabled', true);
      }else{
        $('#btn_delete').attr('disabled', false);
      }
    }

    function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            hasil = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
            separator = sisa ? "." : "";
            hasil += separator + ribuan.join(".");
            }

            hasil = split[1] != undefined ? hasil + "," + split[1] : hasil;
            return prefix == undefined ? hasil : hasil ? "Rp. " + hasil : "";
        }

    

    function editmodal(cid, cname){
      $('#editCategory').modal('show');
      $('#categoryIdedit').val(cid);
      $('#categoryNameedit').val(cname);
    }

    $('#formnewproduct').submit(async function(e){
      e.preventDefault();
      var formcreate = $('#formnewproduct').serialize();

      $.ajax({
        type:'POST',
        url: "{{route('createinventory')}}",
        data: formcreate,
        error:function(e){
          console.log(e);
        },
        success:function(res){
          if(res == 1){
            $('#newProduct').modal('hide');
            $("#formnewproduct").trigger("reset");
            $('#categories').empty();
            Swal.fire({
                type: "success",
                title: 'Success',
                text: 'Success Create Product',
                confirmButtonClass: 'btn btn-success',
            }).then(() => {
              showlist();
            })
          }else{
            $('#newProduct').modal('hide');
            Swal.fire({
                type: "error",
                title: 'Failed',
                text: 'Failed Create Product'
            })
          }
        }
      });
    });

    $('#formSubstract').submit(async function(e){
      e.preventDefault();
      var formcreate = $('#formSubstract').serialize();

      $.ajax({
        type:'POST',
        url: "{{route('createsubstract')}}",
        data: formcreate,
        error:function(e){
            $('#newSubstract').modal('hide');
            Swal.fire({
                type: "error",
                title: 'Failed',
                text: 'Failed Create Substract'
            })
        },
        success:function(res){
          if(res == 1){
            $('#substractProduct').empty();
            $('#newSubstract').modal('hide');
            $("#formSubstract").trigger("reset");
            Swal.fire({
                type: "success",
                title: 'Success',
                text: 'Success Create Substract',
                confirmButtonClass: 'btn btn-success',
            }).then(() => {
              showlist();
            })
          }else{
            $('#newSubstract').modal('hide');
            Swal.fire({
                type: "error",
                title: 'Failed',
                text: 'Failed Create Substract'
            })
          }
        }
      });
    });

    $('#substractCategories').on('change', function(e){
      e.preventDefault();
      $('#substractProduct').empty();
    });

    $('#substractProduct').on('change', function(e){
      e.preventDefault();
      let id = $(this).val();
      $.ajax({
        type : 'GET',
        url  : `{{asset('/inventory')}}/${id}`,
        contentType: "application/json",
        success:function(res){
          if(res.ERR == false){
            let data = res.DATA;
            $('#substractCategories').val(data.categories);
          }
          console.log(res);
        }
      });
      console.log($(this).val());
    })

    $('#formEdit').submit(async function(e){
      e.preventDefault();
      var formEdit = $('#formEdit').serialize();

      let id = $('#idEdit').val();
      $.ajax({
        type:'POST',
        url: `{{asset('inventory')}}/${id}`,
        data: formEdit,
        error:function(e){
          console.log(e);
        },
        success:function(res){
          if(res == 1){
            $('#editProduct').modal('hide');
            $("#formEdit").trigger("reset");
            $('#categoriesEdit').empty();
            Swal.fire({
                type: "success",
                title: 'Success',
                text: 'Success Edit Product',
                confirmButtonClass: 'btn btn-success',
            }).then(() => {
              showlist();
            })
          }else{
            $('#editProduct').modal('hide');
            $("#formEdit").trigger("reset");
            $('#categoriesEdit').empty();
            Swal.fire({
                type: "error",
                title: 'Failed',
                text: 'Failed Edit Product'
            })
          }
        }
      });
    });

    $('#categories').select2({
        dropdownParent: $('#newProduct'),
        width: '100%',
        
        placeholder:'Select Category',
        allowClear:true,
        ajax: {
            method : "GET",
            url: "{{asset('/optcategory')}}",
            dataType: "JSON", 
            data: function (params) {
                return {
                keyword: params.term
                };
            },
            processResults: function (data, params) {
                return {
                results: data
                };
            },
            cache: true,
        }
    })

    $('#categoriesEdit').select2({
        dropdownParent: $('#editProduct'),
        width: '100%',
        
        placeholder:'Select Category',
        allowClear:true,
        ajax: {
            method : "GET",
            url: "{{asset('/optcategory')}}",
            dataType: "JSON", 
            data: function (params) {
                return {
                keyword: params.term
                };
            },
            processResults: function (data, params) {
                return {
                results: data
                };
            },
            cache: true,
        }
    })

    $('#delete_multi').on('click', function(){
      var selected = new Array();
      $('input[name="check[]"]:checked').each(function() {
        selected.push(this.value);
      });

      console.log(selected);
      $.ajax({
        type:'POST',
        url: "{{route('massdeleteinventory')}}",
        data: {
          id : selected
        },
        error:function(e){
          $('#deleteModal').modal('hide');
            Swal.fire({
              type: "error",
              title: 'Failed',
              text: "Error"
          })
        },
        success:function(res){
          if(res.ERR == false){
            $('#deleteModal').modal('hide');
            Swal.fire({
                type: "success",
                title: 'Success',
                text: 'Success Delete Data',
                confirmButtonClass: 'btn btn-success',
            }).then(() => {
              showlist();
            })
          }else{
            $('#deleteModal').modal('hide');
            Swal.fire({
                type  : "error",
                title : 'Failed',
                text  :res.MSG
            })
          }
        }
      });
    });

    function deletes(id){
      event.preventDefault();
      Swal.fire({
        title: 'Are you sure?',
        text: "You want to Delete?",
        type: 'warning',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Do it!',
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger ml-1',
        buttonsStyling: false,
        }).then(function (result) {
        if (result.value) {
          $.ajax({
            type  : 'DELETE',
            url   : `{{asset('inventory')}}/${id}`,
            data  : '',
            error:function(e){
          console.log(e);
        },
        success:function(res){
          if(res == 1){
            Swal.fire({
                type: "success",
                title: 'Success',
                text: 'Success Delete Category',
                confirmButtonClass: 'btn btn-success',
            }).then(() => {
              showlist();
            })
          }else{
            Swal.fire({
                type: "error",
                title: 'Failed',
                text: 'Failed Delete Category'
            })
          }
        }
          })
        }
        else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire({
            title: 'Cancelled',
            text: 'Delete has been canceled :)',
            type: 'error',
            confirmButtonClass: 'btn btn-success',
            })
        }
      });
    }

  </script>

</body>

</html>