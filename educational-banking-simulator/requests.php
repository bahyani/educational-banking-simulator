
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
                                        <span class="mdr">1</span>
                                    </div>
                                    <ul>
                                        
                                        
                                                         <li>
                                                            <a href="javascript:void(0)" class="d-flex">
                                                                <div class="img-area">
                                                                    <img width="30em" src="assets/images/user-profile.png" class="max-un" alt="image">
                                                                </div>
                                                                <div class="text-area">
                                                                    <p class="mdr">Account creation was successful. Welcome</p>
                                                                    <p class="mdr time-area">2 hrs ago</p>
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
                                                <h5>hughes kassie</h5>
                                            </a>
                                            <p class="wallet-id">Account No: 110729418</p>
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
                    <div class="sidebar-wrapper">
                        <div class="close-btn">
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                        <div class="sidebar-logo">
                            <a href="dashboard.php"><img src="assets/" alt="logo" width="200em"></a>
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
                            <li class="active">
                                <a href="requests.php">
                                    <img src="assets/images/icon/receive.png" alt="Request"> <span>View Requests</span>
                                </a>
                            </li>
                            
                            <li class="">
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
    <!-- header-section end -->


    <!-- Dashboard Section start -->
    <section class="dashboard-section body-collapse pay step">
        <div class="overlay pt-120">
            <div class="container-fruid">
                <div class="main-content">
                    <div class="head-area d-flex align-items-center justify-content-between">
                        <h4>All Payment Requests</h4>
                    </div>
                    <div class="choose-recipient">
                       
                        <p class="recipients-item">0 Requests </p>
                    </div>
                    
                    <div class="user-select">
                        <input type="hidden" id="active_contact">
                        
                        
                        <div class="single-user">
                                                        You have no requests yet...
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
        

     var site_domain= "zurichalpha.org";
    
   

    $(".active_contact").click(function(){
        event.preventDefault();
        var contact_id= $(this).data('id');
        $("#active_contact").val(contact_id);
    })
    
    $("#next").click(function(){
        var contact= $("#active_contact").val();
        if(contact== ""){
            notify('warning', 'Please select one contact')
        }else{
            loadOn();
            setTimeout(function(){
                window.location.href="https://"+site_domain+"/account/request-step-2?to="+contact
            }, 1000)
        }
    })
    
    
    $(".open").click(function(){
        event.preventDefault();
        var id= $(this).data('id');
        loadOn();
            setTimeout(function(){
                window.location.href="https://"+site_domain+"/account/request-resolve?id="+id
            }, 1000)
    })
    
    $(".show").click(function(){
        event.preventDefault();
        var data= $(this).data('data');
        notify('info', data)
    })
    
    
    
       
    })
</script>

</body>

</html>