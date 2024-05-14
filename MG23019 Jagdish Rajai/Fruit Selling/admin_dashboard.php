<?php
include_once ('db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K.J. Fruis</title>
    <link rel="stylesheet" href="./css/adminDash.css">
</head>

<body>
    <div class="main">
        <h1> Dashboard </h1>

        <div class="mainsub">

            <a href="all_pro.php">
                <div class="sub1">
                    <?php
                    $tp = "select count(*) from product";
                    $res = mysqli_query($conn, $tp);
                    $r = mysqli_fetch_array($res);
                    // echo $r[0];
                    ?>
                    <h3>Total Products</h3>
                    <h2>
                        <?php echo $r[0]; ?>
                    </h2>


                </div>
            </a>
            <a href="allOrders.php">
                <div class="sub1">

                    <?php

                    $so = "select * from ordertbl group by ooid having deli=0";
                    $res = mysqli_query($conn, $so);

                    $count = 0;
                    while ($r = mysqli_fetch_array($res)) {
                        $ao = "select * from ordertbl where ooid=" . $r[0];
                        $gr = mysqli_query($conn, $ao);
                        $cnt = 0;
                        while ($row = mysqli_fetch_array($gr)) {
                            $cnt++;
                        }
                        $count += 1;
                    }


                    ?>

                    <h3>Panding Orders</h3>
                    <h2>
                        <?php echo $count; ?>
                    </h2>

                </div>
            </a>
            <a href="allOrders.php">
                <div class="sub1">
                    <?php

                    $so = "select * from ordertbl group by ooid";
                    $res = mysqli_query($conn, $so);

                    $count = 0;
                    while ($r = mysqli_fetch_array($res)) {
                        $ao = "select * from ordertbl where ooid=" . $r[0];
                        $gr = mysqli_query($conn, $ao);
                        $cnt = 0;
                        while ($row = mysqli_fetch_array($gr)) {
                            $cnt++;
                        }
                        $count += 1;
                    }


                    ?>

                    <h3>Total Orders</h3>
                    <h2>

                        <?php echo $count; ?>
                    </h2>



                </div>
            </a>
        </div>


        <div class="mainsub">
            <a href="allOrders.php">
                <div class="sub1">
                    <?php

                    $so = "select * from ordertbl group by ooid";
                    $res = mysqli_query($conn, $so);

                    $count = 0;
                    while ($r = mysqli_fetch_array($res)) {
                        $ao = "select * from ordertbl where ooid=" . $r[0];
                        $gr = mysqli_query($conn, $ao);

                        while ($row = mysqli_fetch_array($gr)) {
                            $count += $row[3];
                        }

                    }


                    ?>

                    <h3>Total Selling</h3>
                    <h2>
                        <?php echo 'Rs.' . $count; ?>
                    </h2>

                </div>
            </a>
            <a href="">
                <div class="sub1">
                    <?php

                    $tp = "select count(*) from client";
                    $res = mysqli_query($conn, $tp);
                    $r = mysqli_fetch_array($res);
                    // echo $r[0];
                    ?>
                    <h3>Total Clients</h3>
                    <h2>
                        <?php echo $r[0]; ?>
                    </h2>


                </div>
            </a>
        </div>

    </div>

</body>

</html>