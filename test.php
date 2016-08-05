<?php
require __DIR__ . '/vendor/autoload.php';

use \Curl\Curl;
 function getIP()
{
    if (getenv("HTTP_CLIENT_IP")) {
        $ip=getenv("HTTP_CLIENT_IP");
    }elseif (getenv("HTTP_X_FORWARDED_FOR")) {
        $ip=getenv("HTTP_X_FORWARDED_FOR");
    }elseif (getenv("REMOTE_ADDR")) {
        $ip=getenv("REMOTE_ADDR");
    }else{
        $ip="unknow";
    }
    return $ip;
}

$ip = getIP();
// $ip=preg_replace('/"/','',$ip);
$ip = ip2long($ip);
// $ip = trim($ip,'"');
// echo $ip;
 $arr = [];
 $all = [];
 $curl = new Curl();
 $datas = $curl->get("http://api.map.baidu.com/location/ip?ak=Urp0dHtu9SbPCSrioBNPvgiZgDEYINaF&ip=$ip");
 var_dump($datas);

  foreach ($datas as $key => $data) {
    $arr[] = $data;
  }
  foreach((array)$arr[1] as $ar) {
    $all[] = $ar;
  }
  echo json_encode($all[1]);
// echo json_encode(trim($ip,'"'));
