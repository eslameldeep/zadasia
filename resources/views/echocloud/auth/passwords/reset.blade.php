<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{$available_locale[app()->getLocale()]['rtl'] ? "rtl" : "ltr"}}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('echocloud-assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('echocloud-assets/img/icon-c.svg') }}">
  {!! SEO::generate() !!}
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('echocloud-assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('echocloud-assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('echocloud-assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('echocloud-assets/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
          <div class="container-fluid pe-0">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="{{ route('echocloud.home') }}">
              EchoCloud
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="{{ route('frontend.home') }}">
                    <i class="fa fa-home opacity-6 text-dark me-1"></i>
                    {{__('Home')}}
                  </a>
                </li>
                
                @guest
                @if (\Illuminate\Support\Facades\Route::has('echocloud.register'))
                <li class="nav-item">
                  <a class="nav-link me-2" href="{{ route('echocloud.register') }}">
                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                    {{__('Sign Up')}}
                  </a>
                </li>
                  
                @endif
                
                <li class="nav-item">
                  <a class="nav-link me-2" href="{{ route('echocloud.login') }}">
                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                    {{__('Sign In')}}
                  </a>
                </li>

                @else
                
                @endguest
                
              </ul>
              {{-- <li class="nav-item d-flex align-items-center">
                <a class="btn btn-round btn-sm mb-0 btn-outline-primary me-2" target="_blank" href="https://www.creative-tim.com/builder?ref=navbar-soft-ui-dashboard">Online Builder</a>
              </li> --}}
              {{-- <ul class="navbar-nav d-lg-block d-none">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/product/soft-ui-dashboard" class="btn btn-sm btn-round mb-0 me-1 bg-gradient-dark">Free download</a>
                </li>
              </ul> --}}
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            @if ($available_locale[app()->getLocale()]['rtl']  )
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top fixed-left ms-auto h-100 z-index-0 ms-n6" style="background-image:url('{{asset("echocloud-assets/img/curved-images/curved6.jpg")}}')"></div>
              </div>
            </div>  
            @endif
            
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">{{__('Reset Password')}}</h3>
                  <p class="mb-0">{{__('We will send a reset link to your email')}}</p>
                  @if(session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
                    @endif
                </div>
                <div class="card-body">
                  <form role="form" method="POST" action="{{ route('echocloud.password.reset' , request('token')) }}">
                    @csrf
                    @method('POST')
                    
                    {{-- Token field --}}
                    <input type="hidden" name="token" value="{{ $token }}">

                    <label>{{__('Email')}}</label>
                    <div class="mb-3">
                      <input type="email" class="form-control " name="email"   value="{{ old('email') }}"  placeholder="{{__('Email')}}" aria-label="Email" aria-describedby="email-addon" autofocus>
                      @error('email')
                      <div class="form-text text-danger">  <strong>{{ $message }}</strong></div>
                      
                      @enderror
                    </div>
                    <label>{{__('password')}}</label>
                    <div class="mb-3">
                      <input type="password" class="form-control " name="password"   value="{{ old('password') }}"  placeholder="{{__('password')}}" aria-label="password" >
                      @error('password')
                      <div class="form-text text-danger">  <strong>{{ $message }}</strong></div>
                      
                      @enderror
                    </div>
                    <label>{{__('password confirmation')}}</label>
                    <div class="mb-3">
                      <input type="password" class="form-control " name="password_confirmation"   value="{{ old('password_confirmation') }}"  placeholder="{{__('password_confirmation')}}" aria-label="password_confirmation" >
                      @error('password_confirmation')
                      <div class="form-text text-danger">  <strong>{{ $message }}</strong></div>
                      
                      @enderror
                    </div>
                    
                   
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">{{__('send password reset link')}}</button>
                    </div>
                  </form>
                </div>
                @if (\Illuminate\Support\Facades\Route::has('echocloud.register'))
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    {{__("Don't have an account?")}}
                    <a href="{{ route('echocloud.register') }}" class="text-info text-gradient font-weight-bold">{{__('Sign up')}}</a>
                  </p>
                </div>
                @endif
                
              </div>
            </div>
            
            @if (!$available_locale[app()->getLocale()]['rtl']  )
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top fixed-left ms-auto h-100 z-index-0 ms-n6" style="background-image:url('{{asset("echocloud-assets/img/curved-images/curved6.jpg")}}')"></div>
              </div>
            </div>  
            @endif
           

          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mb-4 mx-auto text-center">
            <a href="{{ route('frontend.home') }}" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                Home
            </a>
            <a href="{{ route('frontend.fields') }}" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                Fields
            </a>
            <a href="{{ route('frontend.products') }}" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                Products
            </a>
            <a href="{{ route('frontend.software') }}" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                Software And Applications
            </a>
            <a href="{{ route('frontend.challenges') }}" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                Challenges Solved
            </a>
            <a href="{{ route('frontend.contact-us') }}" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                Contact us
            </a>
            
        </div>

    </div>
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script> <a href="{{route('frontend.home')}}"> SpaceEcho</a>
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="{{ asset('echocloud-assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('echocloud-assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('echocloud-assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('echocloud-assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../echocloud-assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>