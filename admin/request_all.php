<?php include('include/header.php');

?>
<div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Requests</h4>
                                 <!-- lst 10 registration -->
                                    <?php 

print_r($_SESSION);
if($_SESSION['login_id']==1 || $_SESSION['login_id']==3){?>                                
                                        <div class="card">
                                            <div class="card-body">                                  
                                                <div class="table-responsive m-t-20">
                                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                            <tr>
                                                            <th>Name</th>
                                                            <th></th>
                                                            <th>P. Name</th>
                                                            <th>Subject</th>
                                                            <th>Translator</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php 
                                                        if($_SESSION['login_id']==1){
                                                        $sql = "SELECT user_request.*,(select doc_type from my_doc_rushfee where my_doc_rushfee.id=user_request.doc_type) as subject, users.name FROM user_request inner join users on user_request.customer_id = users.id limit 15";
                                                        }else{
                                                        $sql = "SELECT user_request.*,(select doc_type from my_doc_rushfee where my_doc_rushfee.id=user_request.doc_type) as subject, users.name FROM user_request inner join users on user_request.customer_id = users.id where translator_id = '$user_id' limit 5";
                                                        }
                                                        $query = mysqli_query($conn, $sql);
                                                        while($request = mysqli_fetch_assoc($query)):
                                                            $doc_type = $request['subject'];
                                                            if($request['status']=='complete'){
                                                                $status_class = "label label-success";
                                                            }
                                                            elseif ($request['status']=='processing') {
                                                                $status_class = "label label-warning";
                                                            }
                                                            else{
                                                                $status_class = "label label-info";
                                                            }
                                                        ?>
                                                        <tr>
                                                            <td><span class="round mr-1" style="text-transform: capitalize;" ><?php $username = $request['name'];  echo substr($username,0,1)?></span> </td>
                                                            <td><h6><?php echo $request['name'];?></h6></td>
                                                            <td><?php echo $request['pname'];?></td>
                                                            <td><?php echo $doc_type;?>
                                                            </td>
                                                            <td><?php echo $request['name'];?></td>
                                                            <td><span style="text-transform: capitalize;" class="btn <?php echo $status_class;?>"><?php echo $request['status'];?></span></td>
                                                            <td>
                                                                <a class="btn btn-info block" href="edit_request.php?request_id=<?php echo $request['id']?>">Edit</a>
                                                                <a class="btn btn-danger block" href="change_request.php?request_id=<?php echo $request['id']?>&type=delete">Delete</a>
                                                                <?php if($request['status']=='pending'):?>
                                                                <a class="btn btn-info block" href="change_request.php?request_id=<?php echo $request['id']?>&type=accept">Accept</a>
                                                                <a class="btn btn-danger" href="change_request.php?request_id=<?php echo $request['id']?>&type=reject">Reject</a>
                                                                <?php endif;?>
                                                            </td>

                                                        </tr>
                                                    <?php endwhile;?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                    </div>
                                    <?php }?>
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
    </script>
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
<!-- </body>

</html> -->
