<?php
    session_start();
    
    include("connection.php")

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PHP_PROJECT</title>
</head>
<body>
    <div class="login_container">
        <div class="login_form_container">
            <div class="leftl">
                <form class="form_containerl" action="index.php" method="post">
                    <h1>Login to Your Account</h1>
                    <input
                        type="text"
                        placeholder="Username"
                        name="username"
                        required
                        class="inputl"
                        id="username"
                    />
                    <input
                        type="password"
                        placeholder="Password"
                        name="password"
                        required
                        class="inputl"
                        id="password"
                    />
                    <button type="submit" name="submit" onclick="return isvalid()" class="green_btnl">
                        Sign In
                    </button>
                </form>
            </div>
            <div class="rightl">
                <h1>New Here ?</h1>
                <a href="signup.php">
                    <button type="button" class="white_btnl">
                        Sign Up
                    </button>
                </a>
            </div>
        </div>
    </div>
    <script>
            function isvalid(){
                var username=document.getElementById("username").value;
                var password=document.getElementById("password").value;

                if(username=="" && password==""){
                    alert("Username and password fields are empty");
                    return false;
                }
                else{
                    if(username==""){
                        alert("Username field is empty");
                        // return false;
                    }
                    if(password==""){
                        alert("Password field is empty");
                        // return false
                    }
                }
            }
            </script>
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        
        $sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
        
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);
        $count=mysqli_num_rows($result);
        

        if($count>0){
            $_SESSION['user_name']=$username;

            echo '<script>
                    alert("Login Successfull");
                    window.location.href="dashboard.php";
                </script>';
        
            // header("Location:dashboard.php");
        }
        else{
            // sleep(1);
            echo '<script>
                    alert("Login failed..Invalid username or password");
                    window.location.href="index.php";
                </script>';
        }
        
        }
        
?>

