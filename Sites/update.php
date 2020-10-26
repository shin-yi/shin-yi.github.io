 <?php
 include "connMySQL.php";

 $userID = $_GET['id'];
 
 //請注意，這邊因為 $userID 本身是 integer，所以可以不用加 ''
 $sql_getDataQuery = "SELECT * FROM members WHERE cID = $userID";

 $result = mysqli_query($db_link, $sql_getDataQuery);

 $row_result = mysqli_fetch_assoc($result);
 $id = $row_result['cID'];
 $name = $row_result['cName'];
 $birthday = $row_result['cBirthday'];
 $email = $row_result['cEmail'];
 $phone = $row_result['cPhone'];

 if (isset($_POST["action"]) && $_POST["action"] == 'update') 
 {
     $newName = $_POST['cName'];
     $newBirthday = $_POST['cBirthday'];
     $newEmail = $_POST['cEmail'];

     $sql_query = "UPDATE members SET cName = '$newName', cBirthday = '$newBirthday', cEmail = '$newEmail' WHERE cID = $userID";

     mysqli_query($db_link,$sql_query);
     $db_link->close();

     header('Location: index.php');
 }
?>

 <html>

 <head>
     <meta charset="UTF-8" />
     <title>修改會員資料</title>
 </head>
 <body>

 <form action="" method="post" name="formAdd" id="formAdd">
      
     請輸入姓名： <input type="text" name="cName" id="cName" value=" <?php echo $name ?>"><br/>
     請輸入生日： <input type="date" name="cBirthday" id="cBirthday" value="<?php echo $birthday ?>"><br/>
     請輸入Email：<input type="text" name="cEmail" id="cEmail" value="<?php echo $email ?>"><br/>
	 請輸入電話： <input type="text" name="cPhone" id="cPhone" value="<?php echo $phone ?>"><br/>
     <input type="hidden" name="action" value="update">
     <input type="submit" name="button" value="修改資料">
 </form>
 </body>
 </html>