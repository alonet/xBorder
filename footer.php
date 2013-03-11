<?php $options = get_option('Newer_options'); ?>
<footer>
<div class="footer-inner">
<div class="madeon"></div>
<div id="footerinfo">
 <p>Copyright&nbsp;©&nbsp;2013&nbsp;<a href="http://ceezi.com" title="神一样的网站">大发贱志</a>&nbsp;|&nbsp;This&nbsp;is&nbsp;a&nbsp;private&nbsp;theme&nbsp;|&nbsp;<a href="https://plus.google.com/116339521172373137445?rel=author">Google+</a></p>
 valid&nbsp;<a href="http://validator.w3.org/check?uri=referer" rel="external nofollow">HTML&nbsp;5</a>&nbsp;&&nbsp;<a href="http://jigsaw.w3.org/css-validator/check/referer?profile=css3" rel="external nofollow">CSS&nbsp;3</a>&nbsp;|&nbsp;<a href="http://ceezi.com/archives/908.html/" title="xBorder">xBorder</a> Designed By Bigfa
</div>
</div><!-- end #footer -->
</footer>
</div>
<?php wp_footer();?>
<p class="link-back2top"><a href="#" title="Back to top">Back to top</a></p>



<?php if($options['footercode']) : ?> 
	<div class="statistic">
		<?php echo($options['footercode']); ?>
	</div>
<?php endif; ?>



    
	<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/xBorder.js"></script>
<?php if ( is_home() ){ ?>
	<script type="text/javascript">
	
	$("#globalload").animate({"margin-top":'126px'},400).animate({"margin-top":'74px'},400).animate({"margin-top":'116px'},400).animate({"margin-top":'84px'},400).animate({"margin-top":'100px'},400).slideUp(900);
	
	
</script><?php } ?>
</body>
</html>