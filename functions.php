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

// Fonction permettand de assembler/réunir les layouts, sections, blocks, etc 
function include_template($file_name, $data_array) {
  $path = 'templates/' . $file_name;
  if(file_exists($path)) {
      // Démarrer la temporisation de sortie
      ob_start();
      extract($data_array);
      require($path);
      // Lire le contenu courant du tampon de sortie puis l'efface
      return ob_get_clean();
  } else {
    return '';
  }
};