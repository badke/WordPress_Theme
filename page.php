<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
get_header();
?>

<div id="content">
	<div id="page">
	<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumb">','</p>'); } ?>
	<?php the_content(); ?>
	</div>
	<div id="sidebar">
	<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
	</div>
</div>

<?php get_footer(); ?>
