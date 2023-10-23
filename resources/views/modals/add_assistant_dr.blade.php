<div class="modal fade addAssistant" wire:ignore.self tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centred">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter Assistant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save" class="row g-2">
                    <input id="modal_doc_id" type="hidden" value="{{ $dr_id }}"  wire:model="dr_id">
                    <div class="col-md-12">
                        <label for="firstName" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Saisir le non"
                            wire:model="firstname">
                        <span class="text-danger">
                            @error('firstname')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-12">
                        <label for="inputLastName" class="form-label">Prénon</label>
                        <input type="text" class="form-control" id="inputLastName" placeholder="Saisir le prénon"
                            wire:model="lastname">
                        <span class="text-danger">
                            @error('lastname')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-12">
                        <label for="inputUsername" class="form-label">Non d'utilisateur</label>
                        <input type="text" class="form-control" id="inputUsername"
                            placeholder="Saisir le non d'utilisateur" wire:model="as_username">
                        <span class="text-danger">
                            @error('as_username')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-12">
                        <label for="inputPassword" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="inputPassword"
                            placeholder="Saisir le mot de passe" wire:model="password">
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mt-3">Ajouter Assistant</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
