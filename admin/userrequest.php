<?php
include('include/header.php');

$user_id = $_SESSION['admin_id'];
?>
<?php 
if(isset($_POST['request'])){
    extract($_POST);
    $query = mysqli_query($conn,"select * from lang_conversion where from_lang_id = '$first_lang' and to_lang_id = '$second_lang'");
    $count =  mysqli_num_rows($query);
    if($count>0){
        $_SESSION['request_error'] = '*This combination already exists, please checkout!';
    }else{
        $query = mysqli_query($conn,"insert into lang_conversion(from_lang_id,to_lang_id,status) value('$first_lang','$second_lang','0')");
        $last_id = mysqli_insert_id($conn);
        if($query){
            $trans_query = mysqli_query($conn,"INSERT into tras_service(lang_conversion_id,user_id,status) value('$last_id','$user_id','0')");
            if($trans_query){
                $_SESSION['request_success']= '**Successfully Added Combination.';
            }else{
                $_SESSION['request_error'] = '*sql error.';
            }
        }else{
            $_SESSION['request_error'] = '*sql error.';
        }
    }
}
?>
<div class="page-wrapper">

            <!-- add new combination form admin start -->
<div class="card">
                    <div class="card-header">
                        <h3>Add New Combination</h3>
                    </div>
                    <span id="error" style="color:red;margin-bottom:3px; margin-left:15px;text-transform:uppercase;" ><?php if(isset($_SESSION['request_error'])){echo $_SESSION['request_error']; $_SESSION['request_error']='';}?></span>
                    <span id="error" style="color:green;margin-bottom:3px; margin-left:15px;text-transform:uppercase;" ><?php if(isset($_SESSION['request_success'])){echo $_SESSION['request_success']; $_SESSION['request_success']='';}?></span>
                    <div class="card-body">
                   
                         <form class="form-inline" action="userrequest.php" method="POST">
                                <div class="form-group" style="margin-right: 10px;">
                                    <label for="" style="margin-right: 5px;" class="font-weight-bold" >First Language</label>
                                    <select class="form-control custom-select border-secondary" name="first_lang">                                                                                        
                                                                                <!-- form language database -->
                                                                                    <?php   $queryFlnag = mysqli_query($conn,"select * from system_lang ");
                                                                                        while($flang = mysqli_fetch_assoc($queryFlnag)){ ?>
                                                                                                <option value="<?php echo $flang['id']?>"><?php echo $flang['name']?></option>
                                                                                    <?php   }?>
                                    </select>
                                </div>

                                <div class="form-group" style="margin-right: 10px;">
                                <label for="" style="margin-right: 5px;" class="font-weight-bold">Second Language</label>
                                    <select class="form-control custom-select border-secondary" name="second_lang">                                                                                     
                                                                                <!-- form language database -->
                                                                                <?php   $query2lnag = mysqli_query($conn,"select * from system_lang ");
                                                                                while($tlang = mysqli_fetch_assoc($query2lnag)){ ?>
                                                                                        <option value="<?php echo $tlang['id']?>"><?php echo $tlang['name']?></option>
                                                                            <?php   }?>
                                    </select>
                                </div>                                
                           <button type="submit" name="request"  class="btn btn-primary">Request</button>
                            
                          </form>
                    </div>
                </div>
           <!-- add new combination form admin End -->
           
           <div class="container-fluid">
           <div class="table-responsive m-t-40">
           <div class="card">
                    <div class="card-header">
                        <h3>User Request</h3>
                    </div>
                    <div class="card-body">
                        <form action="request_trans.php" method="POST">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                            <tr>
                                                            <th>id</th>
                                                            <th>First Language</th>
                                                            <th>Second Language</th>                                                           
                                                            <th>Operation</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $id = 1;
                                                                // echo $sql = "select lang";
                                                                $query = mysqli_query($conn, "Select * from lang_conversion where id  not in (select  lang_conversion_id from tras_service where user_id = '$user_id') ");
                                                                while($rd = mysqli_fetch_assoc($query)){?>
                                                                        <tr>
                                                                            <td><?php echo $id;?></td>
                                                                                            <td><?php  $from_id = $rd['from_lang_id'];
                                                                                    $from_lang = mysqli_query($conn,"select name from system_lang where id = '$from_id'");
                                                                                    $from_lang_name = mysqli_fetch_assoc($from_lang);
                                                                                    echo $from_lang_name['name'];
                                                                            ?></td>
                                                                            <td><?php   $to_id = $rd['to_lang_id'];
                                                                                    // echo $to_id;
                                                                                    $to_lang = mysqli_query($conn,"select name from system_lang where id = '$to_id'");
                                                                                    $to_lang_name = mysqli_fetch_assoc($to_lang);
                                                                                    echo $to_lang_name['name'];
                                                                            ?></td>
                                                                            <td>                                                                                              
                                                                                <label class="custom-checkbox"><input type=checkbox class="addrequest" name="id[]" value="<?php echo $rd['id']?>" > <span class="custom-label"></span></label>
                                                                            </td>
                                                                            
                                                                        </tr>

                                                            <?php $id++;    } ?>
                                           
                                                        </tbody>
                                                    </table>
                         <input type="hidden" value="<?php echo $user_id?>" name="user_id">
                         <button type="submit" class="btn btn-primary" name="submit">add language</button>
                         </form>
        </div></div>
        </div></div>
       <?php include('include/footer.php')?>
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
        $(".addrequest").click(function(){
            var user_id = $(this).attr("user_id");
            var lang_id = $(this).attr("lang_id");

        // $.ajax({
        //     url:"request_trans.php",
        //     method:'POST',
        //     data:{
        //         user_id:user_id,
        //         lang_id:lang_id
        //     },
        //     success:function(){
        //         alert("Request send to the admin");        
        //         location.reload(true);
        //         $(this).html("Complete")
        //         //   return false;
        //     },
        //     error:function(){
        //         alert("access denied");
        //     }

        // });
        });
        
    });
</script>

<style>
.custom-checkbox{
    position: relative;
  }
  .custom-checkbox input{
    visibility: hidden;
    margin-right: 8px;
  }
  .custom-label:before,.custom-label:after{
    width: 16px;
    height: 16px;
    content: "";
    border: 1px solid;
    display: inline-block;
    position: absolute;
    left: 0;
    top: 0px;
    border: #adb5bd solid 1px;
    transition: background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    border-radius: .25rem;
  }
  .custom-checkbox input:checked + .custom-label:before{
    border-color: #007bff;
    background-color: #007bff;
  }
  .custom-checkbox input:checked + .custom-label:after{
    width: 4px;
    border: 2px solid #ffffff;
    height: 8px;
    border-top: none;
    border-left: none;
    transform: rotate(40deg);
    left: 6px;
    top: 3px;
  }
</style>

