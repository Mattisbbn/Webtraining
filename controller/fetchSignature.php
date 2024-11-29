<?php 
require_once(__DIR__ ."/database.php");
class signatureController{

	private $imageData;
	private $path;
	private $fileLocation;
	private $fileName;
	private $user_id;
	private $schedule_id;
	private $pdo;

	public function __construct($pdo){
		$this->pdo = $pdo;
		$this->path = realpath(__DIR__ . '/../uploads') . '/';
		$this->imageData = json_decode(file_get_contents('php://input'), true);
		$this->fileName =  uniqid() . '.png';
		$this->fileLocation = $this->path . $this->fileName;
		$this->user_id = $this->imageData["user_id"];
		$this->schedule_id = $this->imageData["schedule_id"];
		
	}

	private function formatSignatureData(){
		$this->imageData = $this->imageData['imageData'];
		$this->imageData = str_replace('data:image/png;base64,', '', $this->imageData);
		$this->imageData = base64_decode($this->imageData);
		return $this->imageData;
	}

	private function addSignatureToDB(){
		$fileName = "uploads/". $this->fileName;
		$sql = "INSERT INTO signatures (user_id, schedule_id, file_name) VALUES (:user_id,:schedule_id,:file_name)";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':user_id', $this->user_id);
		$stmt->bindParam(':schedule_id', $this->schedule_id);
		$stmt->bindParam(':file_name', $fileName);
		$stmt->execute();
	}

	public function saveSignature(){	
		$formatedImage = $this->formatSignatureData();
		file_put_contents($this->fileLocation, $formatedImage);
		$this->addSignatureToDB();
		header("Location: ./");
	}
}
$signatureController = new signatureController($pdo);
$signatureController->saveSignature();
?>