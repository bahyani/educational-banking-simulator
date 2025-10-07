
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

$pmethod =$_GET['method'];
if($pmethod =='btc'){
    $currency = 'Bitcoin';

}
else if($pmethod =='eth'){
    $currency = 'Ethereum';

}
else{
    $currency = 'usdt';
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
    <section class="dashboard-section body-collapse pay step crypto">
        <div class="overlay pt-120">
            <div class="container-fruid">
                <div class="main-content">
                    <div class="head-area d-flex align-items-center justify-content-between">
                        <h4>Fund Account</h4>
                    </div>
                    <div class="row pb-120">
                        <div class="col-lg-3 col-md-4">
                            <div class="left-area">
                                <ul>
                                    <li><a href="fund-crypto-step-1.php" class="single-link active">Select Crypto</a></li>
                                    <li><a href="javascript:void(0)" class="single-link active">Enter Amount</a></li>
                                    <li><a href="javascript:void(0)" class="single-link three">Payment Info</a></li>
                                    <li><a href="javascript:void(0)" class="single-link last">Order Confirmed</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8">
                            <div class="head-area">
                                    <h4>Enter Amount To Fund</h4>
                                </div>
                            <form action="#">
                        <div class="exchange-content">
                            <div class="send-banance">
                                <span class="mdr">Amount</span>
                                <div class="input-area">
                                    <input id="from_amt" class="xxlr" placeholder="400.00" type="number">
                                    <select>
                                        <option value="1">USD</option>
                                    </select>
                                </div>
                                <p>Available Balance<b> <?php echo $currency_symbol. " ". number_format($deposit, 2);?> <span id="plus"></span></b></p>

                                    <?php 
                                    $url = "https://bitpay.com/api/rates";
                                    $json = json_decode(file_get_contents($url));
                                    $dollar = $btc = 0;
                                    $x = 0;
                                    $y = 0;

                                    foreach($json as $obj){
                                        $y++;
                                        if($y==3){
                                        $defaultPrice = $obj->rate;
                                        
                                        break;
                                        }
                                    }

                                    if($pmethod == 'btc'){
                                        foreach($json as $obj){
                                            $x++;
                                            if($x==3){
                                            
                                            $cryptoPrice = $obj->rate;
                                            
                                            break;
                                            }
                                        }


                                    }
                                    else if($pmethod == 'eth'){

                                        foreach($json as $obj){
                                            $x++;
                                            if($x==14){
                                           
                                            $cryptoPrice = $defaultPrice/$obj->rate;
                                            
                                            break;
                                            }
                                        }

                                    }

                                    else{

                                        foreach($json as $obj){
                                            $x++;
                                            if($x==164){
                                            
                                            $cryptoPrice = $obj->rate;
                                            
                                            break;
                                            }
                                        }

                                    }
                                    
                                    ?>
                            </div>
                            <div class="send-banance recipient">
                                <span class="mdr">Crypto Value</span>
                                <div class="input-area">
                                    <input id="to_amt" readonly class="xxlr" placeholder="<?php echo number_format(400/$cryptoPrice,6)?>" type="number">
                                    <input id="to_amt2" type="hidden" value="<?php echo $cryptoPrice ?>">
                                    <select id="to_select" disabled>
                                        <option value="btc">Bitcoin</option><option value="eth">Ethereum</option><option value="usdt">USDT</option>                                    </select>
                                </div>
                                <p>Current rate: <b id="rate_show">1 <?php echo $currency; ?> = <?php echo number_format($cryptoPrice,5);?> USD</b></p>
                            </div>
                        </div>
                       
                        <div class="footer-area mt-40">
                                <a href="fund-crypto-step-1.php">Previous Step</a>
                                <a href="#0" class="active" id="next">Next Step</a>
                            </div>
                    </form>
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

const searchParams = new URLSearchParams(window.location.search);
    const searchMethod = searchParams.get('method');


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
     var method= searchMethod;
    
    var btc_price = $('#to_amt2').val();
    var eth_price= $('#to_amt2').val();
    var usdt_price= $('#to_amt2').val();
    
    var btc_price2= $('#to_amt2').val();
    var eth_price2= $('#to_amt2').val();
    var usdt_price2= $('#to_amt2').val();
    
   
    $("#to_select").val(method).change();
    
    $("#from_amt").keyup(function(){
        var from_amt= $(this).val();
        var coin= $("#to_select").val();
        if(from_amt == "" || from_amt== 0){
            $("#to_amt").val(0);
            $("#plus").text('');
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
            $("#plus").text('+'+ from_amt)
        }
    })
    
    $("#next").click(function(){
        var amt= $("#from_amt").val();
        if(amt== "" || amt == 0){
            notify('warning', 'Please enter a valid amount')
        }else{
            loadOn();
            window.location.href="fund-crypto-step-3.php?amount="+amt+"&method="+method
        }
    })


    })
</script>

</body>

</html>