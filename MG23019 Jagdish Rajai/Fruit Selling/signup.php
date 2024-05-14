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
<script>
alert("Mobile No. or Email already Registered");
window.location.href = "./signup.php";
</script>
<?php
    }
    else{
    // INSERT INTO `client`(`cname`, `cmail`, `add1`, `pcode`, `pwd`, `mobile`) VALUES ('[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')
    // $q="INSERT INTO client(cname, cmail, add1, pcode, pwd,  mobile) VALUES ('".$name."','".$mail."','".$add1."',".$pcode.",'".$pwd."',".$mono.")";
    $q="INSERT INTO client(cname, cmail, add1, pcode, pwd,  mobileno) VALUES ('$name','$mail','$add1',$pcode,'$pwd','$mono123')";
    $qry=mysqli_query($conn,$q);
    
?>
<script>
window.location.href = "./signup.php";
</script>
<?php
  
}
}
if(isset($_POST['btnlogin'])){
    $email=$_POST['email'];
    $pswd=$_POST['pswd'];

    if($email=="admin" && $pswd=="admin"){?>
<script>
window.location.href = "./admin_nav_pan.php";
</script>
<?php

    }
    else{
    $fq="SELECT * FROM client where cmail='$email' or mobileno='$email' and pwd='$pswd' ";
    $query=mysqli_query($conn,$fq);
    $count=mysqli_num_rows($query);
    if($count == 1){      
        // setcookie("username",$email);
        $qu=mysqli_query($conn,"Select * from client where cmail='$email' or mobileno='$email'");
        $re=mysqli_fetch_array($qu);
        setcookie("username",$re['cid']);

        
?>
<script>
window.location.href = "./index.php";
</script>
<?php

        } 
    
    
    else{
        ?>
<script>
alert("Incorrect Username or password");
window.location.href = "./signup.php";
</script>
<?php
    } 
}
  
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>K.J. Fruis</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Font-->
    <!-- <link rel="stylesheet" type="text/css" href="css/sourcesanspro-font.css"> -->
    <!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css" />
</head>

<body class="form-v8">
    <div class="page-content">
        <div class="form-v8-content">
            <div class="form-left">
                <img src="imgs/logo.png" alt="form" height=93px width=100px>
            </div>
            <div class="form-right">
                <div class="tab">
                    <div class="tab-inner">
                        <button class="tablinks" onclick="openCity(event, 'sign-in')" id="defaultOpen">Sign In</button>
                    </div>
                    <div class="tab-inner">

                        <button class="tablinks" onclick="openCity(event, 'sign-up')">Sign Up</button>
                    </div>
                </div>

                <form onsubmit="return varification()" action="<?php echo $_SERVER['PHP_SELF'];?>" class="form-detail"
                    method="POST" enctype="multipart/form-data" id="form">
                    <div class="tabcontent" id="sign-in">
                        <div class="form-row">
                            <label class="form-row-inner">
                                <input type="text" name="email" id="full_name_1" class="input-text">

                                <span class="label">Mobile No./Email <div id="uname" class="error"
                                        style="width:max-content;color: red;margin-left:200%"></div></span>
                                <span class="border"></span>

                            </label>
                        </div>

                        <div class="form-row">
                            <label class="form-row-inner">
                                <input type="password" name="pswd" id="password_1" class="input-text">

                                <span class="label">Password <div id="pass" class="error"
                                        style="width:max-content;	color: red;margin-left:285%"></div></span>
                                <span class="border"></span>
                            </label>
                        </div>

                        <div class="form-row-last">
                            <input type="submit" name="btnlogin" class="register" value="Sign In">
                        </div>
                    </div>
                </form>
                <form onsubmit="return fullValidation()" action="<?php echo $_SERVER['PHP_SELF'];?>" class="form-detail"
                    method="POST" enctype="multipart/form-data">

                    <div class="tabcontent" id="sign-up">
                        <div class="form-row">
                            <label class="form-row-inner">
                                <input type="text" name="name" id="name1" class="input-text" required>
                                <span class="label">Full Name <div id="ename1" class="error"
                                        style="width:max-content;	color: red;margin-left:300%"></div></span>

                                <span class="border"></span>
                            </label>
                        </div>
                        <div class="form-row">
                            <label class="form-row-inner">
                                <input type="text" name="mono123" id="mono" class="input-text" required>

                                <span class="label">Mobile No. <div id="emono" class="error"
                                        style="width:max-content;	color: red;margin-left:200%"></div></span>
                                <span class="border"></span>
                            </label>
                        </div>
                        <div class="form-row">
                            <label class="form-row-inner">
                                <input type="text" name="mail" id="mail" class="input-text" required>

                                <span class="label">Email Address <div id="email" class="error"
                                        style="width:max-content;	color: red;margin-left:250%"></div></span>
                                <span class="border"></span>
                            </label>
                        </div>
                        <div class="form-row">
                            <label class="form-row-inner">
                                <input type="text" name="add1" id="address" class="input-text" required>

                                <span class="label">House Name/Plot No. <div id="eaddress" class="error"
                                        style="width:max-content;	color: red;margin-left:252%"></div></span>
                                <span class="border"></span>
                            </label>
                        </div>
                        <div class="form-row">
                            <label class="form-row-inner">
                                <input type="text" name="pcode" id="pcode" class="input-text" required>
                                <span class="label">Pincode. <div id="epcode" class="error"
                                        style="width:max-content;	color: red;margin-left:360%"></div></span>
                                <span class="border"></span>
                            </label>
                        </div>
                        <div class="form-row">
                            <label class="form-row-inner">

                                <input type="password" name="pass" id="pass1" class="input-text" required>
                                <span class="label">Password <div id="epass1" class="error"
                                        style="width:max-content;	color: red;margin-left:250%"></div></span>
                                <span class="border"></span>
                            </label>
                        </div>
                        <div class="form-row">
                            <label class="form-row-inner">
                                <input type="password" id="pass2" class="input-text" required>
                                <span class="label">Confirm Password <div id="epass2" class="error"
                                        style="width:max-content;	color: red;margin-left:185%"></div></span>
                                <span class="border"></span>
                            </label>
                        </div>
                        <div class="form-row-last">
                            <input type="submit" name="submit" class="register" value="Register">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script type="text/javascript">
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }



    let varification = () => {
        let uname = document.getElementById('full_name_1');

        let pass = document.getElementById('password_1');
        if (uname.value == "" && pass.value == "") {
            document.getElementById('uname').innerText = "Username required";
            document.getElementById('pass').innerText = "pass required";
            return false;
        } else {
            return true;
        }



    };
    let fullValidation = () => {


        let name1 = document.getElementById('name1');
        let mono = document.getElementById('mono');
        let address = document.getElementById('address');
        let mail = document.getElementById('mail');
        let pcode = document.getElementById('pcode');
        let pass1 = document.getElementById('pass1');
        let pass2 = document.getElementById('pass2');
		
		let chk;

        if (name1.value.length < 5) {
            document.getElementById('ename1').innerText = "Provide Full Name";
			chk=false;
			return false;
        } else if (/\d/.test(name1.value)) {
            document.getElementById('ename1').innerText = "Name Should not contains numbers";
			chk=false;
			return false;
        } else {
            document.getElementById('ename1').innerText = "";
			chk=true;
        }
        if (mono.value.length > 10 || mono.value.length < 10) { 
            
            document.getElementById('emono').innerText = "Mobile no must be 10 digits";
			chk=false;
			return false;
        } else if (!(/^[6-9]\d{9}/.test(mono.value))) {
            
            document.getElementById('emono').innerText = "Invalid Mobile";
			chk=false;
			return false;
        } else {
            document.getElementById('emono').innerText = "";
			chk=true;
        }

		if(!(/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+[.][A-Za-z]{2,4}$/.test(mail.value))){
			document.getElementById('email').innerText="Invalid Email";
			chk=false;
			return false;
		}
		else{
			document.getElementById('email').innerText="";
			chk=true;
		}
		

        if (address.value.length < 10) {
            document.getElementById('eaddress').innerText = "Provide Full Address";
			chk=false;
			return false;
        } else {
            document.getElementById('eaddress').innerText = "";
			chk=true;
        }

        if (!(/^\d{6}$/.test(pcode.value))) {
            document.getElementById('epcode').innerText = "Invalid Pincode";
			chk=false;
			return false;
        } else {
            document.getElementById('epcode').innerText = "";
			chk=true;
        }
        if (pass1.value < 6) {
            document.getElementById('epass1').innerText = " Minimum 5 characters";
			chk=false;
			return false;
        } else if (pass1.value.length > 20) {
            document.getElementById('pass1').innerText = "Maximum 20 characters";
			chk=false;
			return false;
        } else if (!(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@.#$!%*?&^?])[A-Za-z\d@.#$!%*?&]{5,20}$/.test(pass1
                .value))) {
            document.getElementById('epass1').innerText = "Password is too week";
			chk=false;
			return false;
        } else {
            document.getElementById('epass1').innerText = "";
			chk=true;
        }

        if (pass2.value == null || pass2.value != pass1.value) {
            document.getElementById('epass2').innerText = "Both Password must be same";
			chk=false;
			return false;
        } else {
            document.getElementById('epass2').innerText = "";
			chk=true;
        }

		if(chk===true){
			return true;
		}
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    </script>
</body>

</html>