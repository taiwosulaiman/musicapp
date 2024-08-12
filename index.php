
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
        <form action="" method="POST">
            <h2>REGISTER</h2>
            <div class="register">
                <label for="fname"> FirstName:
                    <input type="text" id="fname" name="firstname" required />
                </label>
            </div>

            <div class="register">
                <label for="lname"> LastName:
                    <input type="text" id="lname" name="lastname" required />
                </label>
            </div>

            <div class="register">
                <label for="oname"> OtherNames:
                    <input type="text" id="oname" name="othername" required />
                </label>
            </div>

            <div class="register">
                <label for="phone"> Phone Number:
                    <input type="text" id="phone" name="phone" required />
                </label>
            </div>

            <div class="register">
                <label for="email"> E-mail:
                    <input type="email" id="email" name="email" required />
                </label>
            </div>

            <div class="register">
                <label for="user"> UserName:
                    <input type="text" id="user" name="username" required />
                </label>
            </div>

            <div class="register">
                <label for="pass"> Password:
                    <input type="password" id="pass" name="password" required />
                </label>
            </div>

            <button type="submit"> Register </button>
        </form>
        <h4 id="acct">Already have an account? <a href="login.php">Login here</a></h4>
    </section>
</main>
</body>
</html>
