<?php 
include('db.php');


if(isset($_GET['doid']) && isset($_GET['dpid'])){
    echo $_GET['doid'];
    echo $_GET['dpid'];
    $delp="delete from ordertbl where ooid=".$_GET['doid']." and pid=".$_GET['dpid'];
    mysqli_query($conn,$delp);
    header("Location: allOrders.php");
}
if(isset($_POST['delord'])){
    $oid=$_POST['oid'];
    $dq="delete from ordertbl where ooid=".$oid;
    mysqli_query($conn,$dq);
    header("Location: allOrders.php");
}
if(isset($_POST['submit'])){
    $oid=$_POST['oid'];
    $ord=$_POST['ord'];
    $pkd=$_POST['pkd'];
    
    if($pkd==""){
        $upo="update ordertbl set packed=0 where ooid=".$oid;
        mysqli_query($conn,$upo);
    }
    else{
        $upo="update ordertbl set packed=1 where ooid=".$oid;
        mysqli_query($conn,$upo);
    }
    if($ord==""){
        $upd="update ordertbl set deli=0 where ooid=".$oid;
        mysqli_query($conn,$upd);
    }
    else{
        $upd="update ordertbl set deli=1  where ooid=".$oid;
        mysqli_query($conn,$upd);
    }
    if($pkd=="" && $ord!=""){
        $upd="update ordertbl set deli=1,packed=1 where ooid=".$oid;
        mysqli_query($conn,$upd);
    }
     header("Location: allOrders.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K.J. Fruis</title>
    <link rel="stylesheet" href="./css/allOrders.css">
</head>
<body>
    <h1> All Orders </h1>
    <?php
    $so="select * from ordertbl group by ooid";
    $res=mysqli_query($conn,$so);
    
    while($r=mysqli_fetch_array($res)){
        // for($i=0;$i<10;$i++){
        echo '<form action="#" method="POST">';
        $ao="select * from ordertbl where ooid=".$r[0];
        $gr=mysqli_query($conn,$ao);
        echo '<table>';
        echo '<tr><td> Order ID:  '. $r[0].'</td> <td colspan=10> </td></tr>';
        echo '<tr>';
        echo '<th>Customer Id </th>';
        echo '<th>Product Id </th>';
        echo '<th>Amount </th>';
        echo '<th>Quantity </th>';
        echo '<th>Order Date </th>';
        echo '<th>Delete </th>';
        echo '</tr>';
        echo '<input type="hidden" name="oid" value="'.$r[0].'"/>';
        while($row=mysqli_fetch_array($gr)){      
                  
        echo '<tr>';        
        echo '<td>'.$row[1].'</td>';
        $selimg=mysqli_fetch_array(mysqli_query($conn,"select * from product where pid=".$row[2]));
        // echo '<td>'.$row[2].'</td>';
        ?>
        <td><img src="./uploadedimages/<?php echo $selimg[5]; ?>" /></td>
        <?php
        // echo '<td><img src="./uploadedimages/'.$selimg[5].'"</td>';
        echo '<td>'.$row[3].'</td>';
        echo '<td>'.$row[4].'</td>';
        
        $date=explode(" ",$row[5]);
        echo '<td>'.$date[0].'</td>';
        echo '<td> <a href="allOrders.php?dpid='.$row[2].'&doid='.$row[0].'">Delete</a></td>';
       echo '</tr>';
    }
    echo '<td colspan=3>';if($r[6]==0){echo '<input type="checkbox" name="pkd" value="pkd"/> Packed';}
        else{echo '<input type="checkbox" name="pkd" value="pkd" checked/> Packed';};echo '</td>';
        echo '<td>';if($r[7]==0){echo '<input type="checkbox" name="ord" value="ord"/> Ordered';}
    else{echo '<input type="checkbox" name="ord" value="ord" checked/> Ordered';}
    echo '<td>';echo '<input type="submit" name="submit" value="Confirm">';
    echo '<td>';echo '<input type="submit" name="delord" value="Delete">';
    echo '</td>';
    echo '</table>';
    // echo '<hr>';
    echo '</form>';
    }
// }
    ?>
</body>
</html>