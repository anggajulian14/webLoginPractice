<?php
require('koneksi.php');

if (isset($_POST['update'])) {
    $userId = $_POST['txt_id'];
    $userMail = $_POST['txt_email'];
    $userPass = $_POST['txt_pass'];
    $userName = $_POST['txt_nama'];

    $query = "UPDATE user_detail SET user_password='$userPass', user_fullname='$userName' WHERE user_id='$userId'";
    $result = mysqli_query($koneksi, $query);
    header("Location: home.php");
    exit();
}

$id = $_GET['id'];
$query = "SELECT * FROM user_detail WHERE user_id='$id'";
$result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

while ($row = mysqli_fetch_array($result)) {
    $id = $row['user_id'];
    $userMail = $row['user_email'];
    $userPass = $row['user_password'];
    $userName = $row['user_fullname'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px #000000;
        }

        .form-container p {
            margin: 10px 0;
        }

        .form-container input[type="text"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container button {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 15px 20px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
        }

        .form-container button:hover {
            background-color: #45a049;
        }

        .back-link {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <form action="edit.php" method="POST">
            <input type="hidden" name="txt_id" value="<?php echo $id; ?>">
            <p>Email: <input type="text" name="txt_email" value="<?php echo $userMail; ?>" readonly></p>
            <p>Password: <input type="password" name="txt_pass" value="<?php echo $userPass; ?>"></p>
            <p>Nama: <input type="text" name="txt_nama" value="<?php echo $userName; ?>"></p>
            <button type="submit" name="update">Update</button>
        </form>
        <div class="back-link"><a href="home.php">Kembali</a></div>
    </div>
</body>

</html>

<?php } ?>
