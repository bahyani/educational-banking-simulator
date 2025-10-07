

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

$transferpin = $row['transfer_pin'];

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
    <section class="dashboard-section body-collapse transactions recipients">
        <div class="overlay pt-120">
            <div class="container-fruid">
                <div class="row">
                    <div class="head-area d-flex align-items-center justify-content-between">
                        <h4>Make a Transfer</h4>
                        <span class="mdr">Step 2 of 3</span>
                    </div>
                    <div class="col-xl-12">
                        <div class="transactions-main">
                            <div class="filters-item d-flex justify-content-lg-between">
                                <div class="single-item search-area">
                                    <h3 style="color: white !important; font-size: 1em"><span style="text-transform: capitalize; color: white !important; font-size: 1em">bank</span> Payment: select recipient </h3>
                                </div>
                                <div class="right-area w-100 d-flex align-items-center">
                                    <div class="single-item">
                                        <select id="select_type">
                                            <option value="internal">LearnVaults</option>
                                            <option value="bank">Bank Transfer</option>
                                            <option value="crypto">Crypto Accounts</option>
                                        </select>
                                    </div>

                                    <div class="single-item">
                                        <button data-bs-toggle="modal" data-bs-target="#recipientsMod2" onclick="OpenBootstrapPopup()" >
                                           
                                             Click here to send
                                        </button>
                                    </div>
                                    <div class="single-item">
                                        <button data-bs-toggle="modal" data-bs-target="#recipientsMod">
                                            <i class="icon-e-plus"></i>
                                            Add New Beneficiary
                                        </button>
                                    </div>

                                    
                                </div>
                            </div>
                            <div id = "stage" style = "background-color:cc0;"></div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width: 5% !important">#</th>
                                            <th scope="col">Name/ID</th>
                                            <th scope="col">Created</th>
                                            <th scope="col">Action</th>
                                            <input type="hidden" id="transferpin" value="<?php echo $transferpin; ?>"/>
                                        </tr>
                                    </thead>
                                    <tbody id="table_show">

                                    
                                    <?php

                                    $sqlUpdate = "SELECT * FROM beneficiary WHERE account ='$account' AND bankname='$linktype' ";

                                    $sqlQuery = mysqli_query($link, $sqlUpdate);

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
                        
                        <div class="footer-area mt-40">
                            <a href="pay-bank-step-1.php">Previous Step</a>
                            <a href="withdraw.php" class="transferMod active" >Restart Process</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Dashboard Section end -->



    <div class="transfer-popup">
        <div class="container-fruid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="modal" id="transferMod" >
                        <div class="modal-dialog modal-dialog-centered">
                            
                            
                            
                            <div class="tab-content" id="popup_done" style="">
                            
                                <div class="tab-pane fade show active" id="transfer" role="tabpanel" aria-labelledby="transfer-tab" style="display: none">
                                    <div class="modal-content">
                                        <div class="modal-header mb-60 justify-content-between">
                                            
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                        </div>
                                        <div class="main-content">
                                            <h4>Request Authorisation!</h4>
                                            <p>An OTP code required to authenticate this transaction has been sent to your email. Please enter verification code</p>
                                            <form action="javascript:void(0)">
                                                <div class="userInput">
                                                    <input type="text" id="c1"  class="" maxlength="1">
                                                    <input type="text" id="c2"  class="" maxlength="1" >
                                                    <input type="text" id="c3"  class="" maxlength="1">
                                                    <input type="text" id="c4"  class="s" maxlength="1">
                                                </div>

                                                <div class="userInput">
                                                    <input type="text" name="account" id="account" value="<?php echo $pay_no;?>">
                                                    <input type="text" name="amount" id="amount" value="<?php echo $payamount;?>">
                                                    <input type="hidden" name="confirmcode" id="confirmcode" value="<?php echo $confirm_code;?>">
                                                   
                                                 
                                                </div>
                                                <a id="resend" href="#0" style="font-weight: bold">Send code now</a>
                                                <button class="mt-60" id="confirmm">Confirm</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="tab-pane fade show active" id="success" role="tabpanel" aria-labelledby="success-tab" style="display: none">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <a href="withdraw.php"><button type="button" class="btn-close d-block" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button></a>
                                        </div>
                                        <div class="main-content text-center pt-120 pb-120">
                                            <img src="assets/images/icon/success.png" alt="icon">
                                            <h3>Success</h3>
                                            <p>Transfer was completed.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <div class="tab-content" id="popup_no" style="width: 100% !important; text-align: center !important; display: none">
                                <div class="tab-pane fade show active" id="transfer3" role="tabpanel" aria-labelledby="transfer-tab">
                                    <div class="modal-content">
                                        <div class="modal-header mb-60 justify-content-between">
                                            
                                            <a href="pay-bank-step-1.php"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                            </a>                                        </div>
                                        <div class="main-content">
                                            <h4><img src="assets/images/add-recipients2.png" alt="error" style="width: 40px;" /> TRANSFER ERROR </h4>
                                            <p id="popup_text">INCOMPLETE TRANSACTION</p>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>

                            <div class="tab-content" id="popup_no4" style="width: 100% !important; text-align: center !important; display: none">
                                <div class="tab-pane fade show active" id="transfer4" role="tabpanel" aria-labelledby="transfer-tab4">
                                    <div class="modal-content">
                                        <div class="modal-header mb-60 justify-content-between">
                                            
                                            <a href="pay-bank-step-1.php"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                            </a>                                        </div>
                                        <div class="main-content">
                                            <h4><img src="assets/images/add-recipients2.png" alt="error" style="width: 40px;" /> ACCOUNT DISABLED </h4>
                                            <p id="popup_text">KINDLY CONTACT ADMIN</p>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            
                            
                            <div class="tab-content" id="popup_last" style="width: 100% !important; text-align: center !important; display: none">
                                <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="transfer-tab">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close d-md-none d-block" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                        </div>
                                        <div class="main-content text-center pt-120 pb-120">
                                            <img src="assets/images/error.png" width="180em" alt="icon">
                                            <h3>TAC CODE</h3>
                                            <p> TO CONTINUE, PLEASE PROVIDE YOUR TAC CODE!</p><br>
                                            <input type="text" />
                                            <div class="footer-area mt-40">
                                            <a href="pay-step-2.php?tac=none" class="tac active" >Next</a>
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
    <!-- Transfer Popup start -->

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
                                            <img src="assets/images/userr.png" alt="image" class="contact_src" width='150em'>
                                        </div>
                                        <div class="text-area">
                                            <h5 class="contact_name">User Name</h5>
                                            <p class="contact_email">user@example.com</p>
                                        </div>
                                    </div>
                                    <div class="tab-area d-flex align-items-center justify-content-between">
                                        <ul class="nav nav-tabs mb-30" role="tablist">
                                            <li>
                                                <button id="send_fund">
                                                    <img src="assets/images/icon/send-funds.png" alt="icon">
                                                    Proceed to Send $400                                                </button>
                                            </li>
                                           
                                            <li class="nav-item" role="presentation">
                                                <button id="limit-tab" data-bs-toggle="tab"
                                                    data-bs-target="#limit" type="button" role="tab" aria-controls="limit"
                                                    aria-selected="true" class="manage_beneficiary">
                                                    <img src="assets/images/icon/recipients.png" alt="icon">
                                                    Manage Beneficiary
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <input type="hidden" id="active_contact">
                                    <div class="tab-content mt-30">
                                        <div class="tab-pane fade show active" id="limit" role="tabpanel" aria-labelledby="limit-tab">
                                            <div class="bottom-area" style="margin-bottom: 2em">
                                                <p class="history">Hisory with <span class="contact_name">User</span> :</p>
                                                
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
                                    <li class="nav-item" role="presentation" style="display: none" id="tab-internal">
                                        <button class="nav-link active" id="individual-tab" data-bs-toggle="tab"
                                            data-bs-target="#individual" type="button" role="tab" aria-controls="individual"
                                            aria-selected="false">
                                            <span class="icon-area">
                                                <img src="assets/images/icon/individual-icon.png" alt="icon">
                                            </span>
                                            LearnVaults
                                        </button>
                                    </li>
                                    
                                    <li class="nav-item" role="presentation" style="display: none" id="tab-bank">
                                        <button class="nav-link" id="company-tab" data-bs-toggle="tab"
                                            data-bs-target="#company" type="button" role="tab" aria-controls="company"
                                            aria-selected="true">
                                            <span class="icon-area">
                                                <img src="assets/images/icon/company-icon.png" alt="icon">
                                            </span>
                                            ACH / SWIFT
                                        </button>
                                    </li>
                                    
                                    <li class="nav-item" role="presentation" style="display: none" id="tab-crypto">
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
                                    
                                    <div class="tab-pane fade" id="company" role="tabpanel" aria-labelledby="company-tab" style="display: none">
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
                                                        <label for="add_bank_routing_number">IBAN/Routing Number</label>
                                                        <input type="text" id="add_bank_routing_number" placeholder="Dana">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="single-input">
                                                        <label for="add_bank_swift_number">Swift</label>
                                                        <input type="number" id="add_bank_swift_number" placeholder="99087">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
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
                                                        <input type="password" id="add_bank_pass" placeholder="LearnVaults bank account pin">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12">
                                                    <div class="btn-border w-100">
                                                        <button class="cmn-btn w-100" id="add_bank_sbmt">Add Beneficiary..</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="crypto" role="tabpanel" aria-labelledby="crypto-tab" style="display: none">
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
                                                        <input type="password" id="add_crypto_pass" placeholder="account authentication">
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
                                    
                                    <div class="tab-pane fade" id="individual" role="tabpanel" aria-labelledby="individual-tab" style="display: none">
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
                                                        <input type="text" id="add_internal_fname" placeholder="First Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-input">
                                                        <label for="lname">Last Name</label>
                                                        <input type="text" id="add_internal_lname" placeholder="Last Name">
                                                       
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <label for="add_internal_pass">Account Pin</label>
                                                        <input type="password" id="add_internal_pass" placeholder="account authentication">
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




        <!-- Add Recipients Popup start -->
    <div class="add-recipients">
        <div class="container-fruid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="modal fade" id="recipientsMod2" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header justify-content-between">
                                    <h6>Add Beneficiary</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                </div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item" role="presentation" style="display: none" id="tab-internal2">
                                        <button class="nav-link active" id="individual-tab2" data-bs-toggle="tab"
                                            data-bs-target="#individual2" type="button" role="tab" aria-controls="individual2"
                                            aria-selected="false">
                                            <span class="icon-area">
                                                <img src="assets/images/icon/individual-icon.png" alt="icon">
                                            </span>
                                            LearnVaults
                                        </button>
                                    </li>
                                    
                                    <li class="nav-item" role="presentation" style="display: none" id="tab-bank2">
                                        <button class="nav-link" id="company-tab2" data-bs-toggle="tab"
                                            data-bs-target="#company2" type="button" role="tab" aria-controls="company2"
                                            aria-selected="true">
                                            <span class="icon-area">
                                                <img src="assets/images/icon/company-icon.png" alt="icon">
                                            </span>
                                            ACH / SWIFT
                                        </button>
                                    </li>
                                    
                                    <li class="nav-item" role="presentation" style="display: none" id="tab-crypto2">
                                        <button class="nav-link" id="crypto-tab2" data-bs-toggle="tab"
                                            data-bs-target="#crypto2" type="button" role="tab" aria-controls="crypto2"
                                            aria-selected="true">
                                            <span class="icon-area">
                                                <img src="assets/images/icon/company-icon.png" alt="icon">
                                            </span>
                                            Crypto Account
                                        </button>
                                    </li>
                                </ul>
                                
                                
                                <div class="tab-content">
                                    
                                    <div class="tab-pane fade" id="company2" role="tabpanel" aria-labelledby="company-tab2" style="display: none">
                                        <div class="image-area mt-30 text-center">
                                            <img src="assets/images/icon/add-recipients.png" alt="icon">
                                        </div>
                                        <form action="#">
                                            <div class="row justify-content-center">
                                                <div class="col-md-12">
                                                    <div class="single-input">

                                                        <label for="add_bank_name">Beneficiary ID</label>
                                                        <input type="text" id="add_bank_name2" placeholder="e.g my account1">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12">
                                                    <div class="single-input">
                                                        <label>Account Type</label>
                                                        <select id="add_bank_account_type2">
                                                            <option value="checking">Checking</option>
                                                            <option value="savings">Savings</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <label for="add_bank_namee">Bank Name</label>
                                                        <input type="text" id="add_bank_namee" placeholder="">
                                                    </div>
                                                </div>

                                               
                                                <div class="col-md-6">
                                                    <div class="single-input">
                                                        <label for="add_bank_routing_number2">IBAN/Routing Number</label>
                                                        <input type="text" id="add_bank_routing_number2" placeholder="Dana">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="single-input">
                                                        <label for="add_bank_swift_number2">Sort</label>
                                                        <input type="number" id="add_bank_swift_number2" placeholder="99087">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <label for="add_bank_account_number2">Account Number</label>
                                                        <input type="text" id="add_bank_account_number2" placeholder="Dana">
                                                    </div>
                                                </div>
                                                
                                                 <div class="col-md-12">
                                                    <div class="single-input">
                                                        <label for="add_bank_account_name2">Account Name</label>
                                                        <input type="text" id="add_bank_account_name2" placeholder="xtechlab">
                                                    </div>
                                                </div>
                                               
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <label for="add_bank_pass2">Account Pin</label>
                                                        <input type="password" id="add_bank_pass2" placeholder="LearnVaults account pin">
                                                    </div>
                                                </div>

                                                <div class="col-md-12" style="display: none;">
                                                    <div class="single-input">
                                                    <label for=""> Confirm code </label>
                                                    <?php $randomid = mt_rand(1000, 9999) ?>
                                                    <input type="text" class="" id="confirm_code2" value="<?php echo $randomid;  ?>" >
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12">
                                                    <div class="btn-border w-100">
                                                        <button class="cmn-btn w-100" id="add_bank_sbmt2">Send</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="crypto2" role="tabpanel" aria-labelledby="crypto-tab2" style="display: none">
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
                                                        <input type="password" id="add_crypto_pass" placeholder="account authentication">
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
                                    
                                    <div class="tab-pane fade" id="individual2" role="tabpanel" aria-labelledby="individual-tab2" style="display: none">
                                        <div class="image-area mt-30 text-center">
                                            <img src="assets/images/user-profile.png" alt="icon">
                                        </div>
                                        <form action="#">
                                            <div class="row justify-content-center">
                                                
                                            
                                            <div class="col-md-12">
                                                    <div class="single-input">
                                                    <label for="" class="form-label sm:w-40">User's Account Number </label>
                                                     <input type="text" name="pay_no" id="pay_no1" placeholder="11024454" >

                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="single-input">
                                                        <label for="fname">First Name</label>
                                                        <input readonly type="text" id="add_internal_fname1"  placeholder="AUTO FILL">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-input">
                                                        <label for="lname">Last Name</label><span id="nameview"></span>
                                                        <input readonly type="text" id="add_internal_lname1" placeholder="AUTO FILL">
                                                    </div>
                                                </div>

                                                
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <label for="add_internal_pass">Account Pin</label>
                                                        <input type="password" id="add_internal_pass1" placeholder="account authentication">
                                                    </div>
                                                </div>

                                                <div class="col-md-12" style="display: none;">
                                                    <div class="single-input">
                                                    <label for=""> Confirm code </label>
                                                    <?php $randomid = mt_rand(1000, 9999) ?>
                                                    <input type="text" class="" id="confirm_code1" value="<?php echo $randomid;  ?>" >
                                                    </div>
                                                </div>

                                                
                                                <div class="col-12">
                                                    <div class="btn-border w-100">
                                                        <button type="button" disabled id="add_internal_sbmt2" class="cmn-btn w-100">Send</button>
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





    <div id="simpleModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Customer Details Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


    
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
    
    <script type="text/javascript">
    window.onload = function () {
        OpenBootstrapPopup();
    };
  

    const searchParams = new URLSearchParams(window.location.search);
    const searchType = searchParams.get('type');
    const searchTac = searchParams.get('tac');

    if(searchTac ==='none'){

        function OpenBootstrapPopup() 
        {
        $("#transferMod").modal('show');
        $('#popup_no').css('display', 'block');
        $("#popup_no").addClass("show active")
        }

    }

    modeType = 'LearnVaults';

    if(searchType ==='internal'){

        function OpenBootstrapPopup() 
        {
        $("#recipientsMod2").modal('show');
        $('#individual2').css('display', 'block');
        $("#individual2").addClass("show active")
         $("#tab-internal2").css('display', 'block');
        }

    }

    else if(searchType ==='bank'){

        function OpenBootstrapPopup() 
        {
        $("#recipientsMod2").modal('show');
        $('#company2').css('display', 'block');
        $("#company2").addClass("show active")
         $("#tab-bank2").css('display', 'block');
        }
    }
    else{
        
    }

</script>
    
        
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
        

        payamount = searchParams.get('amount');

     var site_domain= "LearnVault Educations.online";
     var type= searchType;
     var amount= "400"
     
     $("#select_type").val(type).change();
     $("#select_type").attr('disabled', true);
     
     if(type== "internal"){
         $("#individual").css('display', 'block');
         $("#individual").addClass("show active");
         $("#tab-internal").css('display', 'block');
     }else if(type== "bank"){
         $("#company").css('display', 'block');
         $("#company").addClass("show active")
         $("#tab-bank").css('display', 'block');
     }else if(type== "crypto"){
         $("#crypto").css('display', 'block');
         $("#crypto").addClass("show active")
         $("#tab-crypto").css('display', 'block');
     }
    
    
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
    
    
    $(".manage_beneficiary").click(function(){
        window.location.href="https://"+site_domain+"/account/beneficiary"
    })
    
    $("#send_fund").click(function(){
        var contact_id= $("#active_contact").val();
        loadOn();
        setTimeout(function(){
            window.location.href="https://"+site_domain+"/account/pay-step-3?contact="+contact_id+"&amount="+amount
        }, 2000)
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
                if(data.err== 0){
                    $("#add_crypto_name").val('');
                    $("#add_crypto_coin").val('');
                    $("#add_crypto_addr").val('');
                    $("#add_crypto_pass").val('');
                    notify('success', data.msg)
                    setTimeout(function(){
                        window.location.reload();
                    }, 2000)
                }else{
                    loadOff();
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


    $("#add_bank_sbmt2").click(function(){
        event.preventDefault();

        var name2= $("#add_bank_name2").val();
        var pass2= $("#add_bank_pass2").val();
        var add_bank_namee = $("#add_bank_namee").val();
        var account_number2= $("#add_bank_account_number2").val();
        var account_number2= $("#add_bank_swift_number2").val();
        var account_name2= $("#add_bank_account_name2").val();
        var routing_number2= $("#add_bank_routing_number2").val();
        var account_type2= $("#add_bank_account_type2").val();
        var swift = $("#add_bank_swift_number2").val();
        var confirm_code2 = $("#confirm_code2").val();
        var transferpin = $("#transferpin").val();
        if(name2== "" || account_number2== "" || account_name2== "" || account_type2=="" || routing_number2== "" || pass2==""){
            notify('warning', 'Please fill-in all fields')
        }
        else if(transferpin !== pass2 ){
            
             notify('warning', 'Incorrect Account Pin');
        }
        else{
            loadOn();
            $.post('result2.php', {
                add_beneficiary: "set",
                type: "bank",
                name: name2,
                account_number: account_number2,
                payamount: payamount,
                add_bank_namee: add_bank_namee,
                account_name: account_name2,
                account_type: account_type2,
                routing_number: routing_number2,
                pass: pass2,
                swift: swift,
                confirm_code: confirm_code2,
                transferpin : transferpin
            }, function(data){
                $('#stage').html(data);
                loadOff();  
            })
        }
    })


    $("#pay_no1").change(function(){
        pay_no1 =  $('#pay_no1').val();
        loadOn();

        $.post(
                  "fetchname.php",
                  { pay_no: pay_no1
                },
                  function(data) {
                    var json = $.parseJSON(data);
                    loadOff();
                     $('#add_internal_fname1').val(json.first);
                     $('#add_internal_lname1').val(json.last);
                     
                     if($('#add_internal_lname1').val() == "" ){

                        $("#add_internal_sbmt2").prop('disabled', true);

                        }
                        else{
                            $("#add_internal_sbmt2").prop('disabled', false);
                        }

                  }
               ); 
    })


    $("#add_internal_sbmt2").click(function(){

       event.preventDefault();

      var add_internal_fname1 = $('#add_internal_fname1').val();
      var add_internal_lname1 = $('#add_internal_lname1').val();
      var add_internal_pass1 = $('#add_internal_pass1').val();
      var confirm_code1 = $('#confirm_code1').val();
      var transferpin2 = $("#transferpin").val();

    if(transferpin2 !== add_internal_pass1 ){
            
             notify('warning', 'Incorrect Account Pin');
        }
    else{
        
        loadOn();
      
        $.post(
                  "result.php",
                  { pay_no: pay_no1,
                    add_internal_fname: add_internal_fname1,
                    add_internal_lname: add_internal_lname1,
                    add_internal_pass: add_internal_pass1,
                    payamount: payamount,
                    modeType: modeType,
                    confirm_code: confirm_code1
                },
                  function(data) {
                    loadOff();
                     $('#stage').html(data);
                  }
               ); 
        
        
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
                     
                     if($('#add_internal_lname1').val() == "" ){

                        $("#add_internal_sbmt2").prop('disabled', true);

                        }
                        else{
                            $("#add_internal_sbmt2").prop('disabled', false);
                        }

                  }
               ); 

    })


})
</script>
</body>


</html>