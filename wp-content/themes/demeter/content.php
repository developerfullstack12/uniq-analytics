<?php  global $theme_option; ?>

<div class="blog-big-wrapper grey-section">
	<div class="big-post-date"><span>&#xf073;</span> <?php the_time(get_option( 'date_format' )); ?></div>
	<?php the_post_thumbnail(); ?><?php if(!get_the_post_thumbnail()) echo "<div class='bot-50'></div>";?>
	<a href="<?php the_permalink(); ?>" class="animsition-link"><h5><?php the_title(); ?></h5></a>
	<?php $ex = get_post_meta(get_the_ID(),'_cmb_ex_post', true);?>
	<p><?php echo htmlspecialchars_decode($ex); ?></p>
	<a href="<?php the_permalink(); ?>" class="animsition-link"><div class="link-to-post"><?php if($theme_option['read_more']) { echo esc_attr($theme_option['read_more']); }else{ echo 'read more'; }?> <span>&#xf178;</span></div></a>
	<div class="bottom-autor-text"><span>&#xf040;</span><?php the_author(); ?> / <span>&#xf086;</span><?php comments_number( '0', '1', '%' ); ?></div>
</div>
	