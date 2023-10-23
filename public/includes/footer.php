<!-- start footer section -->
<footer>

    <section class="footer-container">

        <div class="infos">
            <a href="index.php" class="logo">
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