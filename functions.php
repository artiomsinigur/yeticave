<?php 
// Fonction qui formate un nombre en millier par une espace et ajouter le symbole Rublie à la fin  
function formatPrice($price) {
  $price = ceil($price);
  $price = number_format($price, 0, '',' ') . ' &#8381';
  return $price;
};

// Fonction qui coupe un texte quand la longuer est superieur à 25 caractères
function cutText($text, $num_lettres) {
  $num = strlen($text);
  if ($num > $num_lettres) {
    $text = substr($text, 0, $num_lettres);
    $text .= '...';
  }
  return $text;
};