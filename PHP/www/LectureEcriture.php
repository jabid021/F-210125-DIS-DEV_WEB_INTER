<?php

$monfichier = fopen('testLecture.txt', 'r+');
while(!feof($monfichier)){
  echo fgets($monfichier)."<br>";
}

fseek($monfichier, 15);
fputs($monfichier, 'Texte à écrire 2<br>');

fclose($monfichier);

echo "<hr>";

$monfichier = fopen('testLecture.txt', 'r+');



echo fread($monfichier, filesize('testLecture.txt'));
fclose($monfichier);
 ?>
