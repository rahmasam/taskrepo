<?php

use student as GlobalStudent;

class users{

    var $name;
    var $email;
    var $password;
   private function __construct($username,$useremail,$userpassword)
    {
             $this->name= $username;
             $this->email =$useremail;
             $this->password=$userpassword;
                  
    }
function getData(){

    echo $this->name;
    echo $this->email;
    echo $this->password;

}
     function Login(){
         // code 
         echo 'Login';
     }

}





class admin extends users {
   

     function ShowStudent(){
         // code ... 
         echo 'ShowStudent';
     }

}



class student extends users{

    var $NID;
    var $phone;
    function __construct($NID,$phone)
    {
        $this->NID=$NID;
        $this->phone=$phone;
    }

     function ShowCourse(){
         // code ... 
     }
}

$student= new Student('ahmed','x@x','xxxxxx','xxxxx','010xxx');
echo $student->getData();


