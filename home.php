<?php 
   session_start();

   include("koneksi.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv=   "X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Home</title>
    <style>
        .bottom {
            text-align: center;
        }

        .btn {
            background-color: green;
        }
        .dashboard h1 {
            padding: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .main-box {
            display: flex;

        }
    </style>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">RiiFahri</a> </p>
        </div>

        <div class="right-links">

            <?php 
            
            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Age = $result['Age'];
                $res_id = $result['Id'];
            }
            
            echo "<a href='edit.php?Id=$res_id'>Ubah Profile</a>";
            ?>

            <a href="index.php"> <button class="btn">Log Out</button> </a>

        </div>
    </div>

    <div class="dashboard">
        <h1>Halaman Dashboard</h1>
    </div>

    <div class="main-box top">
        <div class="top">
            <div class="box">
                <p>Selamat Datang, <b><?php echo $res_Uname ?></b></p>
            </div>
        <div class="box">
                <p>Email Kamu : <b><?php echo $res_Email ?></b>.</p>
        </div>
        </div>
    </div>
    

</body>
</html>