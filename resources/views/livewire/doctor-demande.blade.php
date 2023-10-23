<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Liste des demande d'inscription</h3>
        </div>
        <div class="card-body border-bottom py-3">
            <div class="d-flex">
                <div class="text-muted">
                    Show
                    <div class="mx-2 d-inline-block">
                        <input type="text" class="form-control form-control-sm" value="8" size="3"
                            aria-label="Invoices count">
                    </div>
                    entries
                </div>
                <div class="ms-auto text-muted">
                    Search:
                    <div class="ms-2 d-inline-block">
                        <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom </th>
                        <th>Prénom</th>
                        <th>Username </th>
                        <th>Email </th>
                        <th>Telephone</th>
                        <th>Specialité</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($doctors as $doctor)
                        <tr>
                            <td> {{ $doctor->dr_id }}</td>
                            <td> {{ $doctor->dr_firstname }}</td>
                            <td> {{ $doctor->dr_lastname }}</td>
                            <td> {{ $doctor->dr_username }}</td>
                            <td> {{ $doctor->dr_email }}</td>
                            <td> {{ $doctor->dr_telephone }}</td>
                            <td> {{ $doctor->dr_speciality }}</td>
                            <td>
                                {{-- <button class="btn btn-success"
                                    wire:click="openViewDoctorModal({{ $doctor->dr_id }})"><i
                                        class='bx bx-show'></i></button>
                                <button class="btn btn-primary"
                                    wire:click="openEditDoctorModal({{ $doctor->dr_id }})"><i
                                        class='bx bx-edit'></i></button>
                                <button class="btn btn-danger" wire:click="deleteConfirm({{ $doctor->dr_id }})"><i
                                        class='bx bx-trash'></i></button> --}}
                                <span class="dropdown">
                                    <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport"
                                        data-bs-toggle="dropdown">Actions</button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item"
                                            wire:click="openViewDoctorModal({{ $doctor->dr_id }})"
                                            href="#">
                                            Afficher
                                        </a>
                                        <a class="dropdown-item"
                                            wire:click="validateDemande({{ $doctor->dr_id }})'" href="#">
                                            Valider
                                        </a>
                                        <a class="dropdown-item"
                                            wire:click="refuseDemande({{ $doctor->dr_id }})" href="#">
                                            Refuser
                                        </a>
                                        <a class="dropdown-item"
                                            wire:click="deleteConfirm({{ $doctor->dr_id }})" href="#">
                                            Supprimer
                                        </a>
                                    </div>
                                </span>
                            </td>
                        </tr>
                    @empty
                        <td>Aucun demande trouvé</td>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>

    @if (count($doctors))
        {{ $doctors->links('pagination.livewire_pagination_links') }}
    @endif

    @include('modals.view_doctor_demande_ad')
</div>
