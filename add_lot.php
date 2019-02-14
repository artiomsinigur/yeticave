<?php
require_once('functions.php');
require_once('data.php');

$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  // Les champs requis
  $required_text = ['lot-name', 'message', 'category'];
  $required_int = ['lot-rate', 'lot-step'];
  $required_date = ['lot-date'];
  $errors = [];
  foreach ($_POST as $key => $value) {
    // Validation de champs texte
    if (in_array($key, $required_text) && empty($value)) {
      $errors[$key] = $key;
    }

    // Validation des champs lot-rate et lot-step
    if (in_array($key, $required_int)) {
      if (empty($value) || !is_numeric($value) || $value < 0) {
        $errors[$key] = $key;
      }
    }

    // Validation de champ date
    if (in_array($key, $required_date) && empty($value)) {
      $errors[$key] = $key;
    }
  }

  // Validation d'image
  if (!empty($_FILES['lot-img']['name'])) {
    $tmp_name = $_FILES['lot-img']['tmp_name'];
    $path = $_FILES['lot-img']['name'];
    $size = $_FILES['lot-img']['size'];

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $finfo_type = finfo_file($finfo, $tmp_name);
    if ($finfo_type !== 'image/jpeg') {
      $errors['lot-img']['format'] = 'Téléversez une image en formate JPEG';
    } elseif ($size > 204800) {
        $errors['lot-img']['size'] = 'La taille maximale acceptée est: 200 kB';
    } else {
        move_uploaded_file($tmp_name, 'img/' . $path);
    }
  } else {
      $errors['lot-img']['not-uploaded'] = "L'image n'est pas téléversé";
  }

  // S'il y a des erreurs, on les affiche, si non, on affiche le résultat
  if (!empty($errors)) {
    $page_content = include_template('add_lot.php', ['errors' => $errors, 'categories' => $categories]);
  } else {
    $page_content = include_template('add_lot.php', []);
  }
} else {
  // Si la forme n'a pas été envoyer, on l'affiche de nouveau
  $page_content = include_template('add_lot.php', ['categories' => $categories]);
}

$layout_content = include_template('layout.php', [
  'main_content' => $page_content,
  'categories' => $categories,
  'title_page' => 'Добавление лота',
  'is_auth' => $is_auth,
  'user_name' => $user_name,
  'user_avatar' => $user_avatar,
  'header_categories' => $categories
]);
print($layout_content);

?>