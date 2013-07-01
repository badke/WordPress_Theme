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
	<?php if (is_category() ) : ?><h3 class="border">Latest "<?php echo single_cat_title( '', false ); ?>" Posts</h3>
	<?php elseif(is_tag()): ?><h3 class="border">Posts tagged "<?php echo single_tag_title( '', false ); ?>"</h3>
	<?php elseif(isset($_GET['s'])): ?><h3 class="border">Search Results for "<?php echo $_GET['s']; ?>"</h3>
	<?php else:  ?><h3 class="border">Latest Posts</h3><?php endif; ?>
	<?php if ( have_posts() ) : ?>    
	<?php while ( have_posts() ) : the_post(); ?>
	<div class="post">
		<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php the_post_thumbnail('thumbnail'); ?>
		<?php the_content('Continue Reading'); ?>
		<p class="comment"><a href="<?php comment_link(); ?>">Leave A Comment</a></p>
		<p class="meta">Posted by <strong><?php the_author(); ?></strong> in <?php the_category(', '); ?><?php the_tags(' and tagged ', ', '); ?></p>
		<div class="share">
			<div class="half" style="width: 55%;"><div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="true" data-width="350" data-show-faces="false"></div></div>
			<div class="half"><g:plusone size="medium" annotation="inline" href="<?php the_permalink(); ?>"></g:plusone></div>
			<div class="clear">&nbsp;</div>
		</div>
	</div>
	<?php endwhile; ?>    
	<div class="navigation">
		<div class="alignleft"><?php previous_posts_link('Newer Posts') ?>&nbsp;</div>
		<div class="alignright">&nbsp;<?php next_posts_link('More Posts') ?></div>
	</div>
	<?php endif; ?>
	</div>
	<div id="sidebar">
	<?php dynamic_sidebar( 'primary-widget-area' ); ?>
	</div>
</div>

<?php get_footer(); ?>
