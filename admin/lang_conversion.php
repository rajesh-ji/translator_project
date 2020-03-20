<?php include('include/header.php');?>
 <div class="page-wrapper">
           
            <div class="container-fluid">

            <?php if($login_id==1){?>
              <!-- rush fee conversion form -->
              <div class="card">
                    <div class="card-header">
                        <h3>Add conversion fee</h3>
                    </div>
                    <div class="card-body">
                         <form class="form-inline" action="lang_conversion.php" method="POST">
                                <div class="form-group" style="margin-right: 10px;">
                                <label for="email" style="margin-right: 5px;" class="font-weight-bold" >First Language</label>
                                <select class="form-control custom-select border-secondary" name="first_lang">
                                                                                        
                                                                                <!-- form language database -->
                                                                                    <?php   $queryFlnag = mysqli_query($conn,"select * from system_lang ");
                                                                                        while($flang = mysqli_fetch_assoc($queryFlnag)){ ?>
                                                                                                <option value="<?php echo $flang['id']?>"><?php echo $flang['name']?></option>
                                                                                    <?php   }?>
                                                                            </select>
                                </div>

                                <div class="form-group" style="margin-right: 10px;">
                                <label for="pwd" style="margin-right: 5px;" class="font-weight-bold">Second Language</label>
                                    <select class="form-control custom-select border-secondary" name="second_lang"> 
                                                                                    
                                                                                <!-- form language database -->
                                                                                <?php   $query2lnag = mysqli_query($conn,"select * from system_lang ");
                                                                                while($tlang = mysqli_fetch_assoc($query2lnag)){ ?>
                                                                                        <option value="<?php echo $tlang['id']?>"><?php echo $tlang['name']?></option>
                                                                            <?php   }?>
                                                                            </select>
                                </div>
                        
                            <div class="form-group" style="margin-right: 10px;">
                              <label for="rush fee" style="margin-right: 5px;" class="font-weight-bold">Rush Fee</label>
                              <input type="number" step="0.01" name="rush_fee" class="form-control border-secondary"  placeholder="Enter Fee" name="Rush fee">
                            </div>
                            
                            <br>
                                
                                
                           <button type="submit" name="rush_fee_add" class="btn btn-primary">Add Rush Fee</button>
                            
                          </form>
                    </div>
                </div>
<?php }?>
                <!-- lang conversion list -->
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
                                       
                                        <tbody>
                                        <?php
                                        
                                         if($login_id==1){
                                             $q = "select *from lang_conversion";
                                         }else{
                                             $q = "select tras_service.*, lang_conversion.* from tras_service inner join lang_conversion on tras_service.lang_conversion_id = lang_conversion.id where tras_service.`user_id` = '$user_id'";
                                         }
                                            
                                            $ql = mysqli_query($conn,$q);
                                            $id = 1;
                                        ?>
                                        <?php while($row=mysqli_fetch_assoc($ql)){ ?>
                                            <tr>
                                                <td><?php echo $id;?></td>
                                                <td> <?php $Fid= $row['from_lang_id'];
                                                        $fromquery = mysqli_query($conn, "select name from system_lang where id = $Fid"); 
                                                        $res= mysqli_fetch_assoc($fromquery);
                                                        echo $res['name'];
                                                ?></td>
                                                <td> <?php $Tid= $row['to_lang_id'];
                                                        $fromquery = mysqli_query($conn, "select name from system_lang where id = $Tid"); 
                                                        $res= mysqli_fetch_assoc($fromquery);
                                                        echo $res['name'];
                                                ?></td>
                                               
                                               
                                                <td><?php echo $row['per_word_amount'];?></td>
                                                <td><i class="fa fa-refresh" style="color:green;" class="update_rate"></i></td>
                                            </tr>
                                        <?php $id++;
                                        }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- lang conversion list  -->
                <!--  -->
                <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
                    </div>
                <!--  -->
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
    $('update_rate').click(function(){
        $('#update_modal').modal('show');
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    <?php 
    if(isset($_POST['rush_fee_add'])){
        extract($_POST);
        print_r($_POST);
        echo $sql = "insert into lang_conversion(from_lang_id,to_lang_id,per_word_amount) value('$first_lang','$second_lang','$rush_fee')";
        $query  = mysqli_query($conn, $sql);
        if($query){
            echo "<script>alert('language conversion fee added');</script>";
        }
        else{
            echo "<script>alert('failed to add conversion fee');</script>";
        }
    }
    
    ?>