<?php
function cut($start, $end, $str)
{
    $str = explode($start, $str);
    $str[1] = explode($end, $str[1]);
    return $str[1][0];
}

function hh($str)
{
    $str = str_replace("\r\n", 'y{n}', $str);
    $str = str_replace("\n\r", 'y{n}', $str);
    $str = str_replace("\r", 'y{r}', $str);
    $str = str_replace("\n", 'y{n}', $str);
    return $str;
}//转换换行符

function hh_xt($str)
{
    $str = str_replace("\r\n", '', $str);
    $str = str_replace("\n\r", '', $str);
    $str = str_replace("\r", '', $str);
    $str = str_replace("\n", '', $str);
    return $str;
}//转换换行符

function dehh($str)
{
    $str = str_replace('y{n}', "\r\n", $str);
    return $str;
}//批量换回换行
function hhs(&$value, $key)
{
    $value = str_replace('y{n}', "\r\n", $value);
}//批量换回换行
function prma($str1, $str2)
{
    $str2 = hh($str2);

    $str1 = str_replace('(', '\\(', $str1);
    $str1 = str_replace(')', '\\)', $str1);
    $str1 = str_replace('?', '\\?', $str1);
    $str1 = '/' . str_replace('/', '\\/', $str1) . '/';
    $strm = '/yk\[([^\]]*?)\]/';
    preg_match_all($strm, $str1, $strs);
    $str1 = preg_replace('/yk\[([^,]*?)\]/', 'yk[*]', $str1);
    $str1 = preg_replace('/yk\[([^\]]*?),([^\]]*?)\]/', 'yk[$2]', $str1);
    $strtr['yk[s]'] = '([0-9]+)';
    $strtr['yk[m]'] = '([a-zA-Z]+?)';
    $strtr['yk[sm]'] = '([a-zA-Z0-9]+?)';
    $strtr['yk[*]'] = '(.*?)';
    $str1 = strtr($str1, $strtr);
    preg_match_all($str1, $str2, $str);
    for ($i = 0; $i < count($strs[1]); $i++) {
        $strpd = explode(',', $strs[1][$i]);
        if ($strpd[0] !== '*') {
            $k = $i + 1;
            $strs[1][$i] = explode(',', $strs[1][$i]);
            $ret[$strs[1][$i][0]] = $str[$k];
        }
    }
    array_walk_recursive($ret, "hhs");
    return $ret;
}

function curlgets($url, $header = false)
{
    $ch = curl_init();
//curl_setopt($ch,CURLOPT_HEADER,1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $page_content = curl_exec($ch);
    curl_close($ch);
    return $page_content;
}

function head($ip = 'n')
{
    global $cookie;
    $ip_long = array(
        array('607649792', '608174079'), //36.56.0.0-36.63.255.255
        array('1038614528', '1039007743'), //61.232.0.0-61.237.255.255
        array('1783627776', '1784676351'), //106.80.0.0-106.95.255.255
        array('2035023872', '2035154943'), //121.76.0.0-121.77.255.255
        array('2078801920', '2079064063'), //123.232.0.0-123.235.255.255
        array('-1950089216', '-1948778497'), //139.196.0.0-139.215.255.255
        array('-1425539072', '-1425014785'), //171.8.0.0-171.15.255.255
        array('-1236271104', '-1235419137'), //182.80.0.0-182.92.255.255
        array('-770113536', '-768606209'), //210.25.0.0-210.47.255.255
        array('-569376768', '-564133889'), //222.16.0.0-222.95.255.255
    );
    $rand_key = mt_rand(0, 9);
    $ips = long2ip(mt_rand($ip_long[$rand_key][0], $ip_long[$rand_key][1]));

    if ($ip == 'y') {
        $header = array(
            'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
            'Accept-Encoding:',
            'Accept-Language:zh-CN,zh;q=0.8',
            'Cache-Control:no-cache',
            'Connection:keep-alive',
            'X-forwarded-for:' . $ips,
            'Pragma:no-cache',
            'Cookie:' . $cookie,
            'User-Agent:' . $_SERVER['HTTP_USER_AGENT']);
    } else {
        $header = array(
            'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
            'Accept-Encoding:',
            'Accept-Language:zh-CN,zh;q=0.8',
            'Cache-Control:no-cache',
            'Connection:keep-alive',
            'Pragma:no-cache',
            'Cookie:' . $cookie,
            'User-Agent:' . $_SERVER['HTTP_USER_AGENT']);
    }
    return $header;
}

function hcgx($gxsj)
{
    $gxpd = time() - filemtime('./data/gxpd');
    if ($gxpd > $gxsj * 60 * 60 * 2) {
        $dir = './data/list';
        $file = scandir($dir);
        for ($i = 0; $i < count($file); $i++) {
            $gxpds = time() - filemtime($dir . $file[$i]);
            if ($gxpd > $gxsj * 60 * 60 and !strstr($file[$i], '.')) {
                unlink($dir . $file[$i]);
            }
        }
        $dir = './data/bf';
        $file = scandir($dir);
        for ($i = 0; $i < count($file); $i++) {
            $gxpds = time() - filemtime($dir . $file[$i]);
            if ($gxpd > $gxsj * 60 * 60 and !strstr($file[$i], '.')) {
                unlink($dir . $file[$i]);
            }
        }
        $dir = './data/search';
        $file = scandir($dir);
        for ($i = 0; $i < count($file); $i++) {
            $gxpds = time() - filemtime($dir . $file[$i]);
            if ($gxpd > $gxsj * 60 * 60 and !strstr($file[$i], '.')) {
                unlink($dir . $file[$i]);
            }
        }
        file_put_contents('./data/gxpd', 'last clear caches time:' . time());
    }
}

?>