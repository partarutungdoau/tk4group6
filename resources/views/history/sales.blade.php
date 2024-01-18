<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="default" data-assets-path="../assets/">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>History | Toko Alat Tulis</title>

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
                    History
                  </h4>
                </div>
              </div>
              <div class="col-12 col-md-6 d-flex align-self-center justify-content-md-end">
                <div class="row me-1 g-2">
                  <div class="col-5">
                    <form id="search_filter">
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">From</span>
                      <input type="date" id="start" name="start" class="form-control" />
                    </div>
                  </div>
                  <div class="col-5">
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">To</span>
                      <input type="date" id="end" name="end" class="form-control" />
                    </div>
                  </div>
                  <div class="col-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- Tab Menu -->
            @include('panel.navhistory')
            <!-- Tab Menu -->

            <!-- Table History -->
            <div class="card py-3">
              <div class="row px-3">
                <!-- Search -->
                <div class="col">
                  <div class="d-flex align-items-center">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input type="text" class="form-control border-0 shadow-none" id="search" name="search" placeholder="Search..."
                      aria-label="Search..." />
                  </div>
                </div>
                <!-- Button Delete -->
                <div class="col-2 text-end">
                  <select class="form-select" id="sort" name="sort" aria-label="Sort by">
                    <option selected disabled value="">Sort by</option>
                    <option value="1">Newest</option>
                    <option value="2">Oldest</option>
                    <option value="3">Total Price Low</option>
                    <option value="4">Total Price High</option>
                  </select>
                </div>
              </div>
              <!-- Table Body -->
              <div class="table-responsive text-nowrap py-3">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th rowspan="2" style="width: 10%; vertical-align:middle; text-align:center;">Transaction ID</th>
                      <th rowspan="2" style="width: 20%; vertical-align:middle; text-align:center;">Customer</th>
                      <th rowspan="2" style="width: 15%; vertical-align:middle; text-align:center;">Date</th>
                      <th colspan="2" class="text-center">Purchase List</th>
                      <th rowspan="2" style="width: 15%; vertical-align:middle; text-align:center;">Total Price</th>
                    </tr>
                    <tr>
                      <th style="width: 25%; vertical-align:middle; text-align:center;">Product</th>
                      <th style="width: 5%; vertical-align:middle; text-align:center;">Qty</th>
                    </tr>
                  </thead>
                  <tbody id="listdata">
                  </tbody>
                </table>
              </div>
            </div>
            <!-- Table History -->

          </div>

          <!-- / Content -->

          <!-- Footer -->
          @include('panel.script')
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
    let key   = '';
    let start = '';
    let end   = '';
    let sort  = '';

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

    showlist();
    function showlist(){
      $.ajax({
        type : 'GET',
        url  : `<?= asset('listsales') ?>`,
        data : {
          keyword : key,
          start   : start,
          end     : end,
          sort     : sort
        }
        ,
        contentType: "application/json",
        success: function(res){
            const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        
            let data = res.DATA
            if(data.length != 0){
              $('#listdata').empty();
              $.each(data, function(index, val){
              
              let prod = val.product;
              let prods = ``;
              let qtys  = ``;
              $.each(prod, function(index, v){
                  prods += `<li>${v.product_name}</li>`;
                  qtys += `<li>${v.quantity}</li>`;
              });
              total = formatRupiah(val.total_price.toString(),'Rp. ');
              const date = new Date(val.created_at);
              const dates = months[date.getMonth()] +' '+date.getDate()+', '+date.getFullYear();
              let append =`<tr>
                      <td>${val.id}</td>
                      <td><strong>${val.customer_name}</strong></td>
                      <td>${dates}</td>
                      <td>
                        <ul class="mt-3">
                          ${prods}
                        </ul>
                      </td>
                      <td>
                        <ul class="mt-3">
                          ${qtys}
                        </ul>
                      </td>
                      <td>${total}</td>
                    </tr>`;
                $('#listdata').append(append);
            });
          }else{
            $('#listdata').empty();
            let html = `<tr>
                        <td colspan="6" style="text-align:center">
                        No Result Data
                        </td>
                      </tr>`;
            $('#listdata').html(html);
          }
        }
      });
    }

  $('#sort').on('change', function(e){
    e.preventDefault();
    key   = document.querySelector('#search').value;
    start = document.querySelector('#start').value;
    end   = document.querySelector('#end').value;
    sort   = document.querySelector('#sort').value;
    showlist();
  });

  $('#search').on('keyup', function(e){
    e.preventDefault();
    key   = document.querySelector('#search').value;
    start = document.querySelector('#start').value;
    end   = document.querySelector('#end').value;
    sort   = document.querySelector('#sort').value;
    showlist();
  });

    $('#search_filter').submit(async function(e){
      e.preventDefault();
      key   = document.querySelector('#search').value;
      start = document.querySelector('#start').value;
      end   = document.querySelector('#end').value;
      sort   = document.querySelector('#sort').value;
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