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
    $name_url = removechar($name);
    
    $pimgName=$db->securityNew($_FILES['pimg']['name']);
    $pimgType=$_FILES['pimg']['type'];
    $pimgSize=$_FILES['pimg']['size'];
    $pimgSize=$pimgSize/1024000;
    $pimgSize=substr($pimgSize,0,4);
    $pimgSize=$pimgSize." Mb";
    $pimgTmp=$_FILES['pimg']['tmp_name'];
    if($name == '')
    {
        $_SESSION['error']  = 'All fields are required.';
    }
    else
    {
       $ext = pathinfo($pimgName, PATHINFO_EXTENSION);
       $allowed = array('png','jpg','jpeg','gif','JFIF','jfif');
       if( ! in_array( $ext, $allowed ) ) 
       {
        $_SESSION['error']  = 'Featured Image Format Not Supported';
        adheader('gallery-cat-add.php');
       }
       else
       {
        $query  = $db->query("select id from da_gallerycat WHERE UPPER(name_url) = UPPER('".$name_url."')");
        if($query->size())
        {
          $_SESSION['error']  = 'Title already Exists';
          adheader('gallery-cat-add.php');
        }
        else
        {
          $pimgName=rand(00000,99999).'_'.$pimgName;
          $img_url="../post_images/".$pimgName;
          if(move_uploaded_file($pimgTmp,$img_url))
           {
            $status = 'YES';
            $db->query("INSERT INTO da_gallerycat(name, img, name_url, dtdate) VALUES ('".$name."','".$pimgName."','".$name_url."','".date('Y-m-d H:i:s')."')");
            $lastid=$query->insertID();
            $_SESSION['msg']  = 'Successfully added';
            adheader('gallery-cat-add.php');
            }
            else
            {
            $_SESSION['error']  = 'Some Error';
            adheader('gallery-cat-add.php');
            } 
        }
       }
    }
}
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gallery Category Add
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Gallery Category</a></li>
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
              <h3 class="box-title">Gallery Category</h3>
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
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Featured Image</label>
                  <input type="file" id="pimg" name="pimg">
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
