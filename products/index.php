<?php include '../header.php';?>
<section class="inner-bnr relative" data-overlay="6" style="background-image:url(<?php echo base_path?>images/pg-cover.jpg)">
        <div class="inner-banner-in transform-center z-5">
			<h1 class="slab yellow fs-54">Products
				<img src="<?php echo base_path?>images/title-bg.png" class="transform-center" alt="Image"/>
        	</h1>
            <ul class="inner-bnr-nav mt-75">
                <li><a href="<?php echo base_path?>">Home </a></li>
                <li>Products</li>
            </ul>
        </div>
</section> 
<section class="shop-list bg-light-white pt-90 pb-90">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <?php
                        $product = $db->query("select *from da_product order by id desc");
                        if($product->size()>0)
                        {
                            while($product_row = $product->fetch())
                            {
                                ?>
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="each-shop-list">
                                        <div class="shop-imag">
                                            <?php
                                            $product_image = $db->query("select *from product_images where producttid = '".$product_row['id']."'");
                                            $product_image_row = $product_image->fetchAsso();
                                            ?>
                                            <img src="<?php echo base_path?>post_images/<?php echo $product_image_row['file_name'];?>" alt="Image">
                                        </div>
                                        <div class="shop-text">
                                            <h4 class="slab"><a href="<?php echo base_path?>products/<?php echo $product_row['name_url'];?>/"><?php echo $product_row['name'];?></a></h4>
                                             
                                            <div class="d-flex shp-buttons justify-content-center">
                                                <div>
                                                    <a href="<?php echo base_path?>products/<?php echo $product_row['name_url'];?>/" class="btn add-cart">View </a>
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
                        
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="each-shop-list">
                                <div class="shop-imag">
                                    <img src="<?php echo base_path?>images/products/gift-pack.jpg" alt="Image">
                                   
                                </div>
                                <div class="shop-text">
                                    <h4 class="slab"><a href="<?php echo base_path?>products-singal/">Buddha Bracelet</a></h4>
                                    
                                    <div class="d-flex shp-buttons justify-content-center">
                                        <div>
                                            <a href="<?php echo base_path?>products-singal/" class="btn add-cart">View </a>
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
                <div class="col-lg-3">
                     <div class="sidebar-outer h-100">
                     	<div class="side-box">
                            <form action="#" class="relative mt-10 mb-10">
                                <input type="text" class="form-control input-white search-white shadow-5" id="search2" placeholder="Search here.."> <i class="fas fa-search transform-v-center transition-4 yellow"></i>
                            </form>
                        </div>
                        <div class="side-box ">
                            <h4 class="f-700 slab mb-20 mt-5">Popular Products</h4>
                            <div class="popular-posts mb-10">
                                <?php
                                $product = $db->query("select *from da_product  order by rand() limit 3 ");
                                if($product->size()>0)
                                {
                                    while($product_row = $product->fetch())
                                    {
                                        ?>
                                    <a href="<?php echo base_path?>products/<?php echo $product_row['name_url'];?>/" class="popular-post d-flex align-items-center">
                                        <div class="popular-post-img mr-20">
                                            <?php
                                            $product_image = $db->query("select *from product_images where producttid = '".$product_row['id']."'");
                                            $product_image_row = $product_image->fetchAsso();
                                            ?>
                                            <img src="<?php echo base_path?>post_images/<?php echo $product_image_row['file_name'];?>" alt="Image">
                                            <div class="full-cover bg-yellow-op-8 transition-4"> <i class="fas fa-external-link-alt transform-center"></i>
                                            </div>
                                        </div>
                                        <div class="popular-post-text">
                                            <p class="mb-5 fs-16 f-700 slab"><?php echo $product_row['name'];?></p> 
                                        </div>
                                    </a>
                                
                                <?php
                                    }
                                }
                                else
                                {
                                ?>
                                <a href="<?php echo base_path?>products-singal/" class="popular-post d-flex align-items-center">
                                    <div class="popular-post-img mr-20">
                                        <img src="<?php echo base_path?>images/products/gift-pack.jpg" alt="Image">
                                        <div class="full-cover bg-yellow-op-8 transition-4"> <i class="fas fa-external-link-alt transform-center"></i>
                                        </div>
                                    </div>
                                    <div class="popular-post-text">
                                        <p class="mb-5 fs-16 f-700 slab">Black Lace Choker</p> <span class="fs-12 f-700 yellow">$33.00</span>
                                    </div>
                                </a>
                                <a href="<?php echo base_path?>products-singal/" class="popular-post d-flex align-items-center">
                                    <div class="popular-post-img mr-20">
                                        <img src="<?php echo base_path?>images/products/gift-pack.jpg" alt="Image">
                                        <div class="full-cover bg-yellow-op-8 transition-4"> <i class="fas fa-external-link-alt transform-center"></i>
                                        </div>
                                    </div>
                                    <div class="popular-post-text">
                                        <p class="mb-5 fs-16 f-700 slab">Black Lace Choker</p> <span class="fs-12 f-700 yellow">$33.00</span>
                                    </div>
                                </a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
              
            </div>
        </div>
    </section>
<?php include '../footer.php';?>