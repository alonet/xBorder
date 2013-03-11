<?php
////////////////ThemeOptions
	class NewerOptions {
	function getOptions() {
		$options = get_option('Newer_options');
		if (!is_array($options)) {
			
			$options['description_content'] = '';
			$options['keyword_content'] = '';
			$options['footercode'] = '';
			$options['imageLogo'] = false;
			/*外观*/
			
			$options['favicon_ck'] = false;
			$options['custom_favicon'] = '';
			$options['hovertotran'] = false;
			$options['hovertoclear'] = false;
			$options['isie'] = false;
		
			/*********侧边栏*********/

			$options['sidebar_post'] = false;
			$options['sidebar_recentComments'] = false;
			$options['favewebson'] = false;
			$options['notice_content'] = '';
			/**幻灯片的**/
				
			
			/*广告*/
			$options['sidebarad'] = false;
			$options['sidebaradcode'] = '';
			/*****页面模板*****/
			/*关于*/			
			$options['about_img'] = '';
			$options['about_content'] = '';
			$options['about_title'] = '';
			
			/*功能*/					
			
			$options['colorbox'] = false;
			
			$options['glide'] = false;
			$options['thumbnail'] = false;
			
			$options['topnotice'] = false;
			/*SNS*/
			$options['snsicon'] = false;
			$options['rss_select'] = false;			
			$options['twitter_select'] = false;
			$options['twitter_url'] = ''; 
			$options['facebook_select'] = false;
			$options['facebook_url'] = ''; 
			$options['da_select'] = false;
			$options['da_url'] = ''; 
			$options['googleplus_select'] = false;
			$options['googleplus_url'] = ''; 
			$options['dribbble_select'] = false;
			$options['dribbble_url'] = ''; 
			$options['flicker_select'] = false;
			$options['flicker_url'] = ''; 
			$options['spotify_select'] = false;
			$options['spotify_url'] = ''; 
			$options['tumblr_select'] = false;
			$options['tumblr_url'] = ''; 
			$options['weibo_select'] = false;
			$options['weibo_url'] = '';
            $options['qqweibo_select'] = false;
			$options['qqweibo_url'] = ''; 			
		    $options['kaixin_select'] = false;
			$options['kaixin_url'] = ''; 
			$options['renren_select'] = false;
			$options['renren_url'] = ''; 
			$options['douban_select'] = false;
			$options['douban_url'] = '';
            $options['sohu_select'] = false;
			$options['sohu_url'] = '';
            $options['wangyi_select'] = false;
			$options['wangyi_url'] = '';			
			update_option('Newer_options', $options);
		}
		return $options;
	}
	/* -- 初始化 -- */
	function init() {
		if(isset($_POST['Newer_save'])) {
			$options = NewerOptions::getOptions();
			// 数据限制		
			
			$options['description_content'] = stripslashes($_POST['description_content']);
			$options['keyword_content'] = stripslashes($_POST['keyword_content']);			
			$options['footercode'] = stripslashes($_POST['footercode']);

			/*外观的*/
			if ($_POST['cursor_mac']) { $options['cursor_mac'] = (bool)true; } else { $options['cursor_mac'] = (bool)false; }			
			if ($_POST['logo_url_ck']) { $options['logo_url_ck'] = (bool)true; } else { $options['logo_url_ck'] = (bool)false; }	
			$options['logo_url'] = stripslashes($_POST['logo_url']);
			if ($_POST['favicon_ck']) { $options['favicon_ck'] = (bool)true; } else { $options['favicon_ck'] = (bool)false; }			
			$options['custom_favicon'] = stripslashes($_POST['custom_favicon']);
			if ($_POST['hovertotran']) { $options['hovertotran'] = (bool)true; } else { $options['hovertotran'] = (bool)false; }
			if ($_POST['hovertoclear']) { $options['hovertoclear'] = (bool)true; } else { $options['hovertoclear'] = (bool)false; }
			if ($_POST['isie']) { $options['isie'] = (bool)true; } else { $options['isie'] = (bool)false; }
			/*************侧边栏**************/
			
			if ($_POST['sidebar_post']) { $options['sidebar_post'] = (bool)true; } else { $options['sidebar_post'] = (bool)false; }
			if ($_POST['sidebar_recentComments']) { $options['sidebar_recentComments'] = (bool)true; } else { $options['sidebar_recentComments'] = (bool)false; }
			if ($_POST['favewebson']) { $options['favewebson'] = (bool)true; } else { $options['favewebson'] = (bool)false; }
			$options['notice_content'] = stripslashes($_POST['notice_content']);
			
			
			/*广告*/
			if ($_POST['sidebarad']) { $options['sidebarad'] = (bool)true; } else { $options['sidebarad'] = (bool)false; }
			$options['sidebaradcode'] = stripslashes($_POST['sidebaradcode']);
			
			
			/*关于*/
				$options['about_img'] = stripslashes($_POST['about_img']);
				$options['about_content'] = stripslashes($_POST['about_content']);
				$options['about_title'] = stripslashes($_POST['about_title']);	
				
			/*功能*/			
			
			
			if ($_POST['colorbox']) { $options['colorbox'] = (bool)true; } else { $options['colorbox'] = (bool)false; }
			
			if ($_POST['glide']) { $options['glide'] = (bool)true; } else { $options['glide'] = (bool)false; }
			if ($_POST['thumbnail']) { $options['thumbnail'] = (bool)true; } else { $options['thumbnail'] = (bool)false; }
			
			if ($_POST['topnotice']) { $options['topnotice'] = (bool)true; } else { $options['topnotice'] = (bool)false; }
			
			/*SNS*/
			if ($_POST['snsicon']) { $options['snsicon'] = (bool)true; } else { $options['snsicon'] = (bool)false; }
			if ($_POST['rss_select']) { $options['rss_select'] = (bool)true; } else { $options['rss_select'] = (bool)false; }
			if ($_POST['twitter_select']) { $options['twitter_select'] = (bool)true; } else { $options['twitter_select'] = (bool)false; }
			$options['twitter_url'] = stripslashes($_POST['twitter_url']);
			if ($_POST['facebook_select']) { $options['facebook_select'] = (bool)true; } else { $options['facebook_select'] = (bool)false; }
			$options['facebook_url'] = stripslashes($_POST['facebook_url']);
			if ($_POST['da_select']) { $options['da_select'] = (bool)true; } else { $options['da_select'] = (bool)false; }
			$options['da_url'] = stripslashes($_POST['da_url']);
			if ($_POST['googleplus_select']) { $options['googleplus_select'] = (bool)true; } else { $options['googleplus_select'] = (bool)false; }
			$options['googleplus_url'] = stripslashes($_POST['googleplus_url']);
			if ($_POST['dribbble_select']) { $options['dribbble_select'] = (bool)true; } else { $options['dribbble_select'] = (bool)false; }
			$options['dribbble_url'] = stripslashes($_POST['dribbble_url']);
			if ($_POST['flicker_select']) { $options['flicker_select'] = (bool)true; } else { $options['flicker_select'] = (bool)false; }
			$options['flicker_url'] = stripslashes($_POST['flicker_url']);
			if ($_POST['spotify_select']) { $options['spotify_select'] = (bool)true; } else { $options['spotify_select'] = (bool)false; }
			$options['spotify_url'] = stripslashes($_POST['spotify_url']);
			if ($_POST['tumblr_select']) { $options['tumblr_select'] = (bool)true; } else { $options['tumblr_select'] = (bool)false; }
			$options['tumblr_url'] = stripslashes($_POST['tumblr_url']);
			if ($_POST['weibo_select']) { $options['weibo_select'] = (bool)true; } else { $options['weibo_select'] = (bool)false; }
			$options['weibo_url'] = stripslashes($_POST['weibo_url']);
			if ($_POST['qqweibo_select']) { $options['qqweibo_select'] = (bool)true; } else { $options['qqweibo_select'] = (bool)false; }
			$options['qqweibo_url'] = stripslashes($_POST['qqweiboo_url']);
			if ($_POST['kaixin_select']) { $options['kaixin_select'] = (bool)true; } else { $options['kaixin_select'] = (bool)false; }
			$options['kaixin_url'] = stripslashes($_POST['kaixin_url']);
			if ($_POST['renren_select']) { $options['renren_select'] = (bool)true; } else { $options['renren_select'] = (bool)false; }
			$options['renren_url'] = stripslashes($_POST['renren_url']);
			if ($_POST['douban_select']) { $options['douban_select'] = (bool)true; } else { $options['douban_select'] = (bool)false; }
			$options['douban_url'] = stripslashes($_POST['douban_url']);
			if ($_POST['sohu_select']) { $options['sohu_select'] = (bool)true; } else { $options['sohu_select'] = (bool)false; }
			$options['sohu_url'] = stripslashes($_POST['sohu_url']);
			if ($_POST['wangyi_select']) { $options['wangyi_select'] = (bool)true; } else { $options['wangyi_select'] = (bool)false; }
			$options['wangyi_url'] = stripslashes($_POST['wangyi_url']);
			
			
			
			update_option('Newer_options', $options);
			echo "<div id='message' class='updated fade'><p><strong>设置已保存</strong></p></div>";
		} else {NewerOptions::getOptions();	}
		
		add_theme_page("主题设置", "主题设置", 'edit_themes', basename(__FILE__), array('NewerOptions', 'display'));
	}

	/* -- 标签页 -- */
	function display() {
		$options = NewerOptions::getOptions();
?>



 
 <style type="text/css">
.wrap{padding:10px; font-size:12px; line-height:24px;color:#383838;}
.devetable td{vertical-align:top;text-align: left;border:none ;font-size:12px; }
.top td{vertical-align: middle;text-align: left; border:none;font-size:12px;}
.submit {
    border-color: #DFDFDF;
    margin-left: 15px;
}
table{border:none;font-size:12px;}
pre{white-space: pre;overflow: auto;padding:0px;line-height:19px;font-size:12px;color:#898989;}
strong{ color:#666}
textarea{ width:100%; margin:0 20px 0 0;  overflow:auto}
.none{display:none;}
fieldset{ border:1px solid #ddd;margin:5px 0 10px;padding:10px 10px 20px 10px;-moz-border-radius:5px;-khtml-border-radius:5px;-webkit-border-radius:5px;border-radius:5px;}
fieldset:hover{border-color:#bbb;}
fieldset legend{padding:0 5px;color:#777;font-size:14px;font-weight:700;cursor:pointer}
fieldset .line{border-bottom:1px solid #e5e5e5;padding-bottom:15px;}
fieldset textarea{ padding:5px 5px;line-height:12px;-moz-border-radius:3px;-khtml-border-radius:3px;-webkit-border-radius:3px;border-radius:3px;}
</style>


<script type="text/javascript">
jQuery(document).ready(function($){  
$(".toggle").click(function(){$(this).next().slideToggle('slow')});
});
</script>



<form action="#" method="post" enctype="multipart/form-data" name="Newer_form" id="Newer_form" />

	<div class="wrap">

					<h2>主题设置</h2>
<table width="800" border="1" class="devetable">					
					<br/>		
					<fieldset>
					<legend class="toggle">基本设置</legend>
						<div class="none">
							<strong>网站描述</strong> （用简洁干练的话对你的网站进行描述）<br/><label><textarea name="description_content"  rows="4"  id="description_content" style="width:540px;"  ><?php echo($options['description_content']); ?></textarea></label>
							<br/><br/>						
							<strong>网站关键词</strong> （多个关键词请用英文逗号隔开）<br/><label><textarea name="keyword_content"  rows="2"  id="keyword_content" style="width:540px;" ><?php echo($options['keyword_content']); ?></textarea></label>
							<br/><br/>											
							<strong>网站统计代码输入</strong>（添加统计代码，为了不影响主题美观，不被显示是正常现象）<br/>
							<label><textarea name="footercode"  rows="5"  id="footercode" style="width:540px;"  ><?php echo($options['footercode']); ?></textarea></label>		
							<br/><br/>											
						</div>
					</fieldset>
					
	  </table>				
					
					
					<fieldset>
					<legend class="toggle">外观设置</legend>
						<div class="none">                      
							                        
											
							<label><input name="favicon_ck" type="checkbox" value="checkbox" <?php if($options['favicon_ck']) echo "checked='checked'"; ?> /><strong>自定义网站图标地址 （favicon）</strong>  当前使用默认favicon：
									<?php ob_start();
										ob_implicit_flush(0);
										echo ($options['custom_favicon']); 
										$my_favicon = ob_get_contents();
										ob_end_clean();
										if ($my_favicon == ''): ?>
											<a href="<?php bloginfo("url"); ?>/"><img src="<?php bloginfo('template_url'); ?>/images/favicon.ico" alt="<?php bloginfo('name'); ?>"></a>
										<?php else: ?>
											<a href="<?php bloginfo("url"); ?>/"><img src="<?php echo($options['custom_favicon']); ?>"></a>       		
										<?php endif ?>
							</label>

							<br/><label><textarea name="custom_favicon"  rows="1"  id="custom_favicon" style="width:600px;"  ><?php echo($options['custom_favicon']); ?></textarea></label>
							<br/><br/>   
							<label><input name="hovertotran" type="checkbox" value="checkbox" <?php if($options['hovertotran']) echo "checked='checked'"; ?> /><strong>开启鼠标悬停时图片变得透明效果</strong>(请不要与下一选项同时开启)</label><br/>													
							<br/>
							<label><input name="hovertoclear" type="checkbox" value="checkbox" <?php if($options['hovertoclear']) echo "checked='checked'"; ?> /><strong>开启鼠标悬停时图片变得清晰效果</strong>（请不要与上一选项同时开启）</label><br/>
							<br/>
							<label><input name="isie" type="checkbox" value="checkbox" <?php if($options['hovertoclear']) echo "checked='checked'"; ?> /><strong>开启IE升级提示</strong>（推荐Chrome）</label><br/>
						</div>
					</fieldset>		

					<fieldset>
					<legend class="toggle">广告设置</legend>
						<div class="none">					
							<label><input name="sidebarad" type="checkbox" value="checkbox" <?php if($options['sidebarad']) echo "checked='checked'"; ?> /><strong>开启边栏广告位(创建广告单元的时候请务必选择158*158大小的)</strong> </label>
							<br/><br/>（填写广告代码）<br/>
							<label><textarea name="sidebaradcode"  rows="4"  id="sidebaradcode" style="width:700px;"  ><?php echo($options['sidebaradcode']); ?></textarea></label>
							<br/>
						</div>
					</fieldset>
					
					<fieldset>
					<legend class="toggle">功能设置</legend>
						<div class="none">																	
						
						<label><input name="colorbox" type="checkbox" value="checkbox" <?php if($options['colorbox']) echo "checked='checked'"; ?> /><strong>开启图片点击放大功能</strong></label><br/>													
						<br/>
																			
					
																			
						<br/>   
						<label><input name="glide" type="checkbox" value="checkbox" <?php if($options['glide']) echo "checked='checked'"; ?> /><strong>开启滑动到顶部&底部功能</strong><br/></label>													
						<br/>
						
						<label><input name="thumbnail" type="checkbox" value="checkbox" <?php if($options['thumbnail']) echo "checked='checked'"; ?> /><strong>启用文章缩略图模式</strong></label><br/>		
						<br/>
						
						<label><input name="topnotice" type="checkbox" value="checkbox" <?php if($options['topnotice']) echo "checked='checked'"; ?> /><strong>顶部滚动公告</strong><br/>具体实现方法请参照相关教程</label><br/>		
						<br/>
						</div>
					</fieldset>
					
					
					
					
					
					
					
					
					<fieldset>
					<legend class="toggle">侧边栏设置</legend>
						<div class="none">	
							
																				
							
							<br/>	
							<label><input name="sidebar_post" type="checkbox" value="checkbox" <?php if($options['sidebar_post']) echo "checked='checked'"; ?> /><strong>开启边栏文章集成小工具</strong></label><br/>													
							<br/>	
							
							<label><input name="sidebar_recentComments" type="checkbox" value="checkbox" <?php if($options['sidebar_recentComments']) echo "checked='checked'"; ?> /><strong>滚动评论</strong></label><br/>													
							<br/>
					
					</fieldset>
					
				    <fieldset>
						<legend class="toggle">模板页面设置</legend>     
							<div class="none">
							<br/>
							
								<fieldset>
								<legend class="toggle">关于页面设置</legend>
									<div class="none">
										若使用了关于页面模板请在此进行相关设置，提示：关于页面图片的标准尺寸为530 × Y, Y最大值为800<br/><br/>								
										<strong>标题</strong><br/><label><textarea name="about_title"  rows="1"  id="about_title" style="width:350px;" ><?php echo($options['about_title']); ?></textarea></label><br/><br/>
										<strong>简介内容</strong><br/><label><textarea name="about_content"  rows="6"  id="about_content" style="width:700px;" ><?php echo($options['about_content']); ?></textarea></label>	<br/><br/>
										<strong>图片地址</strong><br/><label><textarea name="about_img"  rows="1"  id="about_img" style="width:700px;"><?php echo($options['about_img']); ?></textarea></label>	 																							 
									</div>
								</fieldset>
								
								<fieldset>
								<legend class="toggle">微博页面设置</legend>
									<div class="none">
										若使用了微博页面模板请在下面输入你获得的代码，提示：宽度请务必选择自适应网页<br/><br/>
										<label><textarea name="weibocode"  rows="3"  id="weibocode" style="width:700px;" ><?php echo($options['weibocode']); ?></textarea></label>															  
									</div>
								</fieldset>
								
							</div>
					</fieldset>
					
					
					
					<fieldset>
						<legend class="toggle">SNS网站设置</legend>  						
							<div class="none">
							
								<fieldset>
																	
									<label><input name="snsicon" type="checkbox" value="checkbox" <?php if($options['snsicon']) echo "checked='checked'"; ?> /><strong>开启SNS网站显示</strong></label><br/><br/>							
								</fieldset>
							
								<fieldset>
									<legend class="toggle">SNS详细设置</legend>
									<div class="none">	
										<label><input name="rss_select" type="checkbox" value="checkbox" <?php if($options['rss_select']) echo "checked='checked'"; ?> /><strong>开启RSS</strong></label>
										<br/><br/>		
										<label><input name="twitter_select" type="checkbox" value="checkbox" <?php if($options['twitter_select']) echo "checked='checked'"; ?> /><strong>开启Twitter图标</strong>，并填入你的网址（加上http://）</label><br/>
										<label><textarea name="twitter_url"  rows="1"  id="twitter_url" style="width:310px;"  ><?php echo($options['twitter_url']); ?></textarea></label>
										<br/><br/>	 
										<label><input name="facebook_select" type="checkbox" value="checkbox" <?php if($options['facebook_select']) echo "checked='checked'"; ?> /><strong>开启facebook图标</strong>，并填入你的网址（加上http://）</label><br/>
										<label><textarea name="facebook_url"  rows="1"  id="facebook_url" style="width:310px;"  ><?php echo($options['facebook_url']); ?></textarea></label>                                          								<br/><br/>
										<label><input name="da_select" type="checkbox" value="checkbox" <?php if($options['da_select']) echo "checked='checked'"; ?> /><strong>开启DeviantART图标</strong>，并填入你的网址（加上http://）</label><br/>
										<label><textarea name="da_url"  rows="1"  id="da_url" style="width:310px;"  ><?php echo($options['da_url']); ?></textarea></label>                                          							
										<br/><br/>
										<label><input name="googleplus_select" type="checkbox" value="checkbox" <?php if($options['googleplus_select']) echo "checked='checked'"; ?> /><strong>开启G+图标</strong>，并填入你的网址（加上http://）</label><br/>
										<label><textarea name="googleplus_url"  rows="1"  id="googleplus_url" style="width:310px;"  ><?php echo($options['googleplus_url']); ?></textarea></label>
										
										<br/><br/>	 
										<label><input name="dribbble_select" type="checkbox" value="checkbox" <?php if($options['dribbble_select']) echo "checked='checked'"; ?> /><strong>开启dribbble图标</strong>，并填入你的网址（加上http://）</label><br/>
										<label><textarea name="dribbble_url"  rows="1"  id="dribbble_url" style="width:310px;"  ><?php echo($options['dribbble_url']); ?></textarea></label>                                          							
										                                          							
										<br/><br/>
										<label><input name="flicker_select" type="checkbox" value="checkbox" <?php if($options['flicker_select']) echo "checked='checked'"; ?> /><strong>开启flicker图标</strong>，并填入你的网址（加上http://）</label><br/>
										<label><textarea name="flicker_url"  rows="1"  id="flicker_url" style="width:310px;"  ><?php echo($options['flicker_url']); ?></textarea></label>                                          							
										<br/><br/>
										<label><input name="spotify_select" type="checkbox" value="checkbox" <?php if($options['spotify_select']) echo "checked='checked'"; ?> /><strong>开启spotify图标</strong>，并填入你的网址（加上http://）</label><br/>
										<label><textarea name="spotify_url"  rows="1"  id="spotify_url" style="width:310px;"  ><?php echo($options['spotify_url']); ?></textarea></label>                                          							
										<br/><br/>
										<label><input name="tumblr_select" type="checkbox" value="checkbox" <?php if($options['tumblr_select']) echo "checked='checked'"; ?> /><strong>开启tumblr图标</strong>，并填入你的网址（加上http://）</label><br/>
										<label><textarea name="tumblr_url"  rows="1"  id="tumblr_url" style="width:310px;"  ><?php echo($options['tumblr_url']); ?></textarea></label>                                          							
										<br/><br/>
										<label><input name="weibo_select" type="checkbox" value="checkbox" <?php if($options['weibo_select']) echo "checked='checked'"; ?> /><strong>开启新浪微博图标</strong>，并填入你的网址（加上http://）</label><br/>
										<label><textarea name="weibo_url"  rows="1"  id="weibo_url" style="width:310px;"  ><?php echo($options['weibo_url']); ?></textarea></label>
										
										<br/><br/>
										<label><input name="qqweibo_select" type="checkbox" value="checkbox" <?php if($options['qqweibo_select']) echo "checked='checked'"; ?> /><strong>开启腾讯微博图标</strong>，并填入你的网址（加上http://）</label><br/>
										<label><textarea name="qqweibo_url"  rows="1"  id="qqweibo_url" style="width:310px;"  ><?php echo($options['qqweibo_url']); ?></textarea></label>
										
										<br/><br/>
										<label><input name="kaixin_select" type="checkbox" value="checkbox" <?php if($options['kaixin_select']) echo "checked='checked'"; ?> /><strong>开启开心网图标</strong>，并填入你的网址（加上http://）</label><br/>
										<label><textarea name="kaixin_url"  rows="1"  id="kaixin_url" style="width:310px;"  ><?php echo($options['kaixin_url']); ?></textarea></label>
										
										<br/><br/>
										<label><input name="renren_select" type="checkbox" value="checkbox" <?php if($options['renren_select']) echo "checked='checked'"; ?> /><strong>开启人人网图标</strong>，并填入你的网址（加上http://）</label><br/>
										<label><textarea name="renren_url"  rows="1"  id="renren_url" style="width:310px;"  ><?php echo($options['renren_url']); ?></textarea></label>
										
										<br/><br/>
										<label><input name="douban_select" type="checkbox" value="checkbox" <?php if($options['douban_select']) echo "checked='checked'"; ?> /><strong>开启豆瓣图标</strong>，并填入你的网址（加上http://）</label><br/>
										<label><textarea name="douban_url"  rows="1"  id="douban_url" style="width:310px;"  ><?php echo($options['douban_url']); ?></textarea></label>
										
										<br/><br/>
										<label><input name="sohu_select" type="checkbox" value="checkbox" <?php if($options['sohu_select']) echo "checked='checked'"; ?> /><strong>开启搜狐微博图标</strong>，并填入你的网址（加上http://）</label><br/>
										<label><textarea name="sohu_url"  rows="1"  id="sohu_url" style="width:310px;"  ><?php echo($options['sohu_url']); ?></textarea></label>
										
										<br/><br/>
										<label><input name="wangyi_select" type="checkbox" value="checkbox" <?php if($options['wangyi_select']) echo "checked='checked'"; ?> /><strong>开启网易微博图标</strong>，并填入你的网址（加上http://）</label><br/>
										<label><textarea name="wangyi_url"  rows="1"  id="wangyi_url" style="width:310px;"  ><?php echo($options['wangyi_url']); ?></textarea></label>
										
										<br/><br/>
									</div>
								</fieldset>										
							</div>
					</fieldset>
					
							
								
					
					
					
					
		<!-- submit -->
		<p class="submit">
			<input type="submit" name="Newer_save" value="保存设置" />
		</p>
	</div>
</form>
 
<?php
	}
}
add_action('admin_menu', array('NewerOptions', 'init'));



?>