<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// ex1 Reprendre l’exemple « identifier_xml_ex3.xml », trouver le prix min et le prix max et les afficher
    // Attention, l’exercice comporte des difficultés ;-)
$xml = simplexml_load_file("exo3.xml");
$maxItem = $xml->children()->children();
$maxPrice = floatval(substr($maxItem->PRICE, 1));
$minItem = $maxItem;
$minPrice = floatval(substr($maxItem->PRICE, 1));

foreach($xml->children() as $item){
	$currentPrice = floatval(substr($item->PRICE, 1));
	print_r($item);
	print_r("<br/>");
	echo $currentPrice;
	print_r("<br/>");

	if($currentPrice > $maxPrice){
		$maxPrice = $currentPrice;
		$maxItem = $item;
	}
	if($currentPrice < $minPrice){
		$minPrice = $currentPrice;
		$minItem = $item;
	}
}

echo "Le prix min est ".$minItem->PRICE;
echo "Le prix max est ".$maxItem->PRICE;

// ex2 Maintenant donner le nom commun « COMMON » de la plante qui correspond
    // Au prix min
    // Au prix max


// ex3 Bonus : prendre « identifier_xml_ex4.xml » et afficher tous les pays « COUNTRY » présents dans le XML, mais ne les afficher qu’une seule fois !
