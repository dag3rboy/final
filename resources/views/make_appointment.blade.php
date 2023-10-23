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
    <link href='../vendor/boxicons/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../assets/css/main_style.css">
    <link rel="stylesheet" href="../assets/css/make_appointment_style.css">
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

    <!-- start appointment  section  -->
    <section class="make-appointment">

        <div class="make-appointment-container">

            <div class="image">
                <img src="../assets/img/svg/Schedule-rafiki.svg" alt="make appointment image">
            </div>
            <div class="content">

                <h3>Prendre rendez-vous</h3>
                <form action="{{ route('makeAppointment') }}" method="post">

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

                    <input type="hidden" name="dr_id" value="{{ $doctor->dr_id }}">
                    <div class="from-input">
                        <div class="div-input">
                            <label for="non">Nom </label>
                            <input type="text" name="ap_patient_firstname" placeholder="Entrez votre nom">
                            <span class="text-danger">
                                @error('ap_patient_firstname')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="div-input">
                            <label for="non">Prénom</label>
                            <input type="text" name="ap_patient_lastname" placeholder="Entrez votre prénom">
                            <span class="text-danger">
                                @error('ap_patient_lastname')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="from-input">
                        <div class="div-input">
                            <label for="non">Date de naissance</label>
                            <input type="date" name="ap_patient_birthday">
                            <span class="text-danger">
                                @error('ap_patient_birthday')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="div-input">
                            <label for="non">Sex</label>
                            <select name="ap_patient_gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <span class="text-danger">
                                @error('ap_patient_gender')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="from-input">
                        <div class="div-input">
                            <label for="non">Email</label>
                            <input type="email" name="ap_patient_email" placeholder="Entrez votre email">
                            <span class="text-danger">
                                @error('ap_patient_email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="div-input">
                            <label for="non">Numéro telephone</label>
                            <input type="text" name="ap_patient_telephone" placeholder="Entrez votre numero telephone">
                            <span class="text-danger">
                                @error('ap_patient_telephone')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="from-input">
                        <div class="div-input">
                            <label for="non">Médecin</label>
                            <input type="text" value="Dr.{{ $doctor->dr_firstname }} {{ $doctor->dr_lastname }}"
                                name="" placeholder="Nom de medecin" disabled>
                        </div>
                        <div class="div-input">
                            <label for="non">Date de rendez-vous</label>
                            {{-- <input type="date" name="ap_appointment_date"> --}}
                            <select name="ap_appointment_date">
                                @foreach ($schedules as $schedule)
                                    @if ($schedule->sc_reserved_places < $schedule->sc_max_patients)
                                        <option value="{{ $schedule->sc_date }}">
                                            {{ $schedule->sc_date }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            <span class="text-danger">
                                @error('ap_appointment_date')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <label for="commentaire">Commentaire (Optionnel)</label>
                    <textarea name="ap_comment" cols="30" rows="2" placeholder="Note au médecin"></textarea>

                    <input type="submit" name="send" value="Confirmer" class="btn-send">

                </form>
            </div>

        </div>

    </section>
    <!-- end appointment section  -->

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


    <!-- custom javascript file-->
    <script src="../assets/js/main.js"></script>

    <script>
        let home = document.querySelector('#home')
        let doctors = document.querySelector('#doctors')
        let specialites = document.querySelector('#specialites')
        let contact = document.querySelector('#contact')

        home.classList.remove('active');
        doctors.classList.remove('active');
        specialites.classList.remove('active');
        contact.classList.remove('active');
    </script>


</body>

</html>
