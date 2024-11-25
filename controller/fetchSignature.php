<?php 

	$content = file_get_contents('php://input');
	$folder = "uploads";
	$data = base64_decode($content);
	$file = "uploads/signature" . uniqid() . '.png';
	$success = file_put_contents($file, $data);

	
?>


