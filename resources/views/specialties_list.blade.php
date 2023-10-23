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
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <!-- Box Icons  -->
    <link href='vendor/boxicons/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/main_style.css">
    <link rel="stylesheet" href="assets/css/specialites_list_style.css">
</head>

<body>



    <?php include 'includes/navbar.php'; ?>

    <!-- start doctors section  -->
    <section class="doctors" id="doctors">

        <div class="box-container">

            @forelse ($specialites as $specialite)
                <a href="search-by-speciality?speciality={{ $specialite->sp_speciality_name }}">
                    <div class="box">
                        @if ($specialite->sp_speciality_image != 'default.png')
                            <img src="storage/specialties-images/{{ $specialite->sp_speciality_image }}" alt="">
                        @else
                            <img src="specialties-images/default.png" alt="">
                        @endif
                        <h3>{{ $specialite->sp_speciality_name }}</h3>
                    </div>
                </a>
            @empty
                <div></div>
                <div class="empty-stat">
                    <img src="assets/img/svg/search.svg" alt="">
                    <h3>Aucun specialité trouvé!</h3>
                </div>
                <div></div>
            @endforelse

        </div>
    </section>
    <!-- end doctors section  -->

    <?php include 'includes/footer.php'; ?>

    <!-- back to top button  -->
    <a href="#" class="back-to-top"><i class='bx bx-up-arrow-alt'></i></a>


    <!-- custom javascript file-->
    <script src="assets/js/main.js"></script>

    <script>
        let home = document.querySelector('#home')
        let doctors = document.querySelector('#doctors')
        let specialites = document.querySelector('#specialites')
        let contact = document.querySelector('#contact')

        home.classList.remove('active');
        doctors.classList.remove('active');
        specialites.classList.toggle('active');
        contact.classList.remove('active');
    </script>

</body>

</html>
