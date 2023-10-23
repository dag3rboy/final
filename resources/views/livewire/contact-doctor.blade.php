<div>
    <div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Contacter Médecins </h3>
                    </div>
                    <div class="card-header">
                        <div class="input-icon">
                            <input type="text" class="form-control" wire:model.debounce.350ms="search"
                                placeholder="Search…">
                            <span class="input-icon-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="10" cy="10" r="7" />
                                    <line x1="21" y1="21" x2="15" y2="15" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="card-body border-bottom py-3">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($doctors as $doctor)
                                        <tr>
                                            <td> {{ $doctor->dr_firstname }}</td>
                                            <td> {{ $doctor->dr_lastname }}</td>
                                            <td> {{ $doctor->dr_email }}</td>
                                            <td> {{ $doctor->dr_telephone }}</td>
                                            <td>
                                                <button class="btn btn-primary"
                                                    wire:click="openSendEmailModal('{{ $doctor->dr_email }}')">
                                                    <i class='bx bx-send'></i></button>
                                                <button class="btn btn-success"
                                                    wire:click="openSendSMSModal('{{ $doctor->dr_telephone }}')">
                                                    <i class='bx bx-envelope'></i></button>
                                            </td>
                                        </tr>
                                    @empty
                                        <td>Aucun médecin trouvé</td>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (count($doctors))
        {{ $doctors->links('pagination.livewire_pagination_links') }}
    @endif

    @include('modals.send_email')
    @include('modals.send_sms')

</div>
