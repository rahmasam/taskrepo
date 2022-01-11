<!DOCTYPE html>
<html>
<head>
	<title> PHP</title>
</head>
<body>


<body>


		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="quiz-form">
            	title<input type="text" name="title" id="title"  /><br>
               content <input type="text" name="content" id="content"  /><br>
               Date <input type="text" name="content" id="date"  /><br>
            	<input type="submit" name="submit" id="submit" value="Submit" />
		</form>
        <?php

// if (isset($_POST['submit'])) {
//     $title = $_POST['title'];
//     $content=$_POST['content'];
    
//     if (empty($title)){
        
//     echo 'please enter title';
//     }
//     elseif (empty($content)) {
//         # code...
//         echo 'please enter your content';

//     }
//     elseif (strlen($content)<=10) {
//         # code...
//         echo 'length must be >10';
//     }
// }
//another answer
if($_SERVER['REQUEST_METHOD']=='POST'){
    $title=$_POST['title'];
    $content=$_POST['content'];
    $errors=[];
    if (empty($title)) {
        $errors['title']='please enter title';
    }
    elseif (empty($content)) {
        $errors['content']='please enter content';
    }
    elseif (strlen($content)<=10) {
        $errors['content length']='must be >10';
        # code...
    }
    if (count($errors)>0) {
        foreach ($errors as $key => $value) {
            echo $key.':'.$value;

        }
    }else {
        echo 'valid data';
    }
}

	
?>

	
	
</body>
</html>