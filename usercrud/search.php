<?php

require 'dbConnection.php';
require 'helpers.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = Clean($_POST['name']);
   
    $errors = [];

    # Validate Name ...
    if (!Validate($name,1)) {
        $errors['Name'] = 'Field Required';
    }

   

    if (count($errors) > 0) {
       
        # Print Errors 
        Errors($errors);

    } else {
        

        # store data ......
        $sql = "select * from users where name like '%$name%' or email like '%$name%'";

        $op = mysqli_query($con, $sql);

        if (mysqli_num_rows($op)>0) {
            
            $data=mysqli_fetch_assoc($op); 
            echo $data['name'].':'.$data['email'];

        } else {
           echo 'Error try Again : ' . mysqli_error($con);
        }

    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>search</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>search</h2>


        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

            <div class="form-group">
                <label for="exampleInputName">search</label>
                <input type="text" class="form-control" id="exampleInputName" name="name" aria-describedby=""
                    placeholder="Enter search key">
            </div>


           


            <button type="submit" class="btn btn-primary">go</button>
        </form>



</body>

</html>