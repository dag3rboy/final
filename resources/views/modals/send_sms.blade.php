<div class="modal fade sendSMS" wire:ignore.self tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog  modal-dialog-centred">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Envoyer SMS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-white">
                <form wire:submit.prevent="sendSMS" class="row g-2">

                    <div class="col-md-12">
                        <label for="inputLastName" class="form-label">Télephone</label>
                        <input type="text" class="form-control" id="inputLastName" placeholder="Télephone"
                            wire:model="telephone">
                        <span class="text-danger">
                            @error('telephone')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-12">
                        <label for="inputLastName" class="form-label">Objet</label>
                        <input type="text" class="form-control" id="inputLastName" placeholder="Objet"
                            wire:model="subject">
                        <span class="text-danger">
                            @error('subject')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-12">
                        <label for="inputLastName" class="form-label">Message</label>
                        <textarea class="form-control" placeholder="Message" rows="5" wire:model="message"></textarea>
                        <span class="text-danger">
                            @error('rmessage')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mt-3">Envoyer</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
