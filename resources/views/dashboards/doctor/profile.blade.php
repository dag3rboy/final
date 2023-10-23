@extends('dashboards.doctor.layouts.doctor_dashboard')
@section('title', 'Espace Docteur')
@section('content')

    {{-- <h1 class="h3 mb-3">Settings</h1> --}}

    <div class="row">
        <div class="col-md-3 col-xl-2">

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Paramètres de compte</h5>
                </div>

                <div class="list-group list-group-flush" role="tablist">
                    <a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#account"
                        role="tab">
                        Profile
                    </a>
                    <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#password" role="tab">
                        Mot de passe
                    </a>
                    <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#online-appointment" role="tab">
                        Rendez-vous en ligne
                    </a>
                    <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#delete" role="tab">
                        Supprimer le compte
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-9 col-xl-10">
            <div class="tab-content">

                {{-- Profile info  Tab --}}
                <div class="tab-pane fade {{ $activeTab=='account' ? 'show active' : '' }}" id="account" role="tabpanel">

                    <div class="card">
                        <div class="card-body">

                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        {{-- <img alt="Doctor image"
                                            src="../users-images/doctors/{{ $LoggedDoctorInfo->dr_photo }}"
                                            class="rounded-circle img-responsive mt-2 admin_picture" width="128"
                                            height="128" /> --}}
                                        <img alt="Doctor image"
                                            src="../users-images/doctors/{{ $LoggedDoctorInfo->dr_photo }}"
                                            class="avatar avatar-xl avatar-rounded mt-2 admin_picture" />
                                        <div class="mt-3">
                                            <input type="file" name="admin-image" id="admin-image"
                                                style="opacity: 0;height: 1px; display: none;">
                                            <a href="javascript:void(0)" class="btn btn-primary"
                                                id="change-picture-btn">Changer photo de profil</a>
                                        </div>
                                        {{-- <small>Pour de meilleurs résultats, utilisez une image d'au moins 128 pixels sur
                                            128 pixels au format .jpg</small> --}}
                                    </div>
                                </div>
                            </div>

                            <form action="{{ route('update-doctor') }}" method="post">

                                @csrf

                                <div class="results">
                                    @if (Session::get('success'))
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                            <div class="alert-message">
                                                {{ Session::get('success') }}
                                            </div>
                                        </div>
                                    @endif
                                    @if (Session::get('fail'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                            <div class="alert-message">
                                                {{ Session::get('fail') }}
                                            </div>
                                        </div>
                                    @endif
                                    @if (Session::get('info'))
                                        <div class="alert alert-info alert-dismissible" role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                            <div class="alert-message">
                                                {{ Session::get('info') }}
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <input type="hidden" value="{{ $LoggedDoctorInfo->dr_id }}" name="dr_id">
                                        <label class="form-label" for="inputFirstName">Nom</label>
                                        <input type="text" class="form-control" name="dr_firstname"
                                            value="{{ $LoggedDoctorInfo->dr_firstname }}" id="inputFirstName"
                                            placeholder="Entrez votre nom">
                                        <span class="text-danger">
                                            @error('dr_firstname')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="inputLastName">Prénom</label>
                                        <input type="text" class="form-control" name="dr_lastname"
                                            value="{{ $LoggedDoctorInfo->dr_lastname }}" id="inputLastName"
                                            placeholder="Entrez votre prénom">
                                        <span class="text-danger">
                                            @error('dr_lastname')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="inputFirstName">Nom d'utilisateur</label>
                                        <input type="text" class="form-control" name="dr_username"
                                            value="{{ $LoggedDoctorInfo->dr_username }}" id="inputFirstName"
                                            placeholder="Votre nom d'utilisateur">
                                        <span class="text-danger">
                                            @error('dr_username')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="inputLastName">Email</label>
                                        <input type="email" class="form-control" name="dr_email"
                                            value="{{ $LoggedDoctorInfo->dr_email }}" id="inputLastName"
                                            placeholder="name@example.com">
                                        <span class="text-danger">
                                            @error('dr_email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label" for="inputFirstName">Numéro telephone</label>
                                        <input type="text" class="form-control" name="dr_telephone"
                                            value="{{ $LoggedDoctorInfo->dr_telephone }}" id="inputFirstName"
                                            placeholder="Votre numéro du telephone">
                                        <span class="text-danger">
                                            @error('dr_telephone')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label" for="inputFirstName">date de naissance</label>
                                        <input type="date" class="form-control" name="dr_birthday"
                                            value="{{ $LoggedDoctorInfo->dr_birthday }}" id="inputFirstName">
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label" for="inputLastName">Sex</label>
                                        <select id="inputState" class="form-control" name="dr_gender">
                                            <option>{{ $LoggedDoctorInfo->dr_gender }}</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="inputLastName">Wilaya</label>
                                        <select name="dr_wilaya" class="form-control" id="wilaya-dd">
                                            <option>{{ $LoggedDoctorInfo->dr_wilaya }}</option>
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
                                            @error('dr_wilaya')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="inputLastName">Ville</label>
                                        <input type="text" class="form-control" name="dr_city"
                                            value="{{ $LoggedDoctorInfo->dr_city }}" id="inputFirstName"
                                            placeholder="Votre ville">
                                        <span class="text-danger">
                                            @error('dr_city')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="inputFirstName">Adresse</label>
                                        <input type="text" class="form-control" name="dr_adress"
                                            value="{{ $LoggedDoctorInfo->dr_adress }}" id="inputFirstName"
                                            placeholder="Votre Adresse">
                                        <span class="text-danger">
                                            @error('dr_adress')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="inputLastName">Spécialité</label>
                                        <select id="inputState" class="form-control" name="dr_speciality">
                                            <option>{{ $LoggedDoctorInfo->dr_speciality }}</option>
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
                                            @error('dr_speciality')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-4 col-md-6">
                                        <label class="form-label" for="inputFirstName">Département</label>
                                        <input type="text" class="form-control" name="dr_department"
                                            value="{{ $LoggedDoctorInfo->dr_department }}" id="inputFirstName"
                                            placeholder="Votre Département/Clinique">
                                        <span class="text-danger">
                                            @error('dr_department')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="inputFirstName">Service</label>
                                        <input type="text" class="form-control" name="dr_service"
                                            value="{{ $LoggedDoctorInfo->dr_service }}" id="inputFirstName"
                                            placeholder="Votre Service">
                                        <span class="text-danger">
                                            @error('dr_service')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Sauvegarder</button>
                            </form>

                        </div>
                    </div>

                </div>

                {{-- Password  Tab --}}
                <div class="tab-pane fade {{ $activeTab=='password' ? 'show active' : '' }}" id="password" role="tabpane2">
                    <div class="card">
                        <div class="card-body">
                            {{-- <h5 class="card-title">Password</h5> --}}

                            <form action="{{ route('update-password') }}" method="post">

                                @csrf

                                <div class="results">
                                    @if (Session::get('success'))
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                            <div class="alert-message">
                                                {{ Session::get('success') }}
                                            </div>
                                        </div>
                                    @endif
                                    @if (Session::get('fail'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                            <div class="alert-message">
                                                {{ Session::get('fail') }}
                                            </div>
                                        </div>
                                    @endif
                                    @if (Session::get('info'))
                                        <div class="alert alert-info alert-dismissible" role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                            <div class="alert-message">
                                                {{ Session::get('info') }}
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="inputPasswordCurrent">Mot de passe actuel</label>
                                    <input type="password" name="dr_password" class="form-control"
                                        id="inputPasswordCurrent">
                                    <span class="text-danger">
                                        @error('dr_password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="inputPasswordNew">Nouveau mot de passe</label>
                                    <input type="password" name="new_password" class="form-control"
                                        id="inputPasswordNew">
                                    <span class="text-danger">
                                        @error('new_password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="inputPasswordNew2">Confirmez le mot de passe</label>
                                    <input type="password" name="confirm_password" class="form-control"
                                        id="inputPasswordNew2">
                                    <span class="text-danger">
                                        @error('confirm_password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <button type="submit" class="btn btn-primary">Sauvegarder</button>
                            </form>

                        </div>
                    </div>
                </div>

                {{-- online-appointment  Tab --}}
                <div class="tab-pane fade {{ $activeTab=='online-appointment' ? 'show active' : '' }}" id="online-appointment" role="tabpane3">
                    <div class="card">
                        <div class="card-body">
                            {{-- <h5 class="card-title">settings</h5> --}}

                            <form action="{{ route('active-online-appointment') }}" method="post">
                                @csrf

                                <div class="results">
                                    @if (Session::get('success'))
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                            <div class="alert-message">
                                                {{ Session::get('success') }}
                                            </div>
                                        </div>
                                    @endif
                                    @if (Session::get('fail'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                            <div class="alert-message">
                                                {{ Session::get('fail') }}
                                            </div>
                                        </div>
                                    @endif
                                    @if (Session::get('info'))
                                        <div class="alert alert-info alert-dismissible" role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                            <div class="alert-message">
                                                {{ Session::get('info') }}
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <input type="hidden" value="{{ $LoggedDoctorInfo->dr_id }}" name="dr_id">
                                        <label class="form-label" for="inputLastName">Prise de rendez-vous en
                                            ligne</label>
                                        <select id="inputState" class="form-control" name="dr_appointment_active">
                                            @if ($LoggedDoctorInfo->dr_appointment_active == true)
                                                <option>Activer</option>
                                            @else
                                                <option>Desactiver</option>
                                            @endif
                                            <option>Activer</option>
                                            <option>Desactiver</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Sauvegarder</button>
                            </form>

                        </div>
                    </div>
                </div>

                {{-- Delete Account Tab --}}
                <div class="tab-pane fade {{ $activeTab=='delete' ? 'show active' : '' }}" id="delete" role="tabpane4">
                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('delete-doctor-account') }}" method="post">

                                @csrf

                                <div class="results">
                                    @if (Session::get('success'))
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                            <div class="alert-message">
                                                {{ Session::get('success') }}
                                            </div>
                                        </div>
                                    @endif
                                    @if (Session::get('fail'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                            <div class="alert-message">
                                                {{ Session::get('fail') }}
                                            </div>
                                        </div>
                                    @endif
                                    @if (Session::get('info'))
                                        <div class="alert alert-info alert-dismissible" role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                            <div class="alert-message">
                                                {{ Session::get('info') }}
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="mb-3">Supprimer mon compte</h3>
                                        <p><strong>Attention :</strong> Si vous supprimer votre compte vous perdrez toutes
                                            vos
                                            données et accès à notre système</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-2 col-md-5">
                                        <label class="form-label" for="inputPasswordCurrent">Mot de passe</label>
                                        <input type="password" class="form-control" id="inputPasswordCurrent"
                                            name="dr_password">
                                        <span class="text-danger">
                                            @error('dr_password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-5">
                                        <label class="form-label" for="inputPasswordNew2">Confirmez le mot de
                                            passe</label>
                                        <input type="password" class="form-control" id="inputPasswordNew2"
                                            name="confirm_password">
                                        <span class="text-danger">
                                            @error('confirm_password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Supprimer le compte</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
