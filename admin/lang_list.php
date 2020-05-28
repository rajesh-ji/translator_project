
<?php include('include/header.php');?>
<?php 
if(isset($_POST['addDoc'])){
    // include('include/config.php');
    extract($_POST);
    $query = mysqli_query($conn, "INSERT INTO `my_doc_rushfee`(`doc_type`, `fee`) VALUES ('$doctype','$docfee')");
    if($query){
        echo "<script>alert('New doc type added')</script>";
        
    }else{
        echo "<script>alert('failed to add new doc')</script>";
        header('Location: lang_list.php');

    }
}

//update docType or delivery  
                    if(isset($_POST['update_doc'])){
                            extract($_POST);                                                            
                                 $update_doc = mysqli_query($conn,"UPDATE my_doc_rushfee SET fee='$dFee',doc_type='$dType' where id='$dId'");
                                    if($update_doc) {
                                         echo "<script>window.reload(true);</script>";
                                       }
                                    }                                    
                    
                            if(isset($_POST['UpdateDel'])){
                                extract($_POST);                               
                                $update_delivery_fee = mysqli_query($conn,"UPDATE delivery_fee SET max='$delMax', min='$delMin' ,fee='$delFee' where id='$delId'");
                                if($update_delivery_fee){
                                    echo "<script>window.reload(true);</script>";
                                }
                            }
                            
// update docType or delivery end
?>
 <?php 
    if(isset($_POST['addRush'])){
        extract($_POST);
        $addrush_fee = mysqli_query($conn,"INSERT INTO `delivery_fee`(`fee`,`min`,`max`)VALUES('$rush_fee','$min','$max')");
        if($addrush_fee){
            header('Location: lang_list.php');
        }else{
            echo "<script>alert('failed to add')</script>";
            header('Location:lang_list.php');
        }
    }
?>                                


        <div class="page-wrapper">
            <div class="container mt-2">
                <!--conversion fee form  -->
                   
            </div>
            <!-- conversion fee form end  -->
                <!-- =============================== -->
                <!-- =============================== -->
                <!-- Doc type fee form -->
             
                     <div class="row m-2">
                      
                       
                <!-- Doc type fee form end -->
                <!-- =================================== -->
                       
                <div class="row">
                            <!-- delivery day start -->

                        <div class="col-md-6">
                            <div class="card">
                            <?php 
                                $query = mysqli_query($conn, "select * from delivery_fee");
                                $id = 1;
                            ?>
                                <div class="card-body">
                                    <h4 class="card-title">Delivery Rush fee</h4>
                                    <button class="btn btn-primary pull-right" id="rush_form" style="margin-top: -37px;"> Add New Delivery Day</button>
                                    <!-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> -->
                                    <div class="table-responsive m-t-40">
                                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" >
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Delivery Day</th>
                                                    <th>Rush Fee</th>
                                                    <th>Action</th>
                                                    
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php while($row=mysqli_fetch_assoc($query)){?>
                                                        <tr>
                                                            <td><?php echo $id;?></td>
                                                            <td data-target="min","max"><?php if($row['min']==$row['max']){echo '1';}else{echo $row['min']. "-";echo $row['max'];} ?></td>
                                                            <td data-target="fee"><?php echo $row['fee']?></td>
                                                            <td> <button delMax="<?php echo $row['max']?>" delMin="<?php echo $row['min']?>"  delId="<?php echo $row['id']?>" delFee="<?php echo $row['fee']?>"  class="btn btn-primary edit_del">Edit</button></td>
                                                        </tr>
                                              <?php $id++;  }?>
                                            </tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                             </div>
                        </div>                                    

                            <!-- delivery day end -->
                <div class="col-md-6">
                            <div class="card">
                            <?php 
                                $query = mysqli_query($conn, "select * from my_doc_rushfee");
                                $id = 1;
                            ?>
                                <div class="card-body">
                                    <h4 class="card-title">Total Languages</h4>
                                    <button class="btn btn-primary pull-right" id="doc_form" style="margin-top: -37px;"> Add new doc type</button>
                                    <!-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> -->
                                    <div class="table-responsive m-t-40">
                                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Document Type</th>
                                                    <th>Document Fee</th>
                                                    <th>Action</th>
                                                    
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php while($row=mysqli_fetch_assoc($query)){?>
                                                        <tr>
                                                            <td><?php echo $id;?></td>
                                                            <td data-target="doc_type"><?php echo $row['doc_type']?></td>
                                                            <td data-target="fee"><?php echo $row['fee']?></td>
                                                            <td><button  class="btn btn-info edit_doc" dType="<?php echo $row['doc_type']?>" dFee="<?php echo $row['fee']?>"  data-role="update" dId="<?php echo $row['id']?>">Edit</button></td>
                                                        </tr>
                                              <?php $id++;  }?>
                                            </tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                             </div>
                        </div><!--  -->
                        <!--  -->
                        
                    
                           
                <!-- ==================================== -->
                <!--  add new language and add new doc type -->

                      
                      
                        <!--  -->
                        <!--  -->
                       

                <!-- add new language and add new doc type -->
                <!-- =================================== -->
                <!-- ==================================== -->
                <footer class="footer"> © 2020 </footer>
            </div>
        </div>
 <!-- Modal -->
 
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Add New Doc Type </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="lang_list.php" method="POST">
                               <div class="form-group">
                                                <label for="">Doc Name</label>
                                                <input type="text" class="form-control" name="doctype" placeholder="Enter doc name" required>
                               </div>
                               <div class="form-group">
                                                <label for="">Doc Fee</label>
                                                <input type="number" step="0.01" class="form-control" name="docfee" placeholder="Enter doc fee" required>
                               </div>
                            
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                            <button type="submit" name="addDoc" class="btn btn-primary">Add Doc</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                <!-- assign  modal end -->

            <!-- add delivery rush fee modal -->
            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Add New Delivery Day </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="lang_list.php" method="POST">
                               
                               <div class="form-group">
                                                <label for="">Starting Day</label>
                                                <input type="number"  class="form-control" name="min" placeholder="Enter starting  day" required>
                               </div>
                                <div class="form-group">
                                                <label for="">End Day</label>
                                                <input type="number"  class="form-control" name="max" placeholder="Enter Ending day" required>
                               </div>
                               <div class="form-group">
                                                <label for="">Rush Fee</label>
                                                <input type="number" step="0.01" class="form-control" name="rush_fee" placeholder="Enter Rush fee" required>
                               </div>
                                
                            
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                            <button type="submit" name="addRush" class="btn btn-primary">Add Rush Fee</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
            <!-- end rush fee modal -->
            
             <!-- edit delivery rush fee modal -->
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header bg-primary">
                             <h5 class="modal-title text-white" id="exampleModalLabel">Update Delivery Day/Fee </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="lang_list.php" method="POST">
                              
                               <div class="form-group">
                                                <label for="">Starting Day</label>
                                                <input type="number"  class="form-control" name="delMin" id="delMin" placeholder="Enter starting  day" required>
                                                <input type="hidden"   name="delId" id="delId" >
                               </div>
                                <div class="form-group">
                                                <label for="">End Day</label>
                                                <input type="number"  class="form-control" name="delMax" id="delMax" placeholder="Enter Ending day" required>
                               </div>
                               <div class="form-group">
                                                <label for="">Rush Fee</label>
                                                <input type="number" step="0.01" class="form-control" name="delFee" id="delFee" placeholder="Enter Rush fee" required>
                               </div>
                                <input type="hidden" id="userId">
                            
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                            <button type="submit" name="UpdateDel" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
            <!-- end rush fee modal -->
            <!-- edit doc type modal -->
            <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Update Doc Type/Fee </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="lang_list.php" method="POST">
                               <div class="form-group">
                                                <label for="">Doc Name</label>
                                                <input type="text" class="form-control" name="dType" id="dType" placeholder="Enter doc name" required>
                                                <input type="hidden"  name="dId" id="dId"  required>
                               </div>
                               <div class="form-group">
                                                <label for="">Doc Fee</label>
                                                <input type="number" step="0.01" class="form-control" name="dFee" id="dFee" placeholder="Enter doc fee" required>
                               </div>
                            
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                             <button type="submit" name="update_doc"  class="btn btn-info btn-xs assign_tras" >Update</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                <!-- assign  modal end -->
 <?php include('include/footer.php');?>
  
    <script>
       
    $(document).ready(function() {
        
        $('table.display').DataTable();
        } );
        $('#doc_form').click(function(){
            $('#myModal').modal('show');
        });
        $('#rush_form').click(function(){
            $('#myModal1').modal('show');
        });
        
        $('.edit_del').click(function(){
            var delId = $(this).attr('delId');
            var delMax = $(this).attr('delMax');
            var delMin = $(this).attr('delMin');
            var delFee = $(this).attr('delFee');
            // alert(delId+" "+delMax+" "+delMin+" "+delFee);
            $('#delId').val(delId);
            $('#delMax').val(delMax);
            $('#delMin').val(delMin);
            $('#delFee').val(delFee);
            $('#myModal2').modal('show');
        });
        $('.edit_doc').click(function(){
            var id = $(this).attr('dId');
            var dType = $(this).attr('dType');
            var dFee = $(this).attr('dFee');
            $('#dId').val(id);
            $('#dType').val(dType);
            $('#dFee').val(dFee);
            
            $('#myModal3').modal('show');
        });
        

   
      
    
   
   
    </script>
   

    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    
   

    
    
                        <!-- update doc type fee query -->
                        <?php 
                                    
                         
                        ?>
