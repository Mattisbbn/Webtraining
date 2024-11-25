<?php 
$data = file_get_contents('php://input');
$data = json_decode($data, true);
$data = $data['imageData'];

function saveSignature($imageData){
	$path = __DIR__ . '/../uploads/';
	$imageData = str_replace('data:image/png;base64,', '', $imageData);
	$imageData = base64_decode($imageData);
	$file = $path . uniqid() . '.png';
	return file_put_contents($file, $imageData);
}

saveSignature($data)

?>