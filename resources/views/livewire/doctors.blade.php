<div>
    <button class="btn btn-primary my-2" wire:click="openAddDoctorModal">Ajouter Médecin</button>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Liste de médecins</h3>
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
                        <th>Etat</th>
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
                                @if ($doctor->dr_confirmed == 1 && $doctor->dr_active == 1)
                                    <span class="badge bg-success me-1">Acitve</span>
                                @elseif ($doctor->dr_confirmed == 1 && $doctor->dr_active == 2)
                                    <span class="badge bg-danger me-1">Inactive</span>
                                @else
                                    <span class="badge bg-warning me-1">Activation en attent</span>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-success"
                                    wire:click="openViewDoctorModal({{ $doctor->dr_id }})"><i
                                        class='bx bx-show'></i></button>
                                <button class="btn btn-primary"
                                    wire:click="openEditDoctorModal({{ $doctor->dr_id }})"><i
                                        class='bx bx-edit'></i></button>
                                <button class="btn btn-danger" wire:click="deleteConfirm({{ $doctor->dr_id }})"><i
                                        class='bx bx-trash'></i></button>
                            </td>
                        </tr>
                    @empty
                        <td>Aucun doctor trouvé</td>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>

    @if (count($doctors))
        {{ $doctors->links('pagination.livewire_pagination_links') }}
    @endif

    @include('modals.add_doctor_ad')
    @include('modals.view_doctor_ad')
    @include('modals.edit_doctor_ad')
</div>
