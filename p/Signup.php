
<?php 
session_start(); 
include "db_conn.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign up</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="index.php" method="post"> 
     	<h2>انشاء حساب</h2>
		 
			<label>اسم المستخدم</label>
     	<input type="text" name="user_name1" placeholder="إسم المستخدم"><br>

     	<label>كلمة المرور الجديدة</label>
     	<input type="password" name="password1" placeholder="كلمة المرور" ><br>

        <!--<label>Password agin</label>
     	<input type="password" name="password agin" placeholder="Password"><br>-->
		 <button type="submit"  name="add" onclick="add()">انشاء حساب</button>   
     </form>


<?php
//insert   
if(isset($_POST['add'])){   
     
	$username= $_POST['user_name1'];   
 $passwordu= $_POST['password1'];     
   
$query="INSERT INTO users (user_name, password)
			VALUES ('$username','$passwordu')";

}   
 
?>
</body>
</html>