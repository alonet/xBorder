<?php 
/*
Template Name: 关于模板
*/
get_header(); 
?>

	<article>        
								
					
				<div id="content">
					
<div class="breadcrumbsclear"><div class="breadcrumbs"><li><a href="<?php bloginfo('url'); ?>">Home&nbsp;</a> &gt; <?php the_title(); ?></li></div></div>				
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>					
														
					 	
									
					<div class="post-content">
						<?php the_content(); ?>	
					</div>
				
					<?php endwhile; endif;?>
					<div class="clear"></div>					
								
				</div> 			
			
  <script type="text/javascript">
		$("#loadbar").show();
		$("#loadbar div").animate({width:"50%"});
</script>				
			<?php include('sidebar-single.php'); ?>
		 
		
	</article><?php get_footer(); ?>