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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- glightbox -->
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <!-- Box Icons  -->
    <link href='vendor/boxicons/css/boxicons.min.css' rel='stylesheet'>
    <!-- Swiper -->
    <link rel="stylesheet" href="vendor/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/main_style.css">
    <link rel="stylesheet" href="assets/css/login_style.css">
</head>

<body>

    <?php include 'includes/navbar.php' ?>

    <!-- start login form section  -->
    <section class="login-medecin">

        <div class="login-container">

            <div class="image">
                <img src="assets/img/svg/Contraception methods-rafiki.svg" alt="">
            </div>

            <div class="content">
                <form action="{{ route('auth.login.check-assistant') }}" method="post">

                    @csrf

                    <div class="results">

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

                    <h3>Espace <span>Assistant</span></h3>
                    <span>Nom d'utilisateur</span>
                    <input type="text" name="as_username"  value="{{ old('as_username') }}" placeholder="Votre nom d'utilisateur">
                    <span class="text-danger">
                        @error('as_username')
                            {{ $message }}
                        @enderror
                    </span>
                    <span>Mot de passe</span>
                    <input type="password" name="as_password" placeholder="Votre mot de passe">
                    <span class="text-danger">
                        @error('as_password')
                            {{ $message }}
                        @enderror
                    </span>
                    <div class="remember-password">
                        <input type="checkbox" name="" id="" checked>
                        <label for="">Rester connecté</label>
                    </div>
                    <input type="submit" name="submit" value="Connexion" class="btn-login-medecin">
                    {{-- <a href="forgot-password" >Mot de passe oublié ?</a> --}}
                </form>
            </div>
        </div>

    </section>
    <!-- end login form section  -->

    <!-- custom javascript file-->
    <script src="assets/js/main.js"></script>
</body>

</html>