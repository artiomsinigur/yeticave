<?php
require_once('functions.php');
require_once('data.php');
require_once('lots_data.php');

$lot_viewed = [];
if (isset($_COOKIE['history'])) {
  $id_cookie = json_decode($_COOKIE['history']);

  // Version 1
  foreach ($id_cookie as $id) {
    foreach ($lots as $lot) {
      if ($id == $lot['id']) {
        $lot_viewed[] = $lot;
      }
    }
  }
}

// Version 2
/*
foreach ($lots as $lot) {
  $lot_id[] = strval($lot['id']);
  $lot_v = array_intersect($lot_id, $id_cookie);
  foreach ($lot_v as $id) {
    if ($id == $lot['id']) {
      $lot_view[] = $lot;
    }
  }
}
*/

$page_content = include_template('history.php', ['lot_viewed' => $lot_viewed]);

$layout_content = include_template('layout.php', [
  'main_content' => $page_content,
  'categories' => $categories,
  'title_page' => 'Histoire sur les articles visionnés',
  'is_auth' => $is_auth,
  'user_name' => $user_name,
  'user_avatar' => $user_avatar,
  'header_categories' => $categories
  ]);

  print($layout_content);