<?php include('include/header.php');
// profile update  *******START*********
if(isset($_POST['profileUpdate'])){
    extract($_POST);
    // print_r($_POST);
    if(isset($_FILES['image'])){
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
        
        $extensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$extensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if($file_size > 2097152){
           $errors[]='File size must be excately 2 MB';
        }
        
        if(empty($errors)==true){
           move_uploaded_file($file_tmp,"users/".$file_name);
           echo "Success";
        }else{
           print_r($errors);
           $file_name = '';
        }
        
     }    





     $sql = "update users set name='$name', username = '$username',password='$password',email='$email',mobile = '$mobile',address1 = '$address',bio='$bio',image='$file_name' where id='$user_id'";
    $update_profile = mysqli_query($conn,$sql);
    if($update_profile){$_SESSION['update_success']='profile update';}
    else{$_SESSION['update_error']='**Error in Sql';}
}
// profile update ******End*********
if($login_id==1){
    echo "<script>window.location.href='index.php';</script>";
}else{
     $user_id = $_SESSION['user_id'];
     $login_id = $_SESSION['login_id'];
    $query = mysqli_query($conn, "select * from users where id = '$user_id'");
    
    $rd = mysqli_fetch_assoc($query);
    
}
?>
<?php

?>
<div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                    <span style="color:red"><?php if(isset($_SESSION['update_error'])){echo $_SESSION['update_error']; $_SESSION['update_error']='';}?></span>
                    <span style="color:green"><?php if(isset($_SESSION['update_success'])){echo $_SESSION['update_success']; $_SESSION['update_success']='';}?></span>
                        <h3 class="text-themecolor m-b-0 m-t-0">Profile</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>

                    <!-- <div class="col-md-7 col-4 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">
                            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                                <div class="chart-text m-r-10">
                                    <h6 class="m-b-0"><small>THIS MONTH</small></h6>
                                    <h4 class="m-t-0 text-info">$58,356</h4></div>
                                <div class="spark-chart">
                                    <div id="monthchart"></div>
                                </div>
                            </div>
                            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                                <div class="chart-text m-r-10">
                                    <h6 class="m-b-0"><small>LAST MONTH</small></h6>
                                    <h4 class="m-t-0 text-primary">$48,356</h4></div>
                                <div class="spark-chart">
                                    <div id="lastmonthchart"></div>
                                </div>
                            </div>
                            
                        </div>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="users/<?php echo $rd['image']?>" class="img-circle" width="150" height="150" />
                                    <h4 class="card-title m-t-10"><?php echo $rd['name'];?></h4>
                                    <h2 class="card-subtitle"> Tranlator</h2>
                                    <!-- <div class="row text-center justify-content-md-center">
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                                    </div> -->
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> <small class="text-muted">Email address </small>
                                <h6><?php echo $rd['email']?></h6> <small class="text-muted p-t-30 db">Phone</small>
                                <h6><?php echo $rd['mobile']?></h6> <small class="text-muted p-t-30 db">Address</small>
                                <h6><?php echo $rd['address1']?></h6>
                                <!-- <div class="map-box">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>  -->
                                <!-- <small class="text-muted p-t-30 db">Social Profile</small>
                                <br/>
                                <button class="btn btn-circle btn-secondary"><i class="fa fa-facebook"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fa fa-twitter"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fa fa-youtube"></i></button> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <ul class="nav nav-tabs profile-tab" role="tablist">                               
                                <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Profile</a> </li> -->
                                
                                    <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a> </li> -->
                               
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#personal" role="tab">Personal Details</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#exprience" role="tab">Exprience</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#skl" role="tab">Skill Set</a> </li>
                                 
                                  
                            </ul>
                            <div class="tab-content">
                               
                             
                                <!-- personal tab -->
                                <div class="tab-pane active" id="personal" role="tabpanel">
                                <div class="card-body">
                                        <form class="form-horizontal form-material" method="POST" action="profile.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" name="name" value="<?php echo $rd['name']?>" placeholder="<?php echo $rd['name']?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Username</label>
                                                <input type="text" name="username" value="<?php echo $rd['username']?>" placeholder="<?php echo $rd['username']?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input type="password" name="password" value="<?php echo $rd['password']?>" placeholder="<?php echo $rd['password']?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" name="email" value="<?php echo $rd['email']?>" placeholder="<?php echo $rd['email']?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Mobile</label>
                                                <input type="number" name="mobile" value="<?php echo $rd['mobile']?>" placeholder="+91<?php echo $rd['mobile']?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Address</label>
                                                
                                                <input type="text" name="address" value="<?php echo $rd['address1']?>" placeholder="<?php echo $rd['address1']?>" class="form-control">
                                            </div>                                            
                                            
                                            <div class="form-group">  
                                                <label for="bio">Bio</label>                                              
                                                <textarea name="bio"  cols="30" rows="5" class="form-control" placeholder="<?php echo $rd['bio']?>"><?php echo $rd['bio']?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Profile</label>
                                                <input type="file" name="image"  class="form-control">
                                            </div>
                                            <button class="btn btn-primary" name="profileUpdate" type="submit" value="profileUpdate" >Update</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- personal tab close -->
                                <!-- exprience tab -->
								<?php 
								 $user_id=$_SESSION['user_id'];
								// die;
								  $edu_query=mysqli_query($conn,"select * from trans_exp where user_id='$user_id' and field_type='1'");  
								  
								  $query2=mysqli_query($conn,"select * from trans_exp where user_id='$user_id' and field_type='2'");
													  
								  $query3=mysqli_query($conn,"select * from trans_exp where user_id='$user_id' and field_type='3'");  
								 	
								?>
                                <div class="tab-pane " id="exprience" role="tabpanel">
                                <div class="card-body">   
                                        <form class="form-horizontal form-material" method="post" action="updateProfile.php">
										 <input type="hidden" name="update_type" value="experience"/>
                                        <h2 class="mb-3">Education & Professional Experience</h2>
                                           
                                            <div class="row mb-5">
                                               <?php while($e=mysqli_fetch_array($edu_query)){ ?>
											     <div class="row" style="margin-top:2%;">
														<div class="col-2">
														<select class="form-control" name="field1[]">
														<option value="">Select Year</option>
														<?php for($y = 1988; $y<=2020; $y++) { ?>
														  <option value="<?php echo $y; ?>" <?php if($y==$e['field1']){ echo "selected";} ?>><?php echo $y; ?></option>
														<?php } ?>
														</select>
														</div>
														<div class="col-2"><input type="text" value="<?php echo $e['field2']; ?>" class="form-control" name="field2[]" placeholder="Degree"></div>
														<div class="col-2"><input type="text" value="<?php echo $e['field3']; ?>"  class="form-control" name="field3[]" placeholder="Subject"></div>
														<div class="col-4"><input type="text" value="<?php echo $e['field4']; ?>"  class="form-control" name="field4[]" placeholder="Institute"></div>
													<div class="col-2"><input type="text" class="form-control" value="<?php echo $e['field5']; ?>"  name="field5[]" placeholder="Country"></div>
													<input type="hidden" value="" name="field6[]"/>
													<input type="hidden" value="1" name="field7[]"/>
													
													</div>
											   <?php } ?>
                                             	<?php for($i = 1; $i<=3; $i++) { ?>
												   <div class="row" style="margin-top:2%;">
														<div class="col-2">
														<select class="form-control" name="field1[]">
														<option value="">Select Year</option>
														<?php for($y = 1988; $y<=2020; $y++) { ?>
														  <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
														<?php } ?>
														</select>
														</div>
														<div class="col-2"><input type="text" class="form-control" name="field2[]" placeholder="Degree"></div>
														<div class="col-2"><input type="text" class="form-control" name="field3[]" placeholder="Subject"></div>
														<div class="col-4"><input type="text" class="form-control" name="field4[]" placeholder="Institute"></div>
													<div class="col-2"><input type="text" class="form-control" name="field5[]" placeholder="Country"></div>
													
													<input type="hidden" value="" name="field6[]"/>
													<input type="hidden" value="1" name="field7[]"/>
													
													</div>
											  <?php } ?>
                                            </div>
                                          <hr>
                                           <div class="mb-5">
                                            <h2 class="mb-3">Other Qualification, i.e. official certification/ accreditations</h2> 
											  <?php while($oq=mysqli_fetch_array($query2)){ ?>
											     <div class="row" style="margin-top:2%;">
                                                    <div class="col-2">
													<select class="form-control" name="field1[]">
													<option value="">Select Year</option>
														<?php for($y = 1988; $y<=2020; $y++) { ?>
														  <option  <?php if($y==$oq['field1']){ echo "selected";} ?> value="<?php echo $y; ?>"><?php echo $y; ?></option>
														<?php } ?>
													</select>
													</div>                                                   
                                                    <div class="col-8"><input type="text"  value="<?php echo $oq['field2']; ?>" class="form-control" name="field2[]" placeholder="Institute"></div>
                                                    <div class="col-2"><input type="text"  value="<?php echo $oq['field3']; ?>" class="form-control" name="field3[]" placeholder="Country"></div> 
														<input type="hidden" value="" name="field4[]"/>
												<input type="hidden" value="" name="field5[]"/>
												<input type="hidden" value="" name="field6[]"/>
												<input type="hidden" value="2" name="field7[]"/>
																										
                                            </div>
											  <?php } ?>
										   <?php for($i = 1; $i<=3; $i++) { ?>
                                            <div class="row" style="margin-top:2%;">
                                                    <div class="col-2">
													<select class="form-control" name="field1[]">
													<option value="">Select Year</option>
														<?php for($y = 1988; $y<=2020; $y++) { ?>
														  <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
														<?php } ?>
													</select>
													</div>                                                   
                                                    <div class="col-8"><input type="text" class="form-control" name="field2[]" placeholder="Institute"></div>
                                                    <div class="col-2"><input type="text" class="form-control" name="field3[]" placeholder="Country"></div> 
												<input type="hidden" value="" name="field4[]"/>
												<input type="hidden" value="" name="field5[]"/>
												<input type="hidden" value="" name="field6[]"/>
												<input type="hidden" value="2" name="field7[]"/>
																										
                                            </div>
										   <?php } ?>   

                                            </div> 
                                           <hr>
                                           <div class="mb-3">
                                     
										    <h2 class="mb-3">Professional experience</h2> 
											 <?php while($pe=mysqli_fetch_array($query3)){ ?>
											    <div class="row" style="margin-top:2%;">
                                                    <div class="col-1">
															<select class="form-control"  name="field1[]">
																<option value=''>From</option>
															<?php for($y = 1988; $y<=2020; $y++) { ?>
															  <option  <?php if($pe['field1']==$y){ echo "selected"; } ?> value="<?php echo $y; ?>"><?php echo $y; ?></option>
															<?php } ?>
															</select>
													</div> 
                                                    <div class="col-1">
													<select class="form-control"  name="field2[]">
																<option value=''>To</option>
															<?php for($y = 1988; $y<=2020; $y++) { ?>
															  <option <?php if($pe['field1']==$y){ echo "selected"; } ?> value="<?php echo $y; ?>"><?php echo $y; ?></option>
															<?php } ?>
															</select>
													</div> 
                                                    <div class="col-4"><input type="text" value="<?php echo $pe['field3']; ?>" name="field3[]" class="form-control"  placeholder="Job Title"></div> 
                                                    <div class="col-2"><input type="text"  value="<?php echo $pe['field4']; ?>" name="field4[]" class="form-control" placeholder="Clients Name"></div>
                                                    <div class="col-2"><input type="text" value="<?php echo $pe['field5']; ?>" name="field5[]" class="form-control" placeholder="Country"></div>
                                                    <div class="col-2"><input type="text" value="<?php echo $pe['field6']; ?>" name="field6[]" class="form-control" placeholder="Responsibility"></div>
													<input type="hidden" name="field7[]" value='3'/>
                                            </div>
											 <?php } ?>
										    <?php for($i = 1; $i<=3; $i++) { ?>
                                            <div class="row" style="margin-top:2%;">
                                                    <div class="col-1">
															<select class="form-control"  name="field1[]">
																<option value=''>From</option>
															<?php for($y = 1988; $y<=2020; $y++) { ?>
															  <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
															<?php } ?>
															</select>
													</div> 
                                                    <div class="col-1">
													<select class="form-control"  name="field2[]">
																<option value=''>To</option>
															<?php for($y = 1988; $y<=2020; $y++) { ?>
															  <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
															<?php } ?>
															</select>
													</div> 
                                                    <div class="col-4"><input type="text" name="field3[]" class="form-control"  placeholder="Job Title"></div> 
                                                    <div class="col-2"><input type="text" name="field4[]" class="form-control" placeholder="Clients Name"></div>
                                                    <div class="col-2"><input type="text" name="field5[]" class="form-control" placeholder="Country"></div>
                                                    <div class="col-2"><input type="text" name="field6[]" class="form-control" placeholder="Responsibility"></div>
													<input type="hidden" name="field7[]" value='3'/>
                                            </div>
                                            <?php } ?>
                                            </div>
                                            <div class="row">

											<input type="submit" class="btn btn-primary" value="Update" name="update"/>
                                            </div>
                                          
                                        </form>      
                                    </div>
                                
                                </div>
                                <!-- exprience tab close -->
                                <!-- skill tab -->
                                <div class="tab-pane " id="skl" role="tabpanel">
                                      <div class="card-body">                        
                                      <!-- get translator skill list in store in array -->
                                      <?php
                                      
                                        // echo $abc = "select tool_skill_list from traslator_data where `user_id` = '$user_id'";
                                            $query= mysqli_query($conn,"select tool_skill_list from traslator_data where `user_id` = '$user_id'");
                                            $queryResult = mysqli_fetch_assoc($query);
                                            $listitems = $queryResult['tool_skill_list'];
                                           // print_r($listitems);
                                            $skillList = array();
                                            $skillList = explode(',',$listitems);
                                            // print_r($skillList) ;
                                            ?>
                                      <!-- get translator skill list in store in array end -->
                                        <form class="form-horizontal form-material" method="POST" action="skills.php">
                                        <h4 style="font-weight: 500;" name="cat_tools">CAT tools</h4>
                                            I own and know how to use:</br>
                                            <section class="row demo-checkbox">                                            
                                                <div class="col-md-4">                                                
                                                    <input type="checkbox" id="md_checkbox_1" value="1" name="md_checkbox_1" class="chk-col" <?php if(in_array(1,$skillList)){echo "checked";}?>  />
                                                    <label for="md_checkbox_1">Trados Studio 2011</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="checkbox" id="md_checkbox_2" value="2" name="md_checkbox_2" class="chk-col" <?php if(in_array(2,$skillList)){echo "checked";}?> />
                                                    <label for="md_checkbox_2">	MyMemory Plug-in</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="checkbox" id="md_checkbox_3" value="3" name="md_checkbox_3" class="chk-col" <?php if(in_array(3,$skillList)){echo "checked";}?> />
                                                    <label for="md_checkbox_3">Wordfast</label>
                                                </div>
                                            </section>

                                            <section class="row demo-checkbox">                                            
                                                <div class="col-md-4">                                                
                                                    <input type="checkbox" id="md_checkbox_16" value="4" name="md_checkbox_16" class="chk-col" <?php if(in_array(4,$skillList)){echo "checked";}?> />
                                                    <label for="md_checkbox_16">Trados Studio 2009</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="checkbox" id="md_checkbox_17" value="5" name="md_checkbox_17" class="chk-col" <?php if(in_array(5,$skillList)){echo "checked";}?> />
                                                    <label for="md_checkbox_17">IBM Translation Mgr</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="checkbox" id="md_checkbox_18" value="6" name="md_checkbox_18" class="chk-col" <?php if(in_array(6,$skillList)){echo "checked";}?> />
                                                    <label for="md_checkbox_18">MemoQ</label>
                                                </div>
                                            </section>

                                            <h4 style="font-weight: 500;">Operating systems and standard desktop applications</h4>                                           
                                            <section class="row demo-checkbox">                                            
                                                <div class="col-md-4">                                                
                                                    <input type="checkbox" id="md_checkbox_4" value="7" name="md_checkbox_4" class="chk-col" <?php if(in_array(7,$skillList)){echo "checked";}?> />
                                                    <label for="md_checkbox_4">Windows</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="checkbox" id="md_checkbox_5" value="8" name="md_checkbox_5" class="chk-col" <?php if(in_array(8,$skillList)){echo "checked";}?> />
                                                    <label for="md_checkbox_5">	Mac</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="checkbox" id="md_checkbox_6" value="9" name="md_checkbox_6" class="chk-col" <?php if(in_array(9,$skillList)){echo "checked";}?>  />
                                                    <label for="md_checkbox_6">Linux</label>
                                                </div>
                                            </section>
                                            <section class="row demo-checkbox">                                            
                                                <div class="col-md-4">                                                
                                                    <input type="checkbox" id="md_checkbox_19" value="10" name="md_checkbox_19" class="chk-col" <?php if(in_array(10,$skillList)){echo "checked";}?> />
                                                    <label for="md_checkbox_19">MS Word</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="checkbox" id="md_checkbox_20" value="11" name="md_checkbox_20" class="chk-col" <?php if(in_array(11,$skillList)){echo "checked";}?> />
                                                    <label for="md_checkbox_20">MS Powerpoint</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="checkbox" id="md_checkbox_21" value="12" name="md_checkbox_21" class="chk-col" <?php if(in_array(12,$skillList)){echo "checked";}?> />
                                                    <label for="md_checkbox_21">MS Excel</label>
                                                </div>
                                            </section>
                                            <h4 style="font-weight: 500;">Graphic design & desktop publishing (DTP)</h4>
                                            I offer professional services using the following software:</br>
                                            <section class="row demo-checkbox">                                            
                                                <div class="col-md-4">          
                                                                                          
                                                    <input type="checkbox" id="md_checkbox_7" value="13" name="md_checkbox_7" class="chk-col" <?php if(in_array(13,$skillList)){echo "checked";}?> />
                                                    <label for="md_checkbox_7">InDesign CS5</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="checkbox" id="md_checkbox_8" value="14" name="md_checkbox_8" class="chk-col" <?php if(in_array(14,$skillList)){echo "checked";}?> />
                                                    <label for="md_checkbox_8">Adobe Photoshop</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="checkbox" id="md_checkbox_9" value="15" name="md_checkbox_9" class="chk-col" <?php if(in_array(15,$skillList)){echo "checked";}?> />
                                                    <label for="md_checkbox_9">AutoCad</label>
                                                </div>
                                            </section>
                                            <section class="row demo-checkbox">                                            
                                                <div class="col-md-4">                                                
                                                    <input type="checkbox" id="md_checkbox_22" value="16" name="md_checkbox_22" class="chk-col"<?php if(in_array(16,$skillList)){echo "checked";}?>  />
                                                    <label for="md_checkbox_22">InDesign CS4</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="checkbox" id="md_checkbox_23" value="17" name="md_checkbox_23" class="chk-col" <?php if(in_array(17,$skillList)){echo "checked";}?> />
                                                    <label for="md_checkbox_23">Adobe PageMaker</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="checkbox" id="md_checkbox_24" value="18" name="md_checkbox_24" class="chk-col" <?php if(in_array(18,$skillList)){echo "checked";}?> />
                                                    <label for="md_checkbox_24">CorelDRAW</label>
                                                </div>
                                            </section>
                                            <h4 style="font-weight: 500;">Localization software</h4>
                                            I am an experienced user of:</br>
                                            <section class="row demo-checkbox">                                            
                                                <div class="col-md-4">                                                
                                                    <input type="checkbox" id="md_checkbox_10" value="19" name="md_checkbox_10" class="chk-col" <?php if(in_array(19,$skillList)){echo "checked";}?> />
                                                    <label for="md_checkbox_10">Visual Localize</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="checkbox" id="md_checkbox_11" value="20" name="md_checkbox_11" class="chk-col" <?php if(in_array(20,$skillList)){echo "checked";}?> />
                                                    <label for="md_checkbox_11">SDLinsight</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="checkbox" id="md_checkbox_12" value="21" name="md_checkbox_12" class="chk-col" <?php if(in_array(21,$skillList)){echo "checked";}?> />
                                                    <label for="md_checkbox_12">Passolo</label>
                                                </div>
                                            </section>
                                            <section class="row demo-checkbox">                                            
                                                <div class="col-md-4">                                                
                                                    <input type="checkbox" id="md_checkbox_25" value="22" name="md_checkbox_25" class="chk-col" <?php if(in_array(22,$skillList)){echo "checked";}?> />
                                                    <label for="md_checkbox_25">RC-WinTrans</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="checkbox" id="md_checkbox_26" value="23" name="md_checkbox_26" class="chk-col" <?php if(in_array(23,$skillList)){echo "checked";}?> />
                                                    <label for="md_checkbox_26">Catalyst</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="checkbox" id="md_checkbox_27" value="24"  name="md_checkbox_27" class="chk-col" <?php if(in_array(24,$skillList)){echo "checked";}?> />
                                                    <label for="md_checkbox_27">Other</label>
                                                </div>
                                            </section>
                                            <h4 style="font-weight: 500;">Localization experience</h4>
                                            <!-- I own and know how to use:</br> -->
                                            <section class="row demo-checkbox">                                            
                                                <div class="">                                                
                                                    <input type="checkbox" id="md_checkbox_13" value="25" name="md_checkbox_13" class="chk-col" <?php if(in_array(25,$skillList)){echo "checked";}?> />
                                                    <label for="md_checkbox_13">I own and know how to use a tag editor</label>                                               
                                                    <input type="checkbox" id="md_checkbox_14" value="26" name="md_checkbox_14" class="chk-col" <?php if(in_array(26,$skillList)){echo "checked";}?> />
                                                    <label for="md_checkbox_14">I know how to configure a tag editor for XML projects</label>                                               
                                                    <input type="checkbox" id="md_checkbox_15" value="27" name="md_checkbox_15" class="chk-col" <?php if(in_array(27,$skillList)){echo "checked";}?> />
                                                    <label for="md_checkbox_15">I know how to identify and fix errors in HTML code in Notepad</label>
                                                    <input type="checkbox" id="md_checkbox_28" value="28" name="md_checkbox_28" class="chk-col" <?php if(in_array(28,$skillList)){echo "checked";}?> />
                                                    <label for="md_checkbox_28">I know how to save and/or convert a web page from ISO-8859-1 to UTF-8</label>
                                                    <input type="checkbox" id="md_checkbox_29" value="29" name="md_checkbox_29" class="chk-col" <?php if(in_array(29,$skillList)){echo "checked";}?> />
                                                    <label for="md_checkbox_29">I understand variables, arrays, strings and escape characters</label>
                                                </div>
                                            </section>
                                            <button type="submit" name="skillSubmit" class="btn btn-primary" >SUBMIT</button>
                                        </form>
                                    </div>
                                </div>                                
                                <!-- skill tab close -->
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
            <footer class="footer">
                © 2020 IKO.com
            </footer>
        </div>
    </div>
    <?php include('include/footer.php');?>
<script>
$(document).ready(function(){
    
    $('#updateAdmin').click(function(){
        var id = $(this).attr('userid');
        
        var name = $('#name').val();
        var pass = $('#pass').val();
        var email = $('#email').val();
        var mobile = $('#mobile').val();
        var bio = $('#bio').val();
        $.ajax({
            url:'updateProfile.php',
            method:'POST',
            data:{
                mgs:"adminProfile",
                id:id,
                name:name,
                pass:pass,
                email:email,
                mobile:mobile,
                bio:bio
            },
            success:function(response){
                alert('update successfully');
                location.reload(true);
            },
            error:function(){
                alert('problem in updating');
            }
        });
        });
});
</script>
