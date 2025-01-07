<?php
if(!defined('ABSPATH'))exit;
function _save_channel_settings() {
    if (!isset($_POST['channel_settings_nonce']) || !wp_verify_nonce($_POST['channel_settings_nonce'], 'save_channel_settings')) {
        wp_die('Invalid nonce');
    }
    
    $channels = array();
    $channel_ids = $_POST['channel_id'] ?? array();
    $channel_names = $_POST['channel_name'] ?? array();
    $channel_filters = $_POST['channel_filter'] ?? array();
    $broadcast_times = $_POST['broadcast_time'] ?? array();
    
    foreach ($channel_ids as $key => $channel_id) {
        if (!empty($channel_id) && !empty($channel_names[$key])) {
            $channels[$key] = array(
                'id' => sanitize_text_field($channel_id),
                'name' => sanitize_text_field($channel_names[$key]),
                'filter' => sanitize_text_field($channel_filters[$key]),
                'times' => array_map('sanitize_text_field', explode(',', $broadcast_times[$key]))
            );
        }
    }
    
    update_option('_channel_filters', $channels);
    wp_redirect(add_query_arg('settings-updated', 'true', wp_get_referer()));
    exit;
}
add_action('admin_post_save_channel_settings', '_save_channel_settings');

function _6(){
    $saved_channels = get_option('_channel_filters', array());
    ?>
    <div class="wrap">
        <h2>YouTube Live Broadcasts Settings</h2>
        <form method="post" action="<?php echo admin_url('admin-post.php'); ?>">
            <input type="hidden" name="action" value="save_channel_settings">
            <?php wp_nonce_field('save_channel_settings', 'channel_settings_nonce'); ?>
            
            <div id="channel_fields">
                <?php 
                if (empty($saved_channels)) {
                    $saved_channels = array(array(
                        'id' => '',
                        'name' => '',
                        'filter' => '',
                        'times' => array()
                    ));
                }
                
                foreach ($saved_channels as $key => $channel): ?>
                    <div class="channel-entry">
                        <h3>Channel <?php echo $key + 1; ?></h3>
                        <table class="form-table">
                            <tr>
                                <th><label for="channel_name_<?php echo $key; ?>">Channel Name</label></th>
                                <td>
                                    <input type="text" name="channel_name[]" id="channel_name_<?php echo $key; ?>"
                                           value="<?php echo esc_attr($channel['name']); ?>" class="regular-text">
                                </td>
                            </tr>
                            <tr>
                                <th><label for="channel_id_<?php echo $key; ?>">Channel ID</label></th>
                                <td>
                                    <input type="text" name="channel_id[]" id="channel_id_<?php echo $key; ?>"
                                           value="<?php echo esc_attr($channel['id']); ?>" class="regular-text">
                                </td>
                            </tr>
                            <tr>
                                <th><label for="channel_filter_<?php echo $key; ?>">Title Filter</label></th>
                                <td>
                                    <input type="text" name="channel_filter[]" id="channel_filter_<?php echo $key; ?>"
                                           value="<?php echo esc_attr($channel['filter']); ?>" class="regular-text">
                                    <p class="description">Enter keywords to filter broadcasts (e.g., "LOTTERY LIVE")</p>
                                </td>
                            </tr>
                            <tr>
                                <th><label for="broadcast_time_<?php echo $key; ?>">Broadcast Times</label></th>
                                <td>
                                    <input type="text" name="broadcast_time[]" id="broadcast_time_<?php echo $key; ?>"
                                           value="<?php echo esc_attr(implode(',', $channel['times'])); ?>" class="regular-text">
                                    <p class="description">Enter broadcast times in 24-hour format, separated by commas (e.g., "13:00,18:00,20:00")</p>
                                </td>
                            </tr>
                        </table>
                        <button type="button" class="button remove-channel">Remove Channel</button>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <button type="button" id="add_channel" class="button">Add Another Channel</button>
            <?php submit_button('Save All Channel Settings'); ?>
        </form>
    </div>
    
    <style>
        .channel-entry { 
            background: #fff; 
            padding: 15px; 
            margin-bottom: 20px; 
            border: 1px solid #ccd0d4;
            border-radius: 4px;
        }
        .remove-channel {
            color: #a00;
            margin-top: 10px;
        }
        #add_channel {
            margin: 20px 0;
        }
    </style>
    
    <script>
    jQuery(document).ready(function($) {
        $('#add_channel').click(function() {
            var count = $('.channel-entry').length;
            var template = $('.channel-entry').first().clone();
            
            template.find('h3').text('Channel ' + (count + 1));
            template.find('input').val('');
            template.find('input').each(function() {
                var newId = $(this).attr('id').replace('_0_', '_' + count + '_');
                $(this).attr('id', newId);
            });
            
            $('#channel_fields').append(template);
        });
        
        $(document).on('click', '.remove-channel', function() {
            if ($('.channel-entry').length > 1) {
                $(this).closest('.channel-entry').remove();
                $('.channel-entry').each(function(index) {
                    $(this).find('h3').text('Channel ' + (index + 1));
                });
            }
        });
    });
    </script>
    <?php
}

function _c(){add_menu_page('YouTube Live Broadcasts','YouTube Live Broadcasts','manage_options','_5','_d',
'dashicons-video-alt3',6);}add_action('admin_menu','_c');function _d(){_6();}