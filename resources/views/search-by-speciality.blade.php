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

    <!-- CSS files -->
    <link rel="stylesheet" href="assets/css/main_style.css">
    <link rel="stylesheet" href="assets/css/doctors_list_style.css">

</head>

<body>

    <?php include 'includes/navbar.php'; ?>


    <!-- start doctors section  -->
    <section class="doctors" id="doctors">

        <div class="box-container">

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
                            <a href="make-appointment/{{ $doctor->dr_id }}" class="btn-rdv">Prendre un RDV </a>
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
                {{ $doctors->links() }}
            @endif
        </div>

    </section>
    <!-- end doctors section  -->

    <?php include 'includes/footer.php'; ?>

    <!-- back to top button  -->
    <a href="#" class="back-to-top"><i class='bx bx-up-arrow-alt'></i></a>

    <!-- custom javascript file-->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/jquery.min.js"></script>


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
