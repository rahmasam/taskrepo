<!-- # TASK .
Build a Blog Module  with following data  
Title   =  [required , string]
Content =  [required,length >50 ch]
Image   =  [required, file]
Then Store data into text file , display blog data ,  stored data can be deleted. -->

<!DOCTYPE html>
<html>
<head>
	<title> Blog Module </title>
</head>
<body>


<body>


		<form action="" method="post" enctype="multipart/form-data">
            	title<input type="text" name="title" id="title" placeholder="Please enter tite of blog " /><br>
               <br>
                content <input type="text" name="content" id="content" placeholder="Please enter content of blog " style="width:500px; height:100px;" /><br>
               <br>
            	image<input type="file" name="image"  /><br>
               <br>
                <input type="submit" name="submit" id="submit" value="Submit" />
		</form>
        <?php


if($_SERVER['REQUEST_METHOD']=='POST'){
    function clean($input){
        $input=trim(strip_tags(stripslashes($input)));
        return $input;
    }
    $title=clean($_POST['title']);
    $content=clean($_POST['content']);
    
    $errors=[];
    

    
    //validate title
    if (empty($title)) {
        $errors['title']='please enter title this is required field';
    }elseif (!is_string($title)) {
        $errors['title type']='title must be string';
    }
    //validate content
    if (empty($content)) {
        $errors['content']='please enter content this is required field';
    }
    elseif (strlen($content)<=50) {
        $errors['content length']='must be >50 char';
        # code...
    }

    //validate image
    if (!empty($_FILES['image']['name'])) {
        # code...
        $imgName = $_FILES['image']['name'];
        $imgTempPath = $_FILES['image']['tmp_name'];
        $imgSize = $_FILES['image']['size'];
        $imgType = $_FILES['image']['type'];
        $imgExtention = strtolower(end(explode(".", $imgName)));
        $allowedExtention = ['png', 'jpg', 'gif'];
        if (in_array($imgExtention, $allowedExtention)) {
            $finalName = rand() . time() . '.' . $imgExtention;
            $disPath = "./uploaded_file/" . $finalName;

            if (move_uploaded_file($imgTempPath, $disPath)) {
                # code...
                echo 'image uploaded'.'<br>';
            } else {
                echo 'error try again'.'<br>';
            }
        } else {
            echo 'Extention not allowed';
        }
    }else {
        $errors['image']='this is required field';
    }
    if (count($errors)>0) {
        foreach ($errors as $key => $value) {
            echo $key.':'.$value .'<br>';

        }
    }else {
        echo 'valid data'.'<br>';
        $file=fopen('text.txt','a')or die('unable to open file');
        $blogModule=time().rand().'|'.$title .'|'.$content .'|'.$finalName ;
        fwrite($file,$blogModule);
        fclose($file);

        $file=fopen('text.txt','r')or die('unable to open file');
        while(!feof($file)){
            $line=fgets($file);
              $data=explode('|',$line);
              if (count($data)>0){
                  echo $line;?>
                  <a href="remove.php?id=<?php echo $data[0]?>">Remove </a> <br>
                  <?php
              }  
             }
         fclose($file) ;   



}
}
	
?>

</body>
</html>