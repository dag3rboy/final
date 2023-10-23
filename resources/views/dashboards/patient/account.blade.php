@extends('dashboards.patient.layouts.patient_dashboard')
@section('title', 'Espace Patient')
@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{ route('desactivate-patient-account') }}" method="post">

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
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button> --}}
                            <div class="alert-message">
                                {{ Session::get('info') }}
                            </div>
                        </div>
                    @endif
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h3 class="mb-3">Désactiver mon compte</h3>
                        <p><strong>Remarque :</strong> votre compte sera reactivé automatiquement lorsque vous vous reconnecterez à notre système</p>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-2 col-md-5">
                        <label class="form-label" for="inputPasswordCurrent">Mot de passe</label>
                        <input type="password" class="form-control" id="inputPasswordCurrent" name="pa_password">
                        <span class="text-danger">
                            @error('pa_password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-5">
                        <label class="form-label" for="inputPasswordNew2">Confirmez le mot de
                            passe</label>
                        <input type="password" class="form-control" id="inputPasswordNew2" name="confirm_password">
                        <span class="text-danger">
                            @error('confirm_password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Désactiver le compte</button>
            </form>

        </div>
    </div>
@endsection
