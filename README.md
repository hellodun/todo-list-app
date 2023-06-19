# todo-list-app
A Full-Stack Todo List WebApp that I am currently building as a Final Project for my Web Systems &amp; Technologies Lab.
To use this Web App, First create a database connectivity file. You can name it as ```db_connect.php```
Now, in this file, Write the following code:
```
<?php
$host = "YOUR_HOST";
$username = "YOUR_USERNAME";
$password = "YOUR_PASSWORD";
$db_name = "YOUR_DATABASE_NAME";

$conn = mysqli_connect($host, $username, $password, $db_name);
if (!$conn) {
    die("Error: " . mysqli_connect_error());
}
?>
```
Now, Open PHPMyAdmin and create a database and then create 2 tables by writing the SQL Query given below:
```
CREATE TABLE users(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL
);

CREATE TABLE tasks(
  user_id INT NOT NULL,
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  task VARCHAR(255) NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id)
);
```
Now you're all set to use the Web App!
