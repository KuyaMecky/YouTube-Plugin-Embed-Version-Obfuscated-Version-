<?php
if(!defined('ABSPATH'))exit;function _f(){$g=get_option('_3');if(empty($g)){return'<div class="notice-message">
Please configure YouTube Channel ID in the plugin settings.</div>';}$h=sprintf('https://www.youtube.com/embed/live_stream?channel=%s&enablejsapi=1&autoplay=1&mute=1',
esc_attr($g));return sprintf('<div class="youtube-live-container"><iframe id="youtube-live-frame" src="%s" frameborder="0" allowfullscreen allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
</iframe><script>document.addEventListener("DOMContentLoaded",function(){var i;var j=document.createElement("script");
j.src="https://www.youtube.com/iframe_api";var k=document.getElementsByTagName("script")[0];k.parentNode.insertBefore(j,k);
window.onYouTubeIframeAPIReady=function(){i=new YT.Player("youtube-live-frame",{events:{"onStateChange":l,"onReady":m}});};
function n(){const o=new Date();const p=new Date(o.toLocaleString("en-US",{timeZone:"Asia/Kolkata"}));const q=p.getHours();
const r=p.getMinutes();if(q===12&&r>=30||q===13&&r<=30)return"1 PM";if(q===17&&r>=30||q===18&&r<=30)return"6 PM";
if(q===19&&r>=30||q===20&&r<=30)return"8 PM";return null;}function m(){const s=n();if(!s){t("Waiting for next lottery draw...");
return;}if(i&&i.getVideoData){const u=i.getVideoData();if(u&&u.title){v(u.title,s);}}}function v(w,s){
const x=new RegExp(`LOTTERY LIVE DEAR ${s}`,"i");if(!x.test(w)){t(`Waiting for ${s} lottery draw to start...`);}}
function t(y){const z=document.querySelector(".youtube-live-container");if(z){z.innerHTML=`<div class="notice-message">${y}</div>`;}}
function l(A){if(A.data===YT.PlayerState.PLAYING){const s=n();if(s){const w=i.getVideoData().title;v(w,s);}else{
t("No lottery draw scheduled for current time");}}}setInterval(m,60000);});</script></div>',esc_url($h));}
function _b($B=[]){ob_start();?><style>.youtube-live-container{margin:20px auto;position:relative;width:100%;
max-width:100%;height:0;padding-bottom:56.25%;background-color:#f8f9fa;border-radius:8px;overflow:hidden;}
.youtube-live-container iframe{position:absolute;top:0;left:0;width:100%;height:100%;}.clock{position:relative;
width:300px;margin:5px auto;background-color:#fff;padding:20px;text-align:center;border:1px solid #ddd;
border-radius:10px;box-shadow:0 4px 6px rgba(0,0,0,0.1);font-family:'Arial',sans-serif;}#date{font-size:24px;
font-weight:bold;color:#333;margin-bottom:10px;}.countdown-container{display:flex;justify-content:center;
align-items:center;gap:10px;flex-wrap:wrap;}.countdown-item{display:flex;flex-direction:column;align-items:center;
background-color:#f9f9f9;padding:10px;border-radius:5px;box-shadow:0 2px 4px rgba(0,0,0,0.1);flex:1 1 auto;
margin:5px;min-width:80px;}.countdown-item span{font-size:24px;font-weight:bold;color:#333;}.countdown-item small{
font-size:14px;color:#666;margin-top:4px;}.header-draw{font-size:22px;font-weight:bold;color:#333;margin-bottom:15px;}
.notice-message{color:#004085;background-color:#cce5ff;border:1px solid #b8daff;padding:20px;margin:10px 0;
border-radius:5px;text-align:center;font-size:16px;min-height:315px;display:flex;align-items:center;
justify-content:center;}.draw-time{margin-top:20px;padding:15px;background-color:#f8f9fa;border-radius:5px;
font-size:16px;color:#333;text-align:center;border:1px solid #dee2e6;}</style><div class="clock"><p id="date"></p>
<div class="header-draw">Next Lottery Draw Will Start:</div><div id="countdown" class="countdown-container"></div>
</div><script>const C=document.getElementById('date');const D=document.getElementById('countdown');
const E='Asia/Kolkata';const F=[{hour:13,minute:0},{hour:18,minute:0},{hour:20,minute:0}];function G(){
const o=new Date();const H=new Intl.DateTimeFormat('en-US',{timeZone:E,month:'long',day:'numeric',year:'numeric'
}).format(o);C.innerText=H;}function I(){const o=new Date();const J=new Date(o.toLocaleString('en-US',
{timeZone:E}));for(let K of F){const L=new Date(J);L.setHours(K.hour,K.minute,0,0);if(L>J){return L;}}
const M=new Date(J);M.setDate(M.getDate()+1);M.setHours(F[0].hour,F[0].minute,0,0);return M;}function N(){
const o=new Date();const L=I();const O=L-o;if(O<=0){D.innerHTML='<div class="countdown-item"><span>LIVE NOW!</span></div>';
return;}const q=Math.floor((O/(1000*60*60))%24);const r=Math.floor((O/(1000*60))%60);const P=Math.floor((O/1000)%60);
D.innerHTML=`<div class="countdown-container"><div class="countdown-item"><span>${String(q).padStart(2,'0')}</span>
<small>Hours</small></div><div class="countdown-item"><span>${String(r).padStart(2,'0')}</span><small>Minutes</small>
</div><div class="countdown-item"><span>${String(P).padStart(2,'0')}</span><small>Seconds</small></div></div>`;}
setInterval(N,1000);N();G();</script><div id="yt-live-broadcast"><?php echo _f();?></div><div class="draw-time">
Daily Lottery Draw Times (IST):<br>1:00 PM | 6:00 PM | 8:00 PM</div><?php return ob_get_clean();}
add_shortcode('youtube_live','_b');