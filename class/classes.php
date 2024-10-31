<?php 
class classes{
    private int $id;
    private string $name;
    private int $studentsNumber;
    private int $classID;


    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
    return $this->id;
    }

    public function classID($classID){
        $this->classID = $classID;
    }

    public function setClassID($classID){
    return $this->classID;
    }

    public function setname($name){
      $this->name = $name;
    }

    public function getname(){
        return $this->name;
    }

    public function setStudentsNumber($studentsNumber){
        $this->studentsNumber = $studentsNumber;
      }
  
      public function getStudentsNumber(){
          return $this->studentsNumber;
      }

}