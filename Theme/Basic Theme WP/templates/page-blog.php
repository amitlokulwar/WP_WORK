<?php
/**
 * Template Name: Blog Page 
 *
 */
 ?>

<?php get_header(); ?>

<div class="fancy_header">
            <div class="container">
                <div class="page_title_wrap text-center">
                    <div class="page_title_head">
                        <h1>BLOG</h1>
                        <h2>Blogs</h2>
                    </div>
                </div>
                <span class="fancy_header_overlay"></span>
            </div>
        </div>
                <section class="services">
            <div class="container">
                <div class="main_wrapper">
                    <div class="row">
	<!-- <div id="content"> -->

        <?php query_posts('post_type=post&post_status=publish&posts_per_page=10&paged='. get_query_var('paged')); ?>

	<?php if( have_posts() ): ?>

        <?php while( have_posts() ): the_post(); ?>

	    <div id="post-<?php get_the_ID(); ?>" <?php post_class(); ?>>

        	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( array(200,220) ); ?></a>

                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                

		<?php the_excerpt(__('Continue reading »','example')); ?>

            </div><!-- /#post-<?php get_the_ID(); ?> -->

        <?php endwhile; ?>

		<div class="navigation">
			<span class="newer"><?php previous_posts_link(__('« Newer','example')) ?></span> <span class="older"><?php next_posts_link(__('Older »','example')) ?></span>
		</div><!-- /.navigation -->

	<?php else: ?>

		<div id="post-404" class="noposts">

		    <p><?php _e('None found.','example'); ?></p>

	    </div><!-- /#post-404 -->

	<?php endif; wp_reset_query(); ?>

	</div><!-- /#content -->
	</div><!-- /#content -->
	</div><!-- /#content -->
	</section>

<?php get_footer(); ?>