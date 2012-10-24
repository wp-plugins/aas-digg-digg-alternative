<?php
if(isset($_POST['mokis_social_data_left'])){
	update_option('mokis_social_data_left', $_POST['mokis_social_data_left']);
	update_option('mokis_social_data_top', $_POST['mokis_social_data_top']);
	update_option('mokis_social_data_left_pages', $_POST['mokis_social_data_left_pages']);
	update_option('mokis_social_data_top_pages', $_POST['mokis_social_data_top_pages']);
	update_option('mokis_show_googleplus', $_POST['mokis_show_googleplus']);
	update_option('mokis_show_digg', $_POST['mokis_show_digg']);
	update_option('mokis_show_twitter', $_POST['mokis_show_twitter']);
	update_option('mokis_show_facebook', $_POST['mokis_show_facebook']);
	update_option('mokis_show_stumble', $_POST['mokis_show_stumble']);
	update_option('mokis_social_data_posts', $_POST['mokis_social_data_posts']);
	update_option('mokis_social_data_pages', $_POST['mokis_social_data_pages']);
	update_option('mokis_social_data_credit', $_POST['mokis_social_data_credit']);
	
	$mokisfloatsuccess = "Settings Updated Successfully!";
}
?>
 <h3 style="color:green;"><?php echo $mokisfloatsuccess; ?></h3>

<form method="post" action="">
<h2>AA's Social Floater Plugin &raquo; Settings</h2>
<table class="widefat">
	<thead>
	&nbsp;&nbsp;&nbsp;<tr>
		 <th><input type="submit" name="submit" value="<?php esc_attr_e('Save Settings'); ?>" class="button-primary" style="padding:8px;" /></th>
	   </tr>
	</thead>
	<tfoot>
	   <tr>
		 <th><input type="submit" name="submit" value="<?php esc_attr_e('Save Settings'); ?>" class="button-primary" style="padding:8px;" /></th>
	   </tr>
	</tfoot>
	<tbody>
	   <tr>
		 <td style="padding:25px;font-family:Verdana, Geneva, sans-serif;color:#666;">
		 	<h2>Post/Page Location Settings:</h2>
		 	<h3 style="padding:0;margin:0;">Posts - location on posts</h3>
             <label for="msf_float_left">
                 <p><input type="text" name="mokis_social_data_left" value="<?php echo get_option('mokis_social_data_left'); ?>" style="width:40px;" /> :<b>Left Margin (pixels)</b> - How far left from your content you want the bar to float.</p>
             </label>
             <label for="mokis_social_data_top">
                 <p><input type="text" name="mokis_social_data_top" value="<?php echo get_option('mokis_social_data_top'); ?>" style="width:40px;" /> :<b>Top Margin (pixels)</b> - How far up from your content you want the bar to float.</p>
             </label>
             <br />
             <h3 style="padding:0;margin:0;">Pages - location on pages</h3>
             <label for="msf_float_left_pages">
                 <p><input type="text" name="mokis_social_data_left_pages" value="<?php echo get_option('mokis_social_data_left_pages'); ?>" style="width:40px;" /> :<b>Left Margin (pixels)</b> - How far left from your content you want the bar to float.</p>
             </label>
             <label for="mokis_social_data_top_pages">
                 <p><input type="text" name="mokis_social_data_top_pages" value="<?php echo get_option('mokis_social_data_top_pages'); ?>" style="width:40px;" /> :<b>Top Margin (pixels)</b> - How far up from your content you want the bar to float.</p>
             </label>
             
             <hr />
             
             <?php
             if(get_option('mokis_show_googleplus') == 1) {$gpluschecked = checked;}
			 if(get_option('mokis_show_digg') == 1) {$diggchecked = checked;}
			 if(get_option('mokis_show_twitter') == 1) {$twitterchecked = checked;}
			 if(get_option('mokis_show_facebook') == 1) {$facebookchecked = checked;}
			 if(get_option('mokis_show_stumble') == 1) {$stumblechecked = checked;}
			 if(get_option('mokis_social_data_posts') == 1) {$postsshowchecked = checked;}
			 if(get_option('mokis_social_data_pages') == 1) {$pagesshowchecked = checked;}
			 if(get_option('mokis_social_data_credit') == 1) {$creditchecked = checked;}
             ?>
             
             <h2>Social Display Settings:</h2>
             <label for="mokis_show_googleplus">
                 <p><input type="checkbox" name="mokis_show_googleplus" value="1" <?php echo $gpluschecked; ?> /> :<b>Google Plus</b> - Check this box to show Google Plus on your Floating bar.</p>
             </label>
             <label for="mokis_show_digg">
                 <p><input type="checkbox" name="mokis_show_digg" value="1" <?php echo $diggchecked; ?> /> :<b>Digg</b> - Check this box to show Digg on your Floating bar.</p>
             </label>
             <label for="mokis_show_twitter">
                 <p><input type="checkbox" name="mokis_show_twitter" value="1" <?php echo $twitterchecked; ?> /> :<b>Twitter</b> - Check this box to show Twitter on your Floating bar.</p>
             </label>
             <label for="mokis_show_facebook">
                 <p><input type="checkbox" name="mokis_show_facebook" value="1" <?php echo $facebookchecked; ?> /> :<b>Facebook</b> - Check this box to show Facebook on your Floating bar.</p>
             </label>
             <label for="mokis_show_stumble">
                 <p><input type="checkbox" name="mokis_show_stumble" value="1" <?php echo $stumblechecked; ?> /> :<b>Stumble</b> - Check this box to show Stumble on your Floating bar.</p>
             </label>
             More Social Networks will be added shortly (we are going through extensive testing and implementing lazy loading first)
             
             <hr />
             
             <h2>Where to Show the Floating Bar:</h2>
             <label for="mokis_social_data_posts">
                 <p><input type="checkbox" name="mokis_social_data_posts" value="1" <?php echo $postsshowchecked; ?> /> :<b>Posts</b> - Check this box to show the floating social bar on posts.</p>
             </label>
             <label for="mokis_social_data_pages">
                 <p><input type="checkbox" name="mokis_social_data_pages" value="1" <?php echo $pagesshowchecked; ?> /> :<b>Pages</b> - Check this box to show the floating social bar on pages.</p>
             </label>
             
             <hr />
             
             <h2>Other Settings:</h2>
             <label for="mokis_social_data_credit">
                 <p><input type="checkbox" name="mokis_social_data_credit" value="1" <?php echo $creditchecked; ?> /> : Check this box to show powered by on your Floating bar.  Please keep in mind that this is a free plugin and this is how we get others interested to continue development.</p>
             </label>
             
             <br /><br />
             <a href="http://www.android-advice.com/2012/faster-seo-friendly-digg-digg-alternative-wordpress-plugin/" title="Digg Digg Alternative Social Toolbar" target="_blank">AA's Social Toolbar</a> - This is where you can request features, report bugs, or just talk about the plugin in general.
             
         </td>
	   </tr>
	</tbody>
</table>
</form>