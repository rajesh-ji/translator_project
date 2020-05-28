<?php include('include/header.php');?>
 <div class="page-wrapper">
            <div class="container-fluid">
                

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">User List</h4>
                                <!-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> -->
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th >Name</th>
                                                <th>Username</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Last_Login</th>
                                                <th>Operations</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php $query = mysqli_query($conn, "select * from users where role_id = '2'");
                                                    while($rd=mysqli_fetch_assoc($query)){?>
                                                <tr>
                                                 
                                                <td><?php echo $rd['name']?></td>
                                                <td><?php echo $rd['username']?></td>
                                                <td><?php echo $rd['mobile']?></td>
                                                <td><?php echo $rd['email']?></td>
                                                <td><?php echo $rd['last_login']?></td>
                                               
                                                 <td>
                                                 <a href="user_info.php?id=<?php echo $rd['id'];?>&user_role=2"> <i class="icon-user detail" title="Details"></i></a> &nbsp;&nbsp;&nbsp;
                                                    <?php if($rd['status']=='0'){?>
                                                            <button class=" active btn btn-info" user ="<?php echo $rd['id'];?>"> Active </button>
                                                   <?php }else{?>
                                                      <button class="block btn btn-danger" user ="<?php echo $rd['id'];?>"> block </button>
                                                    <?php  } ?>                                                </td>
                                                
                                            </tr>                                         
                                           <?php } ?>     
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <footer class="footer"> © 2020 IKO.Com  </footer>
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
                  // alert(id);
                  $.ajax({
                     url:"userstatus.php",
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
                 // alert(id);
                 $.ajax({
                     url:"userstatus.php",
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
<!-- </body>

</html> -->
