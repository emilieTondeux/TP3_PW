<?php

require "tp3-helpers.php";

$JSON = tmdbget("search/movie", ["query" => "The Lord Of The Rings"]);
$output = json_decode($JSON, TRUE);

$tab = $output["results"];
foreach($tab as $elem) {
    $ID = $elem['id'];
    echo "Id : ".$elem['id']."<br/>";
    echo "Date de sortie : ".$elem['release_date']."<br/>";
    echo "Titre : ".$elem['title']."<br/>";
    echo "<br/>";
}

 ?>
