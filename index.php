<?php 
error_reporting(0); 
header("Content-Type: text/html; charset=UTF-8");
include './admin/config.php';
include './global.php'; 
require("./inc/mydb.conn.php"); //生成 $mydb 类
$nowtime = time();


if($_GET['sort']=='bf'){$keys=$_GET[key].'播放';}else{if(empty($_GET['key'])){$keys='视频大全';}else{$keys='搜索'.$_GET[key];}}
$config['bt']=str_replace('yk[key]',$keys,$config['bt']);
$config['key']=str_replace('yk[key]',$keys,$config['key']);
$config['ms']=str_replace('yk[key]',$keys,$config['ms']);
$gxsj=$config['hcgx'];//更新间隔，双倍更新时间前的文件将自动删除
hcgx($gxsj);
?><html>
<head>
<meta charset="utf-8">

<title>戏子影视-最新电影电视剧在线观看下载,无广告云点播,手机在线观看</title>
<meta name="keywords" content="<?php echo $config['key'];?>" />
<meta name="description" content="<?php echo $config['ms'];?>" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<link href="./moban/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<script type="text/javascript" src=""></script>
<script type="text/javascript">
function nofind(){
var img=event.srcElement;
img.src="./moban/nocover.jpg";
img.onerror=null;
}
</script>
<div id="width" style="margin:auto;">

<div align="center"><form action="index.php" method="get"> <input type="text" name="key" value="<?=$_GET['key']?>" style="width:75%; height:35px;border-radius:5px;border:1px solid #ccc;"><input type="submit"  style="width:25%;height:35px;text-align:center;border:1px solid #aeaeae;border-radius:10px;text-align:center;color:#333; font-size:18px;" value="搜索"></form></div>
<hr><br><?php 
if(!empty($_GET['key']) or $_GET['sort']=='bf'){
echo '<div align="center" style="font-weight:bold;font-size:20px;margin:0px 5% 0px 5%;"><a href="index.php">首页</a>&nbsp; <a href="?sort=list&id=dianshi">更多电视剧</a>&nbsp; <a href="?sort=list&id=dianying">更多电影</a></div><div style="clear:both;"></div>
<br>';}else{echo '<link rel="stylesheet" href="./moban/css1.css" /><link rel="stylesheet" href="./moban/css2.css" />';}
?><div align="center"  style="font-weight:bold;margin:0px 5% 0px 5%;"><?=$config['gg']?>
</div><br><hr>
<?php
$guanggao=explode('|||',$config['js']);

foreach ($guanggao as  $vvvv) {
	echo $vvvv."<br/>";
}
//echo $guanggao[0];
$jkjk=explode('|||',$config['url']);
		$config['link']=explode('|||',$config['link']);
		for($i=0;$i<count($config['link']);$i++){
			$config['link'][$i]=explode(',',$config['link'][$i]);
			$yqlj.=' <a href="'.$config['link'][$i][1].'">'.$config['link'][$i][0].'</a> ';
		}

$foot='
    <div class="clearfloat"></div>
<footer> 
    <p>
        Copyright &copy; <a href="'.$config['siteurl'].'">'.$config['siteurl'].'</a> | Collect Form <a href="'.$config['siteurl'].'" title="'.$config['sitename'].'">'.$config['sitename'].'</a> | '.$config['tongji'].' | 友情链接：'.$yqlj.'
    </p>
</footer></div>
<SCRIPT  LANGUAGE="JavaScript">  

function IsPC() {
    var userAgentInfo = navigator.userAgent;
    var Agents = ["Android", "iPhone",
                "SymbianOS", "Windows Phone",
                "iPad", "iPod"];
    var flag = true;
    for (var v = 0; v < Agents.length; v++) {
        if (userAgentInfo.indexOf(Agents[v]) > 0) {
            flag = false;
            break;
        }
    }
    return flag;
}
function widdd() {
console.log(document.documentElement);
var k=document.body.clientWidth;
var s=window.screen.width;
if(k>s){k=s;}
k=k+15;
k=Math.floor(k/200);
if(k<=2){k=2;}
k=k*200-15;
document.getElementById("width").style.width=k+"px";
document.getElementById("wrap").style.width=k+"px";
}
widdd();
window.onresize=widdd;
</script>

</body>
</html>
';
if(empty($_GET[jx])){$_GET[jx]='0';}
$jxjk=$jkjk[$_GET[jx]];
function qlj($str){
	$str=preg_replace('#href="(.*?)"#','',$str);
	return $str;
}
function urlcl($str){
	if(strstr($str,'.html?')){
		$strs=explode('.html?',$str);
		$str=$strs[0].'.html';
	}
	return $str;
}

if($_GET['sort']=='bf'){
	if($_SERVER['HTTPS']=='on'){
		$target=' _blank';
	}else{
		$target='myframe';
	}
	echo '<div class="menu" id="mulu"> <ul><li style="float:left;width:130px;"><a href="javascript:history.back();" style="color:red;background:#ADF3AD;">返回</a></li>';
	for($k=0;$k<count($jkjk);$k++){
		$suzi=$k+1;
		echo '<li style="float:left;width:130px;"><a href="?sort=bf&id='.$_GET['id'].'&jx='.$k.'&ly='.$_GET['ly'].'&mbz='.$_GET['mbz'].'"  style="color:red;background:#ADF3AD;">切换解析源'.$suzi.'</a></li>';
	}
	echo '</ul><div style="clear:both;"></div><ul>';

$urls=json_decode(gzinflate(base64_decode(str_replace('imjh','+',$_GET[mbz]))));

$vk = explode('.html', $urls);
			
$vkey = substr($vk[0], -14);

echo '</ul><div style="clear:both;"></div><ul>';

$cccc = "";
if (is_object($urls)) {
	$Carr = object_array($urls);
	$cccc = $Carr['url'][0];
	$cly = $Carr['ly'];
	
}else{
if(!isset($_GET['ly'])){$ly=0;}else{$ly=$_GET['ly'];}
}

$htmldtl = file_get_contents($urls);
$htmldtl = hh_xt($htmldtl);



if ($_GET['id'] == 'dsj') {

preg_match_all("/<div class=\"txt-wrap\">(.*?)<\/div>/", $htmldtl, $bfhtml);

preg_match_all("/<a data-site=\"(.*?)\" class=\"js-site ea-site ea-site-(.*?)\" href=\"#\">(.*?)<\/a>/", $bfhtml[1][1], $bofangtyuan);

$bfynum = count($bofangtyuan[1]);
for ($i=0; $i < $bfynum ; $i++) { 

	$bf_key[] = $bofangtyuan[1][$i];
	$bf_name[] = str_replace('<span>(付费)</span>','',$bofangtyuan[3][$i]);

}
//print_r($bf_name);
$bfkey = $bf_key[$ly];

if ($ly == 0) {

	preg_match_all("/<div class=\"num-tab-main g-clear js-tab\" style=\"display:none;\">(.*?)<\/div>/", $htmldtl, $jjhtml);
					
	if ($jjhtml[0][0] == '') {
		
		preg_match_all("/<div class=\"num-tab-main js-tab g-clear\">(.*?)<\/div>/", $htmldtl, $jjhtml);
	}
	if ($jjhtml[0][0] == '') {
			
		preg_match_all("/<div class=\"num-tab-main g-clear js-tab\">(.*?)<\/div>/", $htmldtl, $jjhtml);
	}
	preg_match_all("/<a data-num=\"(.*?)\" data-daochu=\"to=$bfkey\" href=\"(.*?)\">/", $jjhtml[1][0], $jjhtml1);

	$jjnum = count($jjhtml1[1]);
	for ($i=0; $i < $jjnum ; $i++) { 

		$jnum[] = $jjhtml1[1][$i];
		$jurl[] = urlcl($jjhtml1[2][$i]);

	}
}else{

	$bfk = $bf_key[$ly];
	$jsonhtml = file_get_contents("http://www.360kan.com/cover/switchsite?site=$bfk&id=$vkey&category=2");

	$jsonhtml1 = json_decode($jsonhtml);
	$jsonhtml2 = object_array($jsonhtml1);
	//print_r($jsonhtml2['data']);
	
	preg_match_all("/<div class=\"num-tab-main g-clear js-tab\" style=\"display:block;\">(.*?)<\/div>/", $jsonhtml2['data'], $jjhtml);

	if ($jjhtml[0][0] == '') {
		
		preg_match_all("/<div class=\"num-tab-main js-tab g-clear\" style=\"display:block;\">(.*?)<\/div>/", $jsonhtml2['data'], $jjhtml);
	}

	preg_match_all("/<a data-num=\"(.*?)\" data-daochu=\"to=$bfkey\" href=\"(.*?)\">/", $jjhtml[1][0], $jjhtml1);

	$jjnum = count($jjhtml1[1]);
	for ($i=0; $i < $jjnum ; $i++) { 

		$jnum[] = $jjhtml1[1][$i];
		$jurl[] = urlcl($jjhtml1[2][$i]);

	}

}

}elseif($_GET['id'] == 'dy'){

	if (!$cccc) {

	preg_match_all("/<a data-daochu=\"to=(.*?)\" class=\"btn js-site ea-site ea-site-(.*?)\" href=\"(.*?)\">(.*?)<\/a>/", $htmldtl, $bfhtml);
	
	$bfynum = count($bfhtml[1]);
	for ($i=0; $i < $bfynum ; $i++) { 

		$bf_key[] = $bfhtml[2][$i];
		$jurl[] = $bfhtml[3][$i];
		$bf_name[] = $bfhtml[4][$i];

	}
	$bfkey = $bf_key[$ly];
	}	

}elseif ($_GET['id'] == 'dm') {

preg_match_all("/<div class=\"txt-wrap\">(.*?)<\/div>/", $htmldtl, $bfhtml);

preg_match_all("/<a data-site=\"(.*?)\" class=\"js-site ea-site ea-site-(.*?)\" href=\"#\">(.*?)<\/a>/", $bfhtml[1][1], $bofangtyuan);

$bfynum = count($bofangtyuan[1]);
for ($i=0; $i < $bfynum ; $i++) { 

	$bf_key[] = $bofangtyuan[1][$i];
	$bf_name[] = str_replace('<span>(付费)</span>','',$bofangtyuan[3][$i]);

}
//print_r($bf_name);
$bfkey = $bf_key[$ly];
$bfname = $bf_key[$ly];
if ($ly == 0) {

	preg_match_all("/<div class=\"num-tab-main g-clear js-tab\" style=\"display:none;\">(.*?)<\/div>/", $htmldtl, $jjhtml);
					
	if ($jjhtml[0][0] == '') {
		
		preg_match_all("/<div class=\"num-tab-main js-tab g-clear\">(.*?)<\/div>/", $htmldtl, $jjhtml);
	}

	preg_match_all("/<a data-num=\"(.*?)\" data-daochu=\"to=$bfkey\" href=\"(.*?)\">/", $jjhtml[1][0], $jjhtml1);

	$jjnum = count($jjhtml1[1]);
	for ($i=0; $i < $jjnum ; $i++) { 

		$jnum[] = $jjhtml1[1][$i];
		$jurl[] = urlcl($jjhtml1[2][$i]);

	}
}else{

	$bfk = $bf_key[$ly];
	$jsonhtml = file_get_contents("http://www.360kan.com/cover/switchsite?site=$bfk&id=$vkey&category=2");

	$jsonhtml1 = json_decode($jsonhtml);
	$jsonhtml2 = object_array($jsonhtml1);
	//print_r($jsonhtml2['data']);
	
	preg_match_all("/<div class=\"num-tab-main g-clear js-tab\" style=\"display:block;\">(.*?)<\/div>/", $jsonhtml2['data'], $jjhtml);

	if ($jjhtml[0][0] == '') {
		
		preg_match_all("/<div class=\"num-tab-main js-tab g-clear\" style=\"display:block;\">(.*?)<\/div>/", $jsonhtml2['data'], $jjhtml);
	}

	preg_match_all("/<a data-num=\"(.*?)\" data-daochu=\"to=$bfkey\" href=\"(.*?)\">/", $jjhtml[1][0], $jjhtml1);

	$jjnum = count($jjhtml1[1]);
	for ($i=0; $i < $jjnum ; $i++) { 

		$jnum[] = $jjhtml1[1][$i];
		$jurl[] = urlcl($jjhtml1[2][$i]);

	}

}

}

/*$sql = "SELECT count(*) as num FROM `yslist_jj` WHERE vurl = '".$urls."';";
		
	$res = $mydb->get_one($sql);
	if ($res['num'] == 0) {
		foreach ($jurl as $k=> $ju) {

			$sqlj .= "INSERT INTO `yslist_jj`(`vurl`,`vtype`,`vly`,`vlyn`, `vjid`,`vjurl`, `indate`) VALUES ('$urls','$_GET[id]','$bfkey','$bfname','$k','$ju','$nowtime');";
		}
		//print_r($sqlj);
		$mydb->query($sql);

		
	}else{

	}
exit;*/
if($_GET[id]=='dy'){
		if ($cccc) {
			for($q=0;$q<count($cly);$q++){
					
				echo '<li style="float:left;width:130px;"><a href="?sort=bf&id='.$_GET['id'].'&ly='.$q.'&mbz='.$_GET['mbz'].'"  style="color:red;background:#ADAFF3;">目标源：'.$cly[$q].'</a></li>';
			}
			echo '</ul><div style="clear:both;"></div><ul>';
			echo '<li style="float:left;"><a href="'.$jxjk.$cccc.'" target="'.$target.'"  onclick="click_scroll();">第1集</a></li>';
		}else{

			for($q=0;$q<count($bf_key);$q++){
					
				echo '<li style="float:left;width:130px;"><a href="?sort=bf&id='.$_GET['id'].'&ly='.$q.'&mbz='.$_GET['mbz'].'"  style="color:red;background:#ADAFF3;">目标源：'.$bf_name[$q].'</a></li>';
			}
			echo '</ul><div style="clear:both;"></div><ul>';
			echo '<li style="float:left;"><a href="'.$jxjk.urlcl($jurl[$ly]).'" target="'.$target.'"  onclick="click_scroll();">第1集</a></li>';
		}
}elseif ($_GET[id]=='zy'){

		for($s=0;$s<count($jurl);$s++){
			echo '<li style="float:left;width:200px;"><a href="'.$jxjk.urlcl($urls[url][$s]).'" target="'.$target.'"  onclick="click_scroll();">'.$urls[js][$s].':'.$urls[name][$s].'</a></li>';
		}	
}elseif ($_GET[id]=='dsj'){
			for($q=0;$q<count($bf_key);$q++){
				
				echo '<li style="float:left;width:130px;"><a href="?sort=bf&id='.$_GET['id'].'&ly='.$q.'&mbz='.$_GET['mbz'].'"  style="color:red;background:#ADAFF3;">目标源：'.$bf_name[$q].'</a></li>';
			}
			echo '</ul><div style="clear:both;"></div><ul>';
			for($s=0;$s<count($jurl);$s++){
				echo '<li style="float:left;"><a href="'.$jxjk.urlcl($jurl[$s]).'" target="'.$target.'" onclick="click_scroll();">第'.$jnum[$s].'集</a></li>';
			}
}elseif ($_GET[id]=='dm'){
			for($q=0;$q<count($bf_key);$q++){
				
				echo '<li style="float:left;width:130px;"><a href="?sort=bf&id='.$_GET['id'].'&ly='.$q.'&mbz='.$_GET['mbz'].'"  style="color:red;background:#ADAFF3;">目标源：'.$bf_name[$q].'</a></li>';
			}
			echo '</ul><div style="clear:both;"></div><ul>';
			for($s=0;$s<count($jurl);$s++){
				echo '<li style="float:left;"><a href="'.$jxjk.urlcl($jurl[$s]).'" target="'.$target.'" onclick="click_scroll();">第'.$jnum[$s].'集</a></li>';
			}
		}



	
	
	
echo '</ul></div> <script type="text/javascript">
 function click_scroll() {
  document.getElementById("anchor_scroll").click();
 }
 </script><a id="anchor_scroll" href="#pos" style="display:none"></a><div class="clearfloat"></div>
<idiv  id="pos" align="center"><iframe width="100%" height="80%" frameborder="0" scrolling="no" name="myframe"></iframe><p style="background:black;"><a href="#mulu" style="color:red;background:#ADF3AD;">&#8593;&#8593;&#8593;&#8593;&#8593;向上滑动或点击返回剧集列表&#8593;&#8593;&#8593;&#8593;&#8593;<br>温馨提示：有时加载较慢，请耐心等待，如播放失败，请返回顶部切换解析源和目标源！</a></p></div>'.$foot;
	exit;}//播放页到此结束
	elseif($_GET['sort']=='list' or empty($_GET['key'])){
		if(empty($_GET[cat])){$_GET[cat]='all';}
		if(empty($_GET[area])){$_GET[area]='all';}
		if(empty($_GET[year])){$_GET[year]='all';}
		if(empty($_GET[pageno])){$_GET[pageno]='1';}
		if(empty($_GET[id])){$_GET[id]='dianshi';}
		if(empty($_GET[act])){$_GET[act]='';}
		$urllist='http://www.360kan.com/'.$_GET[id].'/list?rank=rankhot&cat='.$_GET[cat].'&area='.$_GET[area].'&year='.$_GET[year].'&act='.$_GET[act].'&pageno='.$_GET[pageno];
		mkdir('./data');mkdir('./data/list');
		$gxpd=time()-filemtime('./data/list/'.md5($urllist));
		if($gxpd>$gxsj*60*60){
		$fcon=file_get_contents($urllist);
		$fcon=str_replace("\r",'',$fcon);
		$fcon=str_replace("\n",'',$fcon);
		$fcon = hh_xt($fcon);
		$fcon=preg_replace('#<!DOCTYPE html>(.*?)</form>#','',$fcon);
		$fcon=str_replace('<a target="_self" href="/zongyi/list" class="js-tongjip">综艺</a>','',$fcon);
		//$fcon=str_replace('<a target="_self" href="/dongman/list" class="js-tongjip">动漫</a>','',$fcon);
		//$fcon=preg_replace('#</head>(.*?)</form>#','',$fcon);
		//$fcon=preg_replace('#<link rel=\'stylesheet\'(.*?)\' />#','',$fcon);

		$fcon=preg_replace('#<div class="content-wrap p-ad g-clear">(.*?)</html>#','',$fcon);
		$fcon=preg_replace('#<div class="tab-line g-clear">(.*?)手机观看</a>            </div>#','',$fcon);
		$fcon=preg_replace('#class="js-tongjip" href="http://www.360kan.com/(.*?)/list?#','class="js-tongjip" href="?sort=list&id=$1&',$fcon);
		$fcon=preg_replace('#<img (.*?)>#','<img $1  onerror="nofind();">',$fcon);
        $fcon=preg_replace('#<a target="_self" href="/(.*?)/list"#','<a target="_self" href="?sort=list&id=$1"',$fcon);
		$fcon=preg_replace('#<a href=\'http:\/\/www.360kan.com\/(.*?)\/list\?rank=rankhot(.*?)\'#','<a href=\'?sort=list&id=$1&$2\'',$fcon);
		$fcon=preg_replace('#<a class="js-tongjic" href="(.*?)">(.*?)<span class="s1">(.*?)</span>#','<a class="js-tongjic" href="?key=$3">$2<span class="s1">$3</span>',$fcon);
		$fcon=preg_replace('#<div class="eb-foot ">(.*?)</html>#','',$fcon);
		$fcon=str_replace('<div class="g-wrap">','<div class="g-wrap" id="wrap">',$fcon);
		

		file_put_contents('./data/list/'.md5($urllist),gzdeflate($fcon));    
		}
		$fcon=gzinflate(file_get_contents('./data/list/'.md5($urllist)));
		echo $fcon;
		
		
		
		echo $foot;
		
		
		
		
		
		
		
		
		
		exit;}
	
//搜索页开式

if(strstr($_GET['key'],'http')){
	$urls[url][0]=$_GET['key'];
	$urls[ly][0]='自定义';
	$mbz=base64_encode(gzdeflate(json_encode($urls)));
	$mbz=str_replace('+','imjh',$mbz);
	header("Location:index.php?sort=bf&id=dy&key=$_GET[key]&mbz=".$mbz); 
	exit;
}
if(strstr($_GET['key'],'C') && strstr($_GET['key'],'=')){
	$urls[url][0]=$_GET['key'];
	$urls[ly][0]='自定义';
	$mbz=base64_encode(gzdeflate(json_encode($urls)));
	$mbz=str_replace('+','imjh',$mbz);
	header("Location:index.php?sort=bf&id=dy&key=$_GET[key]&mbz=".$mbz); 
	exit;
}

	$sql = "SELECT *  FROM `yslist` WHERE vname like '%".$_GET['key']."%' order by id asc;";
			
	$res = $mydb->select($sql);
	
if (count($res) > 0) {

	foreach ($res as $v) {
		
		$html2 = curlgets($v['vurl'],$header);
		//print_r($html2);
		$html2 = hh_xt($html2);
		preg_match_all("/<p class=\"item\">(.*?)<\/p>/",$html2,$wy2);
		preg_match_all("/<p class=\"item-desc js-open-wrap\">(.*?)<\/p>/",$html2,$wy21);
		

		$desc  = implode("<br/>", $wy2[1]);
		$desc=str_replace('so.360kan.com/index.php?kw','v.hez70.com/index.php?key',$desc);
		$desc=str_replace('&from=yingshi','',$desc);
		$jianjie = str_replace('<a href="#" class="js-open btn">展开&gt;&gt;</a>','',$wy21[1][0]);


		//print_r($desc);exit;

		if($v['vtype'] == 'dianying'){
			//$urls=prma('<a href="yk[url]"yk[*]">yk[ly]</a>',$v['vurl']);
			$mbz=base64_encode(gzdeflate(json_encode($v['vurl'])));
			$mbz=str_replace('+','imjh',$mbz);
			echo '<br><div style="float:left;margin-right:10px;"><img src="'.$v['vimg'].'"  onerror="nofind();"  style="height:180px;"/><p><a href="?sort=bf&id=dy&key='.$v['vname'].'&mbz='.$mbz.'&ly=0"></div><div>'.$v['vname'].'</a></p><span class="playtype">'.$desc.'<br>'.$jianjie.'</div><div style="clear:both;"></div><br><hr>';
		}else{
			//$urls=prma('<a href=yk[*]data-tab="yk[*,m]_yk[ly2]"yk[*]">yk[ly]</a>',$v['vurl']);
			$mbz=base64_encode(gzdeflate(json_encode($v['vurl'])));

			$mbz=str_replace('+','imjh',$mbz);
			echo '<br><div style="float:left;margin-right:10px;"><img src="'.$v['vimg'].'"  onerror="nofind();"  style="height:180px;"/><p><a href="?sort=bf&id='.$v['vtype'].'&key='.$v['vname'].'&mbz='.$mbz.'&ly=0"></div><div>'.$v['vname'].'</a></p><span class="playtype">'.$desc.'<br>'.$jianjie.'</div><div style="clear:both;"></div><br><hr>';		
		}
	}
}else{
	$urllist='http://so.360kan.com/index.php?kw='.$_GET['key'];
		$header=head('y');
		$fcon=curlgets($urllist,$header);

		//$fcon = hh($fcon);

		preg_match_all("/a href=\"(.*?)\" class=\"g-playicon js-playicon\" title=\"(.*?)\" data-logger/",$fcon,$wy1);
		//preg_match_all("/a href=\"(.*?)\" class=\"g-playicon js-playicon\" title=\"(.*?)\" data-logger/",$fcon,$wy11);
		preg_match_all("/<span class=\"playtype\">(.*?)<\/span>/",$fcon,$t);

		preg_match_all("/<li>(.*?)<\/li>/",$fcon,$li);

		
		
		$num = count($wy1[0]);
		
		for ($i=0; $i <$num ; $i++) { 
			
			$arrR[$i]['vurl'] = $wy1[1][$i];
			$arrR[$i]['title'] = $wy1[2][$i];
			$title = $wy1[2][$i];
			
			
			preg_match_all("/<img src=\"(.*?)\" alt=\"$title\" \/>/",$fcon,$wy11);
			
			$arrR[$i]['vimg'] = $wy11[1][0];

			if ($t[1][$i] == '[电视剧]') {
				$vtype = 'dsj';
			}elseif ($t[1][$i] == '[电影]') {
				$vtype = 'dy';
			}elseif ($t[1][$i] == '[综艺]') {
				$vtype = 'zy';
			}elseif ($t[1][$i] == '[动漫]') {
				$vtype = 'dm';
			}
			$arrR[$i]['vtype'] = $vtype;
			

		}
		
		foreach ($arrR as $v) {

			
			$vk = explode('.html', $v['vurl']);
			
			$vkey = substr($vk[0], -14);
			
			$sql = "SELECT id,count(*) as num FROM `yslist` WHERE vname = '".$v['title']."';";
			
			$res = $mydb->get_one($sql);
			if ($res['num'] == 0) {

				$sql = "INSERT INTO `yslist`(`vname`,`vtype`, `vurl`,`vkey`, `vimg`, `vdate`) VALUES ('$v[title]','$v[vtype]','$v[vurl]','$vkey','$v[vimg]','$nowtime');";
				$mydb->query($sql);
			}
			$html2 = curlgets($v['vurl'],$header);
			//print_r($html2);
			$html2 = hh_xt($html2);
			preg_match_all("/<p class=\"item\">(.*?)<\/p>/",$html2,$wy2);
			preg_match_all("/<p class=\"item-desc js-open-wrap\">(.*?)<\/p>/",$html2,$wy21);
			

			$desc  = implode("<br/>", $wy2[1]);
			$desc=str_replace('so.360kan.com/index.php?kw','v.hez70.com/index.php?key',$desc);
			$desc=str_replace('&from=yingshi','',$desc);
			$jianjie = str_replace('<a href="#" class="js-open btn">展开&gt;&gt;</a>','',$wy21[1][0]);


			//print_r($desc);exit;

			if($v['vtype'] == 'dianying'){
						//$urls=prma('<a href="yk[url]"yk[*]">yk[ly]</a>',$v['vurl']);
						$mbz=base64_encode(gzdeflate(json_encode($v['vurl'])));
						$mbz=str_replace('+','imjh',$mbz);
						echo '<br><div style="float:left;margin-right:10px;"><img src="'.$v['vimg'].'"  onerror="nofind();"  style="height:180px;"/><p><a href="?sort=bf&id=dy&key='.$v['title'].'&mbz='.$mbz.'&ly=0"></div><div>'.$v['title'].'</a></p><span class="playtype">'.$desc.'<br>'.$jianjie.'</div><div style="clear:both;"></div><br><hr>';
					}else{
						//$urls=prma('<a href=yk[*]data-tab="yk[*,m]_yk[ly2]"yk[*]">yk[ly]</a>',$v['vurl']);
						$mbz=base64_encode(gzdeflate(json_encode($v['vurl'])));

						$mbz=str_replace('+','imjh',$mbz);
						echo '<br><div style="float:left;margin-right:10px;"><img src="'.$v['vimg'].'"  onerror="nofind();"  style="height:180px;"/><p><a href="?sort=bf&id='.$v['vtype'].'&key='.$v['title'].'&mbz='.$mbz.'&ly=0"></div><div>'.$v['title'].'</a></p><span class="playtype">'.$desc.'<br>'.$jianjie.'</div><div style="clear:both;"></div><br><hr>';		
					}
		}

}
	
		
			

		//print_r($wy1);
	/*mkdir('./data');
	mkdir('./data/search');
	$gxpd=time()-filemtime('./data/search/'.md5($urllist));
	
		if($gxpd>$gxsj*60*60){
			$header=head('y');
			$fcon=curlgets($urllist,$header);
			//print_r($fcon);
			$fcon=cut("<div  id='js-longvideo' data-logger='b=index_so'>",'<iframe',$fcon);
			
			$fcon=str_replace('<span class="b-source-pay">[付费]</span>','',$fcon);
			$fcon=str_replace('?ptag=360kan.movie.pay','',$fcon);
			$fcon=str_replace('?ptag=360kan.movie.free','',$fcon);
			$fcon=str_replace('</a>','</a> ',$fcon);
			$fcon=str_replace('(付费)','',$fcon);
			//file_put_contents('./data/search/'.md5($urllist),gzdeflate($fcon));
		}else{
			$fcon=gzinflate(file_get_contents('./data/search/'.md5($urllist)));
		}
		print_r($fcon);
			$sj1=prma('<div class="le-figure le-figure-horizontalyk[lx]"yk[nr]</div></div></div>',$fcon);
			//print_r($sj1);
			for($i=0;$i<count($sj1[lx]);$i++){
				$sj=prma('<img src="yk[fm]" alt="yk[name]" />yk[*]<span class="playtypeyk[jj]<dl class="le-dl clearfix desc"><dt>简介：</dt><dd><span data-full="yk[jiesao]">',$sj1[nr][$i]);
				if(!strstr($sj1[nr][$i],'暂无播放资源')){
					if(strstr($sj1[lx][$i],'dianying')){
						$url=explode('<!--来源-->',$sj1[nr][$i]);
						$urls=prma('<a href="yk[url]"yk[*]">yk[ly]</a>',$url[1]);
						$mbz=base64_encode(gzdeflate(json_encode($urls)));$mbz=str_replace('+','imjh',$mbz);
						echo '<br><div style="float:left;margin-right:10px;"><img src="'.$sj[fm][0].'"  onerror="nofind();"  style="height:180px;"/><p><a href="?sort=bf&id=dy&key='.$sj[name][0].'&mbz='.$mbz.'"></div><div>'.$sj[name][0].'(来源：'.$urls[ly][0].')</a></p><span class="playtype'.qlj($sj[jj][0]).'<br>'.$sj[jiesao][0].'</div><div style="clear:both;"></div><br><hr>';
					}else{
						$urls=prma('<a href=yk[*]data-tab="yk[*,m]_yk[ly2]"yk[*]">yk[ly]</a>',$sj1[nr][$i]);if(strstr($sj1[nr][$i],'view-item-zongyi')){$leixin='zy';}else{$leixin='dsj';}
						$mbz=base64_encode(gzdeflate(json_encode($urls)));$mbz=str_replace('+','imjh',$mbz);
						echo '<br><div style="float:left;margin-right:10px;"><img src="'.$sj[fm][0].'"  onerror="nofind();"  style="height:180px;"/><p><a href="?sort=bf&id='.$leixin.'&key='.$sj[name][0].'&mbz='.$mbz.'"></div><div>'.$sj[name][0].'(来源：'.$urls[ly][0].')</a></p><span class="playtype'.qlj($sj[jj][0]).'<br>'.$sj[jiesao][0].'</div><div style="clear:both;"></div><br><hr>';		
					}
				}
			}*/
echo $foot;		

function object_array($array) {  
    if(is_object($array)) {  
        $array = (array)$array;  
     } if(is_array($array)) {  
         foreach($array as $key=>$value) {  
             $array[$key] = object_array($value);  
             }  
     }  
     return $array;  
}
?>