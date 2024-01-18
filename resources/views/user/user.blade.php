<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="default" data-assets-path="../assets/">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>User | Toko Alat Tulis</title>

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
                    Users
                  </h4>
                </div>
              </div>
              <div class="col-12 col-md-6 align-self-center text-center text-sm-end">
                <button type="button" class="btn btn-primary me-1" data-bs-toggle="modal" data-bs-target="#addUser">
                  <span class="tf-icons bx bx-plus-circle"></span>
                  Add User
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

                <div class="col">
                  <div class="row g-2">
                    <!-- Button Delete -->
                    <div class="col text-end">
                    <button type="button" id="btn_delete" class="btn btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target="#deleteModal">
                        <span class="tf-icons bx bx-trash"></span>&nbsp; Delete
                      </button>
                    </div>
                  </div>
                </div>

              </div>
              <!-- Table Body -->
              <div class="table-responsive text-nowrap py-3">
                <table class="table table-striped" id="datatable">
                  <thead>
                    <tr>
                      <th style="width: 5%;">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </div>
                      </th>
                      <th style="width: 20%;">Name</th>
                      <th style="width: 10%;">Role</th>
                      <th style="width: 15%;">Email</th>
                      <th style="width: 10%;">Phone</th>
                      <th style="width: 10%;">Gender</th>
                      <th style="width: 5%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
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

  <!-- Modal New Product -->
  <div class="modal fade" id="addUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">New User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Modal Body -->
        <form id="formAdd">
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="name" class="form-label">Name</label>
              <input required type="text" id="name" name="name" class="form-control" placeholder="Enter Name" />
            </div>
          </div>
          <div class="row g-md-2">
            <div class="col-md-6 mb-3">
              <label for="role" class="form-label">Role</label>
              <select required class="form-select" id="role" name="role" aria-label="Select Role">
                <option value="">-- Select Role --</option>
                <option value="Admin">Admin</option>
                <option value="Staff">Staff</option>
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label for="email" class="form-label">Email</label>
              <input required type="email" id="email" name="email" class="form-control" placeholder="ex: example@yourmail.com" />
            </div>
          </div>
          <div class="row g-md-2">
            <div class="col-md-6 mb-3">
              <label for="phone" class="form-label">Phone</label>
              <input required type="number" id="phone" name="phone" class="form-control" placeholder="ex: 08123456789" />
            </div>
            <div class="col-md-6 mb-3">
              <label for="gender" class="form-label">Gender</label>
              <select required class="form-select" id="gender" name="gender" aria-label="Select Gender">
                <option value="">-- Select Gender --</option>
                <option value="MALE">Male</option>
                <option value="FEMALE">Female</option>
              </select>
            </div>
          </div>
          <div class="row g-md-2">
            <div class="col-md-6 mb-3">
              <label for="password" class="form-label">Password</label>
              <input required type="password" id="password" name="password" class="form-control" placeholder="Password" />
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

  <!-- Modal Edit Product -->
  <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Edit User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Modal Body -->
        <form id="formEdit">
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
                <input type="hidden" name="idEdit" id="idEdit" class="form-control">
              <label for="nameedit" class="form-label">Name</label>
              <input required type="text" id="nameEdit" name="nameEdit" class="form-control" value="User 3" placeholder="Enter Name" />
            </div>
          </div>
          <div class="row g-md-2">
            <div class="col-md-6 mb-3">
              <label for="roleEdit" class="form-label">Role</label>
              <select required class="form-select" id="roleEdit" name="roleEdit" aria-label="Select Role">
                <option disabled>-- Select Role --</option>
                <option value="Admin">Admin</option>
                <option value="Staff">Staff</option>
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label for="emailEdit" class="form-label">Email</label>
              <input required type="email" id="emailEdit" name="emailEdit" class="form-control"
                placeholder="ex: example@yourmail.com" />
            </div>
          </div>
          <div class="row g-md-2">
            <div class="col-md-6 mb-3">
              <label for="phoneEdit" class="form-label">Phone</label>
              <input required type="number" id="phoneEdit" name="phoneEdit" class="form-control" placeholder="ex: 08123456789" />
            </div>
            <div class="col-md-6 mb-3">
              <label for="genderEdit" class="form-label">Gender</label>
              <select required class="form-select" id="genderEdit" name="genderEdit" aria-label="Select Gender">
                <option disabled>-- Select Gender --</option>
                <option value="MALE">Male</option>
                <option value="FEMALE">Female</option>
              </select>
            </div>
          </div>
          <div class="row g-md-2">
            <div class="col-md-6 mb-3">
              <label for="phoneEdit" class="form-label">Password</label>
              <input required type="password" id="passwordEdit" name="passwordEdit" class="form-control" placeholder="Password" />
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

  <script>
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
        url  : `<?= asset('listuser') ?>`,
        data : {
          keyword : key
        },
        contentType: "application/json",
        success: function(data){
          let dataTableData = [];
          if(data.ERR == false){
            if(data.DATA.length != 0){
              let res = data.DATA;
              $.each(res, function(index, val){
                dataTableData.push([
                  `<div class="form-check">
                    <input class="form-check-input check" onclick="checkbuttondel()" name="check[]" id="check${val.id}" type="checkbox" value="${val.id}">
                  </div>`,
                  val.name,
                  val.role,
                  val.email,
                  val.phone,
                  val.gender,
                  `<div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-edit"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" onclick="showmodaledit('${val.id}')" href="javascript:void(0);" data-bs-toggle="modal"
                          data-bs-target="#editUser">
                          <i class="bx bx-edit-alt me-1"></i>
                          Edit
                        </a>
                        <a class="dropdown-item" onclick="deletedata('${val.id}')" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                          Delete</a>
                      </div>
                    </div>`

                ]);
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
                      title: `<div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" onclick="allcheck()" id="allcheck">
                                      </div>`
                  },
                  {
                      title: 'NAME'
                  },
                  {
                      title: 'ROLE'
                  },
                  {
                      title: 'EMAIL'
                  },
                  {
                      title: 'PHONE'
                  },
                  {
                      title: 'GENDER'
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
      key = document.querySelector('#search').value;
      showlist();
    });

    function showmodaledit(id){
        $.ajax({
        type  : "GET",
        url   : `{{asset('user')}}/${id}`,
        data  : '',
        error:function(e){
          $('#editUser').modal('hide');
          if(res.ERR == false){
            Swal.fire({
                type: "error",
                title: 'Failed',
                text: 'Failed to Get Data'
            })
          }
        },
        success:function(res){
          let data = res.DATA;
          $('#editUser').modal('show');
          $('#idEdit').val(data.id);
          $('#nameEdit').val(data.name);
          $('#emailEdit').val(data.email);
          $('#phoneEdit').val(data.phone);
          $('#roleEdit').val(data.role);
          $('#genderEdit').val(data.gender);
        }
      });
    }

    $('#formAdd').submit(async function(e){
      e.preventDefault();

      var formcreate = $('#formAdd').serialize();

      $.ajax({
        type:'POST',
        url: "{{route('createuser')}}",
        data: formcreate,
        error:function(e){
          $('#addUser').modal('hide');
          Swal.fire({
              type: "error",
              title: 'Failed',
              text: 'Failed Create User'
          })
        },
        success:function(res){
          if(res == 1){
            $('#addUser').modal('hide');
            Swal.fire({
                type: "success",
                title: 'Success',
                text: 'Success Create user',
                confirmButtonClass: 'btn btn-success',
            }).then(() => {
              showlist();
            })
          }else{
            $('#addUser').modal('hide');
            Swal.fire({
                type: "error",
                title: 'Failed',
                text: 'Failed Create user'
            })
          }
        }
      });
    });

    $('#formEdit').submit(async function(e){
      e.preventDefault();
      var formEdit = $('#formEdit').serialize();

      let id = $('#idEdit').val();
      $.ajax({
        type:'POST',
        url: `{{asset('user')}}/${id}`,
        data: formEdit,
        error:function(e){
        $('#editUser').modal('hide');
        Swal.fire({
            type: "error",
            title: 'Failed',
            text: 'Failed Edit User'
        })
        },
        success:function(res){
          if(res == 1){
            $('#editUser').modal('hide');
            Swal.fire({
                type: "success",
                title: 'Success',
                text: 'Success Edit User',
                confirmButtonClass: 'btn btn-success',
            }).then(() => {
              showlist();
            })
          }else{
            $('#editUser').modal('hide');
            Swal.fire({
                type: "error",
                title: 'Failed',
                text: 'Failed Edit User'
            })
          }
        }
      });
    });

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
            url   : `{{asset('user')}}/${id}`,
            data  : '',
            error:function(e){
                Swal.fire({
                type: "error",
                title: 'Failed',
                text: 'Failed Delete user'
            })
        },
        success:function(res){
          if(res == 1){
            Swal.fire({
                type: "success",
                title: 'Success',
                text: 'Success Delete user',
                confirmButtonClass: 'btn btn-success',
            }).then(() => {
              showlist();
            })
          }else{
            Swal.fire({
                type: "error",
                title: 'Failed',
                text: 'Failed Delete user'
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
        url: "{{route('massdeleteuser')}}",
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

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>