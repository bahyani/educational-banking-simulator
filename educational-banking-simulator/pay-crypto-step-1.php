



<?php
session_start();


include 'connect.php';

$account=$_SESSION['username'];
$query=mysqli_query($link, "select * from account where account = '$account'" );
$row=mysqli_fetch_array($query);

$first=$row['first'];
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
    <title>LearnVaults </title>

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

    <!-- Dashboard Section start -->
    <section class="dashboard-section body-collapse pay step step-2">
        <div class="overlay pt-120">
            <div class="container-fruid">
                <div class="main-content">
                    <div class="head-area d-flex align-items-center justify-content-between">
                        <h4>Make A Payment</h4>
                    </div>
                    <div class="choose-recipient">
                        <div class="step-area">
                            <span class="mdr">Step 1 of 3</span>
                            <h5>Set Amount to Pay</h5>
                        </div>
                    </div>
                    <form action="#">
                        <div class="exchange-content">
                            <div class="send-banance">
                                <span class="mdr">You Send</span>
                                <div class="input-area">
                                    <input id="from_amt" class="xxlr" placeholder="400.00" type="number">
                                    <select>
                                        <option value="1">USD</option>
                                    </select>
                                </div>
                                <p>Available Balance<b>$0.00</b></p>
                            </div>
                            <div class="send-banance recipient">
                                <span class="mdr">Recipient gets</span>
                                <div class="input-area">
                                    <input id="to_amt" readonly class="xxlr" placeholder="45162.98" type="number">
                                    <select id="to_select">
                                        <option value="btc">Bitcoin</option><option value="eth">Ethereum</option><option value="usdt">USDT</option>                                    </select>
                                </div>
                                <p>Current rate: <b id="rate_show">1 BTC = 25,803.63 USD</b></p>
                            </div>
                        </div>
                       
                        <div class="footer-area mt-40">
                                <a href="withdraw">Go Back</a>
                                <a href="#0" class="active" id="next">Next Step</a>
                            </div>
                    </form>
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
    
    var btc_price= "25,804";
    var eth_price= "1,733";
    var usdt_price= "1";
    
    var btc_price2= "25803.63000000";
    var eth_price2= "1732.83000000";
    var usdt_price2= "1";
    
    
    $("#to_select").change(function(){
        var selected= $(this).val();
        $("#to_amt").val(0);
        $("#from_amt").val(0);
        if(selected== "btc"){
            var price= btc_price;
        }else if(selected== "eth"){
            var price= eth_price;
        }else if(selected== "usdt"){
            var price= usdt_price;
        }
        $("#rate_show").html('1 <strong style="text-transform: uppercase">'+selected+'</strong> = '+price+' USD')
    })
    
    $("#from_amt").keyup(function(){
        var from_amt= $(this).val();
        var coin= $("#to_select").val();
        if(from_amt == "" || from_amt== 0){
            $("#to_amt").val(0);
        }else{
            if(coin== "btc"){
                var price= btc_price2;
            }else if(coin== "eth"){
                var price= eth_price2;
            }else if(coin== "usdt"){
                var price = usdt_price2;
            }
            var ret= from_amt/price
            $("#to_amt").val(ret.toFixed(5));
        }
    })
    
    $("#next").click(function(){
        var amt= $("#from_amt").val();
        if(amt== "" || amt == 0){
            notify('warning', 'Please enter a valid amount')
        }else{
            loadOn();
            window.location.href="pay-step-2.php?amount="+amt+"&type=crypto"
        }
    })


    })
</script>
</body>

</html>