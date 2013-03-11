<?php get_header(); ?>
<?php $options = get_option('Newer_options'); ?>
	<article>        
				
			<div id="content">
			 <div class="bigfa-content">					
				    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>													
				      <div class="breadcrumbsclear"><div class="breadcrumbs"><a href="<?php bloginfo('url'); ?>">Home&nbsp;</a> &gt; Categories &gt; <?php the_category(' &gt; '); ?> &gt; <?php the_title(); ?></div></div>				
				      
				      
					   <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2> 	
					  	 
    <!--.postMeta-->	
				
				        <div class="post-content">									
					        <?php the_content(__('Read More'));?>
						</div>
                        <div class="clear"></div>
						<div class="postinfo">
<div class="relatedposts"><?php include_once('relatedpost.php');?></div></div>
                     
						
					<?php comments_template( '', true ); ?>

					
				
				<?php endwhile; endif;?>    
				
				<div class="clear"></div></div>
			</div>
		
		<script type="text/javascript">
		$("#loadbar").show();
		$("#loadbar div").animate({width:"50%"});
</script>
		
		<?php include('sidebar-single.php'); ?>
		<div class="clear"></div>  
		
	</article>
	  <?php get_footer(); ?>