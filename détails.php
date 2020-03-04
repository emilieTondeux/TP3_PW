<?php
require "tp3-helpers.php";

$ID = 550;
$JSON = tmdbget("movie/".$ID, null);
$tab = json_decode($JSON, TRUE);

echo "Titre : ".$tab["title"]."<br/>";
echo "Titre original : ".$tab["original_title"]."<br/>";
if(isset($tab['tagline'])) {
    echo "Tags : ".$tab['tagline']."<br/>";
}
echo "Description : ".$tab['overview']."<br/>";
echo "Lien : <a href=\"https://www.themoviedb.org/movie/".$ID."\" >".$tab['title']." </a>" ;

 ?>
