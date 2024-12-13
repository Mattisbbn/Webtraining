

<form class="d-flex flex-column vh-100 justify-content-center align-items-center" method="post">
<?php require_once("controller/recovery.php") ?>
    <input class="text-center p-2 rounded-3 recovery_inputs" placeholder="Email" name="emailToRecover" type="email">
    <button class="p-2 mt-2 rounded-3 secondary-color text-white" type="submit">Envoyer l'email</button>
</form>