<div>
    <div class="search-container">

        <h3 class="heading">Trouver un <span>docteur</span></h3>

        <form action="" method="post">

            <div class="form-div d-input">
                <label for="">Nom</label>
                <input type="text" id="searchInput" class="form-input" wire:model.debounce.350ms="search"
                    placeholder="Nom de Docteur">
            </div>

            <div class="form-div d-input">
                <label for="">Spécialité</label>
                <select name="" id="" class="form-select" wire:model="searchBySpeciality">
                    <option value="">Choisir la spécialité</option>
                    <option value='Acupuncteur'>Acupuncteur</option>
                    <option value='Algologue'>Algologue</option>
                    <option value='Allergologue'>Allergologue</option>
                    <option value='Anatomopathologiste'>Anatomopathologiste</option>
                    <option value='Anesthésiste-réanimateur'>Anesthésiste-réanimateur</option>
                    <option value='Angiologue'>Angiologue</option>
                    <option value='68'>Audioprothésiste</option>
                    <option value='8'>Cardiologue</option>
                    <option value='9'>Cardiologue pédiatrique</option>
                    <option value='89'>Centre d'imagerie médicale</option>
                    <option value='69'>Chiropracteur</option>
                    <option value='10'>Chirurgien cardiaque</option>
                    <option value='11'>Chirurgien cardiaque pédiatrique</option>
                    <option value='65'>Chirurgien dentiste</option>
                    <option value='12'>Chirurgien esthétique et plastique</option>
                    <option value='80'>Chirurgien généraliste</option>
                    <option value='81'>Chirurgien infantile </option>
                    <option value='13'>Chirurgien maxillo-facial</option>
                    <option value='90'>Chirurgien Pédiatrique </option>
                    <option value='14'>Chirurgien thoracique</option>
                    <option value='15'>Chirurgien vasculaire</option>
                    <option value='16'>Chirurgien viscérale</option>
                    <option value='17'>Chirurgien viscérale pédiatrique</option>
                    <option value='93'>Clinique chirurgicale</option>
                    <option value='96'>Clinique d’hémodialyse</option>
                    <option value='94'>Clinique médicale</option>
                    <option value='95'>Clinique médico-chirurgicale</option>
                    <option value='97'>Clinique spécialisée</option>
                    <option value='54'>Dermato-vénérologue</option>
                    <option value='104'>Diabétologie</option>
                    <option value='70'>Diététicien</option>
                    <option value='19'>Endocrino-diabetologue</option>
                    <option value='20'>Gastro-entéro-hepatologue</option>
                    <option value='21'>Généticien</option>
                    <option value='22'>Gérontologue - gériatre</option>
                    <option value='58'>Gynéco-obstetricien</option>
                    <option value='Hématologue'>Hématologue</option>
                    <option value='Hépatologue'>Hépatologue</option>
                    <option value='83'>Infectiologue</option>
                    <option value='72'>Kinésithérapeute</option>
                    <option value='92'>Maladies et Chirurgie CardioVasculaire</option>
                    <option value='7'>Médecin Biologiste Laboratoire</option>
                    <option value='24'>Médecin du sport</option>
                    <option value='25'>Médecin du travail</option>
                    <option value='1'>Médecin géneraliste</option>
                    <option value='26'>Médecin interniste</option>
                    <option value='27'>Médecin légiste</option>
                    <option value='28'>Médecin nucléaire</option>
                    <option value='29'>Médecin physique et de réadaptation</option>
                    <option value='103'>Médecin spécialiste de la fertilité</option>
                    <option value='91'>Médecine esthétique</option>
                    <option value='Néphrologue'>Néphrologue</option>
                    <option value='34'>Néphrologue pédiatrique</option>
                    <option value='30'>Neuro-chirurgien</option>
                    <option value='100'>Neuro-physiologiste</option>
                    <option value='101'>Neuro-psychiatre</option>
                    <option value='Neurologue'>Neurologue</option>
                    <option value='Nutritionniste'>Nutritionniste</option>
                    <option value='35'>Onco-cancerologue</option>
                    <option value='36'>Oncologue médical</option>
                    <option value='Ophtalmologue'>Ophtalmologue</option>
                    <option value='99'>Optométriste</option>
                    <option value='ORL'>ORL</option>
                    <option value='74'>Orthophoniste</option>
                    <option value='75'>Orthoptiste</option>
                    <option value='67'>Ostéopathe</option>
                    <option value='52'>Pédiatre</option>
                    <option value='51'>Phlébologue</option>
                    <option value='38'>Pneumo-phtysio-allergologue</option>
                    <option value='76'>Podologue</option>
                    <option value='55'>Proctologue</option>
                    <option value='39'>Psychiatre</option>
                    <option value='77'>Psychologue</option>
                    <option value='40'>Radiologue</option>
                    <option value='41'>Radiothérapeute</option>
                    <option value='43'>Réanimateur médical</option>
                    <option value='44'>Réanimateur pédiatrique</option>
                    <option value='87'>Rééducation fonctionnelle</option>
                    <option value='Rhumatologue'>Rhumatologue</option>
                    <option value='Sexologue'>Sexologue</option>
                    <option value='Stomatologue'>Stomatologue</option>
                    <option value='Traumato-orthopédiste'>Traumato-orthopédiste</option>
                    <option value='Traumato-orthopédiste pédiatrique'>Traumato-orthopédiste pédiatrique</option>
                    <option value='Urologue'>Urologue</option>
                    <option value='Urologue pédiatrique'>Urologue pédiatrique</option>
                </select>
            </div>

            <div class="form-div d-input">
                <label for="">Wilaya</label>
                <select name="" id="" class="form-select" wire:model="searchByWilaya">
                    <option value="">Choisir la wilaya</option>
                    @foreach ($wilayas as $wilaya)
                        <option value="{{ $wilaya->nom }}">
                            {{ $wilaya->nom }}
                        </option>
                    @endforeach
                </select>

            </div>

            <div class="form-div d-input">
                <label for="" id="hidden-label">Send</label>
                <input type="submit" name="" value="Recherche" class="btn-search-doctor">
            </div>

        </form>
    </div>

    <div class="box-container">
        {{-- <td> {{ $doctor->dr_id }}</td> --}}

        @forelse ($doctors as $doctor)
            <div class="box">
                <div class="image">
                    @if ($doctor->dr_photo != 'default.png')
                        <img src="users-images/doctors/{{ $doctor->dr_photo }}" alt="">
                    @else
                        @if ($doctor->dr_gender == 'Male')
                            <img src="users-images/doctors/doctor-male.png" alt="">
                        @else
                            <img src="users-images/doctors/doctor-female.png" alt="">
                        @endif
                    @endif
                </div>
                <div class="content">
                    <h3>Dr.{{ $doctor->dr_firstname }} {{ $doctor->dr_lastname }}</h3>
                    <p><i class='bx bx-pulse'></i>{{ $doctor->dr_speciality }}</p>
                    <p><i class='bx bx-location-plus'></i></i>{{ $doctor->dr_wilaya }}</p>
                    <p><i class='bx bx-clinic'></i>{{ $doctor->dr_adress }}</p>
                    <p><i class='bx bx-phone'></i>{{ $doctor->dr_telephone }}</p>
                    <div class="div-btn">
                        @if ($doctor->dr_appointment_active == 1)
                            <a href="make-appointment/{{ $doctor->dr_id }}" class="btn-rdv">Prendre un RDV </a>
                        @else

                        @endif
                        <a href="doctor-details/{{ $doctor->dr_id }}" class="btn-details">Profile</a>
                    </div>
                </div>
            </div>
        @empty

            <div class="empty-stat">
                <img src="assets/img/svg/search.svg" alt="">
                <h3>Aucun médecin trouvé!</h3>
            </div>
        @endforelse

        {{-- {{ $doctor->links }} --}}
        @if (count($doctors))
            {{ $doctors->links('pagination.livewire_pagination_links') }}
        @endif
    </div>

</div>
