Obfuscated Plugin Files

// File 1: youtube-live-broadcasts.php
<?php
/*
Plugin Name: YouTube Live Broadcasts
Description: Display lottery live broadcasts from a YouTube channel with time-based filtering.
Version: 1.6
Author: Michael Tallada (Embed Version)
*/
if(!defined('ABSPATH'))exit;$_0=__FILE__;
function _1(){
    register_setting('_2','_3');
    register_setting('_2','_channel_filters');
    register_setting('_2','_broadcast_settings');
}
add_action('admin_init','_1');
function _4(){add_options_page('YouTube Live Broadcasts','YouTube Live Broadcasts','manage_options','_5','_6');}
add_action('admin_menu','_4');require_once plugin_dir_path($_0).'includes/admin.php';
require_once plugin_dir_path($_0).'includes/frontend.php';function _7(){register_widget('_8');}
add_action('widgets_init','_7');class _8 extends WP_Widget{function __construct(){parent::__construct('_9',
__('YouTube Live Broadcasts','_a'),array('description'=>__('Displays filtered live broadcasts from YouTube channels.',
'_a')));}public function widget($b,$c){echo$b['before_widget'];if(!empty($c['title'])){echo$b['before_title'].
apply_filters('widget_title',esc_html($c['title'])).$b['after_title'];}echo _b($c);echo$b['after_widget'];}
public function form($c){$d=!empty($c['title'])?$c['title']:__('Live Broadcast','_a');
$saved_channels = get_option('_channel_filters', array());?>
<p><label for="<?php echo $this->get_field_id('title');?>"><?php _e('Title:');?></label>
<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" 
type="text" value="<?php echo esc_attr($d);?>">
<label for="<?php echo $this->get_field_id('channel');?>"><?php _e('Select Channel:');?></label>
<select class="widefat" id="<?php echo $this->get_field_id('channel');?>" name="<?php echo $this->get_field_name('channel');?>">
<?php foreach($saved_channels as $key => $channel): ?>
    <option value="<?php echo esc_attr($key); ?>" <?php selected($c['channel'], $key); ?>>
        <?php echo esc_html($channel['name']); ?>
    </option>
<?php endforeach; ?>
</select>
</p><?php }public function update($e,$f){$c=array();
$c['title']=(!empty($e['title']))?strip_tags($e['title']):'';
$c['channel']=(!empty($e['channel']))?strip_tags($e['channel']):'';
return $c;}}