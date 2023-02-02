session_start();

$_SESSION['teacher']=$row['teacher_name'];


if(isset($_SESSION['teacher_id'])){
               echo  "<center><h1>welcome ".$_SESSION['teacher']."</center></h1>";
             }
             else{
              echo '<script> type="text/JavaScript">';
              echo 'alert("Please login to continue");';
              echo 'window.location.href="teacher_login.html";';
              echo '</script>' ;
             }


             <label for="file">Downloading progress:</label>
<progress id="file" value="50" max="100" height="1cm"> 32% </progress>


https://www.w3schools.com/bootstrap/bootstrap_progressbars.asp