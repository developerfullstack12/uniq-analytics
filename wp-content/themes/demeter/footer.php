<?php
/**
 * The template for displaying the footer
 */
 global $theme_option; 
?>

	<div class="footer-wrap">			
		<a href="#top" data-gal="m_PageScroll2id" data-ps2id-offset="30"><div class="arrow-up">&#xf106;</div></a>					
		<div class="footer-social">	
			<div class="container">
				<div class="twelve columns">
					<?php if($theme_option['twitter']) { ?>
						<a target="_blank" href="<?php echo esc_url($theme_option['twitter']); ?>" data-dummy="twitter">twitter</a>
					<?php } ?>
					<?php if($theme_option['github']) { ?>
						<a target="_blank" href="<?php echo esc_url($theme_option['github']); ?>" data-dummy="github">github</a>
					<?php } ?>
					<?php if($theme_option['dribbble']) { ?>
						<a target="_blank" href="<?php echo esc_url($theme_option['dribbble']); ?>" data-dummy="dribbble">dribbble</a>
					<?php } ?>
					<?php if($theme_option['linkedin']) { ?>
						<a target="_blank" href="<?php echo esc_url($theme_option['linkedin']); ?>" data-dummy="linkedin">linkedin</a>
					<?php } ?>
					<?php if($theme_option['behance']) { ?>
						<a target="_blank" href="<?php echo esc_url($theme_option['behance']); ?>" data-dummy="behance">behance</a>
					<?php } ?>
					<?php if($theme_option['facebook']) { ?>
						<a target="_blank" href="<?php echo esc_url($theme_option['facebook']); ?>" data-dummy="facebook">facebook</a>
					<?php } ?>
					<?php if($theme_option['instagram']) { ?>
						<a target="_blank" href="<?php echo esc_url($theme_option['instagram']); ?>" data-dummy="instagram">instagram</a>
					<?php } ?>
					<?php if($theme_option['youtube']) { ?>
						<a target="_blank" href="<?php echo esc_url($theme_option['youtube']); ?>" data-dummy="youtube">youtube</a>
					<?php } ?>
					<?php if($theme_option['skype']) { ?>
						<a href="<?php echo esc_attr($theme_option['skype']); ?>" data-dummy="skype">skype</a>
					<?php } ?>
					<?php if($theme_option['google']) { ?>
						<a target="_blank" href="<?php echo esc_url($theme_option['google']); ?>" data-dummy="google +">google +</a>
					<?php } ?>
					<?php if($theme_option['social_extend']!=''){ 
                        echo htmlspecialchars_decode( do_shortcode( $theme_option['social_extend'] ) );
                    } ?> 
				</div>
			</div>
		</div>
		<?php if($theme_option['footer_text']) { ?>
			<div class="footer-credit">	
				<div class="container">
					<div class="twelve columns">
						<p><?php echo htmlspecialchars_decode($theme_option['footer_text']); ?></p>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
	
<?php wp_footer(); ?>
</body>
</html>