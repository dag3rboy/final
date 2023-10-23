@extends('dashboards.admin.layouts.admin_dashboard2')
@section('title', 'Espace Admin')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">

                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div class="text-center">
                                <img alt="Admin image" src="../users-images/admins/{{ $LoggedAdminInfo->ad_photo }}"
                                    class="avatar avatar-xl avatar-rounded mt-2 admin_picture" />
                                <div class="mt-3">
                                    <input type="file" name="admin-image" id="admin-image"
                                        style="opacity: 0;height: 1px; display: none;">
                                    <a href="javascript:void(0)" class="btn btn-primary mb-3" id="change-picture-btn">Changer
                                        photo de profil</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('update-admin') }}" method="post">

                        @csrf

                        <div class="results">
                            @if (Session::get('success-1'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <div class="alert-message">
                                        {{ Session::get('success-1') }}
                                    </div>
                                </div>
                            @endif
                            @if (Session::get('fail-1'))
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <div class="alert-message">
                                        {{ Session::get('fail-1') }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <input type="hidden" value="{{ $LoggedAdminInfo->ad_id }}" name="ad_id">
                                <label class="form-label" for="inputFirstName">Nom</label>
                                <input type="text" class="form-control" name="ad_firstname"
                                    value="{{ $LoggedAdminInfo->ad_firstname }}" id="inputFirstName"
                                    placeholder="Entrez votre nom">
                                <span class="text-danger">
                                    @error('ad_firstname')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputLastName">Prénom</label>
                                <input type="text" class="form-control" name="ad_lastname"
                                    value="{{ $LoggedAdminInfo->ad_lastname }}" id="inputLastName"
                                    placeholder="Entrez votre prénom">
                                <span class="text-danger">
                                    @error('ad_lastname')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputFirstName">Nom d'utilisateur</label>
                                <input type="text" class="form-control" name="ad_username"
                                    value="{{ $LoggedAdminInfo->ad_username }}" id="inputFirstName"
                                    placeholder="Votre nom d'utilisateur">
                                <span class="text-danger">
                                    @error('ad_username')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputLastName">Email</label>
                                <input type="email" class="form-control" name="ad_email"
                                    value="{{ $LoggedAdminInfo->ad_email }}" id="inputLastName"
                                    placeholder="name@example.com">
                                <span class="text-danger">
                                    @error('ad_email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Changer le mot de passe</h5>
                    {{-- <h1>Password</h1> --}}

                    <form action="{{ route('update-admin-password') }}" method="post">

                        @csrf

                        <div class="results">
                            @if (Session::get('success-2'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <div class="alert-message">
                                        {{ Session::get('success-2') }}
                                    </div>
                                </div>
                            @endif
                            @if (Session::get('fail-2'))
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <div class="alert-message">
                                        {{ Session::get('fail-2') }}
                                    </div>
                                </div>
                            @endif
                            @if (Session::get('info-2'))
                                <div class="alert alert-info alert-dismissible" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <div class="alert-message">
                                        {{ Session::get('info-2') }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="inputPasswordCurrent">Mot de passe actuel</label>
                            <input type="password" name="ad_password" class="form-control" id="inputPasswordCurrent">
                            <span class="text-danger">
                                @error('ad_password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inputPasswordNew">Nouveau mot de passe</label>
                            <input type="password" name="new_password" class="form-control" id="inputPasswordNew">
                            <span class="text-danger">
                                @error('new_password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inputPasswordNew2">Confirmez le mot de passe</label>
                            <input type="password" name="confirm_password" class="form-control" id="inputPasswordNew2">
                            <span class="text-danger">
                                @error('confirm_password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
