<?php
require "app/config/consts.php";
require HELPERS;
$url = $_GET["url"] ?? "index/index";
$arrUrl = explode("/", $url);

$controller = $arrUrl[0];
$method = $arrUrl[0];
$params = "";


if(isset($arrUrl[0]))  $controller = $arrUrl[0];

if(isset($arrUrl[1]))
{
    if($arrUrl[1] != "") $method = $arrUrl[1];
}

if(isset($arrUrl[2]))
{
    if($arrUrl[2] != ""){
        for ($i=2; $i < count($arrUrl); $i++) { 
                $params .= $arrUrl[$i];
        }
    } 
}

require AUTOLOAD;
require ROUTES;
?>
