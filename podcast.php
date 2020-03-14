<?php
require_once('vendor/dg/rss-php/src/Feed.php');
$feed = new Feed;

$tab =$feed->load("http://radiofrance-podcast.net/podcast09/rss_14312.xml", NULL, NULL);
//$tab1 = $feed->toArray($feed->xml);
var_dump($tab);
echo $feed->__get();

 ?>
