<?php
include('db.php');
$qu="select * from product";
$res=mysqli_query($conn,$qu);

if(isset($_GET['dl'])){

    $selimg=mysqli_query($conn,'select * from product where pid='.$_GET['dl']);
    $r=mysqli_fetch_array($selimg);
    $imgval=$r[5];
    
    $qd='delete from product where pid='.$_GET['dl'];
    // echo $_GET['dl'];
    mysqli_query($conn,$qd);
    // $delfile = "./uploadedimages/" . $imgval;
    //         unlink($delfile);  


    $delfile="./uploadedimages/".$imgval;
        if(file_exists($delfile)){
            unlink($delfile);
        } 
        header("Location: all_pro.php");  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K.J. Fruis</title>
    <link rel="stylesheet" href="./css/allProduct.css">
</head>
<body>
<h1> All Products </h1>
    <div class="main">
        <table>
            <tr>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Quantity</th>
                <th>Quantity Type</th>
                <th>Product Image</th>
                <th>Product Season</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            
             while($row=mysqli_fetch_array($res)){
                // for($i=0;$i<10;$i++){
                echo '<tr>';
                echo '<td> '.$row[0] .'</td>';
                echo '<td> '.$row[1] .'</td>';
                echo '<td> '.$row[2] .'</td>';
                echo '<td> '.$row[3] .'</td>';
                // echo '<td> '.$row[4] .'</td>';
                if($row[4]=='p'){
                    echo ' <td> Per Piece </td>';
                }
                else{
                    echo '<td> Per KG </td>';
                }
                // echo '<td> '.$row[5] .'</td>';?>
                
                <td><img src="./uploadedimages/<?php echo $row[5] ?>" /></td>
                <?php
                if($row[6]=='mo'){echo ' <td> Monsoon </td>';}
                elseif($row[6]=='su'){echo ' <td> Summer </td>';}
                elseif($row[6]=='wi'){echo ' <td> Winter </td>';}
                elseif($row[6]=='ws'){echo ' <td> Winter & Summer </td>';}
                elseif($row[6]=='wm'){echo ' <td> Winter & Monsoon </td>';}
                elseif($row[6]=='sm'){echo ' <td> Summer & Monsoon </td>';}

                echo '<td> <a href="add_Product.php?ed='.$row[0].'">Edit</a></td>';
                echo '<td> <a href="all_pro.php?dl='.$row[0].'">Delete</a></td>';
                

                echo '</tr>';
            // }
        }
            ?>
        </table>
    </div>
</body>
</html>