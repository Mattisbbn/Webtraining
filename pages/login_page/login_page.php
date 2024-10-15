<section id="login_section" class="d-flex justify-content-center align-items-center">

    <div class="col-lg-4 col-md-8  col-10 rounded-top-4" id="login_form_header">
        <h1 id="login_title">Webtraining</h1>
    </div>
    <div class=" col-lg-4 col-md-8 col-10 rounded-bottom-4" id="login_form_container">
        <div id="login_choice">

            <div>
                <button class="p-3 login_buttons rounded-start-4 " id="animator_button">
                    <p>Animateur</p>
                </button>

                <button class=" p-3 login_buttons rounded-end-4" id="admin_button">
                    <p>Administrateur</p>
                </button>
            </div>
            <div>
                <button class=" p-3 rounded-4 login_buttons">
                    <p>Étudiant</p>
                </button>
            </div>


        </div>
        <form method="post" action="">

            <div id="login_container">
                <label for="email_input">
                    <p>Email</p>
                </label>
                <input class="rounded-4" name="email" id="email_input" type="email" placeholder="Email" required>


                <label for="password_input">
                    <p>Mot de passe</p>
                </label>
                <input class="rounded-4" name="password" id="password_input" type="password" placeholder="Mot de passe" required>

                <button class="rounded-4" id="submit_login" type="submit">
                    <h4 class="mb-0">Se connecter</h4>
                </button>
            </div>
            <input name="user_type" id="choice_input" type="text" required style="display: none;">
        </form>
    </div>

</section>

<script src="pages/login_page/login_page.js"></script>