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
    <link rel="stylesheet" href="assets/css/main_style.css">
    <link rel="stylesheet" href="assets/css/inscription_style.css">

</head>

<body>


    <?php include 'includes/navbar.php'; ?>

    <!-- start appointment  section  -->
    <section class="inscription">

        <div class="inscription-container">

            <div class="image">
                <img src="assets/img/svg/Mobile-login-pana.svg" alt="">
            </div>

            <div class="content">

                <h3>Inscription<span> Patient</span></h3>
                <form action="{{ route('auth.register.create-patient') }}" method="post">

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

                    <div class="from-input-inline">
                        <div class="div-input">
                            <label for="non">Nom </label>
                            <input type="text" name="firstname" value="{{ old('firstname') }}"
                                placeholder="Entrez votre nom">
                            <span class="text-danger">
                                @error('firstname')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="div-input">
                            <label for="non">Prénom</label>
                            <input type="text" name="lastname" value="{{ old('lastname') }}"
                                placeholder="Entrez votre prénom">
                            <span class="text-danger">
                                @error('lastname')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="from-input">
                        <div class="div-input">
                            <label for="username">Nom d'utilisateur</label>
                            <input type="text" name="pa_username" placeholder="Votre nom d'utilisateur">
                            <span class="text-danger">
                                @error('pa_username')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="from-input-inline">
                        <div class="div-input">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" value="{{ old('cpassword') }}"
                                placeholder="Votre Mot de passe">
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="div-input">
                            <label for="password">Confirmé mot de passe</label>
                            <input type="password" name="cpassword" value="{{ old('cpassword') }}"
                                placeholder="Confirmé mot de passe">
                            <span class="text-danger">
                                @error('cpassword')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="from-input">
                        <div class="div-input">
                            <label for="non">Email</label>
                            <input type="email" name="pa_email" value="{{ old('email') }}"
                                placeholder="name@example.com">
                            <span class="text-danger">
                                @error('pa_email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="from-input-inline">
                        <div class="div-input">
                            <label for="non">Numéro telephone</label>
                            <input type="text" name="pa_telephone" value="{{ old('telephone') }}"
                                placeholder="Votre numéro du telephone">
                            <span class="text-danger">
                                @error('pa_telephone')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="div-input">
                            <label for="non">Sex</label>
                            <select name="gender" id="">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <input type="submit" name="register" value="S'inscrire" class="btn-register">
                    <div class="deja-inscrie">
                        <label> Vous avez déja inscrié ?</label>
                        <a href="patient-login" class="text-center">Connexion</a>
                    </div>

                </form>
            </div>

        </div>

    </section>
    <!-- end patient register section  -->


    <!-- custom javascript file-->
    <script src="assets/js/main.js"></script>
</body>

</html>
