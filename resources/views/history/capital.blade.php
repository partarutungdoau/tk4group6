<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="default" data-assets-path="../assets/">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Capital History | Toko Alat Tulis</title>

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
                    Capital History
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
              <div class="row px-3 g-2 justify-content-between">
                <!-- Search -->
                <div class="col-9 col-md-8">
                  <div class="d-flex align-items-center">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input type="text" class="form-control border-0 shadow-none" id="keyword" name="keyword" placeholder="Search..."
                      aria-label="Search..." />
                  </div>
                </div>
                <!-- Sort By -->
                <div class="col-3 col-md-2 text-end">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#startCapital">
                    <span class="tf-icons bx bx-plus-circle"></span>
                    Start Capital
                  </button>
                </div>
              </div>

              <!-- Table Body -->
              <div class="table-responsive text-nowrap py-3">
                <table class="table table-striped" id="datatable">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Starting Capital</th>
                      <th>Ending Capital</th>
                      <th>Profit</th>
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

  <!-- Modal Start Capital -->
  <div class="modal fade" id="startCapital" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Set Starting Capital</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Modal Body -->
        <form id="formstart">
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="start" class="form-label">Capital Nominal</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text">Rp</span>
                <input type="number" id="start" name="start" class="form-control" placeholder="ex: 155000"
                  aria-label="Start Capital" />
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

  @include('panel.script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript">
    let key       = '';
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
        url  : `<?= asset('listcapital') ?>`,
        data : {
          keyword : key,
          start   : start,
          end     : end
        }
        ,
        contentType: "application/json",
        success: function(res){
          const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
          
          console.log(res);
          let data = res.DATA;
          let dataTableData = [];

          if(data.length != 0){
            $.each(data, function(index, val){
              const tanggal = new Date(val.tanggal);
              const tanggals = months[tanggal.getMonth()] +' '+tanggal.getDate()+', '+tanggal.getFullYear();
              let start   = formatRupiah(val.start_capital.toString(),'Rp. ');
              let end     = formatRupiah(val.end_capital.toString(),'Rp. ');
              let profit  = formatRupiah(val.profit.toString(),'Rp. ');

              dataTableData.push([
                tanggals,
                start,
                end,
                profit,
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
                    title: 'DATE'
                },
                {
                    title: 'STARTING CAPITAL'
                },
                {
                    title: 'ENDING CAPITAL'
                },
                {
                    title: 'PROFIT'
                },
            ],
          })
        }
      });
    }

    $('#search_filter').submit(async function(e){
      e.preventDefault();
      key       = document.querySelector('#keyword').value;
      start = document.querySelector('#start').value;
      end   = document.querySelector('#end').value;
      showlist();
    });

    $('#keyword').on('keyup',async function(e){
      e.preventDefault();
      key       = document.querySelector('#keyword').value;
      start = document.querySelector('#start').value;
      end   = document.querySelector('#end').value;
      showlist();
    });

    $('#formstart').submit(async function(e){
      e.preventDefault();
      var formcreate = $('#formstart').serialize();

      $.ajax({
        type:'POST',
        url: "{{route('startcapital')}}",
        data: formcreate,
        error:function(e){
          console.log(e);
        },
        success:function(res){
          if(res.ERR == false){
            $('#startCapital').modal('hide');
            $("#formstart").trigger("reset");
            Swal.fire({
                type: "success",
                title: 'Success',
                text: res.MSG,
                confirmButtonClass: 'btn btn-success',
            }).then(() => {
              showlist();
            })
          }else{
            $('#startCapital').modal('hide');
            Swal.fire({
                type: "error",
                title: 'Failed',
                text: res.MSG
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
  </script>
</body>

</html>