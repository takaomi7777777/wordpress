<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {
            // and it doesn't match the cookie
			return;
            }
        }
?>


<?php // If Ping and Trackback is Open
if ( pings_open() && !is_mobile_dp()) : ?>
<div class="trackback_url_area clearfix">
<span>URL : </span>
<div><input type="text" name="post_url" value="<?php the_permalink(); ?>" readonly="readonly" class="trackback-url" onfocus="this.select()" /></div>
<span><?php _e('TRACKBACK URL : ', 'DigiPress'); ?></span>
<div><input type="text" name="trackback_url" value="<?php trackback_url() ?>" readonly="readonly" class="trackback-url" onfocus="this.select()" /></div>
</div>
<?php endif; ?>


<?php
/*********************************************************
* Custom comment html format (called back)
*********************************************************/
function dp_comment_source ($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
<div id="comment-<?php comment_ID(); ?>">
<div class="comment-author vcard clearfix">
<div class="fl-l"><?php echo get_avatar($comment,$size='50'); ?></div>
<?php printf(__('<cite class="comment_author_name icon-comment">%s</cite>'), get_comment_author_link()) ?>
<div class="comment-meta commentmetadata icon-calendar"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>
<div class="reply">
<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
</div>
</div>
<?php if ($comment->comment_approved == '0') : ?>
<p><?php _e('Your comment is awaiting moderation.', 'DigiPress') ?></p>
<?php endif; ?>
<?php comment_text() ?>
</div>
<?php }

/*********************************************************
* Custom trackback html format (called back)
*********************************************************/
function dp_trackback_source ($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
<div id="comment-<?php comment_ID(); ?>">
<div class="comment-author vcard clearfix">
<?php printf(__('<cite class="ft16px icon-home">%s</cite>'), get_comment_author_link()) ?>
<div class="comment-meta commentmetadata icon-calendar"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>
</div>
<?php if ($comment->comment_approved == '0') : ?>
<p><?php _e('Your trackback is awaiting moderation.', 'DigiPress') ?></p>
<?php endif; ?>
<div class="pd12px-top ft11px"><?php comment_text() ?></div>
</div>
<?php } ?>

<?php
/*********************************************************
* Show Comments
*********************************************************/
if ( have_comments() ) : 

	// Get comments
	$comments_by_type = &separate_comments($comments); ?>
<section id="comment_section">
<h3 id="comments" class="comment_hd_title"><?php _e('Comments &amp; Trackbacks', 'DigiPress') ?></h3>
<ul id="switch_comment_type" class="clearfix">
<li id="commentlist_div" class="active_tab"><span><?php _e('Comments', ''); ?> ( <?php echo count($comments_by_type['comment']); ?> )</span></li>
<li id="trackbacks_div" class="inactive_tab"><span><?php _e('Trackbacks', ''); ?>  ( <?php echo count($comments_by_type['pings']); ?> )</span></li>
</ul>
<div id="com_trb_div">
<div class="commentlist_div">
<?php // If comments exist
if ( ! empty($comments_by_type['comment']) ) : ?>
<ol class="commentlist">
<?php 
$args = array(
	'type'			=> 'comment',
	'avatar_size'	=> 50,
	'callback'		=> 'dp_comment_source'
	);
wp_list_comments($args); ?>
</ol>
<nav class="navigation clearfix">
<div class="navialignleft"><?php previous_comments_link('<span>OLDER</span>') ?></div>
<div class="navialignright"><?php next_comments_link('<span>NEWER</span>') ?></div>
</nav>
<?php else : // No comment yet ?>
<p><?php _e('No commented yet.', 'DigiPress') ?></p>
<?php endif; // End of comments ?>
</div>
<div class="trackbacks_div">
<?php // If pings and trackback exist
if ( ! empty($comments_by_type['pings']) ) : ?>
<ol class="commentlist">
<?php 
$args = array(
	'type'		=> 'trackback',
	'callback'	=> 'dp_trackback_source'
	);
wp_list_comments($args); ?>
</ol>
<nav class="navigation clearfix">
<div class="navialignleft"><?php previous_comments_link('<span>Older Comments</span>') ?></div>
<div class="navialignright"><?php next_comments_link('<span>Newer Comments</span>') ?></div>
<?php endif; //End of trackback & pings ?>
</div>
</div>
</section>
<?php endif; ?>

<?php 
/*********************************************************
* Comment Form
*********************************************************/
//Comment is accepted
if ( comments_open() ) : 

 // If "comment_form" function is exists
 if ( function_exists('comment_form') ) : 
	$fields =  array(
		'author' => '<div class="icon-user">' . '<label for="author">' . __( 'Name', '' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
		            '<div id="comment-author"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div></div>',
		'email'  => '<div class="icon-mail"><label for="email">' . __( 'E-mail', 'DigiPress' ) . '</label> ' . ( $req ? '<span class="required">*</span> '. __('(will not be published.)', 'DigiPress') : '' ) .
		            '<div id="comment-email"><input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div></div>',
		'url'    => '<div class="icon-globe"><label for="url">' . __( 'URL' ) . '</label>' .
		            '<div id="comment-url"><input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div></div>',
	);

	$args = array(
		'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'        => '<div class="icon-pencil"><label for="comment">' . _x( 'Comment', '' ) . '</label> <span class="required">*</span><div id="comment-comment"><textarea id="comment" name="comment" aria-required="true"></textarea></div></div>',
		'must_log_in'          => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'comment_notes_before' => '',
		'comment_notes_after'  => '',
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'title_reply'          => __( 'Leave a Reply', '' ),
		'title_reply_to'       => __( 'Leave a Reply to %s', 'DigiPress' ),
		'cancel_reply_link'    => __( 'Cancel reply', 'DigiPress' ),
		'label_submit'         => __( 'Submit Comment', 'DigiPress' )
	);

	comment_form( $args, $post_id );
 	else : ?>
	<section>
	<h3 class="comment_hd_title"><?php _e('Leave a Reply', 'DigiPress'); ?></h3>
	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<div class="nocomment">
		<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'DigiPress'), wp_login_url( get_permalink() )); ?></p>
		</div>
	<?php else : ?>
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
	<?php if ( is_user_logged_in() ) : ?>
		<p><?php printf(__('Logged in as <a href="%1$s">%2$s</a>.', 'DigiPress'), get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account', 'DigiPress'); ?>"><?php _e('Log out &raquo;', 'DigiPress'); ?></a></p>
	<?php else : ?>
		<div class="icon-user"><label for="author"><?php _e('Name','DigiPress'); ?> <?php if ($req) echo _e('(required)', 'DigiPress'); ?></label>
		<div id="comment-author"><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" /></div></div>
		<div class="icon-mail"><label for="email"><?php _e('Mail (will not be published.)', 'DigiPress'); ?> <?php if ($req) echo _e('(required)', 'DigiPress'); echo _e( 'Your email address will not be published.' ); ?></label>
		<div id="comment-email"><input type="email" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" /></div></div>

		<div class="icon-globe"><label for="url"><?php _e('Website', 'DigiPress'); ?></label>
		<div id="comment-url"><input type="url" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" /></div></div>
	<?php endif; ?>
	<div class="icon-pencil"><label for="comment"><?php _e('Comment', 'DigiPress'); ?></label>
	<div id="comment-comment"><textarea name="comment" id="comment"  tabindex="4"></textarea></div></div>
	<div>
	<input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment'); ?>" />
	<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
	<?php comment_id_fields(); ?>
	</div>
	<?php do_action('comment_form', $post->ID); ?>
	</form>
	</section>

 <?php
endif; // End of "comment_form" function check 
endif; // If registration required and not logged in 
endif; // if you delete this the sky will fall on your head
	/*********************************************************
	* Show facebook comments
	*********************************************************/
	global $options;

	// Facebook comment
	if (($options['facebookcomment'] && get_post_type() === 'post') || ($options['facebookcomment_page'] && is_page())) {
		echo '<div class="mg45px-top"><h3 class="comment_hd_title">'.__('Comment on Facebook','DigiPress').'</h3><div class="fb-comments" data-href="'.get_permalink ().'" data-num-posts="'.$options['number_fb_comment'].'" data-width="100%"></div></div>';
	}
?>
