<?php
/**
 * Template Name: Page with Left Sidebar
 *
 */
 ?>
<?php get_header(); ?>
 
    <div id="right-content">
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
         
        <article>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
 
 
            <div class="entry">
            <?php the_content(); ?>
 
                <div class="postmetadata">
                <p><?php _e('Written by:'); ?> <?php  the_author(); ?> <?php _e('On:'); ?> <?php the_date() ?> </p>
                <p><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php edit_post_link('Edit', ' &#124; ', ''); ?></p>
                </div>
 
            </div>
 
        </article>
         
<?php endwhile; ?>
 
    <div class="navigation">
        <?php posts_nav_link(); ?>
    </div>
 
<?php endif; ?>
</div>
 
<?php get_sidebar(); ?>   
<?php get_footer(); ?>