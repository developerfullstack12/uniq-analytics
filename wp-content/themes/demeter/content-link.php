<div class="blog-big-wrapper link-big-post grey-section">
	<?php 
	$text = get_post_meta(get_the_ID(),'_cmb_link_text', true);
	$link = get_post_meta(get_the_ID(),'_cmb_link_out', true);
	?>
	<?php if($text !=''){?>
		<a href="<?php the_permalink(); ?>" class="animsition-link"><h5><span>&#xf08e;</span><?php the_title();?></h5></a>
	<?php }?>
	
	<div class="bottom-autor-text"><span>&#xf040;</span><?php the_author(); ?> / <span>&#xf086;</span><?php comments_number( '0', '1', '%' ); ?> / <span>&#xf073;</span> <?php the_time(get_option( 'date_format' )); ?></div>
</div>	