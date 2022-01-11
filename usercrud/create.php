<!DOCTYPE html>
<html>

<head>
    <title> Blog Module </title>
</head>

<body>


    <body>


        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
            title<input type="text" name="title" id="title" required placeholder="Please enter title of blog " /><br>
            <br>
            content <input type="text" name="content" id="content" required placeholder="Please enter content of blog " style="width:500px; height:100px;" /><br>
            <br>
            Date<input type="date" name="date"  required/><br>
            <br>
            image<input type="file" name="image" /><br>
            <br>
            <input type="submit" name="submit" id="submit" value="Submit" />
        </form>
        <?php
        require 'dbconnection.php';
        


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            require 'validate_data.php';
            if (count($errors) > 0) {
                foreach ($errors as $key => $value) {
                    echo $key . ':' . $value . '<br>';
                }
            }
           
            else {
                
                $sql = "insert into blog(title,content,date,image) values('$title','$content','$date','$finalName')";
                $op = mysqli_query($con, $sql);
                if ($op) {
                    echo 'Raw inserted';
                } else {

                    echo 'Error try again :' . mysqli_error($con);
                }
            }
        }

        ?>

    </body>

</html>