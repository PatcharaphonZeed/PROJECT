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

        /* styles.css */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }
        h2{
            font-size: 25px;
            font-weight: 700px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            margin-top: 6px;
        }
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            
        }

        tr:nth-child(even) {
            background-color: #dddddd;
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
                        <a href="#" style="
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
                <div class="dropdown me-3">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Login | Sign-up
                        <i class="bi bi-lock-fill"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="login.php">Login</a></li>
                        <li><a class="dropdown-item" href="register.php">Sign-up</a></li>
                        <li><a class="dropdown-item" href="login.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="d-flex justify-content-start" style="margin-top: 40px;margin-left: 60px">
        <i class="bi bi-person-fill-gear" style="font-size: 40px; margin-right :10px;"></i>
        <h2>รายการสั่งซื้อสินค้า</h2>
    </div>
    <!-- -pizza- -->
    <div class="album py-3 ">
        <div class="container">
            <div class="row card">
                <!-- <h1>รายการสั่งซื้อสินค้า</h1> -->
                <table>
                    <thead>
                        <tr>
                            <th>ออเดอร์ที่</th>
                            <th>ชื่อ</th>
                            <th>วันเวลาที่ส่ง</th>
                            <th>ราคารวม</th>
                            <th>สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Doe</td>
                            <td>วันที่ 3 มีนาคม 2566 เวลา 13.55 น.</td>
                            <td>249 บาท</td>
                            <td>
                                <div class="select-box">
                                    <label for="select-box1" class="label select-box1"><span class="label-desc"></span> </label>
                                    <select id="select-box1" class="select">
                                        <option value="Choice 1">ทำการจัดส่งแล้ว</option>
                                        <option value="Choice 2">ยังไม่ได้ทำการจัดส่ง</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Zeed</td>
                            <td>วันที่ 4 มีนาคม 2566 เวลา 14.35 น.</td>
                            <td>1350 บาท</td>
                            <td>
                                <div class="select-box">
                                    <label for="select-box1" class="label select-box1"><span class="label-desc"></span> </label>
                                    <select id="select-box1" class="select">
                                        <option value="Choice 1">ทำการจัดส่งแล้ว</option>
                                        <option value="Choice 2">ยังไม่ได้ทำการจัดส่ง</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Shun</td>
                            <td>วันที่ 5 มีนาคม 2566 เวลา 18.55 น.</td>
                            <td>2490 บาท</td>
                            <td>
                                <div class="select-box">
                                    <label for="select-box1" class="label select-box1"><span class="label-desc"></span> </label>
                                    <select id="select-box1" class="select">
                                        <option value="Choice 1">ทำการจัดส่งแล้ว</option>
                                        <option value="Choice 2">ยังไม่ได้ทำการจัดส่ง</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Tim</td>
                            <td>วันที่ 8 มีนาคม 2566 เวลา 10.35 น.</td>
                            <td>339 บาท</td>
                            <td>
                                <div class="select-box">
                                    <label for="select-box1" class="label select-box1"><span class="label-desc"></span> </label>
                                    <select id="select-box1" class="select">
                                        <option value="Choice 1">ทำการจัดส่งแล้ว</option>
                                        <option value="Choice 2">ยังไม่ได้ทำการจัดส่ง</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Ken</td>
                            <td>วันที่ 25 มีนาคม 2566 เวลา 12.10 น.</td>
                            <td>458 บาท</td>
                            <td>
                                <div class="select-box">
                                    <label for="select-box1" class="label select-box1"><span class="label-desc"></span> </label>
                                    <select id="select-box1" class="select">
                                        <option value="Choice 1">ทำการจัดส่งแล้ว</option>
                                        <option value="Choice 2">ยังไม่ได้ทำการจัดส่ง</option>
                                    </select>
                                </div>
                            </td>
                        </tr>


                        <!-- เพิ่มข้อมูลเพิ่มเติมตามที่ต้องการ -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</body>

</html>