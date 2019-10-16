<div class="hy-head-menu">

	<div class="container">

	    <div class="row">

		  	<div class="item">

			    <div class="logo hidden-xs">

					<a class="hidden-sm hidden-xs" href="<?php echo $xtcms_domain;?>"><img src="<?php echo $xtcms_logo;?>" /></a>

		  			<a class="visible-sm visible-xs" href="<?php echo $xtcms_domain;?>"><img src="<?php echo $xtcms_logo;?>" /></a>

				</div>

				<div class="search">

<form id="ff-search" role="search" action="<?php echo $xtcms_domain;?>seacher.php" method="post">

                            <input class="form-control" placeholder="输入影片关键词..." type="text" id="ff-wd" name="wd" required="">

                            <input type="submit" class="hide"><a href="javascript:" class="btns" title="搜索" onClick="$('#ff-search').submit();"><i class="icon iconfont icon-search"></i></a></form>

			   </div>


			   <ul class="menulist hidden-xs">

					<li><a href="<?php echo $xtcms_domain;?>">首页</a></li>

					<?php if($xtcms_dianying==1){?><li <?php echo $movie;?>><a href="<?php echo $xtcms_domain;?>movie.php?m=/dianying/list.php?cat=all&page=1">电影</a></li><?php }?>

					<li <?php echo $tv;?>><a href="<?php echo $xtcms_domain;?>tv.php?m=/dianshi/list.php?cat=all&page=1">电视剧</a></li>
					<li <?php echo $mj;?>><a href="<?php echo $xtcms_domain;?>clist.php?type=mj">美剧</a></li>

					<?php if($xtcms_dongman==1){?><li <?php echo $dm;?>><a href="<?php echo $xtcms_domain;?>dongman.php?m=/dongman/list.php?cat=all&page=1">动漫</a></li><?php }?>

					<?php if($xtcms_zongyi==1){?><li <?php echo $zy;?>><a href="<?php echo $xtcms_domain;?>zongyi.php?m=/zongyi/list.php?cat=all&pageno=1">综艺</a></li><?php }?>



										<?php

						$result = mysql_query('select * from xtcms_nav order by id asc');

						while($row = mysql_fetch_array($result)){

						?>

<li class="act<?php echo $row['id'];?>"><a href="<?php echo $row['n_url'];?>" target="_blank"><?php echo $row['n_name'];?></a></li>

<?php

						}

						?>



				</ul>

		  	</div>

	    </div>

	</div>

</div>



