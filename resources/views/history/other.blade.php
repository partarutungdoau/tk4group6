<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="default" data-assets-path="../assets/">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Other History | Toko Alat Tulis</title>

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
                    Other History
                  </h4>
                </div>
              </div>
              <div class="col-12 col-md-6 d-flex align-self-center justify-content-md-end">
                <div class="row me-1 g-2">
                  <div class="col-5">
                    <form id="search_filter">
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">From</span>
                      <input type="date" required id="start" name="start" class="form-control" />
                    </div>
                  </div>
                  <div class="col-5">
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">To</span>
                      <input type="date" required id="end" name="end" class="form-control" />
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

            <!-- Table Order -->
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
              </div>

              <!-- Table Body -->
              <div class="table-responsive text-nowrap py-3">
                <table class="table table-striped" id="datatable">
                  <thead>
                    <tr>
                      <th style="width: 15%;">Product</th>
                      <th style="width: 5%;">Qty</th>
                      <th style="width: 10%;">Date</th>
                      <th style="width: 45%;">Description</th>
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
    $(function () {
      $('#datepicker').datepicker();
    });

    let key = '';
    let start = '';
    let end = '';

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

    showlist();
    function showlist(){
      $.ajax({
        type : 'GET',
        url  : `<?= asset('listother') ?>`,
        data : {
          keyword : key,
          start   : start,
          end     : end
        }
        ,
        contentType: "application/json",
        success: function(res){
          let dataTableData = []
          const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
          let data = res.DATA
          
          if(data.length != 0){
            $.each(data, function(index, val){
              
              const substract_date = new Date(val.substract_date);
              const substract_dates = months[substract_date.getMonth()] +' '+substract_date.getDate()+', '+substract_date.getFullYear();
              
              dataTableData.push([
                val.product_name,
                val.quantity,
                substract_dates,
                val.description,
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
            columns: [
                {
                    title: 'PRODUCT'
                },
                {
                    title: 'QTY'
                },
                {
                    title: 'Date'
                },
                {
                    title: 'DESCRIPTION'
                },
            ],
          })
        }
      });
    }

    $('#search').on('keyup', function(e){
      e.preventDefault();

      key   = document.querySelector('#search').value;
      start = document.querySelector('#start').value;
      end   = document.querySelector('#end').value;
      showlist();
    });

    $('#search_filter').submit(async function(e){
      e.preventDefault();
      key   = document.querySelector('#search').value;
      start = document.querySelector('#start').value;
      end   = document.querySelector('#end').value;
      showlist();
    });
  </script>

</body>

</html>