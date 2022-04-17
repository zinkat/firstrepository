<?php

// On lance le buffer, tout le code après la ligne 4 sera contenu dans le buffer
ob_start();
echo "Ce code sera dans le buffer";
$content = ob_get_clean(); // on récupère le code contenu dans le buffer dans la variable $content et on vide le buffer

echo "echo classique";
echo "<br/>";
// On affiche le code contenu dans le buffer
echo $content;