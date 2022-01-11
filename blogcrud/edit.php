<?php

require 'dbConnection.php';

$id = $_GET['id'];

# Check if Id ex ...
$sql = "select * from blog where id = $id ";
$data = mysqli_query($con, $sql);

if (mysqli_num_rows($data) == 1) {
    # fetch data
    $blogdata = mysqli_fetch_assoc($data);
} else {
    $Message = 'Invalid Id ';
    $_SESSION['Message'] = $Message;
    header('Location: index.php');
}



if ($_SERVER['REQUEST_METHOD'] == "POST") {

    require 'validate_data.php';
    if (count($errors) > 0) {
        foreach ($errors as $key => $value) {
            # code...
            echo '* ' . $key . ' : ' . $value . '<br>';
        }
    } else {

        $sql = "update blog set title='$title' , content = '$content', date='$date' ,image='$finalName' where id  = $id";

        $op  = mysqli_query($con, $sql);

        if ($op) {
            $Message = "Raw Updated";
        } else {
            $Message = "Error Try Again " . mysqli_error($con);
        }

        $_SESSION['Message'] = $Message;
        header("Location: index.php");
    }
}

?>



<!DOCTYPE html>
<html>

<head>
    <title> Blog Module </title>
</head>

<body>


    <body>


        <form action="edit.php?id=<?php echo $blogdata['id']; ?>" method="post" enctype="multipart/form-data">
            title<input type="text" name="title" id="title" required value="<?php echo $blogdata['title']; ?>" placeholder="Please enter title of blog " /><br>
            <br>
            content <input type="text" name="content" id="content" required value="<?php echo $blogdata['content']; ?>" placeholder="Please enter content of blog " style="width:500px; height:100px;" /><br>
            <br>
            Date<input type="date" name="date"  required value="<?php echo $blogdata['date']; ?>"/><br>
            <br>
            image<input type="file" name="image" required value="<?php echo $blogdata['image']; ?>"/><br>
            <br>
            <input type="submit" name="submit" id="submit" value="Edit" />
        </form>



</body>

</html>