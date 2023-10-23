<div>
    <button class="btn btn-primary my-2" wire:click="openAddSpecialityModal()">Ajouter Specialité</button>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Liste des specialités</h3>
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
                        <th>Image </th>
                        <th>Code specialite</th>
                        <th>Nom specialite</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($specialites as $specialites)
                        <tr>
                            <td> {{ $specialites->sp_id }}</td>
                            <td> <img class="avatar me-2 avatar-rounded"
                                    src="../storage/specialties-images/{{ $specialites->sp_speciality_image }}"
                                    alt=""></td>
                            <td> {{ $specialites->sp_speciality_label }}</td>
                            <td> {{ $specialites->sp_speciality_name }}</td>
                            <td>
                                <button class="btn btn-primary"
                                    wire:click="openEditSpecialityModal({{ $specialites->sp_id }})"><i
                                        class='bx bx-edit'></i></button>
                                <button class="btn btn-danger"
                                    wire:click="deleteConfirm({{ $specialites->sp_id }})"><i
                                        class='bx bx-trash'></i></button>
                            </td>
                        </tr>
                    @empty
                        <td>Aucun specialite trouvé</td>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>

    {{-- @if (count($specialites))
        {{ $specialites->links('pagination.livewire_pagination_links') }}
    @endif --}}


    @include('modals.add_speciality_ad')
    @include('modals.edit_speciality_ad')
</div>
