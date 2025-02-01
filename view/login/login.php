<?php require_once("controller/login.php") ?>

<section class="d-flex justify-content-center align-items-center vh-100 flex-column">
  <div class="col-lg-6 col-xl-4 col-md-8 col-10 rounded-top-4 d-flex align-center justify-content-center secondary-color">
    <h1 class="text-white m-3 fw-bold">Webtraining</h1>
  </div>
  <div
    class="col-lg-6 col-xl-4 col-md-8 col-10 rounded-bottom-4 d-flex primary-color flex-column text-white p-5">
    <div id="login_choice">
      <div class="w-100 d-flex">
        <button class="p-3 text-white m-2px w-100 h-100 login_buttons rounded-start-4 transparent-color" id="animator_button">
          <p>Animateur</p>
        </button>

        <button class="p-3 text-white m-2px w-100 h-100 login_buttons rounded-end-4 transparent-color" id="admin_button">
          <p>Administrateur</p>
        </button>
      </div>
      <div>
        <button class="p-3 text-white m-2px w-100 h-100 login_buttons rounded-4 transparent-color login_buttons">
          <p>Étudiant</p>
        </button>
      </div>
    </div>
    <form method="post">
      <div class="d-flex flex-column mt-4" id="login_container">
        <label class="mb-1 ms-1 for="email_input">
          <p>Email</p>
        </label>
        <input class="rounded-4 p-3 mb-1 transparent-color" autocomplete="current-email" name="email" id="email_input" type="email" placeholder="Email" required />

        <label class="mb-1 ms-1" for="password_input">
          <p>Mot de passe</p>
        </label>
        <input class="rounded-4 p-3  transparent-color" autocomplete="current-password" name="password" id="password_input" type="password" placeholder="Mot de passe" required />
        <a class="mb-4 ms-1" href="recovery">Mot de passe oublié ?</a>
        <button class="rounded-4 p-3 fw-bold text-white primary-color" id="submit_login" type="submit">
          <h4 class="mb-0">Se connecter</h4>
        </button>
      </div>
      <input class="d-none" name="user_type" id="choice_input" type="text" required />
    </form>
  </div>
</section>

<script src="public/script/login.js"></script>