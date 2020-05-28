<?php include('include/header.php');?>
<div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Translator </h4>
                                
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
                                        <?php $qt = "select *from users where role_id = '3'";
                                            $result = mysqli_query($conn,$qt);
                                           while($row = mysqli_fetch_assoc($result)){?>
                                        
                                            <tr>
                                                <td><?php echo $row['id'];?></td>
                                                <td><?php echo $row['name'];?></td>
                                                <td><?php echo $row['mobile'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['last_login'];?></td>
                                                <td>
                                                <a href="user_info.php?id=<?php echo $row['id'];?>&user_role=3"> <i class="icon-user detail" title="Details"></i></a>&nbsp;&nbsp;&nbsp;
                                                <?php if($row['status']=='2'){?>
                                                <button class="btn btn-primary active" data-id="<?php echo $row['id']?>" title="Accept">Active</button>  <?php }?> 
                                                <?php if($row['status']=='1'){?>
                                                <button class="btn btn-danger block" data-id="<?php echo $row['id']?>" title="block">Block</button></td> <?PHP }?>
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
            <footer class="footer"> © 2017 Material Pro Admin by wrappixel.com </footer>
        </div>
    </div>
    <!-- <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/waves.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script> -->
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
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $(".block").click(function(){
            var id = $(this).attr("data-id"); 
            // alert(id+' block column');
            $.ajax({
                url:'translatorActiveBlock.php',
                method:'POST',
                data:{
                    block:"block",
                    id:id
                },
                success:function(response){
                    // alert('User block');
                    location.reload(true);
                },
                error:function(){
                    alert('error');
                }
            });
    });
    $(".active").click(function(){
        var id = $(this).attr("data-id"); 
            // alert(id+' active column');
            $.ajax({
                url:'translatorActiveBlock.php',
                method:'POST',
                data:{
                    active:"active",
                    id:id
                },
                success:function(response){
                    // alert('User Active');
                    location.reload(true);
                },
                error:function(){
                    alert('error');
                }
            });
    });
    </script>
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
<!-- </body>

</html> -->
