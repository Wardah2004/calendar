<?php 
session_start();

include "db_conn.php";
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
     <h1> أهلاً, <?php echo $_SESSION['user_name']; ?></h1>
     <a href="index.php">Logout</a>
	 
	 <form action="home.php" method="post">
	 <button type="submit"  name="show" >عرض التعليق</button>
	 
	<button type="submit"   name="delete" onclick="delete1()">حذف التعليق</button>
	 <div id="myDIV"> 
	  <input type="text"  name="id" >   
	 </div>
 <script>
function delete1() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>

	 
	 
	 <button type="submit"  name="add" onclick="add()">إضافة التعليق</button>
	 <div id="myDIV1"> 
	 
	 إسم المستخدم:<input type="text"  name="user_name1" placeholder ="إسم المستخدم" ><br><br>   
     كلمة المرور:<input type="text"  name="password1" placeholder ="كلمة المرور" ><br><br>   
          
	 </div>
	 
	 
	 
	 
	  <!--<button type="submit" name ="modefy" onclick="modefy()">التعديل على البيانات</button>
	  
	  <div id="myDIV2"> 
     رقم المستخدم<input type="text"  name="id1" placeholder="رقم المستخدم" ><br><br>   
     إسم المستخدم:<input type="text"  name="name1" placeholder="إسم المستخدم" ><br><br>   
     كلمة المرور:<input type="text"  name="pass" placeholder="كلمة المرور" ><br><br>  -->  
	 </div>
	    

	  
	  
	   </form>
	 

	  
</body>
</html>

<?php 
}

else{
     header("Location: index.php");
     exit();
}
 ?>
 <?php
 
if(isset($_POST['show'])){   
 $query = 'select * from users';   
 $result = mysqli_query($conn, $query);   
    
 if ($result){   
 echo ' تم البحث بنجاح';   
 echo '<table border ="1">   
    
  <th>ID</th>   
 <th>NAME</th>   
 <th>PASSWORD</th>   
  
 ';   
 while ($row =mysqli_fetch_row($result)){   
     
  ECHO '<tr>   
  <td>'.$row[0].'</td>   
  <td>'.$row[1].'</td>   
  <td>'.$row[2].'</td>    
  </tr>';   
 }   
 }   
  else{   
      
   die('error'.mysqli_error($conn));   
  }    
 }   
   
   
  
  //delete   
if(isset($_POST['delete'])){   
   $id= $_POST['id'];   
  $query="delete from users where id= '$id'";   
 $result = mysqli_query ($conn,$query);   
 //if ($result){   
  //echo "تم الحذف";   
     
//}else {die('error');   
 //} 
}



//insert   
if(isset($_POST['add'])){   
     
     $username= $_POST['user_name1'];   
  $passwordu= $_POST['password1'];     
    
$query="INSERT INTO users (user_name, password)
             VALUES ('$username','$passwordu')";
 $result = mysqli_query ($conn,$query);   
 if ($result){   
  echo "inserted done";   
     
}else {die('error');   
 }   
}    



//update   
if(isset($_POST['modefy'])){   
       $id= $_POST['id1'];   
     $username1= $_POST['name1'];   
  $passwordu= $_POST['pass'];   
  
    
  $query="update users set user_name = '$username1', password= '$passwordu' where id= '$id'";   
 $result = mysqli_query ($conn,$query);   
 if ($result){   
  echo "updated done";   
     
}else {die('error');   
 }   
}    




 ?>
 
 
 
   
   