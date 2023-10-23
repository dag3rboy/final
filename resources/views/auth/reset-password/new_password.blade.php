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
    <!-- Swiper -->
    <link rel="stylesheet" href="assets/css/main_style.css">
    <link rel="stylesheet" href="assets/css/login_style.css">
</head>

<body>

    <?php include 'includes/navbar.php'; ?>

    <section class="reset-password">

        <div class="reset-password-container">

            <div class="image">
                <img src="assets/img/svg/Reset-password-cuate.svg" alt="">
            </div>

            <div class="content">
                <form action="{{ route('resetPassword') }}" method="post">

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

                    <h3>Nouveau mot de passe</h3>
                    <p>Enter votre nouveau mot de passe</p>
                    <input type="password" name="new_password" placeholder="Mot de passe">
                    <span class="text-danger">
                        @error('new_password')
                            {{ $message }}
                        @enderror
                    </span>
                    <input type="password" name="confirm_password" placeholder="Confirmer le mot de passe">
                    <span class="text-danger">
                        @error('confirm_password')
                            {{ $message }}
                        @enderror
                    </span>
                    <input type="hidden" value="{{ $userType }}" name="userType">
                    <input type="hidden" value="{{ $userToken }}" name="userToken">
                    <input type="submit" name="submit" value="Confirmer" class="btn-reset-password">
                </form>
            </div>
        </div>

    </section>



    <!-- custom javascript file-->
    <script src="assets/js/main.js"></script>


</body>

</html>
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
    <!-- Swiper -->
    <link rel="stylesheet" href="assets/css/main_style.css">
    <link rel="stylesheet" href="assets/css/login_style.css">
</head>

<body>

    <?php include 'includes/navbar.php'; ?>

    <section class="reset-password">

        <div class="reset-password-container">

            <div class="image">
                <img src="assets/img/svg/Reset-password-cuate.svg" alt="">
            </div>

            <div class="content">
                <form action="" method="post">
                    <h3>Nouveau mot de passe</h3>
                    <p>Enter votre nouveau mot de passe</p>
                    <input type="password" name="" placeholder="Mot de passe" required>
                    <input type="password" name="" placeholder="Confirmer le mot de passe" required>
                    <input type="submit" name="submit" value="Confirmer" class="btn-reset-password">
                </form>
            </div>
        </div>

    </section>



    <!-- custom javascript file-->
    <script src="assets/js/main.js"></script>


</body>

</html>
