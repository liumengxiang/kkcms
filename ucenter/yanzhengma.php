<?php //�ύ����

$statusStr = array(
		"0" => "���ŷ��ͳɹ�",
		"-1" => "������ȫ",
		"-2" => "�������ռ䲻֧��,��ȷ��֧��curl����fsocket����ϵ���Ŀռ��̽�����߸����ռ䣡",
		"30" => "�������",
		"40" => "�˺Ų�����",
		"41" => "����",
		"42" => "�ʻ��ѹ���",
		"43" => "IP��ַ����",
		"50" => "���ݺ������д�"
	);
// Session����·��


session_register('mobliecode');

$_SESSION['mobilecode'] = $_POST["code"];

$smsapi = "http://api.smsbao.com/";
$user = "lerongmao"; //����ƽ̨�ʺ�
$pass = md5("zhimajie8899"); //����ƽ̨����
$content='������֤��Ϊ'.$_POST["code"].'';//Ҫ���͵Ķ�������
$phone = $_POST["tel"];//Ҫ���Ͷ��ŵ��ֻ�����
$sendurl = $smsapi."sms?u=".$user."&p=".$pass."&m=".$phone."&c=".urlencode($content);
$result =file_get_contents($sendurl) ;
echo $statusStr[$result];


?>

