<?php
/*function   message(){
    echo '<script type="text/JavaScript">';
    echo 'alert(" Student record Added");';
    echo '</script>' ; 
  } 

 // message();
function  createConfirmationmbox() {  
    echo '<script type="text/javascript"> ';  
    echo 'var inputname = prompt("Please enter your name", "");'; 
    echo '</script>';  
}  
createConfirmationmbox();
//echo $clas;
?>  */
echo '<span id="cls"> </span>';
echo '<script type="text/javascript"> ';  
    echo 'var ct_for= prompt("Please enter your name", "");'; 
    echo  'document.getElementById("cls").innerHTML=ct_for;';
    echo '</script>';  

    $class[1]=2;
    $class[2]=3;

    for($i=1;$i<=2;$i++)
      echo $class[$i];

//$eadd = $_POST['inputname']; 
//echo $eadd;
?>