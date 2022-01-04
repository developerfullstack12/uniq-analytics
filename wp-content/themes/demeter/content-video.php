<?php  global $theme_option; ?>

<div class="blog-big-wrapper grey-section">
	<div class="big-post-date"><span>&#xf073;</span> <?php the_time(get_option( 'date_format' )); ?></div>
	<?php $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true);?>
	<?php if($link_video !=''){?>
		<iframe height="180" src="<?php echo esc_url(get_post_meta(get_the_ID(),'_cmb_link_video', true));?>" ></iframe>
	<?php }?>
	<?php if(!$link_video) echo "<div class='bot-50'></div>";?>
	<a href="<?php the_permalink(); ?>" class="animsition-link"><h5><?php the_title(); ?></h5></a>
	<p><?php echo demeter_excerpt(); ?></p>
	<a href="<?php the_permalink(); ?>" class="animsition-link"><div class="link-to-post"><?php if($theme_option['read_more']) { echo esc_attr($theme_option['read_more']); }else{ echo 'read more'; }?> <span>&#xf178;</span></div></a>
	<div class="bottom-autor-text"><span>&#xf040;</span><?php the_author(); ?> / <span>&#xf086;</span><?php comments_number( '0', '1', '%' ); ?></div>
</div>