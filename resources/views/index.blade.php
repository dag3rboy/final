<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mouaidy: Online Appointment System</title>
    <meta name="description" content="Mouaidy: Online Appointment System">
    <meta name="keywords" content="Appointment, Doctor, Patient">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/main_style.css">
    <!-- fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link href='vendor/font-awesome-pro-5/css/all.min.css' rel='stylesheet'> --}}
    <!-- Box Icons  -->
    <link href='vendor/boxicons/css/boxicons.min.css' rel='stylesheet'>
    <!-- Swiper -->
    <link rel="stylesheet" href="vendor/swiper/swiper-bundle.min.css" />
    <!-- AOS Animation -->
    <link rel="stylesheet" href="vendor/aos/dist/aos.css" />

</head>

<body>


    <!-- start header section  -->
    <header class="header">

        <a href="#" class="logo"><img src="assets/img/logo.png" alt="logo"> <span>M</span>ouaidy</a>

        <nav class="navbar">
            <ul>
                <li><a class="active" href="/" id="home">Accueil</a></li>
                <li><a href="doctors" id="doctors">Docteurs</a></li>
                <li><a href="specialites" id="specialites">Spécialités</a></li>
                <li><a href="contact-us" id="contact">Contact</a></li>
            </ul>
        </nav>

        <div class="icons">
            <button class="btn-login" id="btn-login">Connexion</button>
            <button class="btn-sign-up" id="btn-inscription">S'inscrire</button>
            <div class="bx bx-user" id="login-btn"></div>
            <div class="bx bx-menu" id="menu-btn"></div>
        </div>

        <nav class="navbar-mobile">
            <li><a class="active" href="/" id="home">Accueil</a></li>
            <li><a href="doctors" id="doctors">Docteurs</a></li>
            <li><a href="specialites" id="specialites">Spécialités</a></li>
            <li><a href="contact-us" id="contact">Contact</a></li>
        </nav>

        <div class="login-sub-menu">
            <a href="patient-login">Patient</a>
            <a href="doctor-login">Docteur</a>
            <a href="assistant-login">Assistant</a>
        </div>

        <div class="inscription-sub-menu">
            <a href="patient-register">Patient</a>
            <a href="doctor-register">Docteur</a>
        </div>

        <div class="login-register-mobile-menu">
            <label for="">Connexion</label>
            <a href="patient-login">Patient</a>
            <a href="doctor-login">Docteur</a>
            <a href="assistant-login">Assistant</a>
            <label for="">Inscription</label>
            <a href="patient-register">Patient</a>
            <a href="doctor-register">Docteur</a>
        </div>


    </header>
    <!-- end header section  -->

    <!-- start home section  -->
    <section class="home" id="home">

        <div class="content">
            <h3>Bienvenue à <span>Mouaidy</span></h3>
            <h4>Système de rendez-vous en ligne</h4>
            <p> Mouaidy est un système gratuit de gestion des rendez-vous chez les Docteurs. Il est caractérisé
                par sa simplicité
                et son efficacité d'utilisation.
            </p>
            <a href="doctors" class="btn-make-appointment">Prendre un rendez-vous</a>
        </div>

    </section>
    <!-- end home section  -->

    <!-- start search doctors section  -->
    <section class="search-doctors" id="search-doctors" data-aos="fade-left">

        <h3 class="heading">Trouver votre <span>médecin</span></h3>
        <p class="sub-heading">Recherche personnalisée d'un médecin</p>

        <div class="search-container">

            <form action="{{ route('index-search-doctor') }}" method="post">

                @csrf

                <div class="form-div d-input">
                    <label for="">Nom</label>
                    <input type="text" name="dr_name" class="form-input" placeholder=" Non de Docteur">
                </div>

                <div class="form-div d-input">
                    <label for="">Spécialité</label>
                    <select name="dr_specialite" id="" class="form-select">
                        {{-- <option value="" disabled selected>Choisir la spécialité</option> --}}
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
                        <option value='Maladies et Chirurgie CardioVasculaire'>Maladies et Chirurgie CardioVasculaire
                        </option>
                        <option value='Médecin Biologiste Laboratoire'>Médecin Biologiste Laboratoire</option>
                        <option value='Médecin du sport'>Médecin du sport</option>
                        <option value='Médecin du travail'>Médecin du travail</option>
                        <option value='Médecin géneraliste'>Médecin géneraliste</option>
                        <option value='Médecin interniste'>Médecin interniste</option>
                        <option value='Médecin légiste'>Médecin légiste</option>
                        <option value='Médecin nucléaire'>Médecin nucléaire</option>
                        <option value='Médecin physique et de réadaptation'>Médecin physique et de réadaptation
                        </option>
                        <option value='Médecin spécialiste de la fertilité'>Médecin spécialiste de la fertilité
                        </option>
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
                </div>

                <div class="form-div d-input">
                    <label for="">Wilaya</label>
                    <select name="dr_wilaya" id="" class="form-select">
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

                </div>

                <div class="form-div d-input">
                    <label for="" id="hidden-label">Send</label>
                    <input type="submit" name="serach-doctor" value="Recherche" class="btn-search-doctor">
                </div>

            </form>
        </div>

    </section>
    <!-- end search doctors section  -->

    <!-- start our doctors section  -->
    <section class="our-doctors" id="our-doctors">

        <h3 class="heading">Nos <span>Docteurs</span></h3>
        <p class="sub-heading">Découvrez nos docteurs</p>

        <div class="doctors-container swiper swiper-container doctorsSwiper ">

            <div class="swiper-wrapper">

                @forelse ($doctors as $doctor)
                    <div class="doctor-card swiper-slide" data-aos="flip-left">
                        <div class="top-bar"></div>
                        <div class="image">
                            <img src="/users-images/doctors/{{ $doctor->dr_photo }}" alt="">
                        </div>
                        <div class="infos">
                            <div class="doc-infos">
                                <h3>Dr.{{ $doctor->dr_firstname }} {{ $doctor->dr_lastname }}</h3>
                                <h4>{{ $doctor->dr_speciality }}</h4>
                            </div>
                            <div class="spe-image">
                                <img src="assets/img/spe/Cardiology_HH.svg" alt="">
                            </div>
                            <div class="reviwes">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <div class="btn-div">
                            <a href="doctor-details/{{ $doctor->dr_id }}">Afficher Profile</a>
                        </div>
                    </div>
                @empty
                    <td>Aucun doctor trouvé</td>
                @endforelse

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>

    </section>
    <!-- end our doctors section  -->

    <!-- start about section  -->
    <section class="about" id="about" data-aos="zoom-in-up">

        <h3 class="heading">À PROPOS DE NOUS</h3>
        <p class="sub-heading">Qui nous sommes?</p>

        <div class="about-container">

            <div class="image">
                <img src="assets/img/about.png" alt="about us image">
            </div>

            <div class="content">
                <h3>A propos de Mouaidy</h3>
                <p>Mouaidy est un système gratuit de gestion des rendez-vous chez les médecins. Il est caractérisé par
                    sa simplicité et son efficacité d'utilisation.
                </p>
                <p>Avec Mouaidy tu peux Trouvez un médecin, un dentiste ou une clinique près de chez vous gratuitement
                </p>
                <p>Choisissez la date et l’heure qui vous convient le mieux et prenez un rendez-vous médical n'importe
                    quand n'importe où en
                    Algérie et Recevez des rappels de rendez-vous automatiques</p>
                <p>La sécurité et la confidentialité de vos données est notre priorité.</p>
            </div>

        </div>
    </section>
    <!-- end about section  -->

    <!-- start services section  -->
    <section class="services" id="services" data-aos="fade-right">

        <h3 class="heading">Nos <span>Services</span></h3>
        <p class="sub-heading">Découvrez nos services</p>

        <div class="box-container">

            <div class="box" data-aos="flip-up">
                <img src="assets/img/services/magnifier.png" alt="">
                <h3>Rechercher</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>

            <div class="box" data-aos="flip-up">
                <img src="assets/img/services/calendar2.png" alt="">
                <h3>Réserver</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>

            <div class="box" data-aos="flip-up">
                <img src="assets/img/services/24-hours.png" alt="">
                <h3>24/7 service</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>

            <div class="box" data-aos="flip-up">
                <img src="assets/img/services/tax-free.png" alt="">
                <h3>Gratuit</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>

            <div class="box" data-aos="flip-up">
                <img src="assets/img/services/sms.png" alt="">
                <h3>Notification (SMS)</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>

            <div class="box" data-aos="flip-up">
                <img src="assets/img/services/wish-list.png" alt="">
                <h3>Favoris</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>

        </div>
    </section>
    <!-- end services section  -->

    <!-- start statistics section  -->
    <section class="statistics" id="statistics">

        <div class="statistics-container">

            <div class="statistics-box">
                <img src="assets/img/patient.png" alt="">
                <h3>{{ $patients_count }}</h3>
                <p>Patients</p>
            </div>

            <div class="statistics-box">
                <img src="assets/img/doctor-outline.png" alt="">
                <h3 id="second-h3"> {{ $doctors_count }}</h3>
                <p>Médecines</p>
            </div>

            <div class="statistics-box">
                <img src="assets/img/stethoscope-outline.png" alt="">
                <h3>{{ $specialities_count }}</h3>
                <p>Spécialités</p>
            </div>

            <div class="statistics-box">
                <img src="assets/img/calendar.png" alt="">
                <h3 id="last-h3">{{ $appointemnts_count }}</h3>
                <p>Rendez-Vous</p>
            </div>

        </div>

    </section>
    <!-- end statistics section  -->

    <!--start testimonial section-->
    <section class="testimonial" id="testimonial" data-aos="fade-left">

        <h3 class="heading">TÉMOIGNAGES</h3>
        <p class="sub-heading">Ce que disent nos clients</p>

        <div class="testimonial-box-container">

            <div class="testimonial-box" data-aos="flip-up">
                <div class="top-box">
                    <div class="profile">
                        <div class="profile-img">
                            <img src="assets/img/testimonials/pic-1.png" alt="">
                        </div>
                        <div class="name-user">
                            <strong>Ilyes Younes</strong>
                            <div class="reviwes">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="client-comment">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Ipsam, id? Nihil possimus laudantium impedit commodi beatae
                        veritatis dolorum dignissimos exercitationem officiis ex
                    </p>
                </div>
            </div>

            <!-- box-2 -->
            <div class="testimonial-box" data-aos="flip-up">
                <!-- top box -->
                <div class="top-box">
                    <div class="profile">
                        <div class="profile-img">
                            <img src="assets/img/testimonials/pic-2.png" alt="">
                        </div>
                        <div class="name-user">
                            <strong>Younes Sara</strong>
                            {{-- <span>Student</span> --}}
                            <div class="reviwes">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="client-comment">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Ipsam, id? Nihil possimus laudantium impedit commodi beatae
                        veritatis dolorum dignissimos exercitationem officiis ex
                    </p>
                </div>
            </div>

            <!-- box-3 -->
            <div class="testimonial-box" data-aos="flip-up">
                <div class="top-box">
                    <div class="profile">
                        <div class="profile-img">
                            <img src="assets/img/testimonials/pic-3.png" alt="">
                        </div>
                        <div class="name-user">
                            <strong>Boukarma Sohaib</strong>
                            <div class="reviwes">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="client-comment">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Ipsam, id? Nihil possimus laudantium impedit commodi beatae
                        veritatis dolorum dignissimos exercitationem officiis ex
                    </p>
                </div>
            </div>

            <!-- box-4 -->
            <div class="testimonial-box" data-aos="flip-up">
                <div class="top-box">
                    <div class="profile">
                        <div class="profile-img">
                            <img src="assets/img/testimonials/pic-4.png" alt="">
                        </div>
                        <div class="name-user">
                            <strong>Bouden Salah</strong>
                            <div class="reviwes">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="client-comment">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Ipsam, id? Nihil possimus laudantium impedit commodi beatae
                        veritatis dolorum dignissimos exercitationem officiis ex
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- end testimonial section-->

    <!-- start contact section  -->
    <section class="contact" id="contact" data-aos="fade-up">

        <h3 class="heading">NOUS CONTACTER</h3>
        <p class="sub-heading">Nous aimerions recevoir de vos nouvelles</p>

        <div class="contact-container">

            <div class="contact-infos">

                <div class="infos-box">
                    <div class="icon">
                        <img src="assets/img/phone-call.png" alt="">
                    </div>
                    <div class="content">
                        <h3>APPELEZ-NOUS</h3>
                        <p>+970-438-3258</p>
                    </div>
                </div>

                <div class="infos-box">
                    <div class="icon">
                        <img src="assets/img/open-mail.png" alt="">
                    </div>
                    <div class="content">
                        <h3>ENVOYEZ-NOUS UN EMAIL</h3>
                        <p>Your_malil@gmail.com</p>
                    </div>
                </div>

                <div class="infos-box">
                    <div class="icon">
                        <img src="assets/img/location.png" alt="">
                    </div>
                    <div class="content" id="last-div">
                        <h3>RENDEZ NOUS VISITE</h3>
                        <p>12 New york, USA</p>
                    </div>
                </div>

            </div>

            <div class="contact-form">
                <div class="form-image" data-aos="fade-left">
                    <img src="assets/img/svg/get-in-touch-cuate-blue.svg" alt="">
                </div>
                <div class="form-content" data-aos="fade-right">
                    {{-- <h3>Contactez-nous</h3> --}}
                    <div class="form-content" data-aos="fade-right">
                        <h3>Contactez-nous</h3>
                        <form action="{{ route('contactAdmin') }}" method="post">

                            @csrf

                            <div class="results">
                                @if (Session::get('fail'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('fail') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-inline">
                                <div class="input-div">
                                    <input type="text" name="name" placeholder="Entrez votre nom">
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="input-div">
                                    <input type="text" name="subject" placeholder="Entrez votre sujet">
                                    <span class="text-danger">
                                        @error('subject')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="input-div">
                                <input type="email" name="email" placeholder="Entrez votre email">
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="input-div">
                                <textarea name="message" cols="30" rows="5" placeholder="Votre message"></textarea>
                                <span class="text-danger">
                                    @error('message')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <input class="btn-send" type="submit" name="contact" value="Envoyer">

                        </form>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <!-- end contact section  -->

    <!-- start footer section -->
    <footer>

        <section class="footer-container">

            <div class="infos">
                <a href="/" class="logo">
                    <img src="assets/img/logo.png" alt="Logo">
                    <h3>Mouaidy</h3>
                </a>
                <p>Mouaidy est un système gratuit de gestion des rendez-vous chez les Docteurs.
                    Il est caractérisé par sa simplicité et son efficacité d'utilisation.</p>

                <div class="join-newsletter">
                    <h3>Rejoignez notre newsletter</h3>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="div-input-newsletter">
                            <input type="email" name="email" placeholder="Enter votre email" required>
                            <button type="submit" name="subscribe" class="btn-join">S'abonner</button>
                        </div>
                    </form>
                </div>

                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>

            </div>
            <div class="f-services">
                <h3>Services</h3>
                <ul>
                    <li><a href="#">Spécialités</a></li>
                    <li><a href="#">A propos</a></li>
                    <li><a href="#">Contacer Nous</a></li>
                    <li><a href="#">Conditions générales</a></li>
                    <li><a href="#">Politique de confidentialité</a></li>
                </ul>
            </div>
            <div class="pages">
                <h3>Pages</h3>
                <ul>
                    <li><a href="#">Coronavirus (COVID-19)</a></li>
                    <li><a href="#">Conditions générales</a></li>
                    <li><a href="#">Clinique al farabi</a></li>
                    <li><a href="#">Clinique abu al qassim</a></li>
                    <li><a href="#">Cardiologue à Alger</a></li>
                </ul>
            </div>

        </section>

        <div class="divider"></div>

        <section class="copyrights">
            <div class="company-name">
                <span>© Copyright <strong> Mouaidy.</strong> All Rights Reserved.</span>
            </div>
        </section>
    </footer>
    <!-- end footer section -->



    <!-- back to top button  -->
    <a href="#" class="back-to-top"><i class='bx bx-up-arrow-alt'></i></a>


    <!-- swiper js -->
    <script src="vendor/swiper/swiper-bundle.min.js"></script>
    <!-- aos animation on scroll  -->
    <script src="vendor/aos/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 700,
        });
    </script>
    <!-- custom javascript file-->
    <script src="assets/js/main.js"></script>


    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".doctorsSwiper", {
            cssMode: true,
            slidesPerView: 4,
            spaceBetween: 10,
            // Responsive breakpoints
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                // when window width is >= 576px
                576: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                // when window width is >= 768px
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                // when window width is >= 992px
                992: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
                // when window width is >= 1024px
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 40
                },
                // when window width is >= 1440px
                1300: {
                    slidesPerView: 4,
                    spaceBetween: 40
                },
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
            },
            mousewheel: true,
            keyboard: true,
        });
        // doctors swpier
        // var docSwiper = new Swiper(".doctorsSwiper", {
        //     slidesPerView: 3,
        //     spaceBetween: 50,
        //     pagination: {
        //         el: ".swiper-pagination",
        //         clickable: true,
        //     },
        //     navigation: {
        //         nextEl: ".swiper-button-next",
        //         prevEl: ".swiper-button-prev",
        //     },

        //     breakpoints: {
        //         "@0.00": {
        //             slidesPerView: 1,
        //             spaceBetween: 10,
        //         },
        //         "@0.50": {
        //             slidesPerView: 1,
        //             spaceBetween: 40,
        //         },
        //         "@0.75": {
        //             slidesPerView: 1,
        //             spaceBetween: 40,
        //         },
        //         "@1.00": {
        //             slidesPerView: 2,
        //             spaceBetween: 40,
        //         },
        //         "@1.50": {
        //             slidesPerView: 4,
        //             spaceBetween: 20,
        //         },
        //     },
        // });

        //     var docSwiper = new Swiper(".doctorsSwiper", {
        //     slidesPerView: 1,
        //     spaceBetween: 30,
        //     loop: true,
        //     pagination: {
        //       el: ".swiper-pagination",
        //       clickable: true,
        //     },
        //     navigation: {
        //       nextEl: ".swiper-button-next",
        //       prevEl: ".swiper-button-prev",
        //     },
        //   });

        // var swiper = new Swiper(".mySwiper", {
        //     slidesPerView: 4,
        //     spaceBetween: 30,
        //     pagination: {
        //         el: ".swiper-pagination",
        //         clickable: true,
        //     },
        // });
    </script>
</body>

</html>
