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
        .zoom {
    transition: transform 0.2s; /* Animation */
    margin: 0 auto;
  }
  
  .zoom:hover {
    transform: scale(
      1.1
    ); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    cursor: pointer;
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

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><img src="https://images.vexels.com/media/users/3/131778/isolated/preview/2f58b79f41ddd2cf40e188c533a7f751-pizza-logo-template.png" alt="" class="rounded-circle" style="background: white ;
                border: 5px solid rgb(250, 78, 42);
                width: 100px;
                height: auto;"></li>
                    <li class="d-flex justify-content-end align-items-center">
                        <a href="" style="
                        text-transform: uppercase;
                        font-size: 40px;
                        margin-left: 20px;
                        text-decoration: none; 
                        color: black;
                        font-family:Sofia;
                        font-weight: 700;
                        ">Very good</a>
                    </li>

                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
                </form>

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
            </div>
    </header>

    <!-- -pizza- -->
    <div class="album py-5 ">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php
                $uid = isset($_GET['uid']) ? $_GET['uid'] : null;
                $conn = new mysqli("202.28.34.197", "web66_65011212203", "65011212203@csmsu", "web66_65011212203");
                $sql = "SELECT * FROM pizza where size = 1  and  pizzacrust = 1";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id = $row["pid"];
                        $name = $row["name"];
                        $url = $row["pizzaurl"];
                        $price = $row["price"];
                        echo '    
                            <div class="col">
                                <div class="card shadow-sm" style="border: 2px solid #029C10; ">
                                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225">
                                    <image xlink:href="' . $url . '" width="100%" height="100%" preserveAspectRatio="xMidYMid slice" />
                                    </svg>

                                    <div class="card-body">
                                        <p class="card-text text-center" >
                                            ' . $name . '</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-grid col-6 mx-auto">
                                            
                                            <a href="pizza2.php?id=' . $id . '&uid=' . $uid . '" >
                                                <button type="button" class="btn  " style="display: flex;      
                                                width: 200px;
                                                justify-content: space-between;
                                                background-color: #029C10  ; 
                                                font-weight: bold;
                                                color:white">
                                                <span>' . $price . '$</span>
                                                <span>+ Select</span>
                                            
                                                </button></a>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                    }
                }


                ?>

            </div>
        </div>
    </div>
    <?php
    //รับข้อมูล
    if (isset($_GET["add"])) {
        
        //id pizza
        $id = $_GET["id"];
        //user id
        $uid = $_GET["uid"];
        
        $size = $_GET["size"];
        $crust = $_GET["crust"];
        $amount = $_GET["amount"];
        $conn = new mysqli("202.28.34.197", "web66_65011212203", "65011212203@csmsu", "web66_65011212203");
        //หา pizza หลัก
        $sql_pizza = "SELECT * from pizza where pid= ?";
        $stmt_pizza = $conn->prepare($sql_pizza);
        $stmt_pizza->bind_param("i",$id);
        $stmt_pizza->execute();
        $result_pizza = $stmt_pizza->get_result();
        if($result_pizza->num_rows>0){
            while($row = $result_pizza->fetch_assoc()){
                $priec_pizza=$row["price"];
                //เอาชื่อมา check
                $name_pizza = $row["name"];
                
                
            }
        }
        //หา size
        $sql_size = "SELECT * from sizedetail where sid= ?";
        $stmt_size = $conn->prepare($sql_size);
        $stmt_size->bind_param("i", $size);
        $stmt_size->execute();
        $result_size = $stmt_size->get_result();
        if ($result_size->num_rows > 0) {

            while ($row = $result_size->fetch_assoc()) {
                $price_size = $row["pricesize"];

               
            }
        } else {
            
        }
        //หา crust
        $sql_crust = "SELECT * from pizzacrust where cid= ?";
        $stmt_crust = $conn->prepare($sql_crust);
        $stmt_crust->bind_param("i",$crust);
        $stmt_crust->execute();
        $result_crust =$stmt_crust->get_result();
        if($result_crust->num_rows>0){
            while($row = $result_crust->fetch_assoc()){
                $price_crust = $row["pricecrust"];
                
            }
        }
        //รวมผล
        $totalprice=($priec_pizza+$price_size+$price_crust)*$amount;
        
        
        //uid
        //amount
        //หา pid และทำการ insert
        $sql_select_pizza = "SELECT * 
                             from pizza 
                             where size = ?
                             and pizzacrust = ?
                             and name = ?";
        $stmt_select_pizza = $conn->prepare($sql_select_pizza);
        $stmt_select_pizza->bind_param("iis",$size,$crust,$name_pizza);
        $stmt_select_pizza->execute();
        $result_select_pizza = $stmt_select_pizza->get_result();
        if($result_select_pizza->num_rows>0){
            while($row = $result_select_pizza->fetch_assoc()){
                    $pizza_id=$row["pid"];
            }
        }
        $check_sql = "SELECT * FROM orderamount WHERE uid = ? AND pid = ?";
        $stmt_check = $conn->prepare($check_sql);
        $stmt_check->bind_param("ii", $uid,$pizza_id);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            // มีข้อมูลที่ซ้ำกันอยู่ในฐานข้อมูล
            $sql_duplicate = "UPDATE orderamount set amount = amount + ? where pid = ?
                                                                         and uid = ?";
            $stmt_duplicate = $conn->prepare($sql_duplicate);
            $stmt_duplicate->bind_param("iii",$amount,$pizza_id,$uid);
            $stmt_duplicate->execute();
        } else {
            // ไม่มีข้อมูลที่ซ้ำกัน คุณสามารถเพิ่มข้อมูลใหม่ลงในฐานข้อมูลได้
            $oid = isset($_POST['oid']) ? $_POST['oid'] : null;
            $sql_basket = "INSERT INTO orderamount(oid, uid, pid, amount) VALUES(?, ?, ?, ?)";
            $stmt_basket = $conn->prepare($sql_basket);
            $stmt_basket->bind_param("iiii", $oid, $uid,$pizza_id, $amount);
            
            if ($stmt_basket->execute()) {
                
            } else {
                echo "Insertion failed: " . $stmt_basket->error;
            }
        }
        
    } else {
       
    }
   


    ?>






</body>

</html>