<?php
if(!defined('ABSPATH'))exit;
function _f($channel_key = null){
    $channels = get_option('_channel_filters', array());
    if (empty($channels)) {
        return '<div class="notice-message">Please configure YouTube Channel settings in the plugin settings.</div>';
    }
    
    if ($channel_key !== null && isset($channels[$channel_key])) {
        $channel = $channels[$channel_key];
    } else {
        $channel = reset($channels);
    }
    
    $h = sprintf('https://www.youtube.com/embed/live_stream?channel=%s&enablejsapi=1&autoplay=1&mute=1',
        esc_attr($channel['id']));
        
    $filter_js = !empty($channel['filter']) ? 
        sprintf('const titleFilter = "%s";', esc_js($channel['filter'])) : 
        'const titleFilter = "";';
        
    $times_js = !empty($channel['times']) ? 
        sprintf('const broadcastTimes = %s;', json_encode($channel['times'])) : 
        'const broadcastTimes = [];';
    
    return sprintf('<div class="youtube-live-container"><iframe id="youtube-live-frame" src="%s" frameborder="0" 
    allowfullscreen allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
    </iframe><script>%s %s document.addEventListener("DOMContentLoaded",function(){var i;var j=document.createElement("script");
    j.src="https://www.youtube.com/iframe_api";var k=document.getElementsByTagName("script")[0];
    k.parentNode.insertBefore(j,k);window.onYouTubeIframeAPIReady=function(){i=new YT.Player("youtube-live-frame",
    {events:{"onStateChange":l,"onReady":m}});};function n(){const o=new Date();
    const p=new Date(o.toLocaleString("en-US",{timeZone:"Asia/Kolkata"}));return broadcastTimes.some(time => {
        const [hours, minutes] = time.split(":").map(Number);
        return p.getHours() === hours && Math.abs(p.getMinutes() - minutes) <= 30;
    });}function m(){const s=n();if(!s){t("No broadcast scheduled for current time");return;}
    if(i&&i.getVideoData){const u=i.getVideoData();if(u&&u.title){v(u.title);}}}
    function v(w){if(titleFilter && !w.toLowerCase().includes(titleFilter.toLowerCase())){
    t("Waiting for next scheduled broadcast...");}else{const z=document.querySelector(".youtube-live-container");
    if(z&&z.querySelector(".notice-message")){z.innerHTML=i.getIframe().outerHTML;}}}
    function t(y){const z=document.querySelector(".youtube-live-container");
    if(z){z.innerHTML=`<div class="notice-message">${y}</div>`;}}
    function l(A){if(A.data===YT.PlayerState.PLAYING){const s=n();if(s){const w=i.getVideoData().title;v(w);}
    else{t("No broadcast scheduled for current time");}}}setInterval(m,60000);});</script></div>',
    esc_url($h), $filter_js, $times_js);
}

// Rest of frontend.php remains the same as before, but update _b() function to accept channel parameter
function _b($atts=[]){
    $channel_key = isset($atts['channel']) ? $atts['channel'] : null;
    ob_start();
    // ... (rest of the styling and countdown code remains the same)
    ?>
    <div id="yt-live-broadcast"><?php echo _f($channel_key);?></div>
    <?php
    return ob_get_clean();
}
add_shortcode('youtube_live','_b');