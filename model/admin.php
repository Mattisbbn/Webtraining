<?php
require_once("controller/database.php");
class userActions{
    private object $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    private function checkEmailAvailability(string $email){
        $sql = "SELECT users.email FROM users WHERE users.email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($results){
            return false;
        }else{
            return true;
        }
    }

    public function addNewUser(string $email,string $password,string $username,string $role){

        if($this->checkEmailAvailability($email)){
            $sql = "INSERT INTO `users` (`username`, `email`, `password`, `class_id`, `role`) VALUES (:username, :email, :password,NULL,:role)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':role', $role);
            $stmt->execute();
        }else{
            echo("Un compte existe déjà avec cette email.");
        }

    }  

    public function fetchUsers() {
        $sql = "SELECT users.id, users.username, users.email, classes.name AS class_name, users.role 
        FROM users LEFT JOIN classes ON users.class_id = classes.id"; 
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function fetchUsersByRole($pdo,$role){
        $sql = "SELECT id,username,email,role FROM users WHERE role = :role "; 
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':role', $role);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
}
class classActions{

    private object $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addNewClass(string $class){
        $sql = "INSERT INTO `classes` (`id`, `name`) VALUES (NULL, :class)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':class', $class);
        $stmt->execute();
    }

    public function changeClass(int $user_id,int $class_id){
        if ($class_id == "null") {
            $sql = "UPDATE `users` SET `class_id` = NULL WHERE `id` = :userId"; 
        }else{
            $sql = "UPDATE `users` SET `class_id` = :userClass WHERE `id` = :userId"; 
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':userId',$user_id);
        if ($class_id != "null") {
            $stmt->bindParam(':userClass', $class_id);
        }
        $stmt->execute();
    }
}
class subjectsActions{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addNewSubject($subject) {
        $sql = "INSERT INTO `subject` (`id`, `name`) VALUES (NULL, :subject)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':subject', $subject);
        $stmt->execute();
    }

}
class lessonsActions { 

    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function fetchLessons(){
        $sql = "SELECT schedule.id, subject.name, classes.name as class_name, users.username as teacher_name, schedule.start_datetime, schedule.end_datetime, TIMESTAMPDIFF(HOUR, schedule.start_datetime, schedule.end_datetime) as lesson_duration
        FROM schedule
            LEFT JOIN subject on subject.id  = schedule.subject_id
            LEFT JOIN classes on classes.id  = schedule.class_id
            LEFT JOIN users on users.id = schedule.teacher_id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
    }

    public function addNewLesson($subjectOfLesson,$classOfLesson,$teacherOfLesson,$lessonStartDate,$lessonEndDate) {

        $sql = "INSERT INTO schedule (`subject_id`,`class_id`,`teacher_id`,`start_datetime`,`end_datetime`)
                VALUES (:subjectOfLesson,:classOfLesson,:teacherOfLesson,:lessonStartDate,:lessonEndDate)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':subjectOfLesson', $subjectOfLesson);
        $stmt->bindParam(':classOfLesson', $classOfLesson);
        $stmt->bindParam(':teacherOfLesson', $teacherOfLesson);
        $stmt->bindParam(':lessonStartDate', $lessonStartDate);
        $stmt->bindParam(':lessonEndDate', $lessonEndDate);
        $stmt->execute();
        
    }
}
class SignaturesAction{
    private object $pdo;

    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchSignaturesByClass($class) {
        $sql = "SELECT signatures.id, signatures.user_id, signatures.file_name, users.username 
                FROM signatures
                LEFT JOIN users ON users.id = signatures.user_id
                WHERE users.class_id = :classId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['classId' => $class]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function fetchSignatures(){
        $sql = "SELECT signatures.id, signatures.user_id, signatures.file_name, users.username 
                FROM signatures
                LEFT JOIN users ON users.id = signatures.user_id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
    }
    
    function fetchSignatureFromid(int $signatureId){
        $sql ="SELECT signatures.file_name FROM signatures WHERE signatures.id = :signatureId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':signatureId', $signatureId);
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        return $results;
    }
}

