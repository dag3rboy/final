<div class="table-responsive">
    <table class="table table-sm table-bordered table-hover  mt-1 ">
        <thead class="bg-primary text-white table-head">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Telephone</th>
                <th>Médecin</th>
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
                    <td> Dr. {{ $appointment->ap_doctor_firstname }} {{ $appointment->ap_doctor_lastname }}</td>
                    <td> {{ $appointment->ap_appointment_date }}</td>
                    <td>
                        @if ($appointment->ap_appointment_state == 'En attente')
                            <span
                                class="badge bg-warning text-white p-2 w-100">{{ $appointment->ap_appointment_state }}</span>
                        @elseif ($appointment->ap_appointment_state == 'Confirmé')
                            <span
                                class="badge bg-success text-white p-2 w-100">{{ $appointment->ap_appointment_state }}</span>
                        @else
                            <span
                                class="badge bg-danger text-white p-2 w-100">{{ $appointment->ap_appointment_state }}</span>
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-info"
                            wire:click="openViewAppointmentModal({{ $appointment->ap_id }})"><i
                                class='bx bx-show'></i></button>
                        <button class="btn btn-primary"
                            wire:click="openEditAppointmentModal({{ $appointment->ap_id }})"><i
                                class='bx bx-edit'></i></button>
                        <button class="btn btn-danger" wire:click="deleteConfirm({{ $appointment->ap_id }})"><i
                                class='bx bx-trash'></i></button>
                    </td>
                </tr>
            @empty
                <td>Aucun rendez-vous trouvé</td>
            @endforelse

        </tbody>
    </table>

    @if (count($appointments))
        {{ $appointments->links('pagination.livewire_pagination_links') }}
    @endif
    @include('modals.edit_appointment_pa')
    @include('modals.view_appointment_pa')
</div>
