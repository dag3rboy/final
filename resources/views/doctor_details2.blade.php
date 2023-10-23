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

    <!-- Our CSS -->
    {{-- <link rel="stylesheet" href="../assets/css/main_style.css"> --}}
    <link rel="stylesheet" href="../assets/css/doctors_details_style2.css">
</head>

<body>



    <?php include 'includes/navbar.php'; ?>

    <!-- start doctor details section  -->
    <section class="doctor-details" id="doctor-details">

        <div class="doctor-details-container">

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
                    <div class="doctor-infos">
                        <div class="list">
                            <p><i class='bx bxs-city'></i>{{ $doctor->dr_wilaya }}</p>
                            <p><i class='bx bx-location-plus'></i></i>{{ $doctor->dr_city }}</p>
                            <p><i class='bx bx-clinic'></i>{{ $doctor->dr_adress }}</p>
                            <p><i class='bx bx-phone'></i>{{ $doctor->dr_telephone }}</p>

                        </div>
                        <div class="list">
                            <p><i class='bx bx-send'></i>boudjaahcen@gmail.com</p>
                            <p><i class='bx bx-clinic'></i>Les Allées du 20 Aout 1955 21000</p>
                            <p><i class='bx bx-location-plus'></i>www.elshifa.com</p>
                            <p><i class='bx bx-phone'></i>16 annes experience</p>
                        </div>
                    </div>

                    <a class="btn-appointment" href="make-appointment/{{ $doctor->dr_id }}"
                        class="btn-rdv">Prendre un RDV </a>
                </div>

            </div>

            <div class="section-bio">
                <h3>A prospos de moi</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Laboriosam animi laborum fugit possimus ad alias aliquam nulla
                    blanditiis consectetur quaerat, veniam iste dolor voluptas accusamus
                    Laboriosam animi laborum fugit possimus ad alias aliquam nulla
                    sed sequi eius natus quasi.
                </p>
            </div>

            <div class="section-diplomes">
                <h3>Mes diplomes</h3>
                <p><i class='bx bxs-graduation'></i>Diplome en medcein general - Universite De Constantine </p>
                <p><i class='bx bxs-graduation'></i>Diplome en cherigie Ophtalmologie - Universite De Constantine </p>
            </div>

            <div class="section-experience">
                <h3>Experience</h3>
                <p>- 3 annes Service Medecine Interne - Hopital Ain Naaja</p>
                <p>- 5 annes Service Ophtalmologie Interne - Hopital Moustaha Basha</p>
                <p>- 8 annes Privé - Mon Cabinet</p>
            </div>

            <div class="section-equipments">
                <h3>Equipments</h3>
                <p>- Echographie</p>
                <p>- Scanneur Torax</p>
                <p>- Radio scanneur</p>
            </div>

            <div class="section-jours-travail">
                <h3>Jours de travail </h3>
                <div class="box-container">
                    <div class="box">
                        <h5>Samdi</h5>
                        <p>8:00 AM - 16:00 PM</p>
                    </div>
                    <div class="box">
                        <h5>Dimanche</h5>
                        <p>8:00 AM - 16:00 PM</p>
                    </div>
                    <div class="box">
                        <h5>Lundi</h5>
                        <p>8:00 AM - 16:00 PM</p>
                    </div>
                    <div class="box">
                        <h5>Mardi</h5>
                        <p>8:00 AM - 16:00 PM</p>
                    </div>
                    <div class="box">
                        <h5>Mercredi</h5>
                        <p>8:00 AM - 16:00 PM</p>
                    </div>
                    <div class="box">
                        <h5>Jeudi</h5>
                        <p>8:00 AM - 16:00 PM</p>
                    </div>
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

    <?php include 'includes/footer.php'; ?>

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
