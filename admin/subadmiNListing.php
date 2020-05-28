<?php include('include/header.php');?>
<div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Translator Data</h4>
                                
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th> 
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Last Login</th>
                                                <th>Operations</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th> 
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Last Login</th>
                                                <th>Operations</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php $qt = "select *from users where role_id = '1' and id not IN (3)";
                                            $result = mysqli_query($conn,$qt);
                                           while($row = mysqli_fetch_assoc($result)){?>
                                        
                                            <tr>
                                                <td><?php echo $row['id'];?></td>
                                                <td><?php echo $row['name'];?></td>
                                                <td><?php echo $row['mobile'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['last_login'];?></td>
                                            
                                                <td>                                                
                                               
                                                    <?php if($row['status']=='0'){?>
                                                            <button class=" active btn btn-info" user ="<?php echo $row['id'];?>"> Active </button>
                                                   <?php }else{?>
                                                      <button class="block btn btn-danger" user ="<?php echo $row['id'];?>"> block </button>
                                                    <?php  } ?>                                                
                                                   </td>
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
            <footer class="footer"> © 2020 IKO.com </footer>
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
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
        // active or block user  
        $(".block").click(function(){
            var id = $(this).attr("user"); 
            // alert(id+' block column');
            $.ajax({
                url:'subAdminBlockActive.php',
                method:'POST',
                data:{
                    request:"block",
                    user_id:id
                },
                success:function(response){
                    location.reload(true);
                    
                },
                error:function(){
                    alert('error');
                }
            });
    });
    $(".active").click(function(){
        var id = $(this).attr("user"); 
            // alert(id+' active column');
            $.ajax({
                url:'subAdminBlockActive.php',
                method:'POST',
                data:{
                    request:"active",
                    user_id:id
                },
                success:function(response){
                    location.reload(true);
                    
                },
                error:function(){
                    alert('error');
                }
            });
    });
        // 
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
   
    </script>
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
<!-- </body>

</html> -->
