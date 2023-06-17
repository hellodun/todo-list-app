<?php
$invalid_login = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["signin"])) {
        include "db_conn.php";
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $stored_password = $row['password'];
            if (password_verify($password, $stored_password)) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $row['email'];
                header("Location: todolist.php");
                exit();
            }
        }
        $invalid_login = true;
        if ($invalid_login) {
            echo "<script>alert('Invalid Credentials');</script>";
        }
    }
}

?>
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
    <title>Login</title>
</head>

<body>
    <nav class="navbar">
        <div class="nav-heading">
            <h1>DoToday</h1>
        </div>
    </nav>
    <form action="" method="post" class="login-form">
        <h2 class="login">Login</h2>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?php
                                                            if ($invalid_login) {
                                                                echo htmlspecialchars($email);
                                                            } ?>" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" value="<?php
                                                                    if ($invalid_login) {
                                                                        echo htmlspecialchars($password);
                                                                    } ?>" required>
        <p>Not signed-up? <a href="signup.php">Register Now!</a></p>
        <input type="submit" name="signin" value="Sign In">
    </form>

</body>

</html>