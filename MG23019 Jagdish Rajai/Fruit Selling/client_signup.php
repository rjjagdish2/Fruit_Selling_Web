<?php require('db.php'); 

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $mail=$_POST['mail'];
    $mono=$_POST['mono'];
    $add1=$_POST['add1'];
    $add2=$_POST['add2'];
    $add3=$_POST['add3'];
    $add=$add1 .' ' . $add2 .' '.$add3;
    $pcode=$_POST['pcode'];
    $pwd=$_POST['pass'];
    $q="INSERT INTO client(cname, cmail, add1, pcode, pwd,  mobile) VALUES ('$name','$mail','$add',$pcode,'$pwd',$mono)";
    $qry=mysqli_query($conn,$q);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K.J. Fruis</title> 
</head>
<body>
    <form action="navPan.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Full Name"><br>
        <input type="text" name="mono" placeholder="Mobile No."><br>
        <input type="text" name="mail" placeholder="Email Address"><br>
        <input type="text" name="add1" placeholder="House Name/Plot No. "><br>
        <input type="text" name="add2" placeholder="Area"><br>
        <input type="text" name="add3" placeholder="city & State"><br>
        <input type="text" name="pcode" placeholder="pincode"><br><hr>
        <input type="text" name= "pass" placeholder="Password"><br>
        <input type="password" name= "pass" placeholder="Confirm Password"><br>
        <input type="submit" name="submit" value="Sign Up"><br>
    </form>
</body>
</html>