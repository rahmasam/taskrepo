<!-- Create a form with the following inputs (name, email, password, address,, linkedin url) Validate inputs then return message to user . 
* validation rules ... 
name  = [required , string]
email = [required,email]
password = [required,min = 6]
address = [required,length = 10 chars]
linkedin url = [reuired | url]
* Don't use Filters or regular expressions .  -->
<!DOCTYPE html>
<html>

<head>
    <title> form validation</title>
</head>

<body>
    <form action="" method="post" id="quiz-form">
        Name<input type="text" name="name" id="title" placeholder="Please enter your name" /><br>
        <br>
        Email<input type="text" name="email" id="content" placeholder="Please enter your email" /><br>
        <br>
        Password<input type="text" name="password" id="content" placeholder="Please enter your password" /><br>
        <br>
        address<input type="text" name="address" id="content" placeholder="Please enter your address" /><br>
        <br>
        linkedin url<input type="text" name="url" id="content" placeholder="Please enter your linkedin url" /><br>
        <br>
        <input type="submit" name="submit" id="submit" value="Submit" />
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $linkedinUrl = $_POST['url'];
        $errors = [];
        //validate name
        if (empty($name)) {
            $errors['Name'] = 'please enter your Name this is required input';
        }
        elseif (gettype($name) !='string') {
            $errors['name'] = 'must be strig';
            
        }
        ///validate email
        if (empty($email)) {
            $errors['email'] = 'please enter email this is required input';
        }
        elseif ( strpos($email,'@')=='' or strpos($email,'@')==0 or strpos($email,'.')==''or strpos($email,'.')<strpos($email,'@') ) {
            $errors['email'] = 'enter email in this form:username@example.com';
           
        }
        //validate password
        if (empty($password)) {
            $errors['password'] = 'please enter password this is required input';
        }
        elseif (strlen($password) < 6) {
            $errors['password'] = 'must be min 6';
            
        }
        //validate address
        if (empty($address)) {
            $errors['address'] = 'please enter address this is required input';
        }
        elseif (strlen($address) != 10) {
            $errors['address length'] = 'must be 10 chars';
            
        }
        //validate linkedin url
        if (empty($linkedinUrl)) {
            $errors['linkedin url'] = 'please enter linkedin url this is required input';
        }
        elseif (strpos($linkedinUrl,'https://www.linkedin.com')=='') {
            $errors['linkedin url'] = ' please enter your linkedin url in this form https://www.linkedin.com/user-5hgfdt';
            
        }
   
        if (count($errors) > 0) {
            foreach ($errors as $key => $value) {
                echo $key . ':' . $value .'<br>';
            }
        } else {
            echo 'valid data';
        }
    }

    
    ?>



</body>

</html>