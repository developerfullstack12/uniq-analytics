<?php
/**
 * Template Name: Full Width
 */
$page_background = get_post_meta(get_the_ID(),'_cmb_page_background', true);
get_header(); ?>
	
	
	<div class="section home boxed-width" id="top">		
		<div class="parallax-blog" <?php if($page_background != ''){ ?> style="background-image: url('<?php echo esc_url($page_background); ?>');" <?php } ?> ></div>		
		<div class="cd-intro">
			<h1 class="cd-headline loading-bar">
				<span><?php the_title(); ?></span> 				
			</h1>
		</div>	
		<div class="small-intro"><?php echo esc_attr(get_post_meta(get_the_ID(),'_cmb_page_subtitle', true));  ?></div>
		<a href="#blog-posts-content" data-gal="m_PageScroll2id" data-ps2id-offset="67"><div class="scroll-down"><span>&#xf175;</span> <?php _e('scroll', 'demeter') ?></div></a>			
	</div>			
	
	<div class="section boxed-width grey-background padding-top padding-bottom" id="blog-posts-content">
	
		<div class="clear"></div>
		<div class="container">
			<div class="twelve columns">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post(); ?>
				<div class="blog-post" id="blog-single" data-scrollreveal="enter bottom and move 50px over 1s">
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
						<?php if ( has_post_thumbnail() ) { ?>
							<?php the_post_thumbnail(); ?>
						<?php }?>
						<?php the_content();?>
						
						<?php wp_link_pages(); ?>
					</div>
				</div>
				<?php endwhile; ?>					
			</div>
		</div>	
	</div>		
<?php
get_footer();
