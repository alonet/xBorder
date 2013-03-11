<?php 
/*
Template Name: 主题模版
*/
get_header(); 
?>
<article>
	
	    <div id="content">
			<div class="content-header"></div>
			<div class="breadcrumbsclear"><div class="breadcrumbs"><li><a href="<?php bloginfo('url'); ?>">Home&nbsp;</a> &gt; <?php the_title(); ?></li></div></div>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			
			<div class="post-content">
			<?php the_content(); ?>
			</div>
		
			
			<?php endwhile; endif;?>
		</div>
		<div class="contentft"></div> 
	


	<div class="clear"></div> </article> 
	<?php get_footer(); ?>

<div class="clear"></div> 