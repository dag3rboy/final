@extends('dashboards.admin.layouts.admin_dashboard2')
@section('title', 'Espace Admin')
{{-- @section('page-title', 'Paients') --}}
@section('content')
   
<div class="row">
    <div class="col-12">
        @livewire('patients')
    </div>
</div>
@endsection
