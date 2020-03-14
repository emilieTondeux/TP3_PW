<?php
require_once('vendor/dg/rss-php/src/Feed.php');
$feed = new Feed;

$tab =$feed->loadRss("http://radiofrance-podcast.net/podcast09/rss_14312.xml", NULL, NULL);
//$tab1 = $feed->toArray($feed->xml);
//var_dump($tab);
foreach ($tab->item as $item) {
	echo $item->title;
}

 ?>
