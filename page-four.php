<?php
$i=0;
$counts = $wpdb->get_results("SELECT COUNT(comment_author) AS cnt, comment_author, comment_author_url, comment_author_email FROM (SELECT * FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->posts.ID=$wpdb->comments.comment_post_ID) WHERE comment_date > date_sub( '2013-02-05 20:59:59',  INTERVAL 18 DAY  ) AND user_id='0' AND comment_author != 'bigfa' AND post_password='' AND comment_approved='1' AND comment_type='') AS tempcmt GROUP BY comment_author ORDER BY cnt DESC LIMIT 8");
foreach ($counts as $count) {
$c_url = $count->comment_author_url;
$i++;
if ($c_url == '') $c_url = 'http://ceezi.com/';
$mostactive .= '<li class="num'. $i .'">' . get_avatar($count->comment_author_email, 16) .' <a rel="nofollow" href="'. $c_url . '">' . $count->comment_author . ' ('. $count->cnt . '条)</a></li>';
}
echo $mostactive;
?>