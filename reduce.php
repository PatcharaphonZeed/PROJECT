<?php
     $uid=$_GET['uid'];
     $pid= $_GET['pid'];
     $conn = new mysqli("202.28.34.197", "web66_65011212203", "65011212203@csmsu", "web66_65011212203");
    $sql_select_amount = "SELECT amount FROM orderamount WHERE pid = ? AND uid = ?";
    $stmt_select_amount = $conn->prepare($sql_select_amount);
    $stmt_select_amount->bind_param("ii", $pid, $uid);
    $stmt_select_amount->execute();
    $result_select_amount = $stmt_select_amount->get_result();

    if ($result_select_amount->num_rows > 0) {
    while ($row = $result_select_amount->fetch_assoc()) {
        $amount = $row["amount"];
    }

    // เช็คว่า amount มีค่ามากกว่า 1 หรือไม่
    if ($amount > 1) {
        // ทำการลดค่า amount ลง 1
        $sql_update = "UPDATE orderamount SET amount = amount - 1 WHERE pid = ? AND uid = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("ii", $pid, $uid);
        if ($stmt_update->execute()) {
            header("Location: busket.php?uid=$uid");
        } else {
            echo "Error decreasing amount: " . $stmt_update->error;
        }
    } else {
        header("Location: busket.php?uid=$uid");
    }
} else {
    echo "No record found for the specified user and pizza.";
}

$stmt_select_amount->close();
$conn->close();
?>