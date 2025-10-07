
<?php
session_start();


include 'connect.php';
include 'myconfig.php';

?>




<?php


$accountno = $_POST['pay_no'];

$namequery = "SELECT * FROM account WHERE account = '$accountno'";
$queryname = mysqli_query($link, $namequery);

    if($queryname){

            $namerow = mysqli_fetch_assoc($queryname);

            $firstname = $namerow['first'];
            $lastname = $namerow['last'];


            $name = array("first"=>$firstname, "last"=>$lastname);

            echo json_encode($name);

       
                
            

    }
    else{
        echo"
             <script>
        
             alert('error');

           </script>";

    }





?>