<?php include('include/header.php');?>
 <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Translator</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Last_Login</th>
                                                <th>Bio</th>
                                                <th>Operations</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Last_Login</th>
                                                <th>Bio</th>
                                                
                                            </tr>
                                        </tfoot>

                                        <tbody> 
                                            <?php $query = mysqli_query($conn, "select * from users where role_id = '3'");
                                                    while($rd=mysqli_fetch_assoc($query)){?>
                                                <tr>
                                                 
                                                <td><?php echo $rd['name']?></td>
                                                <td><?php echo $rd['username']?></td>
                                                <td><?php echo $rd['mobile']?></td>
                                                <td><?php echo $rd['email']?></td>
                                                <td><?php echo $rd['last_login']?></td>
                                                <td><?php echo $rd['bio']?></td>
                                                 <td><?php if($rd['status']==1){?>
                                                    <a href=""><span class="font-weight-bold ">Block</span></a> &nbsp;
                                                    <a href=""><span class="font-weight-bold ">Pause</span></a>
                                                 <?php   }  elseif($rd['status']==2){ ?>
                                                                    <a href=""><span class="font-weight-bold ">Active</span></a>
                                                                    <a href=""><span class="font-weight-bold ">Pause</span></a>
                                                  <?php  }?> <!-- &nbsp;  -->

                                                 
                                                </td>
                                                
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
            <footer class="footer"> © 2020   </footer>
        </div>
    </div>
   <?php include('include/footer.php');?>
   <!-- data table script -->
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
    <!-- data table script -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
<!-- </body>

</html> -->
