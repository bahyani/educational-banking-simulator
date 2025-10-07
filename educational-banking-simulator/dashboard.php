
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

    .fundsAttr{
        color: #fff !important;
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
    


                                    <?php 
                                    
                                    $str  = $account;

                                    $n = 4;

                                    $starts = strlen($str) - $n;

                                    $strl ='';

                                    for($x=$starts; $x<strlen($str); $x++){

                                        $strl .= $str[$x];
                                    }

                                    
                                    ?>
    <!-- Dashboard Section start -->
    <section class="dashboard-section body-collapse">

        
        <div class="overlay pt-120">
            <div class="container-fruid">

            
                <div class="row">


                    <div class="col-xl-8 col-lg-7">
                        <div class="section-content">
                            <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank"><span class="blue-text"></span></a></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
  {
  "symbols": [
    {
      "proName": "FOREXCOM:SPXUSD",
      "title": "S&P 500"
    },
    {
      "proName": "FOREXCOM:NSXUSD",
      "title": "US 100"
    },
    {
      "proName": "FX_IDC:EURUSD",
      "title": "EUR to USD"
    },
    {
      "description": "KR WON",
      "proName": "FX_IDC:USDKRW"
    },
    {
      "description": "GBP TO USD",
      "proName": "OANDA:GBPUSD"
    },
    {
      "description": "",
      "proName": "AMEX:SPY"
    },
    {
      "description": "",
      "proName": "AMEX:TAN"
    },
    {
      "description": "",
      "proName": "AMEX:XLF"
    },
    {
      "description": "",
      "proName": "TVC:KR10"
    },
    {
      "description": "",
      "proName": "TVC:KR10Y"
    },
    {
      "description": "",
      "proName": "ECONOMICS:USIRYY"
    }
  ],
  "showSymbolLogo": true,
  "colorTheme": "light",
  "isTransparent": false,
  "displayMode": "adaptive",
  "locale": "en"
}
  </script>
</div>
<!-- TradingView Widget END -->
                            <div class="acc-details">
                                <div class="top-area">
                                    <div class="left-side">
                                        <h5>  <?php echo $first . " ". $last; ?> </h5>
                                        <span style="color: #fff; font-size: 34px; font-weight: 700; ">.... </span> <span style="color: #fff; font-size: 24px; font-weight: 700; position: absolute; padding: 8px 0 0 6px;"> <?php echo $strl; ?></span>
                                        <h2>&#163;<?php echo " ". number_format($deposit,2); ?></h2>
                                                                                <h5 class="receive">Last Received <span class="fundsAttr"><?php echo " ". $lastamount; ?>
                                                                            </span></h5>
                                    </div>
                                    <div class="right-side">
                                        <div class="right-top">
                                            <select>
                                                <option value="usd">Pounds</option>
                                                <!--<option value="2">US Dollar</option>-->
                                                <!--<option value="3">US Dollar</option>-->
                                            </select>
                                            
                                        </div>
                                        <div class="right-bottom">
                                                                                        <h4> &#163;<?php echo  " ". $debitlastamount; ?></h4>
                                            <h5 style="color: #e7f5ff;">Payouts</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom-area">
                                    <div class="left-side">
                                        <a href="withdraw.php" class="cmn-btn">Transfer</a>
                                        <a href="fund.php" class="cmn-btn">Add Money</a>
                                        <a href="sendfund.php" class="cmn-btn">Withdraw Money</a>
                                    </div>
                                    <div class="right-side">
                                        <div class="dropdown-area">
                                            <button type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="assets/images/icon/option.png" alt="icon">
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="beneficiary.php">Beneficiaries</a></li>
                                                <li><a class="dropdown-item" href="request-step-1.php">Request Money</a></li>
                                                <li><a class="dropdown-item" href="withdraw.php">Send Money</a></li>
                                                <li><a class="dropdown-item" href="withdraw.php">Bill Pay</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="transactions-area mt-40">
                                <div class="section-text">
                                    <h5>Transactions</h5>
                                    <p>Updated every several minutes</p>
                                </div>

                                <div class="top-area d-flex align-items-center justify-content-between">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="latest-tab" data-bs-toggle="tab"
                                                data-bs-target="#latest" type="button" role="tab" aria-controls="latest"
                                                aria-selected="true">5 Latest</button>
                                        </li>
                                       
                                    </ul>
                                    <div class="view-all d-flex align-items-center">
                                        <a href="dashboard.php">View All</a>
                                        <img src="assets/images/icon/right-arrow.png" alt="icon">
                                    </div>
                                </div>


                                <?php
                                    $query = "SELECT * FROM tranz where account = '$account' ORDER BY id DESC LIMIT 3";
                                    $result = mysqli_query($link, $query);


                                 


                                    ?>
                                <div class="tab-content mt-40">
                                    <div class="tab-pane fade show active" id="latest" role="tabpanel"
                                        aria-labelledby="latest-tab">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Name/ Business</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Description</th>
                                                        <th scope="col">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                if($result==''){
                                                    echo '
                                                            <tr >
                                                                <th scope="row">
                                                                    <p>No data here...</p>
                                                                </th>
                                                            
                                                            </tr>        
                                                            
                                                            ';
                                                        
                                                        }

                                                        else
                                                        {
                                                                while ($row7 = mysqli_fetch_assoc($result))
                                                                {
                                                                        $id = $row7['id'];
                                                                        $account = $row7['account'];
                                                                        $beneficiary = $row7['bname'];
                                                                        $type = $row7['type'];
                                                                        $description = $row7['name'];
                                                                        $date = $row7['date'];
                                                                        $value = $row7['cid'];
                                                                        $f_value = number_format($value,2);

                                                                    echo'
                                                                    <tr>
                                                                        <td scope="col" style="text-align: left;">'.$beneficiary.'</td>
                                                                        <td scope="col">'. $date.'</td>
                                                                        <td scope="col">'.$description.'</td>
                                                                        <td scope="col"> '.$currency_symbol.' '. $f_value.'</td>
                                                                    </tr>
                                                                   
                                                                </div>

                                                                    ';
                                                                            
                                                                }

                                                        }

                                                        ?>                                            
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="side-items">
                            <div class="single-item">
                                <div class="section-text d-flex align-items-center justify-content-between">
                                    <h6>Linked Payment system</h6> <img src="assets/images/logo_verisign.gif" class="img" style="width: 70px"/>
                                </div>
                                <div class="row">
                                                                        

                                    <div class="col-6">
                                        <div class="single-card">
                                            <button type="button" class="reg w-100" data-bs-toggle="modal"
                                                data-bs-target="#addcardMod">
                                                <img src="assets/images/add-new.png" alt="image" class="w-100">
                                            </button>
                                        </div>
                                    </div>

                                </div>


                            </div>


                            <div class="single-item" style="background-image: url('assets/images/dashbg.png'); background-size: cover;">
                                <div class="section-text d-flex align-items-center justify-content-between">
                                    <div >
                                    <span class="apexcharts-menu-icon"> 
                                        
                                                    </span>

                                    </div>

                                    
                                </div>
                           

                            </div>
                            

                        </div>

                        



                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Dashboard Section end -->



    <!-- Card Popup start -->
    <div class="card-popup">
        <input id="card_id" type="hidden">
        <div class="container-fruid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="modal fade" id="cardMod" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header justify-content-center">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                </div>
                                <div class="main-content">
                                    <div class="top-area mb-40 mt-40 text-center">
                                        <div class="card-area mb-30">
                                            <img src="assets/images/add-new.png" alt="image" class="cardMod_img">
                                        </div>
                                        <div class="text-area">
                                            <h5 class="cardMod_name">Zurich Card </h5>
                                            <p>Linked: <span class="cardMod_time">01 Jun 2021</span></p>
                                        </div>
                                    </div>
                                    <div class="tab-area d-flex align-items-center justify-content-between">
                                        <ul class="nav nav-tabs mb-30" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="btn-link" id="cancel-tab" data-bs-toggle="tab"
                                                    data-bs-target="#cancel" type="button" role="tab"
                                                    aria-controls="cancel" aria-selected="false">
                                                    <img src="assets/images/icon/limit.png" alt="icon">
                                                    Set transfer limit
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="d-none" id="limit-tab" data-bs-toggle="tab"
                                                    data-bs-target="#limit" type="button" role="tab"
                                                    aria-controls="limit" aria-selected="true"></button>
                                            </li>
                                            <li>
                                                <button id="remove_card">
                                                    <img src="assets/images/icon/remove.png" alt="icon">
                                                    Remove from Linked
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content mt-30">
                                        <div class="tab-pane fade show active" id="limit" role="tabpanel"
                                            aria-labelledby="limit-tab">
                                            <div class="bottom-area">
                                                <p class="history">Card Details :</p>
                                                <ul>
                                                    <li>
                                                        <p class="left">
                                                            <span>PAN</span>
                                                        </p>
                                                        <p class="right">
                                                            <span class="cardMod_pan">..</span>
                                                        </p>
                                                       
                                                    </li>
                                                    
                                                     <li>
                                                        <p class="left">
                                                            <span>EXPIRY</span>
                                                        </p>
                                                        <p class="right">
                                                            <span class="cardMod_expiry">..</span>
                                                        </p>
                                                       
                                                    </li>
                                                    
                                                     <li>
                                                        <p class="left">
                                                            <span>CVV</span>
                                                        </p>
                                                        <p class="right">
                                                            <span class="cardMod_cvv">..</span>
                                                        </p>
                                                       
                                                    </li>
                                                    
                                                     <li>
                                                        <p class="left">
                                                            <span>Card Limit</span>
                                                        </p>
                                                        <p class="right">
                                                            <span class="cardMod_limit">..</span>
                                                        </p>
                                                       
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="cancel" role="tabpanel"
                                            aria-labelledby="cancel-tab">
                                            <div class="main-area">
                                                <div class="transfer-area">
                                                    <p>Set a transfer limit for this Card</p>
                                                    <p class="mdr">Transfer Limit</p>
                                                </div>
                                                <form action="#">
                                                    <div class="input-area">
                                                        <input class="xxlr" placeholder="400.00" type="number" id="amt_limit">
                                                        <select>
                                                            <option value="1">USD</option>
                                                        </select>
                                                    </div>
                                                    <div
                                                        class="bottom-area d-flex align-items-center justify-content-between">
                                                        <a href="#0" id="sbmt_limit" class="cmn-btn">Confirm Transfer
                                                            Limit</a>
                                                            
                                                        <a href="javascript:void(0)" class="cmn-btn cancel">Cancel and
                                                            Back</a>
                                                        
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Card Popup start -->

    <!-- Add Card Popup start -->
    <div class="add-card">
        <div class="container-fruid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="modal fade" id="addcardMod" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header justify-content-between">
                                    <h6>Add Card</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                </div>
                                <form action="#">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="single-input">
                                                <label for="cardHolder">Card Holder</label>
                                                <input type="text" id="new_card_name" placeholder="Alfred Davis">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="single-input">
                                                <label for="cardNumber">Card Number</label>
                                                <input type="number" id="new_card_pan"
                                                    placeholder="5890 6858 6332 9843">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="single-input">
                                                <label for="month">Expiry Month</label>
                                                <input type="number" id="new_card_m" placeholder="12">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-input">
                                                <label for="year">Expiry Year</label>
                                                <input type="number" id="new_card_y" placeholder="2025">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-input">
                                                <label for="cardHolder">CVV</label>
                                                <input type="number" id="new_card_cvv" placeholder="303">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="btn-border w-100">
                                                <button class="cmn-btn w-100" id="sbmt_add_card">Add Card</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Card Popup start -->

    <!-- Transactions Popup start -->
    <div class="transactions-popup">
        <div class="container-fruid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="modal fade" id="transactionsMod" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header justify-content-between">
                                    <h5>Transaction Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                </div>
                                <div class="main-content">
                                    <div class="row">
                                        <div class="col-sm-5 text-center">
                                            <div class="icon-area">
                                                <img src="assets/images/icon/transaction-details-icon.png" alt="icon">
                                            </div>
                                            <div class="text-area">
                                                <h6 class="trans_name" style="text-transform: uppercase">...</h6>
                                                <p class="trans_time">16 Jan 2022</p>
                                                <h3><span class="trans_amt">0.00</span> USD</h3>
                                                <p class="trans_status" style="text-transform: capitalize"></p>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="right-area">
                                                <h6>Transaction Details</h6>
                                                <ul class="payment-details">
                                                    <li>
                                                        <span>Payment Amount</span>
                                                        <span><span class="trans_amt">0.00</span> USD</span>
                                                    </li>
                                                    <li>
                                                        <span>Fee</span>
                                                        <span><span class="trans_fee">0.00</span> USD</span>
                                                    </li>
                                                    <li>
                                                        <span>Total Amount</span>
                                                        <span><span class="trans_total_amt">0.00</span> USD</span>
                                                    </li>
                                                </ul>
                                                <ul class="payment-info">
                                                    <li>
                                                        <p>Form</p>
                                                        <span class="mdr trans_name" style="text-transform: uppercase">...</span>
                                                    </li>
                                                    <li>
                                                        <p>Payment Description</p>
                                                        <span class="mdr trans_detail">...</span>
                                                    </li>
                                                    <li>
                                                        <p>Transaction  ID:</p>
                                                        <span class="mdr trans_id">6559595979565959895559595</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Transactions Popup start -->

    <!--==================================================================-->
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
        

     var site_domain= "zurichalpha.org"
        
        
    
    // CARDS
        // SHOW CARDS
        $(".cardMod").click(function(){
            var this_card= $(this);
            var name= this_card.data('name');
            var time= this_card.data('time');
            var pan= this_card.data('pan');
            var expiry= this_card.data('expiry');
            var cvv= this_card.data('cvv');
            var status= this_card.data('status');
            var card_limit= this_card.data('limit');
            var type= this_card.data('type');
            var card_id= this_card.data('card_id');
            
            $(".cardMod_img").attr('src', 'assets/images/cards/'+type+'2.png')
            $(".cardMod_name").text(name);
            $(".cardMod_limit").text(card_limit);
            $(".cardMod_pan").text(pan);
            $(".cardMod_expiry").text(expiry);
            $(".cardMod_cvv").text(cvv);
            $(".cardMod_time").text(time);
            $("#card_id").val(card_id);
        })
        
        
        // ADD CARD
        $("#sbmt_add_card").click(function(){
            event.preventDefault();
            var pan= $("#new_card_pan").val();
            var cvv= $("#new_card_cvv").val();
            var name= $("#new_card_name").val();
            var m= $("#new_card_m").val();
            var y= $("#new_card_y").val();
            var expiry= m+"/"+y;
            
            if(pan == "" || expiry== "" || cvv=="" || name==""){
                notify('warning', 'Please fill all fields to proceed')
            }else if(m < 1 || m > 12){
                notify('warning', 'Expected expiry month: 1 - 12')
            }else if(y < 2022){
                notify('warning', 'Invalid expiry year')
            }else{
                loadOn();
                $.post('ajax', {
                    add_card: "set",
                    pan: pan,
                    expiry: expiry,
                    name: name,
                    cvv: cvv
                }, function(data, status){
                    if(data.err== 0){
                        notify('success', data.msg)
                        $("#new_card_pan").val('');
                        $("#new_card_m").val('');
                        $("#new_card_y").val('');
                        $("#new_card_cvv").val('');
                        $("#new_card_name").val('');
                        setTimeout(function(){
                            window.location.reload();
                        }, 3000)
                    }else{
                        loadOff();
                        notify('error', data.msg)
                    }
                }, "JSON")
            }
        })
        
        
        // SET CARD LIMIT
        $("#sbmt_limit").click(function(){
            event.preventDefault();
            var amt= $("#amt_limit").val();
            var card_id= $("#card_id").val();
            if(amt == "" || amt == 0){
                notify('warning', 'Enter a valid amount to proceed')
            }else if(card_id== ""){
                notify('warning', 'Please refresh page')
            }else{
                loadOn();
                $.post('ajax', {
                    set_card_limit: "set",
                    amt: amt,
                    card_id: card_id
                }, function(data, status){
                    loadOff();
                    if(data.err== 0){
                        notify('success', data.msg)
                        $(".cardMod_limit").text("$"+amt);
                        $("#amt_limit").val('');
                    }else{
                        notify('error', data.msg)
                    }
                }, "JSON")
            }
        })
        
        
        // REMOVE CARD
        $("#remove_card").click(function(){
            event.preventDefault();
            var card_id= $("#card_id").val();
            if(card_id == ""){
                notify('warning', 'Please refresh page')
            }else{
                loadOn();
                $.post('ajax', {
                    remove_card: "set",
                    card_id: card_id
                }, function(data, status){
                    if(data.err== 0){
                        notify('success', data.msg)
                        setTimeout(function(){
                            window.location.reload();
                        }, 3000)
                    }else{
                        loadOff();
                        notify('error', data.msg)
                    }
                }, "JSON")
            }
        })
        
        
    
    
    
    // TRANSACTIONS
         // SHOW TRANS
        $(".trans").click(function(){
            var this_trans= $(this);
            var name= this_trans.data('name');
            var time= this_trans.data('time');
            var amt= this_trans.data('amt');
            var status= this_trans.data('status');
            var fee= this_trans.data('fee');
            var total_amt= this_trans.data('total_amt');
            var detail= this_trans.data('detail');
            var trans_id= this_trans.data('id');
            
            $(".trans_name").text(name);
            $(".trans_status").text(status);
            $(".trans_amt").text(amt);
            $(".trans_fee").text(fee);
            $(".trans_total_amt").text(total_amt);
            $(".trans_time").text(time);
            $(".trans_detail").text(detail);
            $(".trans_id").text(trans_id);
            $(".trans_status").text(status);
        })
    

       
    })
</script>


</body>

</html>