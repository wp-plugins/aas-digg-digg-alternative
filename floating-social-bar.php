<?php
/*
Plugin Name: AA's Digg Digg Alternative
Plugin URI: http://www.android-advice.com/2012/faster-seo-friendly-digg-digg-alternative-wordpress-plugin/
Description: Floating social bar for those that don't want to use the content heavy and slow Digg Digg bar.  This bar only has the code required to create the floating bar with sharing to increase page speed and less code.
Version: 1.2
Author: Brandon Orndorff
Author URI: http://www.android-advice.com
License: GPL2
*/
?>
<?php
Mokis_Digg_Alt_Controller::init();
class Mokis_Digg_Alt_Controller {
	function init() {
		register_activation_hook(   __FILE__, array( __CLASS__, 'activate'   ) );
		register_deactivation_hook( __FILE__, array( __CLASS__, 'deactivate' ) );
		register_uninstall_hook( __FILE__, array( __CLASS__, 'uninstall' ) );
		add_option("mokis_social_data_left", '-90', '', 'yes');
		add_option("mokis_social_data_top", '-50', '', 'yes');
		add_option("mokis_social_data_left_pages", '-90', '', 'yes');
		add_option("mokis_social_data_top_pages", '-50', '', 'yes');
		add_option("mokis_show_googleplus", '1', '', 'yes');
		add_option("mokis_show_digg", '1', '', 'yes');
		add_option("mokis_show_twitter", '1', '', 'yes');
		add_option("mokis_show_facebook", '1', '', 'yes');
		add_option("mokis_show_stumble", '', '', 'yes');
		add_option("mokis_show_linkedin", '', '', 'yes');
		add_option("mokis_show_pinterest", '', '', 'yes');
		add_option("mokis_social_data_posts", '1', '', 'yes');
		add_option("mokis_social_data_pages", '', '', 'yes');
	}
	function activate() {
		add_option("mokis_social_data_credit", '1', '', 'yes');
		update_option('mokis_social_data_credit', '1');
		add_option("mokis_social_data_posts", '1', '', 'yes');
		add_option("mokis_social_data_pages", '', '', 'yes');
		add_option("mokis_social_data_left_pages", '-90', '', 'yes');
		add_option("mokis_social_data_top_pages", '-50', '', 'yes');
		add_option("mokis_show_linkedin", '', '', 'yes');
		add_option("mokis_show_pinterest", '', '', 'yes');
	}

	function deactivate() {

	}
	function uninstall() {
		delete_option('mokis_social_data_credit');
		delete_option('mokis_social_data_left');
		delete_option('mokis_social_data_top');
		delete_option('mokis_show_googleplus');
		delete_option('mokis_show_digg');
		delete_option('mokis_show_twitter');
		delete_option('mokis_show_facebook');
		delete_option('mokis_show_stumble');
		delete_option('mokis_show_linkedin');
		delete_option('mokis_show_pinterest');
		delete_option('mokis_social_data_posts');
		delete_option('mokis_social_data_pages');
		delete_option('mokis_social_data_left_pages');
		delete_option('mokis_social_data_top_pages');
	}
}

function moki_add_social_content($content) {
		
	global $wpdb;
	//Start if is Post
	if ( is_single() && get_option('mokis_social_data_posts') == 1 ){
	?>
<div style="-moz-border-radius: 10px; border-radius: 10px; border:1px solid #999999; position: fixed; z-index:99999; width: 70px; background-color:#FFFFFF; display:block; margin-left: <?php echo get_option('mokis_social_data_left'); ?>px; margin-top: <?php echo get_option('mokis_social_data_top'); ?>px;">
<div style="width:68px;margin: auto; padding:0 0 5px 0; text-align:center;">
<?php if(get_option('mokis_show_googleplus') == 1){ ?><span style="padding-top:5px; display:block;"><script type='text/javascript' src='https://apis.google.com/js/plusone.js'></script><g:plusone size='tall'></g:plusone></span><?php } ?>
<?php if(get_option('mokis_show_digg') == 1){ ?><span style="padding-top:5px; display:block;"><script type='text/javascript'>(function() {var s = document.createElement('SCRIPT'), s1 = document.getElementsByTagName('SCRIPT')[0];s.type = 'text/javascript';s.async = true;s.src = 'http://widgets.digg.com/buttons.js';s1.parentNode.insertBefore(s, s1);})();</script> <a class='DiggThisButton DiggMedium' href='http://digg.com/submit'></a></span><?php } ?>
<?php if(get_option('mokis_show_twitter') == 1){ ?><span style="padding-top:5px; display:block;"><a href="http://twitter.com/share" class="twitter-share-button" data-count="vertical"></a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></span><?php } ?>
<?php if(get_option('mokis_show_facebook') == 1){ ?><span style="padding-top:5px; display:block;"><div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like" data-send="false" data-layout="box_count" data-width="55" data-show-faces="false"></div></span><?php } ?>
<?php if(get_option('mokis_show_stumble') == 1){ ?><span style="padding-top:5px; display:block;"><su:badge layout="5"></su:badge>
<script type="text/javascript">
  (function() {
    var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true;
    li.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + '//platform.stumbleupon.com/1/widgets.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s);
  })();
</script></span><?php } ?>
<?php if(get_option('mokis_show_linkedin') == 1){ ?><span style="padding-top:5px; display:block;"><script src="//platform.linkedin.com/in.js" type="text/javascript"></script><script type="IN/Share" data-counter="top"></script></span><?php } ?>
<?php if(get_option('mokis_show_pinterest') == 1){ ?><span style="padding-top:5px; display:block;"><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php if(function_exists('the_post_thumbnail')) echo wp_get_attachment_url(get_post_thumbnail_id()); ?>&description=<?php echo get_the_title(); ?>" class="pin-it-button" count-layout="vertical">Pin It</a><script type="text/javascript" src="http://assets.pinterest.com/js/pinit.js"></script></span><?php } ?>
<?php if(get_option('mokis_social_data_credit') == 1){ ?><span style="line-height:10px;padding-top:5px; display:block;"><a href="http://www.android-advice.com" target="_blank" title="Android News, Tutorials, how to's, applications'" style="font-size:9px;">Powered By:<br />Android Advice</a></span><?php } ?>
</div>
</div>
<?php
} //end if is_single
?>

<?php
//Start if is Page
	if ( is_page() && get_option('mokis_social_data_pages') == 1 ){
	?>
<div style="-moz-border-radius: 10px; border-radius: 10px; border:1px solid #999999; position: fixed; z-index:99999; width: 70px; background-color:#FFFFFF; display:block; margin-left: <?php echo get_option('mokis_social_data_left_pages'); ?>px; margin-top: <?php echo get_option('mokis_social_data_top_pages'); ?>px;">
<div style="width:68px;margin: auto; padding:0 0 5px 0; text-align:center;">
<?php if(get_option('mokis_show_googleplus') == 1){ ?><span style="padding-top:5px; display:block;"><script type='text/javascript' src='https://apis.google.com/js/plusone.js'></script><g:plusone size='tall'></g:plusone></span><?php } ?>
<?php if(get_option('mokis_show_digg') == 1){ ?><span style="padding-top:5px; display:block;"><script type='text/javascript'>(function() {var s = document.createElement('SCRIPT'), s1 = document.getElementsByTagName('SCRIPT')[0];s.type = 'text/javascript';s.async = true;s.src = 'http://widgets.digg.com/buttons.js';s1.parentNode.insertBefore(s, s1);})();</script> <a class='DiggThisButton DiggMedium' href='http://digg.com/submit'></a></span><?php } ?>
<?php if(get_option('mokis_show_twitter') == 1){ ?><span style="padding-top:5px; display:block;"><a href="http://twitter.com/share" class="twitter-share-button" data-count="vertical"></a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></span><?php } ?>
<?php if(get_option('mokis_show_facebook') == 1){ ?><span style="padding-top:5px; display:block;"><div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like" data-send="false" data-layout="box_count" data-width="55" data-show-faces="false"></div></span><?php } ?>
<?php if(get_option('mokis_show_stumble') == 1){ ?><span style="padding-top:5px; display:block;"><su:badge layout="5"></su:badge>
<script type="text/javascript">
  (function() {
    var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true;
    li.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + '//platform.stumbleupon.com/1/widgets.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s);
  })();
</script></span><?php } ?>
<?php if(get_option('mokis_show_linkedin') == 1){ ?><span style="padding-top:5px; display:block;"><script src="//platform.linkedin.com/in.js" type="text/javascript"></script><script type="IN/Share" data-counter="top"></script></span><?php } ?>
<?php if(get_option('mokis_show_pinterest') == 1){ ?><span style="padding-top:5px; display:block;"><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php if(function_exists('the_post_thumbnail')) echo wp_get_attachment_url(get_post_thumbnail_id()); ?>&description=<?php echo get_the_title(); ?>" class="pin-it-button" count-layout="vertical">Pin It</a><script type="text/javascript" src="http://assets.pinterest.com/js/pinit.js"></script></span><?php } ?>
<?php if(get_option('mokis_social_data_credit') == 1){ ?><span style="line-height:10px;padding-top:5px; display:block;"><a href="http://www.android-advice.com" target="_blank" title="Android News, Tutorials, how to's, applications'" style="font-size:9px;">Powered By:<br />Android Advice</a></span><?php } ?>
</div>
</div>
<?php
} //end if is_page
return $content;

} //end function

add_filter ('the_content', 'moki_add_social_content', 0);
?>
<?php
add_action( 'admin_menu', 'mokisf_plugin_menu' );

function mokisf_plugin_menu() {
	add_options_page( 'Mokis Social Floater', 'Digg Digg Alternative', 'manage_options', 'mokis-social-floating-bar', 'mokisf_plugin_options' );
}

function mokisf_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	include('floating-social-admin.php');
	echo '</div>';
}
?>