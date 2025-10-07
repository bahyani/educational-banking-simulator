

<?php
session_start();


include '../connect.php';

$account=$_SESSION['username'];
$query=mysqli_query($link, "select * from account where account = '$account'" );
$row=mysqli_fetch_array($query);

$first=$row['first'];
$last=$row['last'];
$email=$row['email'];
$address=$row['address'];
$last_login=$row['last_login'];
$deposit=$row['deposit'];
$country = $row['country'];
$tel = $row['tel'];
$picture=$row['picture'];
$jdate=$row['date'];

$bann = $row['bann'];

if($picture == ""){
	$picture = "../img/t1.jpg";
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
                                            <a href="../account"><i class="fas fa-cog"></i>Settings</a>
                                        </li>
                                        <li>
                                            <a href="../logout.php"><i class="fas fa-sign-out"></i>Logout</a>
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
                            <a href="../dashboard.php"><img src="assets/images/logo2.png" alt="logo" width="70em"></a>
                        </div>
                        <ul>
                            <li class="">
                                <a href="../dashboard.php">
                                    <img src="assets/images/icon/dashboard.png" alt="Dashboard"> <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="../transactions.php">
                                    <img src="assets/images/icon/transactions.png" alt="Transactions"> <span>Statement</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="../withdraw.php">
                                    <img src="assets/images/icon/pay.png" alt="Pay"> <span>Transfers / Pay Tax</span>
                                </a>
                            </li>
                           
                            <li class="">
                                <a href="../request-step-1.php">
                                    <img src="assets/images/icon/receive.png" alt="Request"> <span>Request Payment</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="../requests.php">
                                    <img src="assets/images/icon/receive.png" alt="Request"> <span>View Requests</span>
                                </a>
                            </li>
                            
                            <li class="">
                                <a href="../beneficiary.php">
                                    <img src="assets/images/icon/recipients.png" alt="Recipients"> <span>Beneficiaries</span>
                                </a>
                            </li>
                            
                            <li class="">
                                <a href="../fund.php">
                                    <img src="assets/images/icon/deposit.png" alt="Deposit"> <span>Deposit Money</span>
                                </a>
                            </li>
                           
                        </ul>
                        <ul class="bottom-item">
                            <li class="active">
                                <a href="../account">
                                    <img src="assets/images/icon/account.png" alt="Account"> <span>Account</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="assets/images/icon/support.png" alt="Support"> <span>Support</span>
                                </a>
                            </li>
                            <li>
                                <a href="../logout">
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
    <!-- header-section end -->

    <!-- Dashboard Section start -->
    <section class="dashboard-section body-collapse account">
        <div class="overlay pt-120">
            <div class="container-fruid">
                <div class="main-content">
                    <div class="row">
                        <div class="col-xxl-3 col-xl-4 col-md-6">
                            <div class="owner-details">
                                <div class="profile-area">
                                    <div class="profile-img">
                                    <?php echo' <img width="30em" src="'.$picture.'"  alt="image" width="120em">'; ?>
                                    </div>
                                    <div class="name-area">
                                        <h6><?php echo $first." ". $last; ?></h6>
                                        <p class="active-status" style="font-weight: bold">Active</p>
                                    </div>
                                </div>
                                <div class="owner-info">
                                    <ul>
                                        <li>
                                            <p>Account No:</p>
                                            <span class="mdr"><?php echo $account; ?></span>
                                        </li>
                                        <li>
                                            <p>Joined:</p>
                                            <span class="mdr"><?php echo $jdate; ?></span>
                                        </li>
                                                                                <li>
                                            <p>Confirm Status:</p>
                                            <span class="mdr">100%</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="owner-action">
                                    <a href="../logout.php">
                                        <img src="assets/images/icon/logout.png" alt="image">
                                        Logout
                                    </a>
                                    <a href="javascript:void(0)" id="delete_acct" class="delete">
                                        <img src="assets/images/icon/delete-2.png" alt="image">
                                        Delete Account
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-9 col-xl-8">
                            <div class="tab-main">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="account-tab" data-bs-toggle="tab"
                                            data-bs-target="#account" type="button" role="tab" aria-controls="account"
                                            aria-selected="true">Account</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="security-tab" data-bs-toggle="tab"
                                            data-bs-target="#security" type="button" role="tab" aria-controls="security"
                                            aria-selected="false">Security</button>
                                    </li>
                                    
                                </ul>
                                <div class="tab-content mt-40">
                                    <div class="tab-pane fade show active" id="account" role="tabpanel"
                                        aria-labelledby="account-tab">
                                        <div class="upload-avatar">
                                            <div class="avatar-left d-flex align-items-center">
                                                <div class="profile-img">
                                                <?php echo' <img width="30em" src="'.$picture.'" class="avatar" alt="image" width="80em">'; ?>
                                                </div>
                                                <div class="instraction">
                                                    <h6>Profile Image</h6>
                                                    <p>Your beneficiaries will see this</p>
                                                </div>
                                            </div>
                                            <div class="avatar-right">
                                                <div class="file-upload">
                                                    <div class="right-area">
                                                        <label class="file">
                                                            <input type="file" id="avUpload">
                                                            <span class="file-custom"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="#">
                                            <div class="row justify-content-center">
                                                <div class="col-md-6">
                                                    <div class="single-input">
                                                        <label for="fName">First Name</label>
                                                        <input type="text" id="fname" placeholder="Alfred" value="<?php echo $first;?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-input">
                                                        <label for="lName">Last Name</label>
                                                        <input type="text" id="lname" placeholder="Davis" value="<?php echo $last;?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <label for="email">Email</label>
                                                        <div class="row input-status d-flex align-items-center">
                                                            <div class="col-6">
                                                                <input type="email" readonly value="<?php echo $email;?>">
                                                            </div>
                                                            <div class="col-6">
                                                                <span class="confirm">
                                                                    <img src="../assets/images/icon/confirm.png" alt="icon">
                                                                    Email has been confirmed
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <label for="phone">Phone</label>
                                                        <div class="row input-status d-flex align-items-center">
                                                            <div class="col-6">
                                                                <input type="tel" id="phone" value="<?php echo $tel; ?>" placeholder="(316) 555-0116">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="single-input file">
                                                        <label>ID Confirmation Documents</label>
                                                        <div class="row input-status d-flex align-items-center">
                                                            <div class="col-6">
                                                                <div class="file-upload">
                                                                    <div class="right-area">
                                                                        <label class="file">
                                                                            <input type="file" id="verification_fileUpload">
                                                                            <span class="file-custom" ></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <?php 

                                                                    if($bann == 0){

                                                                        echo'<span class="confirm">
                                                                        <img src="../assets/images/icon/confirm.png" alt="icon">
                                                                        User has been confirmed
                                                                        </span>';
                                                                    }
                                                                    else{
                                                                        echo'<span class="notconfirm">
                                                                        <img src="../assets/images/icon/not-confirm.png" alt="icon">
                                                                        User not confirmed
                                                                         </span>';
                                                                    }
                                                                
                                                                ?>
                                                            </div>
                                                                                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <label for="address">Address</label>
                                                        <input type="text" id="addr" placeholder="2972 Westheimer Rd. Santa Ana, Illinois 85486" value="<?php echo $address; ?>">
                                                        <input type="hidden" id="accounts" value="<?php echo $account; ?>">
                                                        <div id="stage" ></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="btn-border">
                                                        <button class="cmn-btn" id="sbmt_acct">Save Changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    
                                    
                                    
                                    <div class="tab-pane fade" id="security" role="tabpanel"
                                        aria-labelledby="security-tab">
                                       
                                        <div class="change-pass mb-40">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h5>Change Password</h5>
                                                    <p>You can always change your password for security reasons or reset your password in case you forgot it.</p>
                                                    <!--<a href="../forgot-password">Forgot password?</a>-->
                                                </div>
                                                <div class="col-sm-6">
                                                    <form action="#">
                                                        <div class="row justify-content-center">
                                                            <div class="col-md-12">
                                                                <div class="single-input">
                                                                    <label for="current-password">Current password</label>
                                                                    <input type="password" id="old_pass" placeholder="Current password">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="single-input">
                                                                    <label for="new-password">New password</label>
                                                                    <input type="password" id="pass" placeholder="New password">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="single-input">
                                                                    <label for="confirm-password">Confirm New password</label>
                                                                    <input type="password" id="pass2" placeholder="Confirm New password">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="btn-border w-100">
                                                                    <button class="cmn-btn w-100" id="sbmt_pass">Update password</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <div class="change-pass mb-40">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h5>Security Question</h5>
                                                    <p>You can set a security answer, required upon each login to this account.</p>
                                                    <p>Adding a new security answer automatically replaces the old one.</p>
                                                    <!--<a href="../forgot-password">Forgot password?</a>-->
                                                </div>
                                                <div class="col-sm-6">
                                                    <form action="#">
                                                        <div class="row justify-content-center">
                                                            <div class="col-md-12">
                                                                <div class="single-input">
                                                                    <label for="current-password">Security Question</label>
                                                                    <input type="text" id="sq" placeholder="New question" readonly value="WHAT IS MY SECRET CODE">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="single-input">
                                                                    <label for="new-password">Answer</label>
                                                                    <input type="text" id="sa" placeholder="New answer">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-12">
                                                                <div class="btn-border w-100">
                                                                    <button class="cmn-btn w-100" id="sbmt_sa" data-bs-toggle="modal" data-bs-target="#transferMod">Update security</button>
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
            </div>
        </div>
    </section>
    <!-- Dashboard Section end -->
    
    
    
    <!-- Transfer Popup start -->
    <div class="transfer-popup">
        <div class="container-fruid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="modal fade" id="transferMod" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <ul class="nav nav-tabs d-none" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="transfer-tab" data-bs-toggle="tab"
                                        data-bs-target="#transfer" type="button" role="tab" aria-controls="transfer"
                                        aria-selected="true">transfer</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="success-tab" data-bs-toggle="tab"
                                        data-bs-target="#success" type="button" role="tab" aria-controls="success"
                                        aria-selected="false">Confirm</button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="transfer" role="tabpanel" aria-labelledby="transfer-tab">
                                    <div class="modal-content">
                                        <div class="modal-header mb-60 justify-content-between">
                                            
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                        </div>
                                        <div class="main-content">
                                            <h4>Confirm Action!</h4>
                                            <p>We will send a verification code to your email address on click of the send button below. Please enter verification code below</p>
                                            <form action="javascript:void(0)">
                                                <div class="userInput">
                                                    <input type="number" id="c1" data-id="1" class="cc" autocomplete="off">
                                                    <input type="number" id="c2" data-id="2" class="cc" autocomplete="off">
                                                    <input type="number" id="c3" data-id="3" class="cc" autocomplete="off">
                                                    <input type="number" id="c4" data-id="4" class="cc" autocomplete="off">
                                                </div>
                                                <a id="resend" href="#0" style="font-weight: bold">Send code now</a>
                                                <?php
                                                $randd = rand(1000,9999)
                                                ?>
                                                <input type="text" id="randd" name="randd" value="<?php echo $randd; ?>"/>
                                                <button class="mt-60" id="confirmm">Confirm</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="tab-pane fade" id="success" role="tabpanel" aria-labelledby="success-tab">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close d-md-none d-block" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                        </div>
                                        <div class="main-content text-center pt-120 pb-120">
                                            <img src="assets/images/icon/success.png" alt="icon">
                                            <h3>Success</h3>
                                            <p>Transfer was completed.</p>
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
     
    $("#delete_acct").click(function(){
        event.preventDefault();
        loadOn();
        setTimeout(function(){
            loadOff();
            notify('warning', 'Please contact us to proceed with this request')
        }, 3000)
    })
    
    
    $('#verification_fileUpload').change(function() {
           event.preventDefault();
            var type= $("#verification_type").val();
            var fd = new FormData();
            var files = $('#verification_fileUpload')[0].files;
             if(files.length < 1 ){
                 toastr["error"]("Please select a file");
             }else{
                 fd.append('verify_file',files[0]);
                loadOn();
                
                setTimeout(() => {
                    notify('warning', 'Kindly send your ID Documents to Admin: admin@LearnVault Educations.online');
                    loadOff();
                }, 4000);
            }
        });
     
        
    $('#avUpload').change(function() {
          var file_name = $('#avUpload')[0].files[0].name;
           var files = $('#avUpload')[0].files;
           var fd = new FormData();
            if(files.length < 1 ){
                 toastr["error"]("Please select a file");
             }else{
                 fd.append('avatar',files[0]);
                loadOn();
             
                setTimeout(() => {
                    notify('warning', 'Contact Admin to proceed with your request');
                    loadOff();
                }, 4000);

            }
        });
        
        
    $("#resend").click(function(){
        var randd = $("#randd").val();
         loadOn();
         $.post('../ajax4.php', {
             resend_otp: "set",
             randd: randd
         }, function(data){
            $('#stage').html(data);       
            loadOff(); 
        })
     })    
    
        
    $("#sbmt_acct").click(function(){
        event.preventDefault();
        var fname= $("#fname").val();
        var lname= $("#lname").val();
        var addr= $("#addr").val();
        var phone= $("#phone").val();
        var accounts = $("#accounts").val();
        loadOn();
        
        $.post('../ajax3.php', {
            edit_acct: "set",
            fname: fname,
            lname: lname,
            addr: addr,
            phone: phone,
            account: accounts
        }, function(data){
            $('#stage').html(data);       
            loadOff(); 
        })
    }) 
    
    
    $("#sbmt_pass").click(function(){
        event.preventDefault();
        var old_pass= $("#old_pass").val();
        var pass= $("#pass").val();
        var pass2= $("#pass2").val();
        var accounts = $("#accounts").val();
        
        if(pass != pass2){
            notify('warning', 'Passwords do not match')
        }else{
            loadOn();
            $.post('../ajax4.php', {
                edit_acct: "set",
                old_pass: old_pass,
                pass: pass,
                pass2: pass2,
                type: 'pass',
                account: accounts
            }, function(data){
                $('#stage').html(data);       
                loadOff(); 
            })
        }
    }) 
    
    
    $("#sbmt_sa").click(function(){
        event.preventDefault();
    })
    
    
    $(".cc").keyup(function(){
        var this_c= $(this);
        var this_cd= this_c.data('id')
        var code= this_c.val();
        if(code == "" && this_cd > 1){
            this_c.blur();
            var prev_cd= this_cd -1;
            $("#c"+prev_cd).focus();
        }else if(code.length == 1 && this_cd <= 4){
            this_c.blur();
            var next_cd= this_cd +1;
            $("#c"+next_cd).focus();
        }
    })
    
    $("#confirmm").click(function(){
        event.preventDefault();
        var c1= $("#c1").val().toString();
        var c2= $("#c2").val().toString();
        var c3= $("#c3").val().toString();
        var c4= $("#c4").val().toString();
        var code= c1+c2+c3+c4
        
        var sa= $("#sa").val();
        var sq= $("#sq").val();
        
        if(c1== "" || c2== "" || c3== "" || c4==""){
            notify('warning', 'Please enter code sent to your email')
        }else if(sa== "" || sq== ""){
            notify('warning', 'Enter security answer')
        }else{
            loadOn();
            $.post('../ajax4.php', {
                edit_acct: "set",
                type: 'sa',
                code: code,
                sa: sa,
                sq: sq
            }, function(data){
                $('#stage').html(data);       
                loadOff(); 
            })
        }
    })
    
    
    })
</script>
</body>

</html>