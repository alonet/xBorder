<?php

function past_date() {
	global $post;
	$suffix = '前';
	$day = '天';
	$hour = '小时';
	$minute = '分钟';
	$second = '秒';
	$m = 60;
	$h = 3600;
	$d = 86400;
	$post_time = get_post_time('G', true, $post);
	$past_time = time() - $post_time;
	if ($past_time < $m) {
		$past_date = $past_time . $second;
	} else if ($past_time < $h) {
		$past_date = $past_time / $m;
		$past_date = floor($past_date);
		$past_date .= $minute;
	} else if ($past_time < $d) {
		$past_date = $past_time / $h;
		$past_date = floor($past_date);
		$past_date .= $hour;
	} else if ($past_time < $d * 30) {
		$past_date = $past_time / $d;
		$past_date = floor($past_date);
		$past_date .= $day;
	} else {
		echo get_post_time('n月j日');
		return;
	} 
	echo $past_date . $suffix;
	}
	add_filter('past_date', 'past_date');
add_filter('user_contactmethods','hide_profile_fields',10,1);
function hide_profile_fields( $contactmethods ) { // 隐藏ajm、jabber、yim这些无用的项目
	unset($contactmethods['aim']);
	unset($contactmethods['jabber']);
	unset($contactmethods['yim']);
	return $contactmethods;
}
 
add_filter('user_contactmethods','mfthemes_profile_fields',10,1);
function mfthemes_profile_fields( $contactmethods ) {
	$contactmethods['cover'] = __('cover', 'lovephoto'); // 添加一个封面设置
	$contactmethods['likes'] = __('likes', 'lovephoto'); // 添加一个喜欢设置
	return $contactmethods;
}
function most_comm_posts($days=7, $nums=10) { global $wpdb;$today = date("Y-m-d H:i:s"); $daysago = date( "Y-m-d H:i:s", strtotime($today) - ($days * 24 * 60 * 60) ); $result = $wpdb->get_results("SELECT comment_count, ID, post_title, post_date ,post_type FROM $wpdb->posts WHERE  post_type = 'post' AND post_date BETWEEN '$daysago' AND '$today' ORDER BY comment_count DESC LIMIT 0 , $nums");$output = '';if(empty($result)) {$output = '<li>None data.</li>';} else {foreach ($result as $topten) {$postid = $topten->ID;$title = $topten->post_title;$commentcount = $topten->comment_count;if ($commentcount != 0) {$output .= '<li><a href="'.get_permalink($postid).'" title="'.$title.'">'.$title.'</a> <span class="popularspan">('.$commentcount.')</span></li>';}}}echo $output;}
foreach(array(
        'rsd_link',//rel="EditURI"
        'index_rel_link',//rel="index"
        'start_post_rel_link',//rel="start"
        'wlwmanifest_link'//rel="wlwmanifest"
    ) as $xx)
    remove_action('wp_head',$xx);//X掉以上
function the_category_filter($thelist){
        return preg_replace('/rel=".*?"/','rel="tag"',$thelist);
    }  
    add_filter('the_category','the_category_filter');



add_theme_support( 'post-formats', array( 'status', 'audio') );



	// Truncated text
	function cut_str($string, $sublen, $start = 0, $code = 'UTF-8')
	{
	 if($code == 'UTF-8')
	 {
	 $pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
	 preg_match_all($pa, $string, $t_string);
	 if(count($t_string[0]) - $start > $sublen) return join('', array_slice($t_string[0], $start, $sublen))."...";
	 return join('', array_slice($t_string[0], $start, $sublen));
	 }
	 else
	 {
	 $start = $start*2;
	 $sublen = $sublen*2;
	 $strlen = strlen($string);
	 $tmpstr = '';
	 for($i=0; $i<$strlen; $i++)
	 {
	 if($i>=$start && $i<($start+$sublen))
	 {
	 if(ord(substr($string, $i, 1))>129) $tmpstr.= substr($string, $i, 2);
	 else $tmpstr.= substr($string, $i, 1);
	 }
	 if(ord(substr($string, $i, 1))>129) $i++;
	 }
	 if(strlen($tmpstr)<$strlen ) $tmpstr.= "...";
	 return $tmpstr;
	 }
	}
	
	 /* 禁用自动保存 */
	remove_action('pre_post_update','wp_save_post_revision'); 
	add_action('wp_print_scripts','disable_autosave'); 
	function disable_autosave(){  wp_deregister_script('autosave'); }
	 /* Mini Pagenavi v1.0 by Willin Kan. */
	function pagenavi( $p = 2 ) {if ( is_singular() ) return; global $wp_query, $paged;$max_page = $wp_query->max_num_pages;if ( $max_page == 1 ) return; if ( empty( $paged ) ) $paged = 1;echo '<span class="pagescout">Page: ' . $paged . ' of ' . $max_page . ' </span> '; if ( $paged > $p + 1 ) p_link( 1, '第 1 页' );if ( $paged > $p + 2 ) echo '... ';for( $i = $paged - $p; $i <= $paged + $p; $i++ ) { if ( $i > 0 && $i <= $max_page ) $i == $paged ? print "<span class='page-numbers current'>{$i}</span> " : p_link( $i );}if ( $paged < $max_page - $p - 1 ) echo '... ';if ( $paged < $max_page - $p ) p_link( $max_page, '最末页' );}
	function p_link( $i, $title = '' ) { if ( $title == '' ) $title = "第 {$i} 页";echo "<a class='page-numbers' href='", esc_html( get_pagenum_link( $i ) ), "' title='{$title}'>{$i}</a> ";}
	//END 
	// comment_mail_notify v1.0 by willin kan. (所有回覆都發郵件)
	function comment_mail_notify($comment_id) {
	$comment = get_comment($comment_id);
	$parent_id = $comment->comment_parent ? $comment->comment_parent : '';
	$spam_confirmed = $comment->comment_approved;
	if (($parent_id != '') && ($spam_confirmed != 'spam')) {
	$wp_email = 'no-reply@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME'])); //e-mail 發出點, no-reply 可改為可用的 e-mail.
	$to = trim(get_comment($parent_id)->comment_author_email);
	$subject = '你在 [' . get_option("blogname") . '] 的留言有了新回复';
	$message = '

	<div style="background-color:#eef2fa; border:1px solid #d8e3e8; color:#111; padding:0 15px; -moz-border-radius:5px; -webkit-border-radius:5px; -khtml-border-radius:5px; border-radius:5px;">
	<p><strong>' . trim(get_comment($parent_id)->comment_author) . ', 你好!</strong></p>
	<p><strong>您曾在《' . get_the_title($comment->comment_post_ID) . '》的留言为:</strong><br />'
	. trim(get_comment($parent_id)->comment_content) . '</p>
	<p><strong>' . trim($comment->comment_author) . ' 给你的回复是:</strong><br />'
	. trim($comment->comment_content) . '<br /></p>
	<p>你可以点击此链接 <a href="' . htmlspecialchars(get_comment_link($parent_id)) . '">查看完整内容</a></p><br />
	<p>欢迎再次来访<a href="' . get_option('home') . '">' . get_option('blogname') . '</a></p>
	<p>(此邮件为系统自动发送，请勿直接回复.)</p>
	</div>';

	$from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
	$headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
	wp_mail( $to, $subject, $message, $headers );
	  }
	}
	add_action('comment_post', 'comment_mail_notify');
	
	add_filter('got_rewrite', 'nginx_has_rewrites');
function nginx_has_rewrites() {
    return true;
}


add_filter('the_content', 'hlHighSlide_replace', '99');
add_action('wp_head', 'highslide_head');

    function highslide_head()
    {
    $hlHighslide_wp_url=get_bloginfo('template_url').'/';
    $defaults_javascript =  
    "\n\t<link href='{$hlHighslide_wp_url}highslide.css' rel='stylesheet' type='text/css' />
		<!--[if IE 6]>
		<link href='{$hlHighslide_wp_url}highslide-ie6.css' rel='stylesheet' type='text/css' />
		<![endif]-->
        <script type='text/javascript' src='{$hlHighslide_wp_url}highslide.js'></script>
    <script type='text/javascript'>
	hs.showCredits = false;  
    hs.graphicsDir = '{$hlHighslide_wp_url}graphics/';
	hs.wrapperClassName = 'wide-border';
    hs.align = 'center';
        hs.transitions = ['expand', 'crossfade'];
        hs.fadeInOut = true;
        hs.dimmingOpacity = 0.3;
		//hs.padToMinWidth = true;
        if (hs.addSlideshow) hs.addSlideshow({
            interval: 5000,
            repeat: false,
            useControls: true,
            fixedControls: 'fit',
            overlayOptions: {
                opacity: .6,
                position: 'bottom center',
                hideOnMouseOut: true
            }
        });
        hs.lang={
    loadingText :     '图片加载中...',
    loadingTitle :    '正在加载图片',
        closeText :       '关闭',
    closeTitle :      '关闭 (Esc)',
        moveTitle :       '移动图片',
        moveText :        '移动',
        restoreTitle :    '点击可关闭或拖动',
        fullExpandTitle : '点击查看原图',
        fullExpandText :  '查看原图'
        };
        hs.registerOverlay({
    html: '<div class=\"closebutton\" onclick=\"return hs.close(this)\" title=\"Close\"></div>',
    position: 'top right',
    fade: 2 // fading the semi-transparent overlay looks bad in IE
        });
        hs.Expander.prototype.onMouseOut = function (sender) {
        sender.close();
        };
        hs.Expander.prototype.onAfterExpand = function (sender) {
        if (!sender.mouseIsOver) sender.close();
         }
         </script>";
 echo $defaults_javascript;
 }
//add onclick event 
function add_onclick_replace ($content)
{ 
$pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
$replacement = '<a$1href=$2$3.$4$5 class="highslide"  onclick="return hs.expand(this)" $6>$7 </a>';
$content = preg_replace($pattern, $replacement, $content);
return $content;
}
function hlHighSlide_replace($content)
{
        global $post;
        $defaults = array();
        $defaults['quicktags'] = 'y';
        $defaults['alt'] = 'Enter ALT Tag Description';
        $defaults['title'] = 'Enter Caption Text';
        $defaults['thumbid'] = 'thumb1';
        $defaults['show_caption'] = 'y';
        $defaults['show_close'] = 'y';
        $content=add_onclick_replace($content);
        $HSVars = array("SRC", "ALT", "TITLE", "WIDTH", "HEIGHT","THUMBID");
        $HSVals = array($defaults['href'], $defaults['src'], $defaults['alt'], $defaults['title'], $defaults['thumbid']);
        preg_match_all ('!<img([^>]*)[ ]*[/]{1}>!i', $content, $matches);
        $HSStrings = $matches[0];
        $HSAttributes = $matches[1];
        for ($i = 0; $i < count($HSAttributes); $i++)
        { preg_match_all('!(src|alt|title|width|height|class)="([^"]*)"!i',$HSAttributes[$i],$matches);
          $HSSetVars = $HSSetVals = array();
          for ($j = 0; $j < count($matches[1]); $j++)
            { $HSSetVars[$j] = strtoupper($matches[1][$j]);
              $HSSetVals[$j] = $matches[2][$j];}
		}
        $HSClose = <<<EOT
                <a href="#" onclick="hs.close(this);return false;" class="highslide-close"  title="关闭">Close</a>  
EOT;
                $HSCaption = <<<EOT
                <div class='highslide-caption' id='caption-for-%THUMBID%'>
                {$HSPrvNextLinks}           
                {$HSClose}  
                <div style="clear:both">%TITLE%</div>
                </div>
EOT;
            $HSCode = <<<EOT
<img id="%THUMBID%" src="%SRC%" alt="%ALT%" title="%TITLE%" width="%WIDTH%"  height="%HEIGHT%" />{$HSCaption}
EOT;
          $content = str_replace($HSStrings[$i], $HSCode, $content);
        return $content;
    }
	

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

include_once('functions/shortcode.php');
include_once('functions/themeset.php');
include_once('functions/newerwidget.php');
include_once('functions/commentlists.php');
include_once('functions/archives.php');
?>