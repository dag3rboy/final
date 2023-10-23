<div>
    <button class="btn btn-primary my-2" wire:click="openAddPatientModal">Ajouter Patient</button>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Liste de patients</h3>
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
                        <th>Etat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($patients as $patient)
                        <tr>
                            <td> {{ $patient->pa_id }}</td>
                            <td> {{ $patient->pa_firstname }}</td>
                            <td> {{ $patient->pa_lastname }}</td>
                            <td> {{ $patient->pa_username }}</td>
                            <td> {{ $patient->pa_email }}</td>
                            <td> {{ $patient->pa_telephone }}</td>
                            <td> {{ $patient->pa_deleted }}</td>
                            <td>
                                <button class="btn btn-success"
                                    wire:click="openViewPatientModal({{ $patient->pa_id }})"><i
                                        class='bx bx-show'></i></button>
                                <button class="btn btn-primary"
                                    wire:click="openEditPatientModal({{ $patient->pa_id }})"><i
                                        class='bx bx-edit'></i></button>
                                <button class="btn btn-danger" wire:click="deleteConfirm({{ $patient->pa_id }})"><i
                                        class='bx bx-trash'></i></button>
                            </td>
                        </tr>
                    @empty
                        <td>Aucun patient trouvé</td>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>

    @if (count($patients))
        {{ $patients->links('pagination.livewire_pagination_links') }}
    @endif
    @include('modals.add_patient_ad')
    @include('modals.view_patient_ad')
    @include('modals.edit_patient_ad')
</div>
