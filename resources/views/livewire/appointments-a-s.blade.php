<div>

    <div class="card">
        <div class="card-header">
            {{-- <h3 class="card-title">Liste des rendez-vous</h3> --}}
            <button class="btn btn-primary " wire:click="openAddAppointmentModal()">Ajouter
                Rendez-vous</button>
            {{-- <input type="text" class="form-control" id="" placeholder="Recherche...">
                <input type="date" class="form-control" id="">
                <select class="form-control"  wire:model="add_pa_gender">
                    <option selected="selected">Male</option>
                    <option>Female</option>
                </select> --}}
        </div>
        {{-- <div class="card-body border-bottom py-3">
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
        </div> --}}
        <div class="card-body border-bottom py-2">
            <div class="d-flex">

                <div class="row">
                    <div class="col-md-3 mb-2 mb-md-0">
                        <select class="form-select" wire:model="filterByState">
                            <option value="" selected disabled>Etat</option>
                            <option value="Confirmé">Confirmé</option>
                            <option value="En attente">En attente</option>
                            <option value="Refusé">Refusé</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-2 mb-md-0">
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
                    <div class="col-md-4 mb-2 mb-md-0">
                        <div class="input-icon">
                            <input class="form-control" type="date" wire:model="searchByDate"
                                placeholder="Sélectionnez une date" id="datepicker-icon" />
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-primary text-center" wire:click="refreshTable()">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                                <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                            </svg>
                        </button>
                    </div>
                </div>


            </div>
        </div>
        <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Telephone</th>
                        <th>Sex</th>
                        <th>Date de RDV </th>
                        <th>Etat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($appointments as $appointment)
                        <tr>
                            <td> {{ $appointment->ap_id }}</td>
                            <td> {{ $appointment->ap_patient_firstname }}</td>
                            <td> {{ $appointment->ap_patient_lastname }}</td>
                            <td> {{ $appointment->ap_patient_telephone }}</td>
                            <td> {{ $appointment->ap_patient_gender }} </td>
                            <td> {{ $appointment->ap_appointment_date }}</td>
                            <td>
                                @if ($appointment->ap_appointment_state == 'En attente')
                                    <span class="badge bg-warning me-1"></span>
                                    {{ $appointment->ap_appointment_state }}
                                @elseif ($appointment->ap_appointment_state == 'Confirmé')
                                    <span class="badge bg-success me-1"></span>
                                    {{ $appointment->ap_appointment_state }}
                                @else
                                    <span class="badge bg-danger me-1"></span>
                                    {{ $appointment->ap_appointment_state }}
                                @endif
                            </td>
                            <td>
                                {{-- <button class="btn btn-success"
                                    wire:click="openValidateAppointmentModal({{ $appointment->ap_id }})">Valider <i
                                        class='bx bx-check'></i></button>
                                <button class="btn btn-danger"
                                    wire:click="deleteConfirm({{ $appointment->ap_id }})"><i
                                        class='bx bx-trash'></i></button> --}}
                                <span class="dropdown">
                                    <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport"
                                        data-bs-toggle="dropdown">Actions</button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item"
                                            wire:click="openValidateAppointmentModal({{ $appointment->ap_id }})"
                                            href="#">
                                            Afficher
                                        </a>
                                        <a class="dropdown-item"
                                            wire:click="validateAppointment({{ $appointment->ap_id }})" href="#">
                                            Valider
                                        </a>
                                        <a class="dropdown-item"
                                            wire:click="refuseAppointment({{ $appointment->ap_id }})" href="#">
                                            Refuser
                                        </a>
                                        <a class="dropdown-item"
                                            wire:click="deleteConfirm({{ $appointment->ap_id }})" href="#">
                                            Supprimer
                                        </a>
                                    </div>
                                </span>
                            </td>
                        </tr>
                    @empty
                        <td>Aucun rendez-vous trouvé</td>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>

    @if (count($appointments))
        {{ $appointments->links('pagination.livewire_pagination_links') }}
    @endif

    @include('modals.validate_appointment_as')
    @include('modals.add_appointment_as')

</div>
