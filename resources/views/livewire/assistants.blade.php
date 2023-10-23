<div>
    <button class="btn btn-primary my-2" wire:click="openAddAssistantModal">Ajouter Assisatnt</button>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Liste des assistants</h3>
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
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($assistants as $assistant)
                        <tr>
                            <td> {{ $assistant->as_id }}</td>
                            <td> {{ $assistant->as_firstname }}</td>
                            <td> {{ $assistant->as_lastname }}</td>
                            <td> {{ $assistant->as_username }}</td>
                            <td> {{ $assistant->as_password }}</td>
                            <td>
                                <button class="btn btn-primary"
                                    wire:click="openEditAssistantModal({{ $assistant->as_id }})"><i
                                        class='bx bx-edit'></i></button>
                                <button class="btn btn-danger" wire:click="deleteConfirm({{ $assistant->as_id }})"><i
                                        class='bx bx-trash'></i></button>
                            </td>
                        </tr>
                    @empty
                        <td>Aucun assistant trouvé</td>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>

    @if (count($assistants))
        {{ $assistants->links('pagination.livewire_pagination_links') }}
    @endif
    @include('modals.add_assistant_dr')
    @include('modals.edit_assistant_dr')
</div>
