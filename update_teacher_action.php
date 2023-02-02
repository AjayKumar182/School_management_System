
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



$tid= $_POST['tid'];

      $name=" ";
      $sub=" ";
      $gender=" ";
      $phone=" ";
      $email="";
      $bdate="";
      $std="";
      $address="";
      $password="";
      $salary=" ";

$sql = "SELECT tid FROM teacher WHERE tid='$tid';";
$result = mysqli_query($conn, $sql); 
$sql2 = "SELECT * FROM teacher WHERE tid='$tid';"; 
$result2= mysqli_query($conn, $sql2); 

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result); 

?>

<div id="adding_form">
        <h2><center>UPDATE TEACHER </center></h2>
        <form action="update_teacher_3.php" method="post"  id="addform" >
          <?php
   
        if($count<1)
{

   echo '<script type="text/JavaScript">';
    echo 'alert(" Teacher doesnot exist");';
    echo 'window.location.href="update_teacher.php";';
    echo '</script>' ;
    
    

} 

  if($result2->num_rows>0){
    echo 'Update The Teacher Data';

    while($row2=mysqli_fetch_array($result2))
    {
        $name=$row2[0];
      $tid=$row2[1];
      $sub=$row2[2];
      $gender=$row2[3];
      $phone=$row2[4];
      $email=$row2[5];
      $bdate=$row2[6];
      $address=$row2[7];
      $salery=$row2[8];
      $password=$row2[9];
    
     

    }
    }
  

     ?>                     
        <p>
    <label>Teacher_id:</label>
    <input type="text" name="teach_id"  id="reg" readonly value="<?php echo $tid; ?>"></input>
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
                    <label>Class handles</label>
                     
                      <input type="checkbox" name="1st"  value="1">1st </input>
                     <input type="checkbox" name="2nd"  value="2">2nd </input>
                     <input type="checkbox" name="3rd"  value="3">3rd </input>
                     <input type="checkbox" name="4th"  value="4">4th </input>
                     <input type="checkbox" name="5th"  value="5">5th </input><br/>
                   <center>
                      <input type="checkbox" name="6th"  value="6">6th </input>
                     <input type="checkbox" name="7th"  value="7">7th </input>
                     <input type="checkbox" name="8th"  value="8">8th </input>
                     <input type="checkbox" name="9th"  value="9">9th </input>
                     <input type="checkbox" name="10th"  value="10">10th</input>
                    </center>   
                </p> 
    <p>        
        <label>Address:</label>
       <input type="text" name="address"  id="address"  value="<?php echo $address; ?>"></input>
       </p>

       <p>
                    <label>Salery:</label>
                    <input type="text" name="salery"  id="totel"  value="<?php echo $salery; ?>" required placeholder=" "></input>
         </p>

    <p>        
        <label>Password:</label>
       <input type="text" name="password" id="password"  value="<?php echo $password; ?>"></input>
       </p>
       
      
    <p>
    <input type="submit" value="UPDATE" name="UPDATE" class="btn"/>
    </p>
   

    </form>
</div>
    
    

    
    



    
   
</body>



</html>