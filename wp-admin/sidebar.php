 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
           <img src="<?php echo admin_path?>images/logo.png" class="img-circle" alt="User Image">
        </div>
        <div class="info">
         <p style="margin-bottom: 3px;"><?php echo $_SESSION[md5('apiadminname')]?></p>
          <a href="<?php echo admin_path?>dashboard.php?logout=yes">Sign out</a>
        </div>
      </div>
     
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
          <a href="<?php echo admin_path?>dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        
        <li >
          <a href="<?php echo admin_path?>contactus.php">
            <i class="fa fa-phone"></i> <span>contactus</span>
          </a>
        </li>
        
        <li >
          <a href="<?php echo admin_path?>subscriber.php">
            <i class="fa fa-phone"></i> <span>Subscriber</span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="gallery-cat-list.php">
            <i class="fa fa-laptop"></i>
            <span>Gallery Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="gallery-cat-add.php"><i class="fa fa-circle-o"></i> Add</a></li>
            <li><a href="gallery-cat-list.php"><i class="fa fa-circle-o"></i> View</a></li>
          </ul>
        </li>
        
        
        <li class="treeview">
          <a href="photo-list.php">
            <i class="fa fa-laptop"></i>
            <span>Photos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="photo-add.php"><i class="fa fa-circle-o"></i> Add</a></li>
            <li><a href="photo-list.php"><i class="fa fa-circle-o"></i> View</a></li>
          </ul>
        </li>
        
        
        <li class="treeview">
          <a href="product-list.php">
            <i class="fa fa-laptop"></i>
            <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="product-add.php"><i class="fa fa-circle-o"></i> Add</a></li>
            <li><a href="product-list.php"><i class="fa fa-circle-o"></i> View</a></li>
          </ul>
        </li>
        <!--
        
        <li>
          <a href="contactus.php">
            <i class="fa fa-laptop"></i>
            <span>Contact US</span>
          </a>
        </li>
        
        <li>
          <a href="club.php">
            <i class="fa fa-laptop"></i>
            <span>Join Club</span>
          </a>
        </li>
        
        <li>
          <a href="team.php">
            <i class="fa fa-laptop"></i>
            <span>Joined Team</span>
          </a>
        </li>
        
        <li>
          <a href="subscriber.php">
            <i class="fa fa-laptop"></i>
            <span>Subscriber</span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="photo-list.php">
            <i class="fa fa-laptop"></i>
            <span>Photos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="photo-add.php"><i class="fa fa-circle-o"></i> Add</a></li>
            <li><a href="photo-list.php"><i class="fa fa-circle-o"></i> View</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="quotes-list.php">
            <i class="fa fa-laptop"></i>
            <span>Quotes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="quotes-add.php"><i class="fa fa-circle-o"></i> Add</a></li>
            <li><a href="quotes-list.php"><i class="fa fa-circle-o"></i> View</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="youtube-list.php">
            <i class="fa fa-laptop"></i>
            <span>Youtube</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="youtube-add.php"><i class="fa fa-circle-o"></i> Add</a></li>
            <li><a href="youtube-list.php"><i class="fa fa-circle-o"></i> View</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="media-list.php">
            <i class="fa fa-laptop"></i>
            <span>Media</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="media-add.php"><i class="fa fa-circle-o"></i> Add</a></li>
            <li><a href="media-list.php"><i class="fa fa-circle-o"></i> View</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="latest-tweet-list.php">
            <i class="fa fa-laptop"></i>
            <span>Tweets</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="latest-tweet.php"><i class="fa fa-circle-o"></i> Add</a></li>
            <li><a href="latest-tweet-list.php"><i class="fa fa-circle-o"></i> View</a></li>
          </ul>
        </li>
        
        -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>