<?php include '../header.php';
$url = $_GET['post'];
$single_post = $db->query("SELECT *from da_product where name_url = '".$url."'");
if($single_post->size()>0)
{
    $row = $single_post->fetchAsso();
    $productid = $row['id'];
?>
<section class="inner-bnr relative" data-overlay="6" style="background-image:url(<?php echo base_path?>images/pg-cover.jpg)">
        <div class="inner-banner-in transform-center z-5">
			<h1 class="slab yellow fs-54">Products
				<img src="<?php echo base_path?>images/title-bg.png" class="transform-center" alt="Image"/>
        	</h1>
            <ul class="inner-bnr-nav mt-75">
                <li><a href="<?php echo base_path?>">Home </a></li>
                <li><a href="<?php echo base_path?>products/">Products </a></li>
              
                <li><?php echo $row['name'];?></li>
            </ul>
        </div>
</section> 

<section class="prdt-detail bg-light-white pt-90 pb-30">
        <?php
        $product_image = $db->query("select *from product_images where producttid = '".$productid."'");
        //$product_image_row = $product_image->fetchAsso();
        ?>
        <img src="<?php echo base_path?>/images/dot-ylo.png" alt="Image" class="shop-dots-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="prdt-slider">
                        <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                            <?php
                            if($product_image->size()>0)
                            {
                            while($product_image_row = $product_image->fetch())
                            {
                                ?>
                                <li data-thumb="<?php echo base_path?>post_images/<?php echo $product_image_row['file_name'];?>" alt="Image">
                                <img src="<?php echo base_path?>post_images/<?php echo $product_image_row['file_name'];?>" alt="Image" />
                                </li>
                                <?php
                            }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="prdt-info-right pl-20 pl-md-00 mt-md-35">
                        <div class="prdt-detail-head">
                            <h1 class="mb-10 yellow f-900 slab fs-40 lh-13"><?php echo $row['name'];?></h1>
						</div>
                        <div class="profuct-descr">
                          <?php echo $row['content'];?>
                            
                            <div class="rate-detail">
                                <table class="table table-bordered mb-0">
                                    <tbody>
                                         <?php
                                         if($row['set_contents'] != "")
                                         {
                                         ?>
                                         <tr>
                                            <th scope="row">Set Contents</th>
                                             <td><?php echo $row['set_contents'];?></td>
                                         </tr>
                                         <?php
                                         }
                                         ?>
                                         
                                         <?php
                                         if($row['size'] != "")
                                         {
                                         ?>
                                        <tr>
                                            <th scope="row">Size</th>
                                             <td><?php echo $row['size'];?></td>
                                          </tr>
                                         <?php
                                         }
                                         ?>
                                          
                                         <?php
                                         if($row['quality_and_fabric'] != "")
                                         {
                                         ?> 
                                        <tr>
                                              <th scope="row">Quality and Fabric</th>
                                               <td><?php echo $row['quality_and_fabric'];?></td>
                                        </tr>
                                        <?php
                                         }
                                         ?>
                                        
                                         <?php
                                         if($row['color'] != "")
                                         {
                                         ?>
                                        <tr>
                                              <th scope="row">Color</th>
                                              <td><?php echo $row['color'];?></td>
                                        </tr>
                                         <?php
                                         }
                                         ?>
                                         
                                         <?php
                                         if($row['dimension'] != "")
                                         {
                                         ?>  
                                        <tr>
                                              <th scope="row">Dimension</th>
                                               <td><?php echo $row['dimension'];?></td>
                                           </tr>
                                         <?php
                                         }
                                         ?>
                                        
                                         <?php
                                         if($row['other_features'] != "")
                                         {
                                         ?>
                                         <tr>
                                            <th scope="row">Other Features</th>
                                             <td><?php echo $row['other_features'];?></td>
                                         </tr>
                                         <?php
                                         }
                                         ?>
                                         
                                         <?php
                                         if($row['material'] != "")
                                         {
                                         ?>
                                        <tr>
                                            <th scope="row">Material</th>
                                             <td><?php echo $row['material'];?></td>
                                        </tr>
                                        <?php
                                         }
                                         ?>
                                        
                                        <?php
                                         if($row['capacity'] != "")
                                         {
                                         ?>
                                        <tr>
                                              <th scope="row">Capacity</th>
                                               <td><?php echo $row['capacity'];?></td>
                                           </tr>
                                        
                                        <?php
                                         }
                                         ?>
                                         
                                         <?php
                                         if($row['compartment_closure'] != "")
                                         {
                                         ?>
                                        <tr>
                                              <th scope="row">Compartment Closure</th>
                                              <td><?php echo $row['compartment_closure'];?></td>
                                           </tr>
                                           <?php
                                         }
                                         ?>
                                          
                                          <?php
                                         if($row['pattern'] != "")
                                         {
                                         ?> 
                                        <tr>
                                              <th scope="row">Pattern</th>
                                               <td><?php echo $row['pattern'];?></td>
                                        </tr>
                                        <?php
                                         }
                                         ?>
                                        
                                        <?php
                                         if($row['containers'] != "")
                                         {
                                         ?>
                                        <tr>
                                              <th scope="row">Containers</th>
                                               <td><?php echo $row['containers'];?></td>
                                           </tr>
                                           
                                         <?php
                                         }
                                         ?>
                                         
                                         <?php
                                         if($row['closure_type'] != "")
                                         {
                                         ?>
                                        <tr>
                                              <th scope="row">Closure Type</th>
                                               <td><?php echo $row['closure_type'];?></td>
                                           </tr>  
                                           
                                           <?php
                                         }
                                         ?>
                                         
                                         <?php
                                         if($row['ruling'] != "")
                                         {
                                         ?>
                                        <tr>
                                              <th scope="row">Ruling</th>
                                               <td><?php echo $row['ruling'];?></td>
                                           </tr> 
                                           
                                           <?php
                                         }
                                         ?>
                                         
                                         <?php
                                         if($row['no_of_pages'] != "")
                                         {
                                         ?>
                                        <tr>
                                              <th scope="row">NO. of Pages</th>
                                               <td><?php echo $row['no_of_pages'];?></td>
                                           </tr>
                                           <?php
                                         }
                                         ?>
                                         
                                         <?php
                                         if($row['utility'] != "")
                                         {
                                         ?>
                                         
                                        <tr>
                                              <th scope="row">Utility</th>
                                               <td><?php echo $row['utility'];?></td>
                                           </tr>
                                           <?php
                                         }
                                         ?>
                                         
                                         <?php
                                         if($row['type'] != "")
                                         {
                                         ?>
                                         
                                        <tr>
                                              <th scope="row">Type</th>
                                               <td><?php echo $row['type'];?></td>
                                           </tr>
                                           
                                           <?php
                                         }
                                         ?>
                                         
                                         <?php
                                         if($row['photo_area'] != "")
                                         {
                                         ?>
                                         
                                        <tr>
                                              <th scope="row">Photo Area</th>
                                               <td><?php echo $row['photo_area'];?></td>
                                           </tr>   
                                           
                                           <?php
                                         }
                                         ?>
                                         
                                         
                                         
                                      </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="hr-1 bg-black opacity-1 mt-20 mb-20"></div>
                    </div>
                </div>
                <!--<div class="col-lg-12">
                    <div class="prdt-tabs row pt-40 pt-md-25">
                        <div class="col-md-12">
                            <div class="prdt-tab mt-5">
                                <ul class="nav nav-pills justify-content-center justify-content-sm-start">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#Description">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#Detail">Detail</a>
                                    </li>
                                   
                                </ul>

                                
                                <div class="tab-content pt-20">
                                    <div id="Description" class="container tab-pane active p-0">
                                        <h4 class="mb-10 lh-13 slab">Yellow Cotton T-Shirt</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin suscipit enim nec semper consectetur. Mauris ullamcorper nibh ac nisi consectetur, at fringilla nisl commodo. Duis lacinia augue vitae lectus luctus, vel aliquet tellus bibendum. Maecenas a diam leo. In at erat sem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Curabitur venenatis malesuada lacus, vitae rutrum purus tincidunt a. Proin sodales dictum libero. </p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin suscipit enim nec semper consectetur. Mauris ullamcorper nibh ac nisi consectetur, at fringilla nisl commodo. Duis lacinia augue vitae lectus luctus, vel aliquet tellus bibendum. Maecenas a diam leo. In at erat sem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Curabitur venenatis malesuada lacus, vitae rutrum purus tincidunt a. Proin sodales dictum libero. </p>
                                        <ul class="blue-dot-list">
                                            <li>Aenean vehicula molestie aliquet. Maecenas sed pretium</li>
                                            <li>Nulla malesuada id ipsum quis vestibulum. In in sapien</li>
                                            <li>Fringilla, gravida nisl sit amet, consequat turpis.</li>
                                            <li>Praesent at gravida dolor. Duis tristique sit amet lacus</li>
                                        </ul>

                                    </div>
                                    <div id="Detail" class="container tab-pane fade">
                                        <div class="row align-items-center">
                                            <div class="">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin suscipit enim nec semper consectetur. Mauris ullamcorper nibh ac nisi consectetur, at fringilla nisl commodo. Duis lacinia augue vitae lectus luctus, vel aliquet tellus bibendum. Maecenas a diam leo. In at erat sem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Curabitur venenatis malesuada lacus, vitae rutrum purus tincidunt a. Proin sodales dictum libero. </p>
                                                <table class="table table-bordered mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Name</th>
                                                            <td>Stacked Bracelets Set for Women</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Weight</th>
                                                            <td>100 g</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Width</th>
                                                            <td>.1 Mtr</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Height</th>
                                                            <td>.1 Mtr</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Consectetur</th>
                                                            <td>adipiscing elit</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </section>
<section class="blog-area bg-light-white pb-30 pt-20">
        <div class="container">
            <div class="row align-items-center mb-30">
                <div class="col-md-9 col-sm-12 text-center text-md-left">
                    <div class="line-heads left">
                        <h1 class=" related-head fs-25 slab">Related Products</h1>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 text-center text-md-right">
                    <div class="blog-nav mt-sm-15">
                        <a href="" class="prdt-nav-left mr-10 green"> <i class='fas fa-long-arrow-alt-left'></i>
                        </a>
                        <a href="" class="prdt-nav-right green"> <i class='fas fa-long-arrow-alt-right'></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel owl-theme relative-prdt-slider">
                        
                        <?php
                        $product = $db->query("select *from da_product  order by rand() limit 20 ");
                        if($product->size()>0)
                        {
                            while($product_row = $product->fetch())
                            {
                                ?>
                            <div class="item">
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
                                                <a href="<?php echo base_path?>products/<?php echo $product_row['name_url'];?>/" class="btn view-more">VIEW</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
						
                        <?php
                        }
                        }
                        ?>
                      
                    </div>
                </div>
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