<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="{{asset('assets')}}/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Login | Toko Alat Tulis</title>

  <meta name="description" content="" />
  @include('panel.style')
  <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}" />
</head>

<body class="image-body">
  <!-- Content -->

  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Login -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="index.html" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                  <img src="{{asset('assets/img/logo.jpg')}}" alt class="w-px-30 h-auto rounded-circle" />
                </span>
                <span class="app-brand-text demo text-body fw-bolder">ATK</span>
              </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2 text-center">Welcome to ATK! 👋</h4>
            <p class="mb-4 text-center">Please sign-in to your account</p>

            <form id="formLogin">
              @csrf
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" required
                  placeholder="Enter your email or username" autofocus />
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Password</label>
                  <a href="{{asset('reset-password')}}">
                    <small>Forgot Password?</small>
                  </a>
                </div>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" name="password" class="form-control" name="password" required
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
              <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="remember-me" />
                  <label class="form-check-label" for="remember-me"> Remember Me </label>
                </div>
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-primary d-grid w-100">Sign In</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /Login -->
      </div>
    </div>
  </div>

  @include('panel.script')
  <script>
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

    $('#formLogin').submit(async function(e){
      e.preventDefault();
      var formLogin = $('#formLogin').serialize();
      $.ajax({
        type:'POST',
        url: `{{route('login-process')}}`,
        data: formLogin,
        error:function(e){
            Swal.fire({
                type: "error",
                title: 'Failed',
                text: 'Login Failed'
            })
        },
        success:function(res){
          if(res.ERR == false){
            let data = res.DATA;
            console.log(data);
            if(data.role == 'Admin'){
            Swal.fire({
                type: "success",
                title: 'Success',
                text: 'Login Success',
                confirmButtonClass: 'btn btn-success',
            }).then(() => {
              location.assign("{{asset('/')}}");
            })
            }else{
            Swal.fire({
                type: "success",
                title: 'Success',
                text: 'Login Success',
                confirmButtonClass: 'btn btn-success',
            }).then(() => {
              location.assign("{{asset('/cashier')}}");
            })
            }
          }else{
            Swal.fire({
                type: "error",
                title: "Failed",
                text: "Login Failed"
            })
          }
        }
      });
    })
  </script>
</body>

</html>