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
        h1 {
            text-transform: none;
            font-size: 25px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-weight: 700;

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

        li {
            text-transform: uppercase;
            font-size: 30px;
            margin-left: 20px;
            text-decoration: none;
            color: black;
            font-family: Sofia;
            list-style-type: none;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="card shadow p-3 mb-5 " style="border: 2.5px solid rgb(250, 78, 42);">
        <div class="card-header d-flex align-items-center">
            <img src="https://images.vexels.com/media/users/3/131778/isolated/preview/2f58b79f41ddd2cf40e188c533a7f751-pizza-logo-template.png" alt="" class="rounded-circle" style="background: white ;
                border: 5px solid rgb(250, 78, 42);
                width: 100px;
                height: auto;">
            <li class="d-flex justify-content-end align-items-center">
                Very good |
            </li>

            <h1 style="margin-left: 15px; margin-top: 15px;">Register</h1>
        </div>
        <div class="card-body">
            <form action="register.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username address</label>
                    <input type="text" name="username" id="username" class="form-control">
                    
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                    
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="phone" name="phone" id="phone" class="form-control">
                </div>
                <div class="mb-3">
                        <div class="row">
                            <div class="col text-center">
                        
                                <button type="submit" class="btn" 
                                style="width: 200px; 
                                       margin-top: 20px;
                                       background-color: rgb(250, 78, 42);
                                       color: white;">
                                       <i class="bi bi-person-add"></i>
                                       Register</button>

                            </div>
                        </div>
                </div>
            </form>
        </div>

</body>

</html>
<?php




$conn = new mysqli("202.28.34.197", "web66_65011212203", "65011212203@csmsu", "web66_65011212203");

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// รับข้อมูลจากฟอร์ม
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $phone = $_POST["phone"];

    // สร้างคำสั่ง SQL เพื่อเพิ่มข้อมูลผู้ใช้ในฐานข้อมูล
    $sql = "INSERT INTO user (username, name, password, phone) VALUES (?, ?, ?, ?)";
    
    // เตรียมคำสั่ง SQL
    $stmt = $conn->prepare($sql);
    
    // ผูกข้อมูลกับพารามิเตอร์
    $stmt->bind_param("ssss", $username, $name, $password, $phone);
    
    // ประมวลผลคำสั่ง SQL
    if ($stmt->execute()) {
        echo "<script> 
              alert('add date successfully')
              window.location='index.php' </script>";
    } else {
        
        echo "<script> 
        alert('An error occurred during registration.')
        </script>" . $stmt->error;
    }
    
    // ปิดคำสั่ง SQL
    $stmt->close();
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>