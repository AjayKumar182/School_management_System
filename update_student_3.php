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

$name=$_POST['name'];
$reg=$_POST['reg'];
//$gender=$_POST['gender'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$bdate=$_POST['bdate'];
$std=$_POST['std'];
$fname=$_POST['fname'];
$address=$_POST['address'];
$password=$_POST['password'];

$sql="UPDATE student SET name='$name',phone='$phone',email='$email',bdate='$bdate',std='$std',father_name='$fname',address='$address',password='$password' WHERE reg_num='$reg';";

$result = mysqli_query($conn, $sql); 
if($result)
{
    echo '<script type="text/JavaScript">';
    echo 'alert(" STUDENT RECORD UPDATED");';
    echo 'window.location.href="update_student.php";';
    echo '</script>' ;
}
else
{
        echo "ERROR".mysqli_error($conn);
}
?>

</body>
</html>
