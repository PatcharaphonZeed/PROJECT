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
            font-size: 30px;
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

            <h1 style="margin-left: 20px; margin-top: 10px;">login</h1>
        </div>
        <div class="card-body">
            <form action="login.php" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input required type="text" class="form-control" id="username" name="username">

                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input required type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col text-center">

                            <button type="submit" class="btn" style="width: 200px; 
                                       margin-top: 20px;
                                       background-color: rgb(250, 78, 42);
                                       color: white;">
                                <i class="bi bi-box-arrow-in-right"></i>
                                LOGIN</button><br>
                            <a href="register.php">register</a>

                        </div>
                    </div>
                </div>

            </form>
        </div>

</body>

</html>
<?php
// ติดต่อกับฐานข้อมูล
$conn = new mysqli("202.28.34.197", "web66_65011212203", "65011212203@csmsu", "web66_65011212203");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // รับข้อมูลจากฟอร์มล็อคอิน
        $username = $_POST['username'];
        $password = $_POST['password'];



        // $user_status = $_POST["user_status"];
        // ตรวจสอบการล็อคอิน
        $sql = "SELECT * FROM user WHERE username = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $uid = $row["uid"];
                $status = $row["status"];
            }
            echo "Login . .";
            // การล็อคอินสำเร็จ
            if ($status === 'customer') {
                // ผู้ใช้เป็นลูกค้า
                // อย่าเปลี่ยนลิ้งไปหน้าเว็บ
                header("Location: index.php?uid=$uid"); // หน้าลูกค้า 
            } elseif ($status === 'admin') {
                // ผู้ใช้เป็นแอดมิน
                // อย่าเปลี่ยนลิ้งไปหน้าเว็บ
                header("Location: admin.php?uid=$uid"); // หน้าแอดมิน
            } else {
                echo 'Login failed';
            }
        } else {
            echo '   <script>
                        alert("กรุณากรอกชื่อผู้ใช้และรหัสผ่านไม่ถูกต้อง");
                     </script>';
        }
    } else {
        echo "กรุณากรอกชื่อผู้ใช้และรหัสผ่าน";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>