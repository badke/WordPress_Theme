<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
?>
<div id="footer">
	<div class="wrapper">
		<p><a href="/">Home</a> <a href="/">Page</a></p>
		<p class="social"><a href="/">FB</a> <a href="/">Twitter</a></p>
		<p class="copyright">&copy; <?php echo date("Y"); ?> PCG</p>
	</div>
</div>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/default.js"></script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
<?php wp_footer(); ?>
</body>
</html>