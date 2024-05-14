<?php
include("db.php");
session_start();

if (isset($_POST['cnfOrder'])) {
            $newoid = 0;
            while ($newoid == 0) {
                $rndno = rand(10, 100000);
                $chkoid = mysqli_query($conn, "SELECT * FROM ordertbl WHERE ooid=" . $rndno);
                if (mysqli_num_rows($chkoid) == 0) {
                    $newoid = $rndno;
                    break;
                }
            }
            foreach ($_SESSION['products'] as $key => $value) {
                if ($value['qty'] > 0) {
                    $a="select * from product where pid='".$value['pid']."'";
                    $arr=mysqli_fetch_array(mysqli_query($conn,$a));
                    if($arr['qty']>$value['qty']){
                    $tem_query = mysqli_query($conn, "SELECT * FROM product WHERE pid=" . $value['pid']);
                    $tem = mysqli_fetch_assoc($tem_query);
                    $insOrder = "INSERT INTO ordertbl(ooid,cid, pid, amt, qty, odt) VALUES (" . $newoid . "," . $_COOKIE["username"] . "," . $value['pid'] . "," . $tem['price'] . "," . $value['qty'] . ", NOW())";
                    $res = mysqli_query($conn, $insOrder);
                    $ds="update product set qty=qty-".$value['qty']." where pid='".$value['pid']."'";
                    mysqli_query($conn, $ds);
                    }
                    else{
                        ?><script>alert("Fruit out of stock")</script><?php
                    }
                }
            }
            unset($_SESSION['products']);
            
            ?>
            <script> window.location.replace("./dashboard.php"); </script><?php

    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K.J. Fruis</title>
    <link rel="stylesheet" href="./css/payOption.css">
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <div class="main">
        <div class="container">
            <div class="lblBack" >
                <lable class="lblMain"> Confirm Order </lable><br>
                
                <lable class="lblMain" style="font-size:15px;"> Make sure your order </lable>
            </div><hr>
            <div class="details">
                <table>
                    <tr class="tr">
                        <td class="left">Total...</td>
                        <td class="right" id="tot"> <?php echo $_POST['tot']; ?>
                                            
                    </td>
                        
                    </tr>
                    <tr class="tr">
                        <td class="left">Discount...</td>
                        <td class="right" id="dis"><?php echo $dis=($_POST['tot'])*0.10; ?></td>
                        <input type="hidden" name= "finalAmt" value="<?php echo $_POST['tot']; ?>">
                    </tr>
                    
                    <tr class="tr">                    
                        <td class="left"><hr>Final Amount...</td>
                        <td class="right" id="net"><hr> <?php echo ($_POST['tot'])-$dis; ?></td>
                    </tr>
                    
                </table>
                <hr>

                <input type="submit" value="Confirm" name="cnfOrder">
            </div>            
        </div>   
    </div>
</form>
</body>
</html>