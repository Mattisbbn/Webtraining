<?php 
class classes{
    private int $id;
    private string $className;
    private int $studentsNumber;
    // private string $user;


    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
    return $this->id;
    }

    public function setClassName($className){
      $this->className = $className;
    }

    public function getClassName(){
        return $this->className;
    }

    public function setStudentsNumber($studentsNumber){
        $this->studentsNumber = $studentsNumber;
      }
  
      public function getStudentsNumber(){
          return $this->studentsNumber;
      }

}