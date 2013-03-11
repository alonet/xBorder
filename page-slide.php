<?php 
/*
Template Name: 滑动相册模板
*/
get_header(); 
?>
<?php $options = get_option('Newer_options'); ?>
	<div id="layout">        
			<div id="contentbg">					
					
				<div id="content">
				<div class="content-header"></div>					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>					
					<div id="photopagetitle">
						<?php the_title(); ?>
					</div>
					<div class="singlepage">
						<?php the_content(); ?>												
				<!--start shinetime-->		
				<script type="text/javascript">
				  $(document).ready(function()
				  {   
					 var default_image = '<?php echo($options['slidealbum_cover']); ?>';
					 var default_caption = '<?php echo($options['slidealbum_cover_content']); ?>';
					 loadPhoto(default_image, default_caption);	 
					 function loadPhoto($url, $caption)
					 {
						showPreloader();
						var img = new Image();
						jQuery(img).load( function() 
						{
							jQuery(img).hide();
							hidePreloader();		
						}).attr({ "src": $url });	
						$('#largephoto').css('background-image','url("' + $url + '")');
						$('#largephoto').data('caption', $caption);
					 }
					 $('.thumb_container').click(function()
					 {	     
						  var handler = $(this).find('.large_image');
						  var newsrc  = handler.attr('src');
						  var newcaption  = handler.attr('rel');
						  loadPhoto(newsrc, newcaption);	 
					 });
					 $('#largephoto').hover(function()
					 {	    
						var currentCaption  = ($(this).data('caption'));
						var largeCaption = $(this).find('#largecaption');		
						largeCaption.stop();
						largeCaption.css('opacity','0.8');
						largeCaption.find('.captionContent').html(currentCaption);
						largeCaption.fadeIn()		
						 largeCaption.find('.captionShine').stop();
						 largeCaption.find('.captionShine').css("background-position","-550px 0"); 
						 largeCaption.find('.captionShine').animate({backgroundPosition: '550px 0'},700);		 
						 Cufon.replace('.captionContent');		
					 },	 
					 function()
					 {
						var largeCaption = $(this).find('#largecaption');
						largeCaption.find('.captionContent').html('');
						largeCaption.fadeOut();	 
					 });
					 $('.thumb_container').hover(function()
					 {  
						 $(this).find(".large_thumb").stop().animate({marginLeft:-7, marginTop:-7},200);
						 $(this).find(".large_thumb_shine").stop();
						 $(this).find(".large_thumb_shine").css("background-position","-99px 0"); 
						 $(this).find(".large_thumb_shine").animate({backgroundPosition: '99px 0'},700);			 
					 }, function()
					 {
						$(this).find(".large_thumb").stop().animate({marginLeft:0, marginTop:0},200);
					 });	 
					 function showPreloader()
					 {
					   $('#loader').css('background-image','url("images/submit_loading.gif")');
					 }	 
					 function hidePreloader()
					 {
					   $('#loader').css('background-image','url("")');
					 }   
				  });
				</script>												
				<div id="container">

				   <div class="mainframe">
						<div id="largephoto">
							<div id="largecaption">
								<div class="captionShine"></div>
								<div class="captionContent"></div>						  
							</div>						
							<div id="largetrans"></div>
						</div>  
				   </div>
				   <div class="thumbnails">
				   
				   
								<?php if($options['slidealbum1']): ?>     
									<div class="thumbnailimage">
										<div class="thumb_container"> 
											<div class="large_thumb"> 
												<img src="<?php echo($options['slidealbum1_thumb_link']); ?>" class="large_thumb_image" alt="thumb" width="54" height="54"/> <!--缩略图-->
												<img src="<?php echo($options['slidealbum1_show_link']); ?>" class="large_image" rel="<?php echo($options['slidealbum1_show_content']); ?>" /><!--大图-->
												<div class="large_thumb_border"></div>
												<div class="large_thumb_shine"></div>
											</div>
										</div>
									</div>
								<?php endif; ?>	
					   
					   
				 
								<?php if($options['slidealbum2']): ?>
									<div class="thumbnailimage">
										<div class="thumb_container"> 
											<div class="large_thumb"> 
												<img src="<?php echo($options['slidealbum2_thumb_link']); ?>" class="large_thumb_image" alt="thumb" width="54" height="54"/> 
												<img src="<?php echo($options['slidealbum2_show_link']); ?>" class="large_image" rel="<?php echo($options['slidealbum2_show_content']); ?>" />
												<div class="large_thumb_border"></div>
												<div class="large_thumb_shine"></div>
											</div>
										</div>
									</div>
								<?php endif; ?>	
					      
					   
				
								<?php if($options['slidealbum3']): ?>     
									<div class="thumbnailimage">
										<div class="thumb_container"> 
											<div class="large_thumb"> 
												<img src="<?php echo($options['slidealbum3_thumb_link']); ?>" class="large_thumb_image" alt="thumb" width="54" height="54"/> 
												<img src="<?php echo($options['slidealbum3_show_link']); ?>" class="large_image" rel="<?php echo($options['slidealbum3_show_content']); ?>" />
												<div class="large_thumb_border"></div>
												<div class="large_thumb_shine"></div>
											</div>
										</div>
									</div>
								<?php endif; ?>
					           
					   
				
								<?php if($options['slidealbum4']): ?>     
									<div class="thumbnailimage">
										<div class="thumb_container"> 
											<div class="large_thumb"> 
												<img src="<?php echo($options['slidealbum4_thumb_link']); ?>" class="large_thumb_image" alt="thumb" width="54" height="54"/> 
												<img src="<?php echo($options['slidealbum4_show_link']); ?>" class="large_image" rel="<?php echo($options['slidealbum4_show_content']); ?>" />
												<div class="large_thumb_border"></div>
												<div class="large_thumb_shine"></div>
											</div>
										</div>
									</div>
								<?php endif; ?>
					  
								<?php if($options['slidealbum5']): ?>     
									<div class="thumbnailimage">
										<div class="thumb_container"> 
											<div class="large_thumb"> 
												<img src="<?php echo($options['slidealbum5_thumb_link']); ?>" class="large_thumb_image" alt="thumb" width="54" height="54"/> 
												<img src="<?php echo($options['slidealbum5_show_link']); ?>" class="large_image" rel="<?php echo($options['slidealbum5_show_content']); ?>" />
												<div class="large_thumb_border"></div>
												<div class="large_thumb_shine"></div>
											</div>
										</div>
									</div>
								<?php endif; ?>
					
								<?php if($options['slidealbum6']): ?>     
									<div class="thumbnailimage">
										<div class="thumb_container"> 
											<div class="large_thumb"> 
												<img src="<?php echo($options['slidealbum6_thumb_link']); ?>" class="large_thumb_image" alt="thumb" width="54" height="54"/> 
												<img src="<?php echo($options['slidealbum6_show_link']); ?>" class="large_image" rel="<?php echo($options['slidealbum6_show_content']); ?>" />
												<div class="large_thumb_border"></div>
												<div class="large_thumb_shine"></div>
											</div>
										</div>
									</div>
								<?php endif; ?>
					
								<?php if($options['slidealbum7']): ?>     
									<div class="thumbnailimage">
										<div class="thumb_container"> 
											<div class="large_thumb"> 
												<img src="<?php echo($options['slidealbum7_thumb_link']); ?>" class="large_thumb_image" alt="thumb" width="54" height="54"/> 
												<img src="<?php echo($options['slidealbum7_show_link']); ?>" class="large_image" rel="<?php echo($options['slidealbum7_show_content']); ?>" />
												<div class="large_thumb_border"></div>
												<div class="large_thumb_shine"></div>
											</div>
										</div>
									</div>
								<?php endif; ?>
					
								<?php if($options['slidealbum8']): ?>     
									<div class="thumbnailimage">
										<div class="thumb_container"> 
											<div class="large_thumb"> 
												<img src="<?php echo($options['slidealbum8_thumb_link']); ?>" class="large_thumb_image" alt="thumb" width="54" height="54"/> 
												<img src="<?php echo($options['slidealbum8_show_link']); ?>" class="large_image" rel="<?php echo($options['slidealbum8_show_content']); ?>" />
												<div class="large_thumb_border"></div>
												<div class="large_thumb_shine"></div>
											</div>
										</div>
									</div>
								<?php endif; ?>
					 
								<?php if($options['slidealbum9']): ?>     
									<div class="thumbnailimage">
										<div class="thumb_container"> 
											<div class="large_thumb"> 
												<img src="<?php echo($options['slidealbum9_thumb_link']); ?>" class="large_thumb_image" alt="thumb" width="54" height="54"/> 
												<img src="<?php echo($options['slidealbum9_show_link']); ?>" class="large_image" rel="<?php echo($options['slidealbum9_show_content']); ?>" />
												<div class="large_thumb_border"></div>
												<div class="large_thumb_shine"></div>
											</div>
										</div>
									</div>
								<?php endif; ?>
					
								<?php if($options['slidealbum10']): ?>     
									<div class="thumbnailimage">
										<div class="thumb_container"> 
											<div class="large_thumb"> 
												<img src="<?php echo($options['slidealbum10_thumb_link']); ?>" class="large_thumb_image" alt="thumb" width="54" height="54"/> 
												<img src="<?php echo($options['slidealbum10_show_link']); ?>" class="large_image" rel="<?php echo($options['slidealbum10_show_content']); ?>" />
												<div class="large_thumb_border"></div>
												<div class="large_thumb_shine"></div>
											</div>
										</div>
									</div>
								<?php endif; ?>
					
								<?php if($options['slidealbum11']): ?>     
									<div class="thumbnailimage">
										<div class="thumb_container"> 
											<div class="large_thumb"> 
												<img src="<?php echo($options['slidealbum11_thumb_link']); ?>" class="large_thumb_image" alt="thumb" width="54" height="54"/> 
												<img src="<?php echo($options['slidealbum11_show_link']); ?>" class="large_image" rel="<?php echo($options['slidealbum11_show_content']); ?>" />
												<div class="large_thumb_border"></div>
												<div class="large_thumb_shine"></div>
											</div>
										</div>
									</div>
								<?php endif; ?>
				
								<?php if($options['slidealbum12']): ?>     
									<div class="thumbnailimage">
										<div class="thumb_container"> 
											<div class="large_thumb"> 
												<img src="<?php echo($options['slidealbum12_thumb_link']); ?>" class="large_thumb_image" alt="thumb" width="54" height="54"/> 
												<img src="<?php echo($options['slidealbum12_show_link']); ?>" class="large_image" rel="<?php echo($options['slidealbum12_show_content']); ?>" />
												<div class="large_thumb_border"></div>
												<div class="large_thumb_shine"></div>
											</div>
										</div>
									</div>
								<?php endif; ?>
					
								<?php if($options['slidealbum13']): ?>     
									<div class="thumbnailimage">
										<div class="thumb_container"> 
											<div class="large_thumb"> 
												<img src="<?php echo($options['slidealbum13_thumb_link']); ?>" class="large_thumb_image" alt="thumb" width="54" height="54"/> 
												<img src="<?php echo($options['slidealbum13_show_link']); ?>" class="large_image" rel="<?php echo($options['slidealbum13_show_content']); ?>" />
												<div class="large_thumb_border"></div>
												<div class="large_thumb_shine"></div>
											</div>
										</div>
									</div>
								<?php endif; ?>
				
								<?php if($options['slidealbum14']): ?>     
									<div class="thumbnailimage">
										<div class="thumb_container"> 
											<div class="large_thumb"> 
												<img src="<?php echo($options['slidealbum14_thumb_link']); ?>" class="large_thumb_image" alt="thumb" width="54" height="54"/> 
												<img src="<?php echo($options['slidealbum14_show_link']); ?>" class="large_image" rel="<?php echo($options['slidealbum14_show_content']); ?>" />
												<div class="large_thumb_border"></div>
												<div class="large_thumb_shine"></div>
											</div>
										</div>
									</div>
								<?php endif; ?>
					
								<?php if($options['slidealbum15']): ?>     
									<div class="thumbnailimage">
										<div class="thumb_container"> 
											<div class="large_thumb"> 
												<img src="<?php echo($options['slidealbum15_thumb_link']); ?>" class="large_thumb_image" alt="thumb" width="54" height="54"/> 
												<img src="<?php echo($options['slidealbum15_show_link']); ?>" class="large_image" rel="<?php echo($options['slidealbum15_show_content']); ?>" />
												<div class="large_thumb_border"></div>
												<div class="large_thumb_shine"></div>
											</div>
										</div>
									</div>
								<?php endif; ?>
					
								<?php if($options['slidealbum16']): ?>     
									<div class="thumbnailimage">
										<div class="thumb_container"> 
											<div class="large_thumb"> 
												<img src="<?php echo($options['slidealbum16_thumb_link']); ?>" class="large_thumb_image" alt="thumb" width="54" height="54"/> 
												<img src="<?php echo($options['slidealbum16_show_link']); ?>" class="large_image" rel="<?php echo($options['slidealbum16_show_content']); ?>" />
												<div class="large_thumb_border"></div>
												<div class="large_thumb_shine"></div>
											</div>
										</div>
									</div>
								<?php endif; ?>
					
								<?php if($options['slidealbum17']): ?>     
									<div class="thumbnailimage">
										<div class="thumb_container"> 
											<div class="large_thumb"> 
												<img src="<?php echo($options['slidealbum17_thumb_link']); ?>" class="large_thumb_image" alt="thumb" width="54" height="54"/> 
												<img src="<?php echo($options['slidealbum17_show_link']); ?>" class="large_image" rel="<?php echo($options['slidealbum17_show_content']); ?>" />
												<div class="large_thumb_border"></div>
												<div class="large_thumb_shine"></div>
											</div>
										</div>
									</div>
								<?php endif; ?>
					
								<?php if($options['slidealbum18']): ?>     
									<div class="thumbnailimage">
										<div class="thumb_container"> 
											<div class="large_thumb"> 
												<img src="<?php echo($options['slidealbum18_thumb_link']); ?>" class="large_thumb_image" alt="thumb" width="54" height="54"/> 
												<img src="<?php echo($options['slidealbum18_show_link']); ?>" class="large_image" rel="<?php echo($options['slidealbum18_show_content']); ?>" />
												<div class="large_thumb_border"></div>
												<div class="large_thumb_shine"></div>
											</div>
										</div>
									</div>
								<?php endif; ?>
				
								<?php if($options['slidealbum19']): ?>     
									<div class="thumbnailimage">
										<div class="thumb_container"> 
											<div class="large_thumb"> 
												<img src="<?php echo($options['slidealbum19_thumb_link']); ?>" class="large_thumb_image" alt="thumb" width="54" height="54"/> 
												<img src="<?php echo($options['slidealbum19_show_link']); ?>" class="large_image" rel="<?php echo($options['slidealbum19_show_content']); ?>" />
												<div class="large_thumb_border"></div>
												<div class="large_thumb_shine"></div>
											</div>
										</div>
									</div>
								<?php endif; ?>
				
								<?php if($options['slidealbum20']): ?>     
									<div class="thumbnailimage">
										<div class="thumb_container"> 
											<div class="large_thumb"> 
												<img src="<?php echo($options['slidealbum20_thumb_link']); ?>" class="large_thumb_image" alt="thumb" width="54" height="54"/> 
												<img src="<?php echo($options['slidealbum20_show_link']); ?>" class="large_image" rel="<?php echo($options['slidealbum20_show_content']); ?>" />
												<div class="large_thumb_border"></div>
												<div class="large_thumb_shine"></div>
											</div>
										</div>
									</div>
								<?php endif; ?>
					
								<?php if($options['slidealbum21']): ?>     
									<div class="thumbnailimage">
										<div class="thumb_container"> 
											<div class="large_thumb"> 
												<img src="<?php echo($options['slidealbum21_thumb_link']); ?>" class="large_thumb_image" alt="thumb" width="54" height="54"/> 
												<img src="<?php echo($options['slidealbum21_show_link']); ?>" class="large_image" rel="<?php echo($options['slidealbum21_show_content']); ?>" />
												<div class="large_thumb_border"></div>
												<div class="large_thumb_shine"></div>
											</div>
										</div>
									</div>
								<?php endif; ?>
					  
				   </div>
				</div>
				
			</div>
					
					<?php endwhile; endif;?>
					<div class="clear"></div>
					
				</div>
				
			<div class="contentft"></div> 
			
			</div>
		
			<?php get_sidebar(); ?>
		<div class="clear"></div>  
		<?php get_footer(); ?>
	</div>