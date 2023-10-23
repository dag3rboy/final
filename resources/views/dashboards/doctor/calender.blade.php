@extends('dashboards.doctor.layouts.doctor_dashboard')
@section('title', 'Espace Docteur')
@section('content')

    <div class="row">
        <div class="col-12">
            @livewire('schedules-d-r')
        </div>
    </div>

@endsection
