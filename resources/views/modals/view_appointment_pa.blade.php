<div class="modal fade viewAppointmentPA" wire:ignore.self tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centred">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Informations de rendez-vous</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <i class='text-white bx bx-x'></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-2">
                    <input type="hidden" wire:model="ap_id">

                    <div class="col-md-6">
                        <label for="upd_firstName" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="pa_firstName" placeholder="le non"
                            wire:model="pa_firstname">
                        <span class="text-danger">
                            @error('pa_firstname')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputLastName" class="form-label">Prénon</label>
                        <input type="text" class="form-control" id="inputLastName" placeholder="Le prénon"
                            wire:model="pa_lastname">
                        <span class="text-danger">
                            @error('pa_lastname')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-12">
                        <label for="inputUsername" class="form-label">Médecin</label>
                        <input type="text" class="form-control" id="inputUsername" placeholder="Médecin"
                            wire:model="dr_doctor">
                        <span class="text-danger">
                            @error('dr_doctor')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword" class="form-label">date de naissance</label>
                        <input type="date" class="form-control" id="inputPassword" wire:model="pa_bitrhday">
                        <span class="text-danger">
                            @error('pa_bitrhday')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword" class="form-label">Sex</label>
                        <input type="text" class="form-control" id="inputPassword" wire:model="pa_gender">
                        <span class="text-danger">
                            @error('pa_gender')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="upd_firstName" class="form-label">Email</label>
                        <input type="text" class="form-control" id="upd_firstName" placeholder="Email"
                            wire:model="pa_email">
                        <span class="text-danger">
                            @error('pa_email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputLastName" class="form-label">Telephone</label>
                        <input type="text" class="form-control" id="inputLastName" placeholder="Telephone"
                            wire:model="pa_telephone">
                        <span class="text-danger">
                            @error('pa_telephone')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="pa_date" class="form-label">Date de rendez-vous</label>
                        <input type="date" class="form-control" name="pa_date" id="" wire:model="ap_date">
                        <span class="text-danger">
                            @error('ap_date')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputLastName" class="form-label">Etat</label>
                        <input type="text" name="ap_state" class="form-control" id="inputLastName"
                            placeholder="Etat de rendez-vous" wire:model="ap_state">
                        <span class="text-danger">
                            @error('ap_state')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-12">
                        <label for="inputLastName" class="form-label">commentaire</label>
                        <textarea class="form-control" name="ap_stat" id="" cols="30" rows="2" placeholder="Commentaire de rendez-vous"
                            wire:model="ap_comment">
                            </textarea>
                        <span class="text-danger">
                            @error('ap_comment')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
