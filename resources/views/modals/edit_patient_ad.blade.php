<div class="modal fade editPatient" wire:ignore.self tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog  modal-dialog-centred">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier patient</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-white">
                <form wire:submit.prevent="update" class="row g-2">
                    <input type="hidden" wire:model="pa_id">
                    <div class="col-md-6">
                        <label for="firstName" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Saisir le non"
                            wire:model="edit_firstname">
                        <span class="text-danger">
                            @error('edit_firstname')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputLastName" class="form-label">Prénon</label>
                        <input type="text" class="form-control" id="inputLastName" placeholder="Saisir le prénon"
                            wire:model="edit_lastname">
                        <span class="text-danger">
                            @error('edit_lastname')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputUsername" class="form-label">Non d'utilisateur</label>
                        <input type="text" class="form-control" id="inputUsername"
                            placeholder="Saisir le non d'utilisateur" wire:model="edit_username">
                        <span class="text-danger">
                            @error('edit_username')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="inputPassword"
                            placeholder="Saisir le mot de passe" wire:model="edit_password">
                        <span class="text-danger">
                            @error('esit_password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputUsername" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputUsername"
                            placeholder="Saisir l'adresse email" wire:model="edit_email">
                        <span class="text-danger">
                            @error('add_email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword" class="form-label">Télephone</label>
                        <input type="text" class="form-control" id="inputPassword" placeholder="Saisir le Télephone"
                            wire:model="edit_telephone">
                        <span class="text-danger">
                            @error('edit_telephone')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>


                    <div class="col-md-6">
                        <label for="inputUsername" class="form-label">Date de naissance</label>
                        <input type="date" class="form-control" id="inputPassword" wire:model="edit_birthday">
                        <span class="text-danger">
                            @error('edit_birthday')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>


                    <div class="col-md-6">
                        <label for="inputPassword" class="form-label">Sex</label>
                        <select class="form-control" wire:model="edit_gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <span class="text-danger">
                            @error('edit_gender')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputUsername" class="form-label">Wilaya</label>
                        <select class="form-control" wire:model="edit_wilaya">
                            <option value='Adrar'>Adrar</option>
                            <option value='Chlef'>Chlef</option>
                            <option value='Laghouat'>Laghouat</option>
                            <option value='Oum Bouaghi'>Oum Bouaghi</option>
                            <option value='Batna'>Batna</option>
                            <option value='Béjaia'>Béjaia</option>
                            <option value='Biskra'>Biskra</option>
                            <option value='Bechar'>Bechar</option>
                            <option value='Blida'>Blida</option>
                            <option value='Bouira'>Bouira</option>
                            <option value='Tamanrasset'>Tamanrasset</option>
                            <option value='Tebessa'>Tebessa</option>
                            <option value='Tlemcen'>Tlemcen</option>
                            <option value='Tiaret'>Tiaret</option>
                            <option value='Tizi ouzou'>Tizi ouzou</option>
                            <option value='Alger'>Alger</option>
                            <option value='Djelfa'>Djelfa</option>
                            <option value='Jijel'>Jijel</option>
                            <option value='Sétif'>Sétif</option>
                            <option value='Saida'>Saida</option>
                            <option value='Skikda'>Skikda</option>
                            <option value='Sidi Bel Abbès'>Sidi Bel Abbès</option>
                            <option value='Annaba'>Annaba</option>
                            <option value='Guelma'>Guelma</option>
                            <option value='Constantine'>Constantine</option>
                            <option value='Médéa'>Médéa</option>
                            <option value="M'sila">M'sila</option>
                            <option value='Mascara'>Mascara</option>
                            <option value='Ouargla'>Ouargla </option>
                            <option value='Oran'>Oran</option>
                            <option value='El Baydh'>El Baydh</option>
                            <option value='Illizi'>Illizi</option>
                            <option value='Bordj Bou Arreridj'>Bordj Bou Arreridj</option>
                            <option value='Boumerdès'>Boumerdès</option>
                            <option value='El Taref'>El Taref</option>
                            <option value='Tindouf'>Tindouf</option>
                            <option value='Tissemsilt'>Tissemsilt</option>
                            <option value='El Oued'>El Oued</option>
                            <option value='Khenchla'>Khenchla</option>
                            <option value='Souk Ahras'>Souk Ahras</option>
                            <option value='Tipaza'>Tipaza</option>
                            <option value='Mila'>Mila</option>
                            <option value='Aïn Defla'>Aïn Defla</option>
                            <option value='Nâama'>Nâama</option>
                            <option value='Aïn Temouchent'>Aïn Temouchent</option>
                            <option value='Ghardïa'>Ghardïa</option>
                            <option value='Relizane'>Relizane</option>
                            <option value='Timimoun'>Timimoun</option>
                            <option value='Bordj Badji Mokhtar'>Bordj Badji Mokhtar</option>
                            <option value='Ouled Djellal'>Ouled Djellal</option>
                            <option value='Béni Abbès'>Béni Abbès</option>
                            <option value='In Salah'>In Salah</option>
                            <option value='In Guezzam'>In Guezzam</option>
                            <option value='Touggourt'>Touggourt</option>
                            <option value='Djanet'>Djanet</option>
                            <option value='Algologue'>Algologue</option>
                            <option value="El M'Ghair">El M'Ghair</option>
                            <option value='El Meniaa'>El Meniaa</option>
                        </select>
                        <span class="text-danger">
                            @error('edit_wilaya')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword" class="form-label">Ville</label>
                        <input type="text" class="form-control" id="inputPassword" wire:model="edit_city">
                        <span class="text-danger">
                            @error('edit_city')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-12">
                        <label for="firstName" class="form-label">Adresse</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Saisir l'adresse "
                            wire:model="edit_adress">
                        <span class="text-danger">
                            @error('edit_adress ')
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
