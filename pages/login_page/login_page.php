<section id="login_section" class="d-flex justify-content-center align-items-center">

    <div class="col-lg-4 col-md-8  col-10" id="login_form_header"><h1 id="login_title">Webtraining</h1> </div>
    <div class=" col-lg-4 col-md-8  col-10" id="login_form_container">
    <div id="login_choice">
                <button><p>Animateur</p></button>
                <div id="login_separation"></div>
                <button><p>Étudiant</p></button>
            </div>
        <form method="post" action="">
         <input name="user_type" id="choice_input" type="text" required style="display: none;">
            <div id="login_container">
                <label for="email_input"><p>Email</p></label>
                <input name="email" id="email_input" type="email" placeholder="Email" required>


                <label for="password_input"><p>Mot de passe</p></label>
                <input name="password" id="password_input" type="password" placeholder="Mot de passe" required>

                <button id="submit_login" type="submit"><h4 class="mb-0">Se connecter</h4></button>
            </div>
        </form>
    </div>
   
</section>

<script src="pages/login_page/login_page.js"></script>