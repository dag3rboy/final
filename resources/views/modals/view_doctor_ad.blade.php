<div class="modal fade viewDoctor" wire:ignore.self tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centred">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informations de médecin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-white">
                <form wire:submit.prevent="save" class="row g-2">

                    <div class="col-md-6">
                        <label for="firstName" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="firstName" wire:model="dr_firstname">
                    </div>

                    <div class="col-md-6">
                        <label for="inputLastName" class="form-label">Prénon</label>
                        <input type="text" class="form-control" id="inputLastName" wire:model="dr_lastname">
                    </div>

                    <div class="col-md-6">
                        <label for="inputUsername" class="form-label">Non d'utilisateur</label>
                        <input type="text" class="form-control" id="inputUsername" wire:model="dr_username">
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword" class="form-label">Mot de passe</label>
                        <input type="text" class="form-control" id="inputPassword" wire:model="dr_password">
                    </div>

                    <div class="col-md-6">
                        <label for="inputUsername" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputUsername"
                            placeholder="Saisir l'adresse email" wire:model="dr_email">
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword" class="form-label">Télephone</label>
                        <input type="text" class="form-control" id="inputPassword" wire:model="dr_telephone">
                    </div>

                    <div class="col-md-5">
                        <label for="inputUsername" class="form-label">Spécialité</label>
                        <input type="text" class="form-control" id="inputPassword" wire:model="dr_speciality">
                    </div>

                    <div class="col-md-4">
                        <label for="inputUsername" class="form-label">Date de naissance</label>
                        <input type="text" class="form-control" id="inputPassword" wire:model="dr_birthday">
                    </div>

                    <div class="col-md-3">
                        <label for="inputPassword" class="form-label">Sex</label>
                        <input type="text" class="form-control" id="inputPassword" wire:model="dr_gender">
                    </div>

                    <div class="col-md-6">
                        <label for="inputUsername" class="form-label">Wilaya</label>
                        <input type="text" class="form-control" id="inputPassword" wire:model="dr_wilaya">
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword" class="form-label">Ville</label>
                        <input type="text" class="form-control" id="inputPassword" wire:model="dr_city">
                    </div>

                    <div class="col-md-12">
                        <label for="firstName" class="form-label">Adresse</label>
                        <input type="text" class="form-control" id="firstName" wire:model="dr_adress">
                    </div>

                    <div class="col-md-4">
                        <label for="firstName" class="form-label">Department</label>
                        <input type="text" class="form-control" id="firstName" wire:model="dr_department">
                    </div>

                    <div class="col-md-4">
                        <label for="inputLastName" class="form-label">Service</label>
                        <input type="text" class="form-control" id="inputLastName" wire:model="dr_service">
                    </div>

                    <div class="col-md-4">
                        <label for="inputLastName" class="form-label">Etat</label>
                        <input type="text" class="form-control" id="inputLastName" wire:model="dr_stat">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
