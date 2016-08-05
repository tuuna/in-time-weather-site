<?php
require __DIR__ . '/vendor/autoload.php';

use \Curl\Curl;
// class calc{
//   public static function violet($datas) {
//      $arr = [];
//     foreach ($datas as $key => $data) {
//       $arr[$key] = $data;
//       if(!is_array($arr[$key])){
//         self::violet($arr[$key]);
//       }
//     }
//     return $arr;
//   }
// }
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
$curl = new Curl();
$datas = $curl->get("https://api.heweather.com/x3/weather?city=beijing&key=db5f1b7aae8249c8854867670ebfc312");

$tst = new calc;
$tst = $tst->object_to_array($datas);
$tst = $tst['HeWeather data service 3.0'][0];
 $data = [];
 foreach($tst as $key => $t) {
   $data[$key] = $t;
 }
 var_dump($data);
// echo json_encode($data);
 ?>
