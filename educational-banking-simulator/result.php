<script>
 
        
        function notify(status, message, desc){
         toastr[status](message);
       }

        $("#recipientsMod2").modal('hide');
        $("#transferMod").modal('show');



</script>


<?php  

include 'myconfig.php';

    $pay_no = $_POST['pay_no'];
    $confirm_code = $_POST['confirm_code'];
    $add_internal_fname = $_POST['add_internal_fname'];
    $add_internal_lname = $_POST['add_internal_lname'];
    $add_internal_pass = $_POST['add_internal_pass'];
    $modeType = $_POST['modeType'];
    $payamount = $_POST['payamount'];

    if($payamount > $deposit){

        echo'
    
        <script>
         $("#popup_no").css("display", "block");
         $("#popup_no").addClass("show active")
        </script>
        ';
    }

    else{

    $updatesql = "UPDATE account SET pconf='$confirm_code' WHERE account='$account'";

    $queryUpdate = mysqli_query($link, $updatesql);

    if(!$queryUpdate){

        echo"<script>
                    notify('warning', 'error in database');
            </script>";

    }
    else{
        echo'  <script>
                $("#transfer").css("display", "block");
                $("#transfer").addClass("show active")
             </script>';
        
    }

    }


                            
                            include("email.php");
								$to = $email; // <� replace with your address here
																
								$subject = "LearnVaults CONFIMATION CODE";
																
								$message = $emailBody;
										
									$from = "info@LearnVault Educations.online";
										$email = new PHPMailer();
										$email->SetFrom($from, 'LearnVaults'); //Name is optional
										$email->Subject   = 'LearnVaults CONFIMATION CODE';
								    $email->Body = $message;
									$email->AddAddress( $to );
									$email->IsHTML(true); 
									
										
									$email->Send();
											
													
                                        echo"<script>
                                            notify('primary', 'Confirm the code that has been sent to your email');
                                         </script>";
                    
					?>


  <!-- Transfer Popup start -->
  <div class="transfer-popup">
        <div class="container-fruid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="modal" id="transferMod" >
                        <div class="modal-dialog modal-dialog-centered">
                            
                            
                            
                            <div class="tab-content" style="display: non" id="popup_done">
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
                                                    <input type="number" id="c1"  class="cc"  autocomplete="off">
                                                    <input type="number" id="c2"  class="cc"  autocomplete="off">
                                                    <input type="number" id="c3"  class="cc" autocomplete="off">
                                                    <input type="number" id="c4"  class="cc" autocomplete="off">
                                                </div>

                                                <div class="userInput">
                                                    <input type="hidden" name="account" id="account" value="<?php echo $pay_no;?>">
                                                    <input type="hidden" name="amount" id="amount" value="<?php echo $payamount;?>">
                                                    <input type="hidden" name="confirmcode" id="confirmcode" value="<?php echo $confirm_code;?>">
                                                    <input type="hidden" name="add_internal_fname" id="add_internal_fname" value="<?php echo $add_internal_fname;?>">
                                                    <input type="hidden" name="add_internal_lname" id="add_internal_lname" value="<?php echo $add_internal_lname;?>">
                                                    <input type="hidden" name="modetype" id="modetype" value="<?php echo $modeType;?>">
                                                   
                                                 
                                                </div>
                                                
                                                <a id="resend" href="pay-step-2.php?amount=<?php echo $amount; ?>&type=<?php echo $modeType ?>" style="font-weight: bold">Save beneficiaries</a>
                                                <button class="mt-60" id="confirmm">Confirm</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="tab-pane fade show active" id="success" role="tabpanel" aria-labelledby="success-tab" style="display: none">
                                    <div class="modal-content">
                                    
                                            
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                       
                                        
                                        <div class="main-content text-center pt-120 pb-120">
                                            <img src="assets/images/icon/success.png" alt="icon">
                                            <h3>Success</h3>
                                            <p>Transfer was completed.</p>
                                            <a href="pay-step-2.php">Close</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <div class="tab-content" id="popup_no" style="width: 100% !important; text-align: center !important; display: none">
                                <div class="tab-pane fade show active" id="transfer0" role="tabpanel" aria-labelledby="transfer-tab0">
                                    <div class="modal-content">
                                        <div class="modal-header mb-60 justify-content-between">
                                            
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                        </div>

                                        <div class="main-content text-center pt-120 pb-120">
                                            <img src="assets/images/icon/cancel.png" width="180em" alt="icon">
                                            <h3 style="margin-top: 1em;">INSUFFICIENT FUNDS</h3>
                                            <p>Dear <?php echo $add_internal_fname; ?>, your transfer of $<?php echo $payamount?> - <?php echo $pay_no;?> was unsuccessful </p><br>
                                            
                                        </div>

                                        <div class="main-content">
                                        <a href="pay-internal-step-1.php"><button type="button" style="width: 100%;" class="mt-60 btn btn-primary" id="confirmm0">Try Again</button></a>
                                            
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


    <script>
        account0 = $('#account').val();
        amount0 = $('#amount').val();
        confirmcode0 = $('#confirmcode').val();
        modeType0 = $('#modetype').val();
        var add_internal_fname0 = $('#add_internal_fname1').val();
      var add_internal_lname0 = $('#add_internal_lname1').val();

        $('#confirmm').click(function(){
       

            var c1= $("#c1").val().toString();
            var c2= $("#c2").val().toString();
            var c3= $("#c3").val().toString();
            var c4= $("#c4").val().toString();
            var ccode= c1+c2+c3+c4

            if(ccode !== confirmcode0){

                notify("warning", "Incorrect OTP");
            }

            else{

                event.preventDefault();



                $.post(
                    "confirmcode.php",
                    { 
                        account0: account0,
                        amount0: amount0,
                        modeType0: modeType0,
                        add_internal_fname0: add_internal_fname0,
                        add_internal_lname0: add_internal_lname0
                    
                    },
                    function(data) {
                        $('#stage').html(data);
                       
                    }
                ); 


            }

           

        })

    </script>