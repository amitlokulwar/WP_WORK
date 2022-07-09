<?php
/**
 * Template Name: Services Page
 *
 */
 ?>
<?php get_header(); ?>


<div class="fancy_header">
            <div class="container">
                <div class="page_title_wrap text-center">
                    <div class="page_title_head">
                        <h1>Services</h1>
                        <h2>what we do</h2>
                    </div>
                </div>
                <span class="fancy_header_overlay"></span>
            </div>
        </div>
        <!--==========================
            Services
        ============================-->
        <section class="services">
            <div class="container">
                <div class="main_wrapper">
                    <div class="row">
                    	<?php 
                    $args = array( 'posts_per_page' => -1, 'post_type' => 'services', 'order' => 'ASC' , 'orderby' => 'date');
                    $myposts = get_posts( $args );
                    foreach ( $myposts as $post ) : setup_postdata( $post ); 
                    $category = get_the_category($post->ID);
                    $category_name = $category[0]->cat_name;
                    $url=get_permalink($post->ID);
                    $content_post = get_post($post->ID);
                    $content = $content_post->post_content;
                    ?>
                        <div class="col-md-4 col-sm-12">
                            <div class="content_wrapper">
                                <article class="icon_box">
                                    <a href="#">
                                        <i class="text-center fa fa-desktop" aria-hidden="true"></i>
                                    </a>
                                    <div class="section_content">
                                        <h4><?php the_title(); ?></h4>
                                        <p><?php echo $content;?></p>
                                        <a href="<?php echo $url;?>" class="rounded_btn">Read More</a>
                                    </div>
                                </article>
                            </div>
                        </div>
                         <?php endforeach; ?>
                       
                    </div>
                </div>
            </div>
        </section>
        <!-- #services -->

    
<?php get_footer(); ?>        