<?php
require_once('functions.php');

require_once('data.php');
require_once('lots_data.php');

// Obtenir l'id de la requête et vérifier s'il existe dans le tableau $lots 
$lot_view = null;
if (isset($_GET['lot_id'])) {
  $lot_id = $_GET['lot_id'];

  // Obtenir l'id de lot et l'installer dans cookie
  // $id = json_encode([$_GET['lot_id'], 1, 2]);
  $id = $_GET['lot_id'];
  $expire = strtotime('+1 day');
  $path = '/';
  setcookie('history', $id, $expire, $path);
  
  // foreach ($lots as $key => $value) {
  //   $arr_lot[] = $value['id'];
  //   $json_lot = json_encode($arr_lot);
  //   $arr_id = json_decode($json_lot);
  // }

  if (isset($_COOKIE['history'])) {
    $id_lot = json_encode($_COOKIE['history']);
  }
  
  var_dump($id_lot);
  var_dump($_COOKIE);


  // $myArr = array("John", "Mary", "Peter", "Sally");
  // $myJSON = json_encode($myArr);
  // var_dump($myJSON);
  // $myArr = json_decode($myJSON);
  // var_dump($myArr);

  // $cookie_exampleData = stripslashes($_COOKIE['exmaple_data']);



  foreach ($lots as $item) {
    if ($item['id'] == $lot_id) {
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
  http_response_code(404);
}

