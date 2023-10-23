<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mouaidy: Online Appointment System</title>
    <meta name="description" content="Mouaidy: Online Appointment System">
    <meta name="keywords" content="Appointment, Doctor, Patient">

    <!-- fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Box Icons  -->
    <link href='vendor/boxicons/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/main_style.css">
    <link rel="stylesheet" href="assets/css/inscription_style.css">

</head>

<body>


    <?php include 'includes/navbar.php'; ?>

    <!-- start doctor inscription section  -->
    <section class="inscription">

        <div class="inscription-container">

            <div class="image">
                <img src="assets/img/svg/Sign-up-cuate.svg" alt="">
            </div>
            <div class="content">

                <h3>Inscription<span> Docteur</span></h3>
                <form action="{{ route('auth.register.create-doctor') }}" method="post">

                    @csrf

                    <div class="results">
                        @if (Session::get('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if (Session::get('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail') }}
                            </div>
                        @endif
                        @if (Session::get('info'))
                            <div class="alert alert-info">
                                {{ Session::get('info') }}
                            </div>
                        @endif
                    </div>

                    <div class="from-input-inline">
                        <div class="div-input">
                            <label for="firstname">Nom </label>
                            <input type="text" name="dr_firstname" value="{{ old('dr_firstname') }}"
                                placeholder="Entrez votre nom">
                            <span class="text-danger">
                                @error('dr_firstname')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="div-input">
                            <label for="lastname">Prénom</label>
                            <input type="text" name="dr_lastname" value="{{ old('dr_lastname') }}"
                                placeholder="Entrez votre prénom">
                            <span class="text-danger">
                                @error('dr_lastname')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="from-input-inline">
                        <div class="div-input">
                            <label for="username">Nom d'utilisateur</label>
                            <input type="text" name="dr_username" value="{{ old('dr_username') }}"
                                placeholder="Votre nom d'utilisateur">
                            <span class="text-danger">
                                @error('dr_username')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="div-input">
                            <label for="non">Email</label>
                            <input type="email" name="dr_email" value="{{ old('dr_email') }}"
                                placeholder="name@example.com">
                            <span class="text-danger">
                                @error('dr_email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="from-input-inline">
                        <div class="div-input">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="dr_password" value="{{ old('dr_password') }}"
                                placeholder="Votre Mot de passe">
                            <span class="text-danger">
                                @error('dr_password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="div-input">
                            <label for="cpassword">Confirmé mot de passe</label>
                            <input type="password" name="dr_cpassword" value="{{ old('dr_cpassword') }}"
                                placeholder="Confirmé mot de passe">
                            <span class="text-danger">
                                @error('dr_cpassword')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="from-input-inline">
                        <div class="div-input">
                            <label for="non">Numéro telephone</label>
                            <input type="text" name="dr_telephone" value="{{ old('dr_telephone') }}"
                                placeholder="Votre numéro du telephone">
                            <span class="text-danger">
                                @error('dr_telephone')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="div-input">
                            <label for="non">Spécialité</label>
                            <select name="dr_speciality">
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

                    <div class="from-input-inline">
                        <div class="div-input">
                            <label for="non">Wilaya</label>
                            <select name="dr_wilaya" id="wilaya-dd">
                                {{-- @foreach ($wilayas as $data)
                                    <option value="{{ $data->id }}">
                                        {{ $data->nom }}
                                    </option>
                                @endforeach --}}
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
                        <div class="div-input">
                            <label for="non">Ville</label>
                            {{-- <select name="dr_city" id="city-dd">

                            </select> --}}
                            <input type="text" name="dr_city" value="{{ old('dr_city') }}"
                                placeholder="Votre ville">
                            <span class="text-danger">
                                @error('dr_city')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="from-input-inline">
                        <div class="div-input">
                            <label for="non">Adresse</label>
                            <input type="text" name="dr_address" value="{{ old('dr_address') }}"
                                placeholder="Votre Adresse">
                            <span class="text-danger">
                                @error('dr_address')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="div-input">
                            <label for="non">Sex</label>
                            <select name="dr_gender" id="">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <span class="text-danger">
                                @error('dr_gender')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <input type="submit" name="register" value="S'inscrire" class="btn-register">

                    <div class="deja-inscrie">
                        <label> Vous avez déja inscrié ?</label>
                        <a href="doctor-login" class="text-center">Connexion</a>
                    </div>

                </form>
            </div>

        </div>

    </section>
    <!-- end  doctor inscription section  -->



    <!-- custom javascript file-->
    <script src="assets/js/main.js"></script>
    <script src="ssets/js/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#country-dd').on('change', function() {
                var idCountry = this.value;
                $("#state-dd").html('');
                $.ajax({
                    url: "{{ url('api/fetch-states') }}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#state-dd').html('<option value="">Select State</option>');
                        $.each(result.states, function(key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dd').html('<option value="">Select City</option>');
                    }
                });
            });

            $('#wilaya-dd').on('change', function() {
                var idState = this.value;
                $("#city-dd").html('');
                $.ajax({
                    url: "{{ url('api/fetch-cities') }}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#city-dd').html('<option value="">Select City</option>');
                        $.each(res.cities, function(key, value) {
                            $("#city-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>
