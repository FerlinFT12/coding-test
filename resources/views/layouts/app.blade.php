<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}{{ isset($title) ? ' | ' . $title : '' }}</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bs-stepper/css/bs-stepper.min.css') }}">

    <!-- Daterange Picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">

    @stack('css')

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <style>
        table.dataTable.dtr-inline.collapsed.table-sm>tbody>tr>td:first-child:before,
        table.dataTable.dtr-inline.collapsed.table-sm>tbody>tr>th:first-child:before {
            top: 2px;
            margin-top: .3rem;
        }

        .table {
            background-color: #fff;
        }

        .table tbody tr.active {
            background-color: rgba(0, 0, 0, .05);
        }

        div.dt-buttons {
            float: right;
        }

        .text-sm .btn-xs {
            font-size: .75rem !important;
        }

        .text-sm .select2-container--bootstrap4 .select2-selection--single .select2-selection__rendered {
            font-size: 1rem !important;
        }

        .select2-container--bootstrap4 .select2-selection--single {
            height: calc(2.25rem + 2px) !important;
        }
    </style>
    @stack('style')
</head>

<body class="hold-transition layout-fixed text-sm {{ isset($collapse) ? 'sidebar-collapse' : '' }}">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light text-sm">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('assets/dist/img/avatar5.png') }}"
                            class="user-image img-circle elevation-2" alt="User Image">
                        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-info">
                            <img src="{{ asset('assets/dist/img/avatar5.png') }}" class="img-circle elevation-2"
                                alt="User Image">
                            <p>
                                {{ Auth::user()->name }}
                                <small>
                                    {{-- @php
                                        $roles = Auth::user()->roles;
                                    @endphp
                                    @foreach ($roles as $key => $role)
                                        {{ $role->display_name }}
                                        @if ($key < count($roles) - 1)
                                            ,
                                        @endif
                                    @endforeach --}}
                                </small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                            <a href="{{ route('actionlogout') }}"
                                class="btn btn-default btn-flat float-right">{{ __('Logout') }}</a>
                            {{-- <form method="POST" id="logout" action="{{ route('logout') }}">
                                @csrf
                            </form> --}}

                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-inventory elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('dashboard') }}" class="brand-link">
                <img src="{{ asset('assets/dist/img/hashmicro.png') }}" alt="Logo" class="brand-image">
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    @php
                        $segments = Request::segments();
                        $url = '/' . implode('/', $segments);
                    @endphp
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview"
                        role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}"
                                class="nav-link @if ($segments[0] == 'home') active @endif">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('employee.index') }}"
                                class="nav-link @if ($segments[0] == 'employee') active @endif">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Employees</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('karakter.list') }}"
                                class="nav-link @if ($segments[0] == 'karakter') active @endif">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Cek Karakter</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('report.index') }}"
                                class="nav-link @if ($segments[0] == 'report') active @endif">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Report</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="padding-bottom: 1rem">
            @yield('content-header')

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>

            <!-- modal-dialog -->
            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true"
                id="modal">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modal-title">Tambah Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="modal-body"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="modal-btn-save">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal-dialog -->

            <!-- modal-dialog -->
            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true"
                id="modal-create">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modal-title-create">Tambah Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="modal-body-create"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="modal-btn-create">Save
                                changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal-dialog -->

            <!-- modal-dialog -->
            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true"
                id="modal-create-upload">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modal-title-create-upload">Tambah Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="modal-body-create-upload"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="modal-btn-create-upload">Save
                                changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal-dialog -->

            @yield('modal')

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer no-print">
            <strong>Copyright &copy; {{ date('Y') }} <a href="#" target="_blank"></a>.</strong>
            All rights reserved.
            <!-- <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 0.0.1
            </div> -->
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script>
        const loginUrl = "{{ route('login') }}";
    </script>
    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>
    {{-- <!-- Select2 -->
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script> --}}
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <!-- BS-Stepper -->
    <script src="{{ asset('assets/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- Daterange Picker -->
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @stack('js')


    <script>
        // Fungsi formatRupiah
        $('[data-mask]').inputmask()

        const uniqueId = (length = 16) => {
            return parseInt(Math.ceil(Math.random() * Date.now()).toPrecision(length).toString().replace(".", ""));
        }

        $(function() {
            $(document).on("keydown", ":input:not(textarea):not(:submit)", function(event) {
                if (event.key == "Enter") {
                    event.preventDefault();
                }
            });
        });

        $(function() {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('.daterange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }

            $('.daterange').daterangepicker({
                startDate: start,
                endDate: end,
                locale: {
                    format: 'DD-MM-YYYY',
                    separator: ' sd ',
                },

                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                }
            }, cb);

            cb(start, end);

        });
    </script>
    @if (session('alert.success'))
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: '{{ session('alert.success') }}',
                    timer: 2000,
                    confirmButtonColor: '#3085d6',
                });
            });
        </script>
    @endif
    @if (session('alert.failed'))
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: '{{ session('alert.failed') }}',
                    confirmButtonColor: '#3085d6',
                });
            });
        </script>
    @endif
    @stack('scripts')
</body>

</html>
