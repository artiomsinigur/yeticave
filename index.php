<?php
require_once('functions.php');
require_once('data.php');
require_once('config.php');

// Option pour désactiver ou activer le site en cas de mise à jour
if ($config['enable']) {
    // Inclure la page main.php et le tableau($lots) avec les données pour ce template
    $page_content = include_template('main.php', ['lots' => $lots]);
    // Inclure la page layout.php et le tableau avec les données pour ce template
    $layout_content = include_template('layout.php', [
        'main_content' => $page_content,
        'categories' => $categories,
        'title_page' => $title_page,
        'is_auth' => $is_auth,
        'user_name' => $user_name,
        'user_avatar' => $user_avatar
        ]);
    // $layout_content = require_once($config['tpl_path'] . 'main.php');
} else {
    $layout_content = require_once($config['tpl_path'] . 'off.php');
}
print($layout_content);


// $layout_content = [
//     $main_content = [
//         $lots = [$lot, $lot, $lot]
//     ]
// ];
?>
