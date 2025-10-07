
<!doctype html>
<html lang="en">

<head>
   



    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zurich - Money Transfer and Online Payments System</title>

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
                                                                    <p class="mdr time-area">12 mins ago</p>
                                                                </div>
                                                            </a></li>
                                                    
                                                         <li>
                                                            <a href="javascript:void(0)" class="d-flex">
                                                                <div class="img-area">
                                                                    <img width="30em" src="assets/images/master-card.png" class="max-un" alt="image">
                                                                </div>
                                                                <div class="text-area">
                                                                    <p class="mdr">Your new payment method has been added successfully</p>
                                                                    <p class="mdr time-area">10 mins ago</p>
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
    <section class="dashboard-section body-collapse pay step step-2 step-3">
        <div class="overlay pt-120">
            <div class="container-fruid">
                <div class="main-content">
                    <div class="head-area d-flex align-items-center justify-content-between">
                        <h4>Make a Transfer</h4>
                    </div>
                    <div class="choose-recipient">
                        <div class="step-area">
                            <span class="mdr">Step 3 of 3</span>
                            <h5>Confirm Your Transfer</h5>
                        </div>
                        <div class="user-select">
                            <div class="single-user">
                                <div class="left d-flex align-items-center">
                                    <div class="img-area">
                                        <img src="assets/images/icon/bank.png" alt="image" width="30em">
                                    </div>
                                    <div class="text-area">
                                        <p>First</p>
                                        <span class="mdr" style="text-transform: uppercase;">bank</span>
                                    </div>
                                </div>
                                <div class="right">
                                    <a href="pay-step-2?type=bank&amount=500">
                                        <i class="icon-h-edit"></i>
                                        Edit Recipient
                                    </a>
                                    <a href="pay-bank-step-1">
                                        <i class="icon-h-edit"></i>
                                        Edit Amount
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                                        
                    <div class="payment-details">
                        <div class="top-area">
                            <h6>Payment Details</h6>
                            
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <ul class="details-list">
                                    <li>
                                        <span>You Send</span>
                                        <b>500 USD</b>
                                    </li>
                                    <li>
                                        <span>Recipient gets</span>
                                        <b>500 USD</b>
                                    </li>
                                                                        <li>
                                        <span>Account number</span>
                                        <b>02982938828293</b>
                                    </li>
                                                                        <li>                                                                                                               
                                        <span>Fee</span>
                                        <b>0 USD</b>
                                    </li>
                                    <li>
                                        <span>Mode of Payment</span>
                                        <b>bank</b>
                                    </li>
                                    <li>
                                        <span>Estimate Delivery Time </span>
                                        <b>Within 48 Hours </b>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <form action="#" style="margin-top: 1em">
                        
                        <div class="footer-area mt-40">
                            <a href="pay-step-2?amount=500&type=bank">Previous Step</a>
                            <a href="javascript:void(0)" class="transferMod active" data-bs-toggle="modal" data-bs-target="#transferMod">Make Payment</a>
                        </div>
                    </form>
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
                                            <h4>Confirm Transfer!</h4>
                                            <p>We will send a verification code to your email address on click of the send button below. Please enter verification code below</p>
                                            <form action="javascript:void(0)">
                                                <div class="userInput">
                                                    <input type="number" id="c1" data-id="1" class="cc" autocomplete="off">
                                                    <input type="number" id="c2" data-id="2" class="cc" autocomplete="off">
                                                    <input type="number" id="c3" data-id="3" class="cc" autocomplete="off">
                                                    <input type="number" id="c4" data-id="4" class="cc" autocomplete="off">
                                                </div>
                                                <a id="resend" href="#0" style="font-weight: bold">Send code now</a>
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


     var site_domain= "zurichalpha.org"
     var type= "bank"
     
     
     $("#resend").click(function(){
         loadOn();
         $.post('ajax', {
             resend_otp: "set"
         }, function(data, status){
             loadOff();
             if(data.err== 0){
                 notify('success', data.msg);
                 $("#resend").text("Didn't receive a code?")
                 $("#resend").css('display', 'none')
                 setTimeout(function(){
                     $("#resend").css('display', 'block')
                 }, 60000)
             }else{
                 notify('error', data.msg)
             }
         }, "JSON")
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
        
        var contact= "34";
        var amount= "500";
        var type= "bank";
        if(c1== "" || c2== "" || c3== "" || c4==""){
            notify('warning', 'Please enter code sent to your email')
        }else{
            loadOn();
            $.post('ajax', {
                pay_fund: "set",
                amount: amount,
                contact: contact,
                code: code
            }, function(data, status){
                loadOff();
                if(data.err== 0){
                    notify('success', data.msg)
                    $("#c1").val('');$("#c2").val('');$("#c3").val('');$("#c4").val('');
                    if(type== "bank"){
                        window.location.href="https://"+site_domain+"/account/payment-submitted2?id="+data.id
                    }else{
                        window.location.href="https://"+site_domain+"/account/payment-submitted?id="+data.id
                    }
                    
                }else{
                    notify('error', data.msg)
                }
            }, "JSON")
        }
    })

       
    })
</script>
</body>

</html>