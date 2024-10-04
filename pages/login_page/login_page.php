<section id="login_section" class="d-flex justify-content-center align-items-center">

    <div id="login_form_header"><h1 id="login_title">Webtraining</h1> </div>
    <div id="login_form_container">
    <div id="login_choice">
                <button>Animateur</button>
                <div id="login_separation"></div>
                <button>Étudiant</button>
            </div>
        <form method="post" action="">
         <input name="user_type" id="choice_input" type="text" value="" style="display: none;">
            <div id="login_container">
                <label for="email_input">Email</label>
                <input name="email" id="email_input" type="email" placeholder="Email" required>


                <label for="password_input">Mot de passe</label>
                <input name="password" id="password_input" type="password" placeholder="Mot de passe" required>

                <button id="submit_login" type="submit">Se connecter</button>
            </div>
        </form>
    </div>
   
</section>