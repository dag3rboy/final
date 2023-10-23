<div class="modal fade addDoctor" wire:ignore.self tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog  modal-dialog-centred">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter Médecin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-white">
                <form wire:submit.prevent="save" class="row g-2">

                    <div class="col-md-6">
                        <label for="firstName" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Saisir le non"
                            wire:model="add_firstname">
                        <span class="text-danger">
                            @error('add_firstname')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputLastName" class="form-label">Prénon</label>
                        <input type="text" class="form-control" id="inputLastName" placeholder="Saisir le prénon"
                            wire:model="add_lastname">
                        <span class="text-danger">
                            @error('add_lastname')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputUsername" class="form-label">Non d'utilisateur</label>
                        <input type="text" class="form-control" id="inputUsername"
                            placeholder="Saisir le non d'utilisateur" wire:model="add_username">
                        <span class="text-danger">
                            @error('add_username')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="inputPassword"
                            placeholder="Saisir le mot de passe" wire:model="add_password">
                        <span class="text-danger">
                            @error('add_password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputUsername" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputUsername"
                            placeholder="Saisir l'adresse email" wire:model="add_email">
                        <span class="text-danger">
                            @error('add_email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword" class="form-label">Télephone</label>
                        <input type="text" class="form-control" id="inputPassword" placeholder="Saisir le Télephone"
                            wire:model="add_telephone">
                        <span class="text-danger">
                            @error('add_telephone')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputUsername" class="form-label">Spécialité</label>
                        <select class="form-control" wire:model="add_speciality">
                            <option value="">Choisir la spécialité</option>
                            <option value='Acupuncteur'>Acupuncteur</option>
                            <option value='Algologue'>Algologue</option>
                            <option value='Allergologue'>Allergologue</option>
                            <option value='Anatomopathologiste'>Anatomopathologiste</option>
                            <option value='Anesthésiste-réanimateur'>Anesthésiste-réanimateur</option>
                            <option value='Angiologue'>Angiologue</option>
                            <option value='Audioprothésiste'>Audioprothésiste</option>
                            <option value='Cardiologue'>Cardiologue</option>
                            <option value='Cardiologue pédiatrique'>Cardiologue pédiatrique</option>
                            <option value="Centre d'imagerie médicale">Centre d'imagerie médicale</option>
                            <option value='Chiropracteur'>Chiropracteur</option>
                            <option value='Chirurgien cardiaque'>Chirurgien cardiaque</option>
                            <option value='Chirurgien cardiaque pédiatrique'>Chirurgien cardiaque pédiatrique</option>
                            <option value='Chirurgien dentiste'>Chirurgien dentiste</option>
                            <option value='Chirurgien esthétique et plastique'>Chirurgien esthétique et plastique</option>
                            <option value='Chirurgien généraliste'>Chirurgien généraliste</option>
                            <option value='Chirurgien infantile'>Chirurgien infantile </option>
                            <option value='Chirurgien maxillo-facial'>Chirurgien maxillo-facial</option>
                            <option value='Chirurgien Pédiatrique'>Chirurgien Pédiatrique </option>
                            <option value='Chirurgien thoracique'>Chirurgien thoracique</option>
                            <option value='Chirurgien vasculaire'>Chirurgien vasculaire</option>
                            <option value='Chirurgien viscérale'>Chirurgien viscérale</option>
                            <option value='Chirurgien viscérale pédiatrique'>Chirurgien viscérale pédiatrique</option>
                            <option value='Clinique chirurgicale'>Clinique chirurgicale</option>
                            <option value='Clinique d’hémodialyse'>Clinique d’hémodialyse</option>
                            <option value='Clinique médicale'>Clinique médicale</option>
                            <option value='Clinique médico-chirurgicale'>Clinique médico-chirurgicale</option>
                            <option value='Clinique spécialisée'>Clinique spécialisée</option>
                            <option value='Dermato-vénérologue'>Dermato-vénérologue</option>
                            <option value='Diabétologie'>Diabétologie</option>
                            <option value='Diététicien'>Diététicien</option>
                            <option value='Endocrino-diabetologue'>Endocrino-diabetologue</option>
                            <option value='Gastro-entéro-hepatologue'>Gastro-entéro-hepatologue</option>
                            <option value='Généticien'>Généticien</option>
                            <option value='Gérontologue - gériatre'>Gérontologue - gériatre</option>
                            <option value='obstetricien'>Gynéco-obstetricien</option>
                            <option value='Hématologue'>Hématologue</option>
                            <option value='Hépatologue'>Hépatologue</option>
                            <option value='Infectiologue'>Infectiologue</option>
                            <option value='Kinésithérapeute'>Kinésithérapeute</option>
                            <option value='Maladies et Chirurgie CardioVasculaire'>Maladies et Chirurgie CardioVasculaire</option>
                            <option value='Médecin Biologiste Laboratoire'>Médecin Biologiste Laboratoire</option>
                            <option value='Médecin du sport'>Médecin du sport</option>
                            <option value='Médecin du travail'>Médecin du travail</option>
                            <option value='Médecin géneraliste'>Médecin géneraliste</option>
                            <option value='Médecin interniste'>Médecin interniste</option>
                            <option value='Médecin légiste'>Médecin légiste</option>
                            <option value='Médecin nucléaire'>Médecin nucléaire</option>
                            <option value='Médecin physique et de réadaptation'>Médecin physique et de réadaptation</option>
                            <option value='Médecin spécialiste de la fertilité'>Médecin spécialiste de la fertilité</option>
                            <option value='Médecine esthétique'>Médecine esthétique</option>
                            <option value='Néphrologue'>Néphrologue</option>
                            <option value='Néphrologue pédiatrique'>Néphrologue pédiatrique</option>
                            <option value='Neuro-chirurgien'>Neuro-chirurgien</option>
                            <option value='Neuro-physiologiste'>Neuro-physiologiste</option>
                            <option value='Neuro-psychiatre'>Neuro-psychiatre</option>
                            <option value='Neurologue'>Neurologue</option>
                            <option value='Nutritionniste'>Nutritionniste</option>
                            <option value='Onco-cancerologue'>Onco-cancerologue</option>
                            <option value='Oncologue médical'>Oncologue médical</option>
                            <option value='Ophtalmologue'>Ophtalmologue</option>
                            <option value='Optométriste'>Optométriste</option>
                            <option value='ORL'>ORL</option>
                            <option value='Orthophoniste'>Orthophoniste</option>
                            <option value='Orthoptiste'>Orthoptiste</option>
                            <option value='Ostéopathe'>Ostéopathe</option>
                            <option value='Pédiatre'>Pédiatre</option>
                            <option value='Phlébologue'>Phlébologue</option>
                            <option value='Pneumo-phtysio-allergologue'>Pneumo-phtysio-allergologue</option>
                            <option value='Podologue'>Podologue</option>
                            <option value='Proctologue'>Proctologue</option>
                            <option value='Psychiatre'>Psychiatre</option>
                            <option value='Psychologue'>Psychologue</option>
                            <option value='Radiologue'>Radiologue</option>
                            <option value='Radiothérapeute'>Radiothérapeute</option>
                            <option value='Réanimateur médical'>Réanimateur médical</option>
                            <option value='Réanimateur pédiatrique'>Réanimateur pédiatrique</option>
                            <option value='Rééducation fonctionnelle'>Rééducation fonctionnelle</option>
                            <option value='Rhumatologue'>Rhumatologue</option>
                            <option value='Sexologue'>Sexologue</option>
                            <option value='Stomatologue'>Stomatologue</option>
                            <option value='Traumato-orthopédiste'>Traumato-orthopédiste</option>
                            <option value='Traumato-orthopédiste pédiatrique'>Traumato-orthopédiste pédiatrique</option>
                            <option value='Urologue'>Urologue</option>
                            <option value='Urologue pédiatrique'>Urologue pédiatrique</option>
                        </select>
                        <span class="text-danger">
                            @error('add_speciality')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword" class="form-label">Sex</label>
                        <select class="form-control" wire:model="add_gender">
                            <option value="">Choisir le genre</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <span class="text-danger">
                            @error('add_gender')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputUsername" class="form-label">Wilaya</label>
                        <select class="form-control" wire:model="add_wilaya">
                            <option value="">Choisir la wilaya</option>
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
                            @error('add_wilaya')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword" class="form-label">Ville</label>
                        {{-- <select class="form-control" wire:model="add_city">
                        </select> --}}
                        <input type="text" class="form-control" id="firstName" placeholder="Saisir la ville"
                            wire:model="add_city">
                        <span class="text-danger">
                            @error('add_city')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-12">
                        <label for="firstName" class="form-label">Adresse</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Saisir l'adresse "
                            wire:model="add_adress">
                        <span class="text-danger">
                            @error('add_adress ')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mt-3">Ajouter Médecin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
