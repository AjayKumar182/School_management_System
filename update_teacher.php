

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
       
       <div id="adding_form">
        <h2><center>UPDATE TEACHER DETAILS </center></h2>
    
        <strong> enter the Teacher_id of the Teacher to be update</strong>

        <form action="update_teacher_action.php" method="post" id="addform" onSubmit="return validate();">
        <p>
    <label>Teacher_id:</label>
    <input type="text" name="tid"  id="reg" required></input>
    </p>

       <input type="submit" value="GET DATA" name="GET DATA" class="btn"/>
       
</form>
</div>
</body>
</html>


        
       