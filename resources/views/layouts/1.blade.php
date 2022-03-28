@php
use App\Models\User;
$user = User::where('id', session('id'))->first();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <title>{{ $page }} </title>

    @livewireStyles
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 


    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script> 
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="{{ asset('js/chart.js') }}"></script>
    <script src="{{ asset('lib/main.js') }}"></script>
    <script src="{{ asset('lib/locales-all.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css" /> --}}


    {{-- <script src="{{ asset('lib/') }}"></script> --}}

    <style>
        body {
            background: #ffffff;
        }

        .nav_link:hover {
            color: blue !important;
            font-weight: bold;
            font-size: 18px;

        }

        .nav_link {
            color: white !important;
            font-size: 18px;
        }

        .activee {
            color: blue !important;
            font-weight: bold;
            font-size: 18px;
            background: #212529 !important;
        }

        .dropdown-item .activee {}

        .main-c {
            padding-left: 50px;
            padding-right: 50px;
            padding-top: 6rem
        }

        .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0; // remove the gap so it doesn't close
        }

        .dropend:hover .dropdown-menu {
            display: block;
            margin-top: 0; // remove the gap so it doesn't close
        }

    </style>
</head>

<body oncontextmenu='return false' class='snippet-body'>

    <!-- Page Heading -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            {{-- <a class="navbar-brand" href="#"><img src="{{ asset('images/logo.png') }}" height="40px" width="70px"
                    alt=""></a> --}}
            <a class="navbar-brand @if ($pageSlug == 'accueil') {{ 'activee' }} @endif" href="/index">Accueil</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">  
                     
                </ul>
                <div class="d-flex">
                    <div class="nav-item dropdown dropstart">

                        <h5 class="nav-link nav_link fw-bold   dropdown-toggle @if ($sup == 'pro') {{ 'activee' }} @endif " id="user"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ $user->name }} </h5>

                        <ul class="dropdown-menu dropdown-menu-dark bg-dark" aria-labelledby="user">
                            {{-- <li><a class="dropdown-item @if ($pageSlug == 'profile') {{ 'activee' }} @endif" href="/profile">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li> --}}
                            <li><a class="dropdown-item" href="/logout">Déconnexion</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <!-- Page Content -->
    <!--Container Main start-->

    <div class="main-c  mt-10">
        @yield('content')

    </div>


    @stack('modals')

    @stack('scripts')

    {{-- <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
    <script>
        $("select").select2({
            theme: "bootstrap-5",
        });
        // Small using Select2 properties
        $("#form-select-sm").select2({
            theme: "bootstrap-5",
            containerCssClass: "select2--small", // For Select2 v4.0
            selectionCssClass: "select2--small", // For Select2 v4.1
            dropdownCssClass: "select2--small",
        });

        /* // Small using Bootstrap 5 classes
        $("#form-select-sm").select2({
            theme: "bootstrap-5",
            dropdownParent: $("#form-select-sm").parent(), // Required for dropdown styling
        });

        // Large using Select2 properties
        $("select").select2({
            theme: "bootstrap-5",
            containerCssClass: "select2--large", // For Select2 v4.0
            selectionCssClass: "select2--large", // For Select2 v4.1
            dropdownCssClass: "select2--large",
        });

        // Large using Bootstrap 5 classes
        $("#form-select-lg").select2({
            theme: "bootstrap-5",
            dropdownParent: $("#form-select-lg").parent(), // Required for dropdown styling
        }); */
    </script> --}}
   {{--  @livewireScripts --}}
</body>

</html>
