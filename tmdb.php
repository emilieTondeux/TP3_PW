<?php
require "tp3-helpers.php";

$JSON = tmdbget("movie/550", ["language" => "fr"]);
var_dump($JSON);
?>
