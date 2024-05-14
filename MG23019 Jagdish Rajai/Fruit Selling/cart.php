
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K.J. Fruis</title>
    <?php
    include "db.php";
    session_start();
    $finsum=0;

    if(isset($_POST['del1']))
    {


        $id=$_POST['addid'];  
        $custid=$_COOKIE["username"];
        $key=$_POST['key1'];
        // $custid=28;
        echo $_SESSION['products'][$key]['qty']=0;
    }
    ?>
    <link rel="stylesheet" href="./css/cart.css">
</head>
<body>

<div class="main">  

        <?php


        if(isset($_SESSION['products'])){                
         foreach ($_SESSION['products'] as $key => $value) {
            if($value['qty']>0){
            $selectimg="select * from product where pid = ".$value['pid'];
            $query=mysqli_query($conn,$selectimg);
            $nums=mysqli_num_rows($query);

            
            
            // $res=mysqli_fetch_array($query);
            // echo $nums; 
    
            if($nums>0){        
            while($res=mysqli_fetch_array($query)){ 
                $chp="select * from product where pid=".$value['pid'];
            $cq=mysqli_query($conn,$chp);
            $c=mysqli_fetch_array($cq);
            if($c['qty']>1){
                
            ?>
            <form method="post" action="cart.php" enctype="multipart/form-data">
            
                <div class="card-container">
            
                    <div class="first">  
                        <div class="fimg">
                        
                        
                        <img src="./uploadedimages/<?php echo $res['fimage'];?>" alt="">    
                        <input type="hidden" value="$res['pid']" name="tpid">
                        
                        </div>                  
                        
                    </div>
                    <div class="second">
                        <h1><?php echo $res['pname'];?></h1>
                        <h3>Price: <?php echo $res['price'] ?> rs.</h3>
                        <h3><?php echo 'Per ';if($res['qty_type']=='p'){echo 'piece';}else{echo 'KG';}?></h3>
                        <input type="hidden" value=<?php echo $key; ?> name="key1">
                        
                    </div>
                    <div class="third">
                        
                        <div class="cartwrapper">
                            <!-- <input type="number" name="cartqty" value="<?php $res['price'] ?>"/> -->
                            <?php echo "<input type='number' value='".$value['qty']."' name='cartqty' />"; ?>
                        </div>                    
                        <div class="addbtn">
                        <?php
                        
                        $sum=$res['price']*$value['qty'];
                        $finsum+=$sum;
                        echo "<lable >Total: $sum </lable>";
                        
                        echo "<input type='hidden' value='$res[pid]' name='addid' />";
                        
                        
                        // echo '<br>';
                        // echo '<br>';
                        //  echo "<input type='text' value='$sum' name='sum' style='margin-top:30px;' />"; ?>
                        <button name="del1" type="submit" style='margin-bottom:15px;'>Delete</button>
                        </div>
                    </div>
                </div>
                </form>
                <?php }} 
                }
                else{
                 echo "Please Add Some Item To Cart";
                }
            }    }   
            
            if($finsum>0){
            ?>
            <div class="card-container-bottom">
            <div class="first-bottom">                      
                <?php echo 'Total '. $finsum; ?>
            <form action="payOptions.php" method="post">
                <!-- <button id="chkout()">Check Out</button> -->
                <input type="hidden" name="tot" value=<?php echo $finsum; ?>>
                <input type="submit" name="chkout" value="Check Out"> 
                <?php
        }
        else{
            echo "No Product Selected ";
        }
    }

        else{
            echo "No Product Selected after";
        }
                ?>                             
        </form>
            
        
        
    </div>
</body>

</html>