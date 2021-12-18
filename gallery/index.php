<?php include '../header.php';?>
<section class="inner-bnr relative" data-overlay="6" style="background-image:url(<?php echo base_path?>images/pg-cover.jpg)">
        <div class="inner-banner-in transform-center z-5">
			<h1 class="slab yellow fs-54">Gallery
				<img src="<?php echo base_path?>images/title-bg.png" class="transform-center" alt="Image"/>
        	</h1>
            <ul class="inner-bnr-nav mt-75">
                <li><a href="<?php echo base_path?>">Home </a></li>
                <li>Gallery</li>
            </ul>
        </div>
</section> 
<section class="gallery pt-90 pb-90">
        <div class="container">
            <div class="row portfolio-filter">
                <div class="grid-item grid-sizer col-lg-4 col-md-6">
                    <div class="portfolio-item">
                        <div class="portfolio-item-img">
                            <img src="<?php echo base_path?>images/gallery/1/1.JPG" alt="Image">
                            <div class="portfolio-overlay transition-4">
                                <div class="transform-center">
                      
                                    <a href="<?php echo base_path?>gallery/jaipur-by-nite-city-palace-2019.php" >
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <h4 class="slab">Jaipur by Nite , City Palace 2019</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-item grid-sizer col-lg-4 col-md-6">
                    <div class="portfolio-item">
                        <div class="portfolio-item-img">
                            <img src="<?php echo base_path?>images/gallery/2/1.JPG" alt="Image">
                            <div class="portfolio-overlay transition-4">
                                <div class="transform-center">
                      
                                    <a href="<?php echo base_path?>gallery/launch-of-ms-p-n-kavoori-s-book-disha.php" >
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <h4 class="slab">Launch of Ms. P. N. Kavoori_s Book Disha - The Untold Story</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-item grid-sizer col-lg-4 col-md-6">
                    <div class="portfolio-item">
                        <div class="portfolio-item-img">
                            <img src="<?php echo base_path?>images/gallery/3/1.JPG" alt="Image">
                            <div class="portfolio-overlay transition-4">
                                <div class="transform-center">
                      
                                    <a href="<?php echo base_path?>gallery/musical-night-ek-shaam-disha-ke-naam-2018.php" >
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <h4 class="slab">Musical night Ek Shaam Disha ke Naam 2018</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-item grid-sizer col-lg-4 col-md-6">
                    <div class="portfolio-item">
                        <div class="portfolio-item-img">
                            <img src="<?php echo base_path?>images/gallery/4/1.JPG" alt="Image">
                            <div class="portfolio-overlay transition-4">
                                <div class="transform-center">
                      
                                    <a href="<?php echo base_path?>gallery/national-conference-on-disability-multiple-possibilities-and-prospects.php" >
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <h4 class="slab">National Conference on Disability Multiple Possibilities and Prospects 9th-11th nov 17</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-item grid-sizer col-lg-4 col-md-6">
                    <div class="portfolio-item">
                        <div class="portfolio-item-img">
                            <img src="<?php echo base_path?>images/gallery/5/1.JPG" alt="Image">
                            <div class="portfolio-overlay transition-4">
                                <div class="transform-center">
                      
                                    <a href="<?php echo base_path?>gallery/national-conference-on-education-and-care-of-children-with-special-needs-paradigm-shift-in-policies-and-perspectives.php" >
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <h4 class="slab">National Conference on Education and Care of children with Special Needs Paradigm Shift in Policies and Perspectives</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-item grid-sizer col-lg-4 col-md-6">
                    <div class="portfolio-item">
                        <div class="portfolio-item-img">
                            <img src="<?php echo base_path?>images/gallery/6/1.JPG" alt="Image">
                            <div class="portfolio-overlay transition-4">
                                <div class="transform-center">
                      
                                    <a href="<?php echo base_path?>gallery/silver-jubilee-celebration-march-2020.php" >
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <h4 class="slab">Silver Jubilee Celebration March 2020</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $data = $db->query("SELECT *from da_gallerycat order by id desc");
                if($data->size()>0)
                {
                    while($image = $data->fetch())
                    {
                        ?>
                        <div class="grid-item grid-sizer col-lg-4 col-md-6">
                        <div class="portfolio-item">
                            <div class="portfolio-item-img">
                                <img src="<?php echo base_path?>post_images/<?php echo $image['img'];?>" alt="Image">
                                <div class="portfolio-overlay transition-4">
                                    <div class="transform-center">
                          
                                        <a href="<?php echo base_path?>gallery/<?php echo $image['name_url'];?>/" >
                                            <i class="fas fa-plus"></i>
                                        </a>
                                        <h4 class="slab"><?php echo $image['name'];?></h4>
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
               <div class="grid-item grid-sizer col-lg-4 col-md-6">
                    <div class="portfolio-item">
                        <div class="portfolio-item-img">
                            <img src="<?php echo base_path?>images/gallery/image.jpg" alt="Image">
                            <div class="portfolio-overlay transition-4">
                                <div class="transform-center">
                      
                                    <a href="<?php echo base_path?>inner-gallery/" >
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <h4 class="slab">AAIDD International Workshop 2010</h4>
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
<?php include '../footer.php';?>