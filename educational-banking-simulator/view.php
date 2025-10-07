
<?php
session_start();


include 'connect.php';
include 'myconfig.php';

?>




<?php


$myyid = $_POST['beneval'];

$namequery = "SELECT * FROM beneficiary WHERE id = '$myyid'";
$queryname = mysqli_query($link, $namequery);

    if($queryname){

            $namerow = mysqli_fetch_assoc($queryname);

            $name = $namerow['name'];
            $useraccount = $namerow['useraccount'];
            $name = explode(" ", $name);
            $firstname = $name[0];
            $lastname = $name[1];


            $returndetails = array("first"=>$firstname, "last"=>$lastname, "useraccount"=>$useraccount);

            echo json_encode($returndetails);

       
                
            

    }
    else{
        echo"
             <script>
        
             alert('error');

           </script>";

    }





?>