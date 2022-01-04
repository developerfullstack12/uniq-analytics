<?php 
// Custom Heading (use)
add_shortcode('heading','heading_func');
function heading_func($atts, $content = null){
	extract(shortcode_atts(array(
		'text'		=>	'',
		'tag'		=> 	'h1',
		'size'		=>	'',
		'color'		=>	'',
		'align'		=>	'left',
	), $atts));
	
	$size1 = (!empty($size) ? 'font-size: '.$size.'px;' : '');
	$color1 = (!empty($color) ? 'color: '.$color.';' : '');
	$align1 = (!empty($align) ? 'text-align: '.$align.';' : '');
	
	$html .= '<'.$tag.' style="' . $size1 . $align1 . $color1 .'">'. $text .'</'.$tag.'>';
	
	return $html;
}


// Separator Line (use)
add_shortcode('sparator', 'separator_func');
function separator_func($atts, $content = null){
	extract(shortcode_atts(array(
		'height'	=> 	'',
	), $atts));
	ob_start(); ?>
	
	<div class="section-separator-line" <?php if($height) echo 'style="border-width: '.$height.'; "'; ?>></div>

<?php
    return ob_get_clean();
}

// Arrow Down Slider
add_shortcode('arrowdown', 'arrowdown_func');
function arrowdown_func($atts, $content = null){
	extract(shortcode_atts(array(		
		'btnlink'	=> 	'',
		'btnicon' => '',
	), $atts));	
	ob_start(); ?>

	<a href="<?php echo htmlspecialchars_decode($btnlink); ?>" data-gal="m_PageScroll2id" data-ps2id-offset="30"><div class="scroll-down-middle"><span><i class="fa fa-<?php echo esc_attr($btnicon); ?>"></i></span></div></a>		

<?php
    return ob_get_clean();
}

// Banner Static Image (use)
add_shortcode('banner_blog', 'banner_blog_func');
function banner_blog_func($atts, $content = null){
	extract(shortcode_atts(array(
		'head1'		=> 	'',
		'head2'		=>	'',
		'btntext'	=>	'',
		'btnlink'	=> 	'',
		'image'		=>	'',
		'opacity'	=> 	'',
		'overlay_color'	=> 	'',
		'extraclass' => 	'',
	), $atts));

	$img = wp_get_attachment_image_src($image,'full');
	$img = $img[0];

	$opacity1 = (!empty($opacity) ? 'opacity:'.esc_attr( $opacity ).';' : ' ');
	$overlay_color1 = (!empty($overlay_color) ? 'background:'.esc_attr( $overlay_color ).';' : ' ');

	ob_start(); ?>
	<div class="section home boxed-width <?php echo esc_attr($extraclass); ?>">
		<div class="parallax-home" <?php if($image !=''){ ?> style="background-image: url(<?php echo esc_url($img); ?>);" <?php } ?> ></div>	
		<div class="home-background-mask" <?php if($opacity or $overlay_color){ ?> style="<?php echo htmlspecialchars_decode($overlay_color1).htmlspecialchars_decode($opacity1); ?>" <?php } ?> ></div>		
		<div class="cd-intro">
			<h1 class="cd-headline loading-bar">
				<?php if($head1) { ?><span><?php echo htmlspecialchars_decode($head1); ?></span><?php } ?>
				<?php if($content) { ?>
					<span class="cd-words-wrapper"><?php echo htmlspecialchars_decode($content); ?></span>
				<?php } ?>
			</h1>
		</div>	
		<?php if($head2 != '') { ?><div class="small-intro"><?php echo htmlspecialchars_decode($head2); ?></div><?php } ?>
		<?php if($btnlink != '') { ?><a href="<?php echo esc_attr($btnlink); ?>" data-gal="m_PageScroll2id" data-ps2id-offset="67"><div class="scroll-down"><span>&#xf175;</span> <?php echo htmlspecialchars_decode($btntext); ?></div></a><?php } ?>
	</div>
<?php
    return ob_get_clean();
}

// Banner Slider (use)
add_shortcode('banner_slider', 'banner_slider_func');
function banner_slider_func($atts, $content = null){
	extract(shortcode_atts(array(
		'head1'		=> 	'',
		'head2'		=>	'',
		'btntext'	=>	'',
		'btnlink'	=> 	'',
		'gallery'		=>	'',
		'opacity'	=> 	'',
		'overlay_color'	=> 	'',
		'extraclass' => '',
		'timer' => '',
		'effTimer' => '',
		'effect' => 'zoom',
	), $atts));	
	$main_id = uniqid( 'homeslider-' );
	$control_id = uniqid( 'controls-' );
	$opacity1 = (!empty($opacity) ? 'opacity:'.esc_attr( $opacity ).';' : ' ');
	$overlay_color1 = (!empty($overlay_color) ? 'background:'.esc_attr( $overlay_color ).';' : ' ');

	$timer1 = (!empty($timer) ? $timer : 3000);
	$effTimer1 = (!empty($effTimer) ? $effTimer : 4000);

	ob_start(); ?>

	<div id="<?php echo esc_attr($main_id); ?>" class="section home boxed-width <?php echo esc_attr($extraclass); ?>">
		<div id="wrapper-slider"> 
			<div id="<?php echo esc_attr($control_id); ?>">
				<div class="pause"></div>
				<div class="play"></div>
				<div class="prev"></div>
				<div class="next"></div>
			</div>
		</div>

		<div class="home-background-mask" <?php if($opacity or $overlay_color){ ?> style="<?php echo htmlspecialchars_decode($overlay_color1).htmlspecialchars_decode($opacity1); ?>" <?php } ?> ></div>		
		<div class="cd-intro">
			<h1 class="cd-headline loading-bar">
				<?php if($head1) { ?><span><?php echo htmlspecialchars_decode($head1); ?></span><?php } ?>
				<?php if($content) { ?>
					<span class="cd-words-wrapper"><?php echo htmlspecialchars_decode($content); ?></span>
				<?php } ?>
			</h1>
		</div>	
		<?php if($head2 != '') { ?><div class="small-intro"><?php echo htmlspecialchars_decode($head2); ?></div><?php } ?>
		<?php if($btnlink != '') { ?><a href="<?php echo esc_attr($btnlink); ?>" data-gal="m_PageScroll2id" data-ps2id-offset="30"><div class="scroll-down"><span>&#xf175;</span> <?php echo htmlspecialchars_decode($btntext); ?></div></a><?php } ?>
	</div>

	<script type="text/javascript">
		(function($) { "use strict";
			//Home Background Slider
	        $.mbBgndGallery.buildGallery({
	            containment:"#<?php echo esc_attr($main_id); ?>",
				autoStart:true,
	            timer:<?php echo esc_js($timer1); ?>,
	            effTimer:<?php echo esc_js($effTimer1); ?>,
	            controls:"#<?php echo esc_attr($control_id); ?>",
	            grayScale:false,
	            shuffle:true,
	            preserveWidth:false,
	            effect:"<?php echo esc_js($effect); ?>", /* fade, slideUp, slideDown, slideRight, slideLeft, zoom */
	            images:[
	            <?php 
					$img_ids = explode(",",$gallery);
					foreach( $img_ids AS $img_id ){
						$meta = wp_prepare_attachment_for_js($img_id);
						$caption = $meta['caption'];
						$title = $meta['title'];	
						$description = $meta['description'];
						$image_src = wp_get_attachment_image_src($img_id,''); 
				?>
					"<?php echo esc_url( $image_src[0] ); ?>",					
				<?php } ?>	
	             
	            ],
	            onStart:function(){},
	            onPause:function(){},
	            onPlay:function(opt){},
	            onChange:function(opt,idx){},
	            onNext:function(opt){},
	            onPrev:function(opt){}
	        });
	    })(jQuery);   
	</script>

<?php
    return ob_get_clean();
}

// Home Youtube Video
add_shortcode('home_youtubevideo','home_youtubevideo_func');
function home_youtubevideo_func($atts, $content = null){
	extract(shortcode_atts(array(
		'head1'		=> 	'',
		'head2'		=>	'',
		'btntext'	=>	'',
		'btnlink'	=> 	'',
		'link'		=> '',
		'opacity'	=> 	'',
		'overlay_color'	=> 	'',		
		'extraclass'	=> 	'',					
	), $atts));

	$opacity1 = (!empty($opacity) ? 'opacity:'.esc_attr( $opacity ).';' : ' ');
	$overlay_color1 = (!empty($overlay_color) ? 'background:'.esc_attr( $overlay_color ).';' : ' ');

	ob_start(); ?>

	<div class="mk-video-mask"></div>
	<!-- Video Background - Here you need to replace the videoURL with your youtube video URL -->
	<a id="bgndVideo" class="player" data-property="{videoURL:'<?php echo esc_attr( $link ); ?>',containment:'#home-sec',autoPlay:true, mute:true, startAt:5, opacity:1}"><?php _e('youtube', 'otvcp-i10n') ?></a>
		
	<div class="section home boxed-width <?php echo esc_attr($extraclass); ?>" id="homeYouTube" >
	
		<div id="home-sec"></div>
		<div class="home-background-mask" <?php if($opacity or $overlay_color){ ?> style="<?php echo htmlspecialchars_decode($overlay_color1).htmlspecialchars_decode($opacity1); ?>" <?php } ?> ></div>		
		
		<div class="cd-intro">
			<h1 class="cd-headline loading-bar">
				<?php if($head1) { ?><span><?php echo htmlspecialchars_decode($head1); ?></span><?php } ?>
				<?php if($content) { ?>
					<span class="cd-words-wrapper"><?php echo htmlspecialchars_decode($content); ?></span>
				<?php } ?>
			</h1>			
		</div>	
		<?php if($head2 != '') { ?><div class="small-intro"><?php echo htmlspecialchars_decode($head2); ?></div><?php } ?>
		<?php if($btnlink != '') { ?><a class="link-down-home-index" href="<?php echo esc_attr($btnlink); ?>" data-gal="m_PageScroll2id" data-ps2id-offset="30"><div class="scroll-down"><span>&#xf175;</span> <?php echo htmlspecialchars_decode($btntext); ?></div></a><?php } ?>
	</div>	 
	
<?php
    return ob_get_clean();
}

// Home HTML5 Video
add_shortcode('home_html5video', 'home_html5video_func');
function home_html5video_func($atts, $content = null){
	extract(shortcode_atts(array(
		'mp4'		=> 	'',
		'webm'		=> 	'',
		'ogg'		=> 	'',
		'poster'	=> 	'',
		'head1'		=> 	'',
		'head2'		=>	'',
		'btntext'	=>	'',
		'btnlink'	=> 	'',		
		'opacity'	=> 	'',
		'overlay_color'	=> 	'',
		'extraclass'	=> 	'',
	), $atts));
	
	$opacity1 = (!empty($opacity) ? 'opacity:'.esc_attr( $opacity ).';' : ' ');
	$overlay_color1 = (!empty($overlay_color) ? 'background:'.esc_attr( $overlay_color ).';' : ' ');

	$img = wp_get_attachment_image_src($poster,'full');
	$img = $img[0];

	ob_start(); ?>

	<div class="section home boxed-width <?php echo esc_attr($extraclass); ?>">
	
		<div class="poster_background_home" <?php if($poster!=''){ ?> style="background:url('<?php echo esc_url($img); ?>')no-repeat center center;" <?php } ?> ></div>
		<video id="video_background_home" preload="auto" autoplay loop="loop" poster="<?php echo get_template_directory_uri(); ?>/images/trans.png"> 
			<?php if($webm!=''){ ?><source src="<?php echo esc_url($webm); ?>" type="video/webm"> <?php } ?>
			<?php if($mp4!=''){ ?><source src="<?php echo esc_url($mp4); ?>" type="video/mp4"> <?php } ?>
			<?php if($ogg!=''){ ?><source src="<?php echo esc_url($ogg); ?>" type="video/ogg"><?php } ?>
		</video>	
		<div class="home-background-mask" <?php if($opacity or $overlay_color){ ?> style="<?php echo htmlspecialchars_decode($overlay_color1).htmlspecialchars_decode($opacity1); ?>" <?php } ?> ></div>		
		<div class="cd-intro">
			<h1 class="cd-headline loading-bar">
				<?php if($head1) { ?><span><?php echo htmlspecialchars_decode($head1); ?></span><?php } ?>
				<?php if($content) { ?>
					<span class="cd-words-wrapper"><?php echo htmlspecialchars_decode($content); ?></span>
				<?php } ?>
			</h1>
		</div>	
		<?php if($head2 != '') { ?><div class="small-intro"><?php echo htmlspecialchars_decode($head2); ?></div><?php } ?>
		<?php if($btnlink != '') { ?><a href="<?php echo esc_attr($btnlink); ?>" data-gal="m_PageScroll2id" data-ps2id-offset="67"><div class="scroll-down"><span>&#xf175;</span> <?php echo htmlspecialchars_decode($btntext); ?></div></a><?php } ?>
	</div>	

<?php
    return ob_get_clean();
}

// Home Moving Background Image
add_shortcode('home_movingbg', 'home_movingbg_func');
function home_movingbg_func($atts, $content = null){
	extract(shortcode_atts(array(		
		'bgmoving'	=> 	'',
		'head1'		=> 	'',
		'head2'		=>	'',
		'btntext'	=>	'',
		'btnlink'	=> 	'',		
		'opacity'	=> 	'',
		'overlay_color'	=> 	'',
		'extraclass'	=> 	'',
	), $atts));
	
	$opacity1 = (!empty($opacity) ? 'opacity:'.esc_attr( $opacity ).';' : ' ');
	$overlay_color1 = (!empty($overlay_color) ? 'background:'.esc_attr( $overlay_color ).';' : ' ');
	
	$img = wp_get_attachment_image_src($bgmoving,'full');
	$img = $img[0];

	ob_start(); ?>

	<div class="section home boxed-width <?php echo esc_attr($extraclass); ?>">	
		<div class="moving-home" style="background-image: url('<?php echo esc_url($img); ?>');"></div>	
		<div class="home-background-mask" <?php if($opacity or $overlay_color){ ?> style="<?php echo htmlspecialchars_decode($overlay_color1).htmlspecialchars_decode($opacity1); ?>" <?php } ?> ></div>		
		<div class="cd-intro">
			<h1 class="cd-headline loading-bar">
				<?php if($head1) { ?><span><?php echo htmlspecialchars_decode($head1); ?></span><?php } ?>
				<?php if($content) { ?>
					<span class="cd-words-wrapper"><?php echo htmlspecialchars_decode($content); ?></span>
				<?php } ?>
			</h1>
		</div>	
		<?php if($head2 != '') { ?><div class="small-intro"><?php echo htmlspecialchars_decode($head2); ?></div><?php } ?>
		<?php if($btnlink != '') { ?><a href="<?php echo esc_attr($btnlink); ?>" data-gal="m_PageScroll2id" data-ps2id-offset="67"><div class="scroll-down"><span>&#xf175;</span> <?php echo htmlspecialchars_decode($btntext); ?></div></a><?php } ?>
	</div>	
	<script type="text/javascript">
	    $(function(){ "use strict";
	        var x = 0;
	        setInterval(function(){
	            x-=1;
	            $('.moving-home').css('background-position', x + 'px 0');
	        }, 10);
	    })(jQuery);
	</script>	
<?php
    return ob_get_clean();
}

// About Slider (use)
add_shortcode('about_slider', 'about_slider_func');
function about_slider_func($atts, $content = null){
	extract(shortcode_atts(array(
		'order'     =>  'ASC',
		'orderby'   =>  'date',
		'show'      =>  ''
	), $atts));
	ob_start(); ?>
	
	<div class="about-carousel-wrap">						
		<div id="sync1" class="owl-carousel">
			<?php 
			$show1 = (!empty($show)) ? $show : 3;
	        $args = array(   
	            'post_type' => 'aboutus',   
	            'posts_per_page' => $show1,	
				'orderby'=>$orderby,
				'order'=>$order,
	        );  
	        $wp_query = new WP_Query($args);
	        while($wp_query->have_posts()) : $wp_query->the_post();
	        ?>	
			<div class="item">
				<?php the_content(); ?>
			</div>
		<?php endwhile; ?> 
		</div>

		<div id="sync2" class="owl-carousel">
			<?php 
				$show1 = (!empty($show)) ? $show : 3;
				$args = array(    
					'post_type' => 'aboutus',
					'posts_per_page' => $show1,	
					'orderby'=>$orderby,
					'order'=>$order,
					);
				$wp_query = new WP_Query($args);
				while ($wp_query -> have_posts()): $wp_query -> the_post(); 
			?>
			<div class="item">
				<div class="line"></div>
				<div class="line-ver"></div>
				<div class="point-item "></div>
				<p><?php the_title(); ?></p>	
			</div>
			<?php endwhile; ?> 
		</div>							
	</div>	

	<?php

    return ob_get_clean();
}


// Quick View (use)
add_shortcode('quickview', 'quickview_func');
function quickview_func($atts, $content = null){
	extract(shortcode_atts(array(
		'gallery'		=> 	'',
	), $atts));
	ob_start(); ?>
	
	<div class="cd-single-item">
		<div class="cd-slider-wrapper">
			<ul class="cd-slider">
				<?php 
				$img_ids = explode(",",$gallery);
				$i=0;
				foreach( $img_ids AS $img_id ){
				$image_src = wp_get_attachment_image_src($img_id,''); 
				$attachment = get_post( $img_id );?>

				<li <?php if($i==0) { ?> class="selected"<?php } ?>><img src="<?php echo $image_src[0]; ?>" alt=""></li>

				<?php $i++; } ?>
			</ul> <!-- cd-slider -->

			<ul class="cd-slider-navigation">
				<li><a href="#0" class="cd-prev inactive"><?php _e('Next', 'otvcp-i10n'); ?></a></li>
				<li><a href="#0" class="cd-next"><?php _e('Prev', 'otvcp-i10n'); ?></a></li>
			</ul> <!-- cd-slider-navigation -->

			<a href="#0" class="cd-close"><?php _e('Close', 'otvcp-i10n'); ?></a>
		</div> <!-- cd-slider-wrapper -->

		<div class="cd-item-info">		
			<?php echo htmlspecialchars_decode($content); ?>			
		</div> <!-- cd-item-info -->
	</div> <!-- cd-single-item -->	

<?php
    return ob_get_clean();
}

// Services Box
add_shortcode('servicebox', 'service_func');
function service_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=> 	'',
		'icon'		=> 	'',
		'linktitle' => 	'',
	), $atts));

	$title1 = (!empty($linktitle) ? '<h6><a href="'.esc_url($linktitle).'" target="_blank">'.esc_attr($title).'</a></h6>' : '<h6>'.esc_attr($title).'</h6>');

	ob_start(); ?>

	<div class="services-box" data-scroll-reveal="enter bottom move 100px over 0.6s after 0.2s">
		<div class="services-item white-background">
			<div class="icon-services ">
				<div class="glyph-icon <?php echo esc_attr($icon) ?>"></div>
			</div>
			<?php echo htmlspecialchars_decode($title1); ?>
			<p><?php echo htmlspecialchars_decode($content); ?></p>
		</div>
	</div>

<?php
    return ob_get_clean();
}

// Pricing Table
add_shortcode('pricingtable', 'pricingtable_func');
function pricingtable_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		 => '',
		'currency'	 => 'dollar',
		'price'		 => '',
		'buttontext' => '',
		'link'       => '',
		'featured'   => 'no',
		'month'      => '',
	), $atts));
	ob_start(); ?>

	<div class="pricing-item <?php if($featured == 'yes') { echo "popular";}?> white-background" data-scroll-reveal="enter bottom move 100px over 0.6s after 0.2s">
		<h6><?php echo esc_attr($title); ?></h6>
		<div class="number-price"><span><i class="fa fa-<?php echo esc_attr($currency); ?>"></i></span><?php echo esc_attr($price); ?><span><?php echo esc_attr($month); ?></span></div>
		<?php echo htmlspecialchars_decode($content); ?>
		<?php if($link){ ?><a class="price-link" href="<?php echo esc_url($link); ?>" target="_blank"><?php echo esc_attr($buttontext); ?></a><?php } ?>
	</div>

<?php
    return ob_get_clean();
}

// Our Team (use)
add_shortcode('team', 'team_func');
function team_func($atts, $content = null){
	extract(shortcode_atts(array(
		'photo'		=> 	'',
		'name'		=>	'',
		'job'		=>	'',
		'icon1'		=>	'',
		'icon2'		=>	'',
		'icon3'		=>	'',
		'icon4'		=>	'',
		'url1'		=>	'',
		'url2'		=>	'',
		'url3'		=>	'',
		'url4'		=>	'',
	), $atts));

	$img = wp_get_attachment_image_src($photo,'full');
	$img = $img[0];

	$icon11 = (!empty($icon1) ? '<li class="icon-soc"><a href="'.esc_url($url1).'" target="_blank"><i class="fa fa-'.esc_attr($icon1).'"></i></a></li>' : '');
	$icon22 = (!empty($icon2) ? '<li class="icon-soc"><a href="'.esc_url($url2).'" target="_blank"><i class="fa fa-'.esc_attr($icon2).'"></i></a></li>' : '');
	$icon33 = (!empty($icon3) ? '<li class="icon-soc"><a href="'.esc_url($url3).'" target="_blank"><i class="fa fa-'.esc_attr($icon3).'"></i></a></li>' : '');
	$icon44 = (!empty($icon4) ? '<li class="icon-soc"><a href="'.esc_url($url4).'" target="_blank"><i class="fa fa-'.esc_attr($icon4).'"></i></a></li>' : '');

	ob_start(); ?>
	
	<div class="team-wrap">	
		<img src="<?php echo esc_url($img); ?>" alt="">
		<div class="mask-team">
			<?php if($name) { ?><h6><?php echo htmlspecialchars_decode($name); ?></h6><?php } ?>
			<?php if($job) { ?><p><span><?php echo htmlspecialchars_decode($job); ?></span></p><?php } ?>
			<?php if($content) { echo htmlspecialchars_decode($content); } ?>
			<div class="social-team">
				<ul class="list-social">					
					<?php echo htmlspecialchars_decode($icon11); ?>					
					<?php echo htmlspecialchars_decode($icon22); ?>					
					<?php echo htmlspecialchars_decode($icon33); ?>					
					<?php echo htmlspecialchars_decode($icon44); ?>										
				</ul>	
			</div>
		</div>
	</div>

<?php
    return ob_get_clean();
}


// Skills (use)
add_shortcode('skill', 'skill_func');
function skill_func($atts, $content = null){
	extract(shortcode_atts(array(
		'name'		=> 	'',
		'per'		=> 	'',
	), $atts));
	ob_start(); ?>
	
	<div class="skills-name"><?php echo htmlspecialchars_decode($name); ?></div>
	<div class="pro-bar-container pro-bar-margin">					
		<div class="pro-bar bar-<?php echo esc_attr($per); ?>" data-pro-bar-percent="<?php echo esc_attr($per); ?>"></div>
		<div class="text-in-bar"><span class="counter-skills"><?php echo esc_attr($per); ?></span>%</div>
		<div class="arrow-skills"></div>
	</div>	

<?php
    return ob_get_clean();
}


// Slider Project (use)
add_shortcode('folioslider', 'folioslider_func');
function folioslider_func($atts, $content = null){
	extract(shortcode_atts(array(
		'gallery'		=> 	'',
	), $atts));
	ob_start(); ?>
	
	<div class="project-image-wrapper">					
		<div id="owl-portfolio-slider" class="owl-carousel owl-theme">
			<?php 
				$img_ids = explode(",",$gallery);
				foreach( $img_ids AS $img_id ){
				$meta = wp_prepare_attachment_for_js($img_id);
				$caption = $meta['caption'];
				$title = $meta['title'];	
				$description = $meta['description'];
				$image_src = wp_get_attachment_image_src($img_id,''); 
			?>
				<div class="item">
					<img src="<?php echo $image_src[0]; ?>" alt="">
					<?php if($title != '') { ?><div class="left-info"><?php echo esc_attr( $title ); ?></div><?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>	

<?php
    return ob_get_clean();
}

// Slider Post (use)
add_shortcode('postslider', 'postslider_func');
function postslider_func($atts, $content = null){
	extract(shortcode_atts(array(
		'gallery'		=> 	'',
	), $atts));
	ob_start(); ?>
	
	<div class="project-image-wrapper">					
		<div id="owl-post-slider" class="owl-carousel owl-theme">
			<?php 
				$img_ids = explode(",",$gallery);
				foreach( $img_ids AS $img_id ){
				$meta = wp_prepare_attachment_for_js($img_id);
				$caption = $meta['caption'];
				$title = $meta['title'];	
				$description = $meta['description'];
				$image_src = wp_get_attachment_image_src($img_id,''); 
			?>
				<div class="item">
					<img src="<?php echo esc_url( $image_src[0] ); ?>" alt="">					
				</div>
			<?php } ?>
		</div>
	</div>	

<?php
    return ob_get_clean();
}

// Video Player (use)
add_shortcode('videoplayer', 'videoplayer_func');
function videoplayer_func($atts, $content = null){
	extract(shortcode_atts(array(
		'video'  => 	'',
		'withvideo'  => '',
		'heightvideo'=> ''
	), $atts));

	$withvideo1 = (!empty($withvideo)) ? $withvideo : 950;
	$heightvideo1 = (!empty($heightvideo)) ? $heightvideo : 400;

	ob_start(); ?>
	
	<iframe src="<?php echo esc_url($video); ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="<?php echo esc_attr($withvideo1); ?>" height="<?php echo esc_attr($heightvideo1); ?>" ></iframe>

<?php
    return ob_get_clean();
}

// Audio Player 
add_shortcode('audiopost', 'audiopost_func');
function audiopost_func($atts, $content = null){
	extract(shortcode_atts(array(
		'linkmp3'  => 	'',
		'linkoog'  => 	'',
	), $atts));
	ob_start(); ?>
	
	<div class="audio-player">
		<audio controls>
			<?php if($linkoog != ''){ ?><source src="<?php echo esc_url($linkoog); ?>" type="audio/ogg"> <?php } ?>
			<?php if($linkmp3 != ''){ ?><source src="<?php echo esc_url($linkmp3); ?>" type="audio/mpeg"> <?php } ?>
		</audio> 
	</div>
	
<?php
    return ob_get_clean();
}

// Info Project (use)
add_shortcode('folioinfo', 'folioinfo_func');
function folioinfo_func($atts, $content = null){
	extract(shortcode_atts(array(
		'des'		=> 	'',
		'link'		=>	'',
	), $atts));

	ob_start(); ?>
	
	<div class="ajax-project-content">
		<?php if($des) { ?><p><?php echo htmlspecialchars_decode($des); ?></p><?php } ?>
		<?php if($content) { ?><div class="ajax-project-info">
			<?php echo wpb_js_remove_wpautop($content); ?>
		</div><?php } ?>
		<?php if($link) { ?><a target="_blank" href="<?php echo esc_url($link); ?>"><div class="ajax-link"><?php echo htmlspecialchars_decode($link); ?></div></a><?php } ?>
	</div>

<?php
    return ob_get_clean();
}

// Our Facts
add_shortcode('ourfacts', 'ourfacts_func');
function ourfacts_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=> 	'',
		'number'    => 	'',
	), $atts));
	ob_start(); ?>

	<div class="counter-wrap">	
		<?php if($number) { ?><div class="counter-numb"><span class="counter-facts"><?php echo esc_attr($number); ?></span></div><?php } ?>
		<div class="counter-line"></div>
		<?php if($title) { ?><h6><?php echo esc_attr($title); ?></h6><?php } ?>
	</div>

<?php
    return ob_get_clean();
}

// Portfolio
add_shortcode('portfolio','portfolio_func');
function portfolio_func($atts, $content = null){
    extract( shortcode_atts( array(      
      'all' => '',
      'orderby' => 'date',
      'order' => 'ASC',
      'number' => '',
      'layout_folio' => 'masonrylayout'
   ), $atts ) );
    ob_start(); ?>

	<div class="container">		
		<div class="clear"></div>
		<div class="portfolio"></div>
		<div class="expander-wrap relative">
			<div id="expander-wrap">
				<p class="cls-btn"><a class="close">X</a></p>
				<div class="expander-inner"></div>
			</div>
		</div>				
		<div class="clear"></div>
		<div class="twelve columns" data-scroll-reveal="enter bottom move 100px over 0.6s after 0.2s">
			<div id="portfolio-filter">
				<ul id="filter">
					<li><a href="#" class="current" data-filter="*" title=""><?php echo esc_attr($all); ?></a></li>
					<?php 
					$categories = get_terms('categories');   
					foreach( (array)$categories as $categorie){
						$cat_name = $categorie->name;
						$cat_slug = $categorie->slug;
					?>
					<li><a href="#" data-filter=".<?php echo esc_attr($cat_slug); ?>"><?php echo esc_attr($cat_name); ?></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>	
	</div>			

	<div id="projects-grid" class="<?php if($layout_folio == 'nospacedlayout') { echo 'no-spaced-portfolio'; } ?>" >	
		<?php 
			$number1 = (!empty($number)) ? $number : 10;
			$args = array(   
				'post_type' => 'portfolio',
				'posts_per_page' => $number1,	
				'orderby'=>$orderby,
				'order'=>$order,
			);  
			$wp_query = new WP_Query($args);	
			if($wp_query->have_posts()):
			$i = 0;				
			while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
			$cates = get_the_terms(get_the_ID(),'categories');
			$cate_name ='';
			$cate_slug = '';
				  foreach((array)$cates as $cate){
					if(count($cates)>0){
						$cate_name .= $cate->name.' ' ;
						$cate_slug .= $cate->slug .' ';     
					} 
			} 	
			$class_portfolio = '';
			$image_width = '';
			$image_height = '';
			$cropthumb1 = get_post_meta(get_the_ID(),'_cmb_cropthumb', true);				
			switch($cropthumb1){
                case 'medium_medium':
                	$class_portfolio = 'portfolio-box-1 box-port-half';
					$image_width = '1200';
					$image_height = '800';
                break;
                case 'small_medium':
                	$class_portfolio = 'portfolio-box-1';
					$image_width = '600';
					$image_height = '800';
                break;	                                
                default:
                	$class_portfolio = 'portfolio-box-1';
					$image_width = '600';
					$image_height = '400';
            }		        			
            global $theme_option;            
		?>

		<?php if($layout_folio == 'videolayout'){ ?> 
		<!-- Video Portfolio Layout .videolayout -->	
			<div class="portfolio-box-1 folio-video <?php echo esc_attr($cate_slug); ?>">
				<div class="mask-1"></div>
				<?php $folio_video = get_post_meta(get_the_ID(),'_cmb_folio_video', true);?>
				<iframe src="<?php echo esc_url($folio_video); ?>" width="950" height="550" ></iframe>
				<h6><?php the_title(); ?></h6>
				<div class="line-mask"></div>
				<?php $portfolio_subtitle = get_post_meta(get_the_ID(),'_cmb_portfolio_subtitle', true);?>	
				<?php if($portfolio_subtitle!=''){ ?><p><?php echo htmlspecialchars_decode( $portfolio_subtitle );?></p><?php } ?>
			</div>			
		<?php }elseif ($layout_folio == 'nospacedlayout') { ?>
		<!-- No Spaced Portfolio Layout .nospacedlayout -->				
			<a <?php if($theme_option['ajax_work'] != 'no') { ?>class="expander"<?php } ?> href="<?php the_permalink(); ?>">
				<div class="portfolio-box-1 <?php echo esc_attr($cate_slug); ?>">
					<div class="mask-1"></div>
					<?php $params = array( 'width' => 600, 'height' => 400 );
					$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params ); ?>
					<img src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>" />
					<h6><?php the_title(); ?></h6>
					<div class="line-mask"></div>
					<?php $portfolio_subtitle = get_post_meta(get_the_ID(),'_cmb_portfolio_subtitle', true);?>	
					<?php if($portfolio_subtitle!=''){ ?><p><?php echo htmlspecialchars_decode( $portfolio_subtitle );?></p><?php } ?>
				</div>
			</a>
		<?php }elseif ($layout_folio == 'gridlayout') { ?>
		<!-- Grid Portfolio Layout .gridlayout -->	
			<a <?php if($theme_option['ajax_work'] != 'no') { ?>class="expander"<?php } ?> href="<?php the_permalink(); ?>">
				<div class="portfolio-box-1 <?php echo esc_attr($cate_slug); ?>">
					<div class="mask-1"></div>
					<?php $params = array( 'width' => 600, 'height' => 400 );
					$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params ); ?>
					<img src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>" />
					<h6><?php the_title(); ?></h6>
					<div class="line-mask"></div>
					<?php $portfolio_subtitle = get_post_meta(get_the_ID(),'_cmb_portfolio_subtitle', true);?>	
					<?php if($portfolio_subtitle!=''){ ?><p><?php echo htmlspecialchars_decode( $portfolio_subtitle );?></p><?php } ?>
				</div>
			</a>
		<?php }elseif ($layout_folio == 'popuplayout') { ?>
		<!-- Popup Image + Masonry Portfolio Layout .popuplayout -->
			<a class="group1" href="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>">
				<div class="<?php echo esc_attr( $class_portfolio ); ?> <?php echo esc_attr($cate_slug); ?>">
					<div class="mask-1"></div>
					<?php $params = array( 'width' => $image_width, 'height' => $image_height );
					$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params ); ?>
					<img src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>" />
					<h6><?php the_title(); ?></h6>
					<div class="line-mask"></div>
					<?php $portfolio_subtitle = get_post_meta(get_the_ID(),'_cmb_portfolio_subtitle', true);?>	
					<?php if($portfolio_subtitle!=''){ ?><p><?php echo htmlspecialchars_decode( $portfolio_subtitle );?></p><?php } ?>
				</div>
			</a>
		<?php }else{ ?> 
			<!-- Masonry Portfolio Layout .masonrylayout -->
			<a <?php if($theme_option['ajax_work'] != 'no') { ?>class="expander"<?php } ?> href="<?php the_permalink(); ?>">
				<div class="<?php echo esc_attr( $class_portfolio ); ?> <?php echo esc_attr($cate_slug); ?>">
					<div class="mask-1"></div>
					<?php $params = array( 'width' => $image_width, 'height' => $image_height );
					$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params ); ?>
					<img src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>" />
					<h6><?php the_title(); ?></h6>
					<div class="line-mask"></div>
					<?php $portfolio_subtitle = get_post_meta(get_the_ID(),'_cmb_portfolio_subtitle', true);?>	
					<?php if($portfolio_subtitle!=''){ ?><p><?php echo htmlspecialchars_decode( $portfolio_subtitle );?></p><?php } ?>
				</div>
			</a>
		<?php } ?>	

		<?php $i++; endwhile;?> 
		<?php wp_reset_postdata(); ?>
		<?php endif; ?>			
	</div><!-- End Here -->
	
<?php
    return ob_get_clean();
}

// Blog Post (use)
add_shortcode('blog', 'blog_func');
function blog_func($atts, $content = null) {	
	extract(shortcode_atts(array(
		'btntext'	=> 	'',
		'btnlink'	=> 	'',
		'mp4'		=> 	'',
		'webm'		=> 	'',
		'ogg'		=> 	'',
		'poster'	=> 	'',
		'bgimage'   =>  '',
		'lenght'    => 	'',
		'order'     =>  'ASC',
		'orderby'   =>  'date',
		'number'      =>  '',
		'opacity'	=> 	'',
		'overlay_color'	=> 	'',
		'readmore' => 	'',
	), $atts));

	$img = wp_get_attachment_image_src($bgimage,'full');
	$img = $img[0];

	$opacity1 = (!empty($opacity) ? 'opacity:'.esc_attr( $opacity ).';' : ' ');
	$overlay_color1 = (!empty($overlay_color) ? 'background:'.esc_attr( $overlay_color ).';' : ' ');

	$readmore = (!empty($readmore) ? $readmore : 'Read More');

	ob_start(); ?>

	<div class="section boxed-width padding-top-bottom-parallax">
		
		<div class="poster_background" <?php if($bgimage !=''){ ?> style="background-image: url(<?php echo esc_url($img); ?>);" <?php } ?> ></div>
		<video id="video_background" preload="auto" autoplay loop="loop" poster="<?php if($poster != ''){ echo esc_url($poster); }else{ echo get_template_directory_uri(); ?>/images/trans.png<?php } ?>"> 
			<?php if($webm !=''){ ?><source src="<?php echo esc_url($webm); ?>" type="video/webm"> <?php } ?>
			<?php if($mp4 !=''){ ?><source src="<?php echo esc_url($mp4); ?>" type="video/mp4"> <?php } ?>
			<?php if($ogg !=''){ ?><source src="<?php echo esc_url($ogg); ?>" type="video/ogg"> <?php } ?>
		</video>
	
		<div class="sep-background-mask" <?php if($opacity or $overlay_color){ ?> style="<?php echo htmlspecialchars_decode($overlay_color1).htmlspecialchars_decode($opacity1); ?>" <?php } ?> ></div>
	
		<div class="container">	
			<?php
				$number1 = (!empty($number)) ? $number : 6;
				$args = array(   
					'post_type' => 'post',
					'posts_per_page' => $number1,
					'order' => $order,
					'orderby' => $orderby
				); 				
			 	$blog= new WP_Query($args);
				if($blog->have_posts()):
				while($blog->have_posts()) : $blog->the_post();
				$format = get_post_format();
				$icon = '';
				if($format == 'image'){
					$icon = 'image';
				}elseif($format == 'video'){
					$icon = 'video';
				}elseif($format == 'audio'){
					$icon = 'audio';
				}elseif($format == 'quote'){
					$icon = 'quote';
				}elseif($format == 'gallery'){
					$icon = 'gallery';
				}elseif ($format == 'link'){
					$icon = 'Link ';
				}else{
					$icon = 'Standard';
				}
		    ?>
			<div class="four columns" data-scroll-reveal="enter bottom move 100px over 0.6s after 0.2s">
				<a href="<?php the_permalink(); ?>">
					<div class="blog-item">
						<div class="blog-item-top-text"><span><?php echo esc_attr($icon); ?></span> <?php the_time('d.m.Y.'); ?></div>
						<h6><?php the_title(); ?></h6>						
						<p><?php echo wp_trim_words( get_post_meta(get_the_ID(),'_cmb_ex_post', true), $lenght ); ?></p>						
						<div class="read-more"><?php echo esc_attr($readmore); ?> <span><i class="fa fa-long-arrow-right"></i></span></div>
					</div>
				</a>
			</div>
			<?php endwhile; endif; ?>
			<?php if($btnlink != ''){ ?>
				<div class="twelve columns" data-scroll-reveal="enter bottom move 100px over 0.6s after 0.2s">
					<a href="<?php echo esc_url($btnlink); ?>" target="_blank">
						<div class="blog-item">
							<div class="read-more articles-text-center"><?php echo esc_attr($btntext); ?> <span><i class="fa fa-long-arrow-right"></i></span></div>
						</div>
					</a>
				</div>
			<?php } ?>
		</div>			
	</div>

<?php
    return ob_get_clean();
}	

// Call To Action (use)
add_shortcode('callto', 'callto_func');
function callto_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title' 	=>	'',
		'btntext'		=>	'',
		'link'		=> 	'',
	), $atts));

	ob_start(); ?>

	<a href="<?php echo esc_url($link); ?>" data-gal="m_PageScroll2id" data-ps2id-offset="30">		
		<div class="section-call-action-link boxed-width">	
			<div class="container">	
				<div class="twelve columns">
					<p><?php echo esc_attr($title); ?></p>
					<h6><?php echo esc_attr($btntext); ?></h6>
				</div>	
			</div>				
		</div>		
	</a>
	
<?php
    return ob_get_clean();
}

// Logos Client (use)
add_shortcode('logos', 'logos_func');
function logos_func($atts, $content = null){
	extract(shortcode_atts(array(
		'gallery'		  => 	'',
		'bgimage'         => 	'',
		'opacity'         => 	'',
		'overlay_color'   => 	'',
	), $atts));

	$img = wp_get_attachment_image_src($bgimage,'full');
	$img = $img[0];

	$opacity1 = (!empty($opacity) ? 'opacity:'.esc_attr( $opacity ).';' : ' ');
	$overlay_color1 = (!empty($overlay_color) ? 'background:'.esc_attr( $overlay_color ).';' : ' ');

	ob_start(); ?>
	
	<div class="section boxed-width padding-top-bottom-parallax">
		<div class="parallax-sep-2" <?php if($bgimage !=''){ ?> style="background-image: url(<?php echo esc_url($img); ?>);" <?php } ?> ></div>	
		<div class="sep-background-mask" <?php if($opacity or $overlay_color){ ?> style="<?php echo htmlspecialchars_decode($overlay_color1).htmlspecialchars_decode($opacity1); ?>" <?php } ?> ></div>						
		<div class="container">	
			<div class="twelve columns">
				<div id="owl-logos" class="owl-carousel owl-theme">
				<?php 
					$img_ids = explode(",",$gallery);
					foreach( $img_ids AS $img_id ){
					$meta = wp_prepare_attachment_for_js($img_id);
					$caption = $meta['caption'];
					$title = $meta['title'];	
					$alt = $meta['alt'];
					$description = $meta['description'];
					$image_src = wp_get_attachment_image_src($img_id,''); 
				?>				
					<div class="item"><a href="<?php echo esc_url($caption); ?>" target="_blank" ><img src="<?php echo esc_url( $image_src[0] ); ?>" alt=""></a></div>
				<?php } ?>	
				</div>
			</div>	
		</div>				
	</div>

<?php
    return ob_get_clean();
}

//Contact Info (use)
add_shortcode('cinfo','cinfo_func');
function cinfo_func($atts, $content = null){
	extract(shortcode_atts(array(
		'icon'		=> '',
		'title' 	=> '',
	), $atts));

	ob_start(); ?>

	<div class="contact-det">
		<h6><?php if($icon!=''){ ?><i class="fa fa-<?php echo esc_attr($icon); ?>"></i><?php } ?><?php echo htmlspecialchars_decode($title); ?></h6>
		<p><?php echo htmlspecialchars_decode($content); ?></p>
	</div>

<?php
    return ob_get_clean();
}

add_shortcode('maps','maps_func');
function maps_func($atts, $content = null){
	extract(shortcode_atts(array(		
		'iconmap'	 	 => '',
		'address'        => '',		
		'latitude'		 => '',
		'longitude'	 	 => '',
		'zoommap'        => '',
		'id_map'         => '',
		'main_color'      => '',
		'saturation_value' => '',
		'brightness_value' => ''
	), $atts));

	$img = wp_get_attachment_image_src($iconmap,'full');
	$img = $img[0];

	$id_map1 = (!empty($id_map) ? $id_map : 'google-container');
	$main_color1 = (!empty($main_color) ? $main_color : '#cccccc');
	$saturation_value1 = (!empty($saturation_value) ? $saturation_value : -100);
	$brightness_value1 = (!empty($brightness_value) ? $brightness_value : 9);

	ob_start(); ?>

	<div id="cd-google-map">
		<div id="<?php echo esc_attr( $id_map1 ); ?>" style="position: relative;width: 100%;height: 500px;"></div>
		<div id="cd-zoom-in"></div>
		<div id="cd-zoom-out"></div>
		<address><?php echo htmlspecialchars_decode($address); ?></address> 
	</div>	

	<script type="text/javascript">
		
		(function($) { "use strict"

			//set your google maps parameters <?php echo esc_attr($latitude); ?>,<?php echo esc_attr($longitude); ?>

			jQuery(document).ready(function($){
				
				var latitude = <?php echo esc_attr($latitude); ?>,
					longitude = <?php echo esc_attr($longitude); ?>,
					map_zoom = <?php echo esc_attr($zoommap); ?>;

				//google map custom marker icon - .png fallback for IE11
				var is_internetExplorer11= navigator.userAgent.toLowerCase().indexOf('trident') > -1;
				var marker_url = ( is_internetExplorer11 ) ? '<?php echo esc_url( $img ); ?>' : '<?php echo get_template_directory_uri(); ?>/images/cd-icon-location.svg';
					
				//define the basic color of your map, plus a value for saturation and brightness
				var	main_color = '<?php echo esc_attr($main_color1); ?>',
					saturation_value= <?php echo esc_attr($saturation_value1); ?>,
					brightness_value= <?php echo esc_attr($brightness_value1); ?>;

				//we define here the style of the map
				var style= [ 
					{
						//set saturation for the labels on the map
						elementType: "labels",
						stylers: [
							{saturation: saturation_value}
						]
					},  
					{	//poi stands for point of interest - don't show these lables on the map 
						featureType: "poi",
						elementType: "labels",
						stylers: [
							{visibility: "off"}
						]
					},
					{
						//don't show highways lables on the map
						featureType: 'road.highway',
						elementType: 'labels',
						stylers: [
							{visibility: "off"}
						]
					}, 
					{ 	
						//don't show local road lables on the map
						featureType: "road.local", 
						elementType: "labels.icon", 
						stylers: [
							{visibility: "off"} 
						] 
					},
					{ 
						//don't show arterial road lables on the map
						featureType: "road.arterial", 
						elementType: "labels.icon", 
						stylers: [
							{visibility: "off"}
						] 
					},
					{
						//don't show road lables on the map
						featureType: "road",
						elementType: "geometry.stroke",
						stylers: [
							{visibility: "off"}
						]
					}, 
					//style different elements on the map
					{ 
						featureType: "transit", 
						elementType: "geometry.fill", 
						stylers: [
							{ hue: main_color },
							{ visibility: "on" }, 
							{ lightness: brightness_value }, 
							{ saturation: saturation_value }
						]
					}, 
					{
						featureType: "poi",
						elementType: "geometry.fill",
						stylers: [
							{ hue: main_color },
							{ visibility: "on" }, 
							{ lightness: brightness_value }, 
							{ saturation: saturation_value }
						]
					},
					{
						featureType: "poi.government",
						elementType: "geometry.fill",
						stylers: [
							{ hue: main_color },
							{ visibility: "on" }, 
							{ lightness: brightness_value }, 
							{ saturation: saturation_value }
						]
					},
					{
						featureType: "poi.sport_complex",
						elementType: "geometry.fill",
						stylers: [
							{ hue: main_color },
							{ visibility: "on" }, 
							{ lightness: brightness_value }, 
							{ saturation: saturation_value }
						]
					},
					{
						featureType: "poi.attraction",
						elementType: "geometry.fill",
						stylers: [
							{ hue: main_color },
							{ visibility: "on" }, 
							{ lightness: brightness_value }, 
							{ saturation: saturation_value }
						]
					},
					{
						featureType: "poi.business",
						elementType: "geometry.fill",
						stylers: [
							{ hue: main_color },
							{ visibility: "on" }, 
							{ lightness: brightness_value }, 
							{ saturation: saturation_value }
						]
					},
					{
						featureType: "transit",
						elementType: "geometry.fill",
						stylers: [
							{ hue: main_color },
							{ visibility: "on" }, 
							{ lightness: brightness_value }, 
							{ saturation: saturation_value }
						]
					},
					{
						featureType: "transit.station",
						elementType: "geometry.fill",
						stylers: [
							{ hue: main_color },
							{ visibility: "on" }, 
							{ lightness: brightness_value }, 
							{ saturation: saturation_value }
						]
					},
					{
						featureType: "landscape",
						stylers: [
							{ hue: main_color },
							{ visibility: "on" }, 
							{ lightness: brightness_value }, 
							{ saturation: saturation_value }
						]
						
					},
					{
						featureType: "road",
						elementType: "geometry.fill",
						stylers: [
							{ hue: main_color },
							{ visibility: "on" }, 
							{ lightness: brightness_value }, 
							{ saturation: saturation_value }
						]
					},
					{
						featureType: "road.highway",
						elementType: "geometry.fill",
						stylers: [
							{ hue: main_color },
							{ visibility: "on" }, 
							{ lightness: brightness_value }, 
							{ saturation: saturation_value }
						]
					}, 
					{
						featureType: "water",
						elementType: "geometry",
						stylers: [
							{ hue: main_color },
							{ visibility: "on" }, 
							{ lightness: brightness_value }, 
							{ saturation: saturation_value }
						]
					}
				];
					
				//set google map options
				var map_options = {
					center: new google.maps.LatLng(latitude, longitude),
					zoom: map_zoom,
					panControl: false,
					zoomControl: false,
					mapTypeControl: false,
					streetViewControl: false,
					mapTypeId: google.maps.MapTypeId.ROADMAP,
					scrollwheel: false,
					styles: style,
				}
				//inizialize the map
				var map = new google.maps.Map(document.getElementById('<?php echo esc_attr( $id_map1 ); ?>'), map_options);
				//add a custom marker to the map				
				var marker = new google.maps.Marker({
					position: new google.maps.LatLng(latitude, longitude),
					map: map,
					visible: true,
					icon: marker_url,
				});

				//add custom buttons for the zoom-in/zoom-out on the map
				function CustomZoomControl(controlDiv, map) {
					//grap the zoom elements from the DOM and insert them in the map 
					var controlUIzoomIn= document.getElementById('cd-zoom-in'),
						controlUIzoomOut= document.getElementById('cd-zoom-out');
					controlDiv.appendChild(controlUIzoomIn);
					controlDiv.appendChild(controlUIzoomOut);

					// Setup the click event listeners and zoom-in or out according to the clicked element
					google.maps.event.addDomListener(controlUIzoomIn, 'click', function() {
						map.setZoom(map.getZoom()+1)
					});
					google.maps.event.addDomListener(controlUIzoomOut, 'click', function() {
						map.setZoom(map.getZoom()-1)
					});
				}

				var zoomControlDiv = document.createElement('div');
				var zoomControl = new CustomZoomControl(zoomControlDiv, map);

				//insert the zoom div on the top left of the map
				map.controls[google.maps.ControlPosition.LEFT_TOP].push(zoomControlDiv);
			});
		
		})(jQuery);

	</script>

<?php
    return ob_get_clean();
}
?>
