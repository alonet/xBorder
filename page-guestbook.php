<?php 
/*
Template Name: 留言簿模板
*/ 
?>
<?php get_header(); ?>

<style>
.wall img{
	width:42px; 
	height:42px; 
	position:absolute;
	background:none repeat scroll 0 0 #F9F9F9; 
	padding:1px;
	opacity: 1;
	border: 1px solid #CCC;
	-webkit-transition:all 1s ease-in-out;
    -moz-transition:all 1s ease-in-out;
    -o-transition:all 1s ease-in-out;
    -ms-transition:all 1s ease-in-out;    
    transition:all 1s ease-in-out;
}
.wall img:hover {
opacity: 0;
	-webkit-transform:rotate(540deg) scale(2,2);
    -moz-transform:rotate(540deg) scale(2,2);
    -o-transform:rotate(540deg) scale(2,2);
    -ms-transform:rotate(540deg) scale(2,2);
    transform:rotate(540deg) scale(2,2);     
	z-index:999;
}
</style>
	<article>       
				
		
	    <div id="content">
			<div class="bigfa-content">	
				<div class="breadcrumbsclear"><div class="breadcrumbs"><li><a href="<?php bloginfo('url'); ?>">Home&nbsp;</a> &gt; <?php the_title(); ?></li></div></div>
				<!-- start wall -->	
			
					<div class="wall">
						<ul>
							<?php 
								$query="SELECT COUNT(comment_ID) AS cnt, comment_author, comment_author_url, comment_author_email FROM (SELECT * FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->posts.ID=$wpdb->comments.comment_post_ID) WHERE comment_date > date_sub( NOW(), INTERVAL 1 MONTH ) AND user_id='0' AND comment_author_email != 'lonelyxue@gmail.com' AND post_password='' AND comment_approved='1' AND comment_type='') AS tempcmt GROUP BY comment_author_email ORDER BY cnt DESC LIMIT 30";
								$wall = $wpdb->get_results($query); 
								foreach ($wall as $comment) 
								{ 
									if( $comment->comment_author_url ) 
									$url = $comment->comment_author_url; 
									else $url="#"; 
									$tmp = "<li><a href='".$url."' target='_blank' title='".$comment->comment_author." (".$comment->cnt." Comments)'>".get_avatar($comment->comment_author_email, 80)."</a></li>"; 
									$output .= $tmp; 
								 } 
								echo $output ;
							?>
						</ul>
					</div>
					<!-- end wall -->
					
					<div class="clear"></div>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<div class="content-content">	
					<?php the_content(); ?>
					</div>
					
					<?php comments_template( '/comments.php', true ); ?>
				
					<?php endwhile; endif;?>       
					<div class="clear"></div>					
								
			</div> 			
			</div>		
			<?php include('sidebar-single.php'); ?>
		<div class="clear"></div> </article> 
		<?php get_footer(); ?>
	