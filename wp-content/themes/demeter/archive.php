<?php
/**
 * The template for displaying Archive pages
 */
global $theme_option;
get_header(); ?>

	<div class="section boxed-width grey-background padding-bottom padding-top" id="blogscroll">
		<div class="container">
			<div class="twelve columns padding-top">
				<h4>
					<?php
	                    the_archive_title();
	                    the_archive_description( '<span class="taxonomy-description">', '</span>' );
	                ?>
				</h4>
			</div>
		</div>

		<?php if ($theme_option['blog_layout'] == 'grid') { ?>
			<div class="clear"></div>
			<div class="blog-box-wrapper">
				<?php $i=0; if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>		
					<a href="<?php the_permalink(); ?>">
						<div class="blog-box-4">
							<?php $params = array( 'width' => 800, 'height' => 531 );
		          			$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params ); ?>
		          			<img src="<?php echo esc_url($image); ?>" alt="">
							<div class="<?php  if(($i % 2) == 0){echo 'mask-blog-white'; }else{echo 'mask-blog-grey'; } ?>"></div>
							<div class="post-date"><?php the_time(get_option( 'date_format' )); ?></div>
							<h6><?php the_title(); ?></h6>
							<div class="link">&#xf178;</div>
						</div>
					</a>
				<?php $i++; endwhile;?> 
					
				<?php else: ?>
					<h1><?php _e('Nothing Found Here!', 'demeter'); ?></h1>
				<?php endif; ?>		
			</div>

		<?php }else{ ?>
			<div class="container">
				<div class="eight columns">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>			
						<div id="post-<?php the_ID(); ?>" <?php post_class('blog-big-wrapper grey-section'); ?>>
							
							<?php the_post_thumbnail(); ?><?php if(!get_the_post_thumbnail()) echo "<div class='bot-50'></div>";?>
							<a href="<?php the_permalink(); ?>" class="animsition-link"><h5><?php the_title(); ?></h5></a>
							<div class="big-post-date"><span>&#xf073;</span> <?php the_time(get_option( 'date_format' )); ?></div>
							<?php $ex = get_post_meta(get_the_ID(),'_cmb_ex_post', true);?>
							<?php if($ex!=''){ ?><p><?php echo htmlspecialchars_decode($ex); ?></p><?php }else{ the_excerpt(); } ?>
							<a href="<?php the_permalink(); ?>" class="animsition-link"><div class="link-to-post"><?php if($theme_option['read_more']) { echo esc_attr($theme_option['read_more']); }else{ echo 'read more'; }?> <span>&#xf178;</span></div></a>
							<div class="bottom-autor-text"><span>&#xf040;</span><?php the_author(); ?> / <span>&#xf086;</span><?php comments_number( '0', '1', '%' ); ?></div>
						</div>
					<?php endwhile;?> 
				
					<?php else: ?>
						<h1><?php _e('Nothing Found Here!', 'demeter'); ?></h1>
					<?php endif; ?>	
				</div>
				<div class="four columns">
					<div class="post-sidebar">
						<?php get_sidebar();?>
					</div>	
				</div>	
			</div>
		<?php } ?>

		<div class="clear"></div>
		
		<div class="container">		
			<div class="twelve columns">	
				<div class="section-separator-line"></div>
			</div>
			
			<div class="twelve columns">	
				<div class="project-arrows-wrapper">				
					<?php if(get_previous_posts_link()) { ?><div class="project-arrow-left"><p><?php previous_posts_link( __('Prev', 'demeter') ); ?></p></div><?php } ?>
					<?php if(get_next_posts_link()) { ?><div class="project-arrow-right"><p><?php next_posts_link( __('Next', 'demeter') ); ?></p></div><?php } ?>
				</div>
			</div>
		</div>

	</div>	

<?php get_footer(); ?>