<?php

// On lance le buffer
ob_start();
echo "Ce texte sera invisible";
ob_flush(); // flush, comme les WC, on tire la chasse

echo "Ce texte sera affiché";
ob_end_clean(); // on récupère les données du buffer (ligne 8) et on le vide