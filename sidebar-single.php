<aside>
<?php $options = get_option('Newer_options'); ?>


<div class="postdetail">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		您正在阅读的是：<?php the_title(); ?><br/>
		由 <?php the_author(); ?> 发表于 <?php the_time('n月d日') ?><br/>
		文章分类：<?php the_category(', ') ?><br/>
		标签：<?php if ( get_the_tags() ) { the_tags('', ', ', ' '); } else{ echo "暂无关键词";  } ?>
		<?php endwhile; endif;?></div>

	
							
		
		<div id="sidebarwidgit">
		
		
	<?php if ( ! dynamic_sidebar( '单篇文章的Sidebar' )) : ?>
	
	<?php endif; ?>
	</div>
		

</aside>


<script type="text/javascript">
		$("#loadbar").show();
		$("#loadbar div").animate({width:"80%"});
</script>