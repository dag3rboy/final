<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- fontawsome -->
    <link href="../dashboards-assets/sb-admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Boxicons  -->
    <link href="../dashboards-assets/sb-admin/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" type="text/css">
    <!-- Custom fonts for this template-->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../dashboards-assets/sb-admin/css/sb-admin-2.css" rel="stylesheet">
    <link href="../dashboards-assets/sb-admin/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Sweetalert2  -->
    <link href='../vendor/sweetalert2/sweetalert2.min.css' rel='stylesheet'>
    <!-- ijaboCropTool -->
    <link href='../vendor/ijaboCropTool/ijaboCropTool.min.css' rel='stylesheet'>
    {{-- LiveWire CSS --}}
    @livewireStyles

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex flex-column align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <img class="img-profile admin_picture rounded-circle mb-3"
                        src="../users-images/patients/{{ $LoggedPatientInfo->pa_photo }}">
                </div>
                <span class="sidebar-brand-text mx-3">{{ $LoggedPatientInfo->pa_firstname }}
                    {{ $LoggedPatientInfo->pa_lastname }}</span>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->is('patient/dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="dashboard">
                    <i class='bx bx-grid-alt'></i>
                    <span>Accueil</span></a>
            </li>

            <!-- Divider -->
            {{-- <hr class="sidebar-divider"> --}}

            <!-- Heading -->
            {{-- <div class="sidebar-heading">
                Interface
            </div> --}}


            <!-- Nav Item - Charts -->
            <li class="nav-item {{ request()->is('patient/appointments') ? 'active' : '' }}">
                <a class="nav-link" href="appointments">
                    <i class='bx bx-calendar'></i>
                    <span>Rendez-vous</span></a>
            </li>

            <!-- Nav Item - Tables -->
            {{-- <li class="nav-item">
                <a class="nav-link" href="">
                    <i class='bx bx-user'></i>
                    <span>Profile</span></a>
            </li> --}}

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item {{ request()->is('profile') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class='bx bx-user'></i>
                    <span>Profile</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="profile">Profile</a>
                        <a class="collapse-item" href="password">Changer mot de passe</a>
                        <a class="collapse-item" href="account">Paramètres</a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline ">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

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
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Recherche..."
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
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $LoggedPatientInfo->pa_firstname }}
                                    {{ $LoggedPatientInfo->pa_lastname }}</span>
                                <img class="img-profile admin_picture rounded-circle"
                                    src="../users-images/patients/{{ $LoggedPatientInfo->pa_photo }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Déconnexion
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


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
                    <h5 class="modal-title" id="exampleModalLabel">Déconnexion</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Sélectionnez "Déconnexion" ci-dessous si vous êtes prêt à mettre fin à votre
                    session en cours.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                    <a class="btn btn-primary" href="../patient-logout">Déconnexion</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../dashboards-assets/sb-admin/vendor/jquery/jquery.min.js"></script>
    <script src="../dashboards-assets/sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../dashboards-assets/sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../dashboards-assets/sb-admin/js/sb-admin-2.min.js"></script>
    {{-- Sweetalert2 JS --}}
    <script src="../vendor/sweetalert2/sweetalert2.min.js"></script>
    {{-- ijaboCropTool JS --}}
    <script src="../vendor/ijaboCropTool/ijaboCropTool.min.js"></script>
    {{-- Livewire JS --}}
    @livewireScripts


    {{-- This Script 
        - Open add assistat modal
        - Hide add assistat modal
        - Clear the old value of modal inputs
        - Pass dactor ID to the modal --}}
    <script>
        window.addEventListener('openViewAppointmentModal', function(event) {
            $('.viewAppointmentPA').find('span').html('');
            $('.viewAppointmentPA').modal('show');
        });

        window.addEventListener('openEditAppointmentModal', function(event) {
            $('.editAppointmentPA').find('span').html('');
            $('.editAppointmentPA').modal('show');
        });

        window.addEventListener('closeEditAppointmentModal', function(event) {
            $('.editAppointmentPA').find('span').html('');
            $('.editAppointmentPA').find('form')[0].reset();
            $('.editAppointmentPA').modal('hide');
            Swal.fire(
                'Modifié',
                'Rendez-vous modifié avec succès.',
                'success'
            )
        });

        window.addEventListener('SwalConfirm', function(event) {
            Swal.fire({
                title: 'Supprimer le rendez-vous?',
                text: "voulez-vous supprimer cet rendez-vous!",
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
                'Rendez-vous supprimé avec succès.',
                'success'
            )
        });

        // window.addEventListener('profileInfosUpdated', function(event) {
        //     Swal.fire(
        //         'Succès!',
        //         'Les informations de profil ont été mises à jour avec succès.',
        //         'success'
        //     )
        // });

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
            processUrl: '{{ route('patientPictureUpdate') }}',
            withCSRF: ['_token', '{{ csrf_token() }}'],
            onSuccess: function(message, element, status) {
                // alert(message);
            },
            onError: function(message, element, status) {
                alert(message);
            }
        });
    </script>

</body>

</html>
