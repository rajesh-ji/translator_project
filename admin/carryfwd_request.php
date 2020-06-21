<?php include('include/header.php');?>  
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <?php
                            
                            if($login_id=='1'){
                                $r="select r.*,users.name as translatorName,lang1.name as from_lang_name,lang2.name as to_lang_name,my_doc_rushfee.doc_type as rush_doc,p.status as payment_status from
    							user_request as r inner join system_lang as lang1 on lang1.id=r.from_lang inner join system_lang as lang2 on lang2.id=r.to_lang inner join users on users.id = r.translator_id 
    							inner join my_doc_rushfee on my_doc_rushfee.id=r.doc_type left join payment as p on r.id=p.request_id where r.id IN (SELECT  `request_id` FROM `request_forword`) order by r.id desc";
                            }else if($login_id=='3'){
                                // echo "<script>alert('".$admin_login."')</script>";
                                $r="select r.*,lang1.name as from_lang_name,lang2.name as to_lang_name,my_doc_rushfee.doc_type as rush_doc,p.status as payment_status from
    							user_request as r inner join system_lang as lang1 on lang1.id=r.from_lang inner join system_lang as lang2 on lang2.id=r.to_lang  
    							inner join my_doc_rushfee on my_doc_rushfee.id=r.doc_type left join payment as p on r.id=p.request_id where r.id IN (SELECT  `request_id` FROM `request_forword` where `translator_id`='$admin_login') order by r.id desc";
                            }
							 
							
                            $all_request = mysqli_query($conn,$r);
                        
                        ?>
                            <div class="card-body">
                                <h4 class="card-title">Carry Forwarded Request Data</h4>
                                
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>S No</th>
                                                <th>Project Name</th>
                                                <?php if($login_id=='1'){ ?><th>Translator Name</th><?php } ?>
                                                <th>Doc Type</th>
                                                <th>From Lang/To Lang</th>
                                                <?php    if($login_id=='1'){ ?>
                                                <th>Amount</th>                                       
                                                <th>Payment Status</th>                                       
                                                <?php }?>
                                                <th>R. Status</th>                                       
                                                <th>Operations</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>S No</th>
                                                <th>Project Name</th>
                                                <?php if($login_id=='1'){ ?><th>Translator Name</th><?php } ?>
                                                <th>Doc Type</th>
                                                <th>From Lang/To Lang</th>
                                            <?php    if($login_id=='1'){ ?>
                                                <th>Amount</th>                                       
                                                <th>Payment Status</th>                                       
                                                <?php } ?>
                                                <th>R. Status</th>                                       
                                                <th>Operations</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
										
                                           <?php $i=1; while($row = mysqli_fetch_assoc($all_request)) {
												$payment_status=$row['payment_status'];
												if($payment_status=="success")
												{
													$pay_button="btn-success";
											
												}
												else
												{
													$pay_button="btn-danger";
												}
													
											   
											   ?> 
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row['pname']?></td>
                                                <?php if($login_id=='1'){?><td><?php echo $row['translatorName']?></td>  <?php }?>
                                                <td><?php echo $row['rush_doc']?></td>
                                                <td><?php echo $row['from_lang_name']."/".$row['to_lang_name']; ?></td>
                                            <?php   if($login_id=='1'){ ?>
                                                <td><?php echo $row['amount']."$"?></td>
                                                <td>
												
												<span class="btn <?php echo $pay_button;?>">
										        <?php if($payment_status=="" || $payment_status==null){ echo "Not Submited";} else {echo $payment_status;} ?>
 												</span></td>
 												<?php }?>
                                                <td><?php echo $row['status']?></td>
                                                
                                                  <td>    
                                                    <?php
                                                    if($row['status']=='processing'){?>
                                                        <a class="btn btn-info block" href="edit_request.php?request_id=<?php echo $row['id']?>"><i class="fa fa-check-circle" title="Submit Request"></i></a> &nbsp;&nbsp;&nbsp;    
                                                <?php  }
                                                    if($login_id=='1' && $row['status']=='pending' || $row['status']=='forward'){?>
                                                        <i class="fa fa-edit assign_tras" data="<?php echo $row['id'];?>" title="Change Translator"></i>&nbsp;&nbsp;&nbsp;    
                                                    <?php } ?>
                                                     <?php if($login_id=='3' && $request['status']=='pending'):?>
                                                        <a class="btn btn-info block" href="change_request.php?request_id=<?php echo $row['id']?>&type=accept"><i class="fa fa-check-circle " title="Accept Request"></i> &nbsp;&nbsp;&nbsp;</a><!-- accept the request -->
                                                        <a class="btn btn-danger" href="change_request.php?request_id=<?php echo $row['id']?>&type=reject"><i class="icon-close" title="Reject Request"></i></a><!-- for reject request -->
                                                    <?php endif;
                                                        if($login_id=='1' && $row['status']!='complete'){?> <a class="btn btn-danger block" href="change_request.php?request_id=<?php echo $request['id']?>&type=delete"><i class="mdi mdi-delete-forever" title="Delete Request Permanent"></i></a>
                                                    <?php  }?>
                                                </td>
                                            </tr>                                       
                                            <?php  $i++;}?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Complete Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
        <form action="carryfwd_request.php" method="POST" id="modalForm">
          <div class="form-group">
             <label for="finalFile" class="col-form-label">Translate Document</label>
             <input type="file" name="doc" class="form-control" id="doc">
             <input type="hidden" name="id" id='id'>
          </div>
         <div class="error" style="color:red;font-weight:600;"></div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="doc-submit" class="btn btn-primary">Submit</button>
    </form>
      </div>
    </div>
  </div>
</div>
            <footer class="footer"> © 2017 Material Pro Admin by wrappixel.com </footer>
        </div>
           </div>
   <?php include('include/footer.php');?>
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
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
    // conplete task modal
    $('.completTask').click(function(){
        var id = $(this).attr('dataID');
        $('#id').val(id);
        $('#exampleModal').modal("show");
    });
    // complete task modal end
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>
    
</body>

</html>
