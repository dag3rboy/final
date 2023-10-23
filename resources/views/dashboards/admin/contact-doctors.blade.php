@extends('dashboards.admin.layouts.admin_dashboard2')
@section('title', 'Espace Admin')
@section('content')
   
<div class="row">
    <div class="col-12">
        @livewire('contact-doctor')
    </div>
</div>
@endsection