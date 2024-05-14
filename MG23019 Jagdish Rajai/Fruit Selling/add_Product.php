<?php
include("db.php");

$nameval="";
$priceval="";
$qtyval="";
$qtytypeval="";
$imgval="";
$sesval="";
$tempid=0;
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

    // header("url=dashboard.php");
}

if(isset($_GET['ed'])){
    $fd="select * from product where pid=".$_GET['ed'];
    $tempid=$_GET['ed'];
    
    $re=mysqli_query($conn,$fd);
    $res=mysqli_fetch_array($re);
    $nameval=$res['pname'];
    $priceval=$res['price'];
    $qtyval=$res['qty'];
    $qtytypeval=$res['qty_type'];
    $imgval=$res['fimage'];
    $sesval=$res['season'];

 
}
   
if(isset($_POST['update'])){
    $name=$_POST['pname'];
    $price=$_POST['price'];
    $qty=$_POST['qty'];
    $qt_type=$_POST['qt_type'];    
    $season=$_POST['season'];

    $img=$_FILES['fimage'];    
    $fimg=$img["name"];
    $ftmp_name=$img["tmp_name"];
    $fruit_image=$fimg;

    $tempid=$_POST['proid'];
    $imgval=$_POST['imgval'];

    if($fimg==""){
        echo $tempid;
        $query=mysqli_query($conn,"UPDATE product SET pname='".$name."',price='".$price."',qty='".$qty."',qty_type='".$qt_type."',season='".$season."' WHERE pid=".$tempid);
        
    }else{
        // $delfile = "./uploadedimages/" . $imgval;

        //     unlink($delfile);                                    
        $delfile="./uploadedimages/".$imgval;
        if(file_exists($delfile)){
            unlink($delfile);
        } 
        move_uploaded_file($ftmp_name,"./uploadedimages/".$fruit_image);
        $query=mysqli_query($conn,"update product set pname='".$name."',price='".$price."',qty='".$qty."',qty_type='".$qt_type."',season='".$season."',fimage='".$fruit_image."' where pid=". $tempid);

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
    <link rel="stylesheet" href="./css/addPro.css">

</head>

<body>

    <form onsubmit="return val()" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
        <div class="main">
            <div class="container">
                <div class="part1">
                    <h1>Add Product</h1>
                    <div class="cont">
                        <div class="sub">
                            <?php
                    if($nameval==""){
                        echo 'Product Name:<input type="text" placeholder="Product Name" name="pname" id="vpname"/>';
                    }
                    else{
                        echo 'Product Name:<input type="text" placeholder="Product Name" name="pname" id="vpname" value="'.$nameval.'"/>';
                        echo '<input type="hidden" placeholder="Product Name" name="proid" value="'.$tempid.'"/>';
                        echo '<input type="hidden" placeholder="Product Name" name="imgval" value="'.$imgval.'"/>';
                    }
                    ?>

                        </div>

                        <div class="sub">
                            <?php
                    if($priceval==""){
                        echo 'Product Price:<input type="text" placeholder="Product Price" name="price" id="vprice"/>';
                    }
                    else{
                        echo 'Product Price:<input type="text" placeholder="Product Price" id="vprice" name="price" value="'.$priceval.'"/>';
                    }
                    ?>

                        </div>
                        <div class="sub">
                            <?php
                    if($qtyval==""){
                        echo 'Product Quantity:<input type="text" placeholder="Product Quantity" name="qty" id="vqty"/>';
                    }
                    else{
                        echo 'Product Quantity:<input type="text" placeholder="Product Quantity" id="vqty" name="qty" value="'.$qtyval.'"/>';
                    }
                    ?>

                        </div>
                        <div class="sub">
                            Quantity Type:
                            <?php
                    if($qtytypeval!=""){
                        if($qtytypeval=="k"){?>

                            <select name="qt_type">
                                <option value="k">Per KG</option>
                                <option value="p">Per Piece</option>
                            </select>
                            <?php }
                elseif($qtytypeval=="p"){?>
                            <select name="qt_type">
                                <option value="k">Per KG</option>
                                <option value="p" selected>Per Piece</option>
                            </select>
                            <?php }
                }else{?>
                            <select name="qt_type">
                                <option value="k">Per KG</option>
                                <option value="p">Per Piece</option>
                            </select>
                            <?php } ?>
                        </div>
                        <div class="sub">
                            Season:
                            <?php
                    ?>
                            <select name="season">
                                <?php if($sesval=="su"){echo '<option value="su" checked>Summer</option>';} 
                    else{echo '<option value="su">Summer</option>';}
                    if($sesval=='wi'){echo '<option value="wi" selected>Winter</option>';}
                    else{echo '<option value="wi">Winter</option>';}
                    if($sesval=='mo'){echo '<option value="mo" selected>Monsoon</option>';}
                    else{echo '<option value="mo">Monsoon</option>';}
                    if($sesval=='ws'){echo '<option value="ws" selected>Winter Summer</option>';}
                    else{echo '<option value="ws">Winter Summer</option>';}
                    if($sesval=='wm'){echo '<option value="wm" selected>Winter Monsoon</option>';}
                    else{echo '<option value="wm">Winter Monsoon</option>';}
                    if($sesval=='sm'){echo '<option value="sm" selected>Summer Monsoon</option>';}
                    else{echo '<option value="sm">Summer Monsoon</option>';}                                        
                    ?>
                            </select>

                        </div>
                    </div>

                </div>
                <div class="part1 line">

                    <div class="cont">
                        <div class="sub hiiden">
                            <input type="file" name="fimage" id="InputImg">
                        </div>
                        <div class="sub">
                            <?php if($imgval==""){echo '<img src="./imgs/noimg.jpg" id="newImg">';}
                else{
                    echo '<img src="./uploadedimages/'.$imgval.'" id="newImg">';
                }?>
                        </div>
                        <div class="sub sub2">
                            <?php if(isset($_GET['ed']) && $_GET['ed']!=""){
                        echo '<input type="submit" name="update" value="Update" />';
                        
                    }else{
                        echo '<input type="submit" name="submit"/>';
                    } ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
</body>
<script type="text/javascript">
InputImg.onchange = evt => {
    const [file] = InputImg.files
    if (file) {
        var fileInput =
            document.getElementById('InputImg');

        var filePath = fileInput.value;

        // Allowing file type
        var allowedExtensions =
            /(\.jpg|\.jpeg|\.png|\.gif)$/i;

        if (!allowedExtensions.exec(filePath)) {
            alert('Invalid file type');
            fileInput.value = '';
            return false;
        } else {
            newImg.src = URL.createObjectURL(file);
            return true;
        }

    }
}

let val = () => {
    chk=false;
    if (document.getElementById('vpname').value == "") {
        alert("Provide Product Name");
        chk = false;
        return false;
    } else {
        chk = true;
    }


    if (document.getElementById('vprice').value != "") {
        if (!(/^\d+$/.test(document.getElementById('vprice').value))) {
            alert("Provide Valid Product Price");
            chk = false;
            return false;
        }
        else{
            chk=true;
        }
    } else {
        alert("Provide Product Price");
        chk = false;
        return false;
    }


    if (document.getElementById('vqty').value != "") {
        if (!(/^\d+$/.test(document.getElementById('vqty').value))) {
            alert("Provide Valid Product Quantity");
            chk = false;
            return false;
        }
        else{
            chk=true;
        }
    } else {
        alert("Provide Product Quantity");
        chk = false;
        return false;
    }

    if(chk===true){
        return true;
    }
    else{
        return false;
    }
}
</script>

</html>