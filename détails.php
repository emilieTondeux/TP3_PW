<?php
require "tp3-helpers.php";

$ID = 123;

$JSON_original = tmdbget("movie/".$ID, null);
$JSON_fr = tmdbget("movie/".$ID, ['language' => 'fr']);
$JSON_en = tmdbget("movie/".$ID, ['language' => 'en']);

$tab_original = json_decode($JSON_original, TRUE);
$tab_fr = json_decode($JSON_fr, TRUE);
$tab_en = json_decode($JSON_en, TRUE);


function affiche_description_fr($ID, $tab_fr, $tab_en){
	echo "Titre : ".$tab_fr["title"]."<br/>";
	echo "Titre original : ".$tab_en["original_title"]."<br/>";
	if(isset($tab_en['tagline'])) {
	    echo "Tags : ".$tab_en['tagline']."<br/>";
	}
	echo "Description : ".$tab_fr['overview']."<br/>";
	echo "Lien : <a href=\"https://www.themoviedb.org/movie/".$ID."\" >".$tab_en['title']." </a><br/><br/>" ;
}

function affiche_tab_description($ID, $tab_fr, $tab_en, $tab_original){
	echo "<table>
	  <th>
	    <td>Original</td>
	    <td>Francais</td>
	    <td>Anglais</td>
	  </th>
	  <tr>
	    <td>Titre</td>
	    <td>".$tab_original['title']."</td>
	    <td>".$tab_fr['title']."</td>
	    <td>".$tab_en['title']."</td>
	  </tr>
	  <tr>
	  <td>Titre original</td>
	  <td>".$tab_original['original_title']."</td>
	  <td>".$tab_fr['original_title']."</td>
	  <td>".$tab_en['original_title']."</td>
	  </tr>
	  <tr>
	  <td>Tags</td>";
	  if(isset($tab_original['tagline'])) {
	      echo "<td>".$tab_original['tagline']."</td>";
	  }else{
		  echo "<td>&nbsp;</td>";
	  }

	  if(isset($tab_fr['tagline'])) {
	      echo "<td>".$tab_fr['tagline']."</td>";
	  }else{
		   echo "<td>&nbsp;</td>";
	  }

	  if(isset($tab_en['tagline'])) {
	      echo "<td>".$tab_en['tagline']."</td>";
	  }else{
		  echo "<td>&nbsp;</td>";
	  }
	  echo "</tr>
	  </tr>
	  <tr>
	   <td>Description</td>
	   <td>".$tab_original['overview']."</td>
	   <td>".$tab_fr['overview']."</td>
	   <td>".$tab_en['overview']."</td>
	 </tr>
	  <tr>
	    <td>Lien vers le film</td>
	    <td><a href=\"https://www.themoviedb.org/movie/".$ID."\" >".$tab_original['title']." </a></td>
	    <td><a href=\"https://www.themoviedb.org/movie/".$ID."\" >".$tab_fr['title']." </a></td>
	    <td><a href=\"https://www.themoviedb.org/movie/".$ID."\" >".$tab_en['title']." </a></td>
	  </tr>
	  <tr>
		<td>Image</td>
		<td> <img src =\" https://image.tmdb.org/t/p/w200/".$tab_original['poster_path']."\"></td>
		<td> <img src =\" https://image.tmdb.org/t/p/w200/".$tab_fr['poster_path']."\"></td>
		<td> <img src =\" https://image.tmdb.org/t/p/w200/".$tab_en['poster_path']."\"></td>
	  </tr>
	</table>";
}
echo"////////////////////////QUESTION 1///////////////////////////<br/>";
affiche_description_fr($ID, $tab_fr, $tab_en);
echo"////////////////////////QUESTION 2///////////////////////////";
affiche_tab_description($ID, $tab_fr, $tab_en, $tab_original);



 ?>
