<?php
include('system/conn.php');
$result = mysql_query('select * from xtcms_system where id = 1');
$row = mysql_fetch_array($result);
$xtcms_domain = $row['s_domain'];
$xtcms_token= $row['s_token'];
$xtcms_guanzhu= $row['s_guanzhu'];
$xtcms_fengmian= $row['s_fengmian'];
							
define("yuming", $xtcms_domain);
define("guanzhu", $xtcms_guanzhu);
define("fengmian", $xtcms_fengmian);

define("TOKEN", "".$xtcms_token."");
$wechatObj = new wechatCallbackapiTest();

if (isset($_GET['echostr'])) {
	$wechatObj->valid();
}
else {
	$wechatObj->responseMsg();
}


class wechatCallbackapiTest
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];


        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }


    public function responseMsg()
    {

		$postStr = isset($GLOBALS["HTTP_RAW_POST_DATA"])?$GLOBALS["HTTP_RAW_POST_DATA"]:"";
    

		if (!empty($postStr)){

                libxml_disable_entity_loader(true);
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);

				$event = $postObj->Event;			
                $time = time();
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";    
				


				switch($postObj->MsgType)
				{
					case 'event':

						if($event == 'subscribe')
						{
						//关注后的回复
												$contentStr =guanzhu;


							$msgType = 'text';
							$textTpl = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
							echo $textTpl;

						}
						break;
					case 'text':
						if(preg_match('/[\x{4e00}-\x{9fa5}]+/u',$keyword))
						{	

							$newsTplHeader = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[news]]></MsgType>
							<ArticleCount>%s</ArticleCount>
							<Articles>";

							$newsTplItem = "<item>
							<Title><![CDATA[%s]]></Title> 
							<Description><![CDATA[%s]]></Description>
							<PicUrl><![CDATA[%s]]></PicUrl>
							<Url><![CDATA[%s]]></Url>
							</item>";
							$newsTplFooter="</Articles>
							</xml>";
 
								$vod = "SELECT * FROM `xtcms_vod` WHERE `d_name` like '%".$keyword."%'  LIMIT 0 , 10";
								$shipin= mysql_query($vod);
								$itemCount = 0;
								$res = $this->search($keyword);
								
								if(mysql_num_rows($shipin)>0 || !empty($res[0])){
                                 
									while($row = mysql_fetch_assoc($shipin))
									{
										if ($itemCount >= 6) {
											break;
										}
										$title = "".$row['d_name']."";
										$des ="";
										$url =yuming."bplay.php?play=".$row['d_id'];
										$picUrl1 ="".$row['d_picture']."";
										$contentStr .= sprintf($newsTplItem, $title, $des, $picUrl1, $url);																													
										++$itemCount;	
										
									}	
							
									for ($i = 0; $i< count($res[0]); $i++) {
										if ($itemCount >= 6) {
											break;
										}
										$title = $res[0][$i];
										$picUrl1 = $res[1][$i];
										
										$url =  yuming."play.php?play=".str_replace("http://www.360kan.com", "", $res[2][$i]);
										$des = "";
										$contentStr .= sprintf($newsTplItem, $title, $des, $picUrl1, $url);
										++$itemCount;
										
									}
								
												
								$newsTplHeader = sprintf($newsTplHeader, $fromUsername, $toUsername, $time, $itemCount);
								$resultStr =  $newsTplHeader. $contentStr. $newsTplFooter;
								echo $resultStr; 
								}
								else
								{
									$newsTpl = "<xml>
										<ToUserName><![CDATA[%s]]></ToUserName>
										<FromUserName><![CDATA[%s]]></FromUserName>
										<CreateTime>%s</CreateTime>
										<MsgType><![CDATA[text]]></MsgType>
										<Content>%s</Content>
										</xml>";						
								
								       // 没有查找到的时候的回复
										
                                         
										$resultStr= sprintf($newsTpl, $fromUsername, $toUsername, $time, '很抱歉，未找到关于《'.$keyword.'》的相关影片！
您还可以到我们的官网（'.yuming.'）进行更详细准确的内容搜索！
										') ;
									
										echo $resultStr; 	

								}
										mysql_close($con);
									
								}																		
						else
						{
							$newsTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[news]]></MsgType>
							<ArticleCount>1</ArticleCount>
							<Articles>
							<item>
							<Title><![CDATA[%s]]></Title> 
							<Description><![CDATA[%s]]></Description>
							<PicUrl><![CDATA[%s]]></PicUrl>
							<Url><![CDATA[%s]]></Url>
							</item>							
							</Articles>
							</xml>";	
 						
	$contentStr = "公众号提示： \r\n ●请回复输入电影名如：青云志 即可在线观看！\r\n ●如果无法获取；请稍等片刻重新回复！\r\n ◆友情提示：获取到地址后，直接点击进入，然后拖到播放列表下边，点击集数即可在线播放。\r\n  \r\n ★请回复片名或关键词！";


							$msgType = 'text';
							$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
							echo $resultStr;
						}					
						
						
						break;
					default:
						break;
				}						

        }else {
        	echo $xtcms_guanzhu;
        	exit;
        }
    }
		
	private function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
	private function search ($keyword) {
		$seach=file_get_contents('https://so.360kan.com/index.php?kw='.$keyword);
        $szz='#js-playicon" title="(.*?)"\s*data-logger#';
        $szz1='#a href="(.*?)" class="g-playicon js-playicon"#';
        $szz2='#<img src="(.*?)" alt=#';
        preg_match_all($szz,$seach,$sarr);
        preg_match_all($szz1,$seach,$sarr1);
        preg_match_all($szz2,$seach,$sarr2);
     
        $one = $sarr[1];//标题
        $two = $sarr2[1];//图片
        $nine = $sarr1[1];

		return array($one,$two,$nine);
	}
}

?>
