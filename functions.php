<?php 
// Formater un nombre en millier par une espace et ajouter le symbole Rublie à la fin  
function formatPrice($price) {
  $price = ceil($price);
  $price = number_format($price, 0, '',' ') . ' &#8381';
  return $price;
};