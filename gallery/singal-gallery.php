<?php include '../header.php';
$url = $_GET['post'];
$single_post = $db->query("SELECT *from da_gallerycat where name_url = '".$url."'");
if($single_post->size()>0)
{
    $row = $single_post->fetchAsso();
    $catid = $row['id'];
?>
<section class="inner-bnr relative" data-overlay="6" style="background-image:url(<?php echo base_path?>images/pg-cover.jpg)">
        <div class="inner-banner-in transform-center z-5">
			<h1 class="slab yellow fs-54"><?php echo $row['name'];?>
				<img src="<?php echo base_path?>images/title-bg.png" class="transform-center" alt="Image"/>
        	</h1>
            <ul class="inner-bnr-nav mt-75">
                <li><a href="<?php echo base_path?>">Home </a></li>
                <li><a href="<?php echo base_path?>gallery/">Gallery </a></li>
                <li><?php echo $row['name'];?></li>
            </ul>
        </div>
</section> 
<section class="gallery pt-90 pb-90">
        <div class="container">
            <div class="row portfolio-filter">
                <?php
                $data = $db->query("SELECT *from images where catid = '".$catid."'");
                if($data->size()>0)
                {
                    while($image = $data->fetch())
                    {
                        ?>
                        <div class="grid-item grid-sizer col-lg-4 col-md-6">
                            <div class="portfolio-item">
                                <div class="portfolio-item-img">
                                    <img src="<?php echo base_path?>post_images/<?php echo $image['file_name'];?>" alt="<?php echo $row['name'];?>">
                                    <div class="portfolio-overlay transition-4">
                                        <div class="transform-center">
                                            <a href="<?php echo base_path?>post_images/<?php echo $image['file_name'];?>" class="gallery-links">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                           <!-- <h4 class="slab"><?php echo $row['name'];?></h4> !-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                else
                {
                ?>
                <div class="grid-item grid-sizer col-lg-4 col-md-6 " >
                    <div class="portfolio-item">
                        <div class="portfolio-item-img">
                            <img src="<?php echo base_path?>images/gallery/image.jpg" alt="">
                            <div class="portfolio-overlay transition-4">
                                <div class="transform-center">
                                    <a href="<?php echo base_path?>images/gallery/image.jpg" class="gallery-links">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <h4 class="slab">Lorem Ipsum Dolor</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
<?php
}
else
{
    cheader("404/");
}
include '../footer.php';?>