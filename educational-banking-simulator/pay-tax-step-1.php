

<?php
session_start();


include 'connect.php';
$account=$_SESSION['username'];
$query=mysqli_query($link, "select * from account where account = '$account'" );
$row=mysqli_fetch_array($query);

$first=$row['first'];
$last=$row['last'];
$mypin = $row['transfer_pin'];
$last_login=$row['last_login'];
$deposit=$row['deposit'];
$email = $row['email'];
$last=$row['last'];
$phone = $row['tel'];
$picture=$row['picture'];

if($picture == ""){
	$picture = "img/t1.jpg";
}

$linktype = $_GET['type'];

?>

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
                                        <span class="mdr">2</span>
                                    </div>
                                    <ul>
                                        
                                        
                                                         <li>
                                                            <a href="javascript:void(0)" class="d-flex">
                                                                <div class="img-area">
                                                                    <img width="30em" src="assets/images/user-profile.png" class="max-un" alt="image">
                                                                </div>
                                                                <div class="text-area">
                                                                    <p class="mdr">Account creation was successful. Welcome</p>
                                                                    <p class="mdr time-area">9 mins ago</p>
                                                                </div>
                                                            </a></li>
                                                    
                                                         <li>
                                                            <a href="javascript:void(0)" class="d-flex">
                                                                <div class="img-area">
                                                                    <img width="30em" src="assets/images/master-card.png" class="max-un" alt="image">
                                                                </div>
                                                                <div class="text-area">
                                                                    <p class="mdr">Your new payment method has been added successfully</p>
                                                                    <p class="mdr time-area">7 mins ago</p>
                                                                </div>
                                                            </a></li>
                                                                                            
                                        
                                    </ul>
                                </div>
                            </div>
                            
                            
                            
                            
                                                        <div class="single-item user-area">
                                <div class="profile-area d-flex align-items-center">
                                    <span class="user-profile">
                                        <img src="assets/images/uploads/avatar/user.png" alt="User" width="40em">
                                    </span>
                                </div>
                                <div class="main-area user-content">
                                    <div class="head-area d-flex align-items-center">
                                        
                                        <div class="profile-img">
                                            <img src="assets/images/uploads/avatar/user.png" alt="User" width="70em">
                                        </div>
                                        <div class="profile-head">
                                            <a href="account">
                                                <h5>Egan Bernard</h5>
                                            </a>
                                            <p class="wallet-id">Account No: 110526830</p>
                                        </div>
                                    </div>
                                    <ul>
                                        <li class="border-area">
                                            <a href="account"><i class="fas fa-cog"></i>Settings</a>
                                        </li>
                                        <li>
                                            <a href="logout"><i class="fas fa-sign-out"></i>Logout</a>
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


    <!-- Dashboard Section start -->
    <section class="dashboard-section body-collapse pay step deposit-money withdraw-money">
        <div class="overlay pt-120">
            <div class="container-fruid">
                <div class="main-content">
                    <div class="head-area d-flex align-items-center justify-content-between">
                        <h4>Tax Payment</h4>
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
                                        <p>Available Balance<b> <?php echo $currency_symbol. ' '. number_format($deposit, 2); ?> </b></p>
                                    </div>
                                </form>
                            </div>
                            <div class="footer-area mt-40">
                                <a href="withdraw">Go Back</a>
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
        if(amt== "" || amt == 0){
            notify('warning', 'Please enter a valid amount')
        }else{
            loadOn();
            window.location.href="pay-tax-step-2.php?amount="+amt+"&type=tax"
        }
    })


    })
</script>
</body>


</html>