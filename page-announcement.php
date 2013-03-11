<?php 
/*
Template Name: Announcement
*/
get_header(); 
?>
<div id="layout">
	<div id="contentbg">	
		
	    <div id="content">
			<div class="content-header"></div>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div id="pagetitle">
			<?php the_title(); ?>
			</div>
			<div class="post-content">
			<?php the_content(); ?>
			</div>
<?php if( is_user_logged_in() ) ?>	
<?php comments_template( '/comments-an.php', true ); ?>		
		
			<?php endwhile; endif;?>
		</div>
		<div class="contentft"></div> 
	</div>

	<?php get_sidebar(); ?>
	<div class="clear"></div>  
	<?php get_footer(); ?>
</div>
<div class="clear"></div> 