<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="default" data-assets-path="{{asset('assets')}}/">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Category | Toko Alat Tulis</title>

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
                    Category
                  </h4>
                </div>
              </div>
              <div class="col-12 col-md-6 align-self-center text-center text-sm-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newCategory">
                  <span class="tf-icons bx bx-plus-circle"></span>
                  New Category
                </button>
              </div>
            </div>
            <!-- Table Card -->
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
                      <th style="width: 5%;">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="1" name="allcheck" id="allcheck">
                        </div>
                      </th>
                      <th style="width: 60%;">Category Name</th>
                      <th class="text-center" style="width: 20%;">Total Items</th>
                      <th class="text-center" style="width: 15%;">Action</th>
                    </tr>
                  </thead>
                  <tbody id="listdata"> 
                  </tbody>
                </table>
              </div>
            </div>
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

  <!-- Modal New Category -->
  <div class="modal fade" id="newCategory" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">New Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="createform">
        <!-- Modal Body -->
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="categoryName" class="form-label">Category Name</label>
              <input required type="text" id="categoryName" name="categoryName" class="form-control" placeholder="Enter Category Name" />
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

  <!-- Modal Edit Category -->
  <div class="modal fade" id="editCategory" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Edit Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form id="formEdit">
        <!-- Modal Body -->
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <input type="hidden" name="categoryIdedit" id="categoryIdedit"> 
              <label for="categoryName" class="form-label">Category Name</label>
              <input required type="text" id="categoryNameedit" name="categoryNameedit" class="form-control"
                placeholder="Enter Category Name" />
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
        url  : `<?= asset('listcategory') ?>`,
        data : {
          keyword : key
        }
        ,
        contentType: "application/json",
        success: function(res){
            let dataTableData = [];
          if(res.ERR == false){
            data = res.DATA;
            if(data.length != 0){

              data.map(val => {
                dataTableData.push([
                    `<div class="form-check">
                      <input class="form-check-input check" onclick="checkbuttondel()" name="check[]" id="check${val.id}" type="checkbox" value="${val.id}">
                    </div>`,
                    val.nama,
                    val.count,
                    `<div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-edit"></i>
                      </button>
                      <div class="dropdown-menu">
                        <button class="dropdown-item" onclick="editmodal('${val.id}','${val.nama}')">
                          <i class="bx bx-edit-alt me-1"></i>
                          Edit
                        </button>
                        <button class="dropdown-item" onclick="deletes('${val.id}')"><i class="bx bx-trash me-1"></i>
                          Delete</button>
                      </div>
                    </div>`
                  ])
              })
              }
          }
          
          $('#datatable').DataTable().destroy();
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
                                        <input class="form-check-input" type="checkbox" value="1" onclick="allcheck()" id="allcheck">
                                      </div> `
                  },
                  {
                      title: 'Category Name'
                  },
                  {
                      title: 'Total Items'
                  },
                  {
                      title: 'Action'
                  }
                ],
              })
        }
      });
    }

    $('#search').on('keyup', function(e){
      e.preventDefault();

      key = document.querySelector('#search').value;
      showlist();
    });

    function editmodal(cid, cname){
      $('#editCategory').modal('show');
      $('#categoryIdedit').val(cid);
      $('#categoryNameedit').val(cname);
    }

    $('#createform').submit(async function(e){
      e.preventDefault();

      var formcreate = $('#createform').serialize();

      $.ajax({
        type:'POST',
        url: "{{route('createcategory')}}",
        data: formcreate,
        error:function(e){
          console.log(e);
        },
        success:function(res){
          if(res == 1){
            $('#newCategory').modal('hide');
            $("#createform").trigger("reset");
            Swal.fire({
                type: "success",
                title: 'Success',
                text: 'Success Create Category',
                confirmButtonClass: 'btn btn-success',
            }).then(() => {
              showlist();
            })
          }else{
            $('#newCategory').modal('hide');
            Swal.fire({
                type: "error",
                title: 'Failed',
                text: 'Failed Create Category'
            })
          }
        }
      });
    });

    $('#formEdit').submit(async function(e){
      e.preventDefault();
      var formEdit = $('#formEdit').serialize();

      let id = $('#categoryIdedit').val();
      console.log(formEdit);
      $.ajax({
        type:'POST',
        url: `{{asset('category')}}/${id}`,
        data: formEdit,
        error:function(e){
          console.log(e);
        },
        success:function(res){
          if(res == 1){
            $('#editCategory').modal('hide');
            $("#formEdit").trigger("reset");
            Swal.fire({
                type: "success",
                title: 'Success',
                text: 'Success Edit Category',
                confirmButtonClass: 'btn btn-success',
            }).then(() => {
              showlist();
            })
          }else{
            $('#editCategory').modal('hide');
            Swal.fire({
                type: "error",
                title: 'Failed',
                text: 'Failed Edit Category'
            })
          }
        }
      });
    });


    
    
    function deletes(id){
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
            url   : `{{asset('category')}}/${id}`,
            data  : '',
            error:function(e){
          console.log(e);
        },
        success:function(res){
          if(res == 1){
            Swal.fire({
                type: "success",
                title: 'Success',
                text: 'Success Delete Category',
                confirmButtonClass: 'btn btn-success',
            }).then(() => {
              showlist();
            })
          }else{
            Swal.fire({
                type: "error",
                title: 'Failed',
                text: 'Failed Delete Category'
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
        url: "{{route('massdeletecategory')}}",
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