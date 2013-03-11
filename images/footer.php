</div>
<?php $options = get_option('Newer_options'); ?>
<div id="footer-bg">
<div id="footer">
<div id="newerlogo"></div>
<div id="footerinfo">
 <p>Theme is Newer_ultimate | <?php get_search_form(); ?></p>
 <p>Powered by <a href="http://wordpress.org/">WordPress</a>  |  Designed by <a href="http://ceezi.com/">Bigfa</a> </p>
</div>

</div><!-- end #footer -->
</div><!-- end #footer-bg -->
<!-- 这里就别改了好么，亲！节操啊！！！！！！ -->
<?php if($options['glide']) : ?>
<div id="shangxia">
	<div id="shang"></div>
	<div id="xia"></div>
</div>	
<div id="adbg"> 
<div id="ad"> 
<a href=" http://ceezi.com" target=_blank><img src=" http://ceezi.com/img/adsd.png" border=0></a>
</div>
</div>
<?php endif; ?> 
<?php if($options['footercode']) : ?> 
	<div class="statistic">
		<?php echo($options['footercode']); ?>
	</div>
<?php endif; ?> 
<?php wp_footer(); ?> 
	<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/Newer.js"></script>
	<?php if($options['lazyload']) : ?> 
	<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/lazyload.js"></script>
	<?php endif; ?>	
</body>
</html>