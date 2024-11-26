<?php 
$currentUser->getUserID();
$schedule_id = $_GET["sign"];


?>

<div class="white border rounded-3 p-3 position-absolute top-50 start-50 ms-5 translate-middle">
    <div class="d-flex justify-content-center">
        <h2 class="text-center fw-bold">Signer</h2>
        <form method="post">
            <button name="close-popup"><h3>X</h3></button>
        </form>
    </div>
    <section id="sign_section">
        <canvas id="sign_canvas" class="rounded-4"></canvas>
        <div class="d-flex justify-content-center mt-2 ">
    </div>
</section>

    <div class="d-flex justify-content-center">
        <button onclick="clearCanvas()">Effacer</button>
        <button onclick="saveCanvas()">Confirmer la signature</button>
    </div>

</div>

<script src="public/script/signature_form.js"></script>