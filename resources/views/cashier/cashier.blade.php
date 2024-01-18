<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="default" data-assets-path="../assets/">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Cashier | Toko Alat Tulis</title>

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
                    Cashier
                  </h4>
                </div>
              </div>
              <div class="col-12 col-md-6 align-self-center text-center text-sm-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addItem">
                  <span class="tf-icons bx bx-plus-circle"></span>
                  Add Item to Cart
                </button>
              </div>
            </div>

            <!-- Table Card -->
            <div class="card py-3">
              <div class="row px-3">
                <!-- Button Delete -->
                <div class="col text-end">
                <button type="button" id="btn_delete" class="btn btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target="#deleteModal">
                        <span class="tf-icons bx bx-trash"></span>&nbsp; Delete
                      </button>
                </div>
              </div>

              <!-- Table Body -->
              <form id="formlist">
              <input type="hidden" id="totalitemprice" name="totalitemprice" class="form-control">
              <div class="table-responsive text-nowrap py-3">
                <table class="table table-striped" id="datatable">
                  <thead>
                    <tr>
                      <th style="width: 5%;">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </div>
                      </th>
                      <th style="width: 17%;">Item</th>
                      <th style="width: 15%;">Price</th>
                      <th style="width: 15%;">Discount Price</th>
                      <th style="width: 10%;">Qty</th>
                      <th style="width: 13%;">Subtotal</th>
                      <th style="width: 5%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              </form>
            </div>
            <!-- Table Card -->

            <!-- Total Price Card -->
            <div class="row mt-4 justify-content-end">
              <div class="col-md-6">
                <div class="card p-2">
                  <div class="card-title">
                    <div class="row mt-4">
                      <div class="col justify-content-end text-end me-4">
                        <small class="text-muted">Total Price</small>
                        <h4 class="fw-bold mt-1 mb-0" id="total_price">
                          Rp. -
                        </h4>
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-3">
                    <div class="row">
                      <div class="col mb-3 text-end">
                        <button type="button" id="btn_discardmodal" class="btn btn-outline-danger me-3" data-bs-toggle="modal"
                          data-bs-target="#discardModal">
                          <span class="tf-icons bx bx-trash"></span>
                          Discard
                        </button>
                        <button type="button" id="btn_checkout" class="btn btn-primary" data-bs-toggle="modal"
                          data-bs-target="#checkoutModal">
                          <span class="tf-icons bx bx-log-in-circle"></span>
                          Checkout
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Total Price Card -->
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

  <!-- Modal Add Item -->
  <div class="modal fade" id="addItem" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top modal-xl modal-dialog-scrollable" role="document">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <div class="col">
            <h4 class="modal-title text-center" id="modalCenterTitle">Add Item</h4>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Modal Body -->
        <div class="modal-body">
        <form id="formaddcart">
          <div class="card py-3">
            <div class="row px-3">
              <!-- Search -->
              <div class="col">
                <div class="d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input type="text" class="form-control border-0 shadow-none" id="keyitem" name="keyitem" placeholder="Search..."
                    aria-label="Search..." />
                </div>
              </div>
            </div>

            <!-- Table Body -->
            <div class="table-responsive text-nowrap py-3">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 25%;">Product</th>
                    <th style="width: 20%;">Category</th>
                    <th style="width: 15%;">Sell Price</th>
                    <th style="width: 15%;">Discount Price</th>
                    <th style="width: 10%;">Stock</th>
                    <th style="width: 10%;">Qty</th>
                  </tr>
                </thead>
                <tbody id="listitem">
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Cancel
          </button>
          <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Checkout -->
  <div class="modal fade" id="checkoutModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Data Customer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Modal Body -->
        <form id="formcheckout">
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <label for="customerName" class="form-label">Customer Name</label>
              <input required type="text" id="customerName" name="customerName" class="form-control" placeholder="Enter customer name" />
            </div>
          </div>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Cancel
          </button>
          <button type="submit" class="btn btn-primary">Submit</button>
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

  <!-- Modal Delete Conformation -->
  <div class="modal fade" id="deleteModalsingle" tabindex="-1" aria-hidden="true">
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
        <form id="formdelete">
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <input type="hidden" id="iddelete" name="iddelete" class="form-control">
              <p class="mb-0 text-center">Are you sure want to delete this item?</p>
            </div>
          </div>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Okay</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  
  <!-- Modal Discard Conformation -->
  <div class="modal fade" id="discardModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <div class="col">
            <h5 class="modal-title text-center" id="modalCenterTitle">Discard Cart</h5>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Modal Body -->
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <p class="mb-0 text-center">Are you sure want to discard this cart?</p>
            </div>
          </div>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
          <button type="button" id="discard_button" name="discard_button" class="btn btn-primary">Okay</button>
        </div>

      </div>
    </div>
  </div>

  @include('panel.script');
  <script>
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    
    let key = '';
    showitem();
    function showitem(){
      $.ajax({
        type : 'GET',
        url  : `<?= asset('listitem') ?>`,
        data : {
          keyword : key
        },
        contentType: "application/json",
        success: function(data){
          if(data.ERR == false){
            if(data.DATA.length != 0){
              let res = data.DATA;
              console.log(res);
              $('#listitem').empty();
              $.each(res, function(index, val){
                let sell = formatRupiah(val.sell_price.toString(),'Rp. ');
                let disc = formatRupiah(val.discount_price.toString(),'Rp. ');
                let append = `<tr>
                    <td><strong>${val.product_name}</strong></td>
                    <td>${val.categories_name}</td>
                    <td>${sell}</td>
                    <td>${disc}</td>
                    <td>${val.stock}</td>
                    <td>
                      <input type="hidden" id="id" name="cart[${val.id}][id]" value="${val.id}">
                      <input type="hidden" id="sell_price" name="cart[${val.id}][sell_price]" value="${val.sell_price}">
                      <input type="hidden" id="discount_price" name="cart[${val.id}][discount_price]" value="${val.discount_price}">
                      <input type="number" id="quantity" name="cart[${val.id}][quantitty]" min="0" max="${val.stock}" class="form-control" placeholder="0" />
                    </td>
                  </tr>`;
                  
                $('#listitem').append(append);
              });
            }else{
              $('#listitem').empty();
              let html = `<tr>
              <td class="text-center" colspan="6">No Result Data</td>
              </tr>`;
              $('#listitem').html(html);
            }
          }
        }
      });
    }

    showcart();
    function showcart(){
      $.ajax({
        type : 'GET',
        url  : `<?= asset('listcart') ?>`,
        data : {
          keyword : key
        },
        contentType: "application/json",
        success: function(data){
          let dataTableData = [];
          $('#datatable').DataTable().destroy();

          if(data.ERR == false){
            if(data.DATA.length != 0){
              let res = data.DATA;
              console.log(res);
              let tot = 0;

              res.map(val => {
                let subtot = parseInt(val.discount_price) * parseInt(val.quantity);
                tot +=subtot;
                let sell = formatRupiah(val.price.toString(),'Rp. ');
                let disc = formatRupiah(val.discount_price.toString(),'Rp. ');
                let sub = formatRupiah(subtot.toString(),'Rp. ');

                dataTableData.push([
                  `<div class="form-check"><input class="form-check-input check" onclick="checkbuttondel()" name="check[]" id="check${val.id}" type="checkbox" value="${val.id}"></div>`,
                  `<strong>${val.product_name}</strong`,
                  sell,
                  disc,
                  `<input type="hidden" id="iditem" name="item[${val.id}][id]" value="${val.product}">
                  <input type="hidden" id="nameitem" name="item[${val.id}][product_name]" value="${val.product_name}">
                  <input type="hidden" id="priceitem" name="item[${val.id}][price]" value="${val.discount_price}">
                  <input type="number" id="quantityitem" name="item[${val.id}][quantity]" min="0" max="${val.stock}" onchange="updatesub(this.value, '${val.id}')" class="form-control" value="${val.quantity}" placeholder="0" />`,
                  sub,
                  `<a class="btn" onclick="showdeletemodal(${val.id})">
                    <i class="bx bx-trash"></i>
                  </a>`
                  ])
            })
              let tots = formatRupiah(tot.toString(),'Rp. ');
              $('#total_price').html(tots);
              $('#totalitemprice').val(tot);
              $('#btn_discardmodal').attr('disabled', false);
              $('#btn_checkout').attr('disabled', false);
            $('#datatable').DataTable({
              data: dataTableData,
              bPaginate: true,
              bLengthChange :false,
              bFilter : false,
              bInfo : false,
              bAutoWidth : true,
              columns: [
                {
                    title: ` <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="1" onclick="allchecks()" id="allcheck">
                                    </div> `
                },
                {
                    title: 'ITEM'
                },
                {
                    title: 'PRICE'
                },
                {
                    title: 'DISCOUNT PRICE'
                },
                {
                    title: 'QTY'
                },
                {
                    title: 'SUBTOTAL'
                },
                {
                    title: 'ACTION'
                },
              ],
            })
            }else{
            $('#datatable').DataTable({
              data: dataTableData,
              bPaginate: true,
              bLengthChange :false,
              bFilter : false,
              bInfo : false,
              bAutoWidth : true,
              columns: [
                {
                    title: ` <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="1" onclick="allchecks()" id="allcheck">
                                    </div> `
                },
                {
                    title: 'ITEM'
                },
                {
                    title: 'PRICE'
                },
                {
                    title: 'DISCOUNT PRICE'
                },
                {
                    title: 'QTY'
                },
                {
                    title: 'SUBTOTAL'
                },
                {
                    title: 'ACTION'
                },
              ],
            })
              $('#btn_discardmodal').attr('disabled', true);
              $('#btn_checkout').attr('disabled', true);
              
              $('#totalitemprice').val('');
              $('#total_price').html('Rp. -');
            }

            

          }
        }
      });
    }
    

    function allchecks(){
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

    $('#keyitem').on('keyup', function(e){
      key = document.querySelector('#keyitem').value;
      showitem();
    });

    $('#formdelete').submit(async function(e){
      e.preventDefault();
      let id = $('#iddelete').val();
      $.ajax({
          type : 'DELETE',
          url  : `{{asset('deletecart')}}/${id}`,
          data : null,
          contentType: "application/json",
          success: function(data){
            $('#deleteModalsingle').modal('hide');
            Swal.fire({
                type: "success",
                title: 'Success',
                text: "Delete Item",
                confirmButtonClass: 'btn btn-success',
            }).then(() => {
              showcart();
            })
          }
      })
    })

    $('#discard_button').on('click', function(e){
      e.preventDefault();
      $.ajax({
          type : 'DELETE',
          url  : `{{asset('discard')}}`,
          data : null,
          contentType: "application/json",
          success: function(data){
            $('#discardModal').modal('hide');
            Swal.fire({
                type: "success",
                title: 'Success',
                text: "Discard all item",
                confirmButtonClass: 'btn btn-success',
            }).then(() => {
              showcart();
            })
          }
      })
    });

    $('#formaddcart').submit(async function(e){
      e.preventDefault();
      var formcreate = $('#formaddcart').serialize();

      $.ajax({
        type:'POST',
        url: "{{route('addcart')}}",
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
            $('#addItem').modal('hide');
            $("#formaddcart").trigger("reset");
            Swal.fire({
                type: "success",
                title: 'Success',
                text: res.MSG,
                confirmButtonClass: 'btn btn-success',
            }).then(() => {
              showcart();
            })
          }else{
            $('#addItem').modal('hide');
            Swal.fire({
                type: "error",
                title: 'Failed',
                text: res.MSG
            })
          }
        }
      });
    });

    function updatesub(val, id){
      console.log(val);
      $.ajax({
          type : 'GET',
          url  : `{{asset('updateqty')}}/${id}`,
          data : {
                  quantity : val
              },
          contentType: "application/json",
          success: function(data){
              showcart();
          }
      })
    }

    function showdeletemodal(id){
      $('#deleteModalsingle').modal('show');
      $('#iddelete').val(id);
    }

    $('#formcheckout').submit(async function(e){
      e.preventDefault();
      var formitem      = $('#formlist').serialize();
      var formcheckout  = $('#formcheckout').serialize();
      let name          = $('#customerName').val();
      console.log(formitem);

      $.ajax({
        type:'POST',
        url: `{{asset('checkout')}}/${name}`,
        data: formitem,
        error:function(e){
          $('#checkoutModal').modal('hide');
          Swal.fire({
            type: "error",
            title: 'Failed',
            text: 'Failed Checkout'
          })
        },
        success:function(res){
          console.log(res);
          if(res.ERR == false){
            $('#checkoutModal').modal('hide');
            Swal.fire({
                type: "success",
                title: 'Success',
                text: res.MSG,
                confirmButtonClass: 'btn btn-success',
            }).then(() => {
              showitem();
              showcart();
              $('#customerName').val('');
            })
          }else{
            $('#checkoutModal').modal('hide');
            Swal.fire({
                type: "error",
                title: 'Failed',
                text: "Failed Checkout"
            })
          }
        }
      });
    });

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

    $('#delete_multi').on('click', function(){
      var selected = new Array();
      $('input[name="check[]"]:checked').each(function() {
        selected.push(this.value);
      });

      console.log(selected);
      $.ajax({
        type:'POST',
        url: "{{route('massdeletecart')}}",
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
              showitem();
              showcart();
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