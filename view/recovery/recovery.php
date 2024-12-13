<?php require_once("controller/recovery.php") ?>

<form class="d-flex flex-column min-vh-100 justify-content-center align-items-center" method="post">
    <input class="text-center p-2 rounded-3" id="recovery-email-input" placeholder="Email" name="emailToRecover" type="email">
    <button class="p-2 mt-2 rounded-3 secondary-color text-white" type="submit">Envoyer l'email</button>
</form>