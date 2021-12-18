<?php
include('header.php');
if(isset($_GET['mode']) && intval($_GET['id']) > 0)
{
	$id	=	intval($_GET['id']);	
  if($_GET['img'] != '')
  {
    $oldfile=$_GET['img'];
    $oldfile="../post_images/".$oldfile;
		unlink($oldfile);
  }	
	$db->query("DELETE FROM `da_gallerycat` WHERE id = ".$id);
	$_SESSION['msg']	=	'Successfully deleted';
	adheader('gallery-cat-list.php');
}
$query	=	$db->query("SELECT * FROM `da_gallerycat` ORDER BY id DESC limit 50 ");

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category
        <small>List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Category</a></li>
        <li class="active">List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Category List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php
			$error	=	!empty( $_SESSION['error'] ) ? $_SESSION['error'] : '';
			$msg	=	!empty( $_SESSION['msg'] ) ? $_SESSION['msg'] : '';
			
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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  
                  <th>Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
		if($query->size() > 0){
		$count	=	0;
		while($rows	=	$query->fetch())
		{$count++;
            ?>
                <tr>
                <td><?php echo $count;?></td>
                  <td><?php echo $rows['name'];?></td>
                  <td><a href="<?php echo admin_path?>gallery-cat-edit.php?id=<?php echo $rows['id'];?>">Edit</a></td>
                  <td><a onclick="return confirmDelete();" href="<?php echo admin_path?>gallery-cat-list.php?mode=delete&id=<?php echo $rows['id'];?>&img=<?php echo $rows['img'];?>">Delete</a></td>
                </tr>
                <?php } 
			   } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php
 include('footer.php');
 ?>
 <link rel="stylesheet" href="<?php echo admin_path?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
 <script src="<?php echo admin_path?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo admin_path?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
function confirmDelete()
{
  var val = confirm("Are you sure you want to delete?");
  if (val)
      return true;
  else
  	return false;
}

  $(function () {
    $('#example1').DataTable();
  })
</script>