<?php

get_header();

$show_default_title = get_post_meta( get_the_ID(), '_et_pb_show_title', true );

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>

<div id="main-content">
	<?php
		if ( et_builder_is_product_tour_enabled() ):
			// load fullwidth page in Product Tour mode
			while ( have_posts() ): the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>
					<div class="entry-content">
					<?php
						the_content();
					?>
					</div> <!-- .entry-content -->

				</article> <!-- .et_pb_post -->

		<?php endwhile;
		else:
	?>
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
				/**
				 * Fires before the title and post meta on single posts.
				 *
				 * @since 3.18.8
				 */
				do_action( 'et_before_post' );
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>
					<?php if ( ( 'off' !== $show_default_title && $is_page_builder_used ) || ! $is_page_builder_used ) { ?>
						<div class="et_post_meta_wrapper">
							<h1 class="entry-title"><?php the_title(); ?></h1>

						<?php
							if ( ! post_password_required() ) :

								et_divi_post_meta();

								$thumb = '';

								$width = (int) apply_filters( 'et_pb_index_blog_image_width', 1080 );

								$height = (int) apply_filters( 'et_pb_index_blog_image_height', 675 );
								$classtext = 'et_featured_image';
								$titletext = get_the_title();
								$alttext = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
								$thumbnail = get_thumbnail( $width, $height, $classtext, $alttext, $titletext, false, 'Blogimage' );
								$thumb = $thumbnail["thumb"];

								$post_format = et_pb_post_format();

								if ( 'video' === $post_format && false !== ( $first_video = et_get_first_video() ) ) {
									printf(
										'<div class="et_main_video_container">
											%1$s
										</div>',
										et_core_esc_previously( $first_video )
									);
								} else if ( ! in_array( $post_format, array( 'gallery', 'link', 'quote' ) ) && 'on' === et_get_option( 'divi_thumbnails', 'on' ) && '' !== $thumb ) {
									print_thumbnail( $thumb, $thumbnail["use_timthumb"], $alttext, $width, $height );
								} else if ( 'gallery' === $post_format ) {
									et_pb_gallery_images();
								}
							?>

							<?php
								$text_color_class = et_divi_get_post_text_color();

								$inline_style = et_divi_get_post_bg_inline_style();

								switch ( $post_format ) {
									case 'audio' :
										$audio_player = et_pb_get_audio_player();

										if ( $audio_player ) {
											printf(
												'<div class="et_audio_content%1$s"%2$s>
													%3$s
												</div>',
												esc_attr( $text_color_class ),
												et_core_esc_previously( $inline_style ),
												et_core_esc_previously( $audio_player )
											);
										}

										break;
									case 'quote' :
										printf(
											'<div class="et_quote_content%2$s"%3$s>
												%1$s
											</div> <!-- .et_quote_content -->',
											et_core_esc_previously( et_get_blockquote_in_content() ),
											esc_attr( $text_color_class ),
											et_core_esc_previously( $inline_style )
										);

										break;
									case 'link' :
										printf(
											'<div class="et_link_content%3$s"%4$s>
												<a href="%1$s" class="et_link_main_url">%2$s</a>
											</div> <!-- .et_link_content -->',
											esc_url( et_get_link_url() ),
											esc_html( et_get_link_url() ),
											esc_attr( $text_color_class ),
											et_core_esc_previously( $inline_style )
										);

										break;
								}

							endif;
						?>
					</div> <!-- .et_post_meta_wrapper -->
				<?php  } ?>

					<div class="entry-content">
						
					<?php
						$postid=get_the_ID();

						$books_id= get_post_meta($postid, "book-dropdown", true);
						//echo $books_id;
						if(strlen($books_id)>0)
						{
							$books_data= explode(',', $books_id);
							//print_r($books_data);
							$writer_name = get_post_meta( $books_data[0], 'writer_name', true );

							$amazon_url = get_post_meta( $books_data[0], 'amazon_url', true );

							$book_star_rating = get_post_meta( $books_data[0], 'book_star_rating', true );

							echo '<br><h1>Books Extra Fields</h1><br> Writer Name: '.$writer_name;		
							echo '<br> Amazon Url: '.$amazon_url;		
							echo '<br>Book Star Rating: '.$book_star_rating;	
						}

						$podcast_id= get_post_meta($postid, "podcast-dropdown", true);
						//echo $podcast_id;
						if(strlen($podcast_id)>0)
						{
							$podcast_data= explode(',', $podcast_id);
							//print_r($books_data);
							$podcast_name = get_post_meta( $podcast_data[0], 'podcast_name', true );

							$podcast_host_name = get_post_meta( $podcast_data[0], 'podcast_host_name', true );

							$podcast_favourite_episod = get_post_meta( $podcast_data[0], 'podcast_favourite_episod', true );

							$podcast_must_listen_episod = get_post_meta( $podcast_data[0], 'podcast_must_listen_episod', true );

							$podcast_url = get_post_meta( $podcast_data[0], 'podcast_url', true );

							

							echo '<br><h1>Podcast Extra Fields</h1><br> Podcast Name: '.$podcast_name;		
							echo '<br> Podcast Url: '.$podcast_url;		
							echo '<br> Podcast Favourite Episod: '.$podcast_favourite_episod;		
							echo '<br> Podcast Must Listen Episod: '.$podcast_must_listen_episod;		
							echo '<br>Host Name: '.$podcast_host_name;	
						}

						$audio_books_id= get_post_meta($postid, "audio-book-dropdown", true);
						//echo $audio_books_id;
						if(strlen($audio_books_id)>0)
						{
							$books_data= explode(',', $audio_books_id);
							//print_r($books_data);
							$writer_name = get_post_meta( $books_data[0], 'audio_writer_name', true );

							$amazon_url = get_post_meta( $books_data[0], 'audio_book_url', true );

							$book_star_rating = get_post_meta( $books_data[0], 'audio_book_star_rating', true );

							echo '<br><h1>Audio Books Extra Fields</h1><br> Writer Name: '.$writer_name;		
							echo '<br> Amazon Url: '.$amazon_url;		
							echo '<br>Book Star Rating: '.$book_star_rating;	
						}
						//die();

						do_action( 'et_before_content' );

						the_content();

						wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'Divi' ), 'after' => '</div>' ) );
					?>
					</div> <!-- .entry-content -->
					<div class="et_post_meta_wrapper">
					<?php
					if ( et_get_option('divi_468_enable') === 'on' ){
						echo '<div class="et-single-post-ad">';
						if ( et_get_option('divi_468_adsense') !== '' ) echo et_core_intentionally_unescaped( et_core_fix_unclosed_html_tags( et_get_option('divi_468_adsense') ), 'html' );
						else { ?>
							<a href="<?php echo esc_url(et_get_option('divi_468_url')); ?>"><img src="<?php echo esc_attr(et_get_option('divi_468_image')); ?>" alt="468" class="foursixeight" /></a>
				<?php 	}
						echo '</div> <!-- .et-single-post-ad -->';
					}

					/**
					 * Fires after the post content on single posts.
					 *
					 * @since 3.18.8
					 */
					do_action( 'et_after_post' );

						if ( ( comments_open() || get_comments_number() ) && 'on' === et_get_option( 'divi_show_postcomments', 'on' ) ) {
							comments_template( '', true );
						}
					?>
					</div> <!-- .et_post_meta_wrapper -->
				</article> <!-- .et_pb_post -->

			<?php endwhile; ?>
			</div> <!-- #left-area -->

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
	<?php endif; ?>
</div> <!-- #main-content -->

<?php

get_footer();
