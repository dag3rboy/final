<div class="modal fade responseContact" wire:ignore.self tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog  modal-dialog-centred">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Réponse</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-white">
                <form wire:submit.prevent="send" class="row g-2">

                    <div class="col-md-12">
                        <label for="inputLastName"  class="form-label">Email</label>
                        <input type="email"  class="form-control" id="inputLastName" placeholder="Email"
                            wire:model="res_email">
                        <span class="text-danger">
                            @error('res_email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-12">
                        <label for="inputLastName" class="form-label">Objet</label>
                        <input type="text" class="form-control" id="inputLastName" placeholder="Objet"
                            wire:model="res_subject">
                        <span class="text-danger">
                            @error('res_subject')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-12">
                        <label for="inputLastName" class="form-label">Message</label>
                        <textarea class="form-control" placeholder="Message" rows="5" wire:model="res_message"></textarea>
                        <span class="text-danger">
                            @error('res_message')
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
