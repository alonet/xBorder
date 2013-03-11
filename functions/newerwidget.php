<?php

class xBorder_widget1 extends WP_Widget {
     function xBorder_widget1() {
         $widget_ops = array('description' => '主题自带的标签云小工具');
         $this->WP_Widget('xBorder_widget1', 'X-标签云', $widget_ops);
     }
     function widget($args, $instance) {
         extract($args);
         $limit = strip_tags($instance['limit']);
         echo $before_widget;
?> 
         <h3><div class="sidebartags">标签云</div></h3>
		 <div class="tags"><?php wp_tag_cloud( array('unit' => 'px', 'smallest' => 12, 'largest' => 12, 'number' => $limit, 'format' => 'flat', 'orderby' => 'count', 'order' => 'DESC' )); ?></div>		
<?php		 
         echo $after_widget;
     }
     function update($new_instance, $old_instance) {
         if (!isset($new_instance['submit'])) {
             return false;
         }
         $instance = $old_instance;
         $instance['limit'] = strip_tags($new_instance['limit']);
         return $instance;
     }
     function form($instance) {
         global $wpdb;
         $instance = wp_parse_args((array) $instance, array('limit' => ''));
         $limit = strip_tags($instance['limit']);
 ?>
         <p><label for="<?php echo $this->get_field_id('limit'); ?>">显示数量：<input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="text" value="<?php echo $limit; ?>" /></label></p>
         <input type="hidden" id="<?php echo $this->get_field_id('submit'); ?>" name="<?php echo $this->get_field_name('submit'); ?>" value="1" />
 <?php
     }
 }
 add_action('widgets_init', 'xBorder_widget1_init');
 function xBorder_widget1_init() {
     register_widget('xBorder_widget1');
 }

///////////////////
class xBorder_widget2 extends WP_Widget {
     function xBorder_widget2() {
         $widget_ops = array('description' => '最新评论');
         $this->WP_Widget('xBorder_widget2', 'X-最新评论', $widget_ops);
     }
     function widget($args, $instance) {
         extract($args);
         $title = apply_filters('widget_title',esc_attr($instance['title']));
         $limit = strip_tags($instance['limit']);
		 $email = strip_tags($instance['email']);
         echo $before_widget;
?> <h3><div class="recentcommentsh3">最近评论</div></h3><div class="siderbarcom">
         <ul class="commm">
						<?php
						global $wpdb;
						$my_email ="'" . $email . "'";
						$rc_comms = $wpdb->get_results("
						 SELECT ID, post_title, comment_ID, comment_author,comment_author_email, comment_content
						 FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts
						 ON ($wpdb->comments.comment_post_ID  = $wpdb->posts.ID)
						 WHERE comment_approved = '1'
						 AND comment_type = ''
						 AND post_password = ''
						 AND comment_author_email != $my_email
						 ORDER BY comment_date_gmt
						 DESC LIMIT $limit
						 ");
						$rc_comments = '';
						foreach ($rc_comms as $rc_comm) { //get_avatar($rc_comm,$size='50')
						$rc_comments .= "<li><a href='"
						. get_permalink($rc_comm->ID) . "#comment-" . $rc_comm->comment_ID
						. "' title='在 " . $rc_comm->post_title . " 发表的评论'><span class='comer'>".$rc_comm->comment_author." : </span>". $rc_comm->comment_content ."</a></li>\n";
						}
						
						echo $rc_comments;
						?>	

		</ul></div>
		 
<?php		 
         echo $after_widget;
     }
     function update($new_instance, $old_instance) {
         if (!isset($new_instance['submit'])) {
             return false;
         }
         $instance = $old_instance;
         $instance['title'] = strip_tags($new_instance['title']);
         $instance['limit'] = strip_tags($new_instance['limit']);
		 $instance['email'] = strip_tags($new_instance['email']);
         return $instance;
     }
     function form($instance) {
         global $wpdb;
         $instance = wp_parse_args((array) $instance, array('title'=> '', 'limit' => '', 'email' => ''));
         $title = esc_attr($instance['title']);
         $limit = strip_tags($instance['limit']);
		 $email = strip_tags($instance['email']);
 ?>
         <p>
             <label for="<?php echo $this->get_field_id('title'); ?>">标题：<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
         </p>
         <p>
             <label for="<?php echo $this->get_field_id('limit'); ?>">显示数量：<input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="text" value="<?php echo $limit; ?>" /></label>
         </p>
		 <p>
             <label for="<?php echo $this->get_field_id('email'); ?>">输入你的邮箱以排除显示你的回复: <br>（留空则不排除）<input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" /></label>
         </p>
         <input type="hidden" id="<?php echo $this->get_field_id('submit'); ?>" name="<?php echo $this->get_field_name('submit'); ?>" value="1" />
 <?php
     }
 }
 add_action('widgets_init', 'xBorder_widget2_init');
 function xBorder_widget2_init() {
     register_widget('xBorder_widget2');
 }
 


  
 
 
/////////////随机文章////////////

class xBorder_widget4 extends WP_Widget {
     function xBorder_widget4() {
         $widget_ops = array('description' => '配合主题样式');
         $this->WP_Widget('xBorder_widget4', 'X-随机文章', $widget_ops);
     }
     function widget($args, $instance) {
         extract($args);
         
         $limit = strip_tags($instance['limit']);
         echo $before_widget;
?> <h3><div class="randomposts">随机文章</div></h3>
		<ul class="ulstyle">
		<?php $posts = query_posts($query_string . "orderby=rand&showposts=$limit()" ); ?>  
				<?php while(have_posts()) : the_post(); ?> 
                <li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a><span class="sidebaraction"></span></li> 
        <?php endwhile; ?> 
		</ul>
		 
<?php		 
         echo $after_widget;
     }
     function update($new_instance, $old_instance) {
         if (!isset($new_instance['submit'])) {
             return false;
         }
         $instance = $old_instance;
        
         $instance['limit'] = strip_tags($new_instance['limit']);
         return $instance;
     }
     function form($instance) {
         global $wpdb;
         $instance = wp_parse_args((array) $instance, array('limit' => ''));
        
         $limit = strip_tags($instance['limit']);
 ?>
        
         <p>
             <label for="<?php echo $this->get_field_id('limit'); ?>">显示数量：<input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="text" value="<?php echo $limit; ?>" /></label>
         </p>
         <input type="hidden" id="<?php echo $this->get_field_id('submit'); ?>" name="<?php echo $this->get_field_name('submit'); ?>" value="1" />
 <?php
     }
 }
 add_action('widgets_init', 'xBorder_widget4_init');
 function xBorder_widget4_init() {
     register_widget('xBorder_widget4');
 }
 /////////////////
 
 
 /////////////友情链接/////////
class  xBorder_widget5 extends WP_Widget {
     function xBorder_widget5() {
         $widget_ops = array('description' => '双栏的友情链接，只支持一级目录');
         $this->WP_Widget('xBorder_widget5', 'X-友情链接', $widget_ops);
     }
     function widget($args, $instance) {
         extract($args);
        
         $limit = strip_tags($instance['limit']);
		 $orderby = strip_tags($instance['orderby']);
		 $cats = strip_tags($instance['cats']);
        echo $before_widget;
?> 
<h3><div class="sidebarlinks">友情链接</div></h3>
         <ul  class="tworow clearfix">
			<?php wp_list_bookmarks( array(
			'limit' => $limit,
			'hide_empty' => 1,
			'category'  => $cats,
			'categorize' => 0,
			'title_li' => '',
			'orderby' => $orderby,
			'order' => 'ASC',
			'echo' => 1
			)
			);
		?>
		</ul>		
		 
<?php		 
         echo $after_widget;
     }
     function update($new_instance, $old_instance) {
         if (!isset($new_instance['submit'])) {
             return false;
         }
         $instance = $old_instance;          
         $instance['limit'] = strip_tags($new_instance['limit']);
		 $instance['orderby'] = strip_tags($new_instance['orderby']);
		 $instance['cats'] = strip_tags($new_instance['cats']);
         return $instance;
     }
     function form($instance) {
         global $wpdb;
         $instance = wp_parse_args((array) $instance, array('limit' => '-1', 'cats' => '', 'orderby' => 'name'));        
         $limit = strip_tags($instance['limit']);
		 $orderby = strip_tags($instance['orderby']);
		 $cats = strip_tags($instance['cats']);
 ?>
         
         <p>
             <label for="<?php echo $this->get_field_id('limit'); ?>">数量：默认“-1”为全部显示。<br>如果需要限时数量，输入具体数值<input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="text" value="<?php echo $limit; ?>" /></label>
         </p>
		  <p>
             <label for="<?php echo $this->get_field_id('cats'); ?>">显示分类：<br>● 默认不填写即显示所有分类里的链接<br>● 填写某分类的ID，显示此分类下的链接<input class="widefat" id="<?php echo $this->get_field_id('cats'); ?>" name="<?php echo $this->get_field_name('cats'); ?>" type="text" value="<?php echo $cats; ?>" /></label>
         </p>
		 <p>
             <label for="<?php echo $this->get_field_id('orderby'); ?>">排序：<br>● 默认“name”按名称排列<br>● 如果需要其他排列，输入相应的排序形式。<a target="_blank" href="http://codex.wordpress.org/Function_Reference/wp_list_bookmarks">查看orderby排序参数</a><input class="widefat" id="<?php echo $this->get_field_id('orderby'); ?>" name="<?php echo $this->get_field_name('orderby'); ?>" type="text" value="<?php echo $orderby; ?>" /></label>
         </p>
         <input type="hidden" id="<?php echo $this->get_field_id('submit'); ?>" name="<?php echo $this->get_field_name('submit'); ?>" value="1" />
 <?php
     }
 }
 add_action('widgets_init', 'xBorder_widget_init5');
 function xBorder_widget_init5() {
     register_widget('xBorder_widget5');
 }
 //////////////////////////////////////////////////////////

class xBorder_widget6 extends WP_Widget {
    function xBorder_widget6() {
        $widget_ops = array('description' => '主题自带的边栏用户管理小工具');
        $this->WP_Widget('xBorder_widget6', 'X-用户管理', $widget_ops);
    }
    function widget($args, $instance) {
        extract($args);
		echo $before_widget;
?>
	<h3><div class="usercontrol">用户管理</div></h3>
		<ul class="tworow clearfix">
			<li><a href="<?php bloginfo('url') ?>/wp-admin/" target="_blanlk">登录网站</a></li>
			<li><a href="<?php bloginfo('url') ?>/wp-register.php/" target="_blanlk">用户注册</a></li>
			<li><a href="<?php bloginfo('url') ?>/wp-admin/post-new.php" target="_blanlk">撰写文章</a></li>
			<li><a href="<?php bloginfo('url') ?>/wp-admin/edit-comments.php" target="_blanlk">评论管理</a></li>
		</ul> 
<?php	
	  echo $after_widget;
   }
    function form($instance) {
        global $wpdb;
?>
    <p>该工具没有选项!</p>
<?php
    }
}
add_action('widgets_init', 'xBorder_widget6_init');
function xBorder_widget6_init() {
    register_widget('xBorder_widget6');
}
//////////////////////////////////////////////////////////

class xBorder_widget7 extends WP_Widget {
    function xBorder_widget7() {
        $widget_ops = array('description' => '主题自带的边栏网站统计小工具');
        $this->WP_Widget('xBorder_widget7', 'X-网站统计', $widget_ops);
    }
    function widget($args, $instance) {
        extract($args);
		echo $before_widget;
?>
	<h3><div class="webcount">网站统计</div></h3>
		<ul class="tworow clearfix">
			<li>文章总数：<?php $count_posts = wp_count_posts();echo $published_posts = $count_posts->publish;?>篇</li>
			<li>评论总数：<?php $count_comments = get_comment_count();echo $count_comments['approved'];?>条</li>
			<li>页面总数：<?php $count_pages = wp_count_posts('page'); echo $page_posts = $count_pages->publish; ?> 个</li>
			<li>分类总数：<?php echo $count_categories = wp_count_terms('category'); ?>个</li>
			<li>标签总数：<?php echo $count_tags = wp_count_terms('post_tag'); ?>个</li>
		</ul> 
<?php	
	  echo $after_widget;
   }
    function form($instance) {
        global $wpdb;
?>
    <p>该工具没有选项!</p>
<?php
    }
}
add_action('widgets_init', 'xBorder_widget7_init');
function xBorder_widget7_init() {
    register_widget('xBorder_widget7');
}
class xBorder_widget8 extends WP_Widget {
    function xBorder_widget8() {
        $widget_ops = array('description' => '主题自带的热门文章小工具');
        $this->WP_Widget('xBorder_widget8', 'X-热门文章', $widget_ops);
    }
    function widget($args, $instance) {
        extract($args);
        $limit = strip_tags($instance['limit']);
		$poptime = strip_tags($instance['poptime']);
        echo $before_widget;	
?>
		<h3><div class="popularposts">热门文章</div></h3>

		<ul class="ulstyle">
			<?php if(function_exists('most_comm_posts')) most_comm_posts( $poptime , $limit ); ?>
		</ul>
<?php	
        echo $after_widget;
    }
	
    function update($new_instance, $old_instance) {
        if (!isset($new_instance['submit'])) {
            return false;
        }
        $instance = $old_instance;
        $instance['limit'] = strip_tags($new_instance['limit']);
		$instance['poptime'] = strip_tags($new_instance['poptime']);
        return $instance;
    }
    function form($instance) {
        global $wpdb;
        $instance = wp_parse_args((array) $instance, array('limit' => ''));
        $limit = strip_tags($instance['limit']);
		$poptime = strip_tags($instance['poptime']);
?>
        
    <p><label for="<?php echo $this->get_field_id('limit'); ?>">文章数量：<input id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="text" value="<?php echo $limit; ?>" /></label></p>
	<p><label for="<?php echo $this->get_field_id('poptime'); ?>" >热评文章时间范围:<br>（例如希望Popular栏目显示90天内评论最多的文章，则输入“90”）<input id="<?php echo $this->get_field_id('poptime'); ?>" name="<?php echo $this->get_field_name('poptime'); ?>" type="text" value="<?php echo $poptime; ?>" /></label></p>
    <input type="hidden" id="<?php echo $this->get_field_id('submit'); ?>" name="<?php echo $this->get_field_name('submit'); ?>" value="1" />
<?php
    }
}
add_action('widgets_init', 'xBorder_widget8_init');
function xBorder_widget8_init() {
    register_widget('xBorder_widget8');
}

class xBorder_widget9 extends WP_Widget {
    function xBorder_widget9() {
        $widget_ops = array('description' => '主题自带的文章分类小工具');
        $this->WP_Widget('xBorder_widget9', 'X-文章分类', $widget_ops);
    }
    function widget($args, $instance) {
        extract($args);
        echo $before_widget;	
?>
		<h3><div class="categories">文章分类</div></h3>

		<ul class="tworow clearfix"><?php wp_list_categories('&title_li='); ?></ul>
<?php	
        echo $after_widget;
    }
    function form($instance) {
        global $wpdb;
?>
    <p>该工具没有选项!</p>
<?php
    }
}
add_action('widgets_init', 'xBorder_widget9_init');
function xBorder_widget9_init() {
    register_widget('xBorder_widget9');
}
class xBorder_widget10 extends WP_Widget {
    function xBorder_widget10() {
        $widget_ops = array('description' => '主题自带的最近文章小工具');
        $this->WP_Widget('xBorder_widget10', 'X-最近文章', $widget_ops);
    }
    function widget($args, $instance) {
        extract($args);
        $limit = strip_tags($instance['limit']);
        echo $before_widget;
?>
		<h3><div class="recentposts">最近文章</div></h3>

		<ul class="ulstyle">
			<?php $posts = query_posts($query_string . "orderby=date&showposts=$limit()" ); ?>  
				<?php while(have_posts()) : the_post(); ?> 
                <li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></li> 
        <?php endwhile; ?> 
		</ul>
<?php	
        echo $after_widget;
    }
	
    function update($new_instance, $old_instance) {
        if (!isset($new_instance['submit'])) {
            return false;
        }
        $instance = $old_instance;
        $instance['limit'] = strip_tags($new_instance['limit']);
        return $instance;
    }
    function form($instance) {
        global $wpdb;
        $instance = wp_parse_args((array) $instance, array('limit' => ''));
        $limit = strip_tags($instance['limit']);
?>  
    <p><label for="<?php echo $this->get_field_id('limit'); ?>">文章数量：<input id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="text" value="<?php echo $limit; ?>" /></label></p>
    <input type="hidden" id="<?php echo $this->get_field_id('submit'); ?>" name="<?php echo $this->get_field_name('submit'); ?>" value="1" />
<?php
    }
}
add_action('widgets_init', 'xBorder_widget10_init');
function xBorder_widget10_init() {
    register_widget('xBorder_widget10');
}

//////////////////////////////////////////////////////////

?>