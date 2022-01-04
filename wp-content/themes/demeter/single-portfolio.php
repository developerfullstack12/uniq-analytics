<?php
 global $theme_option;
 if($theme_option['ajax_work'] == 'no'){
 get_header(); 
?>
	<!-- TOP SECTION
    ================================================== -->
	<div class="section home boxed-width" id="top">	
		<?php $image_thumbnail = get_post_meta(get_the_ID(),'_cmb_image_thumbnail', true);?>
			
		<div class="parallax-project" <?php if($image_thumbnail !=''){ ?>style="background-image: url('<?php echo esc_url( $image_thumbnail ); ?>');" <?php } ?> ></div>		
		<a href="#project" data-gal="m_PageScroll2id" data-ps2id-offset="30"><div class="scroll-down"><span>&#xf175;</span> <?php _e('scroll', 'demeter') ?></div></a>			
	</div>	

	<!-- PROJECT SECTION
    ================================================== -->
	<div class="section boxed-width grey-background padding-top-bottom" id="project">
		<?php while (have_posts()) : the_post()?>
			<?php the_content(); ?>
		<?php endwhile; ?>
		<div class="container">				
			<div class="twelve columns" data-scroll-reveal="enter bottom move 100px over 0.6s after 0.2s">	
				<div class="section-separator-line"></div>
			</div>	
			<div class="twelve columns" data-scroll-reveal="enter bottom move 100px over 0.6s after 0.2s">	
				<div class="project-arrows-wrapper">
					<?php echo previous_post_link('%link', __('<div class="project-arrow-left"><p>prev</p></div>', 'demeter'), $post->max_num_pages); ?>
					<?php echo next_post_link('%link', __('<div class="project-arrow-right"><p>next</p></div>', 'demeter'), $post->max_num_pages); ?>					
				</div>
			</div>	
		</div>							
	</div>

<?php get_footer(); }else{?>

<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]>
<!--><html class="no-js" lang="en"><!--<![endif]-->
<head>	
</head>
<body>	
	
	<!-- PROJECT SECTION
    ================================================== -->
    <div class="single-project-ajax white-background section-padding-bottom">
    	<?php while (have_posts()) : the_post()?>
			<?php the_content(); ?>
		<?php endwhile; ?>
    </div>		
		
<!-- End Document
================================================== -->
</body>
</html>
<?php } ?>