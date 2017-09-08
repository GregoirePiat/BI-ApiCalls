<?php
/** Set API endpoint **/
$apiEndpoint = "https://download.data.grandlyon.com/ws/rdata/jcd_jcdecaux.jcdvelov/all.json";

/** Set timezone **/
date_default_timezone_set ("Europe/Paris");

/** Date **/
$today = date("Y-m-d");
$hms = date("H:i:s");

/** Directory path **/
$directory = dirname(__FILE__) . "/data";

/** Create directory if not exists **/
if (!is_dir($directory)) {
  mkdir($directory);
}

/** File path **/
$filePath = $directory . "/" . $today . "--" . $hms . ".json";
echo $filePath;

/** Curl session **/
$session = curl_init();
curl_setopt($session,CURLOPT_URL, $apiEndpoint);
curl_setopt($session,CURLOPT_RETURNTRANSFER,true);
curl_setopt($session,CURLOPT_HEADER, false);
$result = curl_exec($session);
/** Store on file **/
file_put_contents ($filePath , $result);
/** Close curl session **/
curl_close($session);
?>
