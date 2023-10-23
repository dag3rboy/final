<div class="modal fade addAppointmentAS" wire:ignore.self tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centred">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter Rendez-vous</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-white">
                <form wire:submit.prevent="save" class="row g-2">
                    <input type="hidden" value="{{ $dr_id }}"  wire:model="dr_id">
                    <div class="col-md-6">
                        <label for="pa_firstName" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="pa_firstName" placeholder="Le nom de patient"
                            wire:model="add_pa_firstname">
                        <span class="text-danger">
                            @error('add_pa_firstname')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputLastName" class="form-label">Prénon</label>
                        <input type="text" class="form-control" id="inputLastName" placeholder="Le prénon  de patient"
                            wire:model="add_pa_lastname">
                        <span class="text-danger">
                            @error('add_pa_lastname')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword" class="form-label">Date de naissance</label>
                        <input type="date" class="form-control" id="inputPassword" wire:model="add_pa_birthday">
                        <span class="text-danger">
                            @error('add_pa_birthday')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword" class="form-label">Sex</label>
                        <select class="form-control"  wire:model="add_pa_gender">
                            <option selected="selected">Male</option>
                            <option>Female</option>
                        </select>
                        <span class="text-danger">
                            @error('add_pa_gender')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-12">
                        <label for="upd_firstName" class="form-label">Email</label>
                        <input type="email" class="form-control" id="upd_firstName" placeholder="Email"
                            wire:model="add_pa_email">
                        <span class="text-danger">
                            @error('add_pa_email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputLastName" class="form-label">Telephone</label>
                        <input type="text" class="form-control" id="inputLastName" placeholder="Telephone"
                            wire:model="add_pa_telephone">
                        <span class="text-danger">
                            @error('add_pa_telephone')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="pa_date" class="form-label">Date de rendez-vous</label>
                        <input type="date" class="form-control" id="" wire:model="add_ap_date">
                        <span class="text-danger">
                            @error('add_ap_date')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>


                    <div class="col-md-12">
                        <label for="inputLastName" class="form-label">Commentaire</label>
                        <textarea class="form-control"  cols="30" rows="2" placeholder="Commentaire de rendez-vous"
                            wire:model="add_ap_comment"></textarea>
                        <span class="text-danger">
                            @error('add_ap_comment')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mt-3">Insérer le rendez-vous</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
