<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="skype_toolbar" content="skype_toolbar_parser_compatible"/>

<title><?php wp_title(); ?></title>

<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" /> 
<link href="<?php bloginfo('pingback_url'); ?>" rel="pingback" />

<?php wp_enqueue_script('jquery'); wp_head(); ?>

<script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</head>

<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&amp;appId=404140306330822";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="header">
	<div class="wrapper">
		<h3><?php bloginfo('description'); ?></h3>
		<p><a href="/">Home</a> <a href="/">Page</a></p>
		<?php if( !is_front_page() ) : ?><a href="/"><?php endif; ?><img src="<?php bloginfo('template_directory'); ?>/images/logo.png" width="424" height="65" alt="<?php bloginfo('name'); ?>" /><?php if( !is_front_page() ) : ?></a><?php endif; ?>
	</div>
</div>