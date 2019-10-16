<?php
if ($xtcms_pc==1){
?>

<script>
function uaredirect(f){try{if(document.getElementById("bdmark")!=null){return}var b=false;if(arguments[1]){var e=window.location.host;var a=window.location.href;if(isSubdomain(arguments[1],e)==1){f=f+"/#m/"+a;b=true}else{if(isSubdomain(arguments[1],e)==2){f=f+"/#m/"+a;b=true}else{f=a;b=false}}}else{b=true}if(b){var c=window.location.hash;if(!c.match("fromapp")){if((navigator.userAgent.match(/(iPhone|iPod|Android|ios)/i))){location.replace(f)}}}}catch(d){}}function isSubdomain(c,d){this.getdomain=function(f){var e=f.indexOf("://");if(e>0){var h=f.substr(e+3)}else{var h=f}var g=/^www\./;if(g.test(h)){h=h.substr(4)}return h};if(c==d){return 1}else{var c=this.getdomain(c);var b=this.getdomain(d);if(c==b){return 1}else{c=c.replace(".","\\.");var a=new RegExp("\\."+c+"$");if(b.match(a)){return 2}else{return 0}}}};
</script>
<?php
if ($_GET['play']!=""){
$cc="play.php?play=";
$dd="bplay.php?play=";
$yugao=explode('.html',$_GET['play']);
for($k=0;$k<count($yugao);$k++){
if ($k>0){
$tiaourl=$cc.$_GET['play'];
		}
else{
$tiaourl=$dd.$_GET['play'];	
		}
}
}
?>

<script type="text/javascript">uaredirect("<?php echo $xtcms_domain;?>wap/<?php echo $tiaourl;?>");</script>

<?php	 } ?>
<?php
if ($xtcms_hong==1){
?>

	<style type="text/css">

	.weixin-tip{display: none; position: fixed; left:0; top:0; bottom:0; background: rgba(0,0,0,0.8); filter:alpha(opacity=80);  height: 100%; width: 100%; z-index: 99999;}
	.weixin-tip p{text-align: center; margin-top: 10%; padding:0 5%;}
	</style>
	<div class="weixin-tip">
		<p>
			<img src="<?php echo $xtcms_domain;?>images/live_weixin.png" width=100% alt="微信打开"/>
		</p>
	</div>
		<script type="text/javascript">        $(window).on("load",function(){	        var winHeight = $(window).height();			function is_weixin() {			    var ua = navigator.userAgent.toLowerCase();			    if (ua.match(/MicroMessenger/i) == "micromessenger") {			        return true;			    } else {			        return false;			    }			}			var isWeixin = is_weixin();			if(isWeixin){				$(".weixin-tip").css("height",winHeight);	            $(".weixin-tip").show();			}        })	</script>
<?php	 } ?>
