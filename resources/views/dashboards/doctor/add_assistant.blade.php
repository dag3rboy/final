@extends('dashboards.doctor.layouts.doctor_dashboard')
@section('title', 'Espace Docteur')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3>Ajouter Assistant</h3>
                    <form class="row g-3">

                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputPassword4">
                        </div>

                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputPassword4">
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Ajouter Assistant</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
