<?php    
$signatureId = $_GET['viewSignature'];
$signatureFileName = $signaturesActions->fetchSignatureFromid($signatureId)
?>

<div class="white border rounded-3 p-3 position-absolute top-50 start-50 ms-5 translate-middle">
    
   <div class="d-flex justify-content-center align-items-center">
<h2 class="text-center fw-bold">Signer</h2>
        <form method="post">
            <button name="close-popup"><h3>X</h3></button>
        </form></div>
    <img src="<?php echo($signatureFileName["file_name"]) ?>" alt="">
  
</div>