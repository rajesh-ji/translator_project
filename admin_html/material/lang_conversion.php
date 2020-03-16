<?php include('include/header.php');?>
 <div class="page-wrapper">
           
            <div class="container-fluid">
              <!-- rush fee conversion form -->
              <div class="card">
                    <div class="card-header">
                        <h3>Add conversion fee</h3>
                    </div>
                    <div class="card-body">
                         <form class="form-inline" action="/action_page.php">
                            <div class="form-group" style="margin-right: 10px;">
                              <label for="email" style="margin-right: 5px;">First Language</label>
                              <select class="form-control custom-select">
                                                                            <!-- form language database -->
                                                                                <?php   $queryFlnag = mysqli_query($conn,"select name from system_lang ");
                                                                                    while($flang = mysqli_fetch_assoc($queryFlnag)){ ?>
                                                                                             <option><?php echo $flang['name']?></option>
                                                                                  <?php   }?>
                                                                        </select>
                            </div>
                            <div class="form-group" style="margin-right: 10px;">
                              <label for="pwd" style="margin-right: 5px;">Second Language</label>
                                <select class="form-control custom-select">
                                                                            <!-- form language database -->
                                                                            <?php   $query2lnag = mysqli_query($conn,"select name from system_lang ");
                                                                            while($tlang = mysqli_fetch_assoc($query2lnag)){ ?>
                                                                                     <option><?php echo $tlang['name']?></option>
                                                                          <?php   }?>
                                                                        </select>
                            </div>
                            <div class="form-group" style="margin-right: 10px;">
                              <label for="email" style="margin-right: 5px;">Rush Fee</label>
                              <input type="number" class="form-control" id="email" placeholder="Enter Fee" name="email">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Add Rush Fee</button>
                          </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                       
                            

                            <div class="card-body">
                                <h4 class="card-title">Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>FROM LANGUAGE</th>
                                                <th>TO LANGUAGE</th>
                                                <th>RUSH FEE</th>
                                                <th>OPERATIONS</th>

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
                                        <?php
                                            $q = "select *from lang_conversion";
                                            $ql = mysqli_query($conn,$q);
                                        ?>
                                        <?php while($row=mysqli_fetch_assoc($ql)){ ?>
                                            <tr>
                                                <td><?php echo $row['id'];?></td>
                                                <td> <?php $Fid= $row['from_lang_id'];
                                                        $fromquery = mysqli_query($conn, "select name from system_lang where id = $Fid"); 
                                                        $res= mysqli_fetch_assoc($fromquery);
                                                        echo $res['name'];
                                                ?></td>
                                                <!-- <td><?php echo $row['from_lang_id'];?></td> -->
                                                <td><?php echo $row['to_lang_id'];?></td>
                                                <td><?php echo $row['rush_fee'];?></td>
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