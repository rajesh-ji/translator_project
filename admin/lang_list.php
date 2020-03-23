
<?php include('include/header.php');?>



        <div class="page-wrapper">
            <div class="container mt-2">
                <!--conversion fee form  -->
                   
            </div>
            <!-- conversion fee form end  -->
                <!-- =============================== -->
                <!-- =============================== -->
                <!-- Doc type fee form -->
             
                     <div class="row m-2">
                       <div class="col-lg-6">
                            <div class="card card-outline-info">
                                    <div class="card-header">
                                        <h4 class="m-b-0 text-white">Rush fee for Delivery day</h4>
                                    </div>
                                    <div class="card-body">
                                            <form action="#">
                                                <div class="form-body">
                                                    <!-- <h3 class="card-title">Person Info</h3> -->
                                                    <!-- <hr> -->
                                                    <div class="row p-t-20">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Days</label>
                                                                 <select class="form-control custom-select">
                                                                    <!-- add day -->
                                                                    <option value="1">1</option>
                                                                    <option value="3">2-3</option>
                                                                    <option value="7">4-7</option>
                                                                </select>
                                                                
                                                                </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Rush Fee</label>
                                                                 <input type="number" name="rush_fee" class="form-control">
                                                                
                                                                 </div>
                                                        </div>
                                                    </div>
                                                        
                                                <div class="form-actions">
                                                    <button type="submit" class="btn font-weight-bold text-uppercase btn-success btn-block"> Add</button>
                                                   
                                                </div>
                                            
                                    </div></form>
                            </div></div></div>
                      
                        <!--  -->
                        <!--  -->
                        <div class="col-lg-6">
                            <div class="card card-outline-info">
                           <?php 
                            $q = mysqli_query($conn,"select * from my_doc_rushfee");
                            
                           ?>
                                    <div class="card-header">
                                        <h4 class="m-b-0 text-white">Update Doc type fee</h4>
                                    </div>
                                    <div class="card-body">
                                            <form action="lang_list.php" method="post">
                                                <div class="form-body">
                                                    <!-- <h3 class="card-title">Person Info</h3> -->
                                                    <!-- <hr> -->
                                                    <div class="row p-t-20">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                            
                                                                <label class="control-label">Doc type</label>
                                                                 <select class="form-control custom-select select_id" name="doc_type">
                                                                    <!--  doc type database -->
                                                                    <?php while($row = mysqli_fetch_assoc($q)){ ?>
                                                                    <option value="<?php echo $row['id'];?>"><?php echo $row['doc_type'];?></option>
                                                                    <?php }?>
                                                                </select>
                                                            
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Doc Fee</label>
                                                                 <input type="number" step="0.01" name="rush_fee" id="rush_fee"  class="form-control">
                                                                 </div>
                                                        </div>
                                                    </div>
                                                   <!--  <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Per Word Count</label>
                                                                <input type="text" class="form-control">
                                                                 </div>
                                                        </div>                                            
                                                    </div> -->
                                                   
                                                        
                                                <div class="form-actions">
                                                    <button type="submit" name="update_doc" class="btn font-weight-bold text-uppercase btn-success btn-block"> Update</button>
                                                   
                                                </div>
                                            
                                    </div></form>
                            </div></div></div>
                    </div>


                <!-- Doc type fee form end -->
                <!-- =================================== -->
                <!-- ==================================== -->
                <!--  add new language and add new doc type -->

                      
                      
                        <!--  -->
                        <!--  -->
                        <div class="col-lg-12">
                            <div class="card card-outline-info">
                                    <?php 
                                        if(isset($_POST['add_doc'])){
                                        extract($_POST);
                                        $query = mysqli_query($conn, "select * from `my_doc_rushfee` where doc_type ='$doc_type'");
                                        if(mysqli_num_rows($query)>0){
                                            echo "<script>alert('This Doc Type Already Exists. ');</script>";
                                        }else{
                                        $add_doc = mysqli_query($conn,"INSERT INTO `my_doc_rushfee`(`doc_type`, `fee`) VALUES ('$doc_type','
                                        $rush_fee')");
                                        if($add_doc){
                                            echo "<script>alert('Doc Type Successfully Added. ');</script>";
                                        }
                                    }
                                }
                                    ?>
                                    <div class="card-header">
                                        <h4 class="m-b-0 text-white">Add New Doc Type</h4>
                                    </div>
                                    <div class="card-body">
                                            <form action="lang_list.php" method="post">
                                                <div class="form-body">
                                                    <!-- <h3 class="card-title">Person Info</h3> -->
                                                    <!-- <hr> -->
                                                    <div class="row p-t-20">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Doc type</label>
                                                                 <input type="text" name="doc_type" required class="form-control">
                                                                
                                                                </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Doc Fee</label>
                                                                 <input type="number" step="0.01" required name="rush_fee" class="form-control">
                                                                
                                                                 </div>
                                                        </div>
                                                    </div>
                                                   <!--  <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Per Word Count</label>
                                                                <input type="text" class="form-control">
                                                                 </div>
                                                        </div>                                            
                                                    </div> -->
                                                   
                                                        
                                                <div class="form-actions">
                                                    <button type="submit" name="add_doc" class="btn font-weight-bold text-uppercase btn-success btn-block"> Add</button>
                                                   
                                                </div>
                                            
                                    </div></form>
                            </div></div></div>
                    </div>

                <!-- add new language and add new doc type -->
                <!-- =================================== -->
                <!-- ==================================== -->
            <footer class="footer">
                © 2020
            </footer>
        </div>
    </div>
 <?php include('include/footer.php');?>
  
    <script>
        $("select.select_id").change(function(){
        var id = $(this).children("option:selected").val();
        // alert( selectedCountry);
        $.ajax({
            url:"getamount.php",
            method:"POST",
            data:{
                mgs:"getamount",
                id :id
            },
            success:function(response){
                $("#rush_fee").val(response);
                // alert(response);
            }
        });
    });

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
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    
<?php 
                                    
                          if(isset($_POST['update_doc'])){
                                    extract($_POST);
                             $update_doc = mysqli_query($conn,"UPDATE my_doc_rushfee SET fee='$rush_fee' where id='$doc_type'");
                                       if($update_doc){
                                           echo "<script>alert('Price updated!');</script>";
                                       }
                                    }
                                    ?>