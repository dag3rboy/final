<!doctype html>

<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <!-- CSS files -->
    <link href="../dashboards-assets/Tabler/dist/css/tabler.min.css" rel="stylesheet" />
    <link href="../dashboards-assets/Tabler/dist/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="../dashboards-assets/Tabler/dist/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="../dashboards-assets/Tabler/dist/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="../dashboards-assets/Tabler/dist/css/demo.min.css" rel="stylesheet" />
    <!-- Box Icons  -->
    <link href='../vendor/boxicons/css/boxicons.min.css' rel='stylesheet'>
    <!-- Sweetalert2  -->
    <link href='../vendor/sweetalert2/sweetalert2.min.css' rel='stylesheet'>
    <!-- ijaboCropTool -->
    <link href='../vendor/ijaboCropTool/ijaboCropTool.min.css' rel='stylesheet'>
    {{-- LiveWire CSS --}}
    @livewireStyles
</head>

<body>
    <div class="wrapper">
        <header class="navbar navbar-expand-md navbar-light d-print-none">
            <div class="container-xl">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="#">
                        <img src="../dashboards-assets/Tabler/static/logo.png" width="110" height="32"
                            alt="Tabler" class="navbar-brand-image">
                        <span><span class="text-primary">M</span>ouaidy</span>
                    </a>
                </h1>

                <div class="navbar-nav flex-row order-md-last">
                    <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode"
                        data-bs-toggle="tooltip" data-bs-placement="bottom">
                        <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                        </svg>
                    </a>
                    <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode"
                        data-bs-toggle="tooltip" data-bs-placement="bottom">
                        <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <circle cx="12" cy="12" r="4" />
                            <path
                                d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                        </svg>
                    </a>

                    <div class="nav-item dropdown d-none d-md-flex me-3">
                        <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                            aria-label="Show notifications">
                            <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                                <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                            </svg>
                            <span class="badge bg-red"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-card">
                            <div class="card">
                                <div class="card-body">
                                    Notification..
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                            aria-label="Open user menu">
                            <span class="avatar avatar-sm rounded-circle"
                                style="background-image: url(../users-images/admins/{{ $LoggedAdminInfo->ad_photo }})"></span>
                            <div class="d-none d-xl-block ps-2">
                                <div>{{ $LoggedAdminInfo->ad_username }}</div>
                                <div class="mt-1 small text-muted">Admin</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="../admin/profile" class="dropdown-item">Profilet</a>
                            <div class="dropdown-divider"></div>
                            <a href="../admin/settings" class="dropdown-item">Paramètres</a>
                            <a href="../admin-logout" class="dropdown-item">Déconnexion</a>
                        </div>
                    </div>
                </div>



            </div>
        </header>

        <div class="navbar-expand-md">
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="navbar navbar-light">
                    <div class="container-xl">
                        <ul class="navbar-nav">
                            {{-- Acceuil --}}
                            <li class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                                <a class="nav-link" href="../admin/dashboard">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                        <!-- Download SVG icon from http://tabler-icons.io/i/layout-grid -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <rect x="4" y="4" width="6" height="6"
                                                rx="1" />
                                            <rect x="14" y="4" width="6" height="6"
                                                rx="1" />
                                            <rect x="4" y="14" width="6" height="6"
                                                rx="1" />
                                            <rect x="14" y="14" width="6" height="6"
                                                rx="1" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Acceuil
                                    </span>
                                </a>
                            </li>
                            {{-- Médecines --}}
                            <li class="nav-item dropdown {{ request()->is('admin/doctors') ? 'active' : '' }}">
                                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside" role="button" aria-expanded="false">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/layout-grid -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <circle cx="9" cy="7" r="4" />
                                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Médecines
                                    </span>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="dropdown-menu-columns">
                                        <div class="dropdown-menu-column">
                                            <a class="dropdown-item {{ request()->is('admin/doctors') ? 'active' : '' }}"
                                                href="../admin/doctors">
                                                Liste medecins
                                            </a>
                                            <a class="dropdown-item {{ request()->is('admin/doctors-request') ? 'active' : '' }}"
                                                href="../admin/doctors-request">
                                                Demandes d'inscription
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            {{-- Patients --}}
                            <li class="nav-item {{ request()->is('admin/patients') ? 'active' : '' }}">
                                <a class="nav-link" href="../admin/patients">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/users -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <circle cx="9" cy="7" r="4" />
                                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Patients
                                    </span>
                                </a>
                            </li>

                            {{-- Spécialités --}}
                            <li class="nav-item {{ request()->is('admin/specialite') ? 'active' : '' }}">
                                <a class="nav-link" href="../admin/specialite">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/medical-cross -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M13 3a1 1 0 0 1 1 1v4.535l3.928 -2.267a1 1 0 0 1 1.366 .366l1 1.732a1 1 0 0 1 -.366 1.366l-3.927 2.268l3.927 2.269a1 1 0 0 1 .366 1.366l-1 1.732a1 1 0 0 1 -1.366 .366l-3.928 -2.269v4.536a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-4.536l-3.928 2.268a1 1 0 0 1 -1.366 -.366l-1 -1.732a1 1 0 0 1 .366 -1.366l3.927 -2.268l-3.927 -2.268a1 1 0 0 1 -.366 -1.366l1 -1.732a1 1 0 0 1 1.366 -.366l3.928 2.267v-4.535a1 1 0 0 1 1 -1h2z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Spécialités
                                    </span>
                                </a>
                            </li>

                            {{-- Contact --}}
                            <li class="nav-item dropdown {{ request()->is('admin/contacts') ? 'active' : '' }}">
                                <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside" role="button" aria-expanded="false">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <rect x="3" y="5" width="18" height="14"
                                                rx="2" />
                                            <polyline points="3 7 12 13 21 7" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Contacts
                                    </span>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="dropdown-menu-columns">

                                        <div class="dropdown-menu-column">
                                            <a class="dropdown-item" href="../admin/contacts">
                                                Liste Contacts
                                            </a>
                                            <a class="dropdown-item" href="../admin/contact-doctors">
                                                Contacter Médecins
                                            </a>
                                            <a class="dropdown-item" href="../admin/contact-patients">
                                                Contacter Patients
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </li>
                            {{-- Profile --}}
                            <li class="nav-item {{ request()->is('admin/profile') ? 'active' : '' }}">
                                <a class="nav-link" href="../admin/profile">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <circle cx="12" cy="7" r="4" />
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Profile
                                    </span>
                                </a>
                            </li>
                        </ul>

                        <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
                            <form action="." method="get">
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <circle cx="10" cy="10" r="7" />
                                            <line x1="21" y1="21" x2="15" y2="15" />
                                        </svg>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Recherche…"
                                        aria-label="Search in website">
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="page-wrapper">
            {{-- <div class="container-xl">
                <div class="page-header d-print-none">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                @yield('page-title')
                            </h2>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="page-body">
                <div class="container-xl">
                    @yield('content')
                </div>
            </div>

        </div>
    </div>


    {{-- JQuery --}}
    <script src="../dashboards-assets/Tabler/dist/js/jquery.min.js"></script>
    {{-- Bootstrap JS --}}
    <script src="../dashboards-assets/Tabler/dist/js/popper.min.js"></script>
    <!-- Tabler Core -->
    <script src="../dashboards-assets/Tabler/dist/js/tabler.min.js"></script>
    <script src="../dashboards-assets/Tabler/dist/js/demo.min.js"></script>
    <!-- Libs JS -->
    <script src="../dashboards-assets/Tabler/dist/libs/apexcharts/dist/apexcharts.min.js"></script>
    {{-- Sweetalert2 JS --}}
    <script src="../vendor/sweetalert2/sweetalert2.min.js"></script>
    {{-- ijaboCropTool JS --}}
    <script src="../vendor/ijaboCropTool/ijaboCropTool.min.js"></script>
    {{-- Livewire JS --}}
    @livewireScripts

    <script>
        //====================================================
        // Afficher / Ajouter / Modifier / Supprimer Médecin
        //====================================================
        window.addEventListener('openAddDoctorModal', function(event) {
            $('.addDoctor').find('span').html('');
            $('.addDoctor').find('form')[0].reset();
            $('.addDoctor').modal('show');
        });

        window.addEventListener('closeAddDoctorModal', function(event) {
            $('.addDoctor').find('span').html('');
            $('.addDoctor').find('form')[0].reset();
            $('.addDoctor').modal('hide');
            Swal.fire(
                'Ajouté',
                'Médecin ajouté avec succès.',
                'success'
            )
        });

        window.addEventListener('openViewDoctorModal', function(event) {
            $('.viewDoctor').modal('show');
        });

        window.addEventListener('openEditDoctorModal', function(event) {
            $('.editDoctor').modal('show');
        });

        window.addEventListener('closeEditDoctorModal', function(event) {
            $('.editDoctor').find('span').html('');
            $('.editDoctor').find('form')[0].reset();
            $('.editDoctor').modal('hide');
            Swal.fire(
                'Modifié',
                'Médecin modifié avec succès.',
                'success'
            )
        });

        window.addEventListener('SwalConfirmDR', function(event) {
            Swal.fire({
                title: 'Supprimer le médecin?',
                text: "voulez-vous supprimer cet médecin!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Supprimer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.livewire.emit('deleteDR', event.detail.id);
                }
            });
        });

        window.addEventListener('deletedDR', function(event) {
            Swal.fire(
                'Supprimé!',
                'Médecin supprimé avec succès.',
                'success'
            )
        });

        window.addEventListener('DemandeAccepted', function(event) {
            Swal.fire(
                'Demande accepté!',
                'Demande accepté avec succès.',
                'success'
            )
        });

        window.addEventListener('DemandeRefused', function(event) {
            Swal.fire(
                'Demande refusé!',
                'Demande refusé avec succès.',
                'success'
            )
        });

        window.addEventListener('EmailError', function(event) {
            Swal.fire(
                'Erreur!',
                'L\'email de confirmation n\'a pas été envoyé!',
                'error'
            )
        });


        window.addEventListener('SwalConfirmDM', function(event) {
            Swal.fire({
                title: 'Supprimer le demande?',
                text: "voulez-vous supprimer cet demande!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Supprimer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.livewire.emit('deleteDM', event.detail.id);
                }
            });
        });

        window.addEventListener('deletedDM', function(event) {
            Swal.fire(
                'Supprimé!',
                'Demande supprimé avec succès.',
                'success'
            )
        });
        //====================================================
        // Afficher / Ajouter / Modifier / Supprimer Patient
        //====================================================
        window.addEventListener('openAddPatientModal', function(event) {
            $('.addPatient').find('span').html('');
            $('.addPatient').find('form')[0].reset();
            $('.addPatient').modal('show');
        });

        window.addEventListener('closeAddPatientModal', function(event) {
            $('.addPatient').find('span').html('');
            $('.addPatient').find('form')[0].reset();
            $('.addPatient').modal('hide');
            Swal.fire(
                'Ajouté',
                'Patient ajouté avec succès.',
                'success'
            )
        });

        window.addEventListener('openViewPatientModal', function(event) {
            $('.viewPatient').modal('show');
        });

        window.addEventListener('openEditPatientModal', function(event) {
            $('.editPatient').modal('show');
        });

        window.addEventListener('closeEditPatientModal', function(event) {
            $('.editPatient').find('span').html('');
            $('.editPatient').find('form')[0].reset();
            $('.editPatient').modal('hide');
            Swal.fire(
                'Modifié',
                'Patient modifié avec succès.',
                'success'
            )
        });

        window.addEventListener('SwalConfirmPA', function(event) {
            Swal.fire({
                title: 'Supprimer le Patient?',
                text: "voulez-vous supprimer cet patient!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Supprimer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.livewire.emit('deletePA', event.detail.id);
                }
            });
        });

        window.addEventListener('deletedPA', function(event) {
            Swal.fire(
                'Supprimé!',
                'Patient supprimé avec succès.',
                'success'
            )
        });
        //====================================================
        // Ajouter / Modifier / Supprimer Specialité
        //====================================================
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

        window.addEventListener('openEditSpecialityModal', function(event) {
            $('.editSpecialite').modal('show');
        });

        window.addEventListener('closeEditSpecialityModal', function(event) {
            $('.editSpecialite').find('span').html('');
            $('.editSpecialite').find('form')[0].reset();
            $('.editSpecialite').modal('hide');
            Swal.fire(
                'Modifié',
                'Specialité modifié avec succès.',
                'success'
            )
        });

        window.addEventListener('SwalConfirmSP', function(event) {
            Swal.fire({
                title: 'Supprimer la specialité?',
                text: "voulez-vous supprimer cet specialité!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Supprimer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.livewire.emit('deleteSP', event.detail.id);
                }
            });
        });

        window.addEventListener('deletedSP', function(event) {
            Swal.fire(
                'Supprimé!',
                'Specialité supprimé avec succès.',
                'success'
            )
        });

        //====================================================
        // Afficher / Reponde  / Supprimer Contact
        //====================================================
        window.addEventListener('openViewContactModal', function(event) {
            $('.viewContact').modal('show');
        });

        window.addEventListener('openContactResponseModal', function(event) {
            $('.responseContact').modal('show');
        });

        window.addEventListener('closeContactResponseModal', function(event) {
            $('.responseContact').find('span').html('');
            $('.responseContact').find('form')[0].reset();
            $('.responseContact').modal('hide');
            Swal.fire(
                'Envoyé',
                'Email envoyé avec succès.',
                'success'
            )
        });
        window.addEventListener('closeContactResponseModalFail', function(event) {
            $('.responseContact').find('span').html('');
            $('.responseContact').find('form')[0].reset();
            $('.responseContact').modal('hide');
            Swal.fire(
                'Erreur',
                'Erreur, Veuillez réessayer.',
                'warning'
            )
        });

        window.addEventListener('SwalConfirm', function(event) {
            Swal.fire({
                title: 'Supprimer le Message?',
                text: "voulez-vous supprimer cet message!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Supprimer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.livewire.emit('delete', event.detail.id);
                }
            });
        });

        window.addEventListener('deleted', function(event) {
            Swal.fire(
                'Supprimé!',
                'Message supprimé avec succès.',
                'success'
            )
        });

        //====================================================
        //  Contact Doctor/Patient by Email/SMS
        //====================================================
        window.addEventListener('openSendEmailModal', function(event) {
            $('.sendEmail').modal('show');
        });

        window.addEventListener('openSendSMSModal', function(event) {
            $('.sendSMS').modal('show');
        });

        window.addEventListener('closeSendEamileModal', function(event) {
            $('.sendEmail').find('span').html('');
            $('.sendEmail').find('form')[0].reset();
            $('.sendEmail').modal('hide');
            Swal.fire(
                'Envoyé',
                'Email envoyé avec succès.',
                'success'
            )
        });

        window.addEventListener('closeSendSMSModal', function(event) {
            $('.sendSMS').find('span').html('');
            $('.sendSMS').find('form')[0].reset();
            $('.sendSMS').modal('hide');
            Swal.fire(
                'Envoyé',
                'SMS envoyé avec succès.',
                'success'
            )
        });

        //====================================================
        // Update Admin profile picture
        //====================================================
        $(document).on('click', '#change-picture-btn', function() {
            $('#admin-image').click();
        })

        // update admin image crop 
        $('#admin-image').ijaboCropTool({
            preview: '.admin_picture',
            setRatio: 1,
            allowedExtensions: ['jpg', 'jpeg', 'png'],
            buttonsText: ['COUPER IMAGE', 'QUITER'],
            buttonsColor: ['#30bf7d', '#ee5155', -15],
            processUrl: '{{ route('adminPictureUpdate') }}',
            withCSRF: ['_token', '{{ csrf_token() }}'],
            onSuccess: function(message, element, status) {
                // alert(message);
            },
            onError: function(message, element, status) {
                alert(message);
            }
        });
    </script>


    {{-- ====================================================
                    Dashboard Charts
==================================================== --}}
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function() {
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-social-referrals'), {
                chart: {
                    type: "line",
                    fontFamily: 'inherit',
                    height: 192,
                    parentHeightOffset: 0,
                    toolbar: {
                        show: false,
                    },
                    animations: {
                        enabled: false
                    },
                },
                fill: {
                    opacity: 1,
                },
                stroke: {
                    width: 2,
                    lineCap: "round",
                    curve: "smooth",
                },
                series: [{
                    name: "Facebook",
                    data: [13281, 8521, 15038, 9983, 15417, 8888, 7052, 14270, 5214, 9587, 5950,
                        16852, 17836, 12217, 17406, 12262, 9147, 14961, 18292, 15230, 13435,
                        10649, 5140, 13680, 4508, 13271, 13413, 5543, 18727, 18238, 18175,
                        6246, 5864, 17847, 9170, 6445, 12945, 8142, 8980, 10422, 15535,
                        11569, 10114, 17621, 16138, 13046, 6652, 9906, 14100, 16495, 6749
                    ]
                }, {
                    name: "Twitter",
                    data: [3680, 1862, 3070, 2252, 5348, 3091, 3000, 3984, 5176, 5325, 2420,
                        5474, 3098, 1893, 3748, 2879, 4197, 5186, 4213, 4334, 2807, 1594,
                        4863, 2030, 3752, 4856, 5341, 3954, 3461, 3097, 3404, 4949, 2283,
                        3227, 3630, 2360, 3477, 4675, 1901, 2252, 3347, 2954, 5029, 2079,
                        2830, 3292, 4578, 3401, 4104, 3749, 4457, 3734
                    ]
                }, {
                    name: "Dribbble",
                    data: [722, 1866, 961, 1108, 1110, 561, 1753, 1815, 1985, 776, 859, 547,
                        1488, 766, 702, 621, 1599, 1372, 1620, 963, 759, 764, 739, 789,
                        1696, 1454, 1842, 734, 551, 1689, 1924, 1875, 908, 1675, 1541, 1953,
                        534, 502, 1524, 1867, 719, 1472, 1608, 1025, 889, 1150, 654, 1695,
                        1662, 1285, 1787
                    ]
                }],
                grid: {
                    padding: {
                        top: -20,
                        right: 0,
                        left: -4,
                        bottom: -4
                    },
                    strokeDashArray: 4,
                    xaxis: {
                        lines: {
                            show: true
                        }
                    },
                },
                xaxis: {
                    labels: {
                        padding: 0,
                    },
                    tooltip: {
                        enabled: false
                    },
                    type: 'datetime',
                },
                yaxis: {
                    labels: {
                        padding: 4
                    },
                },
                labels: [
                    '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24',
                    '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29',
                    '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04',
                    '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09',
                    '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14',
                    '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19',
                    '2020-07-20', '2020-07-21', '2020-07-22', '2020-07-23', '2020-07-24',
                    '2020-07-25', '2020-07-26', '2020-07-27', '2020-07-28', '2020-07-29',
                    '2020-07-30', '2020-07-31', '2020-08-01', '2020-08-02', '2020-08-03',
                    '2020-08-04', '2020-08-05', '2020-08-06', '2020-08-07', '2020-08-08',
                    '2020-08-09'
                ],
                colors: ["#3b5998", "#1da1f2", "#ea4c89"],
                legend: {
                    show: true,
                    position: 'bottom',
                    offsetY: 12,
                    markers: {
                        width: 10,
                        height: 10,
                        radius: 100,
                    },
                    itemMargin: {
                        horizontal: 8,
                        vertical: 8
                    },
                },
            })).render();
        });
        // @formatter:on
    </script>




</body>

</html>
