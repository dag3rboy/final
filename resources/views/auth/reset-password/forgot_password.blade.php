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
    <link rel="stylesheet" href="../assets/css/main_style.css">
    <link rel="stylesheet" href="../assets/css/login_style.css">
</head>

<body>

    <?php include 'includes/navbar.php'; ?>

    <!-- start reset password form section  -->
    <section class="reset-password">

        <div class="reset-password-container">

            <div class="image">
                <img src="../assets/img/svg/Forgot-password-cuate.svg" alt="">
            </div>

            <div class="content">
                <form action="{{ route('forgotPassord') }}" method="post">
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

                    <h3>Mot de passe oublié?</h3>
                    <p>Entrez simplement votre adresse e-mail ci-dessous et nous vous enverrons un lien pour
                        réinitialiser votre mot de passe!</p>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter votre adresse email" required>
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                    <input type="hidden" value="{{ $userType }}" name="userType">
                    <input type="submit" name="submit" value="Envoyer" class="btn-reset-password">
                    <a href="/">Retour</a>
                </form>
            </div>
        </div>

    </section>
    <!-- end reset password form section  -->

    <!-- custom javascript file-->
    <script src="../assets/js/main.js"></script>
</body>

</html>
