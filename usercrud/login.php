<?php

require 'dbConnection.php';
require 'helpers.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $email = Clean($_POST['email']);
    $password = Clean($_POST['password']); 

    $errors = [];

    

    # Validate Email
    if (!Validate($email,1)) {
        $errors['Email'] = 'Field Required';
    } elseif (!Validate($email,2)) {
        $errors['Email'] = 'Invalid Email';
    }


    # Validate Password
    if (!Validate($password,1)) {
        $errors['Password'] = 'Field Required';
    } elseif (!Validate($password,3)) {
        $errors['Password'] = 'Length must be >= 6 chars';
    }

    if (count($errors) > 0) {
       
        # Print Errors 
        Errors($errors);

    } else {
        $password = md5($password);

        # store data ......
        $sql = "select * from users where email='$email' and password='$password'";

        $op = mysqli_query($con, $sql);

        if (mysqli_num_rows($op)==1) {
           echo 'login is correct';
           $data=mysqli_fetch_assoc($op); 
            $_SESSION['user']=$data;
            
            header('Location: index.php');


        } else {
           echo 'error';
        }

    
    

       
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>login</h2>


        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

        


            <div class="form-group">
                <label for="exampleInputEmail">Email address</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="email"
                    aria-describedby="emailHelp" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">New Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                    placeholder="Password">
            </div>


            <button type="submit" class="btn btn-primary">login</button>
        </form>



</body>

</html>