<div class="modal fade viewPatient" wire:ignore.self tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog  modal-dialog-centred">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informations de patient</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-white">
                <form wire:submit.prevent="save" class="row g-2">

                    <div class="col-md-6">
                        <label for="firstName" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="firstName" wire:model="pa_firstname">
                    </div>

                    <div class="col-md-6">
                        <label for="inputLastName" class="form-label">Prénon</label>
                        <input type="text" class="form-control" id="inputLastName" wire:model="pa_lastname">
                    </div>

                    <div class="col-md-6">
                        <label for="inputUsername" class="form-label">Non d'utilisateur</label>
                        <input type="text" class="form-control" id="inputUsername" wire:model="pa_username">
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword" class="form-label">Mot de passe</label>
                        <input type="text" class="form-control" id="inputPassword" wire:model="pa_password">
                    </div>

                    <div class="col-md-6">
                        <label for="inputUsername" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputUsername" wire:model="pa_email">
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword" class="form-label">Télephone</label>
                        <input type="text" class="form-control" id="inputPassword" wire:model="pa_telephone">
                    </div>


                    <div class="col-md-4">
                        <label for="inputUsername" class="form-label">Date de naissance</label>
                        <input type="text" class="form-control" id="inputPassword" wire:model="pa_birthday">
                    </div>

                    <div class="col-md-4">
                        <label for="inputUsername" class="form-label">Date d'inscription</label>
                        <input type="text" class="form-control" id="inputPassword" wire:model="pa_registration_date">
                    </div>

                    <div class="col-md-4">
                        <label for="inputPassword" class="form-label">Sex</label>
                        <input type="text" class="form-control" id="inputPassword" wire:model="pa_gender">
                    </div>

                    <div class="col-md-6">
                        <label for="inputUsername" class="form-label">Wilaya</label>
                        <input type="text" class="form-control" id="inputPassword" wire:model="pa_wilaya">
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword" class="form-label">Ville</label>
                        <input type="text" class="form-control" id="inputPassword" wire:model="pa_city">
                    </div>

                    <div class="col-md-8">
                        <label for="firstName" class="form-label">Adresse</label>
                        <input type="text" class="form-control" id="firstName" wire:model="pa_adress">
                    </div>

                    <div class="col-md-4">
                        <label for="inputLastName" class="form-label">Etat</label>
                        <input type="text" class="form-control" id="inputLastName" wire:model="pa_stat">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
