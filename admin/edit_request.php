<?php include_once('include/header.php');?>

<style>
	.dropify-wrapper .dropify-message p {
    margin: 5px 0 0;
    text-align: center;
}
</style>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Forms</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="request.php">Request</a></li>
                </ol>
            </div>
        </div>
        <?php
function fileupload($file){
    // Upload file 
    $uploadDir = 'translation_output/'; 
    if(!file_exists($uploadDir)){
        mkdir($uploadDir,0777,true);
    }
    if(!empty($file["name"])){ 
         
        // File path config 
        $fileName = basename($file["name"]); 
        echo $fileName;
        $targetFilePath = $uploadDir . $fileName; 
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg'); 
        if(in_array($fileType, $allowTypes)){ 
            // Upload file to the server 
            if(move_uploaded_file($file["tmp_name"], $targetFilePath)){ 
                $response['status'] = 0; 
                $response['filename'] = $fileName; 
                $response['message'] = "file uploaded successfully"; 
            }else{ 
                $response['status'] = 0; 
                $response['message'] = 'Sorry, there was an error uploading your file.'; 
            } 
        }else{ 
            $response['status'] = 0;
            $response['message'] = 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.'; 
        }
        return $response; 
    } 
}
 $get = "select *,(select doc_type from my_doc_rushfee where my_doc_rushfee.id=user_request.doc_type) as subject from user_request where id=".$_GET['request_id'];

$res = mysqli_query($conn,$get);
$request_data = mysqli_fetch_assoc($res);
$subject = $request_data['subject'];
$amount =$request_data['amount'];
$transID =$request_data['translator_id'];
if(!empty($_POST)){
    
    $output_path="";
    
    if(!empty($_FILES['output_file']['name'])){
        
        $file_data = fileupload($_FILES['output_file']);
        
        if(!empty($file_data['output_file'])){
            $output_path = $file_data['output_file'];   
        }
    }
    $output = $_POST['output'];
    $request_id = $_POST['request_id'];

   echo  $sql= "insert into request_translation(user_request_id,translated_file,translated_text) values($request_id,'{$output_path}','{$output}')";
    mysqli_query($conn,$sql);
    if(mysqli_insert_id($conn)){
         $sql = "update user_request set status='complete' where id='{$request_id}' limit 1";
        $complete= mysqli_query($conn,$sql);
        if($complete){
            mysqli_query($conn, "INSERT INTO `transaction_translator`(`translator_id`, `request_id`, `amount`) VALUES ('$transID','$request_id','$amount')");
        }
    }
    
    header('location:request.php');
}
?>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <h3 class="box-title m-b-0">Sample Basic Forms</h3>
                    <p class="text-muted m-b-30 font-13"> Bootstrap Elements </p>
                    
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form action="edit_request.php"  method="post" enctype="form-data/multipart">
                                <input type="hidden" name="request_id" value="<?php echo $_GET['request_id'];?>">
                                <div class="row">
				                    <div class="col-6">
				                        <div class="card">
				                            <div class="card-body">
				                                <h6 class="card-subtitle">Delivery Date</h6>
                                                <input type="text" value="<?php echo $request_data['delivery_date'];?>">
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-subtitle">Amount</h6>
                                                <input type="text" value="<?php echo $request_data['amount'];?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if(!empty($request_data['doc_path'])):?>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-subtitle">Doc Link</h6>
                                                <a href="../docs/<?php echo $request_data['doc_path'];?>">View</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            <?php endif;?>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-subtitle">Subject</h6>
                                                <input type="text" value="<?php echo $subject;?>">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Translation</h4>
                                                <h6 class="card-subtitle">Request</h6>
                                                <textarea id="mymce" name="input"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
				                <div class="row">
				                    <div class="col-12">
				                        <div class="card">
				                            <div class="card-body">
				                                <h4 class="card-title">Translation</h4>
				                                <h6 class="card-subtitle">Response</h6>
				                                <textarea id="mymce" name="output"></textarea>
				                            </div>
				                        </div>
				                    </div>
                                </div>
                                <div class="row">
				                    <div class="col-lg-12 col-md-6">
				                        <div class="card">
				                            <div class="card-body">
				                                <h4 class="card-title">Upload a documnet</h4>
				                                <label for="input-file-now">if you do not want to type . you can upload file</label>
				                                <input type="file" name="output_file" id="input-file-now" class="dropify" />
				                            </div>
				                        </div>
				                    </div>
				                </div>
                                <button type="submit"  class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer"> © <?php echo date('Y')?> Material Pro Admin by wrappixel.com </footer>
    </div>
</div>

<script src="../assets/plugins/tinymce/tinymce.min.js"></script>
    <script>
    $(document).ready(function() {

        if ($("#mymce").length > 0) {
            tinymce.init({
                selector: "textarea#mymce",
                theme: "modern",
                height: 200,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",

            });
        }
    });
    </script>
    <!-- jQuery file upload -->
<?php include_once('include/footer.php');?>
<script src="../assets/plugins/dropify/dist/js/dropify.min.js"></script>
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>
