<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="default" data-assets-path="../assets/">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Products | Toko Alat Tulis</title>

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
                    Product List
                  </h4>
                </div>
              </div>
            </div>

            <!-- Table Product -->
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
              </div>

              <!-- Table Body -->
              <div class="table-responsive text-nowrap py-3">
                <table class="table table-striped" id="datatable">
                  <thead>
                    <tr>
                      <th style="width: 20%;">Product</th>
                      <th style="width: 20%;">Category</th>
                      <th style="width: 15%;">Sell Price</th>
                      <th style="width: 25%;">Description</th>
                      <th style="width: 10%;">Stock</th>
                      <th style="width: 10%;">Sold</th>
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

  @include('panel.script')
  <script type="text/javascript">
    let key = '';

    $('.select-product').select2({
      placeholder: 'Select Product',
      allowClear: 'true',
      dropdownParent: '#newSubstract',
      closeOnSelect: false,
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
        url  : `<?= asset('listproduct') ?>`,
        data : {
          keyword : key
        },
        contentType: "application/json",
        success: function(data){
          let dataTableData = []
          if(data.ERR == false){
            if(data.DATA.length != 0){
              let res = data.DATA;
              console.log(res);
              $.each(res, function(index, val){
                let buy = formatRupiah(val.buy_price.toString(),'Rp. ');
                let sell = formatRupiah(val.sell_price.toString(),'Rp. ');
                let sold = '0';
                if(val.sold != null){
                  sold = formatRupiah(val.sold.toString(),'');
                }

                dataTableData.push([
                      `<strong>${val.product_name}</strong>`,
                      val.categories_name,
                      sell,
                      val.description,
                      val.stock,
                      sold
                    ])
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
              columns: [{
                      title: `PRODUCT`
                  },
                  {
                      title: 'CATEGORY'
                  },
                  {
                      title: 'SELL PRICE'
                  },
                  {
                      title: 'DESCRIPTION'
                  },
                  {
                      title: 'STOCK'
                  },
                  {
                      title: 'SOLD'
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
      return prefix == undefined ? hasil : hasil ? prefix + hasil : "";
    }
  </script>
</body>

</html>