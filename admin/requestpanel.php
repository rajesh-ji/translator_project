<?php
   include('include/header.php');
   // include('include/config.php');
    $query = mysqli_query($conn, "SELECT tras_service.id as tras_service_id ,tras_service.user_id, lang_conversion.* FROM tras_service inner JOIN lang_conversion on tras_service.lang_conversion_id = lang_conversion.id where lang_conversion.status ='0' LIMIT 0, 25");
   
    $sid = 1;
?>
<?php
	if(isset($_POST['addamount'])){
		extract($_POST);
       // print_r($_POST);
        if($amount<=0){
            $_SESSION['amount_error'] = '**please add amount more than 0';            
        }else{
           $query_lang = mysqli_query($conn,"update lang_conversion set status = '1',per_word_amount = '$amount' where id ='$lang_id'");
           if($query_lang){
            $trans_query = mysqli_query($conn,"update tras_service set status = '1' where id  = '$trans_id'");
            if($trans_query){
                $_SESSION['amount_success'] = 'add successfully.';            
            }
           }else{
            $_SESSION['amount_error'] = '**sql error';            
           }
        }
	}
?>
<div class="page-wrapper">
           
           <div class="container-fluid" style="width:100%;">
           <div class="card">
                    <div class="card-header">
                        <h3>Accept Request</h3>
                    </div>
                    <span style="color:red;text-transform:uppercase;margin-left:3%;"><?php if(isset($_SESSION['amount_error'])){echo $_SESSION['amount_error'];$_SESSION['amount_error']='';}?></span>
                    <span style="color:green;text-transform:uppercase;margin-left:3%;"><?php if(isset($_SESSION['amount_success'])){echo $_SESSION['amount_success'];$_SESSION['amount_success']='';}?></span>
                    <div class="card-body">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                            <tr>
                                                            <th>id</th>
                                                            <th>From Language Name</th>
                                                            <th>To Language</th>
                                                            <th>Translator Name</th>
                                                            <th>Operation</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php 
                        
                        while($rd = mysqli_fetch_assoc($query)){?>
                            <tr>
                                <td><?php echo $sid;?></td>

                                <td>
                                    <?php $from_id = $rd['from_lang_id'];
                                        $from_lang = mysqli_query($conn,"select name from system_lang where id = '$from_id'");
                                        $from_lang_name = mysqli_fetch_assoc($from_lang);
                                        echo $from_lang_name['name'];
                                    ?>
                                </td>

                                <td>
                                    <?php  $to_id = $rd['to_lang_id'];                                            
                                            $to_lang = mysqli_query($conn,"select name from system_lang where id = '$to_id'");
                                            $to_lang_name = mysqli_fetch_assoc($to_lang);
                                            echo $to_lang_name['name'];                                    
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    $tid = $rd['user_id'];
                                    $traname = mysqli_query($conn, "select name from users where id = '$tid'");
                                    $rdt = mysqli_fetch_assoc($traname);
                                    echo $rdt['name'];                                    
                                    ?>
                                </td>

                                <td>                                
                                    <button type="submit"  lang_id="<?php echo $rd['id']?>" tras_id="<?php echo $rd['tras_service_id']?>"  class="btn btn-primary acceptrequest">Accept</button>
                                    <button type="submit"  lang_id="<?php echo $rd['id']?>" tras_id="<?php echo $rd['tras_service_id']?>"  class="btn btn-primary deleterequest">Denied</button>
                                </td>
                            </tr>
                        <?php $sid++; }?>
                       
                                           
                                                        </tbody>
                                                    </table>
                    </div></div>
        </div></div>
       <!-- Modal -->
 
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Add New Doc Type </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="requestpanel.php" method="POST">
                               
                               <div class="form-group">
                                                <label for="">Doc Fee</label>
                                                <input type="number" step="0.01" class="form-control" name="amount" placeholder="Enter per word amount" required>
                                                
                               </div>
                                                <input type="hidden" id="lang_id_m"  name="lang_id" >
                                                <input type="hidden"  id="trans_id_m" name="trans_id" >
                            
                        </div>
                        <div class="modal-footer">                            
                            <button type="submit" name="addamount" class="btn btn-primary">Add Doc</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                <!-- assign  modal end -->
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

<script>
    $(document).ready(function(){
        $(".acceptrequest").click(function(){
            var lang_id = $(this).attr("lang_id");
            var tras_id = $(this).attr("tras_id");
            // alert(lang_id+" "+tras_id);
             $('#lang_id_m').val(lang_id);   
             $('#trans_id_m').val(tras_id);   
            $('#myModal').modal('show');    
        
        // $.ajax({
        //     url:"accept.php",
        //     method:'POST',
        //     data:{
        //         mgs:'accept',
        //         lang_id:lang_id,
        //         tras_id:tras_id,                
        //     },
        //     success:function(){
        //          alert("Accepted");
        //          location.reload(true);
        //           return false;
        //     },
        //     error:function(){
        //         alert("null");
        //     }

        // });
        });
        $(".deleterequest").click(function(){
            var lang_id = $(this).attr("lang_id");
            var tras_id = $(this).attr("tras_id");
            // alert(lang_id+" "+tras_id);
        $.ajax({
            url:"accept.php",
            method:'POST',
            data:{
                mgs:'delete',
                lang_id:lang_id,
                tras_id:tras_id,               
            },
            success:function(){
                 alert("Deleted Record");
                 location.reload(true);
                
            }

        });
        });
        
    });
</script>



