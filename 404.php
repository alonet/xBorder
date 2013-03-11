<?php get_header(); ?>
	<article>      
						
						
				<div id="content">				
					<div class="errortitle">404 ERROR！</div>					
					<div class="error-404">
						对不起，你请求的页面不存在！请 <a href="<?php bloginfo('url');?>"> 返回首页 </a>或者看看下面的随机文章
					</div>	
					<?php query_posts(array('orderby' => 'rand', 'showposts' => 30));if (have_posts()) : while (have_posts()) : the_post();?>					
					<span id="search-no-result-order">
						<ul><li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <?php comments_number('', '(1 Comment)', '(% Comments)'); ?></li></ul>
					</span>					
					<?php endwhile;endif; ?>													
				</div>				
						
			<?php get_sidebar(); ?>
		 </article>
	
		<?php get_footer(); ?>
	