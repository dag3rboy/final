<div class="modal fade viewContact" wire:ignore.self tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog  modal-dialog-centred">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Messsage</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-white">
                <form class="row g-2">

                    <div class="col-md-12">
                        <label for="firstName" class="form-label">Non</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Nom" wire:model="name">
                    </div>

                    <div class="col-md-12">
                        <label for="inputLastName" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputLastName" placeholder="Email" wire:model="email">
                    </div>

                    <div class="col-md-12">
                        <label for="inputLastName" class="form-label">Objet</label>
                        <input type="text" class="form-control" id="inputLastName" placeholder="Objet" wire:model="subject">
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="inputLastName" class="form-label">Message</label>
                        <textarea class="form-control" placeholder="Message" rows="4" wire:model="message"></textarea>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
