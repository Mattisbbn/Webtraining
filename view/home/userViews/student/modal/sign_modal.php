<?php 
$user_id = $currentUser->getUserID();
$schedule_id = $_GET["sign"];
?>

<input id="user_id" value="<?php echo($user_id) ?>" type="hidden">
<input id="schedule_id" value="<?php echo($schedule_id) ?>" type="hidden">

<div class="white border rounded-3 p-3 position-absolute top-50 start-50 ms-5 translate-middle">
    <div class="d-flex justify-content-center">
        <h2 class="text-center fw-bold">Signer</h2>
        <form method="post">
            <button name="close-popup"><h3>X</h3></button>
        </form>
    </div>
    <section id="sign_section">
        <canvas width="500" height="300" id="sign_canvas" class="rounded-4"></canvas>
        <div class="d-flex justify-content-center mt-2 ">
    </div>
</section>

    <div class="d-flex justify-content-center">
        <button id="erase_button">Effacer</button>
        <button id="save_button">Confirmer la signature</button>
    </div>
</div>

<script src="public/script/signature_form.js"></script>