<?php

require_once('functions.php');

require_once('data.php');
require_once('lots_data.php');

$lot_view = null;

if (isset($_GET['lot_id'])) {
  $lot_id = $_GET['lot_id'];

  foreach ($lots as $item) {
    if ($item['id'] == $lot_id) {
      $lot_view = $item;

      $page_content = include_template('lot_view.php', ['lot_view' => $lot_view]);
      $layout_content = include_template('layout.php', [
          'main_content' => $page_content,
          'categories' => $categories,
          'title_page' => $title_page,
          'is_auth' => $is_auth,
          'user_name' => $user_name,
          'user_avatar' => $user_avatar
          ]);

      print($layout_content);
      break;
    }
  }
}

if (!$lot_view) {
  http_response_code(404);
}

