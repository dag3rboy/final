<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
   <!-- Main css -->
   <link rel="stylesheet" href="assets/css/main_style.css">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
   
      <style>
          .container {
              height: 100vh;
              width: 80%;
              display:flex; 
              justify-content:center;
              align-items:center;
              
              
              
          }
          .payment-box {
              padding:30px;
              height:400px;
              margin-left:100px;
              display:flex;
              flex-direction:column;
              justify-content:center;
           
              
              
          }
          .btn {
            padding:10px;
            margin-top:5px;
            width:100%

          }
          img {
            background-size:cover;
            width: 300px;
            height:900px;
          }
       /*   .payment-box .btn {
            width:350px;
          
          }*/
          
      </style>
  </head>
  <body>
  <header class="header">

<a href="#" class="logo"><img src="assets/img/logo.png" alt="logo"> <span>M</span>ouaidy</a>

<nav class="navbar">
    <ul>
        <li><a class="active" href="/" id="home">Accueil</a></li>
        <li><a href="doctors" id="doctors">Docteurs</a></li>
        <li><a href="specialites" id="specialites">Spécialités</a></li>
        <li><a href="contact-us" id="contact">Contact</a></li>
    </ul>


<nav class="navbar-mobile">
    <li><a class="active" href="/" id="home">Accueil</a></li>
    <li><a href="doctors" id="doctors">Docteurs</a></li>
    <li><a href="specialites" id="specialites">Spécialités</a></li>
    <li><a href="contact-us" id="contact">Contact</a></li>
</nav>

<div class="login-sub-menu">
    <a href="patient-login">Patient</a>
    <a href="doctor-login">Docteur</a>
    <a href="assistant-login">Assistant</a>
</div>

<div class="inscription-sub-menu">
    <a href="patient-register">Patient</a>
    <a href="doctor-register">Docteur</a>
</div>

<div class="login-register-mobile-menu">
    <label for="">Connexion</label>
    <a href="patient-login">Patient</a>
    <a href="doctor-login">Docteur</a>
    <a href="assistant-login">Assistant</a>
    <label for="">Inscription</label>
    <a href="patient-register">Patient</a>
    <a href="doctor-register">Docteur</a>
</div>


</header>
<!-- end header section  -->
        <div class="container">
        <img src="assets/img/svg/E-Wallet-bro.svg">
            <div class="payment-box shadow">
          
                @if(Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif
                @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
              
                <form action="{{ route('requestpayment') }}" method="POST">
                @csrf    
                <label for="amount" class="form-label">enter the amount</label>    
                <input type="number" class="form-control" name="amount">
                <input type="submit" class="btn btn-primary m2" value="pay with paypal">
                </form>
            </div>    
        
      </div>
      <footer>

        <section class="footer-container">

            <div class="infos">
                <a href="/" class="logo">
                    <img src="assets/img/logo.png" alt="Logo">
                    <h3>Mouaidy</h3>
                </a>
                <p>Mouaidy est un système gratuit de gestion des rendez-vous chez les Docteurs.
                    Il est caractérisé par sa simplicité et son efficacité d'utilisation.</p>

               <div class="join-newsletter">
                    <h3>Rejoignez notre newsletter</h3>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="div-input-newsletter">
                            <input type="email" name="email" placeholder="Enter votre email" required>
                            <button type="submit" name="subscribe" class="btn-join">S'abonner</button>
                        </div>
                    </form>
                </div>

                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>

            </div>
            <div class="f-services">
                <h3>Services</h3>
                <ul>
                    <li><a href="#">Spécialités</a></li>
                    <li><a href="#">A propos</a></li>
                    <li><a href="#">Contacer Nous</a></li>
                    <li><a href="#">Conditions générales</a></li>
                    <li><a href="#">Politique de confidentialité</a></li>
                </ul>
            </div>
            <div class="pages">
                <h3>Pages</h3>
                <ul>
                    <li><a href="#">Coronavirus (COVID-19)</a></li>
                    <li><a href="#">Conditions générales</a></li>
                    <li><a href="#">Clinique al farabi</a></li>
                    <li><a href="#">Clinique abu al qassim</a></li>
                    <li><a href="#">Cardiologue à Alger</a></li>
                </ul>
            </div>

        </section>

        <div class="divider"></div>

        <section class="copyrights">
            <div class="company-name">
                <span>© Copyright <strong> Mouaidy.</strong> All Rights Reserved.</span>
            </div>
        </section>
    </footer>
    <!-- end footer section -->
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
      <script src="https://www.paypal.com/sdk/js?client-id=env('PAYPAL_SANDBOX_CLIENT_ID')"></script>
  </body>
</html>