<div>
    <div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Contacter utilisateurs par SMS</h3>
            </div>
            <div class="card-body border-bottom py-3">
                <form wire:submit.prevent="send" class="addSchedule row g-2">

                    <div class="col-md-3">

                        <input type="email" class="form-control" id="inputLastName" placeholder="Email"
                            wire:model="res_email">
                        <span class="text-danger">
                            @error('sc_date')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-3">
                        <input type="text" class="form-control" id="inputLastName" placeholder="Objet"
                            wire:model="res_subject">
                        <span class="text-danger">
                            @error('sc_start_hour')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-3">
                        <button class="btn btn-primary w-100">Liste email Médecins</button>
                    </div>

                    <div class="col-md-3">
                        <button class="btn btn-primary w-100">Liste email Patients</button>
                    </div>

                    <div class="col-md-12 mt-3">

                        <textarea class="form-control" placeholder="Message" rows="6" wire:model="res_message"></textarea>
                        <span class="text-danger">
                            @error('sc_max_patients')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-3">
                        <button class="btn btn-primary w-100 mt-3">Envoyer</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>
