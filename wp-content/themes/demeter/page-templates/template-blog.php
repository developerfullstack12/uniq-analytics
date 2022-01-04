<?php
/**
 * Template Name: Blog Grid
 */
global $theme_option;
get_header(); ?>



	<?php if(have_posts()) { ?>

	<?php while (have_posts()) : the_post()?>

		<?php the_content(); ?>

	<?php endwhile; wp_reset_query();?>

	<?php }else{ ?>

		<div class="padding-top"></div>

	<?php } ?>



	<div class="section boxed-width grey-background padding-bottom" id="blogscroll">

	

		<div class="clear"></div>

		

		<div class="blog-box-wrapper">

			<?php 
				$i=0;
				$args = array(    

					'paged' => $paged,

					'post_type' => 'post',

					);

				$wp_query = new WP_Query($args);

				while ($wp_query -> have_posts()): $wp_query -> the_post(); 

			?> 		

					

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

		</div>

		



		<div class="clear"></div>

		

		<div class="container">		

			<div class="twelve columns">	

				<div class="section-separator-line"></div>

			</div>

			

			<div class="twelve columns">	

				<div class="project-arrows-wrapper">

				

				<?php if(get_previous_posts_link()) { ?><div class="project-arrow-left"><p><?php previous_posts_link( __('Prev', 'demeter'), 0 ); ?></p></div><?php } ?>

				<?php if(get_next_posts_link()) { ?><div class="project-arrow-right"><p><?php next_posts_link( __('Next', 'demeter') ); ?></p></div><?php } ?>

				</div>

			</div>

		</div>



	</div>	



<?php get_footer(); ?>