
<script>
 
        
 function notify(status, message, desc){
  toastr[status](message);
}


</script>


<?php  

include 'myconfig.php';


$modetype = $_POST['type'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$addr = $_POST['addr'];
$phone = $_POST['phone'];
$account = $_POST['account'];


 $updatesql = "UPDATE account SET first='$fname', last='$lname', tel='$phone', address='$addr' WHERE account='$account' ";

 $myqueryupdate  = mysqli_query($link, $updatesql);

 if($myqueryupdate){
     echo"
         <script>
         notify('success', 'Details have been updated successfully');
         </script>    
 ";
 }

?>