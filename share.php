<?php

define("BRD_DOMAIN","B0763");
define("TARGET_URL","http://facebook.brdealer.com.br/campovel/veiculos.html?");


define("BRD_HOST_SERVER","http://www.brdealer.com.br/servlets/");

 if ($_SERVER["REQUEST_METHOD"] == 'POST') { $V__ParamList = $_POST; }
 else { $V__ParamList = $_GET; }

 $V__domain = BRD_DOMAIN;
 $V__target = TARGET_URL;
 if ($V__domain <= ' ' && isset($V__ParamList["d"])) $V__domain = strtoupper(trim($V__ParamList["d"]));

 $V__query = "?d=".$V__domain."&t=".$V__target;
 foreach($V__ParamList as $V__key => $V__value) {
    if ($V__key != "d") $V__query .= "&".$V__key."=".$V__value;
 }

 $V__getPageURL = BRD_HOST_SERVER."/BRD_Share.php".$V__query;
 if (function_exists('curl_init')) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $V__getPageURL);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $V__pageHTML = curl_exec($ch);
    curl_close($ch);
 }
 else {
    $V__pageHTML = @file_get_contents($V__getPageURL);
 }

 print $V__pageHTML;

?>