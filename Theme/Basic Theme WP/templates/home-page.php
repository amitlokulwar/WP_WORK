<?php
/**
 * Template Name: Home Page
 *
 */
 ?>
<?php get_header(); ?>

<!--slider section starts-->
        <!--==========================
            Hero Rotator
        ============================-->
   
        
        <div class="bannercontainer">
            <div class="banner">
               <ul>
                    <?php
                        $args = array( 'posts_per_page' => -1, 'post_type' => 'slider', 'order' => 'ASC' , 'orderby' => 'date');
                        $myposts = get_posts( $args );
                        foreach ( $myposts as $post ) : setup_postdata( $post ); 
                            $featured_img_url = get_the_post_thumbnail_url($post->ID,'full'); 
                            $title= $post->title;
                        ?>
                    <li>
                        <img src="<?php echo $featured_img_url;?>" alt="<?php echo $title;?>"> 
                    </li>
                    <?php endforeach; ?>
                    
                </ul>
            </div>
        </div>
      
        
        <!-- #hero rotator -->
    
    <!--slider section ends-->

    <!--==========================
            Who We Are
        ============================-->
        <section class="who_we_are">
            <div class="container">
                <div class="main_wrapper">
                    <div class="max_title text-center wow fadeInUp">
                        <h2>Engraft. <strong>Who We Are</strong></h2>
                    </div>
                    <div class="row wow fadeInUp">
                        <div class="col-lg-6 col-sm-12">
                            <div class="section_wrapper">
                                <div class="section_title">
                                    <h2>We Are Engraft Solutions</h2>
                                </div>
                                <div class="section_content">
                                    <p>We are a group of technical people with experience in open source technologies. We really feel that all our experiences are preparing us to build a product that makes the end users life easier than before, probably someday we would make a mark in the world but that doesn’t mean that we will not do anything before we have our Eureka moment. Our collective experience only grows when we interact and work with more like minded people believing in creating a product that solves problems.</p>
                                    <p>We like to be happy with what we do every day at work when we leave home to enjoy time with our family. It bothers us and we introspect if we don’t contribute positively towards the cause even for a day.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <figure class="img_decorator">
                                <img src="<?php bloginfo('template_directory'); ?>/images/who-we-are.jpg" alt="Who We Are">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- #hero rotator -->

        <!--==========================
            Our Services
        ============================-->
        <section class="ourServices wow fadeInUp">
            <div class="container">
                <div class="main_wrapper">
                    <div class="max_title text-center">
                        <h2>Our <strong>Services</strong></h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="content_element">
                                <div class="content_wrapper">
                                    <p class="text-center">We offer a wide range of Digital Marketing &amp; Web Development Services. Our services include web design, web development, Social media marketing, SEO &amp; more.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="content_wrappr icon_right">
                                <div class="service_box text-right">
                                    <i class="fa fa-desktop" aria-hidden="true"></i>
                                    <h4>Website <strong>Design</strong></h4>
                                    <p>EasyDesign will work with you to find out what you need from your website</p>
                                    <a href="" class="rounded_btn">Read More</a>
                                </div>

                                <div class="service_box text-right">
                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>
                                    <h4>Web <strong>Developement</strong></h4>
                                    <p>EasyDesign will work with you to find out what you need from your website</p>
                                    <a href="" class="rounded_btn">Read More</a>
                                </div>

                                <div class="service_box text-right">
                                    <i class="fa fa-line-chart" aria-hidden="true"></i>
                                    <h4>Seo <strong>Optimization</strong></h4>
                                    <p>EasyDesign will work with you to find out what you need from your website</p>
                                    <a href="" class="rounded_btn">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <figure>
                                <img src="<?php bloginfo('template_directory'); ?>/images/px-dn05.jpg" alt="services Image" />
                            </figure>
                        </div>
                        <div class="col-md-3">
                            <div class="content_wrappr icon_left">
                                <div class="service_box">
                                    <i class="fa fa-apple" aria-hidden="true"></i>
                                    <h4>IOS <strong>Applications</strong></h4>
                                    <p>EasyDesign will work with you to find out what you need from your website</p>
                                    <a href="" class="rounded_btn">Read More</a>
                                </div>

                                <div class="service_box">
                                    <i class="fa fa-android" aria-hidden="true"></i>
                                    <h4>Pay <strong>Per Click</strong></h4>
                                    <p>EasyDesign will work with you to find out what you need from your website</p>
                                    <a href="" class="rounded_btn">Read More</a>
                                </div>

                                <div class="service_box">
                                    <i class="fa fa-mouse-pointer" aria-hidden="true"></i>
                                    <h4>Pay <strong>Per Click</strong></h4>
                                    <p>EasyDesign will work with you to find out what you need from your website</p>
                                    <a href="" class="rounded_btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- #our services -->

        <!--==========================
            Counters
        ============================-->
        <section class="counters mb_parallax_container">
            <div class="container">
                <div class="main_wrapper">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="content_wrappr">
                                <div class="counter_box" id="counter">
                                    <div class="counter_Txt">
                                        <i class="fa fa-certificate" aria-hidden="true"></i>
                                        <span class="counter">80</span>
                                        <span>%</span>
                                        <h5>Satisfied Customers</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="content_wrappr">
                                <div class="counter_box" id="counter">
                                    <div class="counter_Txt">
                                        <i class="fa fa-trophy" aria-hidden="true"></i>
                                        <span class="counter">180</span>
                                        <span>%</span>
                                        <h5>Winning Awards</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="content_wrappr">
                                <div class="counter_box" id="counter">
                                    <div class="counter_Txt">
                                        <i class="fa fa-file-code-o" aria-hidden="true"></i>
                                        <span class="counter">70</span>
                                        <span>%</span>
                                        <h5>Winning Awards</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="content_wrappr">
                                <div class="counter_box" id="counter">
                                    <div class="counter_Txt">
                                        <i class="fa fa-certificate" aria-hidden="true"></i>
                                        <span class="counter">50</span>
                                        <span>%</span>
                                        <h5>Winning Awards</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- #counters -->

        <!--==========================
            Why Choose Us
        ============================-->
        <section class="why_choose_us ">
            <div class="container">
                <div class="main_wrapper">
                    <div class="max_title text-center wow fadeInUp">
                        <h2>Why Choose <strong> Us</strong></h2>
                    </div>
                    <div class="row wow fadeInUp">
                        <div class="col-lg-6 col-md-6">
                            <div class="content_wrappr">
                                <figure class="img_decorator">
                                    <img src="<?php bloginfo('template_directory'); ?>/images/trans-pg-px6.jpg" alt="Why Choose Us image" />
                                </figure>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <ul class="list-unstyled">
                                <li>The Websites we make are optimized</li>
                                <li>Our Agile Methodology of development is proven and effective</li>
                                <li>Strong focus on business requirements and ROI</li>
                                <li>No compromise on quality of website</li>
                                <li>We’re quick to response to the clients need</li>
                                <li>Delivering services and solutions right for your business
                                    </li>
                                <li>No worrying as we have an expert web development team</li>
                                <li>Our web developers are experienced and certified</li>
                                <li>We build responsive websites that auto adapt to device screens</li>
                                <li>Extensive project management experience</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- #why choose us -->

        <!--==========================
            Our Process
        ============================-->
        <section class="our_process">
            <div class="">
                <div class="main_wrapper">
                    <div class="max_title text-center wow fadeInUp">
                        <h2>Our<strong> Process</strong></h2>
                    </div>
                    <div class="process_wrap wow fadeInUp">
                        <div class="process_items">
                            <div class="process_item">
                                <div class="text_wrap">
                                    <h4><strong>Planning</strong></h4>
                                    <p>Understanding what you want out of your site and how do you plant to implement it.</p>
                                </div>
                                <span>1</span>
                                <div class="icon_wrapper">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                            <div class="process_item">
                                <div class="text_wrap">
                                    <h4><strong>Design</strong></h4>
                                    <p>We will Create a beautiful, affordable website design for your creative marketing project.</p>
                                </div>
                                <span>2</span>
                                <div class="icon_wrapper">
                                    <i class="fa fa-laptop"></i>
                                </div>
                            </div>
                            <div class="process_item">
                                <div class="text_wrap">
                                    <h4><strong>Development</strong></h4>
                                    <p>We develop content management systems for clients who need more than just the basics.</p>
                                </div>
                                <span>3</span>
                                <div class="icon_wrapper">
                                    <i class="fa fa-keyboard-o"></i>
                                </div>
                            </div>
                            <div class="process_item">
                                <div class="text_wrap">
                                    <h4><strong>Launch</strong></h4>
                                    <p>After successful testing the product is delivered / deployed to the customer for their use.</p>
                                </div>
                                <span>4</span>
                                <div class="icon_wrapper">
                                    <i class="fa fa-paper-plane"></i>
                                </div>
                            </div>
                            <div class="process_item">
                                <div class="text_wrap">
                                    <h4><strong>Maintenance</strong></h4>
                                    <p>It is an important step which makes sure that your site works with efficiency all the time.</p>                                    
                                </div>
                                <span>1</span>
                                <div class="icon_wrapper">
                                    <i class="fa fa-shield"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- #our process -->

        <!--==========================
            Key Technologies
        ============================-->
        <section class="key_techno wow fadeInUp">
            <div class="container">
                <div class="main_wrapper">
                    <div class="max_title text-center">
                        <h2>Key <strong> Technologies</strong></h2>
                    </div>
                    <div class="techno_wrappr owl-carousel owl-theme">
                        <?php
                        $args = array( 'posts_per_page' => -1, 'post_type' => 'technologies', 'order' => 'ASC' , 'orderby' => 'date');
                        $myposts = get_posts( $args );
                        foreach ( $myposts as $post ) : setup_postdata( $post ); 
                        ?>
                        <div class="item">
                            <figure>
                                <?php the_post_thumbnail('full', array('class' => 'img-responsive') ); ?>
                            </figure>
                        </div>
                         <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- #key technologies -->

        <!--==========================
            Get Started
        ============================-->
        <section class="get_started wow fadeInUp">
            <div class="container">
                <div class="main_wrapper">
                    <div class="title_wrap text-center">
                        <h2><strong>Lets Get Started <br />your project</strong></h2>
                        <p>We will help you to achieve your goals and to grow your business.</p>
                        <a href="" class="btn btn_one">Start Now</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- #get started -->

        <!--==========================
            They Say
        ============================-->
        <section class="they_say wow fadeInUp">
            <div class="container">
                <div class="main_wrapper">
                    <div class="max_title text-center">
                        <h2>They <strong> Say</strong></h2>
                    </div>
                    <div class="testi_wrapr owl-carousel owl-theme">

                        <?php
                        $args = array( 'posts_per_page' => -1, 'post_type' => 'testimonials', 'order' => 'ASC' , 'orderby' => 'date');
                        $myposts = get_posts( $args );
                        foreach ( $myposts as $post ) : setup_postdata( $post ); 
                        
                        $position = get_post_meta($post->ID,'position',true);
                        $content_post = get_post($post->ID);
                        $content = $content_post->post_content;
                        ?>
                        <div class="tm_item">
                            <figure>
                                <?php the_post_thumbnail('full', array('class' => 'img-responsive') ); ?>
                            </figure>
                            <p class="tm_content"><?php echo $content;?></p>
                            <h4 class="tm_name"><?php the_title(); ?></h4>
                            <p class="tm_job"><?php echo  $position;?></p>
                        </div>
                         <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- #they say -->

        <!--==========================
            Portfolio
        ============================-->
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
                        <!-- <div class="col-lg-3 col-md-6 portfolio-item filter-e-com" data-wow-delay="0.1s">
                            <div class="portfolio-wrap">
                            <img src="<?php bloginfo('template_directory'); ?>/images/portfolio/web3.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <div>
                                    <a href="<?php bloginfo('template_directory'); ?>/images/portfolio/web3.jpg" class="link-preview" data-lightbox="portfolio" data-title="Web 3" title="Preview"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="#" class="link-details" title="More Details"><i class="fa fa-external-link" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            </div>
                        </div>
                
                        <div class="col-lg-3 col-md-6 portfolio-item filter-web-dev" data-wow-delay="0.2s">
                            <div class="portfolio-wrap">
                            <img src="<?php bloginfo('template_directory'); ?>/images/portfolio/web2.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <div>
                                    <a href="<?php bloginfo('template_directory'); ?>/images/portfolio/web2.jpg" class="link-preview" data-lightbox="portfolio" data-title="App 2" title="Preview"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="#" class="link-details" title="More Details"><i class="fa fa-external-link" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            </div>
                        </div>
                
                        <div class="col-lg-3 col-md-6 portfolio-item filter-app-dev">
                            <div class="portfolio-wrap">
                            <img src="<?php bloginfo('template_directory'); ?>/images/portfolio/app1.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <div>
                                    <a href="<?php bloginfo('template_directory'); ?>/images/portfolio/app1.jpg" class="link-preview" data-lightbox="portfolio" data-title="Card 2" title="Preview"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="#" class="link-details" title="More Details"><i class="fa fa-external-link" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            </div>
                        </div>
                
                        <div class="col-lg-3 col-md-6 portfolio-item filter-e-com" data-wow-delay="0.1s">
                            <div class="portfolio-wrap">
                            <img src="<?php bloginfo('template_directory'); ?>/images/portfolio/web2.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <div>
                                    <a href="<?php bloginfo('template_directory'); ?>/images/portfolio/web2.jpg" class="link-preview" data-lightbox="portfolio" data-title="Web 2" title="Preview"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="#" class="link-details" title="More Details"><i class="fa fa-external-link" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            </div>
                        </div>
                
                        <div class="col-lg-3 col-md-6 portfolio-item filter-web-dev" data-wow-delay="0.2s">
                            <div class="portfolio-wrap">
                            <img src="<?php bloginfo('template_directory'); ?>/images/portfolio/web1.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <div>
                                    <a href="<?php bloginfo('template_directory'); ?>/images/portfolio/web1.jpg" class="link-preview" data-lightbox="portfolio" data-title="App 3" title="Preview"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="#" class="link-details" title="More Details"><i class="fa fa-external-link" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            </div>
                        </div>
                
                        <div class="col-lg-3 col-md-6 portfolio-item filter-app-dev">
                            <div class="portfolio-wrap">
                            <img src="<?php bloginfo('template_directory'); ?>/images/portfolio/app2.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <div>
                                    <a href="<?php bloginfo('template_directory'); ?>/images/portfolio/app2.jpg" class="link-preview" data-lightbox="portfolio" data-title="Card 1" title="Preview"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="#" class="link-details" title="More Details"><i class="fa fa-external-link" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            </div>
                        </div>
                
                        <div class="col-lg-3 col-md-6 portfolio-item filter-app-dev" data-wow-delay="0.1s">
                            <div class="portfolio-wrap">
                            <img src="<?php bloginfo('template_directory'); ?>/images/portfolio/card2.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <div>
                                    <a href="<?php bloginfo('template_directory'); ?>/images/portfolio/card2.jpg" class="link-preview" data-lightbox="portfolio" data-title="Card 3" title="Preview"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="#" class="link-details" title="More Details"><i class="fa fa-external-link" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            </div>
                        </div> -->
                
                      <!--   <div class="col-lg-3 col-md-6 portfolio-item filter-e-com" data-wow-delay="0.2s">
                            <div class="portfolio-wrap">
                            <img src="<?php bloginfo('template_directory'); ?>/images/portfolio/web1.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <div>
                                    <a href="<?php bloginfo('template_directory'); ?>/images/portfolio/web1.jpg" class="link-preview" data-lightbox="portfolio" data-title="Web 1" title="Preview"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="#" class="link-details" title="More Details"><i class="fa fa-external-link" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>

        <!--==========================
            Blog
        ============================-->
        <section class="blog wow fadeInUp">
            <div class="">
                <div class="main_wrapper">
                    <div class="max_title text-center">
                        <h2>Latest from <strong>Blog</strong></h2>
                    </div>
                    <div class="latest_blog_content home_blog owl-carousel owl-theme">
                        <div class="item">

                    <?php 
                    $args = array( 'posts_per_page' => -1, 'post_type' => 'post', 'order' => 'ASC' , 'orderby' => 'date');
                    $myposts = get_posts( $args );
                    foreach ( $myposts as $post ) : setup_postdata( $post ); 
                    $category = get_the_category($post->ID);
                    $category_name = $category[0]->cat_name;
                    $url=get_permalink($post->ID);
                    ?>
                            <div class="thumbnail_wrapper">
                                <figure>
                                <?php echo get_the_post_thumbnail( $post->ID, 'full', array( 'class' => 'img-responsive' ) );?>
                                </figure>
                                <div class="category">
                                    <a href="#"><?php echo $category_name;?></a>
                                </div>
                                <div class="date">
                                    <a href="#">
                                        <span class="month">Dec</span>
                                        <span class="date">2</span>
                                        <span class="year">2019</span>
                                    </a>
                                </div>
                            </div>
                            <div class="post_entry_content">
                                <h3><?php echo $post->post_title;?></h3>
                                <a href="<?php echo  $url;?>" class=rounded_btn>Read More</a>
                            </div>
                        </div>
                         <?php  endforeach;?>
                        
                </div>
            </div>
        </section>
        <!-- #blog -->
        
    </div>

    
<?php get_footer(); ?>