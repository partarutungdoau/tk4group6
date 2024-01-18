<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="default" data-assets-path="../assets/">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Dashboard | Toko Alat Tulis</title>

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

          <form id="formsearch">
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row mb-4">
              <div class="col-12 col-md-6 align-self-center">
                <div class="d-sm-flex py-3">
                  <h4 class="fw-bold mb-0">
                    Dashboard
                  </h4>
                </div>
              </div>
              <div class="col-12 col-md-6 d-flex align-self-end justify-content-end  text-center text-sm-end">
                <form id="formsearch">
                  <div class="form-group mb-0 me-3">
                    <div class="input-group date" id="datepicker">
                      <input required type="date" id="date" name="date" class="form-control" placeholder="Select Date">
                    </div>
                  </div>
                <button type="submit"  class="btn btn-primary">Submit</button>
              </div>
            </div>
            </form>

            <h4 class="fw-bold text-center py-3 mb-2">
              Sales Summary
            </h4>

            <div class="row">
              <div class="col-md-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex py-3 px-4">
                      <div class="avatar flex-shrink-0 me-3 p-4">
                        <span class="avatar-initial rounded bg-label-info"><i
                            class="bx bx-sm bx-shopping-bag"></i></span>
                      </div>
                      <div>
                        <small class="text-muted d-block mb-1">Profit</small>
                        <div class="d-flex align-items-center">
                          <h3 class="mb-0 me-1" id="profit">Rp. 0</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex py-3 px-4">
                      <div class="avatar flex-shrink-0 me-3 p-4">
                        <span class="avatar-initial rounded bg-label-warning"><i
                            class="bx bx-sm bx-cart-alt"></i></span>
                      </div>
                      <div>
                        <small class="text-muted d-block mb-1">Total Sales Transaction</small>
                        <div class="d-flex align-items-center">
                          <h3 class="mb-0 me-1" id="sales">0 sales</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex py-3 px-4">
                      <div class="avatar flex-shrink-0 me-3 p-4">
                        <span class="avatar-initial rounded bg-label-danger"><i
                            class="bx bx-sm bx-log-in-circle"></i></span>
                      </div>
                      <div>
                        <small class="text-muted d-block mb-1">Total Expanses</small>
                        <div class="d-flex align-items-center">
                          <h3 class="mb-0 me-1" id="expanses">Rp. 0</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex py-3 px-4">
                      <div class="avatar flex-shrink-0 me-3 p-4">
                        <span class="avatar-initial rounded bg-label-success"><i class="bx bx-sm bx-dollar"></i></span>
                      </div>
                      <div>
                        <small class="text-muted d-block mb-1">Total Earnings</small>
                        <div class="d-flex align-items-center">
                          <h3 class="mb-0 me-1" id="earnings">Rp. 0</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <hr class="my-3" />

            <!-- Table Top Item -->
            <h4 class="fw-bold text-center py-3 mb-2">
              Top Item
            </h4>
            <div class="card">
              <div class="table-responsive text-nowrap py-3">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th class="col-4">Product</th>
                      <th class="col-3">Category</th>
                      <th class="col-2">Amount</th>
                      <th class="col-3">Price</th>
                    </tr>
                  </thead>
                  <tbody id="listtop">
                  </tbody>
                </table>
              </div>
            </div>
            <!-- Table Top Item - Footer -->

            <hr class="my-3 mt-4" />

            <!-- Table Low Stock -->
            <h4 class="fw-bold text-center py-3 mb-2">
              Low Stock
            </h4>
            <div class="card">
              <div class="table-responsive text-nowrap py-3">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th class="col-4">Product</th>
                      <th class="col-3">Category</th>
                      <th class="col-2">Amount</th>
                      <th class="col-1">Stock</th>
                      <th class="col-2">Price</th>
                    </tr>
                  </thead>
                  <tbody id="listlow">
                  </tbody>
                </table>
              </div>
            </div>
            <!-- Table Low Stock - Footer -->

          </div>

          <!-- / Content -->

          @include('panel.footer')

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

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

    showlist();
    function showlist(){
      $.ajax({
        type : 'GET',
        url  : `<?= asset('summary') ?>`,
        data : {
          date : key
        }
        ,
        contentType: "application/json",
        success: function(res){
          if(res.ERR == false){
            let data = res.DATA;
            console.log(data);
            let earnings = formatRupiah(data.earnings.toString(),'Rp. ');
            $('#earnings').html(earnings);
            
            let expanses = formatRupiah(data.expanses.toString(),'Rp. ');
            $('#expanses').html(expanses);
            
            let income = formatRupiah(data.income.toString(),'Rp. ');
            $('#profit').html(income);

            let sales = data.sales + ' sales';
            $('#sales').html(sales);

            let top  = data.topitem;
            let low  = data.lowstock;

            if(top.length != 0){
              $('#listtop').empty();
              $.each(top, function(index, val){
                let price = formatRupiah(val.sell_price.toString(),'Rp. ');;
                let append =`<tr>
                      <td><strong>${val.product_name}</strong></td>
                      <td>${val.categories_name}</td>
                      <td>
                        ${val.sold}
                        <small class="text-muted">Sales</small>
                      </td>
                      <td>${price}</td>
                    </tr>`;
                $('#listtop').append(append);
              })
            }else{
            $('#listtop').empty();
            let html = `<tr>
                        <td colspan="4" style="text-align:center">
                        No Result Data
                        </td>
                      </tr>`;
            $('#listtop').html(html);
            }

            if(low.length != 0){
              $('#listlow').empty();
              $.each(low, function(index, val){
                let price = formatRupiah(val.sell_price.toString(),'Rp. ');;
                let append =`<tr>
                      <td><strong>${val.product_name}</strong></td>
                      <td>${val.categories_name}</td>
                      <td>
                        ${val.sold}
                        <small class="text-muted">Sales</small>
                      </td>
                      <td>
                        ${val.stock}
                      </td>
                      <td>${price}</td>
                    </tr>`;
                $('#listlow').append(append);
              })
            }else{
            $('#listlow').empty();
            let html = `<tr>
                        <td colspan="5" style="text-align:center">
                        No Result Data
                        </td>
                      </tr>`;
            $('#listlow').html(html);
            }
          }
        }
      });
    }

    $('#formsearch').submit(async function(e){
      e.preventDefault();

      key = document.querySelector('#date').value;
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
      return prefix == undefined ? hasil : hasil ? "Rp. " + hasil : "";
    }
</script>
</body>

</html>