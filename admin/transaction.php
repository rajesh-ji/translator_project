<?php include('include/header.php');?>
 <div class="page-wrapper">
            <div class="container-fluid">
                

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Transaction List</h4>
                                
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Translator Name</th>
                                                <!--<th>Request Id</th>-->
                                                <!--<th>Delivery Date</th>-->
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Operations</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php 
                                          $r="SELECT t.*, users.name FROM transaction_translator as t INNER JOIN users on users.id=t.translator_id";
                                            $query  = mysqli_query($conn, $r);
                                            $i=1; while($row=mysqli_fetch_assoc($query)){?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo $row['name']?></td>
                                                            <!--<td><?php echo $row['id']?></td>-->
                                                            
                                                            <!--<td><?php echo $row['delivery_date']?></td>-->
                                                            <td><?php echo $row['amount']?></td>
                                                            <td><?php echo $row['status']?></td>
                                                            <td><button class="btn btn-primary">Pay</button></td>
                                                            $i++;
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
   
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
<!-- </body>

</html> -->
