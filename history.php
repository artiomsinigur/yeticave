<?php
require_once('functions.php');
require_once('data.php');
require_once('lots_data.php');


var_dump($_COOKIE);




$page_content = include_template('history.php', []);

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