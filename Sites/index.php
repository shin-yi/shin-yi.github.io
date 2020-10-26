<?php
    include("connMySQL.php");
    $sql_query = "SELECT * FROM members ORDER BY cID ASC";
    $result = mysqli_query($db_link,$sql_query);
    $total_records = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>會員資料的 CRUD 練習</title>
</head>
<body>
<h1 align = "center">會員資料總表</h1>
<p align= "center">目前資料筆數：<?php echo $total_records;?>，<a href='create.php'>新增資料</a></p>

<table border="1" align = "center">
    <tr>
        <th>ID</th>
        <th>姓名</th>
        <th>生日</th>
        <th>Email</th>
		<th>電話</th>
        <th>編輯</th>
    </tr>
<?php

while($row_result = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$row_result['cID']."</td>";
    echo "<td>".$row_result['cName']."</td>";
    echo "<td>".$row_result['cBirthday']."</td>";
    echo "<td>".$row_result['cEmail']."</td>";
	echo "<td>".$row_result['cPhone']."</td>";
    echo "<td><a href='update.php?id=".$row_result['cID']."'>修改</a> ";
    echo "<a href='delete.php?id=".$row_result['cID']."'>刪除</a></td>";
    echo "</tr>";
}
?>
</table>
</body>
</html>