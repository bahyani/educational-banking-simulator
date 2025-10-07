
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

$blocked = $row['withdrawblock'];

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
    
    .coins{
        cursor: pointer;
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
    <section class="dashboard-section body-collapse pay crypto">
        <div class="overlay pt-120">
            <div class="container-fruid">
                <div class="main-content">
                    <div class="head-area d-flex align-items-center justify-content-between">
                        <h4>Withdraw From Account</h4>
                    </div>
                    <div class="row pb-120">
                        <div class="col-lg-3 col-md-4">
                            <div class="left-area">
                                <ul>
                                    <li><a href="javascript:void(0)" class="single-link active two"> Select Crypto</a></li>
                                    <li><a href="javascript:void(0)" class="single-link two">Enter Amount</a></li>
                                    <li><a href="javascript:void(0)" class="single-link three">Payment Info</a></li>
                                    <li><a href="javascript:void(0)" class="single-link last">Order Confirmed</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8">
                            <div class="table-area">
                                <div class="head-area">
                                    <h4>Select Crypto</h4>

                                    <?php
                                    $url = "https://bitpay.com/api/rates";
                                    $json = json_decode(file_get_contents($url));
                                    $dollar = $btc = 0;
                                    $x = 0;
                                   
                                    foreach($json as $obj){
                                            $x++;
                                            if($x==3){
                                            
                                            $cryptoPrice = $obj->rate;
                                                   
                                            }

                                            if($x==14)
                                            {
                                               
                                                $cryptoPrice2 = $cryptoPrice/$obj->rate;
                                          
                                            }

                                            if($x==1)
                                            {
                                                $cryptoPrice3 = $obj->rate;
                                                 
                                            }
                                        }

                                        ?>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col" >Name</th>
                                                <th scope="col" style="width: 60% !important">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <span class="submitinfo"></span>
                                            <tr class="coins" data-id="btc">
                                                
                                                <td style="width: 40% !important">
                                                    <span class="crypto-logo">
                                                        <img src="assets/images/icon/bitcoin.png" alt="icon">
                                                        <p>
                                                            Bitcoin
                                                            <span>BTC</span>
                                                        </p>
                                                    </span>
                                                </td>
                                                <td>
                                                    <p style="color: black !important" id="btc_price">$<?php echo number_format($cryptoPrice,2); ?></p>
                                                </td>
                                            </tr>
                                            
                                            <tr class="coins" data-id="eth">
                                               
                                                <td>
                                                    <span class="crypto-logo">
                                                        <img src="assets/images/icon/ethereum.png" alt="icon">
                                                        <p>
                                                            Ethereum
                                                            <span>ETH</span>
                                                        </p>
                                                    </span>
                                                </td>
                                                <td>
                                                    <p style="color: black !important" id="eth_price"> $<?php echo number_format($cryptoPrice2,2); ?></p>
                                                </td>
                                            </tr>
                                            
                                            <tr class="coins" data-id="usdt">
                                                
                                                <td >
                                                    <span class="crypto-logo">
                                                        <img src="assets/images/icon/tether.png" alt="icon">
                                                        <p>
                                                            Tether
                                                            <span>USDT</span>
                                                        </p>
                                                    </span>
                                                </td>
                                                <td>
                                                    <p style="color: black !important" id="usdt_price"> $<?php echo $cryptoPrice3; ?></p>
                                                </td>
                                            </tr>
                                            
                                             <input id="blockval" type="text" style="display: none;" value="<?php echo $blocked; ?>" />
                                            
                                        </tbody>
                                    </table>
                                </div>
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
        
        
        function get_prices(){
            $.post('ajax', {
                get_crypto_prices: "set"
            }, function(data, status){
                $("#btc_price").text('$'+data.btc)
                $("#eth_price").text('$'+data.eth)
            }, "JSON")
        }
        
        setInterval(get_prices, 1500);
        
        
        $(".coins").click(function(){
            var id= $(this).data('id');
            var blockval = $("#blockval").val();
            var blockvalue = "block";
            
            
            if(blockval === blockvalue ){
            
                 notify('error', 'Kindly contact the customer care to upgrade your account');
            }
            
            else{
            
                    $.post('checkwithdrawal.php',
                    {
                        id: id
                    }, 
                    
                    function(data){
                        loadOn();
                       
                       setTimeout(function(){
                            $('.submitinfo').html(data);
                             loadOff();
                       
                    }, 3000);
                    
                        
                    });
                    
        }
            
        })
    
       
    })
</script>
</body>

</html>