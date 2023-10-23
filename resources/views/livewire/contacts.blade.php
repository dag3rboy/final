<div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Liste de conctacts</h3>
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
                        <th>Email </th>
                        <th>Objet</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contacts as $contact)
                        <tr>
                            <td> {{ $contact->co_id }}</td>
                            <td> {{ $contact->co_name }}</td>
                            <td> {{ $contact->co_email }}</td>
                            <td> {{ $contact->co_subject }}</td>
                            <td> {{ $contact->co_message }}</td>
                            <td>
                                <button class="btn btn-success"
                                    wire:click="openViewContactModal({{ $contact->co_id }})"><i
                                        class='bx bx-show'></i></button>
                                <button class="btn btn-primary"
                                    wire:click="openContactResponseModal('{{ $contact->co_email }}')"><i
                                        class='bx bx-send'></i></button>
                                <button class="btn btn-danger" wire:click="deleteConfirm({{ $contact->co_id }})"><i
                                        class='bx bx-trash'></i></button>
                            </td>
                        </tr>
                    @empty
                        <td>Aucun contact trouvé</td>
                    @endforelse

                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex align-items-center">
            @if (count($contacts))
                {{ $contacts->links('pagination.livewire_pagination_links') }}
            @endif
        </div>
    </div>


    @include('modals.view_contact_ad')
    @include('modals.response_contact_ad')
</div>
