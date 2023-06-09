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
    <form action="" class="signup-form">
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