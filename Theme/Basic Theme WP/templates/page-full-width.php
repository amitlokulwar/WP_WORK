<?php
/**
 * Template Name: Full Width Page
 *
 */
 ?>
<?php get_header(); ?>
<div class="fancy_header">
            <div class="container">
                <div class="page_title_wrap text-center">
                    <div class="page_title_head">
                        <h1><?php the_title();?></h1>
                    </div>
                </div>
                <span class="fancy_header_overlay"></span>
            </div>
</div>
 
    <div id="full-content">
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
         
        <article>
        
 
 
            <div class="entry">
            <?php the_content(); ?>
 
                <!-- <div class="postmetadata">
                <p><?php _e('Written by:'); ?> <?php  the_author(); ?> <?php _e('On:'); ?> <?php the_date() ?> </p>
                <p><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php edit_post_link('Edit', ' &#124; ', ''); ?></p>
                </div>
  -->
            </div>
 
        </article>
         
<?php endwhile; ?>
 
    <div class="navigation">
        <?php posts_nav_link(); ?>
    </div>
 
<?php endif; ?>
</div>
 
<?php get_footer(); ?>