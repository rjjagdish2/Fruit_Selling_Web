<?php require('db.php'); 

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $mail=$_POST['mail'];
    $mono123=$_POST['mono123'];
    
    $add1=$_POST['add1'];
    $pcode=$_POST['pcode'];
    $pwd=$_POST['pass'];

    $chk="SELECT * FROM client where cmail='$mail' or mobileno=$mono123";
    $res=mysqli_query($conn,$chk);
    if(mysqli_num_rows($res) > 0){
        ?>
        <script> alert("Mobile No. or Email already Registered"); 
    window.location.href="./signup.php";
    </script>
        <?php
    }
    else{
    // INSERT INTO `client`(`cname`, `cmail`, `add1`, `pcode`, `pwd`, `mobile`) VALUES ('[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')
    // $q="INSERT INTO client(cname, cmail, add1, pcode, pwd,  mobile) VALUES ('".$name."','".$mail."','".$add1."',".$pcode.",'".$pwd."',".$mono.")";
    $q="INSERT INTO client(cname, cmail, add1, pcode, pwd,  mobileno) VALUES ('$name','$mail','$add1',$pcode,'$pwd','$mono123')";
    $qry=mysqli_query($conn,$q);
    
?>
    <script>window.location.href="./signup.php";</script>
    <?php
  
}
}
if(isset($_POST['btnlogin'])){
    $email=$_POST['email'];
    $pswd=$_POST['pswd'];

    if($email=="admin" && $pswd=="admin"){?>
        <script>window.location.href="./admin_nav_pan.php";</script>
    <?php

    }
    else{
    $fq="SELECT * FROM client where cmail='$email' or mobileno='$email' and pwd='$pswd' ";
    $query=mysqli_query($conn,$fq);
    $count=mysqli_num_rows($query);
    if($count == 1){      
        // setcookie("username",$email);
        $qu=mysqli_query($conn,"Select * from client where cmail=$email or mobileno=$email");
        $re=mysqli_fetch_array($qu);
        setcookie("username",$re['cid']);

        
?>
        <script>window.location.href="./navBar.php";</script>
        <?php

        } 
    
    
    else{
        ?>
        <script> alert("Incorrect Username or password"); 
            window.location.href="./signup.php";
    </script>
        <?php
    } 
}
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K.J. Fruis</title>
    <link rel="stylesheet" href="./css/sup.css">
</head>
<body>

    <div class="main">
    <div id="error" style="height:20px;margin-left:5px;"></div>
    
        <input type="checkbox" id="chk" aria-hidden="true" checked>
<div class="signup">
    
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data" id="form">

        <label id="chksignup" for="chk" aria-hidden="true">Sign up</label>
        
        <input type="text" name="name" placeholder="Full Name" id="name1"><br>
        <input type="text" name="mono123" placeholder="Mobile No." id="mono"><br>
        <input type="text" name="mail" placeholder="Email Address" id="mail"><br>
        <input type="text" name="add1" placeholder="House Name/Plot No. " id="address"><br>
        <input type="text" name="pcode" placeholder="pincode" id="pcode"><br><hr>
        <input type="text" name= "pass" placeholder="Password" id="pass1"><br>
        <input type="password" name= "pass" placeholder="Confirm Password" id="pass2"><br>        
        <button name="submit" id="btnSubmit">Sign up</button>
                
    </form>
</div>

<div class="login">
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
        <label for="chk" aria-hidden="true">Login</label>
        <input type="text" name="email" placeholder="Mobile No./Email" required>
        <input type="password" name="pswd" placeholder="Password" required>
        <button name="btnlogin">Login</button>

    </form>
</div>


    </div>
       
    
    <script>
        let regex= /^[a-zA-Z]+$/;
        var name1=document.getElementById('name1');
        var mono =document.getElementById('mono');
        var mail=document.getElementById('mail');
        var add1 =document.getElementById('add1');
        var pcode=document.getElementById('pcode');

        var pass1 = document.getElementById('pass1');
        var pass2 = document.getElementById('pass2');
        var form=document.getElementById('form');
        var errorElement =document.getElementById('error');


        form.addEventListener('submit',(e)=>{
            let msg = []
            if(name1.value === '' ||  name1.lenght<5){
                msg.push('FullName is required')
            }       else{
                if(!(regex.test(name1))){
                    msg.push('Name Should Contains Only Characters')
                }
            }             
            
            if(pass1.value === '' && pass2.value === ''){
                msg.push('Password is required')
            }                    
            if(pass1.value != pass2.value){
                msg.push('Both Password must be same')
            }
            e.preventDefault();
            errorElement.innerText=msg.join(', ');
        })
    </script>
</body>
</html>