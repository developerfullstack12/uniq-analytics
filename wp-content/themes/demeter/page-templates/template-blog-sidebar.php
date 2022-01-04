<?php
/**
 * Template Name: Blog With Sidebar
 */
global $theme_option;
get_header(); ?>



	<?php if(have_posts()) { ?>

	<?php while (have_posts()) : the_post()?>

		<?php the_content(); ?>

	<?php endwhile; ?>

	<?php }else{ ?>

		<div class="padding-top"></div>

	<?php } ?>



	<div style="padding-top: 50px;" class="section boxed-width grey-background padding-bottom" id="blogscroll">

	

		<div class="container">



			<div class="eight columns">

				<?php if(have_posts()) : ?>	

				<?php 

					$args = array(    

						'paged' => $paged,

						'post_type' => 'post',

						);

					$wp_query = new WP_Query($args);

					while ($wp_query -> have_posts()): $wp_query -> the_post(); 

				?> 		

					<div class="blog-big-wrapper grey-section">

						

						<?php the_post_thumbnail(); ?><?php if(!get_the_post_thumbnail()) echo "<div class='bot-50'></div>";?>

						<a href="<?php the_permalink(); ?>" class="animsition-link"><h5><?php the_title(); ?></h5></a>

						<div class="big-post-date"><span>&#xf073;</span> <?php the_time(get_option( 'date_format' )); ?></div>

						<?php $ex = get_post_meta(get_the_ID(),'_cmb_ex_post', true);?>

						<p><?php echo htmlspecialchars_decode($ex); ?></p>

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