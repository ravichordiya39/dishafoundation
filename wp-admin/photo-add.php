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
    $catid= $db->securityNew($_POST['catid']);
          //changes
     if( $catid == '')
    {
        $_SESSION['error']  = 'Category required.';
        adheader('photo-add.php');
        exit();
    }      
     else
     {
          $allowTypes = array('jpg','png','jpeg','gif','JFIF','jfif');
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
                          $insertValuesSQL .= "('".$fileName."', '".$catid."', '".date('Y-m-d H:i:s')."'),";
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
                  $insert = $db->query("INSERT INTO images (file_name, catid, dtdate) VALUES $insertValuesSQL");
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
          adheader('photo-add.php');
          //changes  
     }
    
}
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Photo
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Photo</a></li>
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
              <h3 class="box-title">Photo</h3>
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
                  
                <div class="form-group">
                  <label for="exampleInputEmail1">Category Name</label>
                  <select class="form-control" name="catid" id="catid">
                  <?php
                $query=$db->query("select * from da_gallerycat");
                while($rows  = $query->fetchAsso())
                {?>
                <option value="<?php echo $rows['id'];?>"><?php echo $rows['name'];?></option>
                <?php
                }?>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Featured Image</label>
                  <input type="file" name="files[]" multiple >
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

<?php
function removechar($str)
		{
        $str = strtolower(str_replace(' ', '-', $str));

        $str = preg_replace("/[^a-zA-Z0-9-]/", "", $str);
		return $str.'-'.rand(0000,9999);
		}
?>
