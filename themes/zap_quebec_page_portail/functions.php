<?php

// Relax Mathieu's settings!
error_reporting(E_ERROR);

add_filter('apz_node_title', 'zap_clean_title', 10, 1);

define('ZAP_DEFAULT_PLUGINS', 'ententes-contenus/quoi_faire_a_qc');

zap_load_default_content(ZAP_DEFAULT_PLUGINS);
/*
	emove ZAP from a title string
 */
function zap_clean_title($title){
	$title = trim($title); // caus dave ain't always careful when typing names
	
	// Remove the fugly, inconsistant ZAP, we replace it with our own in the markup
	$title = preg_replace('/^ZAP( -|-|—| —)?/i', '', $title);
	
	// Remove the stupid number identifiers
	$title = preg_replace('/( -|-|—| —|[0-9]| )+$/', '', $title);
	
	return $title;
}

/*
 * Load activates plugins so that the default content is shown 
 * on all portal pages
 * 
 *
*/
function zap_load_default_content($plugins){
	$plugins = explode($plugin, ',');
	foreach ($plugins as $plugin){
		$plugin = trim($plugin);
		
		$plugin_path = ABSPATH . 'wp-content/plugins/{$plugin}.php';
	  	activate_plugin($plugin_path);
	}
}

function zap_connected_users(){
	if(function_exists('apz_connected_users')){
		global $ap_node;
		
		if($ap_node){
			apz_connected_users();
		}
	}
}

function zap_init_widget_bars(){
  register_sidebar( array(
        'name' => 'Accueil à droite (grande colonne)',
        'id' => 'home_right_1',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
      ) );
  register_sidebar( array(
        'name' => 'À gauche de la page',
            'id' => 'home_left_1',
                'before_widget' => '<div>',
                    'after_widget' => '</div>',
                        'before_title' => '<h2 class="rounded">',
                            'after_title' => '</h2>',
                              ) );
}
add_action( 'widgets_init', 'zap_init_widget_bars' );
