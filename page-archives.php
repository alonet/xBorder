<?php 
/*
Template Name: 存档模板
*/
get_header(); 
?>
	<article>        
								
					
				<div id="content">
				<div class="bigfa-content">	
<div class="breadcrumbsclear"><div class="breadcrumbs"><li><a href="<?php bloginfo('url'); ?>">Home&nbsp;</a> &gt; <?php the_title(); ?></li></div></div>				
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>					
					<div id="archive_title">
						<?php the_title(); ?>
					</div>					
					<div class="info"> 共有：<?php $count_posts = wp_count_posts(); echo $published_posts = $count_posts->publish;?> 篇文章&nbsp;&nbsp;
						 <?php echo $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments");?> 条留言&nbsp;&nbsp;
						 最后更新时间为<?php $last = $wpdb->get_results("SELECT MAX(post_modified) AS MAX_m FROM $wpdb->posts WHERE (post_type = 'post' OR post_type = 'page') AND (post_status = 'publish' OR post_status = 'private')");$last = date('Y年n月j日', strtotime($last[0]->MAX_m));echo $last; ?>
						 <div id="expand_collapse">展开所有</div>
					 </div>					
					<section class="archivelist">			
						<div id="archives">
							<?php archives_list_SHe(); ?>
						</div>
					</section>		
					<?php endwhile; endif;?>
					<div class="clear"></div>					
							
			</div> 			
			</div>
  <script type="text/javascript">
		$("#loadbar").show();
		$("#loadbar div").animate({width:"50%"});
</script>				
			<?php include('sidebar-single.php'); ?>
		<div class="clear"></div> </article> 
		<?php get_footer(); ?>
	