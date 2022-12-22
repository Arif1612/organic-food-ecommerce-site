<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- for all title --}}
    <title>{{ $title ?? 'dashboard' }}</title>

    <link href={{ asset('assets/backend/resources/favicon.png') }} rel="icon">
    <!-- Bootstrap CSS (CDN)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet"
        crossorigin="anonymous">
    <!-- Simple DataTable (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@3.2.2/dist/style.css" rel="stylesheet"
        integrity="sha256-ZerMjX+PoTwR33srlBlYteG2MwTBUFimpp4wcT1w/lg=" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link href={{ asset('assets/backend/css/style.css') }} rel="stylesheet">

</head>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center shadow-none">
        <!-- Start Logo -->
        <div class="d-flex align-items-center justify-content-between">
            <a href={{ route('dashboard') }} class="logo d-flex align-items-center">
                <img src={{ asset('assets/backend/resources/logo.png') }} alt="">
                <span class="d-none d-lg-block text-green">Organic Food</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->

        <!-- Start Search Bar -->
        <div class="search-bar ms-auto">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div>
        <!-- End Search Bar -->

        <!-- Start Icons Navigation -->
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <!-- Start Search Icon-->
                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle" href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
                <!-- End Search Icon-->

                <!-- Start Profile Nav -->
                <li class="nav-item dropdown pe-3">
                    <!-- Start Profile Iamge Icon -->
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src={{ asset('assets/backend/resources/person.svg') }} alt="Profile"
                            class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">backend Name</span>
                    </a>
                    <!-- End Profile Iamge Icon -->

                    <!-- Start Profile Dropdown Items -->
                    <ul class="dropdown-menu dropdown-menu-end profile">
                        <li class="dropdown-header">
                            <h6>backend Full Name</h6>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="profileDetails.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                {{-- layouts ar navigation.blade.php theke logout ongsho ta ana hoise --}}
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </a>
                        </li>

                    </ul>
                    <!-- End Profile Dropdown Items -->
                </li>
                <!-- End Profile Nav -->

            </ul>
        </nav>
        <!-- End Icons Navigation -->
    </header>

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
            <!-- Start Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link " href={{ route('dashboard') }}>
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#categories-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Categories</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="categories-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href={{ route('categories.index') }}>
                            <i class="bi bi-circle-fill"></i><span>Category List</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#categories-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Students</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="categories-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    {{-- <li>
                        <a href={{ route('students.index') }}>
                            <i class="bi bi-circle-fill"></i><span>Students Details</span>
                        </a>
                    </li> --}}
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#products-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Products</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="products-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href={{ route('products.index') }}>
                            <i class="bi bi-circle-fill"></i><span>Product List</span>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- colors --}}
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#products-nav" data-bs-toggle="collapse"
                    href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Colors</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="products-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        {{-- <a href={{ route('colors.index') }}> --}}
                        <i class="bi bi-circle-fill"></i><span>Colors List</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person"></i>
                    <span>Users</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="users-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('users.index') }}">
                            <i class="bi bi-circle-fill"></i><span>User List</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="login.html">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Login</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="register.html">
                    <i class="bi bi-card-list"></i>
                    <span>Register</span>
                </a>
            </li>
        </ul>
    </aside><!-- End Sidebar-->



    <main id="main" class="main">
        {{ $slot }}
    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; 2022 All Rights Reserved <strong><span>Md. Arif Ul islam </span></strong> <strong><span
                    class="text-info">Helping Hand:
                </span> <span>Abrar the Boss</span></strong>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center shadow-lg rounded-circle"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Bootstrap bundle (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Simple DataTables (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@3.2.2/dist/umd/simple-datatables.js"
        integrity="sha256-Usm730G3l59Ux42era3GIRJOYXFLU7K9k7JFInXTeG0=" crossorigin="anonymous"></script>

    <!-- ChartJS (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"
        integrity="sha256-cHVO4dqZfamRhWD7s4iXyaXWVK10odD+qp4xidFzqTI=" crossorigin="anonymous"></script>

    <!-- Bootstrap bundle (Local) -->
    <!-- <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

    <!-- Simple DataTables (Local) -->
    <!-- <script src="assets/vendor/simple-datatables/simple-datatables.js"></script> -->

    <!-- ChartJs (Local) -->
    <!-- <script src="assets/vendor/chart.js/chart.min.js"></script> -->

    <!-- Custom JS -->
    <script src={{ asset('assets/backend/js/main.js') }}></script>
</body>

</html>
