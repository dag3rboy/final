@extends('dashboards.patient.layouts.patient_dashboard')
@section('title', 'Espace Patient')
@section('content')
    <!-- Start Statistcs Row -->
    <div class="row">

        <!-- RDV Total -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-0">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                                RDV Total</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $appointemnts_total }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- RDV Valid -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-0">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-sm font-weight-bold text-success text-uppercase mb-1">
                                RDV Validé</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $appointemnts_valid }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- RDV EN Attent -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-0">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-sm font-weight-bold text-info text-uppercase mb-1">
                                RDV En Attent</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $appointemnts_waiting }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- RDV Rfused -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-0">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-sm font-weight-bold text-warning text-uppercase mb-1">
                                RDV Refusé</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $appointemnts_refused }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->

    <!-- Content Row -->
    <div class="row">

        <!-- My Doctors -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Mes médecins</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body pt-3 pb-0">

                    @forelse ($doctors as $doctor)

                        <div class="card border-left-primary py-0 mb-2">
                            <div class="card-body p-2">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-12 d-flex justify-content-between align-items-center px-3">
                                        @if ($doctor->dr_photo != 'default.png')
                                            <img class="doctor-avatar" height="35" width="35"
                                                src="../users-images/doctors/{{ $doctor->dr_photo }}" alt="">
                                        @else
                                            @if ($doctor->dr_gender == 'Male')
                                                <img class="doctor-avatar" height="35" width="35"
                                                    src="../users-images/doctors/doctor-male.png" alt="">
                                            @else
                                                <img class="doctor-avatar" height="35" width="35"
                                                    src="../users-images/doctors/doctor-female.png" alt="">
                                            @endif
                                        @endif
                                        <p class="align-self-center">Dr. {{ $doctor->dr_firstname }} {{ $doctor->dr_lastname }}</p>
                                        <p>{{ $doctor->dr_speciality }}</p>
                                        <p>{{ $doctor->dr_wilaya }}</p>
        
                                        <a href="../make-appointment/{{ $doctor->dr_id }}"
                                            class="btn btn-primary btn-icon-split" target="_blank">
                                            <span class="text">Prendre RDV</span>
                                            <span class="icon text-white-100 align-self-center">
                                                <i class="fas fa-calendar"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h3>Aucun médecin trouvé</h3>
                    @endforelse

                    @if (count($doctors))
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                {{ $doctors->links() }}
                            </div>
                        </div>
                    @endif


                </div>
            </div>
        </div>

    </div>
    <!-- Content Row -->
@endsection
