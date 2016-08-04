<?php
function get_client_ip($type = 0,$adv=false) {
    $type       =  $type ? 1 : 0;
    static $ip  =   NULL;
    if ($ip !== NULL) return $ip[$type];
    if($adv){
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $arr    =   explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $pos    =   array_search('unknown',$arr);
            if(false !== $pos) unset($arr[$pos]);
            $ip     =   trim($arr[0]);
        }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip     =   $_SERVER['HTTP_CLIENT_IP'];
        }elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip     =   $_SERVER['REMOTE_ADDR'];
        }
    }elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $ip     =   $_SERVER['REMOTE_ADDR'];
    }
    // IP地址合法验证
    $long = sprintf("%u",ip2long($ip));
    $ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);
    return $ip[$type];
}
echo 'get_client_ip(0,true)';
var_dump(get_client_ip(0,true));
echo '<hr/>';
echo 'get_client_ip(1,true)';
var_dump(get_client_ip(1,true));
echo '<hr/>';
echo 'get_client_ip(0,false)';
var_dump(get_client_ip(0,false));
echo '<hr/>';
echo 'get_client_ip(1,false)';
var_dump(get_client_ip(1,false));


/*
 *调用接口代码
 *
 **/
require_once("./API/qqConnectAPI.php");
$qc = new QC();
$ret = $qc->get_info();

// show result
if($ret['ret'] == 0){
    echo "<meta charset='utf-8' />";
    require_once("get_info.html");
}else{
    echo "<meta charset='utf-8' />";
    echo "获取失败，请开启调试查看原因";
}


?>
