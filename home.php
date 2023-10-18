<?php
require ("koneksi.php");
?>
<html>
<head>
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 8    0%;
            margin: 0 auto;
            text-align: center;
        }
        h1 {
            background-color: #4caf50;
            color: white;
            padding: 20px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom:  20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #4caf50;
            color: white;
        }
        a {
            text-decoration: none;
            padding: 5px 10px;
            background-color: #4caf50;
            color: white;
            border-radius: 3px;
        }
        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang</h1>
        <table>
            <tr>
                <th>No</th>
                <th>Email</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>

            <?php
            $query = "SELECT * FROM user_detail";
            $result = mysqli_query($koneksi, $query);
            $no = 1;

            while ($row = mysqli_fetch_array($result)) {
                $userMail = $row['user_email'];
                $userName = $row['user_fullname'];
                $userId = $row['user_id']; 
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $userMail; ?></td>
                <td><?php echo $userName; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $userId; ?>">Edit</a>
                    <a href="hapus.php?id=<?php echo $userId; ?>">Hapus</a>
                </td>
            </tr>

            <?php
                $no++;
            }
            ?>
        </table>
        <a href="login.php">Logout</a>
    </div>
</body>
</html>
