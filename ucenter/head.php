<?php include('chk.php');?>
<?php
if ($xtcms_pc==1){
?>

<script>
function uaredirect(f){try{if(document.getElementById("bdmark")!=null){return}var b=false;if(arguments[1]){var e=window.location.host;var a=window.location.href;if(isSubdomain(arguments[1],e)==1){f=f+"/#m/"+a;b=true}else{if(isSubdomain(arguments[1],e)==2){f=f+"/#m/"+a;b=true}else{f=a;b=false}}}else{b=true}if(b){var c=window.location.hash;if(!c.match("fromapp")){if((navigator.userAgent.match(/(iPhone|iPod|Android|ios)/i))){location.replace(f)}}}}catch(d){}}function isSubdomain(c,d){this.getdomain=function(f){var e=f.indexOf("://");if(e>0){var h=f.substr(e+3)}else{var h=f}var g=/^www\./;if(g.test(h)){h=h.substr(4)}return h};if(c==d){return 1}else{var c=this.getdomain(c);var b=this.getdomain(d);if(c==b){return 1}else{c=c.replace(".","\\.");var a=new RegExp("\\."+c+"$");if(b.match(a)){return 2}else{return 0}}}};
</script>
<script type="text/javascript">uaredirect("<?php echo $xtcms_domain;?>wap/user.php");</script>

<?php	 } ?>
<header class="navbar">		
		<div class="container">			
			<div class="clearfix navbar-top">				
				<a href="<?php echo $xtcms_domain;?>"><img src="<?php echo $xtcms_logo;?>" class="pull-left logo-left"></a>				
				<button class="navbar-toggle pull-left" type="button" data-toggle="collapse" data-target=".navbar-collapse">		
					<span class="sr-only">Toggle navigation</span>			
					<span class="icon-bar"><i class="iconfont icon-gengduo"></i></span>		
					<span class="icon-bar"></span>				
					<span class="icon-bar"></span>				
				</button>				
				<form class="navbar-form hidden-xs" role="search" action="<?php echo $xtcms_domain;?>seacher.php" method="post">					
					<div class="form-group">					
						<input type="search" placeholder="搜索视频" class="form-control js-search" name="wd">				
					</div>					
					<button type="submit" class="button iconfont icon-search"></button>				
				</form>				
				<a class="pull-right hidden-xs">					
						
					<span class="telephone"><img src="<?php echo $xtcms_weixin;?>"></span>			
				</a>			
				<div class="navbar-user pull-right visible-xs"  style="top:16px;" >					
				<?php if($_SESSION['user_name']!=''){?>						
					<ul class="nav navbar-nav navbar-right">														
						<li class="info-img">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> 		
								<span><?php echo $_SESSION['user_name'];?></span> <i class="iconfont icon-xia"></i> 
							</a>								
									<ul class="dropdown-menu menu-ul" role="menu">									
										<li><a href="userinfo.php"><i class="iconfont icon-shezhi"></i>个人设置</a></li>		
										<li><a href="index.php"><i class="iconfont icon-001"></i> 账户中心</a></li>	
										<li><a href="exit.php"><i class="iconfont icon-tuichu"></i>退出登录</a></li>										
									</ul>								
						</li>					
					</ul>					
					
				<?php }?>				
				</div>			
			</div>		
		</div>		
		<nav class="nav-collapse">			
			<div class="container">				
				<div class="navbar-header">					
					<ul class="nav navbar-left navbar-collapse collapse">						
						<li class=""><a href="<?php echo $xtcms_domain;?>" class="">首页 </a></li>						
					<?php if($xtcms_dianying==1){?><li <?php echo $movie;?>><a href="<?php echo $xtcms_domain;?>movie.php">电影</a></li><?php }?>
					<?php if($xtcms_dianshi==1){?><li <?php echo $tv;?>><a href="<?php echo $xtcms_domain;?>tv.php">电视剧</a></li><?php }?>
					<?php if($xtcms_dongman==1){?><li <?php echo $dm;?>><a href="<?php echo $xtcms_domain;?>dongman.php">动漫</a></li><?php }?>
					<?php if($xtcms_zongyi==1){?><li <?php echo $zy;?>><a href="<?php echo $xtcms_domain;?>zongyi.php">综艺</a></li><?php }?>
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
				<div class="navbar-user hidden-xs">				
					<ul class="nav navbar-nav navbar-right">						
					<?php if($_SESSION['user_name']!=''){?>				
						<ul class="nav navbar-nav navbar-right">							
													
								<li class="info-img">
									<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> 				
				
											<img src="images/093958e59110293063.jpg" class="img-circle" />		
								
										<span><?php echo $_SESSION['user_name'];?></span> <i class="iconfont icon-xia"></i> 
									</a>									
									<ul class="dropdown-menu menu-ul" role="menu">								
										<li><a href="userinfo.php"><i class="iconfont icon-shezhi"></i>个人设置</a></li>		
										<li><a href="index.php"><i class="iconfont icon-001"></i> 账户中心</a></li>	
										<li><a href="exit.php"><i class="iconfont icon-tuichu"></i>退出登录</a></li>	
									</ul>								
								</li>						
						</ul>					
					
<?php }?>					
					</ul>				
				</div>			
			</div>		
		</nav>    
	</header>  
