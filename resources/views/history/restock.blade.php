<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="default" data-assets-path="../assets/">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Restock History | Toko Alat Tulis</title>

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
                    Restock History
                  </h4>
                </div>
              </div>
              <div class="col-12 col-md-6 d-flex align-self-center justify-content-md-end">
                <form id="search_filter">
                  <div class="row me-1 g-2">
                    <div class="col-5">
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
                    </div>
                  </div>
                </form>
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
                    <input type="text" class="form-control border-0 shadow-none" id="search" name="serach" placeholder="Search..."
                      aria-label="Search..." />
                  </div>
                </div>
              </div>
              <!-- Table Body -->
              <div class="table-responsive text-nowrap py-3">
              <table class="table table-striped" id="datatable">
                  <thead>
                    <tr>
                      <th style="width: 10%;">Transaction ID</th>
                      <th style="width: 20%;">Supplier</th>
                      <th style="width: 10%;">Order Date</th>
                      <th style="width: 10%;">Receive Date</th>
                      <th style="width: 20%;">Product</th>
                      <th style="width: 5%;">Qty</th>
                      <th style="width: 15%;">Total Price</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- Table History -->
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
    let key   = '';
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
        url  : `<?= asset('listrestock') ?>`,
        data : {
          keyword : key,
          start   : start,
          end     : end
        }
        ,
        contentType: "application/json",
        success: function(res){
          let dataTableData = []
          if(res.ERR == false){
            const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            let data = res.DATA;
            data.map(val => {
              total = formatRupiah(val.total_price.toString(),'Rp. ');
              const order_date = new Date(val.order_date);
              const order_dates = months[order_date.getMonth()] +' '+order_date.getDate()+', '+order_date.getFullYear();
              const receive_date = new Date(val.receive_date);
              const receive_dates = months[receive_date.getMonth()] +' '+receive_date.getDate()+', '+receive_date.getFullYear();
              dataTableData.push([
                val.id,
                val.suppliers_name,
                order_dates,
                receive_dates,
                val.product_name,
                val.quantity,
                total
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
                    title: 'Transaction ID'
                },
                {
                    title: 'Supplier'
                },
                {
                    title: 'Order Date'
                },
                {
                    title: 'Receive Date'
                },
                {
                    title: 'Product'
                },
                {
                    title: 'Qty'
                },
                {
                    title: 'Total Price'
                },
            ],
          })
          // if(res.ERR == false){
          //   $('#listdata').empty();
          //   $.each(data, function(index, val){
              
          //     total = formatRupiah(val.total_price.toString(),'Rp. ');
          //     const order_date = new Date(val.order_date);
          //     const order_dates = months[order_date.getMonth()] +' '+order_date.getDate()+', '+order_date.getFullYear();
          //     const receive_date = new Date(val.receive_date);
          //     const receive_dates = months[receive_date.getMonth()] +' '+receive_date.getDate()+', '+receive_date.getFullYear();
          //     console.log(months[order_date.getMonth()]);
          //     let append =`<tr>
          //             <td>${val.id}</td>
          //             <td><strong>${val.suppliers_name}</strong></td>
          //             <td>${order_dates}</td>
          //             <td>${receive_dates}</td>
          //             <td>${val.product_name}</td>
          //             <td>${val.quantity}</td>
          //             <td>${total}</td>
          //           </tr>`;
          //       $('#listdata').append(append);
          //   });
          // }else{
          //   $('#listdata').empty();
          //   let html = `<tr>
          //               <td colspan="7" style="text-align:center">
          //               No Result Data
          //               </td>
          //             </tr>`;
          //   $('#listdata').html(html);
          // }
        }
      });
    }

    $('#search').on('keyup', function(e){
      e.preventDefault();
      key = document.querySelector('#search').value;
      start = document.querySelector('#start').value;
      end = document.querySelector('#end').value;
      showlist();
    });

    $('#search_filter').submit(async function(e){
      e.preventDefault();
      key   = document.querySelector('#search').value;
      start = document.querySelector('#start').value;
      end   = document.querySelector('#end').value;
      showlist();
    })

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