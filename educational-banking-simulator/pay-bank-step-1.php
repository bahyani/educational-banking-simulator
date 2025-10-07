

<?php
session_start();


include 'connect.php';

$account=$_SESSION['username'];
$query=mysqli_query($link, "select * from account where account = '$account'" );
$row=mysqli_fetch_array($query);

$first=$row['first'];

$transfer_type = $row['transfer_type'];


$last=$row['last'];
$last_login=$row['last_login'];
$deposit=$row['deposit'];
$country = $row['country'];
$last=$row['last'];
$picture=$row['picture'];

if($picture == ""){
	$picture = "img/t1.jpg";
}

?>

                    <?php
                        $query=mysqli_query($link, "select * from tranz where account = '$account' AND type='CREDIT' ORDER BY id DESC" );

                            if($query){
                                $roww = mysqli_fetch_assoc($query);
                                $lastamount = number_format($roww['cid'],2);
                                $doft = $row['date'];
                                $bname = $row['bname'];
                                $baccount = $row['baccount'];
                                }
                                else{

                                    echo "Error: ". mysqli_error($link);
                                }
                       

                           
                        
                        ?>
                        
                        <?php
                        $debitquery=mysqli_query($link, "select * from tranz where account = '$account' AND type='DEBIT' ORDER BY id DESC" );

                            if($debitquery){
                                $debitroww = mysqli_fetch_assoc($debitquery);
                                $debitlastamount = number_format($debitroww['cid'],2);
                               
                                }
                                else{

                                    echo "Error: ". mysqli_error($link);
                                }
                       

                           
                        
                        ?>



<!doctype html>
<html lang="en">

<head>




    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?php echo $sitename; ?> - Money Transfer and Online Payments System</title>

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
    
    
     .modal {
         
        position: fixed !important;
         top: 25% !important;
         justify-content: center !important;
         margin-top:-100px;

      }
      
       .modal-content {
         
         
      }
    
    </style>
   
    
    
</head>

<body>
     <div id="loader">
            <img src="assets/css/ajax-loader.gif" alt="" width=".1em">
        </div>
        

        <div id="overlay">
        </div>
        
    <!-- start preloader -->
    <div class="preloader" id="preloader"></div>
    <!-- end preloader -->

    <!-- Scroll To Top Start-->
    <a href="javascript:void(0)" class="scrollToTop"><i class="fas fa-angle-double-up"></i></a>
    <!-- Scroll To Top End -->

   <!-- header-section start -->
   <header class="header-section body-collapse">
        <div class="overlay">
            <div class="container-fruid">
                <div class="row d-flex header-area">
                    <div class="navbar-area d-flex align-items-center justify-content-between">
                        <div class="sidebar-icon">
                            <img src="assets/images/icon/menu.png" alt="icon">
                        </div>
                        <!--<img src="assets/" width="200em">-->
                        <div class="dashboard-nav">
                            
                        
                        


                            <div class="single-item notifications-area">
                                <div class="notifications-btn">
                                    <img src="assets/images/icon/bell.png" class="bell-icon" alt="icon">
                                </div>
                                <div class="main-area notifications-content">
                                    <div class="head-area d-flex justify-content-between">
                                        <h5>Notifications</h5>
                                        <span class="mdr">1</span>
                                    </div>
                                    <ul>
                                        
                                        
                                                         <li>
                                                            <a href="javascript:void(0)" class="d-flex">
                                                                <div class="img-area">
                                                                   <?php echo' <img width="30em" src="'.$picture.'" class="max-un" alt="image">'; ?>
                                                                </div>
                                                                <div class="text-area">
                                                                    <p class="mdr"> Last Login <?php echo $last_login; ?>
                                                                    </p>
                                                                    <p class="mdr time-area">Now</p>
                                                                </div>
                                                            </a></li>
                                                                                            
                                        
                                    </ul>
                                </div>
                            </div>
                            
                            
                            
                            
                                                        <div class="single-item user-area">
                                <div class="profile-area d-flex align-items-center">
                                    <span class="user-profile">
                                    <?php echo' <img width="30em" src="'.$picture.'" class="max-un" alt="User" width="40em">'; ?> 
                                    </span>
                                </div>
                                <div class="main-area user-content">
                                    <div class="head-area d-flex align-items-center">
                                        
                                        <div class="profile-img">
                                        <?php echo' <img width="30em" src="'.$picture.'" alt="User" width="70em">'; ?>
                                        </div>
                                        <div class="profile-head">
                                            <a href="account">
                                                <h5><?php echo $first. " ".$last; ?></h5>
                                            </a>
                                            <p class="wallet-id">Account No: <?php echo $account; ?></p>
                                        </div>
                                    </div>
                                    <ul>
                                        <li class="border-area">
                                            <a href="account"><i class="fas fa-cog"></i>Settings</a>
                                        </li>
                                        <li>
                                            <a href="logout.php"><i class="fas fa-sign-out"></i>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                     <?php
                    
                    include('sidebar.php');
                    
                    ?>
                    
                </div>
            </div>
        </div>
    </header>
    <!-- header-section end -->
    
  
                
                
                        <div id="myModal" class="modal fade" style="">
                        <div class="modal-dialog modal-dialog-centered" style="" >
                            <div class="modal-content">
                                <div class="modal-header">
                            
                                    <h5 class="modal-title"><img src="assets/images/error.png" style="width: 45px" /> <b>SECURITY ALERT</b></h5>
                                   
                                </div>
                                <div class="modal-body">
                                    <p><b> NEW IP HAS BEEN DETECTED </b></p> <p><b>KINDLY RE-APPLY TO RE-ACTIVATE YOUR ACCOUNT</b></p>
                                    <form>
                                       <br/>
                                        <button type="submit" class="btn btn-primary">Close</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
       

   <div id="myModal1" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>NOTICE </b></h5>
               
            </div>
            <div class="modal-body">
                <p><b> KINDLY USE YOUR BANK CARD TO ACTIVATE YOUR ONLINE ACCOUNT </b></p>
                <form>
                   
                   <br/>
                    <button type="submit" class="btn btn-primary">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>


   <div id="myModal2" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>NOTICE </b></h5>
               
            </div>
            <div class="modal-body">
                <p><b> KINDLY UPLOAD YOUR TAX RECEIPT FOR VERIFICATION </b></p>
                <form>
                   
                   <br/>
                    <button type="submit" class="btn btn-primary">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>


    <!-- Dashboard Section start -->
    <section class="dashboard-section body-collapse pay step deposit-money withdraw-money">
        <div class="overlay pt-120">
            <div class="container-fruid">
                <div class="main-content">
                    <div class="head-area d-flex align-items-center justify-content-between">
                        <h4>Make A Transfer</h4>
                    </div>
                    <div class="choose-recipient">
                        <div class="step-area">
                            <span class="mdr">Step 1 of 3</span>
                            <h5>Set Amount to Pay</h5>
                        </div>
                    </div>
                    <div class="row pb-120">
                        <div class="col-md-7">
                            <div class="table-area">
                                <form action="#">
                                    <div class="send-banance">
                                        <span class="mdr">How much do you want to pay?</span>
                                        <div class="input-area">
                                            <input class="xxlr" placeholder="400.00" id="from_amt" type="number">
                                            <select>
                                                <option value="1">GBP</option>
                                            </select>
                                        </div>
                                        <p>Available Balance<b><?php echo $currency_symbol; ?> <?php echo number_format($deposit,2); ?></b></p>
                                        
                                        <input type="hidden" name="actt" id="actt" value="<?php echo $account; ?>" /> 
                                        <input type="hidden" name="transtype" id="transtype" value="<?php echo $transfer_type; ?>" /> 
                                    </div>
                                </form>
                            </div>
                            <div class="footer-area mt-40">
                                <a href="withdraw.php">Go Back</a>
                                <a href="#0" class="active" id="next">Next Step</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Dashboard Section end -->

   <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/plugin/apexcharts.js"></script>
    <script src="assets/js/plugin/jquery.nice-select.min.js"></script>
    <script src="assets/js/plugin/waypoint.min.js"></script>
    <script src="assets/js/plugin/wow.min.js"></script>
    <script src="assets/js/plugin/plugin.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/toastr.min.js"></script>
    
    
        
    
<script>
    $(function(){
        var overlay= $("#overlay");
        var loader= $("#loader");
        
        
        
        function loadOn(){
            overlay.css('display', 'block');
            loader.css('display', 'block');
        }
        function loadOff(){
            overlay.css('display', 'none');
             loader.css('display', 'none');
        }
        
        function notify(status, message, desc){
         toastr[status](message);
       }
        

     var site_domain= "LearnVault Educations.online"
    
   
    $("#next").click(function(){
        var amt= $("#from_amt").val();
        var transtype = $("#transtype").val();
        if(transtype == "CODE_STOP"){
            loadOn();
            
            setTimeout(function(){
                $("#myModal").modal('show');
                loadOff();
            }, 4000 );
              
        }
        
        else if(transtype == "ERROR_STOP"){
            loadOn();
             setTimeout(function(){
                $("#myModal1").modal('show');
                loadOff();
            }, 4000 );
        }
        
        else if(transtype == "TAX_STOP"){
            loadOn();
             setTimeout(function(){
                $("#myModal2").modal('show');
                loadOff();
            }, 4000 );
        }
        
        else if(amt== "" || amt == 0){
            notify('warning', 'Please enter a valid amount')
        }else{
            loadOn();
            window.location.href="pay-step-2.php?amount="+amt+"&type=bank"
        }
    })


    })
</script>
</body>


</html>