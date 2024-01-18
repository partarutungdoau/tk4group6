<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="default" data-assets-path="../assets/">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Discount | Toko Alat Tulis</title>

  <meta name="description" content="" />

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
        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>
          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <ul class="navbar-nav align-items-center">
              <li class="nav-item d-flex align-items-center me-5">
                <div class="avatar flex-shrink-0 me-2">
                  <span class="avatar-initial rounded bg-label-success"><i class="bx bx-dollar-circle"></i></span>
                </div>
                <div class="me-2">
                  <small class="text-muted d-block">Total Stock Price</small>
                  <h6 class="mb-0">Rp. 1,500,000</h6>
                </div>
              </li>
              <li class="nav-item d-flex align-items-center me-5 d-none d-lg-flex">
                <div class="avatar flex-shrink-0 me-2">
                  <span class="avatar-initial rounded bg-label-info"><i class="bx bx-shopping-bag"></i></span>
                </div>
                <div class="me-2">
                  <small class="text-muted d-block">Profit</small>
                  <h6 class="mb-0">Rp. 500,000</h6>
                </div>
              </li>
              <li class="nav-item d-flex align-items-center d-none d-lg-flex">
                <div class="avatar flex-shrink-0 me-2">
                  <span class="avatar-initial rounded bg-label-danger"><i class="bx bx-log-in-circle"></i></span>
                </div>
                <div class="me-2">
                  <small class="text-muted d-block">Expenses</small>
                  <h6 class="mb-0">Rp. 700,000</h6>
                </div>
              </li>
            </ul>

            <ul class="navbar-nav flex-row align-items-center ms-auto">

              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="../assets/img/avatars/user.png" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="../assets/img/avatars/user.png" alt class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block">Username</span>
                          <small class="text-muted">Admin</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-cog me-2"></i>
                      <span class="align-middle">Settings</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <span class="d-flex align-items-center align-middle">
                        <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                        <span class="flex-grow-1 align-middle">History</span>
                        <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                      </span>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="auth-login.html">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Log Out</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->

            </ul>
          </div>
        </nav>

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
                    Discount
                  </h4>
                </div>
              </div>
              <div class="col-12 col-md-6 align-self-center text-center text-sm-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDiscount">
                  <span class="tf-icons bx bx-plus-circle"></span>
                  Add Discount
                </button>
              </div>
            </div>

            <!-- Table Order -->
            <div class="card py-3">
              <div class="row px-3">
                <!-- Search -->
                <div class="col">
                  <div class="d-flex align-items-center">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input type="text" class="form-control border-0 shadow-none" id="search" placeholder="Search..."
                      aria-label="Search..." />
                  </div>
                </div>
                <!-- Button Delete -->
                <div class="col text-end">
                <button type="button" id="btn_delete" class="btn btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target="#deleteModal">
                        <span class="tf-icons bx bx-trash"></span>&nbsp; Delete
                      </button>
                </div>
              </div>
              <!-- Table Body -->
              <div class="table-responsive text-nowrap py-3">
                <table class="table table-striped" id="datatable">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 5%;">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </div>
                      </th>
                      <th class="text-center" style="width: 20%;">Discount Name</th>
                      <th class="text-center" style="width: 10%;">Discount Type</th>
                      <th class="text-center" style="width: 15%;">Amount</th>
                      <th class="text-center" style="width: 20%;">Product</th>
                      <th class="text-center" style="width: 10%;">Status</th>
                      <th class="text-center" style="width: 5%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
            </div>
            <!-- Table Order  -->
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

  <!-- Modal Add Discount -->
  <div class="modal fade" id="addDiscount" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Add Discount</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Modal Body -->
        <form id="formnewdiscount">
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="discountName" class="form-label">Discount Name</label>
              <input required type="text" id="discountName" name="discountName" class="form-control" placeholder="Enter Discount Name" />
            </div>
          </div>
          <div class="row">
            <div class="col mb-3">
              <label for="select-product-new" class="form-label">Product</label>
              <select required class="form-select select-product-new" multiple id="product" name="product[]"
                aria-label="Select Product" style="width: 100%;">
              </select>
            </div>
          </div>
          <div class="row g-md-2">
            <div class="col-md-6 mb-3">
              <label for="discountType" class="form-label">Discount Type</label>
              <select required class="form-select" id="discountType" name="discountType" aria-label="Select Discount">
                <option selected disabled>-- Select Discount Type --</option>
                <option value="FIXED">Fixed (Rp)</option>
                <option value="PERCENTAGE">Percentage (%)</option>
              </select>
            </div>

            <!-- For Fixed Type -->
            <div class="col-md-6 mb-3">
              <label for="amount" class="form-label">Amount</label>
              <div class="input-group input-group-merge">
                <span id="spantext" class="input-group-text">%</span>
                <input required type="number" id="amount" name="amount" class="form-control" placeholder="ex: 5000" aria-label="Fixed" />
              </div>
            </div>
          </div>

          <div class="row ps-1">
            <div class="col-md-5 mt-2">
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="discountStatusAdd" id="discountStatusAdd" value="1" />
                <label class="form-check-label" for="discountStatusAdd">Discount Status</label>
              </div>
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

  <!-- Modal Edit Discount -->
  <div class="modal fade" id="editDiscount" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Edit Discount</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Modal Body -->
        <form id="formeditdiscount">
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="discountName" class="form-label">Discount Name</label>
              <input type="hidden" name="idEdit" id="idEdit" class="form-control">
              <input required type="text" id="discountNameEdit" name="discountNameEdit" class="form-control"
                placeholder="Enter Discount Name" />
            </div>
          </div>
          <div class="row">
            <div class="col mb-3">
              <label for="productEdit" class="form-label">Product</label>
              <select required class="form-select select-product-edit" multiple id="productEdit" name="productEdit[]"
                aria-label="Select Product" style="width: 100%;">
              </select>
            </div>
          </div>
          <div class="row g-md-2">
            <div class="col-md-6 mb-3">
              <label for="discountType" class="form-label">Discount Type</label>
              <select required class="form-select" id="discountTypeEdit" name="discountTypeEdit" aria-label="Select Discount">
                <option selected disabled>-- Select Discount Type --</option>
                <option value="FIXED">Fixed (Rp)</option>
                <option value="PERCENTAGE">Percentage (%)</option>
              </select>
            </div>

            <!-- For Fixed Type -->
            <div class="col-md-6 mb-3">
              <label for="fixed" class="form-label">Amount</label>
              <div class="input-group input-group-merge">
                <span id="spantextEdit" class="input-group-text">Rp</span>
                <input required type="number" id="amountEdit" name="amountEdit" class="form-control" placeholder="ex: 5000"
                  aria-label="Fixed" />
              </div>
            </div>
          </div>

          <div class="row ps-1">
            <div class="col-md-5 mt-2">
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="discountStatusEdit" id="discountStatusEdit" value="1"/>
                <label class="form-check-label" for="discountStatusEdit">Discount Status</label>
              </div>
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
  <script>
    let key = '';

    $('.select-product-new').select2({
      placeholder: 'Select Product',
      allowClear: 'true',
      dropdownParent: '#addDiscount',
      closeOnSelect: false,
      ajax: {
            method : "GET",
            url: "{{asset('/optproduct')}}",
            dataType: "JSON", 
            data: function (params) {
                return {
                keyword: params.term
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

    $('.select-product-edit').select2({
      placeholder: 'Select Product',
      allowClear: 'true',
      dropdownParent: '#editDiscount',
      closeOnSelect: false,
      ajax: {
            method : "GET",
            url: "{{asset('/optproduct')}}",
            dataType: "JSON", 
            data: function (params) {
                return {
                keyword: params.term
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
        url  : `<?= asset('listdiscount') ?>`,
        data : {
          keyword : key
        },
        contentType: "application/json",
        success: function(data){
          let dataTableData = [];

          if(data.ERR == false){
            if(data.DATA.length != 0){
              let res = data.DATA;
              $.each(res, function(index, val){
                let prod = val.product;
                let amount = '';
                if(val.type == 'FIXED'){
                  amount = formatRupiah(val.amount.toString(),'Rp. ');
                }else{
                  amount = val.amount+'%';
                }
                let prods = ``;
                $.each(prod, function(index, v){
                    prods += `<li class="m-1">
                            <span class="badge bg-label-info">
                              ${v.product_name}
                            </span>
                          </li>`
                });
                dataTableData.push([
                  `<div class="form-check">
                    <input class="form-check-input check" onclick="checkbuttondel()" name="check[]" id="check${val.id}" type="checkbox" value="${val.id}">
                  </div>`,
                  `<strong>${val.name}</strong>`,
                  `${val.type} ${val.type == 'PERCENTAGE' ? '(%)' : '(Rp )'}`,
                  amount,
                  `<ul class="list-unstyled">
                    ${prods}
                  </ul>`,
                  `<span class="badge bg-label-${(val.status == 'ACTIVE') ? 'success' : 'danger' }">${val.status}</span>`,
                  `<div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-edit"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript:void(0);" onclick="showmodaledit('${val.id}')"><i class="bx bx-edit-alt me-1"></i>
                        edit</a>
                      <a class="dropdown-item" href="javascript:void(0);" onclick="deletedata('${val.id}')"><i class="bx bx-trash me-1"></i>
                        Delete</a>
                    </div>
                  </div>`
                ]);
              });
            }

            $('#datatable').DataTable().destroy();
            $('#datatable').DataTable({
              data: dataTableData,
              bPaginate: true,
              bLengthChange :false,
              bFilter : false,
              bInfo : true,
              bAutoWidth : true,
              columns: [
                  {
                      title: `<div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" onclick="allcheck()" id="allcheck">
                                      </div>`
                  },
                  {
                      title: 'DISCOUNT NAME'
                  },
                  {
                      title: 'DISCOUNT TYPE'
                  },
                  {
                      title: 'AMOUNT'
                  },
                  {
                      title: 'PRODUCT'
                  },
                  {
                      title: 'STATUS'
                  },
                  {
                      title: 'ACTION'
                  },
              ],
            })
          }
        }
      });
    }

    $('#search').on('keyup', function(e){
      key = document.querySelector('#search').value;
      showlist();
    });

    $('#formnewdiscount').submit(async function(e){
      e.preventDefault();
      var formcreate = $('#formnewdiscount').serialize();

      $.ajax({
        type:'POST',
        url: "{{route('creatediscount')}}",
        data: formcreate,
        error:function(e){
          Swal.fire({
            type: "error",
            title: 'Failed',
            text: 'Failed Create Discount'
          })
        },
        success:function(res){
          console.log(res);
          if(res.ERR == false){
            $('#addDiscount').modal('hide');
            $('#product').empty();
            $("#formnewdiscount").trigger("reset");
            Swal.fire({
                type: "success",
                title: 'Success',
                text: res.MSG,
                confirmButtonClass: 'btn btn-success',
            }).then(() => {
              showlist();
            })
          }else{
            $('#addDiscount').modal('hide');
            Swal.fire({
                type: "error",
                title: 'Failed',
                text: res.MSG
            })
          }
        }
      });
    });

    $('#formeditdiscount').submit(async function(e){
      e.preventDefault();
      var formcreate = $('#formeditdiscount').serialize();
      let id = $('#idEdit').val();
      $.ajax({
        type:'POST',
        url: `{{asset('discount')}}/${id}`,
        data: formcreate,
        error:function(e){
          Swal.fire({
                type: "error",
                title: 'Failed',
                text: 'Failed Edit Discount'
            })
        },
        success:function(res){
          console.log(res);
          if(res.ERR == false){
            $('#editDiscount').modal('hide');
            $('#productEdit').empty();
            $("#formeditdiscount").trigger("reset");
            Swal.fire({
                type: "success",
                title: 'Success',
                text: res.MSG,
                confirmButtonClass: 'btn btn-success',
            }).then(() => {
              showlist();
            })
          }else{
            $('#editDiscount').modal('hide');
            Swal.fire({
                type: "error",
                title: 'Failed',
                text: res.MSG
            })
          }
        }
      });
    })

    $('#discountType').on('change', function(e){
      e.preventDefault();
      let val = $(this).val();

      if(val == 'FIXED'){
        $('#amount').val('');
        $('#spantext').html('Rp.');
        $('#amount').attr('placeholder','Ex. 5000');
        $('#amount').attr('min','1');
        $('#amount').attr('max',false);
      }else{
        $('#amount').val('');
        $('#spantext').html('%');
        $('#amount').attr('placeholder','Ex. 75');
        $('#amount').attr('min','1');
        $('#amount').attr('max','100');
      }
    })

    function showmodaledit(id){
      event.preventDefault();
      $.ajax({
        type : 'GET',
        url  : `{{asset('discount')}}/${id}`,
        data : '',
        error:function(e){
          $('#editCategory').modal('hide');
            Swal.fire({
                type: "error",
                title: 'Failed',
                text: 'Failed Get Data'
            })
        },
        success:function(res){
          console.log(res);
          if(res.ERR == false){
            let data = res.DATA;
            $('#editDiscount').modal('show');
            $('#idEdit').val(data.id);
            $('#discountNameEdit').val(data.name);
            $('#discountTypeEdit').val(data.type);
            $('#amountEdit').val(data.amount);
            if(data.status == 'ACTIVE'){
              $('#discountStatusEdit').attr('checked', true);
            }else{
              $('#discountStatusEdit').attr('checked', false);
            }
            $('#productEdit').empty();
            $.each(data.product, function(index, val){
              let append = `<option value="${val.product}" selected>${val.product_name}</option>`;
              $('#productEdit').append(append)
            })
          }else{
            Swal.fire({
                type: "error",
                title: 'Failed',
                text: 'Failed Get Data'
            })
          }
        }
      })
      
    }

    $('#discountTypeEdit').on('change', function(e){
      e.preventDefault();
      let val = $(this).val();

      if(val == 'FIXED'){
        $('#amountEdit').val('');
        $('#spantextEdit').html('Rp.');
        $('#amountEdit').attr('placeholder','Ex. 5000');
        $('#amountEdit').attr('min','1');
        $('#amountEdit').attr('max',false);
      }else{
        $('#amountEdit').val('');
        $('#spantextEdit').html('%');
        $('#amountEdit').attr('placeholder','Ex. 75');
        $('#amountEdit').attr('min','1');
        $('#amountEdit').attr('max','100');
      }
    })

    function deletedata(id){
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
            url   : `{{asset('discount')}}/${id}`,
            data  : '',
            error:function(e){
          console.log(e);
        },
        success:function(res){
          if(res == 1){
            Swal.fire({
                type: "success",
                title: 'Success',
                text: 'Success Delete Discount',
                confirmButtonClass: 'btn btn-success',
            }).then(() => {
              showlist();
            })
          }else{
            Swal.fire({
                type: "error",
                title: 'Failed',
                text: 'Failed Delete Discount'
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

    $('#delete_multi').on('click', function(){
      var selected = new Array();
      $('input[name="check[]"]:checked').each(function() {
        selected.push(this.value);
      });

      console.log(selected);
      $.ajax({
        type:'POST',
        url: "{{route('massdeletediscount')}}",
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
  </script>
</body>

</html>