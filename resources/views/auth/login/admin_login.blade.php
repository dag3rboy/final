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
    <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <!-- Box Icons  -->
    <link href='vendor/boxicons/css/boxicons.min.css' rel='stylesheet'>
    <!-- Swiper -->
    <link rel="stylesheet" href="vendor/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/main_style.css">
    <link rel="stylesheet" href="assets/css/login_style.css">
</head>

<body>



    <!-- start login form section  -->
    <section class="login-admin">

        <div class="login-admin-container">

            <div class="content">
                <form action="{{ route('auth.login.check-admin') }}" method="post">

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

                    <div class="avatar">
                        <img src="assets/img/user.png" alt="">
                    </div>
                    <h3>Admin <span>Login</span></h3>
                    <span>Nom d'utilisateur</span>
                    <input type="text" name="username" value="{{ old('username') }}" placeholder="Votre nom d'utilisateur">
                    <span class="text-danger">
                        @error('username')
                            {{ $message }}
                        @enderror
                    </span>
                    <span>Mot de passe</span>
                    <input type="password" name="password"  placeholder="Votre mot de passe">
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                    <input type="submit" name="submit" value="Connexion" class="btn-login-admin">
                    <a href="forgot-password/admin" >Mot de passe oublié ?</a>
                </form>
            </div>
        </div>

    </section>
    <!-- end login form section  -->


    <!-- custom javascript file-->
    <script src="assets/js/main.js"></script>
</body>

</html>