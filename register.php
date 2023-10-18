<?php
require('koneksi.php');

if(isset($_POST['register'])){
    $userMail = $_POST['txt_email'];
    $userPass = $_POST['txt_pass'];
    $userName = $_POST['txt_nama'];

    $query = "INSERT INTO user_detail VALUES ('', '$userMail', '$userPass', '$userName', 2)";
    $result = mysqli_query($koneksi, $query);

    if($result){
        header('Location: login.php');
    } else {
        echo "Registration failed!";
    }
}
?>

<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
    <form action="register.php" method="POST">
        <p>Email: <input type="text" name="txt_email" required></p>
        <p>Password: <input type="password" name="txt_pass" required></p>
        <p>Nama: <input type="text" name="txt_nama" required></p>
        <button type="submit" name="register">Register</button>
    </form>
    <p><a href="login.php">Login</a></p>
    </div>
</body>
</html>
