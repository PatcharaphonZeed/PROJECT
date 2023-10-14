<?php
    $uid=$_GET['uid'];
    $pid= $_GET['pid'];
    $conn = new mysqli("202.28.34.197", "web66_65011212203", "65011212203@csmsu", "web66_65011212203");
    $sql="UPDATE orderamount set amount = amount +1 where pid = ? and uid = ?";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("ii",$pid,$uid);
    if($stmt->execute()){
        header("Location: busket.php?uid=$uid");
    }
    else{
        echo 'Update ไม่สำเร็จ';
    }
?>