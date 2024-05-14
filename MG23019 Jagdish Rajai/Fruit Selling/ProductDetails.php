<?php

include("db.php");
session_start();

    if(isset($_COOKIE["username"]) && !(empty($_COOKIE))){
    
    if(isset($_GET['ses'])){
        if($_GET['ses']=='all'){
            
            $selectimg="select * from product";
        }
        elseif($_GET['ses']=='su'){
            $selectimg="select * from product where season='su'";
            $query=mysqli_query($conn,$selectimg);
            $nums=mysqli_num_rows($query);
            
            if($nums>0){
                $selectimg="select * from product where season='su'";
            }
            else{
                // $selectimg="select * from product";
                echo 'No Summer Fruit Available';
            }
            
        }
        elseif($_GET['ses']=='wi'){

            $selectimg="select * from product where season='wi'";
            $query=mysqli_query($conn,$selectimg);
            $nums=mysqli_num_rows($query);
            
            if($nums>0){
                $selectimg="select * from product where season='wi'";
            }
            else{
                // $selectimg="select * from product";
                echo 'No Winter Fruit Available';
            }
            
        }
        elseif($_GET['ses']=='mo'){
            $selectimg="select * from product where season='mo'";
            $query=mysqli_query($conn,$selectimg);
            $nums=mysqli_num_rows($query);
            
            if($nums>0){
                $selectimg="select * from product where season='mo'";
            }
            else{
                // $selectimg="select * from product";
                echo 'No Monsoon Fruit Available';
            }
            
        }
        else{
            $selectimg="select * from product";   
        }
    }else{
        $selectimg="select * from product";
        $query=mysqli_query($conn,$selectimg);
        $nums=mysqli_num_rows($query);
        $selectimg="select * from product";
    }
}else{
    ?>
            <script> window.location.replace("./signup.php"); </script><?php
}

    if(isset($_POST['add1']))
    {

        $id=$_POST['addid'];  
        $custid=$_COOKIE["username"];
        // $custid=28;
        $qty=$_POST['cartqty'];            

        

        function chkProduct($c,$idd){

            for($j=0;$j<$c;$j++){
                
                if(($_SESSION['products'][$j]['pid'])==$idd){                    
                    return $j;
                }                
            }
            return -1;
            
        }

        if(isset($_SESSION['products'])){      
            $cnt=count($_SESSION['products']);
            
            $tcid= chkProduct($cnt,$id);

            if($tcid!=-1){
                $a="select * from product where pid='".$id."'";
                $arr=mysqli_fetch_array(mysqli_query($conn,$a));
                if($arr['qty']>1){
                // echo $tcid;
                // $_SESSION['products'][$cnt]=array('user'=>$custid,'pid'=> $id,'qty' => $qty); 
                $_SESSION['products'][$tcid]=array('user'=>$custid,'pid'=> $id,'qty' => ($_SESSION['products'][$tcid]['qty'])+$qty);
                }
            }
            else{
                echo $tcid;
                $_SESSION['products'][$cnt]=array('user'=>$custid,'pid'=> $id,'qty' => $qty);        
                
            }

        }else{
            
            $_SESSION['products'][0]=array('user'=>$custid,'pid'=> $id,'qty' => $qty);
        }
    }
        ?>
         <!-- <pre> <?php print_r($_SESSION['products']); ?></pre> -->
      

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K.J. Fruis</title>
    <link rel="stylesheet" href="./css/productDetails.css">
    
    
</head>
<body>

        <?php 
        
       
        // $nums=mysqli_num_rows($query);
        // $res=mysqli_fetch_array($query);
        // echo $nums; 
        $query=mysqli_query($conn,$selectimg);
        while($res=mysqli_fetch_array($query)){ ?>
        <form method="post" action="ProductDetails.php" enctype="multipart/form-data" name="form_product">
        
            <div class="card-container">
        
                <div class="first">  
                    <div class="fimg">
                    
                    
                    <img src="./uploadedimages/<?php echo $res['fimage'];?>" alt="">                    
                    </div>                  
                    
                </div>
                <div class="second">
                    <h1><?php echo $res['pname'];?></h1>
                    <h3>Price: <?php echo $res['price'] ?> rs.</h3>
                    <h3><?php echo 'Per ';if($res['qty_type']=='p'){echo 'piece';}else{echo 'KG';}?></h3>
                    
                </div>
                <div class="third">
                    <!-- <h2>Add To Cart</h2><br> -->
                    <div class="cartwrapper">
                        <?php if($res['qty']>1){ ?>
                        <input type="number" name="cartqty" value="1" style="text-align:center"/>
                        <?php }else{?>
                            <input type="text" name="cartqty" value="Unavailable" style="text-align:center;border:none; color:red;" readonly/>
                        <?php }?>
                        
                    </div>                    
                    <div class="addbtn">
                    <?php echo "<input type='hidden' value='$res[pid]' name='addid'/>"; ?>
                    <?php if($res['qty']>1){ ?>
                        
                        <button name="add1" type="submit">Add to Cart</button>                                      
                        <?php }else{?>
                            <!-- <input type="text" name="cartqty" value="Unavailable" style="text-align:center;border:none; color:red;" readonly/> -->
                        <?php }?>
                    
                    </div>
                </div>
            </div>
            </form>
            <?php } ?>
        </div>  
     

          
    </div>
    
    

</body>
</html>

