<?php
require_once('functions.php');
require_once('config.php');

require_once('data.php');
require_once('lots_data.php');

session_start();
var_dump($_SESSION);
var_dump($_SERVER['REQUEST_METHOD']);

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
        'user_avatar' => $user_avatar,
        'header_categories' => []
        ]);
} else {
    $layout_content = require_once($config['tpl_path'] . 'off.php');
}
print($layout_content);

?>
