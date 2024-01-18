<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="default" data-assets-path="../assets/">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Finance Manager | Toko Alat Tulis</title>

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
                    Finance Manager
                  </h4>
                </div>
              </div>
            </div>

            <!-- Filter by Date -->
            <div class="row mb-4">
              <div class="col">
                <div class="card p-2">
                  <div class="card-title">
                    <h4 class="fw-bold text-center mt-4 mb-0">
                      Choose date to set parameters
                    </h4>
                  </div>
                  <div class="card-body p-3">
                    <form id="search_form">
                    <div class="row">
                      <div class="col-12 col-md-5">
                          <div class="form-group mb-3">
                              <input type="date" id="start" name="start" required class="form-control" placeholder="Select Date">
                          </div>
                      </div>
                      <div class="col-12 col-md-5">
                          <div class="form-group mb-3">
                              <input type="date" id="end" name="end" required class="form-control" placeholder="Select Date">
                          </div>
                      </div>
                      <div class="col-12 col-md-2 mb-3">
                        <button type="submit" class="btn btn-primary w-100">
                          Submit
                        </button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- Filter by Date -->

            <!-- Query by date -->
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
                        <small class="text-muted d-block mb-1">Total Income</small>
                        <div class="d-flex align-items-center">
                          <h3 class="mb-0 me-1" id="income">Rp. -</h3>
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
                        <small class="text-muted d-block mb-1">Total Sell Transaction</small>
                        <div class="d-flex align-items-center">
                          <h3 class="mb-0 me-1" id="sell">
                            0
                            <small>Transactions</small>
                          </h3>
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
                        <small class="text-muted d-block mb-1">Total Outcome</small>
                        <div class="d-flex align-items-center">
                          <h3 class="mb-0 me-1" id="outcome">Rp. -</h3>
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
                        <small class="text-muted d-block mb-1">Total Buy Transaction</small>
                        <div class="d-flex align-items-center">
                          <h3 class="mb-0 me-1" id="buy">
                            0
                            <small>Transactions</small>
                          </h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Query by date -->

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
    let start = '';
    let end   = '';

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

    showlist();

    function showlist(){
      $.ajax({
        type : 'GET',
        url  : `<?= asset('listfinance') ?>`,
        data : {
          start : start,
          end   : end
        },
        contentType: "application/json",
        success: function(res){
          if(res.ERR == false){
            data = res.DATA;
            let income = formatRupiah(data.income.toString(),'Rp. ');
            let outcome = formatRupiah(data.outcome.toString(),'Rp. ');
            let sell = data.sell+" Transactions";
            let buy = data.buy+" Transactions";

            $('#income').html(income);
            $('#outcome').html(outcome);
            $('#buy').html(buy);
            $('#sell').html(sell);
          }else{
            Swal.fire({
                type: "error",
                title: 'Failed',
                text: res.MSG
            })

            $('#income').html("Rp. -");
            $('#outcome').html("Rp. -");
            $('#buy').html("0 Transactions");
            $('#sell').html("0 Transactions");
          }
        },
        error:function(e){
          console.log(e);
        }
      });
    }

    $('#search_form').submit(async function(e){
      e.preventDefault(); 
      start = document.querySelector('#start').value;
      end = document.querySelector('#end').value;

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