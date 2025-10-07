
<script>
 
        
 function notify(status, message, desc){
  toastr[status](message);
}


</script>


<?php  

include 'myconfig.php';

if(isset($_POST['pass'])){
    $oldpass = $_POST['old_pass'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];


    if($oldpass != $mypass){
        echo"
         <script>
         notify('warning', 'Your LearnVaults Password Is Incorrect!');
         </script>    
        ";
    }

    else{

        $updatesql = "UPDATE account SET pin='$pass' WHERE account='$account' ";

        $myqueryupdate  = mysqli_query($link, $updatesql);
       
        if($myqueryupdate){
            echo"
                <script>
                notify('success', 'Your Password has been changed');
                
                </script>    
        ";
        }
        else{
            echo"
                <script>
                notify('error', 'Please Try Again!');
                </script>    
        ";
        }

    }
}

else if(isset($_POST['randd'])){

    $randd = $_POST['randd'];
    $confirm_code = $randd;

    $_SESSION['randd'] = $randd;

    include("emaiil2.php");
    //$to = $email; // <� replace with your address here
                                    
    //$subject = "SECURITY ANSWER CODE";
                                    
    //$message = $emailBody;
            
        //$from = "info@LearnVault Educations.online";
        //	$email = new PHPMailer();
        //	$email->SetFrom($from, 'LearnVaults'); //Name is optional
            //$email->Subject   = 'SECURITY ANSWER CODE';
        //$email->Body      = $message;
            //$email->AddAddress( $to );
        //	$email->IsHTML(true); 
        
            
        //	$email->Send();

        echo"
            <script>
            notify('success', 'Code Has Been Sent To Your Email');
            </script>";
     
}

else if(isset($_POST['sa'])){

    $sa = $_POST['sa'];
    $ccode = $_POST['code'];

    if($_SESSION['randd'] == $ccode){

        $scode = $_SESSION['randd'];
        $sql1 = "UPDATE account SET answer='$sa' WHERE account='$account' ";
        $querysql1 = mysqli_query($link, $sql1);
        if($querysql1){
            echo"
            <script>
            notify('success', 'Security Answer Changed Successfully');
            $('.transfer-popup').css('display', 'none');
            </script>";
        }
        else{
            echo"
            <script>
            notify('warning', 'Error');
            </script>";
        }

    }
    else{
        echo"
        <script>
        notify('warning', 'Incorrect Code');
        </script>";

    }

}





?>