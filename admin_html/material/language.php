<?php include('include/header.php');?>
 <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <?php include('include/config.php');
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
                                                <th>Status</th>
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
                                                <td><?php echo $row['front_lang'];?></td>
                                                <td><?php echo $row['created_by'];?></td>
                                                <td><?php echo $row['status'];?></td>
                                                <td><?php echo $row['created_at'];?></td>
                                                <td><a href=""><i class="fa fa-check-square" style="color:green;"></i></a> &nbsp; <a href=""><i class="fa fa-close"style="color:red;"></i></a></td>
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
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
<!-- </body>

</html> -->
