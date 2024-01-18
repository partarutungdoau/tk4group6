<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="default" data-assets-path="../assets/">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Purchase Order | Toko Alat Tulis</title>

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
                    Purchase Order
                  </h4>
                </div>
              </div>
              <div class="col-12 col-md-6 align-self-center text-center text-sm-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addOrder">
                  <span class="tf-icons bx bx-plus-circle"></span>
                  Add Order
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
                <!-- <div class="col-2 text-end">
                  <select class="form-select" id="sortBySelect" aria-label="Sort by">
                    <option selected disabled value="">Sort by</option>
                    <option value="1">Date</option>
                    <option value="2">Status</option>
                  </select>
                </div> -->
              </div>
              <!-- Table Body -->
              <div class="table-responsive text-nowrap py-3">
                <table class="table table-striped" id="datatable">
                  <thead>
                    <tr>
                      <th style="width: 30%;">Product</th>
                      <th style="width: 5%;">Qty</th>
                      <th style="width: 30%;">Supplier</th>
                      <th style="width: 15%;">Date</th>
                      <th style="width: 15%;">Buy Price</th>
                      <th style="width: 10%;">Status</th>
                      <th style="width: 5%;">Action</th>
                    </tr>
                  </thead>
                  <tbody id="listdata">
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

  <!-- Modal New Order -->
  <div class="modal fade" id="addOrder" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Add Order</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Modal Body -->
        <form id="formAdd">
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="products" class="form-label">Product</label>
              <select required class="form-select select-product" id="products" name="products" aria-label="Select Product"
                style="width: 100%;">
              </select>
            </div>
          </div>
          <div class="row g-md-2">
            <div class="col-md-6 mb-3">
              <label for="categories" class="form-label">Category</label>
              <select required class="form-select" id="categories" name="categories" aria-label="Select Category">
                <option value="">-- Select Category --</option>
                @if(isset($category) && !empty($category))
                @foreach($category as $rw)
                <option value="{{$rw['id']}}">{{$rw['categories_name']}}</option>
                @endforeach
                @endif
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label for="suppliers" class="form-label">Supplier</label>
              <select required class="form-select" id="suppliers" name="suppliers" aria-label="Select Supplier">
                <option value="">-- Select Supplier --</option>
                @if(isset($supplier) && !empty($supplier))
                @foreach($supplier as $rw)
                <option value="{{$rw['id']}}">{{$rw['name']}}</option>
                @endforeach
                @endif
              </select>
            </div>
          </div>
          <div class="row g-md-2">
            <div class="col-md-6 mb-3">
              <label for="quantity" class="form-label">Quantity</label>
              <input required type="number" id="quantity" name="quantity" min="1" class="form-control" placeholder="ex: 99" />
            </div>
            <div class="col-md-6 mb-3">
              <label for="buyPrice" class="form-label">Buy Price</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text">Rp</span>
                <input required type="number" id="buyPrice" name="buyPrice" class="form-control" placeholder="ex: 15000"
                  aria-label="Buy Price" />
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

  <!-- Modal Delivered Confirmation -->
  <div class="modal fade" id="editOrder" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Product Receive</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Modal Body -->
        <form id="formReceived">
        <div class="modal-body">
          <div class="row">
            <div class="col text-center">
              <input type="hidden" id="idReceived" name="idReceived" class="form-control">
              <input required class="form-check-input" type="checkbox" value="1" id="delivered" />
              <label class="form-check-label" for="delivered"> Product has been received</label>
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
  @include('panel.script')

  <script>
    $('.select-product').select2({
      placeholder: 'Select Product',
      allowClear: 'true',
      dropdownParent: '#addOrder',
      closeOnSelect: true,
      ajax: {
            method : "GET",
            url: "{{asset('/optproduct')}}",
            dataType: "JSON", 
            data: function (params) {
                return {
                keyword   : params.term,
                category  : $('#categories').val()
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

    $('#categories').on('change', function(e){
      e.preventDefault();
      $('#products').empty();
    });

    $('#products').on('change', function(e){
      e.preventDefault();
      let id = $(this).val();
      $.ajax({
        type : 'GET',
        url  : `{{asset('/inventory')}}/${id}`,
        contentType: "application/json",
        success:function(res){
          console.log(res);
          if(res.ERR == false){
            let data = res.DATA;
            if(data){
            $('#categories').val(data.categories);
            $('#buyPrice').val(data.buy_price);
            $('#buyPrice').attr('readonly', true);
            }else{
              $('#categories').val('');
              $('#buyPrice').val('');
              $('#buyPrice').attr('readonly', false);
            }
          }
          console.log(res);
        }
      });
      console.log($(this).val());
    })

    let key = '';

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

    showlist();
    function showlist(){
      $.ajax({
        type : 'GET',
        url  : `<?= asset('listpurchase') ?>`,
        data : {
          keyword : key
        }
        ,
        contentType: "application/json",
        success: function(data){
          // console.log(res.ERR);
          let dataTableData = [];
          if(data.ERR == false){
            if(data.DATA.length != 0){
              data.DATA.map(val => {
                  const d = new Date(val.order_date);
                  let buy = formatRupiah(val.buy_price.toString(),'Rp. ');
                  let status = '';
                  if(val.status == 'PENDING'){
                    status = '<span class="badge bg-label-warning">Pending</span>';
                  }else if(val.status == 'SUCCESS'){
                    status = '<span class="badge bg-label-success">Success</span>';
                  }else if(val.status == 'CANCEL'){
                    status = '<span class="badge bg-label-danger">Cancel</span>';
                  }

                  dataTableData.push([
                      val.product_name,
                      val.quantity,
                      val.suppliers_name,
                      val.order_date,
                      buy,
                      status,
                      `<div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-edit"></i>
                          </button>
                          <div class="dropdown-menu">
                            ${val.status == 'PENDING' ? `
                            <a class="dropdown-item" href="javascript:void(0);" onclick="showmodaledit('${val.id}')"><i class="bx bx-edit-alt me-1"></i>
                              Delivered</a>
                            <a class="dropdown-item" href="javascript:void(0);" onclick="canceldata('${val.id}')"><i class="bx bx-x-circle me-1"></i>
                              Cancel</a>` : `<button class="dropdown-item" onclick="deletedata('${val.id}')"><i class="bx bx-trash me-1"></i>
                              Delete</button>` }
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
                columns: [
                    {
                        title: 'PRODUCT'
                    },
                    {
                        title: 'QTY'
                    },
                    {
                        title: 'SUPPLIER'
                    },
                    {
                        title: 'DATE'
                    },
                    {
                        title: 'BUY PRICE'
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
      e.preventDefault();

      key = document.querySelector('#search').value;
      showlist();
    });

    function showmodaledit(id){
      console.log(id);
      $('#editOrder').modal('show');
      $('#idReceived').val(id);
    }

    $('#formAdd').submit(async function(e){
      e.preventDefault();

      var formcreate = $('#formAdd').serialize();

      $.ajax({
        type:'POST',
        url: "{{route('createpurchaseorder')}}",
        data: formcreate,
        error:function(e){
          $('#addOrder').modal('hide');
          Swal.fire({
              type: "error",
              title: 'Failed',
              text: 'Failed Create Purchase Order'
          })
        },
        success:function(res){
          if(res == 1){
            $('#addOrder').modal('hide');
            $("#formAdd").trigger("reset");
            $('#products').empty();
            Swal.fire({
                type: "success",
                title: 'Success',
                text: 'Success Create Purchase Order',
                confirmButtonClass: 'btn btn-success',
            }).then(() => {
              showlist();
            })
          }else{
            $('#addOrder').modal('hide');
            Swal.fire({
                type: "error",
                title: 'Failed',
                text: 'Failed Create Purchase Order'
            })
          }
        }
      });
    });

    $('#formReceived').submit(async function(e){
      e.preventDefault();
      let id = $('#idReceived').val();
      console.log(id);
      $.ajax({
        type:'POST',
        url: `{{asset('/purchase/update')}}/${id}`,
        data: {
          statusEdit : 'SUCCESS'
        },
        error:function(e){
          $('#editOrder').modal('hide');
            Swal.fire({
                type: "error",
                title: 'Failed',
                text: 'Failed Receive Order'
            })
        },
        success:function(res){
          if(res == 1){
            $('#editOrder').modal('hide');
            Swal.fire({
                type: "success",
                title: 'Success',
                text: 'Success Receive Order',
                confirmButtonClass: 'btn btn-success',
            }).then(() => {
              showlist();
            })
          }else{
            $('#editOrder').modal('hide');
            Swal.fire({
                type: "error",
                title: 'Failed',
                text: 'Failed Receive Order'
            })
          }
        }
      });
    });

    function canceldata(id){
      event.preventDefault();
      Swal.fire({
        title: 'Are you sure?',
        text: "You want to Cancel?",
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
            type  : 'POST',
            url   : `{{asset('/purchase/update')}}/${id}`,
            data  : {
              statusEdit : 'CANCEL'
            },
        error:function(e){
          Swal.fire({
              type: "error",
              title: 'Failed',
              text: 'Failed Cancel Order'
          })
        },
        success:function(res){
          if(res == 1){
            Swal.fire({
                type: "success",
                title: 'Success',
                text: 'Success Cancel Order',
                confirmButtonClass: 'btn btn-success',
            }).then(() => {
              showlist();
            })
          }else{
            Swal.fire({
                type: "error",
                title: 'Failed',
                text: 'Failed Cancel Order'
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
            url   : `{{asset('purchase')}}/${id}`,
            data  : '',
        error:function(e){
         Swal.fire({
              type: "error",
              title: 'Failed',
              text: 'Failed Delete Order'
          })
        },
        success:function(res){
          if(res == 1){
            Swal.fire({
                type: "success",
                title: 'Success',
                text: 'Success Delete Order',
                confirmButtonClass: 'btn btn-success',
            }).then(() => {
              showlist();
            })
          }else{
            Swal.fire({
                type: "error",
                title: 'Failed',
                text: 'Failed Delete Order'
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
  </script>


  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>