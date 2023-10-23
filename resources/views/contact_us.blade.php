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
    <link rel="stylesheet" href="assets/css/contact_us_style.css">
</head>

<body>

    <?php include 'includes/navbar.php'; ?>

    <!-- start contact us section  -->
    <section class="contact" id="contact" data-aos="fade-up">

        {{-- <h3 class="heading">GET IN TOUCH</h3> --}}
        {{-- <p class="sub-heading">We'd love to hear from you</p> --}}

        <div class="contact-container">

            <div class="contact-infos">

                <div class="infos-box">
                    <div class="icon">
                        <img src="assets/img/phone-call.png" alt="">
                    </div>
                    <div class="content">
                        <h3>APPELEZ-NOUS</h3>
                        <p>0674495851</p>
                    </div>
                </div>

                <div class="infos-box">
                    <div class="icon">
                        <img src="assets/img/open-mail.png" alt="">
                    </div>
                    <div class="content">
                        <h3>ENVOYEZ-NOUS UN EMAIL</h3>
                        <p>rdv.doctors@gmail.com</p>
                    </div>
                </div>

                <div class="infos-box">
                    <div class="icon">
                        <img src="assets/img/location.png" alt="">
                    </div>
                    <div class="content" id="last-div">
                        <h3>RENDEZ NOUS VISITE</h3>
                        <p>Skikda</p>
                    </div>
                </div>

            </div>

            <div class="contact-form">
                <div class="form-image" data-aos="fade-left">
                    <img src="assets/img/svg/get-in-touch-cuate-blue.svg" alt="">
                </div>
                <div class="form-content" data-aos="fade-right">
                    <h3>Contactez-nous</h3>
                    <form action="{{ route('contactAdmin') }}" method="post">

                        @csrf

                        <div class="results">
                            @if (Session::get('fail'))
                                <div class="alert alert-danger">
                                    {{ Session::get('fail') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-inline">
                            <div class="input-div">
                                <input type="text" name="name" placeholder="Entrez votre nom">
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="input-div">
                                <input type="text" name="subject" placeholder="Entrez votre sujet">
                                <span class="text-danger">
                                    @error('subject')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="input-div">
                            <input type="email" name="email" placeholder="Entrez votre email">
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="input-div">
                            <textarea name="message" cols="30" rows="5" placeholder="Votre message"></textarea>
                            <span class="text-danger">
                                @error('message')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <input class="btn-send" type="submit" name="contact" value="Envoyer">

                    </form>
                </div>

            </div>


            {{-- <div class="contact-map">
                <iframe class="mb-4 mb-lg-0"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                    frameborder="0" style="border:0; width: 100%; height: 100%;" allowfullscreen></iframe>
            </div> --}}

        </div>

    </section>
    <!-- end contact us section  -->

    <?php include 'includes/footer.php'; ?>


    <!-- custom javascript file-->
    <script src="assets/js/main.js"></script>

    <script>
        let home = document.querySelector('#home')
        let doctors = document.querySelector('#doctors')
        let specialites = document.querySelector('#specialites')
        let contact = document.querySelector('#contact')

        home.classList.remove('active');
        doctors.classList.remove('active');
        specialites.classList.remove('active');
        contact.classList.toggle('active');
    </script>
</body>

</html>
