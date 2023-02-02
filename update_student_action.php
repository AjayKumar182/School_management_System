
<!DOCTYPE html>
<html>
    <head>
        <link href="header.css" rel="stylesheet" type="text/css">
        <link href="body.css" rel="stylesheet" type="text/css">
        <link href="sidebar.css" rel="stylesheet" type="text/css">
        <link href="add.css" rel="stylesheet" type="text/css">

        
        <title>Admin Page</title>
        
             

        </head>
        <header>
            <nav>
                <a id="home" href="home.html" >Home</a>
                
                <a id="logout" href="admin_logout.php">Logout</a>
                
                
            </nav>
        </header>
        <body>
           <div class="sidebar">
               
           <li>
                   <ul> <a id="sidemenu" href="add_student.html">ADD STUDENT</a></ul>
                   
                   <ul> <a id="sidemenu" href="update_student.php">UPDATE STUDENT</a></ul>
                   <ul> <a id="sidemenu" href="add_teacher.html">ADD TEACHER</a></ul>
                   
                   <ul> <a id="sidemenu" href="update_teacher.php">UPDATE TEACHER</a></ul>
                   <ul> <a id="sidemenu"href="fees_collect.php">FEE COLLECTION</a></ul>
              <ul> <a id="sidemenu"href="admin_view.php">VIEW</a></ul>
</li>


       </div>  


<?php      
include('connection.php');  



$reg= $_POST['reg'];

      $name=" ";
      
      $gender=" ";
      $phone=" ";
      $email="";
      $bdate="";
      $std="";
      $fname="";
      $address="";
      $password="";

$sql = "SELECT reg_num FROM `student` WHERE reg_num='$reg';";
$result = mysqli_query($conn, $sql); 
$sql2 = "SELECT * FROM `student` WHERE reg_num='$reg';"; 
$result2= mysqli_query($conn, $sql2); 

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result); 

?>

<div id="adding_form">
        <h2><center>UPDATE STUDENT </center></h2>
        <form action="update_student_3.php" method="post"  id="addform" >
          <?php
   
        if($count<1)
{

   echo '<script type="text/JavaScript">';
    echo 'alert(" Student doesnot exist");';
    echo 'window.location.href="update_student.php";';
    echo '</script>' ;
    
    

} 

  if($result2->num_rows>0){
    echo 'Update The Student Data';

    while($row2=mysqli_fetch_array($result2))
    {
        $a=$row2[0];
      $name=$row2['name'];
      $reg=$row2[2];
      $gender=$row2[3];
      $phone=$row2[4];
      $email=$row2[5];
      $bdate=$row2[6];
      $std=$row2[7];
      $fname=$row2[8];
      $address=$row2[9];
      $password=$row2[10];
    
     

    }
    }
  

     ?>                     
        <p>
    <label>RegisterNumber:</label>
    <input type="text" name="reg"  id="reg" readonly value="<?php echo $reg; ?>"></input>
    </p>
    <p>
        <label>NAME:</label>
    <input type="text" name="name"  id="name" value="<?php echo $name; ?>"></input>
    </p>
    
    <p>
    <label>Phone:</label>
    <input type="text" name="phone"  id="phone" value="<?php echo $phone; ?>" ></input>
    </p>
    <p>
    <label>Email:</label>
    <input type="text" name="email"  id="email" value="<?php echo $email; ?>"></input>
    </p>
    <p>
        <label>DOB:</label>
        <input type=text name="bdate"  id="date" placeholder="yyyy-mm-dd" value="<?php echo $bdate; ?>"></input>
        </p>
    <p>
    <label>Class:</label>
    <input type="text" name="std"  id="std" value="<?php echo $std; ?>"></input>
        
     </p>
     <p>        
     <label>Fathername:</label>
    <input type="text" name="fname" id="fname" value="<?php echo $fname; ?>" ></input>
    </p>
    <p>        
        <label>Address:</label>
       <input type="text" name="address"  id="address"  value="<?php echo $address; ?>"></input>
       </p>
    <p>        
        <label>Password:</label>
       <input type="text" name="password" id="password"  value="<?php echo $password; ?>"></input>
       </p>
       <p>               
       
      
    <p>
    <input type="submit" value="UPDATE" name="UPDATE" class="btn"/>
    </p>
   

    </form>
</div>
    
    

    
    



    
   
</body>



</html>