<?php
if(!defined('ABSPATH'))exit;function _6(){?><div><h2>YouTube Live Broadcasts Settings</h2><form method="post" action="options.php">
<?php settings_fields('_2');?><table><tr valign="top"><th scope="row"><label for="_3">Channel ID</label></th><td>
<input type="text" id="_3" name="_3" value="<?php echo esc_attr(get_option('_3'));?>"/>
<p class="description">Enter your YouTube channel ID</p></td></tr></table><?php submit_button();?></form></div><?php }
function _c(){add_menu_page('YouTube Live Broadcasts','YouTube Live Broadcasts','manage_options','_5','_d',
'dashicons-video-alt3',6);}add_action('admin_menu','_c');function _d(){?><div class="wrap">
<h1>YouTube Live Broadcasts Dashboard</h1><div><h2>Settings</h2><form method="post" action="options.php">
<?php settings_fields('_2');?><table><tr valign="top"><th scope="row"><label for="_3">Channel ID</label></th>
<td><input type="text" id="_3" name="_3" value="<?php echo esc_attr(get_option('_3'));?>"/></td></tr>
<tr valign="top"><th scope="row"><label for="_e">Title Filter</label></th><td><input type="text" id="_e" 
name="_e" value="<?php echo esc_attr(get_option('_e'));?>"/></td></tr></table><?php submit_button();?>
</form></div><div><h2>Live Broadcasts</h2><?php echo _b();?></div></div><?php }
