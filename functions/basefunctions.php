<?php


	// Time Ago by Fanr
	function time_ago( $type = 'commennt', $day = 30 ) {
		$d = $type == 'post' ? 'get_post_time' : 'get_comment_time';
		$timediff = time() - $d('U');
		if ($timediff <= 60*60*24*$day){
		echo  human_time_diff($d('U'), strtotime(current_time('mysql', 0))), '前';
		}
		if ($timediff > 60*60*24*$day){
		echo  date('Y/m/d',get_comment_date('U')), ' ', get_comment_time('H:i');
		};
	}

	
	


		
	// enables wigitized sidebars 注册sidebar
	if ( function_exists('register_sidebar') )
	register_sidebar(array('name'=>'Sidebar',
		'before_widget' => '<div class="widgit-area">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	
	if ( function_exists('register_sidebar') )
	register_sidebar(array('name'=>'单篇文章的Sidebar',
		'before_widget' => '<div class="widgit-area">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	
		
	//去除WordPress自动插入原生相册样式代码
	function remove_css_gal() {
	return "\n" . '<div class="gallery">';
	}
	add_filter( 'gallery_style', 'remove_css_gal', 9 );
	
	
	// 自定义头像 =	
	function fb_addgravatar( $avatar_defaults ) {
	$myavatar = get_bloginfo('template_directory') . '/images/defaultavatar.png';
	  $avatar_defaults[$myavatar] = '自定义头像';
	  return $avatar_defaults;
	}
	add_filter( 'avatar_defaults', 'fb_addgravatar' );
	
	
	// post thumbnail support 缩略图支持
	add_theme_support( 'post-thumbnails' );
function post_thumbnail( $width = 150,$height = 150 ){
    global $post;
    if( has_post_thumbnail() ){
        $timthumb_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
        $post_timthumb = '<a href="'.get_permalink().'"><img src="'.get_bloginfo("template_url").'/timthumb.php?src='.$timthumb_src[0].'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1" alt="'.$post->post_title.'" class="thumb" title="'.get_the_title().'"/></a>';
        echo $post_timthumb;
    } else {
			$content = $post->post_content;
			preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
			$n = count($strResult[1]);
			if($n > 0){
				echo '<a href="'.get_permalink().'"><img src="'.get_bloginfo("template_url").'/timthumb.php?w=150&h=150&src='.$strResult[1][0].'" title="'.get_the_title().'"/></a>';
			} else {
				echo '<a href="'.get_permalink().'"><img src="'.get_bloginfo('template_url').'/images/random/'.rand(1,10).'.jpg" title="'.get_the_title().'" /></a>';
			}
		}
	}
	

	
	// custom menu support WP菜单
	add_theme_support( 'menus' );
	if ( function_exists( 'register_nav_menus' ) ) {
	  	 register_nav_menus(
      array(
         'header-menu' => __( '导航自定义菜单' )
      )
   );
	}


	
	// enable threaded comments
	function enable_threaded_comments(){
	if (!is_admin()) {
		if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
			wp_enqueue_script('comment-reply');
		}
	}
	add_action('get_header', 'enable_threaded_comments');

	
	// removes detailed login error information for security 移除wordpress登陆漏洞
	add_filter('login_errors',create_function('$a', "return null;"));
	
	
	//禁用半角符号自动转换为全角
	remove_filter('the_content', 'wptexturize');
	
	
	// 只搜索文章，排除页面
	add_filter('pre_get_posts','search_filter');
	function search_filter($query) {
	if ($query->is_search) {$query->set('post_type', 'post');}
	return $query;}
	
	
	// 新窗口打开评论链接
	function hu_popuplinks($text) {
		$text = preg_replace('/<a (.+?)>/i', "<a $1 target='_blank'>", $text);
		return $text;
	}
	add_filter('get_comment_author_link', 'hu_popuplinks', 6);
	
	
	// 反全英文垃圾评论
	function scp_comment_post( $incoming_comment ) {
		$pattern = '/[一-龥]/u';
		
		if(!preg_match($pattern, $incoming_comment['comment_content'])) {
			err( "You should type some Chinese word (like \"你好\") in your comment to pass the spam-check, thanks for your patience! 您的评论中必须包含汉字!" );
		}
		return( $incoming_comment );
	}
	add_filter('preprocess_comment', 'scp_comment_post');
	


	
	
	
	
	// custom excerpt ellipses for 2.9+  Read More的截断及跳转
	function custom_excerpt_more($more) {
		return 'Read More &raquo;';
	}
	add_filter('excerpt_more', 'custom_excerpt_more');	
	// no more jumping for read more link
	function remove_more_jump_link($link) {return preg_replace('/#more-\d+/i','',$link);}
	add_filter('the_content_more_link', 'remove_more_jump_link');
	
	
	/**
	 * when comment check the comment_author comment_author_email
	 * @param unknown_type $comment_author
	 * @param unknown_type $comment_author_email
	 * @return unknown_type
	 *防止访客冒充博主发表评论 by Winy
	 */
	function CheckEmailAndName(){
		global $wpdb;
		$comment_author       = ( isset($_POST['author']) )  ? trim(strip_tags($_POST['author'])) : null;
		$comment_author_email = ( isset($_POST['email']) )   ? trim($_POST['email']) : null;
		if(!$comment_author || !$comment_author_email){
			return;
		}
		$result_set = $wpdb->get_results("SELECT display_name, user_email FROM $wpdb->users WHERE display_name = '" . $comment_author . "' OR user_email = '" . $comment_author_email . "'");
		if ($result_set) {
			if ($result_set[0]->display_name == $comment_author){
				err(__('警告: 您不能用这个昵称，因为这是博主的昵称！'));
			}else{
				err(__('警告: 您不能使用该邮箱，因为这是博主的邮箱！'));
			}
			fail($errorMessage);
		}
	}
	add_action('pre_comment_on_post', 'CheckEmailAndName');

	
	function catch_first_image() {
		global $post, $posts;
		$first_img = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		$first_img = $matches [1] [0];
		if(empty($first_img)){
			$random = mt_rand(1, 13);
			echo get_bloginfo ( 'stylesheet_directory' );
			echo '/images/random/'.$random.'.jpg';
		}
		return $first_img;
	}

?>