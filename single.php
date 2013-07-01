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
	<h1><?php the_title(); ?></h1>
	<div class="share-buttons">
		<div class="share-item"><fb:like href="<?php the_permalink(); ?>" send="true" width="52" show_faces="false" layout="box_count" font=""></fb:like><script> (function() { var e = document.createElement('script'); e.async = true; e.src = (document.location.protocol == 'file:' ? 'http:' : document.location.protocol) + '//connect.facebook.net/en_US/all.js'; document.getElementById('fb-root').appendChild(e); }()); window.fbAsyncInit = function() { FB.init({xfbml: true}); FB.Event.subscribe('edge.create', function(targetUrl){ _gaq.push(['_trackSocial', 'facebook', 'like', targetUrl]); }); FB.Event.subscribe('edge.remove', function(targetUrl){ _gaq.push(['_trackSocial', 'facebook', 'unlike', targetUrl]); }); FB.Event.subscribe('message.send', function(targetUrl) { _gaq.push(['_trackSocial', 'facebook', 'send', targetUrl]); }); FB.Event.subscribe('comment.create', function(targetUrl) { _gaq.push(['_trackSocial', 'facebook', 'comment', targetUrl]); }); FB.Event.subscribe('comment.remove', function(targetUrl) { _gaq.push(['_trackSocial', 'facebook', 'uncomment', targetUrl]); }); }; </script></div>
		<div class="share-item"><a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="Reading &#8220;<?php the_title(); ?>&#8221;" data-count="vertical">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script><script type="text/javascript"> twttr.events.bind('tweet', function(event) { if (event) { var targetUrl; if (event.target && event.target.nodeName == 'IFRAME') { targetUrl = extractParamFromUri(event.target.src, 'url'); } _gaq.push(['_trackSocial', 'twitter', 'tweet', targetUrl]); } }); twttr.events.bind('follow', function(){ var targetUrl; if (event.target && event.target.nodeName == 'IFRAME') { targetUrl = extractParamFromUri(event.target.src, 'url'); } _gaq.push(['_trackSocial', 'twitter', 'follow', targetUrl]); }); twttr.events.bind('retweet', function(){ var targetUrl; if (event.target && event.target.nodeName == 'IFRAME') { targetUrl = extractParamFromUri(event.target.src, 'url'); } _gaq.push(['_trackSocial', 'twitter', 'retweet', targetUrl]); }); twttr.events.bind('favorite', function(){ var targetUrl; if (event.target && event.target.nodeName == 'IFRAME') { targetUrl = extractParamFromUri(event.target.src, 'url'); } _gaq.push(['_trackSocial', 'twitter', 'favorite', targetUrl]); }); twttr.events.bind('click', function(){ var targetUrl; if (event.target && event.target.nodeName == 'IFRAME') { targetUrl = extractParamFromUri(event.target.src, 'url'); } _gaq.push(['_trackSocial', 'twitter', 'click', targetUrl]); }); function extractParamFromUri(uri, paramName){ if(!uri){ return; } var uri = uri.split('#')[0]; var parts = uri.split('?'); if(parts.length == 1){ return; } var query = decodeURI(parts[1]); paramName += '='; var params = query.split('&'); for(var i = 0, param; param = params[i]; ++i){ if(param.indexOf(paramName) === 0){ return unescape(param.split('=')[1]); } } } </script></div>
		<div class="share-item"><g:plusone size="tall" href="<?php the_permalink(); ?>"></g:plusone><script type="text/javascript"> (function() { var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true; po.src = 'https://apis.google.com/js/plusone.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s); })(); </script></div>
		<div class="share-item"><script src="http://platform.linkedin.com/in.js" type="text/javascript"></script><script type="IN/Share" data-url="<?php the_permalink(); ?>" data-counter="top"></script></div>
	</div>
	<?php if ( has_post_thumbnail() ) : echo get_the_post_thumbnail($post->ID, 'medium'); endif; ?>
	<?php the_content(); ?>
	<?php $posturl = get_permalink(); $post_title = get_the_title(); ?>
	<p class="meta inside">Posted by <strong><?php the_author(); ?></strong> in <?php the_category(', '); ?><?php the_tags(' and tagged ', ', '); ?>. </p>
	<?php comments_template('', true); ?>
	</div>
	<div id="sidebar">
	<?php dynamic_sidebar( 'primary-widget-area' ); ?>
	</div>
</div>

<?php get_footer(); ?>
