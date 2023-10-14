<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="type_2.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #FFBF00;
        }

        p {
            font-size: 20px;
            font-weight: 700;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;

        }

        a {
            text-decoration: none;

        }
        img{
            width: 200px;
            height: auto;
        }
        
        .btn-danger:hover {
        box-shadow: 0 4px 8px 0 #ff9999, 0 6px 20px 0 #ff9999;
        }
        table{
            text-align: center;
        }
        thead{
            height: 40px;
        }
        tfoot{
            height: 50px;
        }
    </style>
</head>

<body>
    <!-- หัวข้อ -->
    <header class="p-3 text-white sticky-top " style="background-color: #F76416;
                                                      box-shadow: 0px 1px 3px rgb(255, 233, 183);   ;">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>

                <?php
                if (isset($_GET["uid"])) {
                    $uid = isset($_GET['uid']) ? $_GET['uid'] : null;
                echo '<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="index.php?uid=' . $uid . '"><img src="https://images.vexels.com/media/users/3/131778/isolated/preview/2f58b79f41ddd2cf40e188c533a7f751-pizza-logo-template.png" alt="" class="rounded-circle" style="background: white ;
                    border: 5px solid rgb(250, 78, 42);
                    width: 100px;
                    height: auto;"></a></li>
                    <!-- rgb(250, 78, 42) -->
                    <li class="d-flex justify-content-end align-items-center">
                        <a href="index.php?uid=' . $uid . '" style="
                            text-transform: uppercase;
                            font-size: 40px;
                            margin-left: 20px;
                            text-decoration: none; 
                            color: black;
                            font-family:Sofia;
                            font-weight: 700;
                            ">Very good</a>
                    </li>

                </ul>';
                }
                ?>
                 
                <div class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <!-- ทำชื่อ username -->
                    <?php
                    if (isset($_GET['uid'])) {
                        $uid = isset($_GET['uid']) ? $_GET['uid'] : null;
                        $conn = new mysqli("202.28.34.197", "web66_65011212203", "65011212203@csmsu", "web66_65011212203");
                        $sql_uid = "SELECT * 
                                from user 
                                where uid = ?";
                        $stmt_uid = $conn->prepare($sql_uid);
                        $stmt_uid->bind_param("i", $uid);
                        $stmt_uid->execute();
                        $result_uid = $stmt_uid->get_result();
                        if ($result_uid->num_rows > 0) {
                            while ($row = $result_uid->fetch_assoc()) {
                                $name = $row["name"];
                                echo '<button type="button" class="btn btn-warning" style="cursor:context-menu;">
                            <i class="bi bi-person-circle"></i>
                            ' . $name . '</button>
                            </div>';
                            echo '   <div class="dropdown me-3">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Login | Sign-up
                                <i class="bi bi-lock-fill"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="login.php">Login</a></li>
                                <li><a class="dropdown-item" href="register.php">Sign-up</a></li>
                                <li><a class="dropdown-item" href="login.php" style="color : red">Logout</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                            
                            <button class="btn btn-outline rounded-circle p-3 lh-1 custom zoom" type="button" style="background-color: BlanchedAlmond;">
                           <a href="busket.php?uid='.$uid.'"><i class="bi bi-cart3" style="font-size: 30px;"></i></a>
                        </button>
                        ';
                            }
                        }
                    } else {
                        echo 'null';
                    }
                    ?>
                 
                </div>
        </div>
    </header>
    <!-- busket -->
    <div class="album py-3 ">
        <div class="container">
            <div class="row card">
                <h1 class="container text-center">รายการสั่งซื้อสินค้า</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Pizza</th>
                            <th>PizzaName</th>
                            <th>Size</th>
                            <th>Crust</th>
                            <th>Amount</th>
                            <th>Total</th>
                            <th>เพิ่ม | ลด</th>
                            <th>Delete</th>

                        </tr>
                    </thead>


                    <!-- ทำช่องสินค้า -->
                    <tbody>
                        <?php

                            //ตัวหลัก
                            $customer_id=$_GET['uid'];
                             $conn = new mysqli("202.28.34.197", "web66_65011212203", "65011212203@csmsu", "web66_65011212203");
                             $base_sql = "SELECT user.*, pizza.*, SUM(orderamount.amount) 
                                          FROM pizza, user, orderamount
                                          WHERE pizza.pid = orderamount.pid
                                          AND user.uid = orderamount.uid
                                          AND user.uid = ?
                                          GROUP BY orderamount.pid, orderamount.uid";

                            $stmt_base = $conn->prepare($base_sql);
                            $stmt_base->bind_param("i",$customer_id);

                            $stmt_base->execute();
                            $result_base = $stmt_base->get_result();
                            //ค่าเก็บ
                            $count = 1;
                            $allamount =0;
                            $allprice = 0;
                            while($row = $result_base->fetch_assoc()){
                                $uid = $row["uid"];
                                $pid = $row["pid"];
                                $totalAmount = $row["SUM(orderamount.amount)"];
                            
                                // ดึงข้อมูล user
                                $sql_user = "SELECT * from user where uid = ?";
                                $stmt_user = $conn->prepare($sql_user);
                                $stmt_user->bind_param("i",$uid);
                                $stmt_user->execute();
                                $result_user = $stmt_user->get_result();
                                if($result_user->num_rows>0){
                                    while($row_user = $result_user->fetch_assoc()){
                                        $name_user = $row_user["name"];
                                    }
                                }
                            
                                // ดึงข้อมูล pizza
                                $sql_pizza = "SELECT * from pizza, sizedetail, pizzacrust where pizza.size = sizedetail.sid and pizza.pizzacrust = pizzacrust.cid and pid = ?";
                                $stmt_pizza = $conn->prepare($sql_pizza);
                                $stmt_pizza->bind_param("i",$pid);
                                $stmt_pizza->execute();
                                $result_pizza = $stmt_pizza->get_result();
                                if($result_pizza->num_rows>0){
                                    while($row_pizza = $result_pizza->fetch_assoc()){
                                        $pizza_id = $row_pizza["pid"];
                                        $name_pizza = $row_pizza["name"];
                                        $url = $row_pizza["pizzaurl"];
                                        $size = $row_pizza["sname"];
                                        $crust = $row_pizza["cname"];
                                        $price_pizza=$row_pizza["price"];
                                        $price_size=$row_pizza["pricesize"];
                                        $price_crust=$row_pizza["pricecrust"];
                                    }
                                } 
                            $totalprice=($price_pizza+$price_size+$price_crust)*$totalAmount;
                            
                            ?>
                            <tr>
                                <td><?=$count?></td>
                                <td><img src="<?=$url?>" alt=""></td>
                                <td><?=$name_pizza?></td>
                                <td><?=$size?></td>
                                <td><?=$crust?></td>
                                <td><?=$totalAmount?></td>
                                <td><?=$totalprice?></td>
                                <!-- ปุ่มบวกลบ -->
                                <td>
                                <a href="add.php?uid=<?=$uid?>&pid=<?=$pizza_id?>">
                                <button type="button" class="btn btn-success">+</button>
                                </a>
                                
                                <a href="reduce.php?uid=<?=$uid?>&pid=<?=$pizza_id?>">
                                <button type="button" class="btn btn-danger">-</button>
                                </a>
                                </td>
                            <!-- ปุ่มนำออก -->
                                <td>
                                <a href="delete.php?uid=<?=$uid?>&pid=<?=$pizza_id?>">
                                <button type="button" class="btn btn-danger" style="width: 80px;
                                ">
                                นำออก</button>
                                </a>
                                </td>
                            </tr>
                            <?php
                            //การเก็บค่าผลรวม
                            $count = $count+1;
                            $allamount = $allamount + $totalAmount; 
                            $allprice = $allprice + $totalprice;
}
?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>total All :</td>
                            <td><?=$allamount?></td>
                            <td><?=$allprice?></td>
                            <td>


                            </td>
                            <td>
                                <a href="index.php?uid=<?=$uid?>">
                                    <button type="button" class="btn btn-success"
                                    style="width: 130px;"
                                    
                                    >
                                    <i class="bi bi-cart2"></i>
                                    สั่งซื้อเพิ่ม</button>
                                </a>
                            </td>
                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>
    </div>
</body>

</html>