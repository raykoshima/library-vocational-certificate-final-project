<title>หน้าแรก</title>
<?php
require_once("config/connect.php");
if(isset($_POST["search"])){
    $search = '%'.$_POST["search"].'%';
    $sql = "SELECT * FROM tb_borrow_book as borrow 
    JOIN tb_book as book 
    JOIN tb_member as member 
    ON borrow.b_id = book.b_id AND borrow.m_user = member.m_user WHERE b_name LIKE '$search' OR m_name LIKE '$search'";
}else{
    $sql = "SELECT * FROM tb_borrow_book as borrow 
    JOIN tb_book as book 
    JOIN tb_member as member 
    ON borrow.b_id = book.b_id AND borrow.m_user = member.m_user";
}
?>
<script>
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>
<center>
    <br>
    <h2>การจัดการข้อมูลการยืม-คืนหนังสือ</h2><br><br>
    <form method="post"><input name="search" type="text" placeholder="ค้นหา">&nbsp;&nbsp;<button>ค้นหา</button></form>
    <br>
    <table border="1">
        <th colspan="4"></th>
        <th><a href="borrow.php"><button>ยืม-คืนหนังสือ</button></a></th>
        <th><a href="return.php"><button>ข้อมูลสถิติ</button></a></th>
        <tr>
        <th>รหัสหนังสือ</th>
        <th>ชื่อหนังสือ</th>
        <th>ผู้ยืม-คืน</th>
        <th>วันที่ยืม</th>
        <th>วันที่คืน</th>
        <th>ค่าปรับ</th>
        <?php
    $select_borrow = $dbcon->prepare($sql);
    $select_borrow ->execute();
    while($row = $select_borrow->fetch(PDO::FETCH_ASSOC)){
    ?>
        <tr>
            <td><?php echo $row["b_id"]; ?></td>
            <td><?php echo $row["b_name"]; ?></td>
            <td><?php echo $row["m_name"]; ?></td>
            <td><?php echo $row["br_date_br"]; ?></td>
            <td><?php echo $row["br_date_rt"]; ?></td>
            <td><?php echo $row["br_fine"]; ?></td>
            <?php } ?>
    </table>
</center>