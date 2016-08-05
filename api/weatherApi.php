<?php
require __DIR__ . '/vendor/autoload.php';

use \Curl\Curl;
// $search = $_POST['search'];
// $ip = get_client_ip();
$action = $_GET['action'];
  switch($action)
  {

    case 'getUserPosition':

     $ip = get_client_ip();
     $arr = [];
     $all = [];
     $curl = new Curl();
     $curl->get("http://api.map.baidu.com/location/ip?ak=Urp0dHtu9SbPCSrioBNPvgiZgDEYINaF&ip=$ip");

     foreach ($datas as $key => $data) {
       $arr[] = $data;
     }
     foreach($arr[1] as $key => $ar) {
       $all[] = $ar;
     }
     echo json_encode($all[1]);
     break;
    case 'getCityWeather':
     echo {'view':1};
     break;
   }
