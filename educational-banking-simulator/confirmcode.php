<!doctype html>
<html lang="en">

<head>




    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LearnVaults - Money Transfer and Online Payments System</title>

    <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/plugin/apexcharts.css">
    <link rel="stylesheet" href="assets/css/plugin/nice-select.css">
    <link rel="stylesheet" href="assets/css/arafat-font.css">
    <link rel="stylesheet" href="assets/css/plugin/animate.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/toastr.min.css">
<style>
    .showblue{

        color: #027dc0;

         }
    #loader{
      position: fixed;
      text-align:center;
      width: 100%;
      height: 100%;
      top: 50%;
      left: 0;
      right: 0;
      bottom: 0;
      z-index: 10000;
      cursor: pointer;
      display:none;
      justify-content: center;
      margin-top:-50px;
    }
    
     #overlay{
      position: fixed;
      text-align:center;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: black;
      opacity: 0.6;
      z-index: 100000;
      cursor: not-allowed;
      display:none;
      justify-content: center;
    }
    
    </style>

</head>

<body>
<div id="loader">
            <img src="assets/css/ajax-loader.gif" alt="" width=".1em">
        </div>
        

        <div id="overlay">
        </div>

<?php


$account=$_POST['account0'];
$cid=$_POST['amount0'];
$modeType = $_POST['modeType0'];
$firstname0 =$_POST['add_internal_fname0'];
$lastname0 = $_POST['add_internal_lname0'];

$bname0 = $firstname0." ". $lastname0;

include 'myconfig.php';

$rand = rand().rand();
$date = date("jS F Y ");

$query=" SELECT * FROM account WHERE account='$account'";
$result=mysqli_query($link, $query);
$num=mysqli_num_rows($result);

while ($row = mysqli_fetch_assoc($result)) {
$first = $row['first'];
$last= $row['last'];
$pin= $row['pin'];
$account= $row['account'];
$sort= $row['sort'];
$deposit= $row['deposit'];
$year= $row['year'];
$day= $row['day'];
$month= $row['month'];
$picture= $row['picture'];
$transfer_type = $row['transfer_type'];


}

$name = 'Internet Banking Online Transfer initiated by '.$first.' '.$last;

if($transfer_type == 'ERROR_STOP'){

    
    
        echo'
                <script>

                var loader= $("#loader");
                loader.css("display", "block");
                setTimeout(function(){
                    loader.css("display", "none");
                    $("#recipientsMod2").modal("hide");
                    $("#individual2").css("display", "none");
                    $("#individual2").addClass("hide")
                    $("#tab-internal2").css("display", "none");
                
                    $("#transferMod").modal("show");
                    $("#popup_last").css("display", "block");
                    $("#popup_last").addClass("show active")

                }, 6000)
                </script>
                ';

}

else if($transfer_type == 'CODE_STOP'){

    echo'
                <script>

                var loader= $("#loader");
                loader.css("display", "block");
                setTimeout(function(){
                    loader.css("display", "none");
                    $("#recipientsMod2").modal("hide");
                    $("#individual2").css("display", "none");
                    $("#individual2").addClass("hide")
                    $("#tab-internal2").css("display", "none");
                
                    $("#transferMod").modal("show");
                    $("#popup_no4").css("display", "block");
                    $("#popup_no4").addClass("show active")

                }, 6000)
                </script>
                ';

}
else{
 

            $pre_sql="insert into tranz(tran,name,date,type,cid,account,bname,baccount) values ('$rand','$name','$date','Transferred','$cid','$account','$bname0','$modeType')";
            $sql=mysqli_query($link,$pre_sql);
            if (!$sql){
            echo 'Problem encountered. Try again later '.mysqli_error($link);
            exit();
            }

            $balance = ($deposit - $cid);
            $sql2=mysqli_query($link, "update account set deposit = '$balance' where account = '$account'");
            

            if($sql2){

                echo'
                
                <script>

                var loader= $("#loader");
                loader.css("display", "block");
                setTimeout(function(){
                    loader.css("display", "none");
                $("#recipientsMod2").modal("hide");
                $("#individual2").css("display", "none");
                $("#individual2").addClass("hide")
                $("#tab-internal2").css("display", "none");

                $("#transferMod").modal("show");
                $("#success").css("display", "block");
                $("#success").addClass("show active")

                }, 6000)
                </script>
                ';
            }

 
        }

?>

</body>


</html>