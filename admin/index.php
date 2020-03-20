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
                                           $today_req = "SELECT count(*) as abc FROM user_request where DATE(created_at) = DATE(NOW())";
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
                                    $qt = mysqli_query($conn,"SELECT count(*) as abc from user_request");
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
                                        $sql = "SELECT count(*) as abc from users where role_id='2' or role_id='3'";
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
                   
               </div>
              




               <div class="row">

<!-- last 10 request for-->
                   <div class="col-lg-6">
                       <div class="card">
                           <div class="card-body">
                           <button type="button" class="btn btn-success" style="float:right;">View All</button>
                               <h4 class="card-title">Last 10 Request</h4>
                               <div class="table-responsive m-t-20">
                                   <table class="table stylish-table">
                                       <thead>
                                           <tr>
                                               <th>Name</th>
                                               <th>P. Name</th>
                                               <th>Status</th>
                                               <th>Timing</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                       <?php 
                                       if($_SESSION['login_id']==1){
                                         $sql = "SELECT user_request.*, users.name FROM user_request inner join users on user_request.customer_id = users.id limit 5";
                                       }else{
                                              $sql = "SELECT user_request.*, users.name FROM user_request inner join users on user_request.customer_id = users.id where translator_id = '$user_id' limit 5";
                                       }
                                                $query = mysqli_query($conn, $sql);
                                                $request = mysqli_fetch_assoc($query);
                                       ?>
                                           <tr>
                                              <td><span class="round mr-1" >R</span> <?php echo $request['name'];?></td>
                                              <td><?php echo $request['pname'];?></td>
                                              <td><?php echo $request['doc_type'];?></td>
                                              <td><?php  echo date("d M y g:i A", time()); ?></td>
                                              
                                           </tr>
                                           
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
                           <button type="button" class="btn btn-success" style="float:right;">View All</button>
                               <h4 class="card-title">NEW 10 Request</h4>
                               <div class="table-responsive m-t-20">
                                   <table class="table stylish-table">
                                       <thead>
                                           <tr>
                                               <th>Name</th>
                                               <th>P. Name</th>
                                               <th>Status</th>
                                               <th>Timing</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                       <?php 
                                                $query = mysqli_query($conn, "SELECT user_request.*, users.name FROM user_request inner join users on user_request.customer_id = users.id where `translator_id` = '$user_id' order by id desc limit 5 ");
                                                $request = mysqli_fetch_assoc($query);
                                       ?>
                                           <tr>
                                              <td><span class="round mr-1" >R</span> <?php echo $request['name'];?></td>
                                              <td><?php echo $request['pname'];?></td>
                                              <td><?php echo $request['doc_type'];?></td>
                                              <td><?php  echo date("d M y g:i A", time()); ?></td>
                                              
                                           </tr>
                                           
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
                                        $q= "select * from users limit 5";
                                        $q1 = mysqli_query($conn,$q);
                                       ?>
                           <button type="button" class="btn btn-success" style="float:right;">View All</button>
                               <h4 class="card-title">Last 10 Registration</h4>
                               <div class="table-responsive m-t-20">
                                   <table class="table stylish-table">
                                   <thead>
                                           <tr>
                                               <th colspan="2">Name</th>
                                               <th>User Role</th>
                                               <th>Date</th>
                                               <!-- <th>Timing</th> -->
                                           </tr>
                                       </thead>
                                       <tbody>
                                       <?php while($row=mysqli_fetch_assoc($q1)){?>
                                           <tr>
                                               <td style="width:50px;"><span class="round">S</span></td>
                                               <td>
                                               
                                                   <h6><?php echo $row['name'];?></h6></td>
                                               <td><?php if($row['role_id']==2){
                                                   echo "translator";
                                               }else{
                                                   echo "client";
                                               }
                                                ?></td>
                                               <td><span class=""><?php  echo date("d M y g:i A", time()); ?></span></td>
                                           </tr>  
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
           <footer class="footer"> © 2020 IKO.Com </footer>
           </div>
        </div>
<!-- main content ============================== -->




<?php include('include/footer.php');?>
