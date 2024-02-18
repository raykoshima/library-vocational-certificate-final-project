<?php
require_once("../config/connect.php");
if (isset($_POST["userid"], $_POST["bookid"]) && $_POST["userid"] !== "" && $_POST["bookid"] !== "") {
    $userid = $_POST["userid"];
    $bookid = $_POST["bookid"];
    $date = date('Y-m-d');
    $sql = "INSERT INTO tb_borrow_book(br_date_br,br_date_rt,b_id,m_user,br_fine)
    VALUE('$date','00-00-0000','$bookid','$userid','0')";
    mysqli_query($conn,$sql);
    header("location:/");
} else {
    echo "<script>";
    echo "alert('กรุณาใส่ข้อมูลให้ครบ');";
    echo "history.back();";
    echo "</script>";
    exit;
}

