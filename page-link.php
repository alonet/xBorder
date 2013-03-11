<?php 
/*
Template Name: 友情链接
*/
get_header(); $linkcats = $wpdb->get_results("SELECT T1.name AS name FROM $wpdb->terms T1, $wpdb->term_taxonomy T2 WHERE T1.term_id = T2.term_id AND T2.taxonomy = 'link_category'");
?>



	<article>      
							
						
				<div id="content">
				
<div class="breadcrumbsclear"><div class="breadcrumbs"><li><a href="<?php bloginfo('url'); ?>">Home&nbsp;</a> &gt; <?php the_title(); ?></li></div></div>				
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>						
						<div id="linkpagetitle">
							<?php the_title(); ?>
						</div>						
						
						<?php if($linkcats) : foreach($linkcats as $linkcat) : ?> <!-- 开始输出links-->
				<div id="linkcaption"><h3><?php echo $linkcat->name; ?></h3></div> <!-- 输出分类-->
					<div class="link-content"> <!--开始ul-->
						<ul>
						<?php $bookmarks = get_bookmarks('orderby=date&category_name=' . $linkcat->name);if ( !empty($bookmarks) ) {foreach ($bookmarks as $bookmark) {echo '<li><a href="' . $bookmark->link_url . '" title="' . $bookmark->link_description . '" target="_blank" ><img width="16px";height="16px"; src="' . $bookmark->link_url . '/favicon.ico" onerror="javascript:this.src=\'wp-content/themes/xBorder/images/link-default.png\'" />' . $bookmark->link_name . '</a></li>';}} ?>
						</ul>
					<div class="fixed"></div>
				</div><!-- end link-content -->
			<?php endforeach; endif; ?>		
					<?php endwhile; endif; ?>	</div>					
							
				  <script type="text/javascript">
		$("#loadbar").show();
		$("#loadbar div").animate({width:"50%"});
</script>	
			<?php include('sidebar-single.php'); ?>
		<div class="clear"></div></article>  
		<?php get_footer(); ?>
	