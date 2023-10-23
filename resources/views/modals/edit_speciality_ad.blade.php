<div class="modal fade editSpecialite" wire:ignore.self tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centred">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier specilaité</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update" enctype="multipart/form-data" class="row g-2">

                    <input  type="hidden"  wire:model="spe_id">
                    <div class="col-md-12">
                        <label for="firstName" class="form-label">Code specilaité</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Saisir le code de specilaité"
                            wire:model="up_spe_code">
                        <span class="text-danger">
                            @error('up_spe_code')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-12">
                        <label for="inputLastName" class="form-label">Nom de specilaité</label>
                        <input type="text" class="form-control" id="inputLastName" placeholder="Saisir le nom de specilaité"
                            wire:model="up_spe_name">
                        <span class="text-danger">
                            @error('up_spe_name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-12">
                        <label for="inputUsername" class="form-label">Image</label>
                        <input type="file" class="form-control" id="inputUsername" value=""
                            placeholder="Sélectionner une image.." wire:model="up_spe_image">
                        <span class="text-danger">
                            @error('up_spe_image')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div wire:loading wire:target="up_spe_image">Téléchargement en cours, veuillez patienter...</div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mt-3">Sauvgarder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
