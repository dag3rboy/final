@extends('dashboards.assistant.layouts.assistant_dashboard')
@section('title', 'Espace assistant')
@section('content')


    <div class="row">
        <div class="col-12">
            @livewire('schedules-a-s')
        </div>
    </div>

@endsection
