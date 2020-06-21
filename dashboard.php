<?php include('header.php');?>
<main>
<section class="feature-large feature-large-2 bg--secondary">
    <div class="container">
        <div class="justify-content-around text-center contact-section-header" >
            <h2 class="type--uppercase custom-h2-style" style="font-size: 48px;line-height: 1.16;font-weight: 600;" >Order Tracking System</h2>
            <h5 style="font-size:20px;line-height:1.2;font-weight:500;margin-bottom:0" >Guaranteed answer by monday at 3:30 PM IST.</h5 >
            <p class="lead"><a href="#">info@slack.com</a> </p>
        </div>
    </div>
</section>


    <div class="container mt-4 mb-4">
        <div class="justify-content-around text-center contact-section-header" >
            <h2  class="pull-left">Projects</h2>
            <?php
            $usr_id = $_SESSION['user_id'];
                 $r="select r.*,lang1.name as from_lang_name,lang2.name as to_lang_name,my_doc_rushfee.doc_type as rush_doc,p.status as payment_status from
				user_request as r inner join system_lang as lang1 on lang1.id=r.from_lang inner join system_lang as lang2 on lang2.id=r.to_lang 
				inner join my_doc_rushfee on my_doc_rushfee.id=r.doc_type left join payment as p on r.id=p.request_id where r.customer_id = '$usr_id'";
				$all_request = mysqli_query($conn,$r);
				
            ?>
           
            <table class="table table-striped" id="example">
                <thead>
                        <tr>
                            <th>Job Id</th>
                            <th>Project Name</th>
                            <th>From</th>
                            <th>To</th>    
                            <th>Words</th> 
                            <th>Status</th>
                            <th>Type</th>
                            <th>Planned Delivery</th>
                            <th>Payment Status</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                </thead>
                 <tbody>
										
                                           <?php  $i=1; while($row = mysqli_fetch_assoc($all_request)) {
											   ?> 
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row['pname']?></td>
                                                <td><?php echo $row['from_lang_name']; ?></td>
                                                <td><?php echo $row['to_lang_name']; ?></td>
                                                <td><?php echo $row['word_count']?></td> 
                                                <td><?php $status = $row['status'];if($status=='complete'){echo "complete";}else{echo "In Progress";}?></td>
                                                <td><?php echo $row['rush_doc']?></td>
                                                <td><?php echo date("D-M-Y",strtotime($row['delivery_date']))?></td>
                                                <td><?php echo $row['payment_status']?></td>
 												<td><?php echo $row['amount']."$"?></td>
                                                <td><?php if($row['payment_status']!='success'){?>
                                                    <a class="btn btn--sm btn--primary type--uppercase" href="javascript:void(0)" rId="<?php echo $row['id']?>"><span class="btn__text">Pay Now</span></a>
                                                    <?php }else{echo " ";} ?>
                                                </td>        
                                            </tr>                                       
                                            <?php  $i++;}?>
                                        </tbody>
            </table>
        </div>
    </div>




</main>
<?php include('footer.php');?>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            "order": [[ 3, "desc" ]]
        } );
    } );
</script>