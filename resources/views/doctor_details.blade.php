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
    <!-- glightbox -->
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <!-- Box Icons  -->
    <link href='../vendor/boxicons/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../assets/css/main_style.css">
    <link rel="stylesheet" href="../assets/css/doctors_details_style.css">
</head>

<body>



    <!-- start header section  -->
    <header class="header">

        <a href="/" class="logo"><img src="../assets/img/logo.png" alt="logo"> <span>M</span>ouaidy</a>

        <nav class="navbar">
            <ul>
                <li><a class="active" href="/" id="home">Accueil</a></li>
                <li><a href="/doctors" id="doctors">Docteurs</a></li>
                <li><a href="/specialites" id="specialites">Spécialités</a></li>
                <li><a href="/contact-us" id="contact">Contact</a></li>
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
            <li><a href="/doctors" id="doctors">Docteurs</a></li>
            <li><a href="/specialites" id="specialites">Spécialités</a></li>
            <li><a href="/contact-us" id="contact">Contact</a></li>
        </nav>

        <div class="login-sub-menu">
            <a href="/patient-login">Patient</a>
            <a href="/doctor-login">Docteur</a>
            <a href="/assistant-login">Assistant</a>
        </div>

        <div class="inscription-sub-menu">
            <a href="/patient-register">Patient</a>
            <a href="/doctor-register">Docteur</a>
        </div>

        <div class="login-register-mobile-menu">
            <label for="">Connexion</label>
            <a href="/patient-login">Patient</a>
            <a href="/doctor-login">Docteur</a>
            <a href="/assistant-login">Assistant</a>
            <label for="">Inscription</label>
            <a href="/patient-register">Patient</a>
            <a href="/doctor-register">Docteur</a>
        </div>


    </header>
    <!-- end header section  -->

    <!-- start doctor details section  -->
    <section class="doctor-details" id="doctor-details">

        {{-- <div class="make-appointment-container">

            <form action="" method="post">
                <h3>Prendre rendez-vous</h3>

                <div class="form-container">
                    <div class="from-section">

                        <label for="non">Nom</label>
                        <div class="input-div">
                            <input type="text" name="" id="" placeholder="Entrez votre nom ">
                            <div><i class='bx bx-user'></i></div>
                        </div>

                        <label for="prenom">Prénom</label>
                        <div class="input-div">
                            <input type="text" name="" id="" placeholder="Entrez votre prénom">
                            <div><i class='bx bx-user'></i></div>
                        </div>

                        <label for="email">Email</label>
                        <div class="input-div">
                            <input type="email" name="" id="" placeholder="Entrez votre email">
                            <div><i class='bx bx-envelope'></i></i></div>
                        </div>

                        <label for="date-naissance">Date de naissance</label>
                        <div class="input-div">
                            <input type="date" name="" id="" placeholder="Entrez votre date de naissance">
                        </div>

                        <label for="telephone">Numero telephone</label>
                        <div class="input-div">
                            <input type="text" name="" id="" placeholder="Entrez votre numero telephone">
                            <div><i class='bx bx-phone'></i></i></div>
                        </div>
                    </div>

                    <div class="form-section">
                        <label for="non">Sex</label>
                        <div class="input-div">
                            <select name="" id="">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <div><i class='bx bx-male-sign'></i></div>
                        </div>

                        <label for="date-rdv">Date de rendez-vous</label>
                        <div class="input-div">
                            <input type="date" name="" id="">
                        </div>

                        <label for="non">Commentaire</label>
                        <div class="input-div">
                            <textarea name="" id="" cols="30" rows="3" placeholder="Note au médecin"></textarea>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn-send">
                    Confirmer
                </button>
            </form>
        </div> --}}

        <div class="doctor-details-container">

            <div class="profile-header"></div>

            <div class="section-infos">
                <div class="image">
                    @if ($doctor->dr_photo != 'default.png')
                        <img src="../users-images/doctors/{{ $doctor->dr_photo }}" alt="">
                    @else
                        @if ($doctor->dr_gender == 'Male')
                            <img src="../users-images/doctors/doctor-male.png" alt="">
                        @else
                            <img src="../users-images/doctors/doctor-female.png" alt="">
                        @endif
                    @endif
                </div>
                <div class="content">
                    <h3>Dr.{{ $doctor->dr_firstname }} {{ $doctor->dr_lastname }}</h3>
                    <h4>{{ $doctor->dr_speciality }}</h4>
                    <div class="reviwes">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <a class="btn-appointment" href="../make-appointment/{{ $doctor->dr_id }}"
                        class="btn-rdv">Prendre un RDV </a>
                </div>

            </div>

            <div class="section-contact">
                <h3>Contact et Informations</h3>
                <div class="infos">
                    <div class="list">
                        <p><i class='bx bxs-city'></i>{{ $doctor->dr_wilaya }}</p>
                        <p><i class='bx bx-location-plus'></i></i>{{ $doctor->dr_city }}</p>
                        <p><i class='bx bx-clinic'></i>{{ $doctor->dr_adress }}</p>
                    </div>
                    <div class="list">
                        <p><i class='bx bx-phone'></i>{{ $contact_infos->cv_phone }}</p>
                        <p><i class='bx bx-envelope'></i>{{ $contact_infos->cv_email }}</p>
                        <p><i class='bx bx-world'></i>{{ $contact_infos->cv_website }}</p>
                    </div>
                </div>
            </div>

            <div class="section-bio">
                <h3>Présentation</h3>
                <p>{{ $contact_infos->cv_about }}</p>
            </div>

            <div class="section-tarif">
                <h3>Tarifs</h3>
                @forelse ($tarifs as $tarif)
                    <p><i class='bx bxs-dollar-circle'></i>{{ $tarif->cv_tarif }}</p>
                @empty
                    <p></p>
                @endforelse
            </div>

            <div class="section-diplomes">
                <h3>Diplômes et Formations</h3>
                @forelse ($diplomes as $diplome)
                    <p><i class='bx bxs-graduation'></i>{{ $diplome->cv_diplome }}</p>
                @empty
                    <p></p>
                @endforelse
            </div>

            <div class="section-experience">
                <h3>Experiences</h3>
                @forelse ($experiences as $experience)
                    <p>{{ $experience->cv_experience }}</p>
                @empty
                    <p></p>
                @endforelse
            </div>

            <div class="section-equipments">
                <h3>Equipements médicaux</h3>
                @forelse ($equipments as $equipment)
                    <p>{{ $equipment->cv_equipment }}</p>
                @empty
                @endforelse
            </div>

            <div class="section-jours-travail">
                <h3>Horaires</h3>
                <div class="box-container">
                    @forelse ($working_days as $day)
                        <div class="box">
                            <p>{{ $day->cv_working_day }}</p>
                        </div>
                    @empty
                        <p></p>
                    @endforelse
                </div>
            </div>

            <div class="section-lieu-travail">
                <h3>Lieu de travail </h3>
                <div class="map">
                    <iframe class="mb-4 mb-lg-0"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                        frameborder="0" style="border:0; width: 100%; height: 100%;" allowfullscreen></iframe>
                </div>
            </div>

        </div>
    </section>
    <!-- end doctor details section  -->

    <!-- start footer section -->
    <footer>

        <section class="footer-container">

            <div class="infos">
                <a href="/" class="logo">
                    <img src="../assets/img/logo.png" alt="Logo">
                    <h3>Mouaidy</h3>
                </a>
                <p>Mouaidy est un système gratuit de gestion des rendez-vous chez les Docteurs.
                    Il est caractérisé par sa simplicité et son efficacité d'utilisation.</p>

                <div class="join-newsletter">
                    <h3>Rejoignez notre newsletter</h3>
                    <form action="" method="POST">
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

    <!-- custom javascript file-->
    <script src="../assets/js/main.js"></script>

    <script>
        let home = document.querySelector('#home')
        let doctors = document.querySelector('#doctors')
        let specialites = document.querySelector('#specialites')
        let contact = document.querySelector('#contact')

        home.classList.remove('active');
        doctors.classList.toggle('active');
        specialites.classList.remove('active');
        contact.classList.remove('active');
    </script>


</body>

</html>
