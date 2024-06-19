<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Created by DevSign Creative Solution">
    <meta property="og:title" content="Created by DevSign Creative Solution">
    <meta property="og:description" content="Created by DevSign Creative Solution">
    <meta property="og:image" content="">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>{{ config('app.name') }} | @yield('title')</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}" />

    <link href="{{ asset('vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('vendor/nouislider/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/chartist/css/chartist.min.css') }}" />
    <!-- Datatable -->
    <link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <!-- Daterange picker -->
    <link href="{{ asset('vendor/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <!-- Clockpicker -->
    <link href="{{ asset('vendor/clockpicker/css/bootstrap-clockpicker.min.css') }}" rel="stylesheet">
    <!-- asColorpicker -->
    <link href="{{ asset('vendor/jquery-asColorPicker/css/asColorPicker.min.css') }}" rel="stylesheet">
    <!-- Material color picker -->
    <link href="{{ asset('vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">

    <!-- Pick date -->
    <link rel="stylesheet" href="{{ asset('vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/pickadate/themes/default.date.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- Style css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />

    <!-- select2 -->
    <link href="{{ asset('vendor/select2/css/select2.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/jquery-nice-select/css/nice-select.css') }}">

    <!-- sweetalert2 -->
    <link href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">



</head>

<body>
    <!--*******************
        Preloader start
    ********************-->
    <!-- <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div> -->
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="#" class="brand-logo">

                <div class="brand-title">
                    <h2 class="">Admin</h2>
                    @if(auth()->check())
                    <span class="brand-sub-title">Halo, {{ auth()->user()->name }}</span>
                    @endif
                </div>

            </a>
            <div class=" nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header border-bottom">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">Barokah Ibu Digital Printing</div>
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <img src="{{ asset('images/user.jpg') }}" width="56" alt="" />
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item ai-icon">
                                            <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                <polyline points="16 17 21 12 16 7"></polyline>
                                                <line x1="21" y1="12" x2="9" y2="12"></line>
                                            </svg>
                                            <span class="ms-2">Logout</span>
                                        </button>
                                    </form>
                                </div>
                            </li>

                            <!-- <li class="nav-item">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span class="ms-2">Logout</span>
                                    </button>
                                </form>
                            </li> -->

                        </ul>

                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">

                    <li>
                        <a href="{{ route('dashboard') }}" class="" aria-expanded="false">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fas fa-layer-group"></i>
                            <span class="nav-text">Level Customer</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{ route('class-levels') }}">Data Level Customer</a>
                            </li>
                            <li>
                                <a href="{{ route('class-levels.create') }}">Tambah Level Customer</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fas fa-users"></i>
                            <span class="nav-text">Akun</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{ route('users.index') }}">Data Akun</a>
                            </li>
                            <li>
                                <a href="{{ route('users.create') }}">Tambah Akun</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fas fa-money-check"></i>
                            <span class="nav-text">Transaksi</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{ route('transactions.index') }}">Histori Transaksi</a>
                            </li>
                            <li>
                                <a href="{{ route('transactions.create') }}">Tambah Transaksi</a>
                            </li>

                            <li>
                                <a href="{{ route('transactions.create-v2') }}">Transaksi v2</a>
                            </li>
                        </ul>
                    </li>


                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            @yield('content')
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>
                    Copyright © Barokah Ibu Digital Printing
                    &amp; Developed by
                    <a href="https://www.devsign.website" target="_blank">DevSign Creative Solution</a>
                    2023
                </p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    @yield('script')
    <!-- Required vendors -->

    <script src="{{ asset('vendor/global/global.min.js') }}"></script>

    <script src="{{ asset('vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/select2-init.js') }}"></script>


    <script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/apexchart/apexchart.js') }}"></script>
    <script src="{{ asset('vendor/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>
    <script src="{{ asset('js/dashboard/dashboard-1.js') }}"></script>
    <script src="{{ asset('vendor/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('js/demo.js') }}"></script>
    <script src="{{ asset('js/styleSwitcher.js') }}"></script>
    <script src="{{ asset('js/etab-custom.js') }}"></script>
    <script src="{{ asset('vendor/clockpicker/js/bootstrap-clockpicker.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-asColor/jquery-asColor.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-asGradient/jquery-asGradient.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
    <script src="{{ asset('vendor/pickadate/picker.js') }}"></script>
    <script src="{{ asset('vendor/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('vendor/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('js/plugins-init/chartjs-init.js') }}"></script>
    <script src="{{ asset('js/plugins-init/bs-daterange-picker-init.js') }}"></script>
    <script src="{{ asset('vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/plugins-init/bs-daterange-picker-init.js') }}"></script>
    <script src="{{ asset('js/plugins-init/clock-picker-init.js') }}"></script>
    <script src="{{ asset('js/plugins-init/jquery-asColorPicker.init.js') }}"></script>
    <script src="{{ asset('js/plugins-init/material-date-picker-init.js') }}"></script>
    <script src="{{ asset('js/plugins-init/pickadate-init.js') }}"></script>

    <!-- sweetalert2 -->

    <script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/sweetalert.init.js') }}"></script>


    <script>
        $(document).ready(function() {
            // Get the elements for email and password fields
            var emailAndPassword = $('#emailAndPassword');
            var emailInput = $('#email');
            var passwordInput = $('#password');

            // Get the element for the id_role field
            var idRoleInput = $('#id_role');

            // Function to show or hide email and password fields based on selected id_role
            function toggleEmailAndPassword() {
                var selectedRoleId = parseInt(idRoleInput.val());

                // If id_role is 2 (Siswa), hide email and password fields, otherwise, show them
                if (selectedRoleId == 1) {

                    emailAndPassword.show();
                    emailInput.prop('required', true);
                    passwordInput.prop('required', true);

                } else if (selectedRoleId == 2) {
                    emailAndPassword.show();
                    emailInput.prop('required', true);
                    passwordInput.prop('required', true);
                } else {
                    emailAndPassword.hide();
                }
            }

            // Call the function when the page loads
            toggleEmailAndPassword();

            // Call the function whenever the id_role input value changes
            idRoleInput.change(toggleEmailAndPassword);

            // dropdown button print
            // $('.dropdown-toggle').dropdown();

        });
    </script>

    <script>
        function cardsCenter() {
            /*  testimonial one function by = owl.carousel.js */

            jQuery(".card-slider").owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                //center:true,
                slideSpeed: 3000,
                paginationSpeed: 3000,
                dots: true,
                navText: [
                    '<i class="fas fa-arrow-left"></i>',
                    '<i class="fas fa-arrow-right"></i>',
                ],
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 1,
                    },
                    800: {
                        items: 1,
                    },
                    991: {
                        items: 1,
                    },
                    1200: {
                        items: 1,
                    },
                    1600: {
                        items: 1,
                    },
                },
            });
        }

        jQuery(window).on("load", function() {
            setTimeout(function() {
                cardsCenter();
            }, 1000);
        });
    </script>
    <script>
        var data1 = Object.values(data33);
        var dataYAxis = Object.values(labels);
        // console.log(dataYAxis);
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dataYAxis,
                datasets: [{
                    label: '# Jumlah ',
                    data: data1,
                    borderColor: 'rgba(136,108,192, 1)',
                    borderWidth: "0",
                    backgroundColor: ['#D2E0FB', '#B0D9B1', '#EDB7ED', '#F2D8D8', '#CDC2AE', '#FFE9AE']
                }]
            },
            options: {
                legend: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        // Change here
                        barPercentage: 1
                    }]
                }
            }
        });
    </script>
    <script>
        var xAxis2 = Object.values(xAxis);
        var yAxis2 = Object.values(yAxis);
        // console.log(yAxis2);
        const ctx = document.getElementById('myChart2');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: xAxis2,
                datasets: [{
                    label: '# Jumlah ',
                    data: YAxis2,
                    borderColor: 'rgba(136,108,192, 1)',
                    borderWidth: "0",
                    backgroundColor: ['#D2E0FB', '#B0D9B1', '#EDB7ED', '#F2D8D8', '#CDC2AE', '#FFE9AE']
                }]
            },
            options: {
                legend: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        // Change here
                        barPercentage: 1
                    }]
                }
            }
        });
    </script>



</body>

</html>