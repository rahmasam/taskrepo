<?php
 function clean($input)
 {
     $input = trim(strip_tags(stripslashes($input)));
     return $input;
 }


 

     $title = clean($_POST['title']);
     $content = clean($_POST['content']);
     $date = Clean($_POST['date']);
     $dateParts=explode('-',$date);
     $month=$dateParts[2];
     $day=$dateParts[1];
     $year=$dateParts[0];
     $errors = [];



     //validate title
     if (empty($title)) {
         $errors['title'] = 'please enter title this is required field';
     } elseif (!is_string($title)) {
         $errors['title type'] = 'title must be string';
     }
     //validate content
     if (empty($content)) {
         $errors['content'] = 'please enter content this is required field';
     } elseif (strlen($content) <= 50) {
         $errors['content length'] = 'must be >50 char';
         # code...
     }

     //validate date
     if (empty($date)) {
         $errors['date'] = 'please enter date this is required field';
     }
     elseif (!checkdate($month,$day,$year)) {
         $errors['date format']='please enter date in this format mm/dd/yyyy';
     }
     //validate image
     if(!empty($_FILES['image']['name'])){

         $imgName     = $_FILES['image']['name'];
         $imgTempPath = $_FILES['image']['tmp_name'];
         $imagSize    = $_FILES['image']['size'];
         $imgType     = $_FILES['image']['type'];
      
      
          $imgExtensionDetails = explode('.',$imgName);
          $imgExtension        = strtolower(end($imgExtensionDetails));
      
          $allowedExtensions   = ['png','jpg','gif'];
      
             if(in_array($imgExtension ,$allowedExtensions)){
                 // upload code ..... 
                
              $finalName = rand().time().'.'.$imgExtension;
      
               $disPath = '../uploaded_file/'.$finalName;
                
              if(move_uploaded_file($imgTempPath,$disPath)){
                  echo 'Image Uploaded';
              }else{
                  echo 'Error Try Again';
              }
      
             }else{
                 echo 'Extension Not Allowed';
             }
      
      
         }else{
             $errors['image'] ='Image Field Required';
         }
     

?>