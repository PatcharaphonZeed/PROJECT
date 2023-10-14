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

        .card {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            width: 500px;
            border-radius: 10px;
            padding: 10px;

        }

        h1 {
            margin-top: 2%;
            margin-right: 3%;
            font-size: 17px;
            font-weight: 100;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;

        }

        h2 {
            font-size: 20px;
            font-weight: 700;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        h5 {
            font-size: 25px;
            font-weight: 700;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        p {
            font-size: 16px;
            font-weight: 400;
        }

        .custom-dropdown select {
            width: 150px;
            /* กว้างเต็มความกว้างของพื้นที่ที่รองรับ */

            padding: 1px;
            /* ขนาดของ padding ภายใน dropdown */
            border: 1px solid #ccc;
            /* เส้นขอบของ dropdown */
            border-radius: 5px;
            /* รูปร่างของขอบ dropdown */
            font-size: 20px;
            /* ขนาดตัวอักษร */
            background-color: #fff;
            /* สีพื้นหลัง */
            color: #333;
            /* สีของตัวอักษร */
        }

        .custom-dropdown-crust select {
            width: 150px;
            /* กว้างเต็มความกว้างของพื้นที่ที่รองรับ */
            padding: 1px;
            /* ขนาดของ padding ภายใน dropdown */
            border: 1px solid black;
            /* เส้นขอบของ dropdown */
            border-radius: 5px;
            /* รูปร่างของขอบ dropdown */
            font-size: 20px;
            /* ขนาดตัวอักษร */
            background-color: #fff;
            /* สีพื้นหลัง */
            color: #333;
            /* สีของตัวอักษร */
            font-size: 16px;

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
        </div>
    </header>
    <!--การเลือกขนาดและความกรอบ -->

    <?php
    $idG = $_GET["id"];
    $uid = $_GET["uid"];
    $conn = new mysqli("202.28.34.197", "web66_65011212203", "65011212203@csmsu", "web66_65011212203");
    $sql = "SELECT * FROM pizza where pid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idG);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row["pid"];
            $name = $row["name"];
            $url = $row["pizzaurl"];
            $price = $row["price"];
            $pizzainfo = $row["pizzainfo"];

            echo '<div class="card shadow-sm card mb-3" style="width:1000px; max-width: 800px;
                                    border: 3px solid rgb(250, 78, 42)
                                    ">
        <div class="row g-0">

            <div class="col-md-4 d-flex align-items-center">
            
                <img src="' . $url . '" class="img-fluid w-100 rounded-start " alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">' . $name . '</h5>
                    <p class="card-text">' . $pizzainfo . '</p>

                    <form action="index.php?uid=' . $uid . '" method="get">';
echo '<div class="mb-3 d-flex justify-content-start align-items-center" >
                            <h1>Select Size :</h1>
                            <span class="custom-dropdown" >
                            <select name="size">';

                    $sql = "SELECT * FROM sizedetail";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '
                        
                                <option value="'.$row['sid'].'">'.$row['sname'].'</option>';
                    }
                }
                            echo '</select>
                            </span>
                        </div>';



                            echo'<div class="mb-3 d-flex justify-content-start align-items-center">
                            <h1>Select Crust :</h1>
                            <span class="custom-dropdown-crust" >
                                <select name="crust">  ';


                $sql = "SELECT * FROM pizzacrust";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
                        
                                    
                                        <option value="'.$row['cid'].'">'.$row['cname'].'</option>';
                                        
                                    
                    }
                }
                        echo'</select>
                            </span>
                        </div>';



                      echo '<div class="mb-3 d-flex justify-content-around align-items-center" style="width: 300px;">
                        <h1>จำนวนสินค้า : </h1> 
                        <input type="number" name="amount" class="item-quantity" value="1" min="1"
                        style="padding: 5px; border: 2px solid #ddd; border-radius: 5px; font-size: 16px;">
                        </div>';
                        
                        if (isset($_GET["uid"])) {
                            $uid = isset($_GET['uid']) ? $_GET['uid'] : null;
                         echo   '<div class="mb-2 d-flex justify-content">
                         <a href="index.php?uid=' . $uid . '" >
                        <button type="submit" class="btn" style="display: flex; justify-content: center; background-color: #029C10; font-weight: bold; width: 200px; color: white;">
                        <input type="hidden" name="id" value="' . $id . '">
                        <input type="hidden" name="add">
                        <input type="hidden" name="uid" value="' . $uid . '">
                        <i class="bi bi-basket" style="margin-top: 2.5%; margin-right: 5px;"></i>
                        <span>Add to Basket</span>
                        </button></a>
                        </div>
                        
                    </form>
                    </div>';
                }
                    
                        

               echo '</div>
            </div>
        </div>
    </div>';
        }
    } else {
        echo '' . $id . '';
    }
    ?>


   


</body>

</html>