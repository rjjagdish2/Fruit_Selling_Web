
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K.J. Fruis</title>
    <link rel="stylesheet" href=".\css\admin_nav.css">
</head>
<body>
    <div class="main_nav">
    <div class="mainnav">
        <div class="subnav">
            <div class="imgmain">
                <img src="./imgs/LOGO3.png" alt="">
            </div>
        </div>
        <div class="next">
            <div class="lbl"><a href="admin_nav_pan.php?nav=dash">Dashboard</a></div>
            
            <div class="lbl"><a href="admin_nav_pan.php?nav=addp,ed=">Add Product</a></div>
            <div class="lbl"><a href="admin_nav_pan.php?nav=upp">Modify Product</a></div>
            <div class="lbl"><a href="admin_nav_pan.php?nav=sho">Show Orders</a></div>
        </div>
    
    </div>
    <div class="subdis">
        <?php
        if(isset($_GET['ed']) && $_GET['ed']!=""){
            echo '<iframe src="add_Product.php?ed='.$_GET['ed'].'"></iframe>';                
        }
        else if(isset($_GET['nav'])){
        if($_GET['nav']=='dash'){
            echo '<iframe src="admin_dashboard.php"></iframe>';
        }
        elseif($_GET['nav']=='addp'){
                echo '<iframe src="add_Product.php"></iframe>';                
        }
        elseif($_GET['nav']=='upp'){
            echo '<iframe src="all_Pro.php"></iframe>';
        }
        elseif($_GET['nav']=='sho'){
            echo '<iframe src="allOrders.php"></iframe>';
        }
        else{
            echo '<iframe src="add_Product.php"></iframe>';
        }
    }
    else{
        echo '<iframe src="admin_dashboard.php"></iframe>';
    }
        ?>
    
    </div>
    </div>
</body>
</html>