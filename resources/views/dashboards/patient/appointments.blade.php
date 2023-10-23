@extends('dashboards.patient.layouts.patient_dashboard')
@section('title', 'Espace Patient')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-start align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Ma liste de rendez-vous</h6>
            {{-- <form class="d-none d-sm-inline-block form-inline  mw-100 navbar-search">
                <div class="input-group border border-info rounded">
                    <input type="text" class="form-control bg-light border-0 small bg-white border border-info" placeholder="Recherche..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary px-3" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form> --}}
        </div>
        <div class="card-body">
            {{-- <div class="d-flex justify-content-end align-items-center">
                <form class="d-none d-sm-inline-block form-inline  mw-100 navbar-search">
                    <div class="input-group border border-info rounded mb-2">
                        <input type="text" wire:model="term"
                            class="form-control bg-light border-0 small bg-white border border-info"
                            placeholder="Recherche..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-3" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div> --}}
            @livewire('appointments-p-a')
        </div>

    </div>

@endsection
