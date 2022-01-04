<?php global $theme_option; ?>	
	
<div class="blog-big-wrapper grey-section">
	<div class="big-post-date"><span>&#xf073;</span> <?php the_time(get_option( 'date_format' )); ?></div> 
	<?php $link_audio = get_post_meta(get_the_ID(),'_cmb_link_audio', true);?>
	<?php $rtext = get_post_meta(get_the_ID(),'_cmb_right_text', true);?>
	<?php if($link_audio !=''){?>
		<iframe height="166" width="100%" scrolling="no" frameborder="no" src="<?php echo esc_url(get_post_meta(get_the_ID(), "_cmb_link_audio", true));?>&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_artwork=true"></iframe>
	<?php }?>
	<?php if(!$link_audio){ echo "<div class='bot-50'></div>" };?>
	<a href="<?php the_permalink(); ?>" class="animsition-link"><h5><?php the_title(); ?></h5></a>
	<p><?php echo htmlspecialchars_decode($rtext); ?></p>
	<a href="<?php the_permalink(); ?>" class="animsition-link"><div class="link-to-post"><?php if($theme_option['read_more']) { echo esc_attr($theme_option['read_more']); }else{ echo 'read more'; }?> <span>&#xf178;</span></div></a>
	<div class="bottom-autor-text"><span>&#xf040;</span><?php the_author(); ?> / <span>&#xf086;</span><?php comments_number( '0', '1', '%' ); ?></div>
</div>