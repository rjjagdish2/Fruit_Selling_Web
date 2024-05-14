<?php
include("db.php");

if(isset($_POST['submit']))
{
    $name=$_POST['pname'];
    $price=$_POST['price'];
    $qty=$_POST['qty'];
    $qt_type=$_POST['qt_type'];    
    $season=$_POST['season'];

    $img=$_FILES['fimage'];    
    $fimg=$img["name"];
    $ftmp_name=$img["tmp_name"];
    $fruit_image=$fimg;

    move_uploaded_file($ftmp_name,"./uploadedimages/".$fruit_image);

    $query=mysqli_query($conn,"INSERT INTO product(pname, price, qty, qty_type, fimage, season) VALUES 
    ('".$name."','".$price."','".$qty."','".$qt_type."','".$fruit_image."','".$season."')");
    // $query=mysqli_query($conn,"INSERT INTO product(pname, price, qty, qty_type, fimage, season) VALUES 
    // ('$name',$price,$qty,'$qt_type','$fruit_image','$season')");

    
    
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K.J. Fruis</title>
    <link rel="stylesheet" href="./css/addProduct.css">
</head>
<body>

<div class="main">
    <div class="container">
        <div class="title"> Add Product </div>
        <div class="formDiv"> 

        <form method="post" action="insert_product.php" enctype="multipart/form-data">
            <div class="subTitle">Product Name: </div><br>
    <input type="text" placeholder="Product Name" name="pname"/><br/>
    <div class="subTitle">Product Price: </div><br>
    <input type="text" placeholder="Product Price" name="price"/><br/>
    <div class="subTitle">Product Quantity: </div><br>
    <input type="text" placeholder="Product Quantity" name="qty"/><br/>
    
    <select name="qt_type"> 
        <option value="k">Per KG</option>
        <option value="p">Per Peas</option>
        
    </select><br/>
    <select name="season"> 
        <option value="su">Summer</option>
        <option value="wi">Winter</option>
        <option value="mo">Monsoon</option>
        <option value="ws">Winter Summer</option>
        <option value="wm">Winter Monsoon</option>
        <option value="sm">Summer Monsoon</option>
    </select><br/>

    <div class="fileDiv"><input type="file" name="fimage" ></div><br />
    <div class="fileDivBtn"><input type="submit" name="submit"/></div>
</form> 

        </div>     
    </div>
</div>




</body>
</html>
