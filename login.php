<?php
    session_start();

    if(isset($_POST['login'])) {
        $dbServername='localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName = 'tutoriel';
        $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);

        $username = stripslashes($username);
        $password = stripslashes($password);

        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);

        // $password = md5($password);

        $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);
        $id = $row['id'];
        $db_password = $row['password'];

        if($password == $db_password) {
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $id;
            header("Location: index.php");
            echo "test connecté";
        } else {
            echo "You didn't enter the correct details!";
        }

    }
?>



<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1 style="font-family: Tahoma;">Login</h1>
    <form action="login.php" method="post" enctype="multipart/form-data">
        <input placeholder="Username" name="username" type="text" autofocus>
        <input placeholder="Password" name="password" type="password">
        <input name="login" type="submit" value="Login">
    </form>
</body>
</html>
