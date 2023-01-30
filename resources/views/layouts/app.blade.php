<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>POS Website</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset ('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Datatable css this template-->
    <link href="{{asset ('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <!-- Bootstrap CSS CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{asset ('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset ('css/style.css')}}" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Pos <sup>web</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menubar
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item @if($main_menu == 'Dashboard') active @endif">
                <a class="nav-link  @if($sub_menu == 'Dashboard') active @endif" href="{{url ('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item @if($main_menu == 'Users') active @endif">
                <a class="nav-link collapsed" href="javascript:void(0)" data-toggle="collapse" data-target="#collapse1"
                    aria-expanded="true" aria-controls="collapse1">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Users</span>
                </a>
                <div id="collapse1" class="collapse @if($main_menu == 'Users') show @endif" aria-labelledby="heading1" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item @if($sub_menu == 'Users') active @endif" href="{{url ('users') }}"><i class="fas fa-user"></i>Users</a>
                        <a class="collapse-item @if($sub_menu == 'Groups') active @endif" href="{{url ('groups') }}"><i class="fas fa-users"></i>Groups</a>
                    </div>
                </div>
            </li>
            <li class="nav-item @if($main_menu == 'Product') active @endif">
                <a class="nav-link collapsed" href="javascript:void(0)" data-toggle="collapse" data-target="#collapse2"
                    aria-expanded="true" aria-controls="collapse2">
                    <i class="fas fa-shopping-bag"></i>
                    <span>Products</span>
                </a>
                <div id="collapse2" class="collapse @if($main_menu == 'Product') show @endif" aria-labelledby="heading2" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item @if($sub_menu == 'Categories') active @endif" href="{{url ('categories') }}"><i class="fas fa-list-alt"></i>Categories</a>
                        <a class="collapse-item @if($sub_menu == 'Products') active @endif" href="{{url ('products') }}"><i class="fas fa-shopping-basket"></i> Products</a>
                        <a class="collapse-item @if($sub_menu == 'Stocks') active @endif " href="{{route('stocks') }}"><i class="fas fa-chart-line"></i> Stocks</a>
                    </div>
                </div>
            </li>
            <li class="nav-item @if($main_menu == 'Reports') active @endif">
                <a class="nav-link collapsed" href="javascript:void(0)" data-toggle="collapse" data-target="#collapse3"
                    aria-expanded="true" aria-controls="collapse3">
                    <i class="fas fa-flag"></i>
                    <span>Reports</span>
                </a>
                <div id="collapse3" class="collapse @if($main_menu == 'Reports')show @endif" aria-labelledby="heading3" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item @if($sub_menu == 'DailyReports')active @endif" href="{{route('reports.dailyReports') }}"><i class="fas fa-list"></i>Daily</a>
                        <a class="collapse-item @if($sub_menu == 'Sales')active @endif" href="{{route('reports.sales') }}"><i class="fas fa-shopping-cart"></i>Sales</a>
                        <a class="collapse-item @if($sub_menu == 'Purchases')active @endif" href="{{route('reports.purchases') }}"><i class="fas fa-shopping-bag"></i>Purchases</a>
                        <a class="collapse-item @if($sub_menu == 'Payments')active @endif" href="{{route('reports.payments') }}"><i class="fas fa-money-check-alt"></i>Payments</a>
                        <a class="collapse-item @if($sub_menu == 'Receipts')active @endif" href="{{route('reports.receipts') }}"><i class="fas fa-receipt"></i>Receipts</a>
                </div>
            </li>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="d-flex flex-column">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->phone}}</span>
                                </div>
                                <img class="img-profile rounded-circle"
                                    src="{{asset('assets/img/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <!-- Session Message -->
                @if (Session('message'))
                    <div class="alert alert-info">{{ Session('message') }}</div>
                @endif
                <!-- Start Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- End Page Content -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>&copy; All Right Reserved 2020 | <a href="javascript:void(0)">Mahmudul Hasan</a></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{route('logout')}}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Datatables plugins -->
    <script src="{{asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Bootstrap JS CDN Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom scripts for all pages-->
   <script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>
   <script src="{{asset('js/custom.js')}}"></script>
</body>

</html>
