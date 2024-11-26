<?php 
class fetchSignatureImage{
	private $imageData;
	private $path =  __DIR__ . '/../uploads/';
	private $fileName;

	public function __construct(){
		$this->imageData = file_get_contents('php://input');
	}

	private function formatSignatureData(){
		$this->imageData = json_decode($this->imageData, true);
		$this->imageData = $this->imageData['imageData'];
		$this->imageData = str_replace('data:image/png;base64,', '', $this->imageData);
		$this->imageData = base64_decode($this->imageData);
		return $this->imageData;
	}

	public function saveSignature(){
		$formatedImage = $this->formatSignatureData();
		$this->fileName = $this->path. uniqid() . '.png';
		file_put_contents($this->fileName, $formatedImage);
	}

}
$imageSignature = new fetchSignatureImage;
$imageSignature->saveSignature();



// function addSignatureToDb($pdo,$user_id,$schedule_id,$path){
// 	$sql = "INSERT INTO signature (user_id, schedule_id, file_name) VALUES (:user_id,:schedule_id,file_name)";
// 	$stmt = $pdo->prepare($sql);
//     $stmt->bindParam(':user_id', $user_id);
//     $stmt->bindParam(':schedule_id', $schedule_id);
//     $stmt->bindParam(':file_name', $path);
//     $stmt->execute();
// };
?>