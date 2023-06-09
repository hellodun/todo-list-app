<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
    <title>Sign Up</title>
</head>

<body>
    <nav class="navbar">
        <div class="nav-heading">
            <h1>DoToday</h1>
        </div>
    </nav>
    <?php
    $showAlert = false;
    $showError = false;
    $exists = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include "db_conn.php";
        $name = $_POST["name"];
        $email = $_POST["setemail"];
        $password = $_POST["setpassword"];
        $confirmPassword = $_POST["retypepassword"];

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);

        if ($num == 0) {
            if (($password == $confirmPassword) && $exists == false) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('$name', '$email', '$hash')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $showAlert = true;
                }
            } else {
                $showError = true;
            }
        }
        if ($num > 0) {
            $exists = true;
        }
    }

    if ($showAlert) {
        echo "<script> alert('Your account is successfully created');
        window.location.assign('login.php');
        </script>";
    }

    if ($exists) {
        echo "<script> alert('Email is already taken');</script>";
    }

    if ($showError) {
        echo "<script> alert('Passwords do not match');</script>";
    }

    ?>
    <form action="signup.php" method="post" class="signup-form">
        <h2>Sign Up</h2>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>
        <label for="setemail">Email</label>
        <input type="email" name="setemail" id="setemail" required>
        <label for="setpassword">Password</label>
        <input type="password" name="setpassword" id="setpassword" required>
        <label for="retypepassword">Retype Password</label>
        <input type="password" name="retypepassword" id="retypepassword" required>
        <input type="checkbox" name="checkbox" id="checkbox" required>
        <label for="checkbox">By checking, You agree to our Terms & Conditions</label>
        <input type="submit" value="Submit">
    </form>
</body>

</html>