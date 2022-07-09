<?php get_header(); ?>
    
    <div class="outer_wrap">
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
        <div class="breadcrumbs img-v1 text-center">
            <div class="container">
                <h1><?php the_title(); ?></h1>
                <!-- <p>Unify is a clean and fully responsive</p> -->
            </div>
        </div>
        <div class="container innr_page">
            <div class="row">
                <div class="col-md-3">
                    <div class="">
                        <?php the_post_thumbnail('full', array('class' => 'img-responsive') );?>
                    </div>
                </div>
                <div class="col-md-9">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
        <?php endwhile; ?><?php endif; ?>
    </div>
    

    
 
<?php get_footer(); ?>