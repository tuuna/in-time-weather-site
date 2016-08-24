<?php
require __DIR__ . '/vendor/autoload.php';

use \Curl\Curl;
// $search = $_POST['search'];
// $ip = get_client_ip();
//

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

$action = $_GET['action'];
// $action = "getUserPosition";
  switch($action)
  {

    case 'getUserPosition':

    $ip = getIP();
    // $ip=preg_replace('/"/','',$ip);
    $ip = ip2long($ip);
    // $ip = trim($ip,'"');
    //  echo $ip;
      $arr = [];
      $all = [];
      $curl = new Curl();
      $datas = $curl->get("http://api.map.baidu.com/location/ip?ak=Urp0dHtu9SbPCSrioBNPvgiZgDEYINaF&ip=$ip");

      foreach ($datas as $key => $data) {
        $arr[] = $data;
      }
      foreach((array)$arr[1] as $ar) {
        $all[] = $ar;
      }
      echo $all[1];
      // echo json_encode(unicode_to_utf8($all[1]));
     break;
    case 'showDatas':
        class calc{
          function object_to_array($obj){
            $_arr = is_object($obj) ? get_object_vars($obj) : $obj;
            foreach ($_arr as $key => $val){
              $val = (is_array($val) || is_object($val)) ? $this->object_to_array($val) : $val;
              $arr[$key] = $val;
            }
            return $arr;
          }
        }
      $rawpostdata = file_get_contents("php://input");
      $post = json_decode($rawpostdata, true);
      $position = $post['search'];
      $curl = new Curl();
      $datas = $curl->get("https://api.heweather.com/x3/weather?city=$position&key=db5f1b7aae8249c8854867670ebfc312");
      $tst = new calc;
      $tst = $tst->object_to_array($datas);
      $tst = $tst['HeWeather data service 3.0'][0];
      $data = [];
    //   foreach($tst as $key => $t) {
    //     $data[] = $t;
    //   }
      echo json_encode($tst);
     break;
   }
