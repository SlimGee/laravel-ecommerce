<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>@yield('title') | {{ config('app.name') }}</title>

    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
          crossorigin="anonymous">

    @vite(['resources/sass/store.scss', 'resources/js/store.js'])
</head>

<body>
    <header class="section-header border-bottom">

        <section class="header-main border-bottom">
            <div class="container">
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-2 navbar-light d-md-none">
                        <button class="navbar-toggler border-0" type="button" data-toggle="collapse"
                                data-target="#main_nav" aria-controls="main_nav" aria-expanded="false"
                                aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon text-dark"></span>
                        </button>
                    </div>
                    <div class="col-md-3 col-4">
                        <div class="brand-wrap mx-auto">
                            <a href="{{ route('home.index') }}">
                                <img class="logo" src="{{ asset('images/JPEG/Apple Plug Logo 1.png') }}">
                            </a>
                        </div> <!-- brand-wrap.// -->
                    </div>
                    <div class="col-lg-6 col-sm-12 col-5 d-none d-md-block">
                        <form action="#" class="search" {{ stimulus_controller('form-search') }}>
                            <div class="input-group w-100">
                                <input type="text" class="form-control" placeholder="Search" {{ stimulus_target('form-search', 'input') }} {{ stimulus_action('form-search', 'searchByEnter', 'keypress') }}>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" {{ stimulus_action('form-search', 'search') }}>
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- col.// -->
                    <div class="col-md-2 col-4">
                        <div class="widgets-wrap float-right ml-auto mt-0">
                            <div class="widget-header mr-3 ">
                                <a href="#" class="icon icon-sm rounded-circle border">
                                    <i class="fas fa-shopping-cart"></i>
                                </a>
                                <span class="badge badge-pill badge-danger notify">1</span>
                            </div>
                        </div> <!-- widgets-wrap.// -->
                    </div> <!-- col.// -->
                </div> <!-- row.// -->
            </div> <!-- container.// -->
        </section> <!-- header-main .// -->

        <nav class="navbar navbar-main navbar-expand-lg navbar-light mb-0 py-0 pb-y-2 mb-md-2">
            <div class="container">
                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('home.index') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        @foreach ($categories->take(4) as $category)
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="#">{{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                        <li class="nav-item d-md-none">
                            <div class="col-12 py-5">
                                <form action="#" class="search" {{ stimulus_controller('form-search') }}>
                                    <div class="input-group w-100">
                                        <input type="text" class="form-control" placeholder="Search" {{ stimulus_target('form-search', 'input') }} {{ stimulus_action('form-search', 'searchByEnter', 'keypress') }}>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button" {{ stimulus_action('form-search', 'search') }}>
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('content')

<footer class="section-footer border-top padding-y">
    <div class="container">
        <section class="footer-top padding-y">
            <div class="row">
                <aside class="col-md">
                    <h6 class="title">Company</h6>
                    <ul class="list-unstyled">
                        <li> <a href="#">Home</a></li>
                        <li> <a href="#">About us</a></li>
                        <li> <a href="#">Shop</a></li>
                        <li> <a href="#">Contact us</a></li>
                    </ul>
                </aside>
                <aside class="col-md">
                    <h6 class="title">Legal Stuff</h6>
                    <ul class="list-unstyled">
                        <li> <a href="#">Refund Policy</a></li>
                        <li> <a href="#">Terms of Service</a></li>
                        <li> <a href="#">Privacy Policy</a></li>
                        <li> <a href="#">Open dispute</a></li>
                    </ul>
                </aside>
                <aside class="col-md">
                    <h6 class="title">Account</h6>
                    <ul class="list-unstyled">
                        <li> <a href="#"> User Login </a></li>
                        <li> <a href="{{ route('register') }}"> User register </a></li>
                        <li> <a href="#"> My Account </a></li>
                        <li> <a href="#"> My Orders </a></li>
                    </ul>
                </aside>
                <aside class="col-md">
                    <h6 class="title">Social</h6>
                    <ul class="list-unstyled">
                        <li><a href="#"> <i class="fab fa-facebook"></i>
                                Facebook </a></li>
                        <li><a href="#"> <i class="fab fa-twitter"></i>
                                Twitter </a></li>
                        <li><a href="#"> <i class="fab fa-instagram"></i>
                                Instagram </a></li>
                        <li><a href="#"> <i class="fab fa-whatsapp"></i>
                                WhatsApp </a></li>
                    </ul>
                </aside>
            </div> <!-- row.// -->
        </section> <!-- footer-top.// -->

        <section class="footer-bottom border-top row">
            <div class="col-md-2">
                <p class="text-muted"> &copy {{ date('Y') }} {{ config('settings.general.legal_name') }} </p>
            </div>
            <div class="col-md-8 text-md-center">
                <span class="px-2">{{ config('settings.general.contact_email') }}</span>
                <span class="px-2">{{ config('settings.general.phone') }}</span>
            </div>
            <div class="col-md-2 text-md-right text-muted">
                <i class="fab fa-lg fa-cc-visa"></i>
                <i class="fab fa-lg fa-cc-paypal"></i>
                <i class="fab fa-lg fa-cc-mastercard"></i>
            </div>
        </section>
    </div>
</footer>
</body>
