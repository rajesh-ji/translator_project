<?php include('include/header.php');

?>


<!-- main content -->
<div class="page-wrapper">
           
           <div class="container-fluid">

               <div class="row">
                  
                       <div class="col-md-6 col-lg-3">
                           <div class="card card-body">
                                 
                                 <div class="row">
                                 
                                       <div class="col p-r-0 align-self-center">
                                           <h2 class="font-light m-b-0">
                                           <?php
                                           if($login_id=='1'){
                                                $today_req = "SELECT count(*) as abc FROM user_request where DATE(created_at) = DATE(NOW())";
                                            }else if($login_id=='3'){
                                              $today_req = "SELECT count(*) as abc FROM user_request where DATE(created_at) = DATE(NOW()) and translator_id ='$admin_login'";
                                            }
                                           $req_count = mysqli_query($conn,$today_req);
                                           $row = mysqli_fetch_assoc($req_count);
                                           $today_req_record = $row['abc'];
                                            echo $today_req_record;
                                            
                                           ?>
                                           </h2>
                                           <h6 class="text-muted">Today Request</h6></div>
                                   
                                       <div class="col text-right align-self-center">
                                           <!-- <div data-label="20%" class="css-bar m-b-0 css-bar-info css-bar-20"></div> -->
                                       </div>
                                   </div>
                             </div>
                       </div>
                   
                   <div class="col-md-6 col-lg-3">
                       <div class="card card-body">
                          
                           <div class="row">
                               
                               <div class="col p-r-0 align-self-center">
                                   <h2 class="font-light m-b-0">
                                    <?php
                                    if($login_id=='1'){
                                        $sqlQuery = "SELECT count(*) as abc from user_request";
                                    }else if($login_id=='3'){
                                        $sqlQuery = "SELECT count(*) as abc from user_request where translator_id ='$admin_login'";
                                    }
                                    $qt = mysqli_query($conn,$sqlQuery);
                                    $row = mysqli_fetch_assoc($qt);
                                    $record = $row['abc'];
                                    echo $record;
                                    ?>
                                   </h2>
                                   <h6 class="text-muted">Total Request</h6></div>
                               
                               <div class="col text-right align-self-center">
                                   <!-- <div data-label="30%" class="css-bar m-b-0 css-bar-success css-bar-20"></div> -->
                               </div>
                           </div>
                       </div>
                   </div>
                   <!-- pending request start-->
                   <?php if($login_id=='3'){?>
                    <div class="col-md-6 col-lg-3">
                       <div class="card card-body">
                          
                           <div class="row">
                               
                               <div class="col p-r-0 align-self-center">
                                   <h2 class="font-light m-b-0">
                                    <?php
                                    
                                    $sqlQuery = "SELECT count(*) as abc from user_request where status='pending' and translator_id ='$admin_login'";
                                    
                                    $qt = mysqli_query($conn,$sqlQuery);
                                    $row = mysqli_fetch_assoc($qt);
                                    $record = $row['abc'];
                                    echo $record;
                                    ?>
                                   </h2>
                                   <h6 class="text-muted">Pending Request</h6></div>
                               
                               <div class="col text-right align-self-center">
                                   <!-- <div data-label="30%" class="css-bar m-b-0 css-bar-success css-bar-20"></div> -->
                               </div>
                           </div>
                       </div>
                   </div>
                   <!-- panding request end-->
                   <!-- complete Request start-->
                    <div class="col-md-6 col-lg-3">
                       <div class="card card-body">
                          
                           <div class="row">
                               
                               <div class="col p-r-0 align-self-center">
                                   <h2 class="font-light m-b-0">
                                    <?php
                                    if($login_id=='1'){
                                        $sqlQuery = "SELECT count(*) as abc from user_request";
                                    }else if($login_id=='3'){
                                        $sqlQuery = "SELECT count(*) as abc from user_request where status='complete' and translator_id ='$admin_login'";
                                    }
                                    $qt = mysqli_query($conn,$sqlQuery);
                                    $row = mysqli_fetch_assoc($qt);
                                    $record = $row['abc'];
                                    echo $record;
                                    ?>
                                   </h2>
                                   <h6 class="text-muted">Complete Request</h6></div>
                               
                               <div class="col text-right align-self-center">
                                   <!-- <div data-label="30%" class="css-bar m-b-0 css-bar-success css-bar-20"></div> -->
                               </div>
                           </div>
                       </div>
                   </div>
                   <?php }?>
                   <!-- complete request end -->
               <!-- for admin total registration -->
              <?php if($login_id=='1'){ ?> 
                   <div class="col-md-6 col-lg-3">
                       <div class="card card-body">
                    
                           <div class="row">
                    
                               <div class="col p-r-0 align-self-center">
                                   <h2 class="font-light m-b-0">
                                   <?php
                               
                                        $total_reg = "SELECT count(*) as abc FROM users where DATE(created_at) = DATE(NOW())";
                                        $reg_count = mysqli_query($conn,$total_reg);
                                        $row = mysqli_fetch_assoc($reg_count);
                                        $total_reg_record = $row['abc'];
                                         echo $total_reg_record;
                                    ?>
                                   </h2>
                                   <h6 class="text-muted">Today Registration</h6></div>
                    
                               <div class="col text-right ">
                                   <!-- <div data-label="40%" class="css-bar m-b-0 css-bar-primary css-bar-40"></div> -->
                               </div>
                           </div>
                       </div>
                   </div>
              
                   <div class="col-md-6 col-lg-3">
                       <div class="card card-body">
                   
                           <div class="row">
                   
                               <div class="col p-r-0 align-self-center">
                                   <h2 class="font-light m-b-0">
                                   <?php                                  
                                        $sql = "SELECT count(*) as abc from users where role_id in (2,3)";
                                        $reg_count = mysqli_query($conn,$sql);
                                        $row = mysqli_fetch_assoc($reg_count);
                                        $record = $row['abc'];
                                        echo $record;                                        
                                    ?>
                                   </h2>
                                   <h6 class="text-muted">Total Registration</h6></div>
                   
                               <div class="col text-right align-self-center">
                                   <!-- <div data-label="60%" class="css-bar m-b-0 css-bar-danger css-bar-60"></div> -->
                               </div>
                           </div>
                       </div>
                   </div>
                   <?php }?>
                   <!-- for admin Total registration ent -->
                   
               </div>
              




               <div class="row">

<!-- last 10 request for-->
                   <div class="col-lg-6">
                       <div class="card">
                           <div class="card-body">
                           <a href="request_all.php"  class="btn btn-SUCCESS pull-right text-white">View All</a>
                               <h4 class="card-title">Last 10 Request</h4>
                               <div class="table-responsive m-t-20">
                                   <table class="table stylish-table">
                                       <thead>
                                           <tr>
                                               <?php if($login_id=='1'){?>  <th>Name</th>  <?php }?>
                                               
                                               <th>Status</th>
                                               <th>Timing</th>
                                               <th>Delivery</th>
                                               
                                           </tr>
                                       </thead>
                                       <tbody>
                                       <?php 
                                       if($_SESSION['login_id']==1){
                                         $sql = "SELECT user_request.*, users.name FROM user_request inner join users on user_request.translator_id = users.id order by user_request.id desc limit 10";
                                       }else{
                                              $sql = "SELECT user_request.*, users.name as translator_name FROM user_request inner join users on user_request.translator_id = users.id where translator_id = '$admin_login' order by user_request.id desc limit 10";
                                       }
                                                $query = mysqli_query($conn, $sql);
                                                $count = mysqli_num_rows($query);
                                                
                                                if($count>0){ 
                                                    while($request = mysqli_fetch_assoc($query)){
                                       ?>
                                           <tr>
                                            <?php if($login_id=='1'){ ?> 
                                              <td><h6><?php echo $request['name'];?></h6></td> <?php }?>
                                            
                                              <td class="btn btn-primary"><?php echo $request['status'];?></td>
                                              <td><?php $rDate = $request['created_at']; $fDate = strtotime($rDate); echo date("d M Y g:i A", $fDate) ; ?></td>
                                              <td><?php $dDate = strtotime($request['delivery_date']); echo date("d M Y g:i A", $dDate) ; ?></td>
                                              
                                           </tr>
                                           <?php } }?>
                                           </tbody>
                                   </table>
                               </div>
                           </div>
                       </div>
                   </div>
                   <!-- last 10 request   -->

                   <!-- ==================================================  -->
                   <!-- last 10 new request  -->
                   <?php if($_SESSION['login_id']==3){?>
                         <div class="col-lg-6">
                       <div class="card">
                           <div class="card-body">
                           <a href="request_all.php"  class="btn btn-SUCCESS pull-right text-white">View All</a>
                               <h4 class="card-title">NEW 10 Request</h4>
                               <div class="table-responsive m-t-20">
                                   <table class="table stylish-table">
                                       <thead>
                                           <tr>
                                               
                                             <?php if($login_id=='1'){?>  <th>Name</th><th></th>  <?php }?>
                                               <th>Project </th>
                                               <th>Status</th>
                                               <th>Timing</th>
                                               <th>Delivery</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                       <?php 
                                                $query = mysqli_query($conn, "SELECT user_request.*, users.name FROM user_request inner join users on user_request.customer_id = users.id where `translator_id` = '$admin_login' order by id desc limit 10 ");
                                                
                                                $count = mysqli_num_rows($query);
                                                if($count>0){
                                                    while($request = mysqli_fetch_assoc($query)){
                                       ?>
                                           <tr>
                                             <?php if($login_id=='1'){?>   <td><span class="round mr-1" ><?php $username = $request['name'];  echo substr($username,0,1)?></span> </td>
                                              <td><?php echo $request['name'];?></td>  <?php }?>
                                              <td><?php echo $request['pname'];?></td>
                                              <td><?php echo $request['status'];?></td>
                                               <td><?php $rDate = $request['created_at']; $fDate = strtotime($rDate); echo date("d M y g:i A", $fDate) ; ?></td>
                                               <td><?php $dDate = strtotime($request['delivery_date']); echo date("d M y g:i A", $dDate) ; ?></td>
                                              
                                           </tr>
                                           <?php } }?>
                                           </tbody>
                                   </table>
                               </div>
                           </div>
                       </div>
                   </div>
                   <?php }?>
                   <!-- lst 10 new request  -->
                   <!--  -->
                    <!-- lst 10 registration -->
                  <?php if($_SESSION['login_id']==1){?>
                   <div class="col-lg-6">
                     <div class="card">
                           <div class="card-body">
                           <?php 
                                        $q= "select * from users where role_id not in (1) order by id desc limit 10";
                                        $q1 = mysqli_query($conn,$q);
                                       ?>
                           <!--<button type="button" class="btn btn-success" style="float:right;"></button>-->
                           <a href="user.php" class="btn btn-success text-white pull-right">View All</a>
                               <h4 class="card-title">Last 10 Registration</h4>
                               <div class="table-responsive m-t-20">
                                   <table class="table stylish-table">
                                   <thead>
                                           <tr>
                                               <th>Name</th>
                                               <th>User </th>
                                               <th>Date</th>
                                               <!-- <th>Timing</th> -->
                                           </tr>
                                       </thead>
                                       <tbody>
                                       <?php while($row=mysqli_fetch_assoc($q1)){?>
                                           <tr>
                                               
                                               <td>
                                               
                                                   <h6><?php echo $row['name'];?></h6></td>
                                               <td><?php if($row['role_id']=='3'){
                                                   echo "Translator";
                                               }else{
                                                   echo "Client";
                                               }
                                                ?></td>
                                               <td><span class=""><?php $rDate = $row['created_at']; $fDate = strtotime($rDate); echo date("d M y g:i A", $fDate) ; ?></span></td>
                                           </tr>  
                                           <!---->
                                           <?php } ?> 
                                       </tbody>
                                   </table>
                               </div>
                           </div>
                       </div>
​
                   </div>
                    <?php }?>
                    <!-- lst 10 registration -->
               </div>
               <!-- Row -->
               <div class="row">
                   <div class="col-lg-4 col-md-12">
                   </div>
                   <div class="col-lg-4 col-md-12">
                   </div>
               </div>
               
               </div>
           <footer class="footer"> © 2020 IKO.Com</footer>
           </div>
        </div>
<!-- main content ============================== -->




<?php include('include/footer.php');?>
