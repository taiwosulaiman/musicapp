<?php
include("Auth.php");

$error = "";
if (isset($_POST['register'])) {
    $lastname = mysqli_real_escape_string($rc->link,$_POST['ln']);
    $firstname = mysqli_real_escape_string($rc->link,$_POST['fn']);
    $othername = mysqli_real_escape_string($rc->link,$_POST['on']);
    $phonenum = mysqli_real_escape_string($rc->link,$_POST['ph']);
    $email = mysqli_real_escape_string($rc->link,$_POST['em']);
    $username = mysqli_real_escape_string($rc->link,$_POST['user']);
    $password = mysqli_real_escape_string($rc->link,$_POST['pword']);

    // Encrypt the password
    $encr_pword = sha1($password);

    // insert into database
    $query = "INSERT INTO login(lastname,firstname,othername,phone,email,username,password)" ;
    $query.= "VALUES('$lastname','$firstname','$othername','$phonenum','$email','$username','$encr_pword')";


    // Verify record
    $check = $rc->verifyRecord($username, $email, "login");

    if ($check != null) {
        $error = json_decode($check);
    } else {
        // Insert into database
        $query = "INSERT INTO login(lastname, firstname, othername, phone, email, username, password)";
        $query .= "VALUES('$lastname', '$firstname', '$othername', '$phonenum', '$email', '$username', '$encr_pword')";
        $error = json_decode($rc->postData($query));
    } 
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<main>
    <section id="create">
        <form action="reg.php" method="POST">
        <h2>REGISTER</h2><span style="color: red;"><?php echo (@$error->message); ?> </span>

            <div class="register">
                <label for="lname"> LastName:
                    <input type="text" id="lname" name="ln" required />
                </label>
            </div>

            <div class="register">
                <label for="fname"> FirstName:
                    <input type="text" id="fname" name="fn" required />
                </label>
            </div>
            <div class="register">
                <label for="oname"> OtherNames:
                    <input type="text" id="oname" name="on" required />
                </label>
            </div>

            <div class="register">
                <label for="phone"> Phone Number:
                    <input type="text" id="phone" name="ph" required />
                </label>
            </div>

            <div class="register">
                <label for="email"> E-mail:
                    <input type="email" id="email" name="em" required />
                </label>
            </div>

            <div class="register">
                <label for="user"> UserName:
                    <input type="text" id="user" name="user" required />
                </label>
            </div>

            <div class="register">
                <label for="pass"> Password:
                    <input type="password" id="pass" name="pword" required />
                </label>
            </div>

            <button type="submit" name="register"> Register </button>
        </form>
        <h4 id="acct">Already have an account? <a href="login.php">Login here</a></h4>
    </section>
</main>
</body>
</html>
