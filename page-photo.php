<?php 
/*
Template Name: 相册模板
*/
get_header(); 
?>
	<div id="layout">        
			<div id="contentbg">					
					
				<div id="content">
				<div class="content-header"></div>					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>					
					<div id="photopagetitle">
						<?php the_title(); ?>
					</div>					
					<div class="Photoframe">
						<?php the_content() ?>
					</div>		
					<?php endwhile; endif;?>
					<div class="clear"></div>					
				</div>				
			<div class="contentft"></div> 			
			</div>		
			<?php get_sidebar(); ?>
		<div class="clear"></div>  
		<?php get_footer(); ?>
	</div>