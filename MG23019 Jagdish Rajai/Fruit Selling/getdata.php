<?php

include("db.php");

$selectimg="select * from product order by rand() limit 4";
$query=mysqli_query($conn,$selectimg);
$nums=mysqli_num_rows($query);
while($res=mysqli_fetch_array($query)){
    echo $res['pname'];
}


?>