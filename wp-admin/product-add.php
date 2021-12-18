<?php
include('header.php');
?>
<?php
if(isset($_POST['submit_btn']))
{   
    global $db;
    $status = 'NO';
    $msg  = '';
    $data = '';
    $name= $db->securityNew($_POST['name']);
    
    
    
    
    $set_contents = $db->securityNew($_POST['set_contents']);
    $size = $db->securityNew($_POST['size']);
    $quality_and_fabric = $db->securityNew($_POST['quality_and_fabric']);
    $color = $db->securityNew($_POST['color']);
    $dimension = $db->securityNew($_POST['dimension']);
    $other_features = $db->securityNew($_POST['other_features']);
    $material = $db->securityNew($_POST['material']);
    $capacity = $db->securityNew($_POST['capacity']);
    $compartment_closure = $db->securityNew($_POST['compartment_closure']);
    $pattern = $db->securityNew($_POST['pattern']);
    $containers = $db->securityNew($_POST['containers']);
    $closure_type = $db->securityNew($_POST['closure_type']);
    $ruling = $db->securityNew($_POST['ruling']);
    $no_of_pages = $db->securityNew($_POST['no_of_pages']);
    $utility = $db->securityNew($_POST['utility']);
    $type = $db->securityNew($_POST['type']);
    $photo_area = $db->securityNew($_POST['photo_area']);
    
    
    
    
    $content = $db->securityNew($_POST['content']);
    
    $name_url = removechar($name);
    
    if($name == '')
    {
        $_SESSION['error']  = 'All fields are required.';
    }
    else
    {
       
        $query  = $db->query("select id from da_product WHERE UPPER(name_url) = UPPER('".$name_url."')");
        if($query->size())
        {
          $_SESSION['error']  = 'Product Name Url already Exists';
          adheader('product-add.php');
        }
        else
        {
          $db->query("INSERT INTO da_product(`name`, `content`,  `name_url`, `dtdate`, `set_contents`, `size`, `quality_and_fabric`, `color`, `dimension`, `other_features`, `material`, `capacity`, `compartment_closure`, `pattern`, `containers`, `closure_type`, `ruling`, `no_of_pages`, `utility`, `Type`, `photo_area`) VALUES ('".$name."','".$content."','".$name_url."','".date('Y-m-d H:i:s')."', '".$set_contents."', '".$size."', '".$quality_and_fabric."', '".$color."', '".$dimension."', '".$other_features."', '".$material."', '".$capacity."', '".$compartment_closure."', '".$pattern."', '".$containers."', '".$closure_type."', '".$ruling."', '".$no_of_pages."', '".$utility."', '".$type."', '".$photo_area."')");
          $lastid=$query->insertID();

          //changes

          $allowTypes = array('jpg','png','jpeg','gif');
          $targetDir = "../post_images/";
          $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
          if(!empty(array_filter($_FILES['files']['name']))){
              foreach($_FILES['files']['name'] as $key=>$val){
                  // File upload path
                  $fileName = rand(00000,99999).'_'.basename($_FILES['files']['name'][$key]);
                  $targetFilePath = $targetDir . $fileName;
                  
                  // Check whether file type is valid
                  $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                  if(in_array($fileType, $allowTypes)){
                      // Upload file to server
                      if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                          // Image db insert sql
                          $insertValuesSQL .= "('".$lastid."', '".$fileName."', '".date('Y-m-d H:i:s')."'),";
                      }else{
                          $errorUpload .= $_FILES['files']['name'][$key].', ';
                      }
                  }else{
                      $errorUploadType .= $_FILES['files']['name'][$key].', ';
                  }
              }
              
              if(!empty($insertValuesSQL)){
                  $insertValuesSQL = trim($insertValuesSQL,',');
                  // Insert image file name into database
                  $insert = $db->query("INSERT INTO product_images (producttid, file_name, dtdate) VALUES $insertValuesSQL");
                  if($insert){
                      $errorUpload = !empty($errorUpload)?'Upload Error: '.$errorUpload:'';
                      $errorUploadType = !empty($errorUploadType)?'File Type Error: '.$errorUploadType:'';
                      $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
                      $_SESSION['msg']  = "Files are uploaded successfully.".$errorMsg;
                  }else{
                      $_SESSION['error']  = "Sorry, there was an error uploading your file.";
                  }
              }
          }else{
              $_SESSION['error']  = 'Please select a file to upload.';
          }
          adheader('product-add.php');
          //changes  
       }
    }
}
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Add</a></li>
        <li class="active">Add</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-9 col-xs-offset-1">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data">
            <?php
      $error  = !empty( $_SESSION['error'] ) ? $_SESSION['error'] : '';
      $msg  = !empty( $_SESSION['msg'] ) ? $_SESSION['msg'] : '';
      
      if($error != ''){?>
      <div class="msg" id="msgError">
        <div class="msg-error">
        <p><?php echo $error; ?></p>
        <a class="close" href="javascript:showDetails('msgError');">close</a></div>
      </div>
      <?php } 
      if($msg != ''){?>
      <div class="msg" id="msgOk">
        <div class="msg-ok">
        <p><?php echo $msg; ?></p>
        <a class="close" href="javascript:showDetails('msgOk');">close</a></div>
      </div>
      <?php } 
      unset($_SESSION['error']);
      unset($_SESSION['msg']);
      ?>
              <div class="box-body">
                  
                
                 <div class="form-group" >
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                </div>
                
                <div style="width:100%;">
                <div class="form-group" style="width:30%; display:inline-block; vertical-align:top;">
                  <label for="exampleInputEmail1">Set Contents</label>
                  <input type="text" class="form-control" name="set_contents" id="set_contents" >
                </div>
                
                <div class="form-group" style="width:30%; display:inline-block; vertical-align:top;">
                  <label for="exampleInputEmail1">Size</label>
                  <input type="text" class="form-control" name="size" id="size" >
                </div>
                
                <div class="form-group" style="width:30%; display:inline-block; vertical-align:top;">
                  <label for="exampleInputEmail1">Quality and Fabric</label>
                  <input type="text" class="form-control" name="quality_and_fabric" id="quality_and_fabric" >
                </div>
                
                <div class="form-group" style="width:30%; display:inline-block; vertical-align:top;">
                  <label for="exampleInputEmail1">Color</label>
                  <input type="text" class="form-control" name="color" id="color" >
                </div>
                
                <div class="form-group" style="width:30%; display:inline-block; vertical-align:top;">
                  <label for="exampleInputEmail1">Dimension</label>
                  <input type="text" class="form-control" name="dimension" id="dimension" >
                </div>
                
                <div class="form-group" style="width:30%; display:inline-block; vertical-align:top;">
                  <label for="exampleInputEmail1">Other Features</label>
                  <input type="text" class="form-control" name="other_features" id="Other Features" >
                </div>
                
                
                <div class="form-group" style="width:30%; display:inline-block; vertical-align:top;">
                  <label for="exampleInputEmail1">Material</label>
                  <input type="text" class="form-control" name="material" id="material" >
                </div>
                
                <div class="form-group" style="width:30%; display:inline-block; vertical-align:top;">
                  <label for="exampleInputEmail1">Capacity</label>
                  <input type="text" class="form-control" name="capacity" id="capacity" >
                </div>
                
                <div class="form-group" style="width:30%; display:inline-block; vertical-align:top;">
                  <label for="exampleInputEmail1">Compartment Closure</label>
                  <input type="text" class="form-control" name="compartment_closure" id="compartment_closure" >
                </div>
                
                
                <div class="form-group" style="width:30%; display:inline-block; vertical-align:top;">
                  <label for="exampleInputEmail1">Pattern</label>
                  <input type="text" class="form-control" name="pattern" id="pattern" >
                </div>
                
                <div class="form-group" style="width:30%; display:inline-block; vertical-align:top;">
                  <label for="exampleInputEmail1">Containers</label>
                  <input type="text" class="form-control" name="containers" id="containers" >
                </div>
                
                <div class="form-group" style="width:30%; display:inline-block; vertical-align:top;">
                  <label for="exampleInputEmail1">Closure Type</label>
                  <input type="text" class="form-control" name="closure_type" id="closure_type" >
                </div>
                
                
                <div class="form-group" style="width:30%; display:inline-block; vertical-align:top;">
                  <label for="exampleInputEmail1">Ruling</label>
                  <input type="text" class="form-control" name="ruling" id="Ruling" >
                </div>
                
                <div class="form-group" style="width:30%; display:inline-block; vertical-align:top;">
                  <label for="exampleInputEmail1">NO. of Pages</label>
                  <input type="text" class="form-control" name="no_of_pages" id="no_of_pages" >
                </div>
                
                <div class="form-group" style="width:30%; display:inline-block; vertical-align:top;">
                  <label for="exampleInputEmail1">Utility</label>
                  <input type="text" class="form-control" name="utility" id="utility" >
                </div>
                
                
                <div class="form-group" style="width:30%; display:inline-block; vertical-align:top;">
                  <label for="exampleInputEmail1">Type</label>
                  <input type="text" class="form-control" name="type" id="type" >
                </div>
                
                <div class="form-group" style="width:30%; display:inline-block; vertical-align:top;">
                  <label for="exampleInputEmail1">Photo Area</label>
                  <input type="text" class="form-control" name="photo_area" id="photo_area" >
                </div>
                
                
                
                
                
                </div>
                
                
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Description</label>
                  <textarea id="editor1" name="content" rows="10" cols="80"></textarea>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Images</label>
                  <input type="file" name="files[]" multiple required>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="submit_btn" id="submitbtn" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
         </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php
 include('footer.php');
 ?>
 <script src="<?php echo admin_path?>ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo admin_path?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1', {
  extraPlugins: 'imageuploader'
});
    //bootstrap WYSIHTML5 - text editor
  })
</script>

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor2', {
  extraPlugins: 'imageuploader'
});
    //bootstrap WYSIHTML5 - text editor
  })
</script>

<?php
function removechar($str)
		{
        $str = strtolower(str_replace(' ', '-', $str));

        $str = preg_replace("/[^a-zA-Z0-9-]/", "", $str);
		return $str.'-'.rand(0000,9999);
		}
?>
