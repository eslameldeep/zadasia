<!--
=========================================================
* Soft UI Dashboard - v1.0.7
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    dir="{{ $available_locale[app()->getLocale()]['rtl'] ? 'rtl' : 'ltr' }}">

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
    <link href="{{ asset('echocloud-assets/css/select2.min.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('echocloud-assets/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
    <!-- Navbar -->
    <nav
        class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
        <div class="container">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="{{ route('echocloud.home') }}">
                EchoCloud
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon mt-2">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                            href="{{ route('frontend.home') }}">
                            <i class="fa fa-home opacity-6  me-1"></i>
                            {{ __('Home') }}
                        </a>
                    </li>

                    @guest

                        <li class="nav-item">
                            <a class="nav-link me-2" href="{{ route('echocloud.register') }}">
                                <i class="fas fa-user-circle opacity-6  me-1"></i>
                                {{ __('Sign Up') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-2" href="{{ route('echocloud.login') }}">
                                <i class="fas fa-key opacity-6  me-1"></i>
                                {{ __('Sign In') }}
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link me-2" href="{{ route('echocloud.login') }}"
                                onclick="event.preventDefault();     document.getElementById('logout-form').submit();">
                                <i class="fas fa-power-off opacity-6 text-dark me-1"></i>
                                {{ __('Logout') }}
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('echocloud.logout') }}" method="POST"
                            style="display: one;">
                            {{ csrf_field() }}
                        </form>
                    @endguest

                </ul>
                {{-- <li class="nav-item d-flex align-items-center">
                    <a class="btn btn-round btn-sm mb-0 btn-outline-white me-2" target="_blank"
                        href="https://www.creative-tim.com/builder?ref=navbar-soft-ui-dashboard">Online Builder</a>
                </li>
                <ul class="navbar-nav d-lg-block d-none">
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/product/soft-ui-dashboard"
                            class="btn btn-sm btn-round mb-0 me-1 bg-gradient-light">Free download</a>
                    </li>
                </ul> --}}
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <main class="main-content  mt-0">
        <section class="min-vh-100 mb-8">
            <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
                style="background-image:url('{{ asset('echocloud-assets/img/curved-images/curved6.jpg') }}')">
                <span class="mask bg-gradient-dark opacity-6"></span>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 text-center mx-auto">
                            <h1 class="text-white mb-2 mt-5">Welcome!</h1>
                            <p class="text-lead text-white">Use these awesome forms to login or create new account in
                                your project for free.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                    <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                        <div class="card z-index-0">
                            <div class="card-header text-center pt-4">
                                <h5>Register</h5>
                            </div>


                            <div class="card-body">
                                <form role="form text-left" method="POST" action="{{ route('echocloud.register') }}">
                                    @method('POST')
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" value="{{ old('name') }}" class="form-control"
                                            name="name" placeholder="Name" aria-label="Name"
                                            aria-describedby="email-addon">
                                        @error('name')
                                            <div class="form-text text-danger"> <strong>{{ $message }}</strong></div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <input type="email" value="{{ old('email') }}" class="form-control"
                                            name="email" placeholder="Email" aria-label="Email"
                                            aria-describedby="email-addon">
                                        @error('email')
                                            <div class="form-text text-danger"> <strong>{{ $message }}</strong></div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Password" aria-label="Password"
                                            aria-describedby="password-addon">
                                        @error('password')
                                            <div class="form-text text-danger"> <strong>{{ $message }}</strong></div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control" name="password_confirmation"
                                            placeholder="Confirm Password" aria-label="Password"
                                            aria-describedby="password-addon">
                                        @error('password_confirmation')
                                            <div class="form-text text-danger"> <strong>{{ $message }}</strong></div>
                                        @enderror
                                    </div>
                                    {{-- <div class="form-check form-check-info text-left">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            I agree the <a href="javascript:;"
                                                class="text-dark font-weight-bolder">Terms and Conditions</a>
                                        </label>
                                    </div> --}}
                                    <hr>
                                    <div class="mb-3">
                                        <select name="country_code" class="country_code form-control">
                                            <option ></option>
                                            {{-- @foreach ($countries as $country)
                                                <option value="{{ $country->iso }}" @selected(old('country_code') == $country->iso)>
                                                    {{ $country->name }} (+{{ $country->phonecode }})</option>
                                            @endforeach --}}
                                        </select>


                                        @error('phonecode')
                                            <div class="form-text text-danger"> <strong>{{ $message }}</strong></div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" value="{{ old('phone') }}" class="form-control"
                                            name="phone" placeholder="{{ __('Phone') }}" aria-label="Phone"
                                            @error('phone')
                                            <div class="form-text text-danger"> <strong>{{ $message }}</strong></div>
                                        @enderror
                                            </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn bg-gradient-dark w-100 my-4 mb-2">{{ __('Sign up') }}</button>
                                        </div>
                                        <p class="text-sm mt-3 mb-0">{{ __('Already have an account?') }} <a
                                                href="{{ route('echocloud.login') }}"
                                                class="text-dark font-weight-bolder">{{ __('Sign in') }}</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
        <footer class="footer py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-4 mx-auto text-center">
                        <a href="{{ route('frontend.home') }}" target="_blank"
                            class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                            Home
                        </a>
                        <a href="{{ route('frontend.fields') }}" target="_blank"
                            class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                            Fields
                        </a>
                        <a href="{{ route('frontend.products') }}" target="_blank"
                            class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                            Products
                        </a>
                        <a href="{{ route('frontend.software') }}" target="_blank"
                            class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                            Software And Applications
                        </a>
                        <a href="{{ route('frontend.challenges') }}" target="_blank"
                            class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                            Challenges Solved
                        </a>
                        <a href="{{ route('frontend.contact-us') }}" target="_blank"
                            class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                            Contact us
                        </a>

                    </div>

                </div>
                <div class="row">
                    <div class="col-8 mx-auto text-center mt-1">
                        <p class="mb-0 text-secondary">
                            Copyright ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> <a href="{{ route('frontend.home') }}"> SpaceEcho</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    </main>
    <!--   Core JS Files   -->
    <script src="{{ asset('echocloud-assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('echocloud-assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('echocloud-assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('echocloud-assets/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.country_code').select2({
                placeholder: '{{ __('Country') }}',
                ajax: {
                    url: '{{route('echocloud.get-countries')}}',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            term: params.term || '',
                            page: params.page || 1
                        }
                    },
                    cache: true
                },
                templateResult: function(idioma) {
                    var $span = $("<span><img  height='10' src='/echocloud-assets/img/flags/" +
                        (idioma.id == '' ? 'flag' : idioma.id) + ".svg'/> " + idioma.text + "</span>");
                    return $span;
                }
                ,
                templateSelection: function(idioma) {
                    
                    var $span = $("<span><img height='10' src='/echocloud-assets/img/flags/" +
                        (idioma.id == '' ? 'flag' : idioma.id) + ".svg'/> " + idioma.text + "</span>");
                    return $span;
                }
            });
        });
    </script>


    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    {{-- <script src="../echocloud-assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script> --}}
</body>

</html>
