<div class="modal fade editAssistant" wire:ignore.self tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centred">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier Assistant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update" class="row g-2">
                    <input  type="hidden"  wire:model="as_id">
                    <div class="col-md-12">
                        <label for="upd_firstName" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="upd_firstName" placeholder="Saisir le non"
                            wire:model="upd_firstname">
                        <span class="text-danger">
                            @error('upd_firstname')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-12">
                        <label for="inputLastName" class="form-label">Prénon</label>
                        <input type="text" class="form-control" id="inputLastName" placeholder="Saisir le prénon"
                            wire:model="upd_lastname">
                        <span class="text-danger">
                            @error('upd_lastname')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-12">
                        <label for="inputUsername" class="form-label">Non d'utilisateur</label>
                        <input type="text" class="form-control" id="inputUsername"
                            placeholder="Saisir le non d'utilisateur" wire:model="upd_as_username">
                        <span class="text-danger">
                            @error('upd_as_username')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-12">
                        <label for="inputPassword" class="form-label">Mot de passe</label>
                        <input type="text" class="form-control" id="inputPassword"
                            placeholder="Saisir le mot de passe" wire:model="upd_password">
                        <span class="text-danger">
                            @error('upd_password')
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
