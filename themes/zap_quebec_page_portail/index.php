<?php get_header(); ?>

<section id="content">
	<h2>Bienvenue sur le réseau de ZAP Québec</h2>
	<div id="blogcontent">
		<?php do_action('zap_before_content'); ?>
		<?php dynamic_sidebar('home_right_1'); ?>
		<?php do_action('zap_after_content'); ?>
	</div>
	
</section>

<section id="nouvelles-zap">
        <?php dynamic_sidebar('home_left_1'); ?>
	<?php 
	
			$rss = new WP_Widget_RSS();
			$args = array( 
						'title' => 'Dernières nouelles',
						'url' => 'http://www.zapquebec.org/feed/',
						'show_author' => 0, 
						'show_date' => 0, 
						'show_summary' => 1,
						'items' => 3,
						'before_widget' => '',
						'before_title' => '<h2>',
						'after_title' => '</h2>',
						'after_widget' => ''
						
					);
					
			$rss->widget($args, $args);
			
	?>
</section>



<?php get_footer(); ?>
