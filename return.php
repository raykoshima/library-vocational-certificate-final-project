<title>คืนหนังสือ</title>
<?php
require_once("config/connect.php");
if(isset($_POST["bookid"])){
    if($_POST["bookid"] == ""){
        $_SESSION["booking_RT"]["b_id"] = "";
        $_SESSION["booking_RT"]["b_name"] = "";
        $_SESSION["booking_RT"]["m_name"] = "";
        $_SESSION["booking_RT"]["br_date_br"] = "";
    }else{
    $sql = "SELECT * FROM tb_borrow_book AS borrow
    JOIN tb_member as member
    JOIN tb_book as book
    ON borrow.m_user = member.m_user
    AND borrow.b_id = book.b_id WHERE borrow.b_id = '".$_POST["bookid"]."' AND borrow.b_id != '00-00-0000' ORDER BY borrow.br_date_br DESC LIMIT 1";
    $bookquery = mysqli_query($conn,$sql);
    $book = mysqli_fetch_assoc($bookquery);
    // $select_borrow = $dbcon->prepare();
    // $select_borrow ->execute();
    // $book = $select_borrow->fetch(PDO::FETCH_ASSOC);
    if(empty($book)){
        echo "<script>alert('ไม่พบหนังสือ')</script>";
        $_SESSION["booking_RT"] = "";
        $_SESSION["booking_RT"] = "";
    }else{
        $_SESSION["booking_RT"] = $book;
    }}
}
?>
<script>
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>
<center>
    <br>
    <a href="borrow.php"><button>ยืมหนังสือ</button></a>&nbsp;&nbsp;<button><u>คืนหนังสือ</u></button>
    <h2>คืนหนังสือ</h2><br><br>
    <form method="post">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รหัสหนังสือที่ต้องการคืน: <input name="bookid" type="text"
            placeholder="กรอกรหัสหนังสือ">&nbsp;&nbsp;<button>ตกลง</button></form>
    <table border="1">
        <td>รหัสหนังสือ:</td>
        <td style="width:300px;"><?php if(isset($_SESSION["booking_RT"])){echo $_SESSION["booking_RT"]["b_id"];}; ?></td>
        <tr>
            <td>ชื่อหนังสือ:</td>
            <td style="width:300px;"><?php if(isset($_SESSION["booking_RT"])){echo $_SESSION["booking_RT"]["b_name"];}; ?></td>
        <tr>
            <td>ผู้ยืมหนังสือ:</td>
            <td style="width:300px;"><?php if(isset($_SESSION["booking_RT"])){echo  $_SESSION["booking_RT"]["m_name"];}; ?>
            </td>
        <tr>
            <td>วันที่ยืมหนังสือ:</td>
            <td style="width:300px;"><?php if(isset($_SESSION["booking_RT"])){echo  $_SESSION["booking_RT"]["br_date_br"];}; ?>
            </td>
        <tr>
            <td>ค่าปรับ:</td>
            <td style="width:300px;"><input type="number">
            </td>
        <tr>
            <td colspan="3">
                <center><button>ยืมหนังสือ</button>&nbsp;&nbsp;<button>ยกเลิก</button></center>
            </td>
    </table>

</center>