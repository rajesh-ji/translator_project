<?php include('include/header.php');
      
if($_GET['type']=='lang_form'){
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
                                    <div class="card-header">
                                        <h4 class="m-b-0 text-white">Update Doc type fee</h4>
                                    </div>
                                    <?php 
                                    // include('include/config.php');
                                    if(isset($_POST['upade_doc'])){
                                    extarct($_POST);
                                      $update_doc = mysqli_query($conn,"UPDATE my_doc_rushfee SET fee='$rush_fee' where doc_type='$doc_type'");
                                       if($update_doc){
                                           echo "<script> location.reload();</script>";
                                           header('Location:my_service.php?type=lang_form');
                                       }
                                    }
                                    ?>
                                    <div class="card-body">
                                            <form action="my_service.php?type=lang_form" method="post">
                                                <div class="form-body">
                                                    <!-- <h3 class="card-title">Person Info</h3> -->
                                                    <!-- <hr> -->
                                                    <div class="row p-t-20">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Doc type</label>
                                                                 <select class="form-control custom-select" name="doc_type">
                                                                    <!--  doc type database -->
                                                                    <option value="pdf">PDF</option>
                                                                    <option value="jpg">JPG</option>
                                                                    <option value="png">PNG</option>
                                                                </select>
                                                                
                                                                </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Doc Fee</label>
                                                                 <input type="number" name="rush_fee" class="form-control">
                                                                
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
                                                    <button type="submit" name="upade_doc" class="btn font-weight-bold text-uppercase btn-success btn-block"> Update</button>
                                                   
                                                </div>
                                            
                                    </div></form>
                            </div></div></div>
                    </div>


                <!-- Doc type fee form end -->
                <!-- =================================== -->
                <!-- ==================================== -->
                <!--  add new language and add new doc type -->

                      <div class="row m-2">                    
                        <div class="col-lg-12 ">
                            <div class="card card-outline-info">
                                    <div class="card-header">
                                        <h4 class="m-b-0 text-white">Add New Doc Type</h4>
                                    </div>
                                    <?php 
                                        if(isset($_POST['add_doc'])){
                                        extract($_POST);
                                        $add_doc = mysqli_query($conn,"INSERT INTO `my_doc_rushfee`(`doc_type`, `fee`) VALUES ('$doc_type','$rush_fee')");
                                    }
                                    ?>
                                    <div class="card-body">
                                            <form action="my_service.php?type=lang_form" method="post">
                                                <div class="form-body">
                                                    <!-- <h3 class="card-title">Person Info</h3> -->
                                                    <!-- <hr> -->
                                                    <div class="row p-t-20">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Doc type</label>
                                                                 <input type="text" name="doc_type" class="form-control">

                                                                </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Doc Fee</label>
                                                                 <input type="number" name="rush_fee" class="form-control">
                                                                
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
 <?php
 }
 else{
 ?>     <div class="page-wrapper">
            <div class="container-fluid">
            <!-- ====================================================================== -->
            <!-- add new language -->
                <div class="card">
                    <h2 class="card-title bg-info text-white m-2 p-2">Add New Language</h2>
                    <div class="card-body">
                        
                        <form action="addnewlang.php" method="POST"  class="form-inline" style="position:relative">
                       
                            <input type="text" name="lang_name" class="form-control mr-2 border-secondary" placeholder="new language" required>
                            <!-- <input type="checkbox" class="form-checkbox"> -->
                            <!-- <input type="hidden" name="front_lang" value="0" /> -->
                            <!-- <input type="hidden" name="front_lang" id="basic_checkbox_2" value="0"    /> -->
                            <input type="checkbox" name="front_lang" id="basic_checkbox_2"   unchecked />
                                    <label for="basic_checkbox_2" class="mr-2" title="make front language ">Front language</label>
                                    <button class="btn btn-dark" name="lang_add" type="submit" value="submit">Add</button>
                            
                        </form>
                    </div>
                </div>
                <!-- add new language -->
                <!-- ================================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <?php 
                            $q = "select *from system_lang";
                            $ql = mysqli_query($conn,$q);
                        ?>
                            <div class="card-body">
                                <h4 class="card-title">Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Front_lang</th>
                                                <th>Created_by</th>
                                                <!-- <th>Status</th> -->
                                                <th>Created_at</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <!-- <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Front_lang</th>
                                                <th>Created_by</th>
                                                <th>Status</th>
                                                <th>Created_at</th>
                                            </tr>
                                        </tfoot> -->
                                        <tbody>
                                        <?php while($row=mysqli_fetch_assoc($ql)){ ?>
                                            <tr>
                                                <td><?php echo $row['name'];?></td>
                                                <!-- front language  -->
                                                <td><?php 
                                                $flag = $row['front_lang'];
                                                if($flag == '1')
                                                {
                                                    echo "<i class='fa fa-check-square' style='color:green;'></i> ";
                                                }
                                                else{
                                                    echo "  <i class='fa fa-close' style='color:red;'></i>";
                                                }
                                                ?></td>
                                                <!-- front language ended **************** -->
                                                <td><?php 
                                                    echo "admin";
                                                 $row['created_by'];
                                                ?></td>
                                                <!-- <td></td> -->
                                                <td><?php echo $row['created_at'];?></td>
                                                <!-- status -->
                                                <td>
                                                <?php 
                                                $flag = $row['status'];
                                                if($flag == '0')
                                                {
                                                    echo "<i class='fa fa-check-square update' style='color:green;' title='inactive'></i> ";
                                                }
                                                else{
                                                    echo "  <i class='fa fa-close update' style='color:red;' title='active'></i>";
                                                }
                                                ?>
                                                </td>
                                                <!-- status -->
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <footer class="footer"> © 2020   </footer>
        </div>
    </div>
    <?php }?>

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
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
  