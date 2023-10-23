@extends('dashboards.patient.layouts.patient_dashboard')
@section('title', 'Espace Patient')
@section('content')
    <div class="card">
        <div class="card-body">
            {{-- <h5 class="card-title">Password</h5> --}}

            <form action="{{ route('update-patient-password') }}" method="post">

                @csrf

                <div class="results">
                    @if (Session::get('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                            <div class="alert-message">
                                {{ Session::get('success') }}
                            </div>
                        </div>
                    @endif
                    @if (Session::get('fail'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                            <div class="alert-message">
                                {{ Session::get('fail') }}
                            </div>
                        </div>
                    @endif
                    @if (Session::get('info'))
                        <div class="alert alert-info alert-dismissible" role="alert">
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" --}}
                                aria-label="Close"></button>
                            <div class="alert-message">
                                {{ Session::get('info') }}
                            </div>
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label" for="inputPasswordCurrent">Mot de passe actuel</label>
                    <input type="password" name="pa_password" class="form-control" id="inputPasswordCurrent">
                    <span class="text-danger">
                        @error('pa_password')
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
@endsection
