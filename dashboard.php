<?php
    session_start();
    //  echo "welcome ".$_SESSION['user_name'];


    include("connection.php");
    error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <title>PHP_project</title>
</head>
<body>

    <header>
    <div className="logo">LOGO</div>
    <nav>
        <a href="home.php"><div>Home</div></a>
        <div>About</div>
        <a href="dashboard.php"><div>Dashboard</div></a>
        <a href="logout.php"><button class="logout">Log Out</button></a>
    </nav>
    </header>

    <div class="card">
        <?php

            $userpro=$_SESSION["user_name"];

            if($userpro==true){

            }
            else{
                header("Location:index.php");
            }


            $query="SELECT * FROM users WHERE username='$userpro'";
            $data=mysqli_query($conn,$query);
            $total=mysqli_num_rows($data);
            $results=mysqli_fetch_assoc($data);
            echo '<img src='.$results["std_image"].' alt="User">
                    <h1>'.$results["username"].'</h1>
                    <p class="title">'.$results["email"].'</p>
                    <p class="title">'.$results["college_name"].'</p>
                    <p class="title">'.$results["gender"].'</p>
                    <p class="title">'.$results["address"].'</p>
                    <p class="title">'.$results["phone"].'</p>
                
            <a href="update.php?id='.$results["id"].'">
                <button class="update">Update</button>
            </a>'
            ?>
        </div>
</body>
</html>