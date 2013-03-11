<?php $options = get_option('Newer_options'); ?>
<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>
<!-- You can start editing here. -->
<?php if ( have_comments() ) : ?>	
	<ul class="commentlist" >
	<?php wp_list_comments('type=comment&callback=Newer_comment&max_depth=10000'); ?>
	</ul>
	<nav class="commentnavgation">
		<?php paginate_comments_links('prev_text=«&next_text=»');?>
	</nav>
 <?php else : ?>
	<?php if ('open' == $post->comment_status) : ?>
	 <?php else : ?>
		<p class="nocomments">Comments are closed.</p>
	<?php endif; ?>
<?php endif; ?>
<?php if ('open' == $post->comment_status) : ?>

<div id="respond">
<div class="cancel_comment_reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>
<?php if ( !$user_ID ) : ?>
<p></p>
<?php else : ?>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( $user_ID ) : ?>
<p style="margin-bottom:10px">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>&nbsp;|&nbsp;<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
<?php else : ?>
<p>
<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
</p>
<p>
<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
</p>
<p>
<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
</p>
<?php endif; ?>
<p><textarea name="comment" id="comment" rows="10" tabindex="4" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea></p>

<?php if($options['smilies']) : ?>
<?php include('smilies.php'); ?>
<script type="text/javascript"> 
$(document).ready(function(){
$('#smilies').hide();
$('#comment').focus(
function() {
$('#smilies').slideDown('slow');
});
});
</script> 
<?php endif; ?>
<p><input name="submit" type="submit" id="submit" tabindex="5" value="SUBMIT（Ctrl + Enter）" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>
</form>
<?php endif; ?>
</div>
<?php endif; ?>