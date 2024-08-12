<?php
include("Auth.php");

$error = "";
if (isset($_POST['login'])) {
    $usernameOrEmail = mysqli_real_escape_string($rc->link, $_POST['useroremail']);
    $password = mysqli_real_escape_string($rc->link, $_POST['pword']);
  
    $logged = json_decode($rc->login($usernameOrEmail, $password, "login"));

    if ($logged->message == "Login Successful") {
        header("Location: result.html");
    } 
    $error = json_decode($rc->login($usernameOrEmail, $password, "login"));

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<main>
    <section id="create">
        <form action="" method="POST">
            <h2>LOGIN</h2>
            <span style="color: red;"><?php echo (@$error->message); ?></span>
            <div class="register">
                <label for="email"> E-mail/UserName:
                    <input type="text" id="email" name="useroremail" required />
                </label>
            </div>

            <div class="register">
                <label for="pass"> Password:
                    <input type="password" id="pass" name="pword" required />
                </label>
            </div>

            <button type="submit" name="login">Login</button>
        </form>
        <h4 id="acct">New User? <a href="reg.php">Register here</a></h4>
    </section>
</main>
</body>
</html>
