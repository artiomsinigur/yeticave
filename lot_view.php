<?php
require_once('functions.php');

require_once('data.php');
require_once('lots_data.php');

// Obtenir l'id de la requête et vérifier s'il existe dans le tableau $lots 
$lot_view = null;
if (isset($_GET['lot_id'])) {

  // Paramètre à installer dans le cookie
  $lot_id = $_GET['lot_id'];
  $expire = strtotime('+1 day');
  $path = '/';
  
  // Vérifier s'il existe des éléments dans le cookie
  if (array_key_exists('history', $_COOKIE)) {
    $id_cookie = $_COOKIE['history'];
    $id_cookie = json_decode($id_cookie);
  } else {
    $id_cookie = [];
  }

  // Ajouter le nouveau id, s'il n'existe pas dans le cookie
  if (!in_array($lot_id, $id_cookie)) {

    // Vérifier de ne pas ajouter l'id s'il n'existe pas dans le tableau lots
    foreach ($lots as $value) {
      if ($value['id'] == $lot_id) {
        $id_cookie[] = $lot_id;
      }
    }
  }
  
  setcookie('history', json_encode($id_cookie), $expire, $path);

  foreach ($lots as $item) {
    if ($item['id'] == $_GET['lot_id']) {
      $lot_view = $item;
      
      $page_content = include_template('lot_view.php', [
        'lot_view' => $lot_view
        ]);
      $layout_content = include_template('layout.php', [
        'main_content' => $page_content,
        'categories' => $categories,
        'title_page' => $title_page,
        'is_auth' => $is_auth,
        'user_name' => $user_name,
        'user_avatar' => $user_avatar,
        'header_categories' => $categories
        ]);

        print($layout_content);
        break;
    }
  }
} 

if (!$lot_view) {
  echo 'Page non trouvée 404';
  http_response_code(404);
}
