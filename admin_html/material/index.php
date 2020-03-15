<?php include('include/header.php');?>

<!-- main content -->
<div class="page-wrapper">
           
           <div class="container-fluid">
               <div class="row">
                   
                   <div class="col-md-6 col-lg-3">
                       <div class="card card-body">
                           
                           <div class="row">
                           
                               <div class="col p-r-0 align-self-center">
                                   <h2 class="font-light m-b-0">324</h2>
                                   <h6 class="text-muted">Today Request</h6></div>
                           
                               <div class="col text-right align-self-center">
                                   <div data-label="20%" class="css-bar m-b-0 css-bar-info css-bar-20"></div>
                               </div>
                           </div>
                       </div>
                   </div>
                   
                   <div class="col-md-6 col-lg-3">
                       <div class="card card-body">
                          
                           <div class="row">
                               
                               <div class="col p-r-0 align-self-center">
                                   <h2 class="font-light m-b-0">2376</h2>
                                   <h6 class="text-muted">Total Request</h6></div>
                               
                               <div class="col text-right align-self-center">
                                   <div data-label="30%" class="css-bar m-b-0 css-bar-success css-bar-20"></div>
                               </div>
                           </div>
                       </div>
                   </div>
                   
                   <div class="col-md-6 col-lg-3">
                       <div class="card card-body">
                    
                           <div class="row">
                    
                               <div class="col p-r-0 align-self-center">
                                   <h2 class="font-light m-b-0">1795</h2>
                                   <h6 class="text-muted">Today Registration</h6></div>
                    
                               <div class="col text-right ">
                                   <div data-label="40%" class="css-bar m-b-0 css-bar-primary css-bar-40"></div>
                               </div>
                           </div>
                       </div>
                   </div>
                   
                   <div class="col-md-6 col-lg-3">
                       <div class="card card-body">
                   
                           <div class="row">
                   
                               <div class="col p-r-0 align-self-center">
                                   <h2 class="font-light m-b-0">36870</h2>
                                   <h6 class="text-muted">Total Registration</h6></div>
                   
                               <div class="col text-right align-self-center">
                                   <div data-label="60%" class="css-bar m-b-0 css-bar-danger css-bar-60"></div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="row">
                   <div class="col-lg-6">
                       <div class="card">
                           <div class="card-body">
                           <button type="button" class="btn btn-success" style="float:right;">View All</button>
                               <h4 class="card-title">Last 10 Request</h4>
                               <div class="table-responsive m-t-20">
                                   <table class="table stylish-table">
                                       <thead>
                                           <tr>
                                               <th colspan="2">Name</th>
                                               <th>P. Name</th>
                                               <th>Status</th>
                                               <th>Timing</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           <tr>
                                               <td style="width:50px;"><span class="round">S</span></td>
                                               <td>
                                                   <h6>Sunil Joshi</h6><small class="text-muted">Web Designer</small></td>
                                               <td>Elite Admin</td>
                                               <td><span class="label label-success">Low</span></td>
                                               <td>$3.9K</td>
                                           </tr>
                                           <tr class="active">
                                               <td><span class="round"><img src="../assets/images/users/2.jpg" alt="user" width="50" /></span></td>
                                               <td>
                                                   <h6>Andrew</h6><small class="text-muted">Project Manager</small></td>
                                               <td>Real Homes</td>
                                               <td><span class="label label-info">Medium</span></td>
                                               <td>$23.9K</td>
                                           </tr>
                                           <tr>
                                               <td><span class="round round-success">B</span></td>
                                               <td>
                                                   <h6>Bhavesh patel</h6><small class="text-muted">Developer</small></td>
                                               <td>MedicalPro Theme</td>
                                               <td><span class="label label-primary">High</span></td>
                                               <td>$12.9K</td>
                                           </tr>
                                           <tr>
                                               <td><span class="round round-primary">N</span></td>
                                               <td>
                                                   <h6>Nirav Joshi</h6><small class="text-muted">Frontend Eng</small></td>
                                               <td>Elite Admin</td>
                                               <td><span class="label label-danger">Low</span></td>
                                               <td>$10.9K</td>
                                           </tr>
                                           <tr>
                                               <td><span class="round round-warning">M</span></td>
                                               <td>
                                                   <h6>Micheal Doe</h6><small class="text-muted">Content Writer</small></td>
                                               <td>Helping Hands</td>
                                               <td><span class="label label-warning">High</span></td>
                                               <td>$12.9K</td>
                                           </tr>
                                           <tr>
                                               <td><span class="round round-danger">N</span></td>
                                               <td>
                                                   <h6>Johnathan</h6><small class="text-muted">Graphic</small></td>
                                               <td>Digital Agency</td>
                                               <td><span class="label label-info">High</span></td>
                                               <td>$2.6K</td>
                                           </tr>
                                       </tbody>
                                   </table>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col-lg-6">
                     <div class="card">
                           <div class="card-body">
                           <?php include('include/config.php');
                                        $q= "select * from users";
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
                                               
                                                   <h6><?php echo $row['name'];?></h6><small class="text-muted">Web Designer</small></td>
                                               <td><?php if($row['role_id']==2){
                                                   echo "translator";
                                               }else{
                                                   echo "client";
                                               }
                                                ?></td>
                                               <td><span class=""><?php echo $row['created_at'];?></span></td>
                                               <!-- <td>$3.9K</td> -->
                                               
                                           </tr>  
                                           <?php } ?> 
                                       </tbody>
                                   </table>
                               </div>
                           </div>
                       </div>

                   </div>
               </div>
               <!-- Row -->
               <div class="row">
                   <div class="col-lg-4 col-md-12">
                   </div>
                   <div class="col-lg-4 col-md-12">
                   </div>
               </div>
               
               </div>
           <footer class="footer"> © 2020 </footer>
           </div>
        </div>
<!-- main content ============================== -->




<?php include('include/footer.php');?>
