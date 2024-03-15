<?php

/*
$key = $_GET['key'];
if(!$key || $key != "xiaoeyvcwuom") die('Authentication failed.');
*/

$id = $_GET['id'];
// id不存在则抛出错误
if(!$id) die('Missing parameter: id');

require './ipdatabase/src/IpParser/IpParserInterface.php';

require './ipdatabase/src/IpLocation.php';
require './ipdatabase/src/IpParser/QQwry.php';
require './ipdatabase/src/IpParser/IpV6wry.php';
require './ipdatabase/src/StringParser.php';

use itbdw\Ip\IpLocation;

$ip = $_SERVER['REMOTE_ADDR'];

$file = "kpData/avoid/$id.txt";
$date = date("Y年m月d日 H时i分s秒");
$ua = $_SERVER['HTTP_USER_AGENT'];

$region = IpLocation::getLocation($ip)["area"];
file_put_contents('kpData/'.$id.'.txt', "$date\n$ip\n$region\n$ua\n\n",FILE_APPEND);


header("Location: https://api.dujin.org/bing/1920.php", true, 302);