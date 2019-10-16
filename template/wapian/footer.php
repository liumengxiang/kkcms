<div class="hy-gototop hidden-sm hidden-xs hongbao">
   <ul class="item clearfix">
    <li><a href="<?php echo $xtcms_domain;?>ucenter" title="
	<?php echo $_SESSION['user_name'];?>
							<?php if(!isset($_SESSION['user_name']))
	echo "会员中心"	;


	?>

	"><i class="icon iconfont icon-member1"></i></a></li>

    <li><a href="<?php echo $xtcms_domain;?>book.php" title="留言求片"><i class="icon iconfont icon-comment"></i></a></li>
	<li><a href="javascript:()" title="观看记录"><i class="icon iconfont icon-record1"></i></a><div class="history clearfix" style="width:200px">
				<div class="head">
					<h5 class="margin-0 text-muted">观看历史</h5>
				</div>
<?php if ($timu!=""){?>
<script type="text/javascript ">
					$MH.limit = 10;
					$MH.WriteHistoryBox(200, 170, 'font');
					$MH.recordHistory({
						name: '<?php echo $timu; ?>',
						link: '<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];?>',
						pic: ''
					})
				</script>
<?php }elseif ($d_name!=""){?>
<script type="text/javascript ">
					$MH.limit = 10;
					$MH.WriteHistoryBox(200, 170, 'font');
					$MH.recordHistory({
						name: '<?php echo $d_name; ?>',
						link: '<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];?>',
						pic: ''
					})
				</script>
<?php }else {?>
<script type="text/javascript ">
					$MH.limit = 10;
					$MH.WriteHistoryBox(200, 170, 'font');
					$MH.recordHistory({
						name: '',
						link: '',
						pic: ''
					})
				</script>
<?php }?>

			</div>	</li>
    <li><a class="" href="javascript:#" title="二维码" onclick="ewm()" ><i class="icon iconfont icon-code1"></i></a></li>
     <div style="position: fixed;width: 100%;height: 100%;top: 0px;left: 0px;display: none;background-color:#000;z-index:99;" id="mb"></div>
<div style="position:fixed;width:300px;height:350px;top:50%;left:0%;margin-left:-150px;margin-top:-175px;display: none;z-index: 9999999;" id="gbewm" onclick="ewmgb()">
	<div style="text-align:center;line-height: 50px;background-color: #2db2ea;color: #fff;font-size: 20px;font-weight: bold;border-radius: 5px 5px 0px 0px;">扫描二维码，手机观看！</div>
	<img src="skin/images/5a617da73ac6a.png" id="ewmtp" style="width: 300px;height: 300px;border-radius: 0px 0px 5px 5px;"/>
</div>

    <li><a data-toggle="tooltip" data-placement="top" class="" href="javascript:scroll(0,0)" title="返回顶部"><i class="icon iconfont icon-uparrow"></i></a></li>   </ul>
  </div>
<div class="tabbar visible-xs hongbao">

		<a href="<?php echo $xtcms_domain;?>" class="item ">
       <i class="icon iconfont icon-home"></i>
        <p class="text">首页</p>
    </a>
	<a href="<?php echo $xtcms_domain;?>movie.php?m=/dianying/list.php?cat=all&page=1" class="item ">
         <i class="icon iconfont icon-film"></i>
        <p class="text">电影</p>
    </a>
  <a href="<?php echo $xtcms_domain;?>tv.php?m=/dianshi/list.php?cat=all&page=1" class="item ">
         <i class="icon iconfont icon-show"></i>
        <p class="text">电视剧</p>
    </a>
  <a href="<?php echo $xtcms_domain;?>dongman.php?m=/dongman/list.php?cat=all&page=1" class="item ">
        <i class="icon iconfont icon-mallanimation"></i>
        <p class="text">动漫</p>
    </a>
   <a href="<?php echo $xtcms_domain;?>zongyi.php?m=/zongyi/list.php?cat=all&pageno=1" class="item ">
     <i class="icon iconfont icon-flag"></i>
        <p class="text">综艺</p>
    </a>
</div>
<div class="container">
	<div class="row">
		<div class="hy-footer clearfix hongbao">
        <p style="padding: 0 4px;text-align:center" class="container-fluid"><?php echo $xtcms_copyright;?></p>
		<p style="padding: 0 3px;text-align:center" class="container-fluid"><?php echo $xtcms_icp;?></p>
		<p style="padding: 0 4px;text-align:center" class="container-fluid"><?php echo $xtcms_tongji;?></p>


		</div>
	</div>
</div>
<script type="text/javascript" charset="utf-8">
    $(function() {
        $(".videopic.lazy").lazyload({effect: "fadeIn"});
        $("[data-toggle='tooltip']").tooltip();
    });

</script>
<script>
	function ewm(){
		var url = "http://qr.liantu.com/api.php?text="+window.location.href;
		$("#ewmtp").attr('src',url);
		$("#gbewm").css("display","block");
		$("#gbewm").animate({left:'50%'});
	}
	function ewmgb(){
		$("#gbewm").animate({left:'100%'});
		$("#gbewm").css("display","none");
	}
    function jilu(obj) {
        var url = $(obj).attr('href');
        var img = $(obj).attr('src');
        var title = $(obj).attr('title');
        $.ajax({
            type: "get",
            url: "/history",
            dataType: "json",
            data: {"url": url, "img": img, "title": title},
            success: function () {

            }
        })
    }
</script>
</body>
</html>
