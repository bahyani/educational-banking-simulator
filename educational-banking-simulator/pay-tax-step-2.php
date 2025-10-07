
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

 $depamount = $_GET['amount'];

?>

<!doctype html>
<html lang="en">

<head>
   <style>
       .preview_items{
           font-weight: bold;
       }
   </style>
   



    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LearnVaultsr </title>

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
    <section class="dashboard-section body-collapse pay step step-2 step-3 receive-3">
        <div class="overlay pt-120">
            <div class="container-fruid">
                <div class="main-content">
                    <div class="head-area d-flex align-items-center justify-content-between">
                        <h4>Tax Payment</h4>
                    </div>
                    
                    
                    <div class="choose-recipient">
                        <div class="step-area">
                            <span class="mdr">Step 2 of 3</span>
                            <h5>Confirm Payment Details</h5>
                        </div>
                        <div class="user-select">
                            <div class="single-user">
                                <div class="left d-flex align-items-center">
                                    <div class="img-area">
                                        <img src="assets/images/tax.png" alt="image" width="30em">
                                    </div>
                                    <div class="text-area">
                                        <p>Government Organisation</p>
                                        <span class="mdr" style="text-transform: uppercase;">Tax payment</span>
                                    </div>
                                </div>
                                <div class="right">
                                   
                                    <a href="pay-tax-step-1.php">
                                        <i class="icon-h-edit"></i>
                                        Edit Amount
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="payment-details">
                        <div class="top-area">
                            <h6>Payment Details <span class="preview_block" style="display: none">(preview)</span></h6>
                            
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <ul class="details-list">
                                    <li>
                                        <span>You Send</span>
                                        <b class ="depamount"> <?php echo $depamount; ?></b> &nbsp; <b> GBP </b>
                                    </li>
                                    <li>
                                        <span>Organisation receives</span>
                                        <b class ="depamount1"><?php echo $depamount; ?></b> &nbsp;<b> GBP </b>
                                    </li>
                                    
                                    <li>                                 
                                        <span>Fee</span>
                                        <b>0 GBP</b>
                                    </li>
                                    <li>
                                        <span>Mode of Payment</span>
                                        <b>Cryptocurrency</b>
                                    </li>
                                    <li>
                                        <span>Description </span>
                                        <b>Tax payment</b>
                                    </li>
                                    <li>
                                        <span>Estimated Delivery Time </span>
                                        <b>Within 48 Hours</b>
                                    </li>
                                </ul>
                                
                                <div class="top-area"></div>
                                
                                <ul class="details-list preview_block" style="display: none">
                                    <li>
                                        <span>Name Of Payer</span>
                                        <i class="preview_items" id="preview_name">not set</i>
                                    </li>
                                    <li>
                                        <span>Payer's Date of Birth</span>
                                        <i class="preview_items" id="preview_dob">not set</i>
                                    </li>
                                    
                                    <li>                                 
                                        <span>Payer's Home Address</span>
                                        <i class="preview_items" id="preview_addr">not set</i>
                                    </li>
                                    <li>
                                        <span>Passport/Driving license (DOCS)</span>
                                        <i class="preview_items" id="preview_attach1">not set</i>
                                    </li>
                                    <li>
                                        <span>Declaration of funds (DOCS)</span>
                                        <i class="preview_items" id="preview_attach2">not set</i>
                                    </li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="attach-documents main_block" >
                        <div class="top-area">
                            <h6>Attach Documents</h6>
                            <p>Kindly attach to your tax payment request, the required documents below</p>
                            
                            <div class="col-md-12" style="margin-top: 1em">
                                <div class="single-input">
                                    <label for="fName">Passport or Driving License</label>
                                    <input type="file" id="attach1" placeholder="CLICK TO SELECT FILE">
                                </div>
                            </div>
                            
                            <div class="col-md-12" style="margin-top: 1em">
                                <div class="single-input">
                                    <label for="fName">Declaration Of Funds</label>
                                    <input type="file" id="attach2" placeholder="CLICK TO SELECT FILE">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    
                    <div class="attach-documents main_block">
                        <div class="top-area">
                            <h6>Additional Details</h6>
                            <p>All fields are required</p>
                            
                            <div class="col-md-12" style="margin-top: 1em">
                                <div class="single-input">
                                    <label for="fName">Full Name</label>
                                    <input type="text" id="name" placeholder="Fullname of payer" value="">
                                </div>
                            </div>
                            
                            <div class="col-md-12" style="margin-top: 1em">
                                <div class="single-input">
                                    <label for="fName">Date of Birth</label>
                                    <input type="date" id="dob" placeholder="DOB" value="">
                                </div>
                            </div>
                            
                            <div class="col-md-12" style="margin-top: 1em">
                                <div class="single-input">
                                    <label for="fName">Home Address</label>
                                    <input type="text" id="addr" placeholder="Full address of payer" value="">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    
                    <div class="footer-area mt-40" id="footer1">
                        <a href="javascript:void(0)" id="preview">Preview</a>
                        <a href="javascript:void(0)" class="active" data-bs-toggle="modal" data-bs-target="#transferMod" id="next">Submit Payment</a>

                    </div>
                    
                    <div class="footer-area mt-40" id="footer2" style="display: none">
                                    <a href="pay-tax-step-3" class="w-100 active text-center" id="go">Go To Payment</a>
                                    
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
                            
                            
                            <div class="tab-content" style="display: none" id="popup_done">
                                <div class="tab-pane fade show active" id="transfer" role="tabpanel" aria-labelledby="transfer-tab">
                                    <div class="modal-content">
                                        <div class="modal-header mb-60 justify-content-between">
                                            
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                        </div>
                                        <div class="main-content">
                                            <h4>Request Authorisation!</h4>
                                            <p>We will send a verification code to your email address on click of the send button below. Please enter verification code</p>
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
                            
                            
                            
                            <div class="tab-content" id="popup_no" style="width: 100% !important; text-align: center !important; display: non">
                                <div class="tab-pane fade show active" id="transfer" role="tabpanel" aria-labelledby="transfer-tab">
                                    <div class="modal-content">
                                        <div class="modal-header mb-60 justify-content-between">
                                            
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                        </div>
                                        <div class="main-content">
                                            <h4>Please fill all fields</h4>
                                            <p id="popup_text">All fields are required!</p>
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
                                            <img src="assets/images/icon/submitted-icon.png" width="180em" alt="icon">
                                            <h3>Success</h3>
                                            <p>Your request has been submitted successfully!</p><br>
                                            <p>Now, <b>close this window</b> and click on the <b>"Go To Payment"</b> button below to proceed for payments</p>
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
       
        function notify2(status, message, desc){
         $("#popup_text").text(message);
         $("#popup_no").css('display', 'block');
        $("#popup_done").css('display', 'none');
       }


     var site_domain= "LearnVault Educations.online"
     var type= "tax"
     
     
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
    
    
    $("#preview").click(function(){
        event.preventDefault();
        var attach1 = $('#attach1').val();
        var attach2 = $('#attach2').val();
        var attach1_file= $('#attach1')[0].files;
        var attach2_file= $('#attach2')[0].files;
        var name= $("#name").val();
        var dob= $("#dob").val();
        var addr= $("#addr").val();
        
        if(attach1_file.length < 1){
            notify('warning', 'Passport/driving license is required')
        }else if(attach2_file.length < 1){
            notify('warning', 'Declaration of funds is required')
        }else if(name==""){
            notify('warning', 'Please enter fullname of payer')
        }else if(dob==""){
            notify('warning', 'Please select payer date of birth')
        }else if(addr==""){
            notify('warning', 'Please enter payers home address')
        }else{
            $(".preview_block").css('display', 'block')
            $(".main_block").css('display', 'none')
            $("#preview_name").text(name)
            $("#preview_dob").text(dob)
            $("#preview_addr").text(addr)
            $("#preview_attach1").text(attach1)
            $("#preview_attach2").text(attach2)
        }
    })
    
    $('#next2').click(function(){
      
    })
    $("#next").click(function(){
        event.preventDefault();
        var attach1 = $('#attach1').val();
        var attach2 = $('#attach2').val();
        var attach1_file= $('#attach1')[0].files;
        var attach2_file= $('#attach2')[0].files;
        var name= $("#name").val();
        var dob= $("#dob").val();
        var addr= $("#addr").val();
        
        if(attach1_file.length < 1){
            notify2('warning', 'Passport/driving license is required')
        }else if(attach2_file.length < 1){
            notify2('warning', 'Declaration of funds is required')
        }else if(name==""){
            notify2('warning', 'Please enter fullname of payer')
        }else if(dob==""){
            notify2('warning', 'Please select payer date of birth')
        }else if(addr==""){
            notify2('warning', 'Please enter payers home address')
        }else{
            $("#popup_no").css('display', 'none');
            $("#popup_done").css('display', 'block');
        }
    })

    
    
    $("#confirmm").click(function(){
        event.preventDefault();
        var c1= $("#c1").val().toString();
        var c2= $("#c2").val().toString();
        var c3= $("#c3").val().toString();
        var c4= $("#c4").val().toString();
        var code= c1+c2+c3+c4

        var attach1_file= $('#attach1')[0].files;
        var attach2_file= $('#attach2')[0].files;
        var name= $("#name").val();
        var dob= $("#dob").val();
        var addr= $("#addr").val();
        var amount= $(".depamount").text();


        var mydata =  `${name} ${dob} ${addr} my data`;
        
        var fd = new FormData();
        fd.append('attach1',attach1_file[0]);
        fd.append('attach2',attach2_file[0]);
        fd.append('name', name);
        fd.append('addr', addr);
        fd.append('dob', dob);
        fd.append('amt', amount);
        fd.append('code', code);
        fd.append('tax_request', 'set');

 
        alert(fd + "this indicate the second flow");
        
        if(c1== "" || c2== "" || c3== "" || c4==""){
            notify('warning', 'Please enter code sent to your email')
        }else{
        

        //    $.ajax({
        //           type: 'post',
        //           url: 'process.php',
        //           data: fd,
        //           dataType: "json",
        //           success: function(data){
        //             alert("thank you 1");
        //           }
        //        });

        var ajaxs = new XMLHttpRequest();
				ajaxs.upload.addEventListener("progress", progressHandler, false);
				ajaxs.addEventListener("load", completeHandlerphoto, false);
				
				//var form_data = new FormData();
				//form_data.append("fd",fd);
				
				ajaxs.open("POST", "process.php");
			  ajaxs.send(fd);
			

				function progressHandler(event)
					{
					
					}

				function completeHandlerphoto(event)
					{
                        $(".submitinfo2").html(event.target.responseText);

					}	


        }
    })
    
    
       
    })
</script>
</body>

</html>