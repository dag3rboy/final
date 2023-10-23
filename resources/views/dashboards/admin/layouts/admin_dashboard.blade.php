<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="admin/img/icons/icon-48x48.png" />
    <title>@yield('title')</title>
    {{-- bootstrap --}}
    <link href="../dashboards-assets/AdminKit-Blue/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- App CSS -->
    <link href="../dashboards-assets/AdminKit/css/app.css" rel="stylesheet">
    <!-- Our Custom CSS -->
    <link href="../dashboards-assets/AdminKit/css/custom.css" rel="stylesheet">
    <!-- Box Icons  -->
    <link href='../dashboards-assets/AdminKit/vendor/boxicons/css/boxicons.min.css' rel='stylesheet'>
    <!-- Google Font  -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Sweetalert2  -->
    <link href='../vendor/sweetalert2/sweetalert2.min.css' rel='stylesheet'>
    <!-- ijaboCropTool -->
    <link href='../vendor/ijaboCropTool/ijaboCropTool.min.css' rel='stylesheet'>
    {{-- LiveWire CSS --}}
    @livewireStyles
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar ">
            <div class="sidebar-content js-simplebar">

                {{-- <a class="sidebar-brand" href="">
                    <img class="logo" src="admin/img/logo.png" alt="logo">
                    <span class="align-middle">Mouaidy</span>
                </a> --}}

                <a class="sidebar-avatar" href="#">
                    <img class="logo admin_picture" src="../users-images/admins/{{ $LoggedAdminInfo->dr_photo }}"
                        alt="admin image">
                    <span class="align-middle">{{ $LoggedAdminInfo->ad_username }}</span>
                </a>

                <ul class="sidebar-nav">

                    {{-- <li class="sidebar-header">Pages</li> --}}

                    <!-- Acceuil -->
                    <li class="sidebar-item {{ request()->is('admin/dashboard') ? 'active' : '' }} mt-4">
                        <a class="sidebar-link" href="../admin/dashboard">
                            <i class="align-middle" data-feather="sliders"></i>
                            <span class="align-middle">Acceuil</span>
                        </a>
                    </li>

                    {{-- <li class="sidebar-header">Utilisateurs</li> --}}

                    <!-- Médecines -->
                    <li class="sidebar-item {{ request()->is('admin/doctors') ? 'active' : '' }}">
                        <a href="#medecin" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="users"></i>
                            <span class="align-middle">Médecines</span>
                        </a>
                        <ul id="medecin" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="../admin/doctors">Liste Médecines</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="../admin/doctors">Ajouter Médecine</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Assitants -->
                    {{-- <li class="sidebar-item {{ request()->is('admin/assistants') ? 'active' : '' }}">
                        <a class="sidebar-link" href="../admin/assistants">
                            <i class="align-middle" data-feather="user"></i> <span
                                class="align-middle">Assitants</span>
                        </a>
                    </li> --}}

                    <!-- Patients -->
                    <li class="sidebar-item {{ request()->is('admin/patients') ? 'active' : '' }}">
                        <a class="sidebar-link" href="../admin/patients">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Patients</span>
                        </a>
                    </li>

                    {{-- <li class="sidebar-header">Systéme</li> --}}

                    <!-- Spécialités -->
                    <li class="sidebar-item {{ request()->is('admin/specialites') ? 'active' : '' }}">
                        <a class="sidebar-link" href="../admin/specialites">
                            <i class="align-middle" data-feather="user"></i> <span
                                class="align-middle">Spécialités</span>
                        </a>
                    </li>

                    <!-- Contacts -->
                    <li class="sidebar-item {{ request()->is('admin/contacts') ? 'active' : '' }}">
                        <a href="#contacts" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="inbox"></i> <span class="align-middle">Contacts</span>
                        </a>
                        <ul id="contacts" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                            <li class="sidebar-item"><a class="sidebar-link" href="../admin/contacts">Liste
                                    Contacts</a></li>
                            <li class="sidebar-item"><a class="sidebar-link" href="../admin/contacts">Ajouter
                                    Spécialité</a></li>
                        </ul>
                    </li>

                    <!-- Profile -->
                    <li class="sidebar-item {{ request()->is('admin/profile') ? 'active' : '' }}">
                        <a class="sidebar-link" href="../admin/profile">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                        </a>
                    </li>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle d-flex">
                    <i class="hamburger align-self-center"></i>
                </a>

                <form class="d-none d-sm-inline-block">
                    <div class="input-group input-group-navbar">
                        <input type="text" class="form-control" placeholder="Search…" aria-label="Search">
                        <button class="btn" type="button">
                            <i class="align-middle" data-feather="search"></i>
                        </button>
                    </div>
                </form>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">

                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-bs-toggle="dropdown">
                                <img src="../users-images/admins/{{ $LoggedAdminInfo->dr_photo }}"
                                    class="avatar img-fluid rounded-circle me-1 admin_picture" alt="Doctor name" />

                                <span class="text-dark">{{ $LoggedAdminInfo->ad_username }}</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="../admin/profile"><i class="align-middle me-1"
                                        data-feather="user"></i> Profile</a>
                                {{-- <a class="dropdown-item" href="pages-settings.html"><i class="align-middle me-1"
                                        data-feather="settings"></i> Settings </a> --}}

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../admin-logout">Déconnexion</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">
                <div class="container-fluid p-0">

                    @yield('content')

                </div>
            </main>

        </div>
    </div>

    {{-- JQuery --}}
    <script src="../dashboards-assets/AdminKit-Blue/js/jquery.min.js"></script>
    {{-- Bootstrap JS --}}
    <script src="../dashboards-assets/AdminKit-Blue/js/popper.min.js"></script>
    {{-- Sweetalert2 JS --}}
    <script src="../vendor/sweetalert2/sweetalert2.min.js"></script>
    {{-- ijaboCropTool JS --}}
    <script src="../vendor/ijaboCropTool/ijaboCropTool.min.js"></script>
    {{-- App js --}}
    <script src="../dashboards-assets/AdminKit/js/app.js"></script>
    {{-- Livewire JS --}}
    @livewireScripts

    <script>
        // Ajouter / Modifier / Supprimer Specialité
        window.addEventListener('openAddSpecialityModal', function(event) {
            $('.addSpecialite').find('span').html('');
            $('.addSpecialite').find('form')[0].reset();
            $('.addSpecialite').modal('show');
        });

        window.addEventListener('closeAddSpecialityModal', function(event) {
            $('.addSpecialite').find('span').html('');
            $('.addSpecialite').find('form')[0].reset();
            $('.addSpecialite').modal('hide');
            Swal.fire(
                'Ajouté',
                'Specialité ajouté avec succès.',
                'success'
            )
        });
    </script>



</body>

</html>
