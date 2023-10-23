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
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/main_style.css">
    <link rel="stylesheet" href="assets/css/custom-pages_style.css">

</head>

<body>

    <?php include 'includes/navbar.php'; ?>

    <section class="registration-done">
        <div class="message-container">
            <div class="content">
                <img class="img-registration" src="assets/img/check.png" alt="">
                <h3>Inscription effectuée avec succès</h3>
                <p>Merci pour votre inscription dans notre systéme, vous pouvez maintenant accéder à votre compte</p>
                {{-- {{ $userType = $type }} --}}
                {{-- <p><Strong>{{$type}}</Strong></p>
                @if ($userType == 'patient')
                    <a class="btn-user-login" href="patient-login">Connexion</a>
                @else
                    <a class="btn-user-login" href="doctor-login">Connexion</a>
                @endif --}}
                <a class="btn-back-main" href="/">Retour à la page d'accueil</a>

            </div>
        </div>
    </section>



    <!-- custom javascript file-->
    <script src="assets/js/main.js"></script>


</body>

</html>
