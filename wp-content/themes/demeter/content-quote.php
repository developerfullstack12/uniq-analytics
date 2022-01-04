<div class="blog-big-wrapper quote-big-post grey-section">
	<a href="<?php the_permalink(); ?>" class="animsition-link"><h5>
	<?php 
	$quote = get_post_meta(get_the_ID(),'_cmb_quote_text', true);
	$autor = get_post_meta(get_the_ID(),'_cmb_quote_autor', true);
	?>
	<?php if($quote !=''){?>
		"<?php echo get_post_meta(get_the_ID(), "_cmb_quote_text", true);?>"
	<?php }?>
	</h5></a>
	<?php if($autor !=''){?>
		<p>- <?php echo get_post_meta(get_the_ID(), "_cmb_quote_autor", true);?></p>
	<?php }?>
	<div class="bottom-autor-text"><span>&#xf040;</span><?php the_author(); ?> / <span>&#xf086;</span><?php comments_number( '0', '1', '%' ); ?> / <span>&#xf073;</span> <?php the_time(get_option( 'date_format' )); ?></div>
</div>	