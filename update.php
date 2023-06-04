<?php
    session_start();


    $userpro=$_SESSION["user_name"];

    if($userpro==true){

    }
    else{
        header("Location:index.php");
    }

    include("connection.php");

    $id= $_GET['id'];
   
    // echo $id;
//    $query="SELECT * FROM users WHERE id='$id'";
//    $data=mysqli_query($conn,$query);
//    $result=mysqli_fetch_assoc($data);

?>

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
            <div class="right">
                <form class="form_container" action="#" method="post" enctype="multipart/form-data">
                    <h1>Update Account</h1>
                    <input
                        type="file"
                        placeholder="Uplaod Photo"
                        name="uploadfile"
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
                        Update
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

if(isset($_POST['submit'])){

$filename=$_FILES["uploadfile"]["name"];
$tempname=$_FILES["uploadfile"]["tmp_name"];
$folder="images/".$filename;

move_uploaded_file($tempname,$folder);

    
// $username=$_POST['username'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];


$query="UPDATE users SET email='$email',address='$address',gender='$gender',password='$password',std_image='$folder' WHERE id='$id'";

$data=mysqli_query($conn,$query);

// echo $data;

if($data){
    echo '<script>
        alert("Successfully Updated Into Database");
        window.location.href="dashboard.php";
        </script>';
}

    //header("Location:add_student.php");

}

?>