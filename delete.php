<?php
    $uid=$_GET['uid'];
    $pid= $_GET['pid'];
    $conn = new mysqli("202.28.34.197", "web66_65011212203", "65011212203@csmsu", "web66_65011212203");
    $sql= "DELETE FROM orderamount WHERE  pid = ? AND uid = ?";
    $stmt_delete = $conn->prepare($sql);
    $stmt_delete->bind_param("ii", $pid, $uid);
    if($stmt_delete->execute()){
        header("Location: busket.php?uid=$uid");
    }else{
        header("Location: busket.php?uid=$uid");
    }
?>