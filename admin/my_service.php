<?php include('include/header.php'); ?>
      

    <div class="page-wrapper">
            <div class="container-fluid">
            <!-- ====================================================================== -->
            <!-- add new language -->
                <div class="card">
                    <h2 class="card-title bg-info text-white m-2 p-2">Add New Language</h2>
                    <div class="card-body">
                        
                        <form action="addnewlang.php" method="POST"  class="form-inline" style="position:relative">
                       
                            <input type="text" name="lang_name" class="form-control mr-2 border-secondary" placeholder="new language">
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
                                                if($flag == "0")
                                                {?>
                                               <a user="<?php echo $rd['id']?>" class="active">  <i class="fa fa-check-square"   style="color:green;" title="active"></i> </a>
                                              <?php  }
                                                else{ ?>
                                               <a class="block" user="<?php echo $rd['id']?>"> <i class="fa fa-close" style="color:red;" title="block"></i> </a>
                                                     <!-- <i class='fa fa-close  block' style='color:red;' title='active'></i> -->
                                                <?php } ?>
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
    <script>
            $('.block').click(function(){
                 var id = $(this).attr("user");
//alert(id);
                  $.ajax({
                     url:"userblock.php",
                     method:"POST",
                     data:{
                         block:"block",
                         id: id
                     },
                     success:function(response){
                         if(true){
                            // alert('this user block');
                         location.reload(true);}
                     }
                 });
            });
    </script>
    <script>
            $('.active').click(function(){
                 var id = $(this).attr("user");
//alert(id);
                 $.ajax({
                     url:"userblock.php",
                     method:"POST",
                     data:{
                         active:"active",
                         id: id
                     },
                     success:function(response){
                         if(true){
                           // alert('this user active');
                         location.reload(true);}
                     }
                 });
            });
    </script>
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
  