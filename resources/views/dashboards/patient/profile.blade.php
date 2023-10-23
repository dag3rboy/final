@extends('dashboards.patient.layouts.patient_dashboard')
@section('title', 'Espace Patient')
@section('content')
    <div class="card">
        <div class="card-body">

            <div class="row mb-2">
                <div class="col-md-12">
                    <div class="text-center">
                        <img alt="Patient Image" src="../users-images/patients/{{ $LoggedPatientInfo->pa_photo }}"
                            class="rounded-circle img-responsive mt-2 admin_picture" width="128" height="128" />
                        <div class="mt-3">
                            <input type="file" name="admin-image" id="admin-image"
                                style="opacity: 0;height: 1px; display: none;">
                            <a href="javascript:void(0)" class="btn btn-primary" id="change-picture-btn">Changer la photo de
                                profil</a>
                        </div>
                        {{-- <small>Pour de meilleurs résultats, utilisez une image d'au moins 128 pixels sur
                                        128 pixels au format .jpg</small> --}}
                    </div>
                </div>
            </div>

            <form action="{{ route('update-patient') }}" method="post">

                @csrf

                <div class="results">
                    @if (Session::get('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button> --}}
                            <div class="alert-message">
                                {{ Session::get('success') }}
                            </div>
                        </div>
                    @endif
                    @if (Session::get('fail'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button> --}}
                            <div class="alert-message">
                                {{ Session::get('fail') }}
                            </div>
                        </div>
                    @endif
                    @if (Session::get('info'))
                        <div class="alert alert-info alert-dismissible" role="alert">
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button> --}}
                            <div class="alert-message">
                                {{ Session::get('info') }}
                            </div>
                        </div>
                    @endif
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <input type="hidden" value="{{ $LoggedPatientInfo->pa_id }}" name="pa_id">
                        <label class="form-label" for="inputFirstName">Nom</label>
                        <input type="text" class="form-control" name="pa_firstname"
                            value="{{ $LoggedPatientInfo->pa_firstname }}" id="inputFirstName"
                            placeholder="Entrez votre nom">
                        <span class="text-danger">
                            @error('pa_firstname')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputLastName">Prénom</label>
                        <input type="text" class="form-control" name="pa_lastname"
                            value="{{ $LoggedPatientInfo->pa_lastname }}" id="inputLastName"
                            placeholder="Entrez votre prénom">
                        <span class="text-danger">
                            @error('pa_lastname')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputFirstName">Nom d'utilisateur</label>
                        <input type="text" class="form-control" name="pa_username"
                            value="{{ $LoggedPatientInfo->pa_username }}" id="inputFirstName"
                            placeholder="Votre nom d'utilisateur">
                        <span class="text-danger">
                            @error('pa_username')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputLastName">Email</label>
                        <input type="email" class="form-control" name="pa_email"
                            value="{{ $LoggedPatientInfo->pa_email }}" id="inputLastName" placeholder="name@example.com">
                        <span class="text-danger">
                            @error('pa_email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputFirstName">Numéro telephone</label>
                        <input type="text" class="form-control" name="pa_telephone"
                            value="{{ $LoggedPatientInfo->pa_telephone }}" id="inputFirstName"
                            placeholder="Votre numéro du telephone">
                        <span class="text-danger">
                            @error('pa_telephone')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputFirstName">date de naissance</label>
                        <input type="date" class="form-control" name="pa_birthday"
                            value="{{ $LoggedPatientInfo->pa_birthday }}" id="inputFirstName">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputLastName">Sex</label>
                        <select id="inputState" class="form-control" name="pa_gender">
                            <option>{{ $LoggedPatientInfo->pa_gender }}</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputLastName">Wilaya</label>
                        <select id="inputState" class="form-control" name="pa_wilaya">
                            <option>{{ $LoggedPatientInfo->pa_wilaya }}</option>
                            <option value="Skikda">Skikda</option>
                            <option value="Skikda">Skikda</option>
                            <option value="Annaba">Annaba</option>
                            <option value="Setif">Setif</option>
                            <option value="Alger">Alger</option>
                            <option value="Oran">Oran</option>
                        </select>
                        <span class="text-danger">
                            @error('pa_wilaya')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputLastName">Ville</label>
                        <select id="inputState" class="form-control" name="pa_city">
                            <option>{{ $LoggedPatientInfo->pa_city }}</option>
                            <option value="Skikda">Skikda</option>
                            <option value="Skikda">Skikda</option>
                            <option value="Skikda">Skikda</option>
                            <option value="Skikda">Skikda</option>
                        </select>
                        <span class="text-danger">
                            @error('pa_city')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputFirstName">Adresse</label>
                        <input type="text" class="form-control" name="pa_adress"
                            value="{{ $LoggedPatientInfo->pa_adress }}" id="inputFirstName" placeholder="Votre Adresse">
                        <span class="text-danger">
                            @error('pa_adress')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>



                <button type="submit" class="btn btn-primary">Sauvegarder</button>
            </form>

        </div>
    </div>
@endsection
