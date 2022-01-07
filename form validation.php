<!-- Create a form with the following inputs (name, email, password, address, gender, linkedin url) Validate inputs then return message to user . 
* validation rules ... 
name  = [required , string]
email = [required,email]
password = [required,min = 6]
address = [required,length = 10 chars]
gender = [required]
linkedin url = [reuired | url]
Profile image

- then create a profilePage.php to display Student Data .  -->

<!DOCTYPE html>
<html>

<head>
    <title> form validation</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        Name<input type="text" name="name" id="title" required placeholder="Please enter your name" /><br>
        <br>
        Email<input type="text" name="email" id="content" required placeholder="Please enter your email" /><br>
        <br>
        Password<input type="text" name="password" id="content" required placeholder="Please enter your password" /><br>
        <br>
        address<input type="text" name="address" id="content" required placeholder="Please enter your address" /><br>
        <br>
        gender:<input type="text" name="gender" id="content" required placeholder="please enter your gender" /><br>
        <br>
        linkedin url<input type="text" name="url" id="content" required placeholder="Please enter your linkedin url" /><br>
        <br>
        profile image <input type="file" name="image" id="content" /><br>
        <br>
        <input type="submit" name="submit" id="submit" value="Submit" />
    </form>
    <?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        function clean($input)
        {
            $input = strip_tags($input);
            $input = trim($input);
            return $input;
        }
        $name = clean($_POST['name']);
        $email = clean($_POST['email']);
        $password = clean($_POST['password']);
        $address = clean($_POST['address']);
        $gender = clean($_POST['gender']);
        $linkedinUrl = clean($_POST['url']);

        $errors = [];
        //validate name
        if (empty($name)) {
            $errors['Name'] = 'please enter your Name this is required input';
        } elseif (gettype($name) != 'string') {
            $errors['name'] = 'must be strig';
        }
        ///validate email
        if (empty($email)) {
            $errors['email'] = 'please enter email this is required input';
        } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
            $errors['email'] = 'enter email in this form:username@example.com';
        }
        //validate password
        if (empty($password)) {
            $errors['password'] = 'please enter password this is required input';
        } elseif (strlen($password) < 6) {
            $errors['password'] = 'must be min 6';
        }
        //validate address
        if (empty($address)) {
            $errors['address'] = 'please enter address this is required input';
        } elseif (strlen($address) != 10) {
            $errors['address length'] = 'must be 10 chars';
        }
        //validate gender
        if (empty($gender)) {
            $errors['gender'] = 'please enter your gender this is required';
        }
        //validate linkedin url
        if (empty($linkedinUrl)) {
            $errors['linkedin url'] = 'please enter linkedin url this is required input';
        } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
            $errors['linkedin url'] = ' please enter your linkedin url in this form https://www.linkedin.com/user-5hgfdt';
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
                    echo 'image uploaded';
                } else {
                    echo 'error try again';
                }
            } else {
                echo 'Extention not allowed';
            }
        }

        if (count($errors) > 0) {
            foreach ($errors as $key => $value) {
                echo $key . ':' . $value . '<br>';
            }
        } else {
            echo 'valid data ';
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['address'] = $address;
            $_SESSION['gender'] = $gender;
            $_SESSION['url'] = $linkedinUrl;
            $_SESSION['image'] = $finalName;
        }
    }





    ?>



</body>

</html>