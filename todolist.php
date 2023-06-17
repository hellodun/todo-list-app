<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$error = false;
include "db_conn.php";
$getUserId = "SELECT id FROM users WHERE email= '" . $_SESSION['email'] . "'";
$result = mysqli_query($conn, $getUserId);
$row = mysqli_fetch_array($result);
$id = $row['id'];
if (isset($_POST["add-task"])) {
    if (empty($_POST['input-task'])) {
        $error = true;
    } else {
        $task = $_POST['input-task'];
        $sql = "INSERT INTO `tasks` (`user_id`, `task`) VALUES ('$id', '$task')";
        mysqli_query($conn, $sql);
        header("Location: todolist.php");
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
    <title>DoToday - Todo List</title>
</head>

<body>
    <nav class="navbar">
        <div class="nav-heading">
            <h1>DoToday</h1>
        </div>
        <div class="greetUser">
            <?php
            $getUserName = "SELECT `name` FROM users WHERE email= '" . $_SESSION['email'] . "'";
            $res = mysqli_query($conn, $getUserName);
            $getName = mysqli_fetch_array($res);
            $name = $getName['name'];
            echo '<h4 class="hello-user">Hello! ' . $name . '</h4>';
            ?>
            <div class="logout">
                <a href="logout.php">Log Out</a>
            </div>
        </div>
    </nav>
    <div class="list-container">
        <div class="input-box">
            <form action="todolist.php" method="post" class="input-task">
                <?php
                if ($error) {
                    echo "<script>alert('Please enter a task');</script>";
                }
                ?>
                <input type="text" name="input-task" id="inp-tsk" placeholder="Add Task">
                <input type="submit" name="add-task" id="add-task" value="+">
            </form>
        </div>
        <div class="todo-items">
            <form action="" class="items-form">
                <h3>Tasks:</h3>
                <?php
                $task_label = mysqli_query($conn, "SELECT * FROM tasks WHERE user_id = '$id'");
                $row = mysqli_num_rows($task_label);
                $i = 0;
                while ($row = mysqli_fetch_assoc($task_label)) { ?>
                    <input type="checkbox" class="checkbox">
                    <label class="label"> <?php echo $row['task']; ?></label> <br>

                <?php $i++;
                } ?>

            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>