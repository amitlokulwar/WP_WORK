<?php
/**
 * Template Name: Portfolio Page
 *
 */
 ?>
<?php get_header(); ?>

<div class="fancy_header">
            <div class="container">
                <div class="page_title_wrap text-center">
                    <div class="page_title_head">
                        <h1>Portfolio</h1>
                        <h2>what we done till now</h2>
                    </div>
                </div>
                <span class="fancy_header_overlay"></span>
            </div>
        </div>



<section id="portfolio">
            <div class="container">
                <div class="main_wrapper">
                    <div class="max_title text-center">
                        <h2>Our <strong>Projects</strong></h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                           <!-- <a href="<?php echo get_category_link( $cat->term_id ) ?>"></a> -->
                            <?php
                            $args = array(
                            
                            'taxonomy' => 'category',
                           'include'   => '11,12,13,14,15',
                            'order'    => 'ASC'
                            );

                            $cats = get_categories($args);
                           
                          // print_r($cats);
                            foreach($cats as $cat) {
                            ?>
                            
                            <li data-filter=".filter-<?php echo $cat->slug; ?>"> <?php echo $cat->name; ?></li>
                           
                          
                            <?php
                            }
                            ?>
                            
                            
                            <!-- <li data-filter=".filter-app-dev">App Developement</li>
                            <li data-filter=".filter-e-com">E-Commerece</li>
                            <li data-filter=".filter-ui-ux">UI/UX</li>
                            <li data-filter=".filter-digi-mar">Digital Marketting</li>
                            <li data-filter=".filter-seo">SEO</li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="row portfolio-container">
                          <?php
                    $args = array( 'posts_per_page' => -1, 'post_type' => 'projects', 'order' => 'ASC' , 'orderby' => 'date');
                    $myposts = get_posts( $args );
                   

                    foreach ( $myposts as $post ) : setup_postdata( $post ); 
                        $site_url = get_post_meta( $post->ID, 'site_url', true ); 
                        $title= $post->title;
                        $cats_post= get_the_category( $post->ID );
                        $featured_img_url = get_the_post_thumbnail_url($post->ID,'full'); 
                        
                        foreach($cats_post as $cat) :
                        $cat_slug =  $cat->slug;
                        ?>
                        
                   
                        <div class="col-lg-3 col-md-6 portfolio-item filter-<?php echo  $cat_slug;?>">
                            <div class="portfolio-wrap">
                              <?php the_post_thumbnail('full', array('class' => 'img-fluid') ); ?>
                            <div class="portfolio-info">
                                <div>
                                    <a href="<?php echo $featured_img_url;?>" data-lightbox="portfolio" data-title="<?php echo  $title;?>" class="link-preview" title="Preview"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a target="_blank" href="<?php echo  $site_url?>" class="link-details" title="More Details"><i class="fa fa-external-link" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            </div>
                        </div>
                 
                    <?php 
                        endforeach; 
                        endforeach; 
                    ?>
                    </div>
                </div>
            </div>
        </section>

    
<?php get_footer(); ?>        