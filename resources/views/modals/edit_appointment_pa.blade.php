<div class="modal fade editAppointmentPA" wire:ignore.self tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centred">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Modifier les informations de rendez-vous</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <i class='text-white bx bx-x'></i>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update" class="row g-2">
                    <input type="hidden" wire:model="ap_id">

                    <div class="col-md-6">
                        <label for="upd_firstName" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="pa_firstName" placeholder="le non"
                            wire:model="up_pa_firstname">
                        <span class="text-danger">
                            @error('up_pa_firstname')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputLastName" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="inputLastName" placeholder="Le prénom"
                            wire:model="up_pa_lastname">
                        <span class="text-danger">
                            @error('up_pa_lastname')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-12">
                        <label for="inputUsername" class="form-label">Médecin</label>
                        <input type="text" class="form-control" id="inputUsername" placeholder="Médecin"
                            wire:model="up_dr_doctor" disabled>
                        <span class="text-danger">
                            @error('up_dr_doctor')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword" class="form-label">date de naissance</label>
                        <input type="date" class="form-control" id="inputPassword" wire:model="up_pa_bitrhday">
                        <span class="text-danger">
                            @error('up_pa_bitrhday')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword" class="form-label">Sex</label>
                        <input type="text" class="form-control" id="inputPassword" wire:model="up_pa_gender">
                        <span class="text-danger">
                            @error('up_pa_gender')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="upd_firstName" class="form-label">Email</label>
                        <input type="text" class="form-control" id="upd_firstName" placeholder="Email"
                            wire:model="up_pa_email">
                        <span class="text-danger">
                            @error('up_pa_email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputLastName" class="form-label">Telephone</label>
                        <input type="text" class="form-control" id="inputLastName" placeholder="Telephone"
                            wire:model="up_pa_telephone">
                        <span class="text-danger">
                            @error('up_pa_telephone')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="pa_date" class="form-label">Date de rendez-vous</label>
                        <input type="date" class="form-control" name="up_ap_date" id="" wire:model="up_ap_date">
                        <span class="text-danger">
                            @error('up_ap_date')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputLastName" class="form-label">Etat</label>
                        <input type="text" name="ap_state" class="form-control" id="inputLastName"
                            placeholder="Etat de rendez-vous" wire:model="up_ap_state" disabled>
                        <span class="text-danger">
                            @error('up_ap_state')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-12">
                        <label for="inputLastName" class="form-label">commentaire</label>
                        <textarea class="form-control" name="up_ap_comment" id="" cols="30" rows="2" placeholder="Commentaire de rendez-vous"
                            wire:model="up_ap_comment"></textarea>
                        <span class="text-danger">
                            @error('up_ap_comment')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mt-3">Sauvegarder</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
