<?php global $theme_option; ?>

<div class="blog-big-wrapper grey-section">
	<div class="big-post-date"><span>&#xf073;</span> <?php the_time(get_option( 'date_format' )); ?></div>
	<?php
		$gallery = get_post_gallery( get_the_ID(), false );
		if(isset($gallery['ids'])){ 
	?>
	<div id="owl-blog-big-slider" class="owl-carousel owl-theme">
		<?php
			$gallery_ids = $gallery['ids'];
			$img_ids = explode(",",$gallery_ids);
			foreach( $img_ids AS $img_id ){
			$image_src = wp_get_attachment_image_src($img_id,'');
		?>
		<div class="item">
			<img src="<?php echo esc_url($image_src[0]); ?>" alt="">
		</div>
		<?php } ?>		
	</div>
	<?php } ?>
	<?php if(!$gallery_ids) echo "<div class='bot-50'></div>";?>
	<a href="<?php the_permalink(); ?>" class="animsition-link"><h5><?php the_title(); ?></h5></a>
	<p><?php echo demeter_excerpt(); ?></p>
	<a href="<?php the_permalink(); ?>" class="animsition-link"><div class="link-to-post"><?php if($theme_option['read_more']) { echo esc_attr($theme_option['read_more']); }else{ echo 'read more'; }?> <span>&#xf178;</span></div></a>
	<div class="bottom-autor-text"><span>&#xf040;</span><?php the_author(); ?> / <span>&#xf086;</span><?php comments_number( '0', '1', '%' ); ?></div>
</div>
