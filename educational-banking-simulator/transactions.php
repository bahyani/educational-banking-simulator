
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
    <section class="dashboard-section body-collapse transactions">
        <div class="overlay pt-120">
            <div class="container-fruid">
                <div class="head-area">
                    <div class="row">
                        <div class="col-lg-5 col-md-4">
                            <h4>Statement</h4>
                        </div>
                        <div class="col-lg-7 col-md-8">
                            <div class="transactions-right d-flex align-items-center">
                                <form action="#" class="flex-fill">
                                    <div class="form-group d-flex align-items-center">
                                        <img src="assets/images/icon/search.png" alt="icon">
                                        <input type="text" placeholder="Type to search..." id="search">
                                    </div>
                                </form>
                                <a href="javascript:void(0)">Monthly Statement</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="transactions-main">
                            <div class="top-items">
                                <h6>All Transactions</h6>
                            </div>

                            <?php

                                        if (isset($_GET['pageno'])) {
                            $pageno = $_GET['pageno'];
                            } else {
                            $pageno = 1;
                            }

                            $no_of_records_per_page = 8;
                            $offset = ($pageno-1) * $no_of_records_per_page; 


                            $total_pages_sql = "SELECT COUNT(*) FROM tranz";
                            $result = mysqli_query($link,$total_pages_sql);
                            $total_rows = mysqli_fetch_array($result)[0];
                            $total_pages = ceil($total_rows / $no_of_records_per_page);

                            $sqlinvest = mysqli_query($link, "SELECT * FROM tranz ORDER BY id DESC LIMIT $offset, $no_of_records_per_page " );
                            $y =  $offset;
                         
                            ?>


                            <div class="table-responsive">
                                <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Name/ Business</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Amount</th>
                                                    </tr>
                                                </thead>

                         <?php
                         if(mysqli_num_rows($sqlinvest)==0){
    
                            echo'

                            <tbody id="trans_body">
                            <tr >
                            <th scope="row">
                                     <p>No data here...</p>
                                    </th>
                                                                    
                                    </tr>                                                    
                                                    
                             </tbody>';
                               
                            }
                            else{
                                        while($sqlQuery = mysqli_fetch_assoc($sqlinvest)){

                                            $y += 1;
                                            $myid = $sqlQuery['id'];
                                            $id = $sqlQuery['id'];
                                            $account = $sqlQuery['account'];
                                            $beneficiary = $sqlQuery['name'];
                                            $type = $sqlQuery['type'];
                                            $date = $sqlQuery['date'];
                                            $value = $sqlQuery['cid'];
                                            $f_value = number_format($value,2);

                                        echo'
                                           
                                                <tbody id="trans_body">
                                                <tr >
                                                <td class="prim" scope="col" style="text-align: left;">'.$beneficiary.'</td>
                                                <td scope="col" style="text-align: center;">'. $date.'</td>
                                                <td scope="col" style="text-align: center;">'.$pendingstat.'</td>
                                                <td scope="col" style="text-align: right;"> '.$currency_symbol.' '.$f_value.'</td>
                                                                                        
                                                </tr>                                                    
                                                                        
                                                </tbody>';
                                        
                                        }
                                    }
                        ?>
                         </table>
                         </div>
                            <nav aria-label="Page navigation" class="d-flex justify-content-center mt-40">
                                <ul class="pagination justify-content-center align-items-center mb-40">
                                    
                                  

                                    <li class="page-item"><a class="page-link" href="?pageno=1">First</a></li>
                                        <li class="<?php if($pageno <= 1){ echo ''; } ?> page-item">
                                            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link previous" aria-label="Previous"> <i class="fa-solid fa-angle-left"></i> </a>
                                        </li>
                                        
                                    </li>
                                    <li class="page-item"><a class="page-link active" href="javascript:void(0)"><?php echo $pageno; ?></a></li>

                                    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
                                            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>" class="page-link next" aria-label="Next"><i class="fa-solid fa-angle-right"></i></a>
                                        </li>
                                    
                                        <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>  
                                        
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
                                                        <p>Payment From</p>
                                                        <span class="mdr trans_name">...</span>
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
    
    
    $("#search").keyup(function(){
        var key= $(this).val();
        $.post('ajax', {
            search: "set",
            what: "transactions",
            key: key
        }, function(data, status){
            $("#trans_body").html(data.return);
        }, "JSON")
    })
        
   
    
    // TRANSACTIONS
         // SHOW TRANS
         $("body").on('click', '.trans', function(){
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