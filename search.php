<?php get_header(); ?>
	<article>      
							
						
				<div id="content">
					<div class="content-header"></div>	  			
					<div class="Search_title">搜索&nbsp;“<?php the_search_query(); ?>”&nbsp;的结果</div>       
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="post">
						<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark">
      <?php the_title(); ?>
      </a></h2>
    <div class="post-meta"> <span>
      <?php the_time('D,g:h A'); ?>
      </span> | <span>
      <?php the_category(', ') ?>
      </span> | <span>
      超过<?php if(function_exists('the_views')) { the_views(); } ?>人围观
      </span> | <span>
      <?php comments_popup_link('还没有评论', '只有1条评论', '已有%条评论'); ?>
      </span> </div>
    <!--.postMeta-->
							<div class="post-content">
							<?php if($options['thumbnail']) : ?>
							<div class="selfthum"><?php post_thumbnail( 150,150 ); ?></div>
                    		<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 370,"……"); ?>														
					<span class="more-link"><a href="<?php the_permalink() ?>" rel="nofollow"></a></span>
					</div>	
					<?php else : ?>
							
							<?php the_content(__('阅读全文'));?>
				</div>						
			<?php endif; ?></div>
					<div class="sep"></div> 
					
						      
				<?php endwhile; endif;?>	
	<nav class="pagenavi cf">
			<?php if (  $wp_query->max_num_pages > 1 ) : ?>
							<div id="pagenavi"><?php pagenavi(); ?></div>
			<?php endif; ?>
			
		</nav>					
				</div><!--#end content-->	
			<?php get_sidebar(); ?>
		</article> 
		<?php get_footer(); ?>
	