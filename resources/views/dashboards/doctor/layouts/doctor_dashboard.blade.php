<!doctype html>

<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <!-- CSS files -->
    <link href="../dashboards-assets/Tabler/dist/css/tabler.min.css" rel="stylesheet" />
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
                                style="background-image: url(../users-images/doctors/{{ $LoggedDoctorInfo->dr_photo }})"></span>
                            <div class="d-none d-xl-block ps-2">
                                <div>Dr. {{ $LoggedDoctorInfo->dr_firstname }} {{ $LoggedDoctorInfo->dr_lastname }}
                                </div>
                                {{-- <div class="mt-1 small text-muted">Admin</div> --}}
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="../doctor/profile" class="dropdown-item">Profile</a>
                            <div class="dropdown-divider"></div>
                            {{-- <a href="../admin/settings" class="dropdown-item">Paramètres</a> --}}
                            <a href="../doctor-logout" class="dropdown-item">Déconnexion</a>
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
                            <li class="nav-item {{ request()->is('doctor/dashboard') ? 'active' : '' }}">
                                <a class="nav-link" href="../doctor/dashboard">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
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
                            {{-- Consultation --}}
                            <li class="nav-item {{ request()->is('doctor/consultation') ? 'active' : '' }}">
                                <a class="nav-link" href="../doctor/consultation">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M3.5 5.5l1.5 1.5l2.5 -2.5" />
                                            <path d="M3.5 11.5l1.5 1.5l2.5 -2.5" />
                                            <path d="M3.5 17.5l1.5 1.5l2.5 -2.5" />
                                            <line x1="11" y1="6" x2="20" y2="6" />
                                            <line x1="11" y1="12" x2="20" y2="12" />
                                            <line x1="11" y1="18" x2="20" y2="18" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Consultation
                                    </span>
                                </a>
                            </li>
                            {{-- Assitants --}}
                            <li class="nav-item {{ request()->is('doctor/assistants') ? 'active' : '' }}">
                                <a class="nav-link" href="../doctor/assistants">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
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
                                        Assitants
                                    </span>
                                </a>
                            </li>

                            {{-- Calendrier --}}
                            <li class="nav-item {{ request()->is('doctor/calender') ? 'active' : '' }}">
                                <a class="nav-link" href="../doctor/calender">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4" />
                                            <circle cx="18" cy="18" r="4" />
                                            <path d="M15 3v4" />
                                            <path d="M7 3v4" />
                                            <path d="M3 11h16" />
                                            <path d="M18 16.496v1.504l1 1" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Calendrier
                                    </span>
                                </a>
                            </li>

                            {{-- CV --}}
                            <li class="nav-item {{ request()->is('doctor/cv') ? 'active' : '' }}">
                                <a class="nav-link" href="../doctor/cv">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                            <path
                                                d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                            <line x1="9" y1="9" x2="10" y2="9" />
                                            <line x1="9" y1="13" x2="15" y2="13" />
                                            <line x1="9" y1="17" x2="15" y2="17" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Mon CV
                                    </span>
                                </a>
                            </li>

                            {{-- Profile --}}
                            <li class="nav-item {{ request()->is('doctor/profile') ? 'active' : '' }}">
                                <a class="nav-link" href="../doctor/profile">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
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
    {{-- <script src="../dashboards-assets/Tabler/dist/libs/nouislider/dist/nouislider.min.js"></script> --}}
    <script src="../dashboards-assets/Tabler/dist/libs/litepicker/dist/litepicker.js"></script>
    {{-- <script src="../dashboards-assets/Tabler/dist/libs/tom-select/dist/js/tom-select.base.min.js"></script> --}}
    {{-- Sweetalert2 JS --}}
    <script src="../vendor/sweetalert2/sweetalert2.min.js"></script>
    {{-- ijaboCropTool JS --}}
    <script src="../vendor/ijaboCropTool/ijaboCropTool.min.js"></script>
    {{-- Livewire JS --}}
    @livewireScripts

    <script>
        window.addEventListener('openAddAssistantModal', function(event) {
            // var doc_id = document.getElementById('doctorId').value;
            $('.addAssistant').find('span').html('');
            $('.addAssistant').find('form')[0].reset();
            $('.addAssistant').modal('show');
            // $('.addAssistant').find('#modal_doc_id').val(doc_id);
        });

        window.addEventListener('closeAddAssistantModal', function(event) {
            $('.addAssistant').find('span').html('');
            $('.addAssistant').find('form')[0].reset();
            $('.addAssistant').modal('hide');
            Swal.fire(
                'Ajouté',
                'Assistant ajouté avec succès.',
                'success'
            )
        });

        window.addEventListener('openEditAssistantModal', function(event) {
            $('.editAssistant').find('span').html('');
            $('.editAssistant').modal('show');
        });

        window.addEventListener('closeEditAssistantModal', function(event) {
            $('.editAssistant').find('span').html('');
            $('.editAssistant').find('form')[0].reset();
            $('.editAssistant').modal('hide');
            Swal.fire(
                'Modifié',
                'Assistant modifié avec succès.',
                'success'
            )
        });

        window.addEventListener('SwalConfirm', function(event) {
            Swal.fire({
                title: 'Supprimer l\'assistant?',
                text: "voulez-vous supprimer cet assistant!",
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
                'Assistant supprimé avec succès.',
                'success'
            )
        });

        window.addEventListener('profileInfosUpdated', function(event) {
            Swal.fire(
                'Succès!',
                'Les informations de profil ont été mises à jour avec succès.',
                'success'
            )
        });


        //====================================================
        // Update Doctor profile picture
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
            processUrl: '{{ route('doctorPictureUpdate') }}',
            withCSRF: ['_token', '{{ csrf_token() }}'],
            onSuccess: function(message, element, status) {
                // alert(message);
            },
            onError: function(message, element, status) {
                alert(message);
            }
        });
    </script>

    {{-- Index Datepicker --}}
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function() {
            window.Litepicker && (new Litepicker({
                element: document.getElementById('datepicker-inline'),
                buttonText: {
                    previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="15 6 9 12 15 18" /></svg>`,
                    nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 6 15 12 9 18" /></svg>`,
                },
                inlineMode: true,
            }));
        });
        // @formatter:on
    </script>



</body>

</html>
