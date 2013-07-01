<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */

add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
add_filter('widget_text', 'do_shortcode');

if ( function_exists('register_sidebar') ) {
	register_sidebar( array(
			'name' => __( 'Blog Widget Area', 'widgetsetup' ),
			'id' => 'primary-widget-area',
			'description' => __( 'The primary widget area', 'widgetsetup' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		) );
	register_sidebar( array(
			'name' => __( 'Page Widget Area', 'widgetsetup' ),
			'id' => 'secondary-widget-area',
			'description' => __( 'The secondary widget area', 'widgetsetup' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		) );
}

add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );
function my_mce_buttons_2( $buttons ) {
	$formatselect_key = array_search( 'formatselect', $buttons );
	if ( $formatselect_key !== false ) {
		array_splice( $buttons, $formatselect_key + 1, 0, 'styleselect' );
	} else {
		array_unshift( $buttons, 'styleselect' );
	}
    $buttons[] = 'sub';
    $buttons[] = 'sup';
	$buttons[] = 'hr';
    return $buttons;
}
add_filter( 'tiny_mce_before_init', 'my_mce_before_init' );
function my_mce_before_init( $settings ) {
    $style_formats = array(
    	array(
    		'title' => 'Read More',
    		'selector' => 'p',
    		'classes' => 'read-more'
    	),
		array(
    		'title' => 'Quote',
    		'selector' => 'blockquote',
    		'classes' => 'quote'
    	),
		array(
    		'title' => 'Quote End',
    		'selector' => 'p',
    		'classes' => 'end'
    	),
		array(
    		'title' => 'Quote By',
    		'selector' => 'p',
    		'classes' => 'by'
    	),
		array(
    		'title' => 'Center',
    		'selector' => 'p',
    		'classes' => 'center'
    	)
    );
    $settings['style_formats'] = json_encode( $style_formats );
    return $settings;
}
add_action( 'admin_init', 'add_my_editor_style' );
function add_my_editor_style() {
	add_editor_style();
}

function is_tree( $pid ) {
    global $post;
    if ( is_page($pid) )
        return true;
    $anc = get_post_ancestors( $post->ID );
    foreach ( $anc as $ancestor ) {
        if( is_page() && $ancestor == $pid ) {
            return true;
        }
    }
    return false;
}

function br_clear() { 
	return '<div class="clear">&nbsp;</div>';
}
add_shortcode('brclear', 'br_clear');

function sitemap() { 
	ob_start();
	$file = $_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/osborn-medical/sitemap.php';
	include $file;
	return ob_get_clean();
}
add_shortcode('sitemap', 'sitemap');

function remove_more_jump_link($link) {
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');

?>
