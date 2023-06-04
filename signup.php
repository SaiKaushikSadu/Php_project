<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>PHP_PROJECT</title>
</head>
<body>
    <div class="signup_container">
        <div class="signup_form_container">
            <div class="left">
                <h1>Welcome Back</h1>
                <a href="index.php">
                    <button type="button" class="white_btn">
                        Sign in
                    </button>
                </a>
            </div>
            <div class="right">
                <form class="form_container" action="signup.php" method="post" enctype="multipart/form-data">
                    <h1>Create Account</h1>
                    <input
                        type="file"
                        placeholder="Uplaod Photo"
                        name="uploadfile"
                        required
                        class="input"
                    />
                    <input
                        type="text"
                        placeholder="Username"
                        name="username"
                        required
                        class="input"
                    />
                    <input
                    type="email"
                    placeholder="Email"
                    name="email"
                    required
                    class="input"
                    />
                    <select name="gender">
                        <option className='first'>--Select your Gender--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                      </select> 

                    <input
                        type="number"
                        placeholder="Phone Number"
                        name="phone"
                        required
                        class="input"
                    />
                    <input
                        type="address"
                        placeholder="Address"
                        name="address"
                        required
                        class="input"
                    />
                    <input
                        type="password"
                        placeholder="Password"
                        name="password"
                        required
                        class="input"
                        id="password"
                    />
                    <input
                        type="password"
                        placeholder="Confirm Password"
                        name="cpassword"
                        required
                        class="input"
                        id="cpassword"
                    />
                    <button type="submit" class="green_btn" name="submit" onclick="return isvalid()">
                        Sign Up
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    function isvalid(){
        var cpassword=document.getElementById("cpassword").value;
        var password=document.getElementById("password").value;

        if(cpassword!=password){
            alert("Check Password");
            return false;
        }
    }
</script>
</html>

<?php

include("connection.php");

if(isset($_POST['submit'])){

$filename=$_FILES["uploadfile"]["name"];
$tempname=$_FILES["uploadfile"]["tmp_name"];
$folder="images/".$filename;

move_uploaded_file($tempname,$folder);

    
$username=$_POST['username'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];

$sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
$count=mysqli_num_rows($result);

// echo $count;

if($count==0){

    $insert="INSERT INTO users (std_image,username,email,gender,phone,address,password) VALUES('$folder','$username','$email','$gender','$phone','$address','$password')";
    $result1=mysqli_query($conn,$insert);
    // sleep(1);
    if($result1){

        echo '<script>
            alert("Successfully Added Into Database");
            window.location.href="index.php";
            </script>';
    
        //header("Location:add_student.php");
    }
}
else{

    echo '<script>
            alert("Username and Password already exists");
            window.location.href="index.php";
        </script>';

    //header("Location:add_student.php");

}

}

?>