<?php
require_once('vendor/dg/rss-php/src/Feed.php');
$feed = new Feed;

$tab =$feed->loadRss("http://radiofrance-podcast.net/podcast09/rss_14312.xml", NULL, NULL);
//$tab1 = $feed->toArray($feed->xml);
//var_dump($tab);
//	echo $item->title;
	echo "<table>
				<tr>
					<td>Date</td><td>Titre</td><td>Lecture</td><td>Duree</td><td>Média</td>
				</tr>";
				foreach ($tab->item as $item) {
					echo "
				<tr>
					<td>". $item->pubDate."</td>
					<td>. $item->title.</td>";
                    echo "<td>";
                    $xmurl = $item->enclosure["url"];
                    $url = $tab->toArray($xmurl);
                    echo '<audio controls="controls"><source src='.$url.'> VotrenavigateurnesupportepaslabaliseAUDIO</audio>';
                    echo "</td>
					<td>". $item->{"itunes:duration"}."</td>
					<td><a href=\"".$item->enclosure['url']."\">Téléchargement</a></td>
				</tr>\n";
			};
			echo"	</table>";

 ?>
