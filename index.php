<?php get_header(); ?>
<article>
  <div id="content">
   <div class="topnote">自己偷偷升级成xBoder+，增加了主题的可控性~</a>
   <div class="remove"><a onclick="$('.topnote').slideUp('slow');" href="javascript:void(0)" title="关闭">×</a></div>
   </div>
   <div class="content-inside">
 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   <div class="post">
	
    <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark">
      <?php the_title(); ?>
      </a></h2>
    

    <div class="post-content">
      <?php the_content(__('readmore'));?>
    </div>
	<div class="post-meta"> <span>
      Posted By <?php the_author() ?> Under <?php the_category(', ') ?> In <?php the_time('d,m,Y')?> / <?php comments_popup_link('No Reply', '1 Reply', '% Replies'); ?>
      </span> </div>
		
		</div>
    <div class="sep"></div>
    <?php endwhile; endif;?>
    <nav class="pagenavi cf">
      <?php if (  $wp_query->max_num_pages > 1 ) : ?>
      <div id="pagenavi">
        <?php pagenavi(); ?>
      </div>
      <?php endif; ?>
    </nav>
	</div><div class="loop-loading"></div>
  </div>
  <!--#end content--> 	
  <?php get_sidebar(); ?>
  
 
</article>
 <?php get_footer(); ?>

