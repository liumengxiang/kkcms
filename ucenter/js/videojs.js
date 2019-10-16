var player = "";
var wd;
var bijiContent;
var time = 0;
var startTime = $("#startTime").val();
var classTypeId = $("#classTypeId").val();
var moduleId = $("#moduleId").val();
var noteId = $("#noteId").val();
var b = false;
var n = false;
var namedtype;
var listenTime;
var listenHint;
var studytime;
var uhId;
var uhaId;
var namedTime;
var namedNum;
var obj = new Array();
var player_type;
var res;
var xxj = false;;

	$(function(){
		var cuId = $("#cuId").val();
		/***
		 * 打开或关闭右侧栏
		 */
		$("#headContents").remove();

		//离开页面时触发 
		$( window ).unload(function() {
			getVideoTime();
		});
		
		//退出
		$(".btn-logout").click(function(){
			$.post(rootPath+"/logout",function(){
				location.href=rootPath+"/";
			});
		});
		//返回
		$(".btn-return").click(function(){
			location.href = document.referrer;
		});

		var toggle=function(){
		    if($(".aside").hasClass("close")){
		        //打开
		        $(".content").animate({"right": 399}, 200, function () {
		            $(".aside").removeClass("close").addClass("open");
		            if(wd == "VIDEO_STORAGE_TYPE_SS"){
		            	$("object").attr("width",(parseInt($("object").attr("width")) - 399));
		            }
		        });
		    }else{
		        //关闭
		        $(".content").animate({"right": 0}, 200, function () {
		            $(".aside").removeClass("open").addClass("close");
		        });
	            if(wd == "VIDEO_STORAGE_TYPE_SS"){
	            	$("object").attr("width",(parseInt($("object").attr("width")) + 399));
	            }
		    }
		};

		$(".biji-area").on("change keyup keydown keypress",function(){
		    bcont();
		});
		$(".ping-area").on("change keyup keydown keypress",function(){
		    cont();
		});
	    $(".section").css("height",$(window).height()-60);
	    $(".video").css("height",$(window).height()-110);
	    $(".rightFix").css("top",($(window).height()-(($(".rightFix").height())+160))/2);
	    
	    $(".rightFix li").each(function (index) {
	    	$(this).css("opacity", 1);
	        var $this=$(this);
	        $this.click(function () {
	        	if($this.attr("data-types") == "exer"){
	        		if(wd == "VIDEO_STORAGE_TYPE_YK"){
	        			if(player != ""){
		        			player.pauseVideo();
	        			}
	        		}else if(wd == "VIDEO_STORAGE_TYPE_LETV"){
						if(player != ""){
							player.sdk.pauseVideo();
						}
					}else{
	        			if(player != ""){
		        			player.pause();
	        			}
	        		}
	        		window.open(rootPath + "/" + $this.attr("data-url"));
	        		return false;
	        	}
	            var $source=$(".rightFix").find(".active").length?$(".rightFix").find(".active"):$(".rightFix").find("li").eq(0);
	            var $target=$(this);
	            $(this).css("opacity", 1).css("background-color","#00baee")
	            	.siblings().css("opacity", 1)
	            	.css("background-color","#232323");
	            $(this).addClass("active");

	            if ($(".aside").hasClass("open") && $source.index()==$target.index()) {
	                toggle();
	            }
	            else if($(".aside").hasClass("open") && $source.index()!=$target.index()){
	                $source.removeClass("active");
	                $target.addClass("active");
	                var tabsArray = ["zhangjie", "biji", "pinglun"];
	                for (var i = 0; i < tabsArray.length; i++) {
	                    if (i == index) {
	                        $("#" + tabsArray[i]).css("display","block");
		                    if(index == 1){
	                    		$(".selnotef").remove();
		                    	$(".notemore").remove();
		                    	$(".biji_move").remove();
								$("#biji .dott").remove();
		                    	if(typeof(player) != "undefined" && player != ""){
		                    		$("#biji").append("<div class='notemore' style='text-align: center;height:50px;padding:10px'><img src='" + rootPath + "/images/jia.jpg' width='20px' height='20px' id='jia' /></div>");
		            				selnote(1,player,wd);
		                    	}else if(wd == "VIDEO_STORAGE_TYPE_SS" || wd == "VIDEO_STORAGE_TYPE_TD" || wd == "VIDEO_STORAGE_TYPE_SCORM"){
		                    		$("#biji").append("<div class='notemore' style='text-align: center;height:50px;padding:10px'><img src='" + rootPath + "/images/jia.jpg' width='20px' height='20px' id='jia' /></div>");
		            				selnote(1,player,wd);
		                    	}
		                    }else if(index == 2){
		                    	$(".others").html("<div class='commentmore' style='text-align: center;height:50px;padding:10px'><img src='" + rootPath + "/images/jia.jpg' width='20px' height='20px' id='jia' /></div>");
		                    	selcomment(1);
		                    }
	                    }
	                    else {
	                        $("#" + tabsArray[i]).css("display","none");
	                    }
	                }

	            }else if($(".aside").hasClass("close")  && $source.index()==$target.index()) {
	                    toggle();
	            }else {
	                $source.removeClass("active");
	                $target.addClass("active");
	                var tabsArray = ["zhangjie", "biji", "pinglun"];
	                for (var i = 0; i < tabsArray.length; i++) {
	                    if (i == index) {
	                        $("#" + tabsArray[i]).css("display", "block");
		                    if(index == 1){
		                    	$(".notemore").remove();
		                    	$(".biji_move").remove();
								$("#biji .dott").remove();
	                    		$(".selnotef").remove();
		                    	if(typeof(player) != "undefined" && player != ""){
		                    		$("#biji").append("<div class='notemore' style='text-align: center;height:50px;padding:10px'><img src='" + rootPath + "/images/jia.jpg' width='20px' height='20px' id='jia' /></div>");
		            				selnote(1,player,wd);
		                    	}else if(wd == "VIDEO_STORAGE_TYPE_SS" || wd == "VIDEO_STORAGE_TYPE_TD" || wd == "VIDEO_STORAGE_TYPE_SCORM"){
		                    		$("#biji").append("<div class='notemore' style='text-align: center;height:50px;padding:10px'><img src='" + rootPath + "/images/jia.jpg' width='20px' height='20px' id='jia' /></div>");
		            				selnote(1,player,wd);
		                    	}
		                    }else if(index == 2){
		                    	$(".others").html("<div class='commentmore' style='text-align: center;height:50px;padding:10px'><img src='" + rootPath + "/images/jia.jpg' width='20px' height='20px' id='jia' /></div>");
		                    	selcomment(1);
		                    }
	                    }
	                    else {
	                        $("#" + tabsArray[i]).css("display", "none");
	                    }
	                }
	                toggle();
	            }
	        });
	    });
	    currentVideo();
		$(".study").each(function(){
			// 点击学习 --%>
			if($(this).find(".lectureId").val() == $("#lecId").val()){
				
				$(this).addClass("zjplaying");
				$(this).find(".zj_name").addClass("zhangjie_active");
				//$(this).find(".constant_width div:eq(0)").attr("class","zj_time_bf");
				if($(this).attr("ststatus") == 3){
					$(".studyOk").attr("data-status",1);
					$(".learning").css("background-image","url('" + rootPath + "/stylesheets/video/img/shi.png')");
				}
			}
			$(this).click(function(){
				getVideoTime();
				player = "";
				var lectureId = $(this).find(".lectureId").val();
				$("#lecId").val(lectureId);
				if($(this).attr("ststatus") == 3){
					$(".studyOk").attr("data-status",1);
					$(".learning").css("background-image","url('" + rootPath + "/stylesheets/video/img/shi.png')");
				}else{
					$(".studyOk").attr("data-status",0);
					$(".learning").css("background-image","url('" + rootPath + "/stylesheets/video/img/kong.png')");
				}
			// 更换样式 --%>
				//获得之前的东西
				$(".study.zjplaying").find(".zj_name").removeClass("zhangjie_active");
				$(".study.zjplaying").removeClass("zjplaying");
				
				$(this).addClass("zjplaying");
				$(this).find(".zj_name").addClass("zhangjie_active");
				//$(this).find(".constant_width div:eq(0)").attr("class","zj_time_bf");
				
				if(res != null){
					res.abort();
				}
				res = $.ajax({
					url:rootPath + "/classModule/selVideoFreeFlag",
					type:"post",
					dataType:"json",
					data:{"id":lectureId,"classTypeId":classTypeId,"moduleId":moduleId},
					success:function(data){
						xxj = false;
						if(data.msg == "outTime"){
							$('<div class="c-fa">'+ "该公司的服务已过有效期，暂时不能播放！" +'</div>').appendTo('body').fadeIn(100).delay(2000).fadeOut(200,function(){
								$(this).remove();});
						}else if(data.msg == "outFlow"){
							$('<div class="c-fa">'+ "视频流量已经用完，暂时不能播放！" +'</div>').appendTo('body').fadeIn(100).delay(2000).fadeOut(200,function(){
								$(this).remove();});
						}else if(data.msg == "flag"){
							$('<div class="c-fa">'+ "此视频为收费视频，购买后可继续观看！" +'</div>').appendTo('body').fadeIn(100).delay(2000).fadeOut(200,function(){
								$(this).remove();});
						}else if(data.msg == "outDate"){
							$('<div class="c-fa">'+ "该课程已过期，不能继续观看" +'</div>').appendTo('body').fadeIn(100).delay(2000).fadeOut(200,function(){
								$(this).remove();});
						}else if(data.msg == "outVideoCount"){
							$('<div class="c-fa">'+ "观看次数已达上限" +'</div>').appendTo('body').fadeIn(100).delay(2000).fadeOut(200,function(){
								$(this).remove();});
						}else{
							xxj = true;
							$(".exercise").hide();
							if(data.cv != null){
								if(data.b == true){
									b = true;
									listenTime = (data.cv.overFlowTime * 60);
									listenHint = data.cv.overFlowInfo;
									//$(".btom").css("visibility","visible");
								}else{
									b = false;
									named(data.cv);
									//$(".btom").css("visibility","visible");
								}
							}else{
								$(".btom").css("visibility","hidden");
							}
							console.log(data.msg.video)
							if(data.msg.video.storageType=="VIDEO_STORAGE_TYPE_LETV"){
								objectPlay(data.msg.lectureName,data.msg.video.webVideoId,cuId,data.msg.video.webVideoId,data.msg.video.storageType);
							}else{
								objectPlay(data.msg.lectureName,data.msg.video.videoCcId,cuId,data.msg.video.webVideoId,data.msg.video.storageType);
							}
							wd = data.msg.video.storageType;
							$(".btn-down").attr("data-id",lectureId);
							$("#note").attr("data-id",data.msg.id);
							$("#comment").attr("data-id",data.msg.id);
							$("#chapterId").val(data.msg.chapterId);
							$("#videoId").val(data.msg.video.id);
							//添加第一个 视频 观看记录
							if(res != null){
								res.abort();
							}
							res = $.ajax({
								url:rootPath + "/userHistory/addHistory",
								type:"post",
								dataType:"json",
								data:{"lectureId":lectureId,"classTypeId":$("#classTypeId").val()},
								success:function(data){
									if(data.msg == "insertHistory" || data.msg == "updateHistory"){
										studytime = (data.studyLength != null ? data.studyLength : 0);
										uhId = data.uhId;
										uhaId = data.uhaId;
										$(".zjplaying").attr("stsid",data.id);
										$(".zjplaying").attr("ststatus",data.status);
										//$(this).find(".constant_width div:eq(0)").attr("class","zj_time_bf");
									}
								}
							});
							if($("#userId").val() != null && $("#userId").val() != ""){
								selExer();
							}
							//查询我的评论
							myComment();
						}
					}
				});
			});
		});
		
		//学完了
		$(".studyOk").click(function(){
			if(xxj && $(this).attr("data-status") == 0){
				updateStatus();
			}
		});
		
		//点击下载
		$(".btn-down").hover(function(){
		    $(this).css("color","#55d1f4");
		},function(){
		    $(this).css("color","#e4e1de");
		});
		
		$(".btn-down").click(function(){
			if(!xxj){
				return false;
			}
			$.ajax({
				url : rootPath + "/classTypeResource/selCount",
				type:"post",
				data:{"lectureId":$(this).attr("data-id"),"classTypeId":$("#classTypeId").val()},
				dataType:"json",
				success:function(data){
					if(data.re == "error"){
						$('<div class="c-fa">'+ data.msg +'</div>').appendTo('body').fadeIn(100).delay(2000).fadeOut(200,function(){
							$(this).remove();});
						return false;
					}
					if(data.re == "nouser"){
						$('<div class="c-fa">'+ data.msg +'</div>').appendTo('body').fadeIn(100).delay(2000).fadeOut(200,function(){
							$(this).remove();});
						return false;
					}
					if(data.count == 0){
						$('<div class="c-fa">'+ "当前课程下没有课程资料" +'</div>').appendTo('body').fadeIn(100).delay(2000).fadeOut(200,function(){
							$(this).remove();});
					}else if(data.count == 1){
						var objform = document.createElement("form");
						document.body.appendChild(objform);
						objform.action = rootPath + "/classTypeResource/downLoad";
						objform.method = "post";
						
						var urlAddress = document.createElement("input");
						urlAddress.type = "hidden";
						objform.appendChild(urlAddress);
						urlAddress.value = data.source.id;
						urlAddress.name = "ids";
						
						var fileName = document.createElement("input");
						fileName.type = "hidden";
						objform.appendChild(fileName);
						fileName.value = data.source.name;
						fileName.name = "name";
						
						objform.submit();
					}else if(data.count > 1){
						$(".downlo").css("display","block");
						$(".downlo_box").find("ul").html("");
						$.each(data.source,function(index,item){
							$(".downlo_box").find("ul").append("<li><span class='down_text'>" + item.name + "</span><span data-name='" + item.name + "' data-url='" + item.url + "' class='iconfont dload'>&#xe612;</span></li>");
						});
						
						$(".downlo_box li").mouseenter(function(){
						    $(this).find(".iconfont").css("color","#03ABF7");
						}).mouseleave(function(){
						    $(this).find(".iconfont").css("color","#CCC9C3");
						});
						
						$(".dload").click(function(){
							var url = $(this).attr("data-url");
							var name = $(this).attr("data-name");
							
							var objform = document.createElement("form");
							document.body.appendChild(objform);
							objform.action = rootPath + "/classTypeResource/downLoad";
							objform.method = "post";
							
							var urlAddress = document.createElement("input");
							urlAddress.type = "hidden";
							objform.appendChild(urlAddress);
							urlAddress.value = url;
							urlAddress.name = "url";
							
							var fileName = document.createElement("input");
							fileName.type = "hidden";
							objform.appendChild(fileName);
							fileName.value = name;
							fileName.name = "name";
							
							objform.submit();
						});
						$(".classresourse").show();
					}
				}
			});
		});
		$(".shut").click(function(){
		    $(".downlo").css("display","none");
		});
		//pop
		$(".btn-pop").click(function(){
		    if($(".pop").hasClass("none")){
		        $(".pop").addClass("block").removeClass("none");
		    }else{
		        $(".pop").addClass("none").removeClass("block");
		    }
		});
		
		//评论
		$(".btn-star").click(function(){
			$(".btn-star").attr("class","btn btn-mini btn-default btn-star");
			$(this).attr("class","btn btn-mini btn-success btn-star");
		});
		
		//章节
		$(".study").hover(function(){
			if($(this).attr("class") != "study zjplaying"){
				//$(this).find(".constant_width div:eq(0)").attr("class","zj_time_bf");
				$(this).find(".zj_name").addClass("zhangjie_active");
			}
		},function(){
			if($(this).attr("class") != "study zjplaying"){
				$(this).find(".zj_name").removeClass("zhangjie_active");
				if(typeof($(this).attr("ststatus")) == "undefined" || $(this).attr("ststatus") == null ||
						$(this).attr("ststatus") == "" || $(this).attr("ststatus") == 1 ){
					$(this).find(".constant_width div:eq(0)").attr("class","zj_time");
				}else if($(this).attr("ststatus") == 2){
					$(this).find(".constant_width div:eq(0)").attr("class","zj_time_half");
				}else if($(this).attr("ststatus") == 3){
					$(this).find(".constant_width div:eq(0)").attr("class","zj_time_full");
				}
			}
		});
		
		//收藏
		$(".collect").hover(function(){
			if($(this).attr("data-uc") == 0){
				$(this).html("&#xe62d;");
			    $(this).css("color","#55d1f4");
			}
		},function(){
			if($(this).attr("data-uc") == 0){
				$(this).html("&#xe611;");
			    $(this).css("color","#e4e1de");
			}
		});
		
		if($(".collect").attr("data-uc") == 0){
		    $(".collect").css("color","#e4e1de");
			$(".collect").html("&#xe611;");
		}else{
		    $(".collect").css("color","#55d1f4");
			$(".collect").html("&#xe62d;");
		}
		//点击收藏
		$(".collect").click(function(){
			var collectId = $(this).attr("data-uc");
			if(collectId == 0){
				//收藏
				if(res != null){
					res.abort();
				}
				res = $.ajax({
					url : rootPath + "/userCollect/addCollect",
					type:"post",
					data:{"commodityId":$("#comId").val()},
					dataType:"json",
					success:function(data){
						if(data.msg == "success"){
							$(".collect").attr("data-uc",data.id);
						    $(".collect").css("color","#55d1f4");
							$(".collect").html("&#xe62d;");
							$('<div class="c-fa">'+ '课程已收藏' +'</div>').appendTo('body').fadeIn(100).delay(1000).fadeOut(200,function(){
								$(this).remove();});
						}else{
							$(".collect").html("&#xe611;");
							$('<div class="c-fa">'+ data.msg +'</div>').appendTo('body').fadeIn(100).delay(1000).fadeOut(200,function(){
								$(this).remove();});
						}
					}
				});
			}else{
				//删除
				if(res != null){
					res.abort();
				}
				res = $.ajax({
					url: rootPath + "/userCollect/delCollect",
					type:"post",
					data:{"id":collectId},
					dataType:"json",
					success:function(data){
						if(data.msg == "success"){
							$(".collect").attr("data-uc",0);
						    $(".collect").css("color","#e4e1de");
							$('<div class="c-fa">'+ '课程已取消收藏' +'</div>').appendTo('body').fadeIn(100).delay(1000).fadeOut(200,function(){
								$(this).remove();});
						}else{
							$('<div class="c-fa">'+ data.msg +'</div>').appendTo('body').fadeIn(100).delay(1000).fadeOut(200,function(){
								$(this).remove();});
						}
					}
				});
			}
		});
		
		//重新评论
		$(document).off("click").on("click",".myping_resit",function(){
			$(".ping").slideDown(200);
		});
		
		//提交评论
		$(".btn_fabu").click(function(){
			var score = 5;
			var comment = $.trim($("#commentContent").val());
	    	var lecId = $("#comment").attr("data-id");
	    	var teacherId = $("#teacherId").val();
	    	var id = $(".myping").attr("data-id");
			if(comment == null || comment == ""){
				$('<div class="c-fa">'+ '内容不能为空' +'</div>').appendTo('body').fadeIn(100).delay(1000).fadeOut(200,function(){
					$(this).remove();});
				return false;
			}
			if($("i.scoreSelected").length != 0){
				score = $("i.scoreSelected").attr("data-score");
			}
			if(res != null){
				res.abort();
			}
			res = $.ajax({
				url:rootPath + "/video/addComment",
				type:"post",
				data:{"id":id,"delFlag":0,"videoChapterId":$("#chapterId").val(),"source":$("#videoId").val(),"score":score,"comment":comment,"videoLectureId":lecId,"teacherId":teacherId,"classTypeId":$("#classTypeId").val()},
				dataType:"json",
				success:function(data){
					if(data.msg == "success"){
						//selcomment(1);
						$("#commentContent").val("");
						$(".ping").slideUp(200);
						$(".myping p").html(comment);
						$(".myping i").html(data.createTime);
						$(".myping").attr("data-id",data.id);
						$(".myping").slideDown(200);
						$(".ping .num").html("140/140");
					}else{
						$('<div class="c-fa">'+ data.msg +'</div>').appendTo('body').fadeIn(100).delay(2000).fadeOut(200,function(){
							$(this).remove();});
					}
					if(score == 1){
						$(".myping .students-star").html(""
								+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>"
								+ "<em class='iconfont kongstar'>&#xe606;</em>"
								+ "<em class='iconfont kongstar'>&#xe606;</em>"
								+ "<em class='iconfont kongstar'>&#xe606;</em>"
								+ "<em class='iconfont kongstar'>&#xe606;</em>");
					}else if(score == 2){
						$(".myping .students-star").html(""
								+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>"
								+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>"
								+ "<em class='iconfont kongstar'>&#xe606;</em>"
								+ "<em class='iconfont kongstar'>&#xe606;</em>"
								+ "<em class='iconfont kongstar'>&#xe606;</em>");
					}else if(score == 3){
						$(".myping .students-star").html(""
								+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>"
								+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>"
								+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>"
								+ "<em class='iconfont kongstar'>&#xe606;</em>"
								+ "<em class='iconfont kongstar'>&#xe606;</em>");
					}else if(score == 4){
						$(".myping .students-star").html(""
								+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>"
								+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>"
								+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>"
								+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>"
								+ "<em class='iconfont kongstar'>&#xe606;</em>");
					}else{
						$(".myping .students-star").html(""
								+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>"
								+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>"
								+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>"
								+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>"
								+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>");
					}
				}
			});
		});
		//这是评分方法
		$(".star span i").click(function(){
			$(".star span i").removeClass("scoreSelected");
			$(this).addClass("scoreSelected");
		    $(this).html("&#xe607;").css("color","gold");
		    $(this).prevAll("i").html("&#xe607;").css("color","gold");
		    $(this).nextAll("i").html("&#xe606;").css("color","#767a7a");
		});
	});
	
	//查询 是收费 还是免费 
	function objectPlay(name,ccid,cuId,webVideoId,storageType){
		// 替换嵌入播放插件 --%>
		$("#shipin").html(name);
		$("#video").html("");
		if(storageType == "VIDEO_STORAGE_TYPE_SCORM"){
			var doma = $("#imgpath").val();
			var url = "http://"+doma+"/"+webVideoId+"story.html";
			$("#video").html("<iframe src='"+url+ "'"
					+ "width='100%'"
					+ "height='100%'"
					+ "frameborder='0'"
					+ "scrolling='no'></iframe>");
		    time = 0;

			$("#biji_text").unbind("focus").focus(function(){
				$(this).animate({"rows": 7}, 200);
			});
			$("#biji_text").unbind("blur").blur(function(){
				setTimeout(function(){
					$("#biji_text").animate({"rows": 1}, 200);
				},500);
			});

			$("#biji").append("<div class='selnotef' style='text-align: center;height:50px;padding:10px'>"
	          		+ "<span style='color:aqua;cursor: pointer;'>查看笔记</span>"
	          		+ "</div>"
	          );
			//第一次查询次笔记
			$(".selnotef").click(function(){
				$(this).after("<div class='notemore' style='text-align: center;height:50px;padding:10px'><img src='" + rootPath + "/images/jia.jpg' width='20px' height='20px' id='jia' /></div>");
				$(this).remove();
				selnote(1,player,storageType);
			});
			
			noteadd(player,storageType);
		}else if(storageType == "VIDEO_STORAGE_TYPE_QQ"){
			var arr = webVideoId.split(",");
			/*var video = new tvp.VideoInfo();
			video.setVid(webVideoId);
			var py =new tvp.Player();
				py.create({
					width:'100%',
					height:$("#video").height(),
					video:video,
					modId:"video",
					autoplay:true,
					share:0,
					searchpanel:0,
					clientbar:0
			});*/
			
			$("#video").html('<iframe src="http://play.video.qcloud.com/iplayer.html?'
					+'$appid='+arr[1]+'&$fileid='+arr[0]+'&$autoplay=1&$sw='+$("#video").width()+'&$sh='+$("#video").height()+'" frameborder="0" width="100%" height="100%" scrolling="no"></iframe>');
			//jQuery.getScript("//qzonestyle.gtimg.cn/open/qcloud/video/h5/fixifmheight.js");
			/*var option ={
					"auto_play":"1",
					"file_id":arr[0],
					"app_id":arr[1],
					"https":1,
					"width":$("#video").width(),
					"height":$("#video").height()
					}; 
			new qcVideo.Player("video", option );*/
				
			$("#biji").append("<div class='selnotef' style='text-align: center;height:50px;padding:10px'>"
              		+ "<span style='color:aqua;cursor: pointer;'>查看笔记</span>"
              		+ "</div>"
              );
			time = 0;

			$("#biji_text").unbind("focus").focus(function(){
				if(typeof(player) != "undefined" && player != ""){
					time = parseInt(player.currentTime());
				}
				$(this).animate({"rows": 7}, 200);
			});
			$("#biji_text").unbind("blur").blur(function(){
				setTimeout(function(){
					$("#biji_text").animate({"rows": 1}, 200);
				},500);
			});
			//第一次查询次笔记
			$(".selnotef").click(function(){
				$(this).after("<div class='notemore' style='text-align: center;height:50px;padding:10px'><img src='" + rootPath + "/images/jia.jpg' width='20px' height='20px' id='jia' /></div>");
				$(this).remove();
				selnote(1,player,storageType);
			});

			noteadd(player,storageType);
			
		}else if(storageType == "VIDEO_STORAGE_TYPE_YK"){
			player = new YKU.Player('video',{
				styleid: '0',
				client_id: 'YOUR YOUKUOPENAPI CLIENT_ID',
				vid: webVideoId,
				autoplay: true,
				events:{
					onPlayerReady: function(){ 
						if(startTime != ""){
							player.seekTo(startTime);
							startTime = "";
						}
					},
					onPlayEnd: function(){ 
						updateStatus();
					}
				}
			});
			
			$("#biji").append("<div class='selnotef' style='text-align: center;height:50px;padding:10px'>"
              		+ "<span style='color:aqua;cursor: pointer;'>查看笔记</span>"
              		+ "</div>"
              );
			time = 0;

			$("#biji_text").unbind("focus").focus(function(){
				if(typeof(player) != "undefined" && player != ""){
					time = parseInt(player.currentTime());
				}
				$(this).animate({"rows": 7}, 200);
			});
			$("#biji_text").unbind("blur").blur(function(){
				setTimeout(function(){
					$("#biji_text").animate({"rows": 1}, 200);
				},500);
			});
			//第一次查询次笔记
			$(".selnotef").click(function(){
				$(this).after("<div class='notemore' style='text-align: center;height:50px;padding:10px'><img src='" + rootPath + "/images/jia.jpg' width='20px' height='20px' id='jia' /></div>");
				$(this).remove();
				selnote(1,player,storageType);
			});

			noteadd(player,storageType);
			
		}else if(storageType == "VIDEO_STORAGE_TYPE_TD"){
			$("#video").append("<iframe src='http://www.tudou.com/programs/view/html5embed.action?code=" 
								+  webVideoId.substring(webVideoId.indexOf("/") + 1)
								+ "&autoPlay=true&playType=AUTO'"
								+ "width='100%'"
								+ "height='100%'"
								+ "frameborder='0'"
								+ "scrolling='no'"
								+ "></iframe>");
			time = 0;

			$("#biji_text").unbind("focus").focus(function(){
				$(this).animate({"rows": 7}, 200);
			});
			$("#biji_text").unbind("blur").blur(function(){
				setTimeout(function(){
					$("#biji_text").animate({"rows": 1}, 200);
				},500);
			});
			
			$("#biji").append("<div class='selnotef' style='text-align: center;height:50px;padding:10px'>"
		              		+ "<span style='color:aqua;cursor: pointer;'>查看笔记</span>"
		              		+ "</div>"
		              );
			//第一次查询次笔记
			$(".selnotef").click(function(){
				$(this).after("<div class='notemore' style='text-align: center;height:50px;padding:10px'><img src='" + rootPath + "/images/jia.jpg' width='20px' height='20px' id='jia' /></div>");
				$(this).remove();
				selnote(1,player,storageType);
			});
			
			noteadd(player,storageType);
		}else if(storageType == "VIDEO_STORAGE_TYPE_SS"){
			var script = document.createElement("script");
			script.type="text/javascript";
			script.charset="utf-8";
		    script.src="http://pub.video.capitalcloud.net/publishing/" +
		    		"smvp.js?publisherId=479630023176179886" +
		    		"&playerId=479630027471147195" +
		    		"&videoId=" + webVideoId + "" +
		    		"&width=" + $("#video").width() + "" +
		    		"&height=" + $("#video").height();
		    document.getElementById("video").appendChild(script);
			
		    time = 0;

			$("#biji_text").unbind("focus").focus(function(){
				$(this).animate({"rows": 7}, 200);
			});
			$("#biji_text").unbind("blur").blur(function(){
				setTimeout(function(){
					$("#biji_text").animate({"rows": 1}, 200);
				},500);
			});
			
			$("#biji").append("<div class='selnotef' style='text-align: center;height:50px;padding:10px'>"
		              		+ "<span style='color:aqua;cursor: pointer;'>查看笔记</span>"
		              		+ "</div>"
		              );
			//第一次查询次笔记
			$(".selnotef").click(function(){
				$(this).after("<div class='notemore' style='text-align: center;height:50px;padding:10px'><img src='" + rootPath + "/images/jia.jpg' width='20px' height='20px' id='jia' /></div>");
				$(this).remove();
				selnote(1,player,storageType);
			});
			
			noteadd(player,storageType);
		}else if(storageType == "VIDEO_STORAGE_TYPE_LETV"){
			player_type = "letv";
			player = new CloudVodPlayer();

			player.init({pu:$("#letvPu").val(),definition:0,share:0,extend:0,uu:$("#letvId").val(),vu:ccid,callbackJs:"callbackJs",isShowRight:2},"video");
			//player.init({uu:"bwpfgffbiq",vu:"26352609",callbackJs:callbackJs},"video");

			function marquee(){
				var data = window.marquee_data;
				var marquee = data.response.marquee;
				var content = marquee.text.content;
				var size = marquee.text.font_size;
				var color = marquee.text.color;
				var loop_times = marquee.loop;
				var alpha = marquee.action[0].start.alpha;
				var b_xpos = marquee.action[0].start.xpos;
				var b_ypos = marquee.action[0].start.ypos;
				var e_xpos = marquee.action[0].end.xpos;
				var e_ypos = marquee.action[0].end.ypos;

				if(loop_times==-1){
					loop_times = "infinite";
				}
				var type="";
				if(b_xpos>e_xpos && b_ypos>e_ypos){
					type = "RBToLT";
				}else if(b_xpos<e_xpos && b_ypos<e_ypos){
					type = "LTToRB";
				}else if(b_xpos<e_xpos && b_ypos>e_ypos){
					type = "LBToRT";
				}else if(b_xpos>e_xpos && b_ypos<e_ypos){
					type = "RTToLB";
				}else if(b_xpos<e_xpos && b_ypos==e_ypos){
					type = "leftToRight";
				}else if(b_xpos>e_xpos && b_ypos==e_ypos){
					type = "rightToLeft";
				}else if(b_xpos==e_xpos && b_ypos>e_ypos){
					type = "bottomToTop";
				}else if(b_xpos==e_xpos && b_ypos<e_ypos){
					type = "topToBottom";
				}
				if(type==""){
					return ;
				}
				color = color.replace("0x","#");
				var bottom = ($("#video").height()-34)/2;

				//验证跑马灯效果
				var create_marquee_contnet = function(){
					if(!$("#marquee_contnet").is("div")){
						var div = document.createElement("div");
						$(div).attr("id","marquee_contnet").css({"font-size":size+"px","position":"absolute","color":color,"opacity":alpha}).html(content);
						$("#video").append($(div));
					}
				}
				create_marquee_contnet();

				var w = $("#marquee_contnet").width();
				var h = $("#marquee_contnet").height();
				window.loopMarquee = "";
				function loop_marquee(fun,loop,duration){
					if(loop=="infinite"){
						window.loopMarquee = setInterval(function(){
							$("#marquee_contnet").show().css("opacity",alpha);
							fun();
						},duration+200)
					}else if(loop<=0){
						return ;
					}else{
						setTimeout(function(){
							loop-=1;
							fun();
							loop_marquee(fun,loop,duration);
						},duration+200);
					}

				}
				var loop_fun = function(){};
				if(type=="leftToRight"){
					loop_fun = function(){
						var video_w = $("#video").width();
						var video_h = $("#video").height();
						create_marquee_contnet();
						$("#marquee_contnet").css({"bottom":bottom+"px","left":w*-1+"px","width":"100%"});
						$("#marquee_contnet").animate({left:video_w+w+"px"},marquee.action[0].duration);
					}
				}else if(type=="rightToLeft"){
					loop_fun = function(){
						var video_w = $("#video").width();
						var video_h = $("#video").height();
						create_marquee_contnet();
						$("#marquee_contnet").css({"bottom":bottom+"px","left":(video_w+w)+"px","width":"100%"});
						$("#marquee_contnet").animate({left:w*-1+"px"},marquee.action[0].duration);
					};
				}else if(type=="LBToRT"){
					loop_fun = function(){
						var video_w = $("#video").width();
						var video_h = $("#video").height();
						create_marquee_contnet();
						$("#marquee_contnet").css({"bottom":"-32px","left":(w*-1)+"px","width":"100%"});
						$("#marquee_contnet").animate({left:(video_w)+"px",bottom:video_h+h+"px"},marquee.action[0].duration);
					};
				}else if(type=="LTToRB"){
					loop_fun = function(){
						var video_w = $("#video").width();
						var video_h = $("#video").height();
						create_marquee_contnet();
						$("#marquee_contnet").css({"bottom":video_h+h+"px","left":(w*-1)+"px","width":"100%"});
						$("#marquee_contnet").animate({left:(video_w)+"px",bottom:"-32px"},marquee.action[0].duration);
					};
				}else if(type=="RBToLT"){
					loop_fun = function(){
						var video_w = $("#video").width();
						var video_h = $("#video").height();
						create_marquee_contnet();
						$("#marquee_contnet").css({left:(video_w)+"px",bottom:"-32px","width":"100%"});
						$("#marquee_contnet").animate({"bottom":video_h+h+"px","left":(w*-1)+"px"},marquee.action[0].duration);
					};
				}else if(type=="RTToLB"){
					loop_fun = function(){
						var video_w = $("#video").width();
						var video_h = $("#video").height();
						create_marquee_contnet();
						$("#marquee_contnet").css({left:(video_w)+"px",bottom:(video_h+h)+"px","width":"100%"});
						$("#marquee_contnet").animate({"bottom":"0px","left":(w*-1)+"px"},marquee.action[0].duration);
					};
				}else if(type=="topToBottom"){
					loop_fun = function(){
						var video_w = $("#video").width();
						var video_h = $("#video").height();
						create_marquee_contnet();
						$("#marquee_contnet").css({left:(video_w-w)/2+"px",bottom:video_h+h+"px","width":"100%"});
						$("#marquee_contnet").animate({"bottom":"-32px"},marquee.action[0].duration);
					};
				}else if(type=="bottomToTop"){
					loop_fun = function(){
						var video_w = $("#video").width();
						var video_h = $("#video").height();
						create_marquee_contnet();
						$("#marquee_contnet").css({left:(video_w-w)/2+"px",bottom:"-32px","width":"100%"});
						$("#marquee_contnet").animate({"bottom":video_h+h+"px"},marquee.action[0].duration);
					};
				}
				loop_fun();
				loop_marquee(loop_fun,loop_times,marquee.action[0].duration);
			}

			window.callbackJs = function(type, data) {
				//console.log(type)
				if(type=="videoStart"){
					onPlayerStart();
				}else if(type=="videoLiveStop"){

				}else if(type=="videoResume"){
					onPlayerResume();
					//$("#marquee_contnet").remove();
					//marquee(data);
					//console.log(data)
				}else if(type=="adTailPlayComplete"){
					onPlayerStop();
					//$("#marquee_contnet").hide();
					$("#marquee_contnet").stop();
					clearInterval(window.loopMarquee);

				}else if(type=="videoPause"){
					//$("#marquee_contnet").stop();
					//clearInterval(window.loopMarquee);
				}else if(type=="videoReplay"){
					$("#marquee_contnet").remove();
					marquee(data);

				}else if(type=="playerInit"){
					var time = player.sdk.getVideoSetting().duration;
					//计算需要
					if(namedtype != null && namedtype == 'LOOK_VIDEO_BY_TIME'){
						var num = parseInt(time / namedTime);
						for(var i = 0; i < num ; i ++){
							obj[i] = ((i + 1) * namedTime);
						}
					}else if(namedtype != null && namedtype == 'LOOK_VIDEO_BY_NUM'){
						var num = parseInt(time / namedNum);
						for(var i = 0; i < namedNum; i ++){
							obj[i] = ((i + 1) * num);
						}
					}

					noteadd(player,storageType);
					$("#video").css("overflow","hidden");

					$.ajax({
						url : rootPath + "/classModule/marquee",
						type:"post",
						data:{"verificationcode":$("#cId").val()+"_"+($("#userId").val()==""?0:$("#userId").val()),"vid":0},
						dataType:"json",
						success:function(data){
							data = (new Function("return " + data))();
							window.marquee_data = data;
							marquee();
						}
					});

				}

			}
			$("#video").append(addDiv());

			time = 0;

			$("#biji_text").unbind("focus").focus(function(){
				if(typeof(player) != "undefined" && player != ""){
					time = parseInt(player.sdk.getVideoTime());
				}
				$(this).animate({"rows": 7}, 200);
			});
			$("#biji_text").unbind("blur").blur(function(){
				setTimeout(function(){
					$("#biji_text").animate({"rows": 1}, 200);
				},500);
			});

			$("#biji").append("<div class='selnotef' style='text-align: center;height:50px;padding:10px'>"
				+ "<span style='color:aqua;cursor: pointer;'>查看笔记</span>"
				+ "</div>"
			);
			//第一次查询次笔记
			$(".selnotef").click(function(){
				$(this).after("<div class='notemore' style='text-align: center;height:50px;padding:10px'><img src='" + rootPath + "/images/jia.jpg' width='20px' height='20px' id='jia' /></div>");
				$(this).remove();
				selnote(1,player);
			});



		}else{
			var script = document.createElement("script");
			script.type="text/javascript";
		    script.src="http://p.bokecc.com/player?vid=" + ccid + "&siteid=" + cuId + "&autoStart=true&width=100%&height=100%&playertype=1";
		    document.getElementById("video").appendChild(script);
		    $("#video").append(addDiv());
		    //验证跑马灯效果
		    //get_cc_verification_code(ccid);
		    
		    time = 0;

			$("#biji_text").unbind("focus").focus(function(){
				if(typeof(player) != "undefined" && player != ""){
					time = parseInt(player.getPosition());
				}
				$(this).animate({"rows": 7}, 200);
			});
			$("#biji_text").unbind("blur").blur(function(){
				setTimeout(function(){
					$("#biji_text").animate({"rows": 1}, 200);
				},500);
			});
		    
			$("#biji").append("<div class='selnotef' style='text-align: center;height:50px;padding:10px'>"
		              		+ "<span style='color:aqua;cursor: pointer;'>查看笔记</span>"
		              		+ "</div>"
		              );
			//第一次查询次笔记
			$(".selnotef").click(function(){
				$(this).after("<div class='notemore' style='text-align: center;height:50px;padding:10px'><img src='" + rootPath + "/images/jia.jpg' width='20px' height='20px' id='jia' /></div>");
				$(this).remove();
				selnote(1,player);
			});
			
			on_cc_player_init( ccid );
			
			noteadd(player);
		}
	}
	
	//跑马灯根据当前播放视频的ID返回相应的公司，用户信息
	function get_cc_verification_code(ccid){
		var uId = $("#uId").val();
		var cId = $("#cId").val();
		if(uId == null || uId == ""){
			uId = 0;
		}
		if(cId == null || cId == ""){
			cId = 0;
		}
		
		console.log("当前CC视频的用户,cId:"+cId+", uId:"+uId);
		return cId+"_"+uId;
	}
	
	function getSWF( swfID ) {
	    if (window.document[ swfID ]) {
	      return window.document[ swfID ];
	    } else if (navigator.appName.indexOf("Microsoft") == -1) {
	      if (document.embeds && document.embeds[ swfID ]) {
	        return document.embeds[ swfID ];
	      }
	    } else {
	      return document.getElementById( swfID );
	    }
	  }

	function formatSeconds(value) {
	    var theTime = parseInt(value);// 秒
	    var theTime1 = 0;// 分
	    var theTime2 = 0;// 小时
	    if(theTime > 60) {
	        theTime1 = parseInt(theTime / 60);
	        theTime = parseInt(theTime % 60);
	            if(theTime1 > 60) {
	            theTime2 = parseInt(theTime1 / 60);
	            theTime1 = parseInt(theTime1 % 60);
	            }
	    }
	    theTime = parseInt(theTime) + "";
	    theTime = theTime.length < 2 ? theTime = "0" + theTime : theTime;
        var result = theTime;
        if(theTime1 > 0) {
        	theTime1 = parseInt(theTime1) +"";
        	theTime1 = theTime1.length < 2 ? theTime1 = "0" + theTime1 : theTime1;
        	result = theTime1 + ":" + result;
        }else{
        	result = "00:"+result;
        }
        if(theTime2 > 0) {
        	theTime2 = parseInt(theTime2) + "";
        	theTime2 = theTime2.length < 2 ? theTime2 = "0" + theTime2 : theTime2;
        	result = theTime2 + ":" + result;
        }else{
        	"00:"+result;
        }
	    return result;
	}
	
	//查询评论
	function selcomment(pageNo){
		var LectureId = parseInt($("#comment").attr("data-id"));
		$.ajax({
			url : rootPath + "/video/selcomment",
			type:"post",
			data:{"videoLectureId":LectureId,"page":pageNo,"pageSize":5},
			dataType:"json",
			success:function(data){
				$(".commentmore").remove();
				if(data.current == 0 && pageNo == 1){
					$(".others").append("<div style='text-align: center;height:50px;padding:10px'>还没有其他评论</div>");
				}else if(data.current == 0 && pageNo > 1){
					$(".others").append("<div style='text-align: center;height:50px;padding:10px'> </div>");
				}else{
					if(pageNo == 1){
						$(".others").html("");
					}
					$.each(data.comment.data,function(index,item){
						var name = "";
						if(item.nickname != null){
							name = item.nickname;
						}else if(item.mobilename != null){
							name = item.mobilename;
						}else{
							name = item.username;
						}
						if(item.score == 1){
							$(".others").append("<span><em>" + name + "<em>"
									+ "<span class='students-star'>"
									+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>"
									+ "<em class='iconfont kongstar'>&#xe606;</em>" 
									+ "<em class='iconfont kongstar'>&#xe606;</em>" 
									+ "<em class='iconfont kongstar'>&#xe606;</em>" 
									+ "<em class='iconfont kongstar'>&#xe606;</em>" 
									+ "</span>"
									+ "</span>"
									+ "<p style='word-wrap: break-word; word-break: break all;'>" + item.comment + "</p>"
									+ "<i>" + item.createTimes + "</i>"
									+ "<div class='clear'></div>"
							        + "<div class='dott'></div>"
							);
						}else if(item.score == 2){
							$(".others").append("<span><em>" + name + "<em>"
									+ "<span class='students-star'>"
									+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>"
									+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>" 
									+ "<em class='iconfont kongstar'>&#xe606;</em>" 
									+ "<em class='iconfont kongstar'>&#xe606;</em>" 
									+ "<em class='iconfont kongstar'>&#xe606;</em>" 
									+ "</span>"
									+ "</span>"
									+ "<p style='word-wrap: break-word; word-break: break all;'>" + item.comment + "</p>"
									+ "<i>" + item.createTimes + "</i>"
									+ "<div class='clear'></div>"
							        + "<div class='dott'></div>"
							);
						}else if(item.score == 3){
							$(".others").append("<span><em>" + name + "<em>"
									+ "<span class='students-star'>"
									+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>"
									+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>" 
									+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>" 
									+ "<em class='iconfont kongstar'>&#xe606;</em>" 
									+ "<em class='iconfont kongstar'>&#xe606;</em>" 
									+ "</span>"
									+ "</span>"
									+ "<p style='word-wrap: break-word; word-break: break all;'>" + item.comment + "</p>"
									+ "<i>" + item.createTimes + "</i>"
									+ "<div class='clear'></div>"
							        + "<div class='dott'></div>"
							);
						}else if(item.score == 4){
							$(".others").append("<span><em>" + name + "<em>"
									+ "<span class='students-star'>"
									+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>"
									+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>" 
									+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>" 
									+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>" 
									+ "<em class='iconfont kongstar'>&#xe606;</em>" 
									+ "</span>"
									+ "</span>"
									+ "<p style='word-wrap: break-word; word-break: break all;'>" + item.comment + "</p>"
									+ "<i>" + item.createTimes + "</i>"
									+ "<div class='clear'></div>"
							        + "<div class='dott'></div>"
							);
						}else{
							$(".others").append("<span><em>" + name + "<em>"
									+ "<span class='students-star'>"
									+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>"
									+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>" 
									+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>" 
									+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>" 
									+ "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>" 
									+ "</span>"
									+ "</span>"
									+ "<p style='word-wrap: break-word; word-break: break all;'>" + item.comment + "</p>"
									+ "<i>" + item.createTimes + "</i>"
									+ "<div class='clear'></div>"
							        + "<div class='dott'></div>"
							);
						}
					});
					if(data.current < 5){
						$(".others").append("<div style='text-align: center;height:50px;padding:10px'> </div>");
					}else{
						$(".others").append("<div class='commentmore' style='text-align: center;height:50px;padding:10px;'><span style='color:aqua;cursor: pointer;'>加载更多</span></div>");
					}
					//加载更多
					$(".commentmore").click(function(){
						selcomment((pageNo + 1),player);
						$(this).after("<div class='commentmore' style='text-align: center;height:50px;padding:10px;'><img src='" + rootPath + "/images/jia.jpg' width='20px' height='20px' id='jia' /></div>");
						$(this).remove();
					});
				}
			}
		});
	}
	//查询笔记
	function selnote(pageNo,player,domain){
		var LectureId = parseInt($("#note").attr("data-id"));
		$.ajax({
			url : rootPath + "/video/selnote",
			type:"post",
			data:{"videoLectureId":LectureId,"page":pageNo,"pageSize":5,"noteId":noteId},
			dataType:"json",
			success:function(data){
				$(".notemore").remove();
				if((data.current == 0 && pageNo == 1) || data.msg == "nouser"){
					$("#biji").append("<div class='notemore' style='text-align: center;height:50px;padding:10px'>还没有笔记</div>");
				}else if(data.current == 0 && pageNo > 1){
					$("#biji").append("<div class='notemore' style='text-align: center;height:50px;padding:10px'> </div>");
				}else{
					/*$("#rowCount").val(data.comment.rowCount);
					$("#pageNo").val(data.comment.pageNo);
					$("#pageSize").val(data.comment.pageSize);*/
					noteId = 0;
					if(pageNo == 1){
						$(".biji_move").remove();
						$("#biji .dott").remove();
					}
					$.each(data.note.data,function(index,item){
						$("#biji").append("<div class='biji_time_move biji_move'>"
								+ "<div class='biji-box'>"
								+ "<a href='javascript:;' class='player-time notetime' data-time='" + item.notesTime + "'>" 
								+ "<div class='noteTime iconfont'>&#xe61e;</div>"
								+ "<div class='time'>" + formatSeconds(item.notesTime) + "</div>"
								+ "</a>"
						        + "<p class='notecontent' style='word-wrap: break-word; word-break: break all;'>" + item.notesContent + "</p>"
						        + "<span class='biji_delete' data-id='" + item.id + "'><span class='iconfont'>&#xe61c;</span><em>删除</em></span>"
						        + "<span class='biji_editor' data-id='" + item.id + "'><span class='iconfont'>&#xe624;</span><em>编辑</em></span>"
						        + "</div>"
						        + "</div>"
						        + "<div class='dott'></div>"
						);
						var h2 = $(".notecontent:eq(" + index + ")").height();
						$(".biji_time_move:eq(" + index + ")").height(parseInt(h2) + 45);
					});
					$(".notetime").hover(function(){
						$(this).css("color","#00baee");
						$(this).css("border-color","#00baee");
						$(this).find("div").css("border-color","#00baee");
					},function(){
						$(this).css("color","");
						$(this).css("border-color","");
						$(this).find("div").css("border-color","");
					});
					$(".biji_time_move").hover(function(){
						$(this).css("background-color","#1f272e");
						$(this).find(".biji_delete").show();
						$(this).find(".biji_editor").show();
						var h2 = $(this).find(".notecontent").height();
						$(this).height(parseInt(h2) + 45);
					},function(){
						$(this).css("background-color","#14191e");
						$(this).find(".biji_delete").hide();
						$(this).find(".biji_editor").hide();
						var h2 = $(this).find(".notecontent").height();
						$(this).height(parseInt(h2) + 45);
					});
					if(data.current < 5){
						$("#biji").append("<div class='notemore' style='text-align: center;height:50px;padding:10px'> </div>");
					}else{
						$("#biji").append("<div class='notemore' style='text-align: center;height:50px;padding:10px;'><span style='color:aqua;cursor: pointer;'>加载更多</span></div>");
					}
					if(typeof(player) != "undefined" && player != ""){
						if(domain == "VIDEO_STORAGE_TYPE_YK"){
						    $(".notetime").click(function(){
						    	player.seekTo($(this).attr("data-time"));
						    });
						}else if(domain == "VIDEO_STORAGE_TYPE_LETV"){
							player.sdk.seekTo($(this).attr("data-time"));
						}else{
							$(".notetime").click(function(){
						    	player.seek($(this).attr("data-time"));
						    });
						}
					}
					//修改笔记
					$(".biji_editor").click(function(){
						var $this = $(this).closest(".biji_time_move");
						var parent = $(this).closest(".biji_time_move").find(".notecontent");
						if($.trim($(this).find("em").text()) == "编辑"){
							bijiContent = $.trim(parent.text());
							parent.html("<textarea id='editcontent' cols='40' style='height:" + parent.height() + "px;background-color: #182124;color: #fff;width: 342px;'>" + bijiContent + "</textarea>");
							$(this).find("em").html("保存");
							$(this).find("span").html("");
							$this.find(".biji_delete").find("em").html("取消");
							$this.find(".biji_delete").find("span").html("");
							var h2 = parent.height();
							$this.height(parseInt(h2) + 45);
						}else{
							var id = $(this).attr("data-id");
							var content = $(this).closest(".biji_time_move").find("#editcontent").val();
							if(res != null){
								res.abort();
							}
							res = $.ajax({
								url : rootPath + "/video/updateNote",
								type:"post",
								data:{"id":id,"notesContent":content},
								dataType:"json",
								success:function(data){
									if(data.msg == "success"){
										parent.html(content);
										var h2 = $this.find(".notecontent").height();
										$this.height(parseInt(h2) + 45);
									}else{
										$('<div class="c-fa">'+ data.msg +'</div>').appendTo('body').fadeIn(100).delay(1000).fadeOut(200,function(){
											$(this).remove();});
										return false;
									}
									parent.closest(".biji_time_move").find(".biji_editor").find("em").html("编辑");
									parent.closest(".biji_time_move").find(".biji_editor").find("span").html("&#xe624;");
								}
							});
						}
					});
					
					//删除笔记
					$(".biji_delete").click(function(){
						var $this = $(this).closest(".biji_time_move");
						var parent = $(this).closest(".biji_time_move").find(".notecontent");
						if($.trim($(this).find("em").text()) == "取消"){
							$(this).find("em").html("删除");
							$(this).find("span").html("&#xe61c;");
							$this.find(".biji_editor").find("em").html("编辑");
							$this.find(".biji_editor").find("span").html("&#xe624;");
							parent.html(bijiContent);
							var h2 = parent.height();
							$this.height(parseInt(h2) + 45);
						}else{
							var id = $(this).attr("data-id");
							var $thisd = $(this);
							if(res != null){
								res.abort();
							}
							res = $.ajax({
								url : rootPath + "/video/delnote",
								type:"post",
								data:{"id":id},
								dataType:"json",
								success:function(data){
									if(data.msg == "success"){
										$this.closest(".biji_move").slideUp(500);
										setTimeout(function(){
											$thisd.closest(".biji_move").remove();
											$("#biji .dott").remove();
										}, 500);
									}else{
										$('<div class="c-fa">'+ data.msg +'</div>').appendTo('body').fadeIn(100).delay(1000).fadeOut(200,function(){
											$(this).remove();});
										return false;
									}
								}
							});
						}
					});
					//加载更多
					$(".notemore").click(function(){
						selnote((pageNo + 1),player);
						$(this).after("<div class='notemore' style='text-align: center;height:50px;padding:10px;'><img src='" + rootPath + "/images/jia.jpg' width='20px' height='20px' id='jia' /></div>");
						$(this).remove();
					});
				}
			}
		});
	}
	//cc播放器配置
	function on_cc_player_init( ccid ){
	    var config = {};
    	config.keyboard_enable = 0;
    	config.on_player_seek = "onPlayerSeek";
	    if(b){
	    	config.on_player_resume = "onPlayerResume";
	    }
	    config.on_player_stop = "onPlayerStop"; //设置播放完时的回调函数的名称
	    config.on_player_start = "onPlayerStart";
	    player = getSWF( "cc_" + ccid );
	    console.log("player,"+player);
    	if(player != null && typeof(player) != "undefined" 
    		&& player != "" && "setConfig" in player){
    	    player.setConfig( config );
	    	var time = player.getDuration();
    	    //计算需要
    	    if(namedtype != null && namedtype == 'LOOK_VIDEO_BY_TIME'){
    		    console.log("LOOK_VIDEO_BY_TIME");
    	    	var num = parseInt(time / namedTime);
    	    	for(var i = 0; i < num ; i ++){
    	    		obj[i] = ((i + 1) * namedTime);
    	    	}
    	    }else if(namedtype != null && namedtype == 'LOOK_VIDEO_BY_NUM'){
    		    console.log("LOOK_VIDEO_BY_NUM");
    	    	var num = parseInt(time / namedNum);
    	    	for(var i = 0; i < namedNum; i ++){
    	    		obj[i] = ((i + 1) * num);
    	    	}
    	    }
    	}else{
    		console.log("继续");
    		setTimeout(function(){
    			on_cc_player_init( ccid );
    		}, 100);
    	}
	}
	
	//拖动回调
	function onPlayerSeek(from,to){
		tanc();
		nameds();
	}
	
	//开始播放回调
	function onPlayerStart(){
		if(startTime != ""){
			if(player_type=="letv"){
				player.sdk.seekTo(startTime);
			}else{
				player.seek(startTime);
			}

			startTime = ""; 
		}
		tanc();
		nameds();
	}
	
	//暂停后继续播放回调
	function onPlayerResume(){
		tanc();
		nameds();
	}
	
	function nameds(){
		if(player_type=="letv"){
			if(n && obj != null && obj.length > 0){
				for(var i = 0; i <obj.length; i ++){
					var t = parseInt(player.sdk.getVideoTime());
					if(t == obj[i]){
						player.sdk.pauseVideo();
						player.sdk.seekTo(t);
						$(".pause").fadeIn(200);
						obj.splice(0,(i +1));
						break;
					}
				}

				setTimeout(function(){
					nameds();
				},250);
			}
		}else{
			console.log("n,"+n+",obj,"+obj);
			if(n && obj != null && obj.length > 0){
				for(var i = 0; i <obj.length; i ++){
					var t = parseInt(player.getPosition());
					console.log("t,"+t);
					if(t == obj[i]){
						player.pause();
						player.seek(t);
						$(".pause").fadeIn(200);
						obj.splice(0,(i +1));
						break;
					}
				}
				
				setTimeout(function(){
					nameds();
				},250);
			}
		}
	}
	
	function tanc(){
		console.log("b,"+b);
		if(b){
			if(player_type=="letv"){
				if(parseInt(player.sdk.getVideoTime()) >= listenTime){
					player.sdk.seekTo(listenTime);
					player.sdk.pauseVideo();
					$(".gobuy").fadeIn(200);
				}else{
					setTimeout(function(){
						tanc();
					},250);
				}
			}else{
				console.log("player.getPosition(),"+player.getPosition());
				console.log("listenTime,"+listenTime);
				if(player.getPosition() >= listenTime){
					player.seek(listenTime);
					player.pause();
					$(".gobuy").fadeIn(200);
				}else{
					setTimeout(function(){
						tanc();
					},250);
				}
			}
		}
	}
	
	//cc播放完后 回调
	function onPlayerStop(){
		getVideoTime();
		if(xxj){
			updateStatus();
		}
	}
	
	//结束后修改状态
	function updateStatus(){
		var historyId = $(".zjplaying").attr("stsid");
		$.ajax({
			url: rootPath + "/userHistory/updateStatus",
			type:"post",
			data:{"id":historyId,"studyStatus":3},
			dataType:"json",
			success:function(data){
				if(data.msg == "success"){
					$(".zjplaying").attr("ststatus",3);
					$(".studyOk").attr("data-status",1);
					$(".learning").css("background-image","url('" + rootPath + "/stylesheets/video/img/shi.png')");
					$(".study.zjplaying").find(".constant_width div:eq(0)").attr("class","zj_time_full");
				}else{
					$('<div class="c-fa">'+ data.msg +'</div>').appendTo('body').fadeIn(100).delay(1000).fadeOut(200,function(){
						$(this).remove();});
				}
			}
		});
	}

	//提交笔记
	function noteadd(player,domain){
		$(".btn_over").unbind("click").click(function(){
			var noteContent = $.trim($("#biji_text").val());
			if(typeof(noteContent) == "undefined" || noteContent == null || noteContent == ""){
				$('<div class="c-fa">'+ '内容不能为空' +'</div>').appendTo('body').fadeIn(100).delay(1000).fadeOut(200,function(){
					$(this).remove();});
				return false;
			}
			if(domain == "VIDEO_STORAGE_TYPE_YK"){
		    	if(time == 0 && typeof(player.currentTime()) != "undefined" && player != ""){
		    		time = parseInt(player.currentTime());
		    	}
			}else if(domain == "VIDEO_STORAGE_TYPE_LETV"){
				time = parseInt(player.sdk.getVideoTime());
			}else{
		    	if(time == 0 && typeof(player) != "undefined" && player != ""){
		    		player.getPosition();
		    	}
			}
	    	var lecId = $("#note").attr("data-id");
	    	if(res != null){
	    		res.abort();
	    	}
			res = $.ajax({
				url : rootPath + "/video/addnote",
				type:"post",
				data:{"notesContent":noteContent,"notesTime":time,"videoLectureId":lecId,"classTypeId":$("#classTypeId").val()},
				dataType:"json",
				success:function(data){
					if(data.msg == "success"){
                		$(".selnotef").after("<div class='notemore' style='text-align: center;height:50px;padding:10px'><img src='" + rootPath + "/images/jia.jpg' width='20px' height='20px' id='jia' /></div>");
                		$(".selnotef").remove();
						selnote(1,player,domain);
						$("#biji_text").val("");
						$(".biji_in .num").html("140/140");
					}else{
						$('<div class="c-fa">'+ data.msg +'</div>').appendTo('body').fadeIn(100).delay(1000).fadeOut(200,function(){
							$(this).remove();});
						return false;
					}
				}
			});
		});
	}
(function($){
    $(document).ready(function(){
        $(".neirong").mCustomScrollbar();
        $(".biji_right").mCustomScrollbar();
    });
})(jQuery);
function currentVideo(){
	if(res != null){
		res.abort();
	}
	res = $.ajax({
		url:rootPath + "/classModule/selVideoFreeFlag",
		type:"post",
		dataType:"json",
		data:{"id":$("#lecId").val(),"classTypeId":classTypeId,"moduleId":moduleId},
		success:function(data){
			xxj = false;
			if(data.msg == "outTime"){
				$('<div class="c-fa">'+ "该公司的服务已过有效期，暂时不能播放！" +'</div>').appendTo('body').fadeIn(100).delay(2000).fadeOut(200,function(){
					$(this).remove();});
			}else if(data.msg == "outFlow"){
				$('<div class="c-fa">'+ "视频流量已经用完，暂时不能播放！" +'</div>').appendTo('body').fadeIn(100).delay(2000).fadeOut(200,function(){
					$(this).remove();});
			}else if(data.msg == "flag"){
				$('<div class="c-fa">'+ "此视频为收费视频，购买后可继续观看！" +'</div>').appendTo('body').fadeIn(100).delay(2000).fadeOut(200,function(){
					$(this).remove();});
			}else if(data.msg == "outDate"){
				$('<div class="c-fa">'+ "该课程已过期，不能继续观看" +'</div>').appendTo('body').fadeIn(100).delay(2000).fadeOut(200,function(){
					$(this).remove();});
			}else if(data.msg == "outVideoCount"){
				$('<div class="c-fa">'+ "观看次数已达上限" +'</div>').appendTo('body').fadeIn(100).delay(2000).fadeOut(200,function(){
					$(this).remove();});
			}else{
				xxj = true;
				if(data.cv != null){
					if(data.b == true){
						b = true;
						listenTime = (data.cv.overFlowTime * 60);
						listenHint = data.cv.overFlowInfo;
						//$(".btom").css("visibility","visible");
					}else{
						b = false;
						named(data.cv);
						//$(".btom").css("visibility","visible");
					}
				}else{
					$(".btom").css("visibility","hidden");
				}
				if(data.msg.video.storageType=="VIDEO_STORAGE_TYPE_LETV"){
					objectPlay(data.msg.lectureName,data.msg.video.webVideoId,cuId,data.msg.video.webVideoId,data.msg.video.storageType);
				}else{
					objectPlay(data.msg.lectureName,data.msg.video.videoCcId,cuId,data.msg.video.webVideoId,data.msg.video.storageType);
				}
				//	objectPlay(data.msg.lectureName,data.msg.video.videoCcId,cuId,data.msg.video.webVideoId,data.msg.video.storageType);
				wd = data.msg.video.storageType;
				//添加第一个 视频 观看记录
				$.ajax({
					url:rootPath + "/userHistory/addHistory",
					type:"post",
					dataType:"json",
					data:{"lectureId":$("#lecId").val(),"classTypeId":$("#classTypeId").val()},
					success:function(data){
						if(data.msg == "insertHistory" || data.msg == "updateHistory"){
							studytime = (data.studyLength != null ? data.studyLength : 0);
							uhId = data.uhId;
							uhaId = data.uhaId;
							$(".zjplaying").attr("stsid",data.id);
							$(".zjplaying").attr("ststatus",data.status);
							if($(".zjplaying").attr("ststatus") == 3){
								$(".studyOk").attr("data-status",1);
								$(".learning").css("background-image","url('" + rootPath + "/stylesheets/video/img/shi.png')");
							}
						}
					}
				});
				if($("#userId").val() != null && $("#userId").val() != ""){
					selExer();
				}
			}
		}
	});
	
}
//计算字数

function cont(){
    var nums=$(".ping-area").val().length;
    var sheng = 140-nums;
    //sheng = sheng>0?sheng:0;
    var number=sheng+"/140";
    $(".ping .num").html(number);
}

function bcont(){
    var nums=$(".biji-area").val().length;
    var sheng = 140-nums;
    //sheng = sheng>0?sheng:0;
    var number=sheng+"/140";
    $(".biji_in .num").html(number);
}

function myComment(){
	//查询我的评论
	$.ajax({
		url: rootPath + "/video/selMyComment",
		type:"post",
		data:{"lectureId":$("#comment").attr("data-id")},
		dataType:"json",
		success:function(data){
			if(data.msg == "success"){
				if(data.result == 1){
					$(".ping").slideUp(200);
					$(".myping p").html(data.myComment.comment);
					$(".myping i").html(data.myComment.createTimes);
					$(".myping").attr("data-id",data.myComment.id);
					$(".myping").slideDown(200);
					var commentScore = data.myComment.score;
					var studentsStar = "";
					for(var i = 0; i < 5; i++){
						var str = "";
						if(i < commentScore){
							str = "<em class='iconfont kongstar' style='color:gold'>&#xe607;</em>";
						}else{
							str = "<em class='iconfont kongstar'>&#xe606;</em>";
						}
						studentsStar += str;
					}
					$(".myping .students-star").html(studentsStar);
				}
			}else{
				$(".ping").slideDown(200);
				$(".myping").slideUp(200);
				$(".myping p").html("");
				$(".myping i").html("");
				$(".myping").removeAttr("data-id");
			}
		}
	});
}

//查询是否可以链接题库
function selExer(){
	$.ajax({
		url:rootPath + "/courseExercise/selExer",
		type:"post",
		data:{"classTypeId":$("#classTypeId").val(),"resourceType":"TEACH_METHOD_VIDEO","resourceId":$("#note").attr("data-id"),"exerciseType":"PRACTICE_AFTER_CLASS"},
		dataType:"json",
		success:function(data){
			if(data.msg == "success"){
				$(".exercise").attr("data-url",data.url).show();
			}
		}
	});
}

function addDiv(){
	console.log("看视频弹框");
	if(listenHint == ""){
		listenHint = "尊敬的用户，该视频属于收费视频，如想继续收看请您购买课程";
	}
	var html = "<div class='mask gobuy'><div class='word'>"
		+ "<p>" + listenHint + "</p>"
		+ "<button onclick='javascript:buyclass();'>立即购买</button>"
		+"</div></div>"
		+"<div class='mask pause'><div class='word'>"
		+ "<p>点击确定继续观看</p>"
		+ "<button onclick='javascript:cuntinue();'>确定</button>"
		+"</div></div>";
	return html;
}

//本节课学了多长时间
function getVideoTime(){
	if(player_type=="letv"){
		if((wd == null || wd == "VIDEO_STORAGE_TYPE_LETV") && player != ""){
			var status;
			var stimes = parseInt(player.sdk.getVideoTime());
			if(typeof(stimes) == "undefined" || stimes == null || stimes == ""){
				return false;
			}
			if(stimes < studytime){
				status = 1;
			}else{
				status = 2;
			}
			$.ajax({
				url : rootPath + "/userHistory/setTime",
				type:"post",
				data:{"stimes":stimes,"status":status,"uhId":uhId,"uhaId":uhaId},
				dataType:"json",
				success:function(data){

				}
			});
		}
	}else{
		if((wd == null || wd == "VIDEO_STORAGE_TYPE_CC") && player != ""){
			var status;
			var stimes = parseInt(player.getPosition());
			if(typeof(stimes) == "undefined" || stimes == null || stimes == ""){
				return false;
			}
			if(stimes < studytime){
				status = 1;
			}else{
				status = 2;
			}
			$.ajax({
				url : rootPath + "/userHistory/setTime",
				type:"post",
				data:{"stimes":stimes,"status":status,"uhId":uhId,"uhaId":uhaId},
				dataType:"json",
				success:function(data){

				}
			});
		}
	}
}


function named(cv){
	if(cv.setPointName == "LOOK_VIDEO_BY_TIME"){
		n = true;
		namedtype = cv.setPointName;
		namedTime = (cv.namedTime * 60);
		
	}else if(cv.setPointName == "LOOK_VIDEO_BY_NUM" ){
		n = true;
		namedtype = cv.setPointName;
		namedNum = cv.namedNum;
	}
}

function cuntinue(){
	if(player_type=="letv"){
		$(".pause").fadeOut(200,function(){
			player.sdk.resumeVideo();
		});
	}else{
		$(".pause").fadeOut(200,function(){
			player.resume();
		});
	}
}

function buyclass(){
	window.location.href = rootPath + "/sysConfigItem/selectDetail/" + $("#comId").val();
}
