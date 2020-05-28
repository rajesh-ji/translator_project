<?php include('include/header.php');?>
<?php 
    if(isset($_POST['rush_fee_add'])){
        extract($_POST);
       // print_r($_POST);
        
         $queryforcheck = "select * from lang_conversion where from_lang_id = '$first_lang' and to_lang_id = '$second_lang'";
        $query = mysqli_query($conn, $queryforcheck);
        $count = mysqli_num_rows($query);
        
        if($count>=1){
            $_SESSION['combination_error'] = '**This Combination already exists';
        }else{
        $query  = mysqli_query($conn, "insert into lang_conversion(from_lang_id,to_lang_id,per_word_amount) value('$first_lang','$second_lang','$rush_fee')");
        if($query){
            echo "<script>alert('language conversion added');</script>";
        }
        else{
            echo "<script>alert('failed to add conversion');</script>";
        }
        }
        
    }
    
    ?>
 <div class="page-wrapper">
           
            <div class="container-fluid">

            <?php if($login_id==1){?>
              <!-- rush fee conversion form -->
              <div class="card">
                    <div class="card-header">
                        <h3>Add conversion</h3>
                    </div>
                    <div class="card-body">
                    <span id="error" style="color:red;margin-bottom:3px;" ><?php if(isset($_SESSION['combination_error'])){echo $_SESSION['combination_error']; $_SESSION['combination_error']='';}?></span>
                         <form class="form-inline" action="lang_conversion.php" method="POST">
                                <div class="form-group" style="margin-right: 10px;">
                                <label for="email" style="margin-right: 5px;" class="font-weight-bold" >First Language</label>
                                <select class="form-control custom-select border-secondary" name="first_lang">
                                                                                        
                                                                                <!-- form language database -->
                                                                                    <?php   $queryFlnag = mysqli_query($conn,"select * from system_lang ");
                                                                                        while($flang = mysqli_fetch_assoc($queryFlnag)){ ?>
                                                                                                <option value="<?php echo $flang['id']?>"><?php echo $flang['name']?></option>
                                                                                    <?php   }?>
                                                                            </select>
                                </div>

                                <div class="form-group" style="margin-right: 10px;">
                                <label for="pwd" style="margin-right: 5px;" class="font-weight-bold">Second Language</label>
                                    <select class="form-control custom-select border-secondary" name="second_lang"> 
                                                                                    
                                                                                <!-- form language database -->
                                                                                <?php   $query2lnag = mysqli_query($conn,"select * from system_lang ");
                                                                                while($tlang = mysqli_fetch_assoc($query2lnag)){ ?>
                                                                                        <option value="<?php echo $tlang['id']?>"><?php echo $tlang['name']?></option>
                                                                            <?php   }?>
                                                                            </select>
                                </div>
                        
                            <div class="form-group" style="margin-right: 10px;">
                              <label for="rush fee" style="margin-right: 5px;" class="font-weight-bold">Per Word Amount</label>
                              <input type="number" step="0.01" name="rush_fee" class="form-control border-secondary" id="amount"  placeholder="Enter Fee" name="Rush fee">
                            </div>
                            
                            <br>
                                
                                
                           <button type="submit" name="rush_fee_add" id="rush_fee_add" class="btn btn-primary">Add</button>
                            
                          </form>
                    </div>
                </div>
<?php }?>
                <!-- lang conversion list -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                       
                            

                            <div class="card-body">
                                <h4 class="card-title">Language Conmbination</h4>
                                <!-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> -->
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>FROM LANGUAGE</th>
                                                <th>TO LANGUAGE</th>
                                                <th>Per word Amount</th>
                                                <th>OPERATIONS</th>

                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php
                                        
                                         if($login_id==1){
                                             $q = "select *from lang_conversion";
                                         }else{
                                             $q = "select tras_service.*, lang_conversion.* from tras_service inner join lang_conversion on tras_service.lang_conversion_id = lang_conversion.id where tras_service.`user_id` = '$user_id'";
                                         }
                                            
                                            $ql = mysqli_query($conn,$q);
                                            $id = 1;
                                        ?>
                                        <?php while($row=mysqli_fetch_assoc($ql)){ ?>
                                            <tr>
                                                <td><?php echo $id;?></td>
                                                <td> <?php $Fid= $row['from_lang_id'];
                                                        $fromquery = mysqli_query($conn, "select name from system_lang where id = $Fid"); 
                                                        $res= mysqli_fetch_assoc($fromquery);
                                                        echo $res['name'];
                                                ?></td>
                                                <td> <?php $Tid= $row['to_lang_id'];
                                                        $fromquery = mysqli_query($conn, "select name from system_lang where id = $Tid"); 
                                                        $res= mysqli_fetch_assoc($fromquery);
                                                        echo $res['name'];
                                                ?></td>
                                               
                                               
                                                <td><?php echo $row['per_word_amount'];?></td>
                                                <td>
                                               <?php if($login_id == 1){?> 
                                                <button type="button" data="<?php echo $row['id'];?>"  class="btn btn-info btn-xs assign_tras" >Assign</button>
                                                <button type="button" data="<?php echo $row['id'];?>"  class="btn btn-info btn-xs view_tras" >View</button>
                                               <?php }else if($login_id == 3){ $status = $row['status'];?>
                                               
                                                <p  class=""><?php 
                                                        if($status==1){echo 'Enable';}else{echo 'Disable';}    
                                                ?></p>
                                               <?php }?>
                                                </td>
                                            </tr>
                                        <?php $id++;
                                        }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        
                <div id="print_data"></div>


                <!-- lang conversion list  -->
                <!--  -->
                <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Assign Translator </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="assign_tran.php" method="POST">
                               
                                <div class="form-group">
                                    <label for="email">Translator List </label>
                                    <!-- <input type="text"  id="email"> -->
                                   
                                    <select name="select_trans" class="form-control" id="select_trans">
                                       
                                    </select>
                                    <input type="hidden" id="lang_conversion_id" name="lang_conversion_id" >
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                            <button type="submit" name="submit_tran" class="btn btn-primary">Assign Translator</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                <!-- assign  modal end -->
                <!-- view modal start -->
                <!-- Modal -->
                <div class="modal fade" id="viewmyModal" tabindex="-1" role="dialog" aria-labelledby="viewmodallable" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewmodallable">Tranlators who translate these combination </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="viewBodymodal">
                                        
                           
                       </div>
                       <div class="modal-footer">
                           <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                           <button type="submit" name="submit_view" class="btn btn-primary">Close</button>
                        </div>
                        </div>
                    </div>
                    </div>
                <!--  -->
                <!-- view modal end -->
            </div>
            <footer class="footer"> © 2020   </footer>
        </div>
        
    </div>
   <?php include('include/footer.php');?>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    // $('update_rate').click(function(){
    //     $('#update_modal').modal('show');
    // });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    //-------assign translator----
    $(".assign_tras").click(function(){
        var lang_conversion_id = $(this).attr("data");
        $.ajax({
            url:"getresult.php",
            method:"POST",
            data:{
                translator:"translator",
                id:lang_conversion_id
            },
            success:function(response){
                $("#select_trans").html(response); 
                $('#lang_conversion_id').val(lang_conversion_id);
                $("#myModal").modal('show');
            },
            error:function(){
                alert('wrong way!');
            }
         });
        
    });
   
    </script>
    <script>
         $(".view_tras").click(function(){
        var lang_id = $(this).attr("data");
        // alert(show_trans_id);
         $.ajax({
            url:"getresult.php",
            method:"POST",
            data:{
                mgs:"getresult",
                id:lang_id
            },
            success:function(response){
                

                $("#viewBodymodal").html(response);  
                $("#viewmyModal").modal('show');
            },
            error:function(){
                alert('wrong way!');
            }
         });
            
    });
    $('#rush_fee_add').click(function(){
        var amount = $('#amount').val();
        if(amount<=0){   
            $('#error').html('**null value not allowed');         
            return false;
        }
    });
    </script>
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    