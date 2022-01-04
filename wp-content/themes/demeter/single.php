<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Demeter
 * @since Demeter 1.0
 */
global $theme_option;
get_header();
?>
		
	<?php if ($theme_option['single_layout'] == 'fullwidth') { ?>
		<?php while (have_posts()): the_post(); ?> 
			<?php $rtext = get_post_meta(get_the_ID(),'_cmb_right_text', true);?>	
			<div class="section boxed-width grey-background padding-posts" id="top">	
				
				<div class="container">	
					<div class="<?php if($rtext) echo 'six'; else echo 'twelve';?> columns">	
						<div class="post-top-text">	
							<h4><?php the_title(); ?></h4>
							<div class="sub-line"></div>
							<div class="sub-text"><?php the_time(get_option( 'date_format' )); ?>, <span><?php _e('Author: ','demeter'); ?></span> <?php the_author(); ?></div>
						</div>		
					</div>
					<?php if($rtext) { ?>

					<div class="six columns">	
						<div class="post-top-text">
						<?php echo htmlspecialchars_decode($rtext); ?>
						</div>
					</div>	

					<?php } the_content(); ?>	

					
					<div class="twelve columns">
						<div class="post-content-com-top grey-section">	
							<p><?php _e('Comments ','demeter'); ?> <span>(<?php comments_number( '0', '1', '%' ); ?>)</span></p>
						</div>
						<?php comments_template();?>
					</div>
					

					<div class="twelve columns">	
						<div class="section-separator-line"></div>
					</div>	
					<div class="twelve columns">	
						<div class="project-arrows-wrapper">
							<?php $prev_post = get_adjacent_post(false, '', true); $next_post = get_adjacent_post(false, '', false); ?>
							<?php if($prev_post) { ?><a href="<?php echo get_permalink($prev_post->ID); ?>"><div class="project-arrow-left"><p><?php _e('prev','demeter'); ?></p></div></a><?php } ?>
							<?php if($next_post) { ?><a href="<?php echo get_permalink($next_post->ID); ?>"><div class="project-arrow-right"><p><?php _e('next','demeter'); ?></p></div></a><?php } ?>
						</div>
					</div>	
				</div>		
			</div>	
		<?php endwhile; wp_reset_query(); ?>	

	<?php }else{ ?>

		<div class="section boxed-width grey-background padding-posts" id="top">		
			<div class="container">
				<div class="eight columns">
				<?php while (have_posts()): the_post(); ?> 
					<?php $format = get_post_format($post->ID); ?>
					<div class="blog-post blog-big-wrapper grey-section" id="blog-single">
						<?php if($format=='image'){?>
							<?php if ( has_post_thumbnail() ) { ?>
								<div class="item">
									<img alt="<?php the_title(); ?>" src="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id()));?>"/>
								</div>	
							<?php }?>
						<?php }elseif($format=='gallery'){?>
						<?php
							$gallery = get_post_gallery( get_the_ID(), false );
							if(isset($gallery['ids'])){ ?>
							<!-- Gallery -->
							<div class="project-image-wrapper">					
								<div id="owl-post-slider" class="owl-carousel owl-theme">
								<?php
									$gallery_ids = $gallery['ids'];
									$img_ids = explode(",",$gallery_ids);
									foreach( $img_ids AS $img_id ){
									$image_src = wp_get_attachment_image_src($img_id,'');
								?>
									<div class="item"><img src="<?php echo esc_url($image_src[0]); ?>" alt=""></div>
								<?php } ?>
								</div>
							</div>	
						<?php } ?>
						<?php }elseif($format=='video'){?>
						<?php $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true);?>
							<?php if($link_video !=''){?>
								<div class="item">
									<div class="thevideo">
										<iframe width="1100" height="550" src="<?php echo esc_url(get_post_meta(get_the_ID(),'_cmb_link_video', true));?>" ></iframe>
									</div> 
								</div>
							<?php }?>
						<?php }elseif($format == 'audio'){?>
							<?php $link_audio = get_post_meta(get_the_ID(),'_cmb_link_audio', true);?>
							<?php if($link_audio !=''){?>
								<div class="audio-player">
									<iframe height="166" scrolling="no" frameborder="no" src="<?php echo esc_url(get_post_meta(get_the_ID(), "_cmb_link_audio", true));?>&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_artwork=true"></iframe>
								</div>
							<?php }?>
						<?php }else{?>
							<?php if ( has_post_thumbnail() ) { ?>
								<div class="item">
									<img alt="<?php the_title(); ?>" src="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id()));?>"/>
								</div>								
							<?php }?>
						<?php }?>	
						
						<div class="post-top-text">	
							<h4><?php the_title(); ?></h4>
							<div class="sub-line"></div>
							<div class="sub-text"><?php the_time(get_option( 'date_format' )); ?>, <span><?php _e('Author: ','demeter'); ?></span> <?php the_author(); ?></div>
						</div>
						<?php the_content();?>										
						<div class="tagcloud">
							<ul>
								<?php
									if(get_the_tag_list()) {
										echo get_the_tag_list('<li>','</li><li>','</li>');
									}
								?>
							</ul>
						</div>																		
					</div>
									
						<div class="post-content-com-top grey-section">	
							<p><?php _e('Comments ','demeter'); ?> <span>(<?php comments_number( '0', '1', '%' ); ?>)</span></p>
						</div>				
						<?php comments_template();?>
											
						<div class="section-separator-line"></div>
											
						<div class="project-arrows-wrapper">
							<?php $prev_post = get_adjacent_post(false, '', true); $next_post = get_adjacent_post(false, '', false); ?>
							<?php if($prev_post) { ?><a href="<?php echo get_permalink($prev_post->ID); ?>"><div class="project-arrow-left"><p><?php _e('prev','demeter'); ?></p></div></a><?php } ?>
							<?php if($next_post) { ?><a href="<?php echo get_permalink($next_post->ID); ?>"><div class="project-arrow-right"><p><?php _e('next','demeter'); ?></p></div></a><?php } ?>
						</div>				
					<?php endwhile; ?>					
				</div>
				<div class="four columns">
					<div class="post-sidebar">
						<?php get_sidebar();?>
					</div>				
				</div>
			</div>	
		</div>		
	<?php } ?>			

<?php get_footer(); ?>						
