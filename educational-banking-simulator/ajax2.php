
<script>
 
        
        function notify(status, message, desc){
         toastr[status](message);
       }


</script>


<?php  

include 'myconfig.php';


    $modetype = $_POST['type'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $swift = $_POST['swift'];
    $internal_fname = $_POST['internal_fname'];
    $internal_lname = $_POST['internal_lname'];
    $clientname = $internal_fname. " ".$internal_lname;

    if($pass != $mypin){
        echo"
                <script>
                notify('error', 'Incorrect Pin!');
                setTimeout(function(){

                    window.location.reload();
                }, 3000)
                
                </script>    
        ";
    }

    else{
        $updatesql = "INSERT INTO beneficiary (account, useraccount, name, bankname, swift, ddate )  VALUES('$account','$user','$clientname','$modetype', '$swift', NOW())";

        $myqueryupdate  = mysqli_query($link, $updatesql);
    
        if($myqueryupdate){
            echo"
                <script>
                notify('success', 'Details have been added to your list of Beneficiaries');
                </script>    
        ";
        }
    }
    
   

    ?>