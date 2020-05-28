<?php
include_once 'config.php';
// error_reporting(E_ALL);
// ini_set("display_errors",1);
    $request_id = $_GET['rn'];
    if(!empty($_POST)){
        $role_id = $_POST['role_id'];
        mysqli_query($conn,"update users set role_id='{$role_id}' where id=$request_id");
        $location=$site_url."/instant_quote.php";
        if($role_id==3){
            $location=$site_url."/admin";
        }
        header("Location: ".$location);
        exit();
    }
include_once 'header.php';
?>

<section>
<div class="container">
    <div class="page-wrapper">
        <div class="row"><h4>Please Select Registration Type</h4></div>
        <div class="row">
            <div class="col-md-8">
                <div class="card card-body">
                    <form method="post">
                        <input type="hidden" name="request_id" value="<?php echo $_GET['rn'];?>">
                        <div class="row">
                            <div class="col-4">
                                <div class="input-radio input-radio--innerlabel">
                                    
                                    <input id="radio-1" type="radio" name="role_id" value="3" />
                                    <label for="radio-1">Translator</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-radio input-radio--innerlabel">
                                    <input id="radio-2" type="radio" name="role_id" value="2" />
                                    <label for="radio-2">Customer</label>
                                </div>
                            </div>                           
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"></h4>
                                        <button type="submit" class="btn btn-info">Finish</button></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<?php include_once 'footer.php'?>
