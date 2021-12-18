<?php
include('header.php');
$catid  = '';
$img = '';
$name = '';
if(isset($_GET['id']))
{
  $query  = $db->query("SELECT * FROM `da_gallerycat` WHERE id = ".intval($_GET['id']));
  $rows = $query->fetch();
  $img = $rows['img'];
  $name = $rows['name'];
}
if(isset($_POST['btnsubmit']))
{
  $name  = $db->securityNew($_POST['name']);
  $pageno = intval($_POST['pageno']);
    $pimgName=$_FILES['pimg']['name'];
    $pimgType=$_FILES['pimg']['type'];
    $pimgSize=$_FILES['pimg']['size'];
    $pimgSize=$pimgSize/1024000;
    $pimgSize=substr($pimgSize,0,4);
    $pimgSize=$pimgSize." Mb";
    $pimgTmp=$_FILES['pimg']['tmp_name'];
  if($name == '')
  {
    $_SESSION['error']  = 'All fields are required.';
  }else
  {
    $imgupd = '';

    if($pimgName != '')
    {
      $ext = pathinfo($pimgName, PATHINFO_EXTENSION);
       $allowed = array('png','jpg','jpeg','gif');
       if( ! in_array( $ext, $allowed ) ) 
       {
        $_SESSION['error']  = 'Featured Image Format Not Supported.';
        adheader('gallery-cat-edit.php');
       } 
       else
       {
         $img = rand(00000,99999).'_'.$pimgName;
         $path = '../post_images/'.$img;
         $oldfile = $db->securityNew($_POST['img']);
         $oldfile ="../post_images/".$oldfile;
         unlink($oldfile);
         move_uploaded_file($pimgTmp,$path);        
      }
    }
    $sql  = "UPDATE `da_gallerycat` SET `name`='".$name."',`img` = '".$img."' WHERE id = '".$pageno."'";
    $db->query($sql);
    $_SESSION['msg']  = 'Successfully updated';
    adheader('gallery-cat-list.php');
  }
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Category</a></li>
        <li class="active">Edit</li>
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
              <h3 class="box-title">Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data">
            <input type="hidden" name="pageno" value="<?php echo intval($_GET['id']);?>" />
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
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" name="name" id="name" value="<?php echo $name?>" placeholder="title">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Fetured Image</label>
                  <input type="file" id="pimg" name="pimg">
                  <input type="hidden" name="img" value="<?php echo $img?>" />
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="btnsubmit" class="btn btn-primary">Submit</button>
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
    $('.textarea').wysihtml5()
  })
</script>