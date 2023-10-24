<?php 

    include '../connect.php';

    session_start();

    if(isset($_SESSION['username'])){
        header('Location:../index.php');
    }

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM `login` WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        if($result->num_rows > 0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            header("Location:../index.php");
        } else {
            header("Location:../index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    
    <title>Document</title>
</head>
<body>
    <!-- Login -->
    <div class="container-login">
        <form action="" method="post">
            <div class="form-login">
                <div class="input-box">
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="btn">
                    <input type="submit" name="submit" value="Login">
                </div>
            </div>
        </form>
    </div>
</body>
</html>