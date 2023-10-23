<div class="modal fade editSchedule" wire:ignore.self tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centred">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier jour de travail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-white">
                <form wire:submit.prevent="update" class="row g-2">

                    <div class="col-md-12">
                        <label for="sc_up_date" class="form-label">Jour</label>
                        <input type="date" class="form-control" id="sc_up_date" placeholder="Sélectionner une date"
                            wire:model="sc_up_date">
                        <span class="text-danger">
                            @error('sc_up_date')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-12">
                        <label for="sc_up_start_hour" class="form-label">Heure de début</label>
                        <input type="time" class="form-control" id="sc_up_start_hour" placeholder="08:00 PM"
                            wire:model="sc_up_start_hour">
                        <span class="text-danger">
                            @error('sc_up_start_hour')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-12">
                        <label for="sc_up_end_hour" class="form-label">Heure de fermeture</label>
                        <input type="time" class="form-control" id="sc_end_hour" placeholder="16:00 AM"
                            wire:model="sc_up_end_hour">
                        <span class="text-danger">
                            @error('sc_up_end_hour')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-12">
                        <label for="sc_up_max_patients" class="form-label">Nombre de place maximum </label>
                        <input type="text" class="form-control" id="sc_up_max_patients" placeholder="30"
                            wire:model="sc_up_max_patients">
                        <span class="text-danger">
                            @error('sc_up_max_patients')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mt-3">Sauvgarder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
