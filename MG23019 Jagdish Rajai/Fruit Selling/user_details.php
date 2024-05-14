<?php
$name="";
$mono="";
$email="";
$hname="";
$pincode="";

include("db.php");

session_start();
if(isset($_COOKIE["username"])){
    $q="select * from client where cid=".$_COOKIE["username"];
    $res=mysqli_fetch_array(mysqli_query($conn,$q));
    $name=$res[1];
    $mono=$res[6];
    $email=$res[2];
    $hname=$res[3];
    $pincode=$res[4];
}


if(isset($_POST['logout'])){    
    setcookie("username",'',-36000);
    session_unset();
    session_destroy();
    header("Location: index.php");
}

if(isset($_POST['update'])){
    $name=$_POST['uname'];
    $mono=$_POST['mono'];
    $email=$_POST['email'];
    $hname=$_POST['hname'];
    $pincode=$_POST['pincode'];

    $qu="update client set cname='$name',cmail='$email',add1='$hname',pcode='$pincode',mobileno='$mono' where cid=".$_COOKIE["username"];
    mysqli_query($conn,$qu);
    header("Location: user_details.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K.J. Fruis</title>
    <link rel="stylesheet" href="./css/user.css">
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
    <!-- <label> <?php echo $_COOKIE['username']; ?> </label> -->
    

    <div class="main">
        <div class="container">
            <div class="first">
                <img src="imgs/user.jpg">
            </div>
            <div class="second">
                
                <div class="cont">
                <div class="sub">
                        <label> <h1>User Details</h1> </label>
                        
                    </div>
                    <div class="sub">
                        <label> Name </label>
                        <input type="text" value="<?php echo $name; ?>" name="uname">
                    </div>
                    <div class="sub">
                        <label> Mobile No </label>
                        <input type="text" value="<?php echo $mono; ?>" name="mono">
                    </div>
                    <div class="sub">
                        <label> E-Mail </label>
                        <input type="text" value="<?php echo $email; ?>" name="email">
                    </div>
                    <div class="sub">
                        <label> Address </label>
                        <textarea rows="3" cols="28" name="hname" style="font-size:15px;"><?php echo $hname; ?></textarea>
                        <!-- <input type="text" value="<?php echo $hname; ?>" > -->
                    </div>
                    <div class="sub">
                        <label> Pincode </label>
                        <input type="text" value="<?php echo $pincode; ?>" name="pincode">
                    </div>
                    <div class="sub">
                    <input type="submit" value="Logout" style="background:red;" name="logout">    
                    <input type="submit" value="Update" name="update">
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    

</form>
</body>
</html>