
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
                                                                   <?php echo' <img width="30em" src=\"$picture\" class="max-un" alt="image">'; ?>
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
                    <div class="sidebar-wrapper">
                        <div class="close-btn">
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                        <div class="sidebar-logo">
                            <a href="dashboard"><img src="assets/" alt="logo" width="200em"></a>
                        </div>
                        <ul>
                            <li class="">
                                <a href="dashboard.php">
                                    <img src="assets/images/icon/dashboard.png" alt="Dashboard"> <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="transactions.php">
                                    <img src="assets/images/icon/transactions.png" alt="Transactions"> <span>Statement</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="withdraw.php">
                                    <img src="assets/images/icon/pay.png" alt="Pay"> <span>Transfers / Pay Tax</span>
                                </a>
                            </li>
                           
                            <li class="">
                                <a href="request-step-1.php">
                                    <img src="assets/images/icon/receive.png" alt="Request"> <span>Request Payment</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="requests.php">
                                    <img src="assets/images/icon/receive.png" alt="Request"> <span>View Requests</span>
                                </a>
                            </li>
                            
                            <li class="active">
                                <a href="beneficiary.php">
                                    <img src="assets/images/icon/recipients.png" alt="Recipients"> <span>Beneficiaries</span>
                                </a>
                            </li>
                            
                            <li class="">
                                <a href="fund.php">
                                    <img src="assets/images/icon/deposit.png" alt="Deposit"> <span>Deposit Money</span>
                                </a>
                            </li>
                           
                        </ul>
                        <ul class="bottom-item">
                            <li class="">
                                <a href="account">
                                    <img src="assets/images/icon/account.png" alt="Account"> <span>Account</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="assets/images/icon/support.png" alt="Support"> <span>Support</span>
                                </a>
                            </li>
                            <li>
                                <a href="logout">
                                    <img src="assets/images/icon/quit.png" alt="Quit"> <span>Quit</span>
                                </a>
                            </li>
                        </ul>
                        <!--<div class="pt-120">-->
                        <!--    <div class="invite-now">-->
                        <!--        <div class="img-area">-->
                        <!--            <img src="assets/images/invite-now-illus.png" alt="Image">-->
                        <!--        </div>-->
                        <!--        <p>Invite your friend and get $25</p>-->
                        <!--        <a href="javascript:void(0)" class="cmn-btn">Invite Now</a>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Dashboard Section start -->
    <section class="dashboard-section body-collapse transactions recipients">
        <div class="overlay pt-120">
            <div class="container-fruid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="transactions-main">
                            <div class="filters-item d-flex justify-content-lg-between">
                                <div class="single-item search-area">
                                    <form action="#" class="flex-fill">
                                        <div class="form-group d-flex align-items-center">
                                            <img src="assets/images/icon/search.png" alt="icon">
                                            <input id="search" type="text" placeholder="Type to search...">
                                        </div>
                                    </form>
                                </div>
                                <div class="right-area w-100 d-flex align-items-center">
                                    <div class="single-item">
                                        <select id="select_type">
                                            <option value="internal">LearnVaults Beneficiaries</option>
                                            <option value="bank">Inter-Bank Beneficiaries</option>
                                            <option value="crypto">Crypto Accounts</option>
                                        </select>
                                    </div>
                                    <div class="single-item">
                                        <button data-bs-toggle="modal" data-bs-target="#recipientsMod">
                                            <i class="icon-e-plus"></i>
                                            New Beneficiary
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div id = "stage" style = "background-color:cc0;"> </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name/ID</th>
                                            <th scope="col">Created</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_show">
                                        
                                        <?php
                                        
                                        $sqlUpdate = "SELECT * FROM beneficiary WHERE account ='$account' ";

                                    $sqlQuery = mysqli_query($link, $sqlUpdate);

                                    echo "error ". mysqli_error($link);

                                    while($sqlRow = mysqli_fetch_assoc($sqlQuery)){
                                        $rowid = $sqlRow['id'];
                                        $rowuser = $sqlRow['useraccount'];
                                        $rowaccount = $sqlRow['account'];
                                        $rowname = $sqlRow['name'];
                                        $rowdate = $sqlRow['ddate'];

                                        echo'
                                        <tr >
                                        <td class="'.$rowid.'" scope="row"><p>'.$rowid.'</p></td>
                                        <td class="'.$rowid.'" scope="row">
                                        <div class="info-area">
                                            <div class="img-area">
                                                <img width="40em" src="assets/images/icon/bank.png" alt="image">
                                            </div>
                                            <div class="text-area">
                                                <p>'.$rowname.'</p>
                                                <p class="mdr" style="text-transform: uppercase">bank</p>
                                            </div>
                                        </div>
                                    </td>
                                        <td class="'.$rowid.'" scope="row"><p class="mdr">'.$rowdate.'</p></td>
                                        <td class="btn-item">
                                        <a href="javascript:void(0)">Send Fund</a>
                                        </td>
                                        </tr>  
                                        ';
    
                                    }
                                        
                                        
                                        ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                            <nav aria-label="Page navigation" class="d-flex justify-content-center mt-40">
                                <ul class="pagination justify-content-center align-items-center mb-40">
                                    
                                    <li class="page-item">
                                        <a class="page-link previous" href="javascript:void(0)" aria-label="Previous">
                                            <i class="fa-solid fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link active" href="javascript:void(0)">1</a></li>
                                    
                                        <a class="page-link next" href="javascript:void(0)" aria-label="Next">
                                            <i class="fa-solid fa-angle-right"></i>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Dashboard Section end -->

    <!-- Card Popup start -->
    <div class="card-popup recipients">
        <div class="container-fruid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="modal fade" id="cardMod" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header justify-content-center">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                </div>
                                <div class="main-content">
                                    <div class="top-area mb-40 mt-40 text-center">
                                        <div class="card-area mb-30">
                                            <img src="assets/images/userr.png" alt="image" class="contact_src">
                                        </div>
                                        <div class="text-area">
                                            <h5 class="contact_name">User Name</h5>
                                            <p class="contact_email">user@example.com</p>
                                        </div>
                                    </div>
                                    <div class="tab-area d-flex align-items-center justify-content-between">
                                        <ul class="nav nav-tabs mb-30" role="tablist">
                                            <li>
                                                <button class="send_funds">
                                                    <img src="assets/images/icon/send-funds.png" alt="icon">
                                                    Send Funds
                                                </button>
                                            </li>
                                           
                                            <li class="nav-item" role="presentation">
                                                <button id="limit-tab" data-bs-toggle="tab"
                                                    data-bs-target="#limit" type="button" role="tab" aria-controls="limit"
                                                    aria-selected="true" style="color: red !important" class="delete_contact">
                                                    <img src="assets/images/icon/delete-2.png" alt="icon">
                                                    Delete Beneficiary
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <input type="hidden" id="active_contact">
                                    <div class="tab-content mt-30">
                                        <div class="tab-pane fade show active" id="limit" role="tabpanel" aria-labelledby="limit-tab">
                                            <div class="bottom-area" style="margin-bottom: 2em">
                                                <p class="history">History with <span class="contact_name">User</span> :</p>
                                                
                                                <ul class="contact_history">
                                                
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
    <!-- Card Popup start -->

    <!-- Add Recipients Popup start -->
    <div class="add-recipients">
        <div class="container-fruid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="modal fade" id="recipientsMod" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header justify-content-between">
                                    <h6>Add Beneficiary</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                </div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="individual-tab" data-bs-toggle="tab"
                                            data-bs-target="#individual" type="button" role="tab" aria-controls="individual"
                                            aria-selected="false">
                                            <span class="icon-area">
                                                <img src="assets/images/icon/individual-icon.png" alt="icon">
                                            </span>
                                            LearnVaults Bank
                                        </button>
                                    </li>
                                    
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="company-tab" data-bs-toggle="tab"
                                            data-bs-target="#company" type="button" role="tab" aria-controls="company"
                                            aria-selected="true">
                                            <span class="icon-area">
                                                <img src="assets/images/icon/company-icon.png" alt="icon">
                                            </span>
                                            ACH / SWIFT
                                        </button>
                                    </li>
                                    
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="crypto-tab" data-bs-toggle="tab"
                                            data-bs-target="#crypto" type="button" role="tab" aria-controls="crypto"
                                            aria-selected="true">
                                            <span class="icon-area">
                                                <img src="assets/images/icon/company-icon.png" alt="icon">
                                            </span>
                                            Crypto Account
                                        </button>
                                    </li>
                                </ul>
                                
                                
                                <div class="tab-content">
                                    
                                    <div class="tab-pane fade" id="company" role="tabpanel" aria-labelledby="company-tab">
                                        <div class="image-area mt-30 text-center">
                                            <img src="assets/images/icon/add-recipients.png" alt="icon">
                                        </div>
                                        <form action="#">
                                            <div class="row justify-content-center">
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <label for="add_bank_name">Beneficiary ID</label>
                                                        <input type="text" id="add_bank_name" placeholder="e.g my account1">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12">
                                                    <div class="single-input">
                                                        <label>Account Type</label>
                                                        <select id="add_bank_account_type">
                                                            <option value="checking">Checking</option>
                                                            <option value="savings">Savings</option>
                                                        </select>
                                                    </div>
                                                </div>
                                               
                                                <div class="col-md-6">
                                                    <div class="single-input">
                                                        <label for="add_bank_routing_number">Routing Number</label>
                                                        <input type="text" id="add_bank_routing_number" placeholder="Dana">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="single-input">
                                                        <label for="add_bank_account_number">Account Number</label>
                                                        <input type="text" id="add_bank_account_number" placeholder="Dana">
                                                    </div>
                                                </div>
                                                
                                                 <div class="col-md-12">
                                                    <div class="single-input">
                                                        <label for="add_bank_account_name">Account Name</label>
                                                        <input type="text" id="add_bank_account_name" placeholder="xtechlab">
                                                    </div>
                                                </div>
                                               
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <label for="add_bank_pass">Account Pin</label>
                                                        <input type="password" autocomplete="new-password" id="add_bank_pass" placeholder="LearnVaults bank account pin">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12">
                                                    <div class="btn-border w-100">
                                                        <button class="cmn-btn w-100" id="add_bank_sbmt">Add Beneficiary</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="crypto" role="tabpanel" aria-labelledby="crypto-tab">
                                        <div class="image-area mt-30 text-center">
                                            <img src="assets/images/icon/add-recipients.png" alt="icon">
                                        </div>
                                        <form action="#">
                                            <div class="row justify-content-center">
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <label for="companyName">Beneficiary ID</label>
                                                        <input type="text" id="add_crypto_name" placeholder="e.g my crypto1">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="single-input">
                                                        <label>Select Cryptocurrency</label>
                                                        <select id="add_crypto_coin">
                                                            <option value="btc">Bitcoin</option><option value="eth">Ethereum</option><option value="usdt">USDT</option>                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <label for="add_crypto_addr">Wallet Address</label>
                                                        <input type="text" id="add_crypto_addr" placeholder="1EYogYG****kSJr6">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <label for="add_crypto_pass">Account Pin</label>
                                                        <input type="password" id="add_crypto_pass" placeholder="account authentication" autocomplete="new-password">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12">
                                                    <div class="btn-border w-100">
                                                        <button class="cmn-btn w-100" id="add_crypto_sbmt">Add Method</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <div class="tab-pane fade show active" id="individual" role="tabpanel" aria-labelledby="individual-tab">
                                        <div class="image-area mt-30 text-center">
                                            <img src="assets/images/user-profile.png" alt="icon">
                                        </div>
                                        <form action="#">
                                            <div class="row justify-content-center">
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <label for="individualName">User's Account Number</label>
                                                        <input type="number" id="add_internal_user" placeholder="11024454">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-input">
                                                        <label for="fname">First Name</label>
                                                        <input readonly type="text" id="add_internal_fname" placeholder="AUTO FILL">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-input">
                                                        <label for="lname">Last Name</label>
                                                        <input readonly type="text" id="add_internal_lname" placeholder="AUTO FILL">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <label for="add_internal_pass">Account Pin</label>
                                                        <input type="password" id="add_internal_pass" placeholder="account authentication" autocomplete="new-password">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12">
                                                    <div class="btn-border w-100">
                                                        <button id="add_internal_sbmt" class="cmn-btn w-100">Add Beneficiary</button>
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

        function OpenBootstrapPopup() 
        {
        $("#recipientsMod").modal('show');
        $('#company').css('display', 'block');
        $("#company").addClass("show active");
    
        }
        
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
    
    
    $("#search").keyup(function(){
        var key= $(this).val();
        var type= $("#select_type").val();
        $.post('ajax', {
            search: "set",
            what: "beneficiary",
            key: key,
            type: type
        }, function(data, status){
            $("#table_show").html(data.return);
        }, "JSON")
    })
    
    
    $("#select_type").change(function(){
        var type= $(this).val();
        loadOn();
        $.post('ajax', {
            get_contact: "set",
            type: type
        }, function(data, status){
            loadOff();
            $("#table_show").html(data.return)
        }, 'JSON')
    })
    
    
    $("body").on('click', '.contactField', function(){
        var contact_id= $(this).data('id');
        loadOn();
        $.post('ajax', {
            get_contact_detail: "set",
            id: contact_id
        }, function(data, status){
            loadOff();
            $(".contact_history").html(data.history);
            $(".contact_name").text(data.name);
            $(".contact_email").text(data.email);
            $(".contact_src").attr('src', data.avatar_src);
            $("#active_contact").val(contact_id);
        }, 'JSON')
    })
   
   
    $("#add_internal_user").keyup(function(){
        var user= $(this).val();
        if(user.length == 9){
            $(this).blur();
            $.post('ajax', {
                verify_user_acct: "set",
                user: user
            }, function(data, status){
                if(data.err== 0){
                    $("#add_internal_fname").val(data.fname);
                    $("#add_internal_lname").val(data.lname);
                    notify('success', 'Account retrieval completed')
                }else if(data.err== 2){
                    notify('info', data.msg)
                }
            }, "JSON")
        }else{
            $("#add_internal_fname").val('');
            $("#add_internal_lname").val('');
        }
    })
    
    
    $("#add_internal_sbmt").click(function(){
        event.preventDefault();
        var user= $("#add_internal_user").val();
        var pass= $("#add_internal_pass").val();
        var internal_fname = $("#add_internal_fname").val();
        var internal_lname = $("#add_internal_lname").val();


        if(user== "" || user.length != 9){
            notify('warning', 'Invalid account number!')
        }else if(pass== ""){
            notify('warning', 'Please enter your account pin!')
        }else{
            loadOn();
            $.post('ajax.php', {
                add_beneficiary: "set",
                type: "internal",
                user: user,
                pass: pass,
                internal_fname: internal_fname,
                internal_lname: internal_lname
            }, function(data){
                $('#stage').html(data);       
                loadOff(); 
            })
        }
    })
    
    
    $(".delete_contact").click(function(){
        event.preventDefault();
             var contact_id= $("#active_contact").val();
            if(contact_id == ""){
                notify('warning', 'Please refresh page')
            }else{
                loadOn();
                $.post('ajax', {
                    remove_contact: "set",
                    contact_id: contact_id
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
    
    
    
    
    $("#add_crypto_sbmt").click(function(){
        event.preventDefault();
        var name= $("#add_crypto_name").val();
        var coin= $("#add_crypto_coin").val();
        var addr= $("#add_crypto_addr").val();
        var pass= $("#add_crypto_pass").val();
        if(name== "" || coin== "" || addr== "" || pass==""){
            notify('warning', 'Please fill-in all fields')
        }else{
            loadOn();
            $.post('ajax', {
                add_beneficiary: "set",
                type: "crypto",
                name: name,
                coin: coin,
                addr: addr,
                pass: pass
            }, function(data, status){
                loadOff();
                if(data.err== 0){
                    $("#add_crypto_name").val('');
                    $("#add_crypto_coin").val('');
                    $("#add_crypto_addr").val('');
                    $("#add_crypto_pass").val('');
                    notify('success', data.msg)
                    // REFRESH LIST AFTER ADDING NEW BEN
                    var type= $("#select_type").val();
                    $.post('ajax', {
                        search: "set",
                        what: "beneficiary",
                        key: "",
                        type: type
                    }, function(data, status){
                        $("#table_show").html(data.return);
                    }, "JSON")
                }else{
                    notify('error', data.msg)
                }
            }, "JSON")
        }
    })
    
    
    $("#add_bank_sbmt").click(function(){
        event.preventDefault();
        var name= $("#add_bank_name").val();
        var pass= $("#add_bank_pass").val();
        var account_number= $("#add_bank_account_number").val();
        var account_name= $("#add_bank_account_name").val();
        var routing_number= $("#add_bank_routing_number").val();
        var account_type= $("#add_bank_account_type").val();
        var swift = $("#add_bank_swift_number").val();
        if(name== "" || account_number== "" || account_name== "" || account_type=="" || routing_number== "" || pass==""){
            notify('warning', 'Please fill-in all fields')
        }else{
            loadOn();
            $.post('ajax2.php', {
                add_beneficiary: "set",
                type: "bank",
                name: name,
                account_number: account_number,
                account_name: account_name,
                account_type: account_type,
                routing_number: routing_number,
                pass: pass,
                swift: swift
            }, function(data){
                $('#stage').html(data);       
                loadOff();      
            })
        }
    })

    $("td").click(function(){

beneval = $(this).attr('class');

event.preventDefault();

OpenBootstrapPopup();

$.post(
          "view.php",
          { beneval: beneval
        },
        function(data) {
            var json1 = $.parseJSON(data);
            loadOff();
             $('#add_internal_fname1').val(json1.first);
             $('#add_internal_lname1').val(json1.last);
             $('#pay_no1').val(json1.useraccount);

          }
       ); 

})
    
    
    
    $(".send_funds").click(function(){
        event.preventDefault();
        window.location.href="https://"+site_domain+"/account/withdraw"
    })

       
    })
</script>
</body>


</html>